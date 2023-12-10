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
        <h1>Data Detail Master Buku</h1>
    </div>

    <div class="section-body">
        <h2 class="section-title">Data Detail Buku</h2>
        <p class="section-lead">
            Berisi detail attribut data master buku
        </p>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label>Kode Buku</label>
                                    <input type="text" class="form-control" name="kode_buku" id="kode_buku" value="{{ $books->kode_buku }}" readonly />
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label>Judul Buku</label>
                                    <input type="text" class="form-control" name="judul_buku" id="judul_buku" value="{{ $books->judul_buku }}" readonly />
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label>Pilih Kategori</label>
                                    <input type="text" class="form-control" name="kategori" id="kategori" value="{{ $books->kategori }}" readonly />
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label>Pilih Penerbit</label>
                                    <input type="text" class="form-control" name="penerbit" id="penerbit" value="{{ $books->penerbit }}" readonly />
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label>Keterangan</label>
                                    <textarea name="keterangan" id="keterangan" class="form-control" cols="30" rows="10" readonly>{{ $books->keterangan }}</textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <h2 class="section-title">Data Aplikasi</h2>
                <p class="section-lead">
                    Berisi data aplikasi apa saja yang terdapat pada buku {{ $books->judul_buku }}
                </p>
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped" id="example">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Kode Aplikasi</th>
                                        <th>Nama Aplikasi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($bookApps as $bookApp)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $bookApp->kode_aplikasi }}</td>
                                        <td>{{ strtoupper($bookApp->app->nama_aplikasi ?? '') }}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="text-right">
                            <a href="{{ route('tampilan.books.index') }}" class="btn btn-dark mt-3">Kembali</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
