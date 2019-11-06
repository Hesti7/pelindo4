<!DOCTYPE html>
<html lang="en">
<head>
    <script src="//code.jquery.com/jquery.js"></script>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="_token" content="{{csrf_token()}}" />
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="{{url('/template/user/assets/images/logo.ico')}}">
    <title>
        @yield ('judul halaman')
        - PT. Pelindo 4 (Persero)
    </title>
    <!-- Bootstrap Core CSS -->
    <link href="{{url('/template/user/assets/node_modules/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{url('/template/user/assets/node_modules/perfect-scrollbar/css/perfect-scrollbar.css')}}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{url('/template/user/assets/node_modules/datatables/media/css/dataTables.bootstrap4.css')}}">
    <!-- This page CSS -->
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <!-- chartist CSS -->
    <link href="{{url('/template/user/assets/node_modules/morrisjs/morris.css')}}" rel="stylesheet">
    <!-- Vector CSS -->
    <link href="{{url('/template/user/assets/node_modules/vectormap/jquery-jvectormap-2.0.2.css')}}" rel="stylesheet" />
    <!--c3 CSS -->
    <link href="{{url('/template/user/assets/node_modules/c3-master/c3.min.css')}}" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="{{url('/template/user/css/style.css')}}" rel="stylesheet">
    <!-- Dashboard 1 Page CSS -->
    <link href="{{url('/template/user/css/pages/dashboard2.css')}}" rel="stylesheet">
    <!-- You can change the theme colors from here -->
    <link href="{{url('/template/user/css/colors/default.css')}}" id="theme" rel="stylesheet">

    
    <link rel="stylesheet" type="text/css" href="{{url('datatables/css/datatables.bootstrap.css')}}">
    
    <script src="{{url('datatables/js/jquery.dataTables.min.js')}}"></script>
</head>

<body class="fix-header fix-sidebar card-no-border">
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <!-- <div class="preloader">
        <div class="loader">
            <div class="loader__figure"></div>
            <p class="loader__label">PT. Pelindo 4 (Persero)</p>
        </div>
    </div> -->
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div id="main-wrapper">
        <!-- ============================================================== -->
        <!-- Topbar header - style you can find in pages.scss -->
        <!-- ============================================================== -->
        <header class="topbar">
            <nav class="navbar top-navbar navbar-expand-md navbar-light">
                <!-- ============================================================== -->
                <!-- Logo -->
                <!-- ============================================================== -->
                <div class="navbar-header">
                    <a class="navbar-brand" href="?mod=dashboard">
                        <!-- Logo icon --><b>
                            <!--You can put here icon as well // <i class="wi wi-sunset"></i> //-->
                            <!-- Dark Logo icon -->
                            <img src="{{url('/template/user/assets/images/logo-icon.png')}}" alt="homepage" class="dark-logo" />
                            <!-- Light Logo icon -->
                            <img src="{{url('/template/user/assets/images//logo-light-icon.png')}}" alt="homepage" class="light-logo" />
                        </b>
                        <!--End Logo icon -->
                        <!-- Logo text --><span>
                         <!-- dark Logo text -->
                         <img src="{{url('/template/user/assets/images/logo-text.png')}}" alt="homepage" class="dark-logo" />
                         <!-- Light Logo text -->    
                         <img src="{{url('/template/user/assets/images/logo-light-text.png')}}" class="light-logo" alt="homepage" /></span> </a>
                </div>
                <!-- ============================================================== -->
                <!-- End Logo -->
                <!-- ============================================================== -->
                <div class="navbar-collapse">
                    <!-- ============================================================== -->
                    <!-- toggle and nav items -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav mr-auto">
                        <!-- This is  -->
                        <li class="nav-item"> <a class="nav-link nav-toggler hidden-md-up waves-effect waves-dark" href="javascript:void(0)"><i class="sl-icon-menu"></i></a> </li>
                        <li class="nav-item"> <a class="nav-link sidebartoggler hidden-sm-down waves-effect waves-dark" href="javascript:void(0)"><i class="sl-icon-menu"></i></a> </li>
                    </ul>
                </div>
            </nav>
        </header>
        <!-- ============================================================== -->
        <!-- End Topbar header -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <aside class="left-sidebar">
    <!-- Sidebar scroll-->
    <div class="scroll-sidebar">
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav">
            <ul id="sidebarnav">
                <li><a class="waves-effect waves-dark" href="/user/dashboardview"><i class="far fa-newspaper"></i><span class="hide-menu">Dashboard</a>
                </li>
                <li class="nav-small-cap">--- Data-data</li>
                <li><a class="waves-effect waves-dark" href="/user/customerview"><i class="fas fa-users"></i><span class="hide-menu">Data Customer</a>
                </li>
                <li><a class="waves-effect waves-dark" href="/user/updatepass"><i class="fas fa-cog"></i><span class="hide-menu">Ubah Password</a>
                </li>
                <li class="nav-small-cap">--- Log Off</li>
                <li> <a class="waves-effect waves-dark" href="/logout"><i class="sl-icon-logout"></i><span class="hide-menu">Keluar</span></a>
                </li>
            </ul>
        </nav>
        <!-- End Sidebar navigation -->
    </div>
    <!-- End Sidebar scroll-->
