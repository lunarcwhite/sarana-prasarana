@extends('layouts.admin.master')
@section('pageTitle')
    Data Peminjaman
@stop
@section('pageLink')
    Berlangsung
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
                    <table class="table align-items-center table-flush table-hover" id="dataTable">
                        <thead class="thead-light">
                            <th>No</th>
                            <th>Nama Sarana & Prasarana</th>
                            <th>Tanggal Peminjaman</th>
                            <th>Durasi Peminjaman</th>
                            <th>Jumlah Pinjam</th>
                            <th>Keterangan</th>
                            <TH>Status</TH>
                        </thead>
                        <tbody>
                            @foreach ($peminjamans as $no => $peminjaman)
                                <tr>
                                    <td>{{ $no + 1 }}</td>
                                    <td>{{ $peminjaman->sarana_prasarana->nama_sarana_prasarana }}</td>
                                    <td>{{$peminjaman->tanggal_mulai_peminjaman}}</td>
                                    <td>{{$peminjaman->durasi_peminjaman}} Hari</td>
                                    <td>{{$peminjaman->jumlah_pinjam}}</td>
                                    <td>{{$peminjaman->keterangan}}</td>
                                    <td>
                                        @if ($peminjaman->status_peminjaman == 1)
                                        <span class="badge badge-sm badge-success">Berlangsung</span>
                                        @elseif ($peminjaman->status_peminjaman == 2)
                                        <span class="badge badge-sm badge-warning">Menunggu Persetujuan</span>
                                        @else
                                        <span class="badge badge-sm badge-danger">Ditolak</span>
                                        @endif
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
        async function selesai(idData) {
            const {
                value: text
            } = await Swal.fire({
                input: 'textarea',
                inputLabel: 'Kondisi Pengembalian',
                inputPlaceholder: 'Kondisi Pengembalian',
                inputAttributes: {
                    'aria-label': 'Type your message here'
                },
                showCancelButton: true
            })
            if (text) {
                $("#kondisi_pengembalian").val(text);
                selesaikan(idData, '#formSelesai', 'Selesaikan Peminjaman?')
            }
        }

        function selesaikan(dataId, formId, message) {
            $('#id').val(dataId);
            formConfirmationId(formId, message);
        }
    </script>
@endpush