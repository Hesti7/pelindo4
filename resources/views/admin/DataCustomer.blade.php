@extends('/admin/MasterAdminView')

@section('judul halaman','Data Customer')

@section('konten')
<link rel="stylesheet" type="text/css" href="{{url('datatables/css/datatables.bootstrap.css')}}">
<script src="{{url('datatables/js/jquery.dataTables.min.js')}}"></script>
<div class = "datacustomer">
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
                                    <th width="10%">Kode Lokal  </th>
                                    <th width="10%">Kode SAP    </th>
                                    <th width="30%">Nama Customer</th>
                                    <th width="25%">Alamat          </th>
                                    <th width="8%">Aksi         </th>
                                    <th width="2%">Status       </th>
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
</div>

<div class="datadetailcustomer">
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
                                    <th width="75px"> Kode Lokal</th>
                                    <th>Nama Customer</th>
                                    <th>Created At</th>
                                    <th>Update At</th>
                                </tr>
                            </thead>
                            <tbody>
                                
                         
                              
                            </tbody>
                        </table>
                    </div>
                    <br> <a href="?mod=datacustomer" class="btn btn-success">Kembali</a>
                </div>
            </div>
        </div>
    </div>
</div>


<script>
    jQuery(document).ready(function(){
        $('.datadetailcustomer').hide();
        $('#customerTable').DataTable({
            processing : true,
            serverside : true,
            ajax :
            {
                url:"{{'/admin/datacustomer'}}"
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
                    data:"lock_status",
                    name :"lock_status"
                }
            ],

        });

        $('body').on('click', '#detail-customer', function(){
            $('.datacustomer').hide();
            // $('.datadetailcustomer').show();
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