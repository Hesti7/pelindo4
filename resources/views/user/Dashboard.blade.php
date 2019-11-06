@extends('/user/MasterUserView')

@section('judul halaman','Dashboard')

@section('konten')
<script src="https://code.jquery.com/jquery-3.3.1.js"></script>
<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
<div class="row" onload="dataDashboard()">
    <!-- Column -->
    <div class="col-lg-3 col-md-6">
        <div class="card">
            <div class="card-body">
                <div class="d-flex p-10 no-block">
                    <div class="align-self-center display-6 m-r-20"><i class="text-success fas fa-building"></i></div>
                    <div class="align-slef-center">
                        <h2 id="totalcabang" class="m-b-0"><small><i class="text-danger"></i></small></h2>
                        <h6 class="text-muted m-b-0">Total Cabang Pelindo 4</h6>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Column -->
    <!-- Column -->
    <div class="col-lg-3 col-md-6">
        <div class="card" style="cursor: pointer;" onclick="sortcustomer()">
            <div class="card-body">
                <div class="d-flex p-10 no-block">
                    <div class="align-self-center display-6 m-r-20"><i class="text-info sl-icon-people"></i></div>
                    <div class="align-slef-center">
                        <h2 id="totalcustomer" class="m-b-0"><small><i class="text-success"></i></small></h2>
                        <h6 class="text-muted m-b-0">Total Customer</h6>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Column -->
    <!-- Column -->
    <div class="col-lg-3 col-md-6">
        <div class="card" style="cursor: pointer;" onclick="sortunlock()">
            <div class="card-body">
                <div class="d-flex p-10 no-block">
                    <div class="align-self-center display-6 m-r-20"><i class="text-primary sl-icon-user-following"></i></div>
                    <div class="align-slef-center">
                        <h2 id="totalunlockcustomer" class="m-b-0"><small><i class="text-success"></i></small></h2>
                        <h6 class="text-muted m-b-0">Customer Unlocked</h6>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Column -->
    <!-- Column -->
    <div class="col-lg-3 col-md-6">
        <div class="card" style="cursor: pointer;" onclick="sortlock()">
            <div class="card-body">
                <div class="d-flex p-10 no-block">
                    <div class="align-self-center display-6 m-r-20"><i class="text-danger sl-icon-user-unfollow"></i></div>
                    <div class="align-slef-center">
                        <h2 id="totallockcustomer"class="m-b-0"><small><i class="text-danger"></i></small></h2>
                        <h6 class="text-muted m-b-0">Customer Locked</h6>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Column -->
    <!-- Column -->
</div>

<script>
        jQuery(document).ready(function(){
     
            $.ajax({
                url:"{{'/user/dashboarddata'}}",
                success:function (result){
                    obj = JSON.parse(result);
                    document.getElementById('totalcabang').innerHTML=obj.branch;
                    document.getElementById('totalcustomer').innerHTML=obj.customer;
                    document.getElementById('totalunlockcustomer').innerHTML=obj.unlockcustomer;
                    document.getElementById('totallockcustomer').innerHTML=obj.lockcustomer;
                }
            });
        });
    
        
    </script>



@endsection