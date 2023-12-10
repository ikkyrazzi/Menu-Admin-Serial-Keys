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
        <h1>Tambah Master Buku</h1>
    </div>

    <div class="section-body">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <form method="POST" action="{{ route('tampilan.books.store') }}">
                            @csrf
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label>Kode Buku</label>
                                        <input type="text" class="form-control @error('kode_buku') is-invalid @enderror" name="kode_buku" id="kode_buku" required autofocus />
                                        @error('kode_buku')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label>Judul Buku</label>
                                        <input type="text" class="form-control @error('judul_buku') is-invalid @enderror" name="judul_buku" id="judul_buku" required />
                                        @error('judul_buku')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label>Pilih Kategori</label>
                                        <select class="form-control @error('kategori') is-invalid @enderror" id="kategori" name="kategori">
                                            <option value="">Pilih</option>
                                            <option value="AGAMA">Agama</option>
                                            <option value="AL-QURAN">Al-Quran</option>
                                            <option value="ANAK">Anak</option>
                                            <option value="BAHASA">Bahasa</option>
                                            <option value="MINAT DAN LAINNYA">Minat dan Lainnya</option>
                                            <option value="PELAJARAN">Pelajaran</option>
                                            <option value="PSIKOLOGI">Psikologi</option>
                                            <option value="KARIR">Karir</option>
                                        </select>
                                        @error('kategori')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label>Pilih Penerbit</label>
                                        <select class="form-control @error('penerbit') is-invalid @enderror" id="penerbit" name="penerbit" required>
                                            <option value="">Pilih</option>
                                            <option value="ALBIRUNI">Albiruni</option>
                                            <option value="MAGENTA">Magenta</option>
                                            <option value="PUSTAKA ILHAM">Pustaka Ilham</option>
                                            <option value="QURAN SAHIMA">Quran Sahima</option>
                                            <option value="SAFA MARWA">Safa Marwa</option>
                                            <option value="SAHIMA">Sahima</option>
                                            <option value="SAHIMA PLUS">Sahima Plus</option>
                                            <option value="SARASA AKSARA">Sarasa Aksara</option>
                                            <option value="THE NEXT PUBLISHING">The Next Publishing</option>
                                        </select>
                                        @error('penerbit')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <label>Keterangan</label>
                                        <textarea name="keterangan" id="keterangan" class="form-control" cols="30" rows="10"></textarea>
                                        @error('keterangan')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="text-right">
                                <button type="submit" class="btn btn-primary">Input Data</button>
                                <button type="reset" class="btn btn-info">Reset Form</button>
                                <a href="{{ route('tampilan.books.index') }}" class="btn btn-secondary">Kembali</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
