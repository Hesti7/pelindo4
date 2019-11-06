@extends('/admin/MasterAdminView')

@section('judul halaman','History Data Customer')

@section('konten')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h2 class="card-title">DATA HISTORI TRANSAKSI LOCK</h2>
                <h6 class="card-subtitle">Data Transaksi Customer History Lock/Unlock Piutang</h6>
                <div class="table-responsive m-t-40">
                    <table id="detailcustomertable" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th width="75px">Kode Lokal</th>
                                <th>Username Admin</th>
                                <th>Kantor Cabang</th>
                                <th>Waktu</th>
                                <th>File</th>
                                <th width="1px">Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            
                     
                          
                        </tbody>
                    </table>
                </div>
                <br><a href="?mod=datacustomer" class="btn btn-success">Kembali</a>
            </div>
        </div>
    </div>
</div>

<script>
    jQuery(document).ready(function(){
        $('#detailcustomertable').DataTable({
            processing :true;
            serverside : true;
            ajax :
            {
                url : "{{'/admin/getdetailcustomer'}}"
            }
        });
    });


</script>
@endsection