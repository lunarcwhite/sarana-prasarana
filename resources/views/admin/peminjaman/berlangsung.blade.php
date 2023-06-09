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
                            <th>Peminjam</th>
                            <th>Tanggal Peminjaman</th>
                            <th>Durasi Peminjaman</th>
                            <th>Jumlah Pinjam</th>
                            <TH>Aksi</TH>
                        </thead>
                        <tbody>
                            @foreach ($peminjamans as $no => $peminjaman)
                                <tr>
                                    <td>{{ $no + 1 }}</td>
                                    <td>{{ $peminjaman->sarana_prasarana->nama_sarana_prasarana }}</td>
                                    <td>{{ $peminjaman->user->nama_akun}}</td>
                                    <td>{{$peminjaman->tanggal_mulai_peminjaman}}</td>
                                    <td>{{$peminjaman->durasi_peminjaman}} Hari</td>
                                    <td>{{$peminjaman->jumlah_pinjam}}</td>
                                    <td>
                                        <form action="{{ route('dashboard.peminjaman.selesai', $peminjaman->id) }}"
                                            id="formSelesai" method="post">
                                            @csrf
                                            <input type="hidden" name="id" id="id">
                                            <input type="hidden" name="kondisi_pengembalian" id="kondisi_pengembalian">
                                            <input type="hidden" name="kondisi_awal" value="{{$peminjaman->sarana_prasarana->kondisi}}" id="kondisi">
                                            <input type="hidden" name="jumlah_pinjam" id="jumlah_pinjam" value="{{$peminjaman->jumlah_pinjam}}">
                                            <input type="hidden" name="id_sarana" id="id_sarana" value="{{$peminjaman->sarana_prasarana->id}}">
                                            <button type="button" class="btn btn-success"
                                                onclick="selesai({{ $peminjaman->id }})">Selesai</button>
                                        </form>
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