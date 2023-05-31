@extends('layouts.admin.master')
@section('pageTitle')
    Data Sarana & Prasarana

@stop
@section('pageLink')
    Kategori {{$kategori->nama_kategori}}
@stop
@section('content')
    <!-- Row -->
    <div class="row">
        <!-- Datatables -->
        <div class="col-lg-12">
            <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <a href="{{url()->previous()}}" class="btn btn-primary">
                        Kembali
                    </a >
                </div>

                <div class="table-responsive p-3">
                    <table class="table align-items-center table-flush table-hover" id="dataTableHover">
                        <thead class="thead-light">
                            <th>No</th>
                            <th>Nama Sarana & Prasarana</th>
                            <th>Tipe</th>
                        </thead>
                        <tbody>
                            @foreach ($kategori->sarana as $no => $sarana)
                                <tr>
                                    <td>{{ $no + 1 }}</td>
                                    <td>{{ $sarana->nama_sarana_prasarana }}</td>
                                    <td>{{ $sarana->tipe}}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@stop
