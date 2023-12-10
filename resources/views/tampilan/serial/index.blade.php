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
        <h1>Data Serial Key</h1>
    </div>

    <div class="section-body">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="text-right">
                            <a href="{{ route('tampilan.serials.create') }}" class="btn btn-primary mb-3">Generate Serial</a>
                        </div>

                        @if(session()->has('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong>Berhasil! </strong>{{ session('success') }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        @endif @if(session()->has('gagal'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <strong>Kesalahan! </strong>{{ session('gagal') }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        @endif

                        <div class="table-responsive">
                            <table class="table table-striped" id="serials">
                                <thead>
                                    <tr>
                                        <th>Id Proses</th>
                                        <th>Kode Buku</th>
                                        <th>Kode Aplikasi</th>
                                        <th>Serial</th>
                                        <th>Status</th>
                                        <th>Last Update</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($serials as $serial)
                                    <tr>
                                        <td>{{ $serial->id_proses }}</td>
                                        <td>{{ $serial->kode_buku }}</td>
                                        <td>{{ $serial->kode_aplikasi }}</td>
                                        <td>{{ $serial->serial }}</td>
                                        <td>
                                            @if ($serial->active === 1)
                                            <span class="badge badge-success">Aktif</span>
                                            @else
                                            <span class="badge badge-warning">Non Aktif</span>
                                            @endif
                                        </td>
                                        <td>{{ $serial->updated_at }}</td>
                                        <td>
                                            <div class="btn-group">
                                                <a href="{{ route('tampilan.serials.cetak_satuan', ['id' => $serial->id]) }}" target="_blank" class="btn btn-xs btn-info btn-flat"><i class="fa fa-print" aria-hidden="true"></i> </a>
                                                <a href="#" class="btn btn-xs btn-danger btn-flat"><i class="fa fa-key" aria-hidden="true"></i> </a>
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
