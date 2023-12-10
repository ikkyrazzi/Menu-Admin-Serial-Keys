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
        <h1>Sinkronisasi Data</h1>
    </div>

    <div class="section-body">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <form method="POST" action="{{ route('tampilan.book_apps.store') }}">
                            @csrf
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label>Buku</label>
                                        <select class="form-control @error('kode_buku') is-invalid @enderror" id="kode_buku" name="kode_buku" required>
                                            <option value="">Pilih</option>

                                            @foreach ($books as $book)
                                            <option value="{{ $book->kode_buku }}">{{ $book->judul_buku }}</option>
                                            @endforeach
                                        </select>
                                        @error('kode_buku')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label>Aplikasi</label>
                                        <select class="form-control @error('kode_aplikasi') is-invalid @enderror" id="kode_aplikasi" name="kode_aplikasi" required>
                                            <option value="">Pilih</option>

                                            @foreach ($apps as $app)
                                            <option value="{{ $app->kode_aplikasi }}">{{ strtoupper($app->nama_aplikasi) }}</option>
                                            @endforeach
                                        </select>
                                        @error('kode_aplikasi')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="text-right">
                                <button type="submit" class="btn btn-primary">Sinkronkan Data</button>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="card">
                    <div class="card-body">
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
                                        <th>Kode Aplikasi</th>
                                        <th>Nama Aplikasi</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($bookApps as $bookApp)
                                    <tr>
                                        <td>{{ $bookApp->kode_buku }}</td>
                                        <td>{{ strtoupper($bookApp->book->judul_buku ?? '') }}</td>
                                        <td>{{ $bookApp->kode_aplikasi }}</td>
                                        <td>{{ strtoupper($bookApp->app->nama_aplikasi ?? '') }}</td>
                                        <td>
                                            <form action="{{ route('tampilan.book_apps.destroy', $bookApp->id) }}" method="POST" style="display: inline;">
                                                @csrf @method('DELETE')
                                                <button type="submit" class="btn btn-xs btn-danger btn-flat show_confirm" data-toggle="tooltip" title="Delete"><i class="fa fa-trash" aria-hidden="true"></i></button>
                                            </form>
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
