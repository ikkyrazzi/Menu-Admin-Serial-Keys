<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAppRequest;
use App\Http\Requests\UpdateAppRequest;
use App\Models\App;
use Illuminate\Http\Request;

class AppController extends Controller
{
    const TITLE = 'Data Aplikasi';
    const URL = 'tampilan.apps.';
    const FOLDER = 'tampilan.app.';

    public function index()
    {
        $title = self::TITLE;
        $subtitle = 'Daftar Data';
        $url = self::URL;
        $folder = 'app';

        $apps = App::latest()->get();

        return view(self::FOLDER . 'index', compact('title', 'subtitle', 'url', 'apps', 'folder'));
    }

    public function create()
    {
        $title = self::TITLE;
        $subtitle = 'Tambah Data';
        $url = self::URL;

        $lastApp = App::latest()->first();

        if ($lastApp && is_numeric($lastApp->id)) {
            $nextId = $lastApp->id + 1;
        } else {
            $nextId = 1+1; 
        }

        $kodeAplikasi = 'APP' . $nextId;

        return view(self::FOLDER . 'create', compact('title', 'subtitle', 'url','kodeAplikasi', 'lastApp'));
    }

    public function store(StoreAppRequest $request)
    {
        $input = $request->all();

        App::create($input);

        return redirect()->route(self::URL . 'index');
    }

    public function edit($id)
    {
        $apps = App::findOrFail($id);

        $title = self::TITLE;
        $subtitle = 'Edit Data';
        $url = self::URL;

        return view(self::FOLDER . 'edit', compact('title', 'subtitle', 'url', 'apps'));
    }

    public function update(UpdateAppRequest $request, $id)
    {
        $apps = App::findOrFail($id);

        $input = $request->all();

        $apps->update($input);

        return redirect()->route(self::URL . 'index');
    }

    public function destroy($id)
    {
        $apps = App::findOrFail($id);

        $apps->delete();

        return redirect()->route('tampilan.apps.index')->with('success', 'Apps deleted successfully');
    }
}
