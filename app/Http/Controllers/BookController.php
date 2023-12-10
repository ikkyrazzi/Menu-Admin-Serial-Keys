<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBookRequest;
use App\Http\Requests\UpdateBookRequest;
use App\Models\Book;
use App\Models\BookApp;
use Illuminate\Http\Request;

class BookController extends Controller
{
    const TITLE = 'Data Aplikasi';
    const URL = 'tampilan.books.';
    const FOLDER = 'tampilan.book.';

    public function index()
    {
        $title = self::TITLE;
        $subtitle = 'Daftar Data';
        $url = self::URL;
        $folder = 'book';

        $books = Book::latest()->get();

        return view(self::FOLDER . 'index', compact('title', 'subtitle', 'url', 'books', 'folder'));
    }

    public function create()
    {
        $title = self::TITLE;
        $subtitle = 'Tambah Data';
        $url = self::URL;

        return view(self::FOLDER . 'create', compact('title', 'subtitle', 'url'));
    }

    public function store(StoreBookRequest $request)
    {
        $input = $request->all();

        Book::create($input);

        return redirect()->route(self::URL . 'index');
    }

    public function edit($id)
    {
        $books = Book::findOrFail($id);

        $title = self::TITLE;
        $subtitle = 'Edit Data';
        $url = self::URL;

        return view(self::FOLDER . 'edit', compact('title', 'subtitle', 'url', 'books'));
    }

    public function update(UpdateBookRequest $request, $id)
    {
        $books = Book::findOrFail($id);

        $input = $request->all();

        $books->update($input);

        return redirect()->route(self::URL . 'index');
    }

    public function show($id)
    {
        $books = Book::findOrFail($id);
        $bookApps = BookApp::latest()->get();

        $title = self::TITLE;
        $subtitle = 'Book App Details';
        $url = self::URL;

        return view(self::FOLDER . 'show', compact('title', 'subtitle', 'url', 'books', 'bookApps'));
    }

    public function destroy($id)
    {
        $books = Book::findOrFail($id);

        $books->delete();

        return redirect()->route('tampilan.books.index')->with('success', 'Book deleted successfully');
    }
}
