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
        <h1>Generate Serial Key</h1>
    </div>

    <div class="section-body">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <form method="POST" action="{{ route('tampilan.serials.process-mass-input') }}">
                            @csrf
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <label>Kode Proses</label>
                                        <input type="text" id="id_proses" name="id_proses" class="form-control @error('id_proses') is-invalid @enderror" value="{{ $kodeAplikasi }}" readonly />
                                        @error('id_proses')
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
                                        <label>Pilih Judul Buku</label>
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
                                        <label>Jumlah Serial</label>
                                        <input type="number" class="form-control @error('jumlah_serial') is-invalid @enderror" name="jumlah_serial" id="jumlah_serial" required />
                                        @error('jumlah_serial')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="text-right">
                                <button type="submit" class="btn btn-primary">Generate Serial</button>
                                <button type="reset" class="btn btn-info">Reset Form</button>
                                <a href="{{ route('tampilan.serials.index') }}" class="btn btn-secondary">Kembali</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
