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
        <h1>Laporan Data Serials</h1>
    </div>

    <div class="section-body">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
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
