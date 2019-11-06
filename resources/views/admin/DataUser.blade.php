@extends('/admin/MasterAdminView')

@section('judul halaman','Data User')

@section('konten')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h2 class="card-title">Data User</h2>
                <!-- <h6 class="card-subtitle">Data table example</h6> -->
                <div class="table-responsive m-t-40">
                    <button type="button" class="btn btn-info"data-toggle="modal" data-target="#formuser" data-whatever="@mdo"><i class="fa fa-plus-circle"></i> Tambah baru</button>
                    <br></br>
                    <table id="userTable" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Nama</th>
                                <th>Email</th>
                                <th>Hak Akses</th>
                                <th>Pelabuhan</th>
                                <th width="15%">Aksi</th>
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

<div class="modal fade" id="formuser" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="exampleModalLabel1">Form Tambah User</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="false">&times;</span></button>
                </div>
                <div class="modal-body">
                    <form id="form-login" method="POST" >
                    {{csrf_field()}}
                        <div class="form-group">
                            <label for="recipient-name" class="control-label">Name:</label>
                            <input type="text" name="namauser" id="namauser" class="form-control" required="" minlength="5">
                        </div>
                        <div class="form-group">
                            <label for="recipient-name" class="control-labsel">Email:</label>
                            <input type="text" name="email" id="emailuser" class="form-control" required="" minlength="5">
                        </div>
                        <div class="form-group">
                            <label for="message-text" class="control-label">Password:</label>
                            <input type="password" name="pbaru" id="password1" class="form-control" required="" minlength="5">
                        </div>
                        <div class="form-group">
                            <label for="message-text" class="control-label">Re-type Password:</label>
                            <input type="password" name="repbaru" id="password2" class="form-control" required="" minlength="5">
                        </div>
                        <div class="form-group">
                            <label for="message-text" class="control-label">Pilih Cabang:</label>
                            <select class="custom-select col-12" name="cabang" id="cabang" required="">
                                <option selected="" value="">--- Pilih Cabang ---</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="message-text" class="control-label">Pilih Hak Akses:</label>
                            <select class="custom-select col-12" name="hakakses" id="hakakses" required="">
                                <option selected="" value="">--- Pilih Hak Akses ---</option>
                                <option value="1">User</option>
                                <option value="2">Administrator</option>
                            </select>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                            <button type="submit" class="btn btn-primary" id="simpanuser">Simpan !</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
</div>

<script>
    var SITEURL = '{{URL::to('')}}';
    jQuery(document).ready(function(){
        $('#userTable').DataTable({
            processing : true,
            serverside : true,
            ajax :
            {
                url: SITEURL + "/admin/userdata",
            },
            columns:
            [
                {
                    data:"iduser",
                    name:"iduser",
                    orderable : true
                },{
                    data:"name",
                    name:"name",
                    orderable : true
                },
                {
                    data:"email",
                    name:"email"
                },
                {
                    data:"role",
                    name:"role"
                },
                {
                    data:"branchname",
                    name:"branchname",
                    orderable:true
                },
                {
                    data:"aksi",
                    name:"aksi",
                    orderable : false
                }
            ],
        });

        $.ajax({
            url :SITEURL+"/admin/branchdata",
            success : function(data){
                var i;
                var html=' <option selected="" value="">--- Pilih Cabang ---</option>';
                for (i=0; i<data.length; i++){
                    html += '<option value = '+data[i].code+'>'+data[i].name+'</option>';
                    
                }
                $('#cabang').html(html);
            }
        });

        $('#simpanuser').click(function(e){
            e.preventDefault();
            $.ajax({
                url :SITEURL+"/admin/insertuser",
                method: 'POST',
                data:{
                    _token: '{{csrf_token()}}',
                    nama : $('#namauser').val(),
                    email: $('#emailuser').val(),
                    pbaru : $('#password1').val(),
                    repbaru : $('#password2').val(),
                    cabang : $('#cabang').val(),
                    hakakses : $('#hakakses').val()
                },
                success: function (result){ 
                    if (result.status=="success"){
                        alert(result.nama+"Data Berhasil Di Tambahkan!");
                        $('#userTable').DataTable().ajax.reload(); 
                        $('#formuser').modal('toggle');   
                    }else if (result.status=="gagal"){
                        alert(result.nama+"Data Gagal Di Tambahkan!");
                    } else if ((result.status=="pass")) {
                        alert("Password Berbeda!");
                    }
                    
                }
            });
        });
        $('body').on('click', '#delete-user', function(){
            var iduser = $(this).attr('data_id');
            $.ajax({
                url :SITEURL+"/admin/deleteuser/"+iduser,
                success: function (result){ 
                    alert(result.pesan);     
                    $('#userTable').DataTable().ajax.reload();             
                }
            });
        });

        $('body').on('click', '#reset-user', function(){
            var iduser = $(this).attr('data_id');
            $.ajax({
                url : SITEURL+"/admin/resetuser/"+iduser,
                success: function(result){
                    alert(result.pesan);
                    $('#userTable').DataTable().ajax.reload();
                }
            });
        });
    });

</script>

@endsection