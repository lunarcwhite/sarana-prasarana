<div class="modal fade text-left" id="modalImport" tabindex="-1" role="dialog" aria-labelledby="myModalLabel33"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="labelModal">
                    Import Akun
                </h4>
                <button type="button" class="btn btn-outline-danger btn-close" data-dismiss="modal"
                    aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('dashboard.akun.import') }}" method="post" id="formImport" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group mt-1">
                        <label for="email">Pilih File Dari File Excel</label>
                        <input id="nama_akun" type="file" name="import" placeholder="Nama Akun"
                            class="form-control" />
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-light-secondary" type="button" data-dismiss="modal">Batal</button>
                    <button type="button" id="btn-submit" onclick="formConfirmation('Import Data?','#formImport')"
                    class="btn btn-primary ms-1">
                    Import
                </button>
            </form>
            </div>
        </div>
    </div>
</div>
