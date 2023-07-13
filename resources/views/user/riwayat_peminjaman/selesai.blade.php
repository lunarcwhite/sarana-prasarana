@extends('layouts.admin.master')
@section('pageTitle')
    Riwayan Peminjaman
@stop
@section('pageLink')
    Histori
@stop
@section('content')
    <!-- Row -->
    <div class="row">
        <!-- Datatables -->
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header d-flex flex-row align-items-center justify-content-between">
                    <form action="{{ route('dashboard.user.riwayat_peminjaman') }}" method="get" id="formTanggal">
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-5 col-form-label">Filter Sesuai Tanggal</label>
                            <div class="col-sm-3">
                                <input type="month" class="form-control" width="30px" id="tanggal" name='tanggal'>
                              </div>
                            <a href="{{ route('dashboard.rekapan.index') }}" class="btn btn-sm btn-info"
                                rel="noopener noreferrer">
                                Tampilkan Semua</a>
                        </div>
                    </form>
                    <a href="{{ url()->previous() }}" class="btn btn-primary">
                        Kembali
                    </a>
                </div>
                <div class="table-responsive p-3">
                    <table class="table align-items-center table-flush table-hover" id="dataTable">
                        <thead class="thead-light">
                            <th>No</th>
                            <th>Nama Sarana & Prasarana</th>
                            <th>Tanggal Peminjaman</th>
                            <th>Durasi Peminjaman</th>
                            <th>Tanggal Pengembalian</th>
                            <th>Kondisi Awal</th>
                            <th>Kondisi Pengembalian</th>
                            <TH>Status</TH>
                        </thead>
                        <tbody>
                            @foreach ($rekapans as $no => $rekapan)
                                <tr>
                                    <td>{{ $no + 1 }}</td>
                                    <td>{{ $rekapan->sarana_prasarana->nama_sarana_prasarana }}</td>
                                    <td>{{ $rekapan->tanggal_mulai_peminjaman }}</td>
                                    <td>{{ $rekapan->durasi_peminjaman }} Hari</td>
                                    <td>{{ $rekapan->tanggal_pengembalian }}</td>
                                    <td>{{$rekapan->kondisi_awal}}</td>
                                    <td>{{$rekapan->kondisi_pengembalian}}</td>
                                    <td><span class="badge badge-sm badge-success">Selesai</span>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@stop
@push('js')
    <script>
        $("#tanggal").change(function(e) {
            e.preventDefault();
            $("#formTanggal").submit();
        });
    </script>
@endpush
