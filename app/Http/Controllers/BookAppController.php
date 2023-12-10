<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBookAppRequest;
use App\Http\Requests\UpdateBookAppRequest;
use App\Models\App;
use App\Models\Book;
use App\Models\BookApp;
use Illuminate\Http\Request;

class BookAppController extends Controller
{
    const TITLE = 'Data Aplikasi';
    const URL = 'tampilan.book_apps.';
    const FOLDER = 'tampilan.book_app.';

    public function index()
    {
        $title = self::TITLE;
        $subtitle = 'Daftar Data';
        $url = self::URL;
        $folder = 'book_app';

        $bookApps = BookApp::latest()->get();
        $books = Book::latest()->get();
        $apps = App::latest()->get();

        return view(self::FOLDER . 'index', compact('title', 'subtitle', 'url', 'books', 'apps', 'bookApps', 'folder'));
    }

    public function create()
    {
        $title = self::TITLE;
        $subtitle = 'Tambah Data';
        $url = self::URL;

        return view(self::FOLDER . 'create', compact('title', 'subtitle', 'url'));
    }

    public function store(StoreBookAppRequest $request)
    {
        $input = $request->all();

        BookApp::create($input);

        return redirect()->route(self::URL . 'index');
    }

    public function edit($id)
    {
        $bookApps = BookApp::findOrFail($id);

        $title = self::TITLE;
        $subtitle = 'Edit Data';
        $url = self::URL;

        return view(self::FOLDER . 'edit', compact('title', 'subtitle', 'url', 'books', 'apps', 'bookApps'));
    }

    public function update(UpdateBookAppRequest $request, $id)
    {
        $bookApps = BookApp::findOrFail($id);

        $input = $request->all();

        $bookApps->update($input);

        return redirect()->route(self::URL . 'index');
    }

    public function destroy($id)
    {
        $bookApps = BookApp::findOrFail($id);

        $bookApps->delete();

        return redirect()->route('tampilan.book_apps.index')->with('success', 'Book App deleted successfully');
    }
}
