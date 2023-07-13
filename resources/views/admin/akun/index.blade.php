@extends('layouts.admin.master')
@section('pageTitle')
    Kelola Akun

@stop
@section('pageLink')
    Kelola Akun
@stop
@section('content')
    <!-- Row -->
    <div class="row">
        <!-- Datatables -->
        <div class="col-lg-12">
            <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <div class="button-group">
                        <button type="button" onclick="clearInput('formAkun','Tambah Akun','dashboard/akun')"
                            class="btn btn-info" data-toggle="modal" data-target="#modalAkun">
                            Tambah
                        </button>
                        <button type="button" onclick="clearInput('formImport','Import Akun','dashboard/akun/import')"
                            class="btn btn-success" data-toggle="modal" data-target="#modalImport">
                            Import
                        </button>
                    </div>
                    <a href="{{ url()->previous() }}" class="btn btn-primary">
                        Kembali
                    </a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">

                        <table class="table align-items-center table-flush table-hover" id="dataTableHover">
                            <thead class="thead-light">
                                <th>No</th>
                                <th>Username</th>
                                <th>Nama Akun</th>
                                <TH>Aksi</TH>
                            </thead>
                            <tbody>
                                @foreach ($akuns as $no => $akun)
                                    <tr>
                                        <td>{{ $no + 1 }}</td>
                                        <td>{{ $akun->username }}</td>
                                        <td>{{ $akun->nama_akun }}</td>
                                        <td>
                                            <form action="{{ route('dashboard.akun.destroy', $akun->id) }}"
                                                id="formDeleteAkun" method="post">
                                                @csrf
                                                @method('delete')
                                                <button type="button" class="btn btn-warning"
                                                    onclick="editAkun('{{ $akun->id }}','#modalAkun')">
                                                    Edit
                                                </button>
                                                <button type="button" class="btn btn-danger"
                                                    onclick="formConfirmation('Hapus Data {{ $akun->nama_akun }}')">Hapus</button>
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
    </div>
    @include('admin.akun.modal_akun')
    @include('admin.akun.import')
@stop
@push('js')
    <script>
        function editAkun(id_akun, idModal) {
            $.ajax({
                type: "get",
                url: `{{ url('dashboard/akun/${id_akun}/edit') }}`,
                dataType: 'json',
                success: function(res) {
                    $("#nama_akun").val(res.nama_akun);
                    $("#username").val(res.username);
                    $("#email").val(res.email);
                    $("#password").val(res.password);
                    $(`#labelModal`).text('Edit Akun');
                    $(`#btn-submit`).text('Update');
                    $('#update').append(
                        `@method('put')`
                    );
                    document.getElementById('formAkun').action =
                        `{{ url('dashboard/akun/${res.id}') }}`;
                    $(idModal).modal('show');
                }
            });
        }
    </script>
@endpush
