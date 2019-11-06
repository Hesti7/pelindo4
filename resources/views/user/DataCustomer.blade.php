@extends('/user/MasterUserView')

@section('judul halaman','Data Customer')

@section('konten')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h2 class="card-title">DATA TRANSAKSI LOCK</h2>
                <!-- <h6 class="card-subtitle">Data table example</h6> -->
                <div class="table-responsive m-t-40">
                    <table id="customerTable" class="table table-bordered table-striped">
                    <thead>
                            <tr>
                                <th width="12%">Kode Lokal</th>
                                <th width="12%">Kode SAP</th>
                                <th width="26%">Nama Customer</th>
                                <th width="25%">Alamat</th>
                                <th width="11%">Aksi</th>
                                <th width="10%">Detail</th>
                                <th width="1%">Status</th>
                            </tr>
                        </thead>
                        <tbody>
                          
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="modal fade" id="lockform" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="exampleModalLabel1">Form Lock customer</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="false">&times;</span></button>
            </div>
            <div class="modal-body">
                <form action="" id="formlock" method="POST"> 
                {{csrf_field()}}
                    <div class="form-group">
                        <label for="message-text" class="control-label">Kode Lokal :</label>
                        <input type="text" name="kodelokal" id="local_code1" class="form-control" readonly="">
                    </div>
                    <div class="form-group">
                        <label for="message-text" class="control-label">Kode SAP :</label>
                        <input type="text" name="kodesap" id="sap_code1" class="form-control" readonly="">
                    </div>
                    <div class="form-group">
                        <label for="message-text" class="control-label">Nama Customer :</label>
                        <input type="text" name="nama" id="name1" class="form-control" readonly="">
                    </div>
                    <div class="form-group">
                        <label for="message-text" class="control-label">Alamat :</label>
                        <input type="text" name="alamat" id="alamat1" class="form-control" readonly="">
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="control-label">File Rujukan : </label><br>
                        <input type="file" required id="fileUploadLock" accept="application/pdf" name="fileToUpload">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-danger" id="lockbutton">LOCK !</button>
                    </div>
                </form>
            </div>
            </div>
    </div>
</div>



<div class="modal fade" id="unlockform" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="exampleModalLabel1">Form Unlock Customer</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="false">&times;</span></button>
            </div>
            <div class="modal-body">
                <form action="" id="formunlock" method="POST">
                        {{csrf_field()}}
                    <div class="form-group">
                        <label for="message-text" class="control-label">Kode Lokal :</label>
                        <input type="text" name="kodelokal" id="local_code" class="form-control" readonly="">
                    </div>
                    <div class="form-group">
                        <label for="message-text" class="control-label">Kode SAP :</label>
                        <input type="text" name="kodesap" id="sap_code" class="form-control" readonly="">
                    </div>
                    <div class="form-group">
                        <label for="message-text" class="control-label">Nama Customer :</label>
                        <input type="text" name="nama" id="name" class="form-control" readonly="">
                    </div>
                    <div class="form-group">
                        <label for="message-text" class="control-label">Alamat :</label>
                        <input type="text" name="alamat" id="alamat" class="form-control" readonly="">
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="control-label">File Rujukan : </label><br>
                        <input type="file" id="fileUploadUnlock" accept="application/pdf" name="fileToUpload">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-success" id="unlockbutton">UNLOCK !</button>
                    </div>
                </form>
            </div>
            </div>
    </div>
</div>

<script>
    var SITEURL = '{{URL::to('')}}';
        jQuery(document).ready(function(){
            $('#customerTable').DataTable({
                processing : true,
                serverside : true,
                ajax :
                {
                    url:SITEURL+"/user/datacustomer"
                },
                columns:
                [
                    {
                        data:"local_code", 
                        name :"local_code",
                        orderable : true
                    },
                    {
                        data:"sap_code", 
                        name:"sap_code"
                    },
                    {
                        data:"name", 
                        name:"name"
                    },
                    {
                        data:"address", 
                        name:"address"
                    },
                    {
                        data:"aksi",
                        name:"aksi",
                        orderable : false
                    },
                    {
                        data:"detail",
                        name:"detail",
                        orderable : false
                    },
                    {
                        data:"lock_status",
                        name :"lock_status"
                    }
                ],
    
            });

            $('body').on('click', '#lockbutton', function(){
                  
                var idcus= $(this).attr('idcus');
                console.log(idcus);
                $.ajax({
                    
                    url : SITEURL+"/user/datacustomerupdate/"+idcus,
                    success:function (result){
                        console.log(result);
                        $('#local_code1').val(result.local_code);
                        $('#sap_code1').val(result.sap_code);
                        $('#name1').val(result.name);
                        $('#alamat1').val(result.address);
                        $('#lockform').modal('show');
  
                    }
                });
            });
            var idcus;
            $('body').on('click', '#unlockbutton', function(e){
                idcus= $('#lockbutton').attr('idcus');
                $.ajax({
                    url : SITEURL+'/user/datacustomerupdate/'+idcus,
                    success:function(result){
                        $('#local_code').val(result.local_code);
                        $('#sap_code').val(result.sap_code);
                        $('#name').val(result.name);
                        $('#alamat').val(result.address);
                        $('#unlockform').modal('show');
                        

                    }
                });
            });
            
           
            $('#formlock').on('submit', function(event){
                event.preventDefault();
                $.ajax({
                    url : SITEURL+"/user/updatelockstatus/",
                    method :'POST',
                    data :{
                        _token: '{{csrf_token()}}',
                        id_cus: idcus,
                        fileupload : $('#fileUploadLock').val(),
                    },
                    success:function(result){
                        alert(result.pesan);
                    }
                });
            });

            $('#formunlock').on('submit', function(event){
                event.preventDefault();
                $.ajax({
                    url : SITEURL+"/user/updateunlockstatus/",
                    method :'POST',
                    data :{
                        _token: '{{csrf_token()}}',
                        id_cus: idcus,
                        fileupload : $('#fileUploadUnlock').val()
                    },
                    success:function(result){
                        alert(result.pesan);
                    }
                });
            })
            // $('#lockbu
            // $('#lockbutton').click(function(e){
            //     e.preventDefault();
            //     $.ajax({
            //         var id = "";
            //         url:SITEURL+"admin/unlockStatus/"+id;

            //     });

            // $('#lockbutton').click(function(e){
            // e.preventDefault();
            // $.ajax({
            //     var id = "";
            //     url:SITEURL+"admin/unlockStatus/"+id;
                
            // });

            // });
            $('body').on('click', '#detail-customer', function(){
                $('.datacustomer').hide();
                $('.datadetailcustomer').show();
                var local_code = $(this).data('local_code');
                
                $('#detailcustomertable').DataTable({
                    // processing :true;
                    // serverside : true;
                    ajax :
                    {
                        url : "{{'/admin/detailcustomer/".local_code."'}}"
                    },
                    columns:
                    [
                        {
                            data:"local_code", 
                            name :"local_code",
                            orderable : true
                        },
                        {
                            data:"name", 
                            name:"name"
                        },
                        {
                            data:"created_at", 
                            name:"created_at"
                        },
                        {
                            data:"update_at", 
                            name:"update_at"
                        } 
                    ],
                });
                
            });
        });
    </script>

@endsection 
