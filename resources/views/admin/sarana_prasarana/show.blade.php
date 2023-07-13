@extends('layouts.admin.master')
@section('pageTitle')
    Data Sarana & Prasarana {{ $saranaPrasarana->nama_sarana_prasarana }}
@stop
@section('pageLink')
    Data Sarana & Prasarana {{ $saranaPrasarana->nama_sarana_prasarana }}
@stop
@section('content')
    <!-- Row -->
    <div class="row">
        <!-- Datatables -->
        <div class="col-lg-12">
            <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <a href="{{ url()->previous() }}" class="btn btn-primary">
                        Kembali
                    </a>
                </div>
                <div class="table-responsive p-3">
                    <table class="table align-items-center table-flush table-hover">
                        <thead class="thead-light">
                            <th>Data</th>
                            <th>Value</th>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Nama Sarana Prasarana</td>
                                <td>{{ $saranaPrasarana->nama_sarana_prasarana }}</td>
                            </tr>
                            <tr>
                                <td>Tipe</td>
                                <td>{{ $saranaPrasarana->tipe }}</td>
                            </tr>
                            <tr>
                                <td>Kategori</td>
                                <td>{{ $saranaPrasarana->kategori->nama_kategori }}</td>
                            </tr>
                            <tr>
                                <td>Stok</td>
                                <td>{{ $saranaPrasarana->jumlah }}</td>
                            </tr>
                            <tr>
                                <td>Kondisi</td>
                                <td>{{ $saranaPrasarana->kondisi }}</td>
                            </tr>
                            <tr>
                                <td>Photo</td>
                                <td><img src="{{ url('storage/images/'.$saranaPrasarana->tipe.'/'.$saranaPrasarana->photo.'') }}" width="300px" alt=""></td>
                            </tr>
                        </tbody>
                    </table>
                    <hr/>
                    <h4>Riwayat Peminjaman</h4>
                    <div class="table-responsive p-3">
                        <table class="table table-flush table-hover" id="dataTable">
                            <thead class="thead-light">
                                <th>No</th>
                                <th>Peminjam</th>
                                <th>Tanggal Mulai Peminjaman</th>
                                <th>Durasi Peminjaman</th>
                                <th>Tanggal Pengembalian</th>
                                <th>Jumlah</th>
                                <th>Kondisi Awal</th>
                                <th>Kondisi Pengembalian</th>
                                <TH>Status</TH>
                            </thead>
                            <tbody>
                                @foreach ($saranaPrasarana->rekapan as $no => $value)
                                    <tr>
                                        <td>{{ $no + 1 }}</td>
                                        <td>{{ $value->user->username }}</td>
                                        <td>{{ $value->tanggal_mulai_peminjaman }}</td>
                                        <td>{{ $value->durasi_peminjaman }} Hari</td>
                                        <td>{{ $value->tanggal_pengembalian }}</td>
                                        <td>{{ $value->jumlah }}</td>
                                        <td>{{ $value->kondisi_awal }}</td>
                                        <td>{{ $value->kondisi_pengembalian }}</td>
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
    </div>
@stop