</aside>
      
        <!-- ============================================================== -->
        <!-- End Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
                <!-- ============================================================== -->
                <!-- Page Content -->
                <!-- ============================================================== -->
                @yield('konten')
                <!-- ============================================================== -->
                <!-- End Page Content -->
                <!-- ============================================================== -->
            </div>
      
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- footer -->
            <!-- ============================================================== -->
            <footer class="footer">
                © 2019 Copyright PT. Pelindo 4 (Persero). All rights reserved.
            </footer>
            <!-- ============================================================== -->
            <!-- End footer -->
            <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- End Page wrapper  -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
    <script src="/template/user/assets/node_modules/jquery/jquery.min.js"></script>
    <!-- Bootstrap popper Core JavaScript -->
    <!-- <script src="assets/node_modules/bootstrap/js/popper.min.js"></script> -->
    <script src="/template/user/assets/node_modules/bootstrap/js/bootstrap.min.js"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="/template/user/assets/node_modules/ps/perfect-scrollbar.jquery.min.js"></script>
    <!--Wave Effects -->
    <script src="/template/user/js/waves.js"></script>
    <!--Menu sidebar -->
    <script src="/template/user/js/sidebarmenu.js"></script>
    <!--Custom JavaScript -->
    <script src="/template/user/js/custom.min.js"></script>
    <!-- ============================================================== -->
    <!-- This page plugins -->
    <!-- ============================================================== -->
    <!--sparkline JavaScript -->
    <script src="/template/user/assets/node_modules/sparkline/jquery.sparkline.min.js"></script>
    <!--morris JavaScript -->
    <script src="/template/user/assets/node_modules/raphael/raphael-min.js"></script>
    <script src="/template/user/assets/node_modules/morrisjs/morris.min.js"></script>
    <!--c3 JavaScript -->
    <script src="/template/user/assets/node_modules/d3/d3.min.js"></script>
    <script src="/template/user/assets/node_modules/c3-master/c3.min.js"></script>
    <!-- Vector map JavaScript -->
    <script src="/template/user/assets/node_modules/vectormap/jquery-jvectormap-2.0.2.min.js"></script>
    <script src="/template/user/assets/node_modules/vectormap/jquery-jvectormap-world-mill-en.js"></script>
    <!-- This is data table -->
    <script src="/template/user/assets/node_modules/datatables/datatables.min.js"></script>
    <!-- Chart JS -->
    <script src="/template/user/js/dashboard2.js"></script>
    <!-- ============================================================== -->
    <!-- Style switcher -->
    <!-- ============================================================== -->
</body>

</html>