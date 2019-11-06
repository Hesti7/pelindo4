@extends('/admin/MasterAdminView')

@section('judul halaman','Form Data User')

@section('konten')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title" id="exampleModalLabel1">Form Tambah User</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="false">&times;</span></button>
                            </div>
                            <div class="modal-body">
                                <form action="" id="formaddlogin">
                                    <div class="form-group">
                                        <label for="recipient-name" class="control-label">Username:</label>
                                        <input type="text" name="id_user" id="id_user" class="form-control" required="" minlength="5">
                                    </div>
                                    <div class="form-group">
                                        <label for="message-text" class="control-label">Password:</label>
                                        <input type="password" name="pbaru" id="pbaru" class="form-control" required="" minlength="5">
                                    </div>
                                    <div class="form-group">
                                        <label for="message-text" class="control-label">Re-type Password:</label>
                                        <input type="password" name="repbaru" id="repbaru" class="form-control" required="" minlength="5">
                                    </div>
                                    <div class="form-group">
                                        <label for="message-text" class="control-label">Pilih Cabang:</label>
                                        <select class="custom-select col-12" name="cabang" id="cabang" required="">
                                            <option selected="" value="">--- Pilih Cabang ---</option>
                                        // <?php
                                            //   $con = connectOracleDev("PELINDO4_PIUTANG","pelindo4_piutang");
                                            //   $query = "SELECT * FROM PELABUHAN WHERE ID_PELABUHAN != '00' ORDER BY ID_PELABUHAN ASC";
                                            //  $stmt = oci_parse($con, $query);
                                            // oci_execute($stmt);
                                                // while(($row = oci_fetch_array($stmt, OCI_ASSOC + OCI_RETURN_NULLS))!=false){
                                                    // echo "<option value='$row[ID_PELABUHAN]'>$row[NAMA]</option>";
                                                // }
                                            ?> 
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="message-text" class="control-label">Pilih Hak Akses:</label>
                                        <select class="custom-select col-12" name="hakakses" id="hakakses" required="">
                                            <option selected="" value="">--- Pilih Hak Akses ---</option>
                                            <option value="2">User</option>
                                            <option value="1">Administrator</option>
                                        </select>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                                        <button type="submit" class="btn btn-primary">Simpan !</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
 $('#exampleModal').on('hidden.bs.modal', function() {
            $(this)
            .find("input,textarea,select")
            .val('')
            .end()
            .find("input[type=checkbox], input[type=radio]")
            .prop("checked", "")
            .end();
        });
</script>
@endsection