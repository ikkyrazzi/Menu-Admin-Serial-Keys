<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSerialRequest;
use App\Http\Requests\UpdateSerialRequest;
use App\Models\Book;
use App\Models\BookApp;
use App\Models\Serial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;

class SerialController extends Controller
{
    const TITLE = 'Data Aplikasi';
    const URL = 'tampilan.serials.';
    const FOLDER = 'tampilan.serial.';

    public function index()
    {
        $title = self::TITLE;
        $subtitle = 'Daftar Data';
        $url = self::URL;
        $folder = 'serial';

        $serials = Serial::latest()->get();

        return view(self::FOLDER . 'index', compact('title', 'subtitle', 'url', 'serials', 'folder'));
    }

    public function create()
    {
        $title = self::TITLE;
        $subtitle = 'Tambah Data';
        $url = self::URL;

        $lastId = Serial::latest()->value('id');
        $nextId = is_numeric($lastId) ? $lastId + 1 : 1;
        $kodeAplikasi = 'GSR'.$nextId;
        $books = Book::latest()->get();
        $bookApps = BookApp::latest()->get();

        return view(self::FOLDER . 'create', compact('title', 'subtitle', 'url', 'lastId', 'nextId', 'kodeAplikasi', 'books', 'bookApps'));
    }

    public function store(StoreSerialRequest $request)
    {
        $input = $request->all();

        Serial::create($input);

        return redirect()->route(self::URL . 'index');
    }

    public function edit($id)
    {
        $serials = Serial::findOrFail($id);

        $title = self::TITLE;
        $subtitle = 'Edit Data';
        $url = self::URL;

        return view(self::FOLDER . 'edit', compact('title', 'subtitle', 'url', 'serials'));
    }

    public function update(UpdateSerialRequest $request, $id)
    {
        $serials = Serial::findOrFail($id);

        $input = $request->all();

        $serials->update($input);

        return redirect()->route(self::URL . 'index');
    }

    public function show($id_proses)
    {
        $title = self::TITLE;
        $subtitle = 'Detail Data';
        $url = self::URL;
        $folder = 'serial';

        $serialDataAll = Serial::where('id_proses', $id_proses)->get();

        return view(self::FOLDER . 'show', compact('title', 'subtitle', 'url', 'serialDataAll', 'folder', 'id_proses'));
    }

    public function laporan()
    {
        $title = self::TITLE;
        $subtitle = 'Daftar Data';
        $url = self::URL;
        $folder = 'serial';

        $serials = Serial::latest()->get();

        return view(self::FOLDER . 'laporan', compact('title', 'subtitle', 'url', 'serials', 'folder'));
    }

    public function validateSerial(Request $request)
    {
        try {
            $request->validate([
                'kode_aplikasi' => 'required',
                'serial' => 'required',
            ]);

            $kodeAplikasi = $request->input('kode_aplikasi');
            $serial = $request->input('serial');

            $serialData = Serial::where('kode_aplikasi', $kodeAplikasi)
                ->where('serial', $serial)
                ->first();

            if (!$serialData) {
                return response()->json([
                    'meta' => [
                        'code' => 401,
                        'success' => false,
                        'message' => 'Serial tidak valid.',
                    ],
                ], 401);
            }

            if ($serialData->active == 1) {
                return response()->json([
                    'meta' => [
                        'code' => 400,
                        'success' => false,
                        'message' => 'Serial sudah digunakan.',
                    ],
                ], 400);
            }

            $token = base64_encode(random_bytes(32));

            $serialData->update([
                'active' => 1,
                'active_token' => $token
            ]);

            return response()->json([
                'meta' => [
                    'code' => 200,
                    'success' => true,
                    'message' => 'Serial berhasil diaktifkan.',
                ],
                'data' => $serialData,
            ], 200);

        } catch (\Throwable $th) {
            return response()->json([
                'success' => false,
                'message' => 'Terjadi kesalahan: ' . $th->getMessage(),
            ], 500);
        }
    }

    public function processMassInput(Request $request)
    {
        $request->validate([
            'id_proses'     => 'required',
            'kode_buku'     => 'required',
            'jumlah_serial' => 'required|numeric|min:1',
        ]);

        $id_proses = $request->input('id_proses');
        $kodeBuku = $request->input('kode_buku');
        $jumlahSerial = $request->input('jumlah_serial');

        $bookApps = BookApp::where('kode_buku', $kodeBuku)->get();

        if ($bookApps->isEmpty()) {
            return redirect('tampilan.serials.show')->with('gagal', 'Kesalahan pada kode buku tidak ditemukan!');
        }

        try {
            DB::beginTransaction();

            $generatedSerials = $this->generateMultipleSerials($id_proses, $kodeBuku, $bookApps, $jumlahSerial);

            foreach ($generatedSerials as $generatedSerial) {
                Serial::create($generatedSerial);
            }

            DB::commit();

            return redirect()->route('tampilan.serials.show', ['id_proses' => $id_proses])->with('success', 'Generate Serial berhasil!');

        } catch (\Exception $e) {

            DB::rollBack();

            return redirect('tampilan.serials.index')->with('gagal', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }

    private function generateMultipleSerials($id_proses, $kodeBuku, $bookApps, $jumlahSerial)
    {
        $generatedSerials = [];

        for ($i = 0; $i < $jumlahSerial; $i++) {
            $serial = $this->generateSerial($kodeBuku);
            foreach ($bookApps as $bookApp) {
                $generatedSerials[] = [
                    'id_proses' => $id_proses,
                    'kode_buku' => $kodeBuku,
                    'kode_aplikasi' => $bookApp->kode_aplikasi, 
                    'serial' => $serial,
                ];
            }
        }

        return $generatedSerials;
    }

    private function generateSerial($kodeBuku)
    {
        $combinedString =  Str::random(6);

        return $combinedString;
    }

    public function cetakMasal($id_proses)
    {
        $serialDataMasal = Serial::select('serial', 'id_proses', DB::raw('MAX(created_at) as max_created_at'))
            ->where('id_proses', $id_proses)
            ->groupBy('serial', 'id_proses')
            ->get();

        $title = 'Cetak Serial ' . $id_proses;

        return view(self::FOLDER . 'cetak_masal', compact('serialDataMasal', 'title'));
    }

    public function cetakSatuan($id)
    {
        $serialDataSatuan = Serial::where('id', $id)->take(1)->get();

        $title = 'Cetak Serial ' . $id;

        return view(self::FOLDER . 'cetak_satuan', compact('serialDataSatuan', 'title'));
    }

    public function destroy($id)
    {
        $serials = Serial::findOrFail($id);

        $serials->delete();

        return redirect()->route('tampilan.serials.index')->with('success', 'Book deleted successfully');
    }
}
