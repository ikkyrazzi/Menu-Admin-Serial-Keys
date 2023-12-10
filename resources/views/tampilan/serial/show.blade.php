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
        <h1>Landing Data Serial</h1>
    </div>

    <div class="section-body">
        <div class="row">
            <div class="col-12">
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

                        <div class="row">
                            <div class="col-10">
                                <div class="form-group">
                                    <label>Id Proses</label>
                                    <input type="text" id="id_proses" name="id_proses" class="form-control @error('id_proses') is-invalid @enderror" value="{{ $id_proses }}" readonly />
                                    @error('id_proses')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="form-group">
                                    <label>Cetak Masal</label>
                                    <a href="{{ route('tampilan.serials.cetak_masal', ['id_proses' => $id_proses]) }}" target="_blank" class="form-control btn btn-primary">Cetak Serial</a>
                                </div>
                            </div>
                        </div>

                        <div class="table-responsive mt-3">
                            <table class="table table-striped" id="example">
                                <thead>
                                    <tr>
                                        <th>Kode Buku</th>
                                        <th>Kode Aplikasi</th>
                                        <th>Serial</th>
                                        <th>Tgl Dibuat</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($serialDataAll as $serial)
                                    <tr>
                                        <td>{{ $serial->kode_buku }}</td>
                                        <td>{{ $serial->kode_aplikasi }}</td>
                                        <td>{{ $serial->serial }}</td>
                                        <td>{{ $serial->created_at }}</td>
                                        <td>
                                            <a href="{{ route('tampilan.serials.cetak_satuan', ['id' => $serial->id]) }}" target="_blank" class="btn btn-info"><i class="fa fa-print" aria-hidden="true"></i> Cetak</a>
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
