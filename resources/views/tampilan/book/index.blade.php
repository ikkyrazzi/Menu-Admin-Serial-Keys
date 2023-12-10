@extends('layouts.main')

@section('addTitle') 

@endsection

@section('addCss') 

@endsection 

@section('addJs') 

@endsection 

@section('addJsCustom') 

@endsection 

@section('subheader') 

@endsection 

@section('content')

<section class="section">
    <div class="section-header">
        <h1>Data Master Buku</h1>
    </div>

    <div class="section-body">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="text-right">
                            <a href="{{ route('tampilan.books.create') }}" class="btn btn-primary mb-3">Tambah Data Buku</a>
                        </div>

                        @if(session()->has('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong>Berhasil! </strong>{{ session('success') }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        @endif

                        <div class="table-responsive">
                            <table class="table table-striped" id="example">
                                <thead>
                                    <tr>
                                        <th>Kode Buku</th>
                                        <th>Judul Buku</th>
                                        <th>Kategori</th>
                                        <th>Penerbit</th>
                                        <th>Last Update</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($books as $book)
                                    <tr>
                                        <td>{{ $book->kode_buku }}</td>
                                        <td>{{ $book->judul_buku }}</td>
                                        <td>{{ $book->kategori }}</td>
                                        <td>{{ $book->penerbit }}</td>
                                        <td>{{ $book->updated_at }}</td>
                                        <td>
                                            <div class="btn-group">
                                                <a href="{{ route('tampilan.books.show', $book->id) }}" class="btn btn-xs btn-info btn-flat"><i class="fa fa-eye" aria-hidden="true"></i></a>
                                                <a href="{{ route('tampilan.books.edit', $book->id) }}" class="btn btn-xs btn-primary btn-flat"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                                                <form action="{{ route('tampilan.books.destroy', $book->id) }}" method="POST" style="display: inline;">
                                                    @csrf @method('DELETE')
                                                    <button type="submit" class="btn btn-xs btn-danger btn-flat show_confirm" data-toggle="tooltip" title="Delete"><i class="fa fa-trash" aria-hidden="true"></i></button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
