@extends('/admin/MasterAdminView')

@section('judul halaman','Update Password Form')

@section('konten')

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h3 class="card-title">Form Ubah Password</h3>
                <h5 class="card-subtitle">Silahkan Masukkan Password</h5>
                <form class="form pt-3"  id="updatepass" method="POST">
                {{ csrf_field() }} 
                    <div class="form-group">
                        <label>Password Lama</label>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon4"><i class="ti-lock"></i></span>
                            </div>
                            <input type="password" name="lastpass" id="lastpass" required="" class="form-control" placeholder="Konfirmasi Password Lama" aria-label="Password" aria-describedby="basic-addon4" minlength="3">
                        </div>
                    </div>
                    <hr>
                    <div class="form-group">
                        <label>Password Baru</label>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon33"><i class="ti-lock"></i></span>
                            </div>
                            <input type="password" name="newpass" id="newpass" required="" class="form-control" placeholder="Password Baru" aria-label="Password" aria-describedby="basic-addon33" minlength="5">
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Konfirmasi Password Baru</label>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon4"><i class="ti-lock"></i></span>
                            </div>
                            <input type="password" class="form-control" required="" placeholder="Konfirmasi Password Baru" aria-label="Password" name="konfirpass" id="konfirpass" aria-describedby="basic-addon4" minlength="5">
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary mr-2" id ="submitbutton">Submit</button>
                    <button type="reset" class="btn btn-success">Cancel</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    jQuery(document).ready(function(){
        $('#submitbutton').click(function(e){
                e.preventDefault();
                $.ajax({
                    url :"{{'/admin/updatepassword'}}",
                    method: 'POST',
                    data:{
                        _token: '{{csrf_token()}}',
                        lastpass : $('#lastpass').val(),
                        newpass: $('#newpass').val(),
                        konfirpass : $('#konfirpass').val()
                    },
                    success: function (result){ 
                        
                            alert(result.error);
                        
                    }
                });
        });
    });
</script>
@endsection