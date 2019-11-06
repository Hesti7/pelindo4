<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="modal fade" id="lockform" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title" id="exampleModalLabel1">Form Lock customer</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="false">&times;</span></button>
                            </div>
                            <div class="modal-body">
                                <form action="" id="formlock"> 
                                    <div class="form-group">
                                        <label for="message-text" class="control-label">Kode Lokal :</label>
                                        <input type="text" name="kodelokal" id="kodelokal2" class="form-control" readonly="">
                                    </div>
                                    <div class="form-group">
                                        <label for="message-text" class="control-label">Kode SAP :</label>
                                        <input type="text" name="kodesap" id="kodesap2" class="form-control" readonly="">
                                    </div>
                                    <div class="form-group">
                                        <label for="message-text" class="control-label">Nama Customer :</label>
                                        <input type="text" name="nama" id="nama2" class="form-control" readonly="">
                                    </div>
                                    <div class="form-group">
                                        <label for="message-text" class="control-label">Alamat :</label>
                                        <input type="text" name="alamat" id="alamat2" class="form-control" readonly="">
                                    </div>
                                    <div class="form-group">
                                        <label for="recipient-name" class="control-label">File Rujukan : </label><br>
                                        <input type="file" required id="fileToUpload" accept="application/pdf" name="fileToUpload">
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                                        <button type="submit" class="btn btn-danger">LOCK !</button>
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