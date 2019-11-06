
<!DOCTYPE html>
<html>
<head>
<title>Aplikasi Lock Piutang - PT. Pelindo 4</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
	 <script>
        addEventListener("load", function () {
            setTimeout(hideURLbar, 0);
        }, false);

        function hideURLbar() {
            window.scrollTo(0, 1);
        }
    </script>
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
	<!-- Custom Theme files -->
	<link href="{{asset('/template/css/style.css')}}" rel="stylesheet" type="text/css" media="all" />
	<link href="{{asset('/template/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css" media="all" />
	<!-- //Custom Theme files -->
	<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
	<!-- web font -->
	<link href="//fonts.googleapis.com/css?family=Hind:300,400,500,600,700" rel="stylesheet">
	<!-- //web font -->
	<link rel="shortcut icon" href="{{url('/template/images/logo.ico')}}" />
	
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	
	
</head>
<body>

<!-- main -->
<div class="w3layouts-main"> 
	<div class="bg-layer">
		<h1>Aplikasi LOCK PIUTANG</h1>
		<div class="header-main">
			<div class="main-icon">
				<img src="{{url('/template/images/logo pelindo.png')}}" style="max-height: 150px;">
			</div>
			<div class="header-left-bottom">
				@if(\Session::has('error'))
					<div class="alert alert-danger">
						<div>{{Session::get('alert')}}</div>
					</div>
				@endif
				@if(\Session::has('sukses'))
					<div class="alert alert-success">
						<div>{{Session::get('alert-success')}}</div>
					</div>
				@endif
				<form action="/ceklogin" id="formlogin", method="post">
					{{ csrf_field() }} 
					<div class="icon1">
						<span class="fa fa-user"></span>
						<input type="text" required="" placeholder="email" name="email" id="txt_username" required=""/>
					</div>
					<div class="icon1">
						<span class="fa fa-lock"></span>
						<input type="password" required="" placeholder="Password" name="password" id="txt_password" required=""/>
					</div>
					<div class="bottom">
						<button class="btn" type="submit">Log In</button>
					</div>
					<div class="links">
						<p><a href="https://helpdesk.inaport4.co.id/auth/cekSession.action" target="blank">Forgot Password?</a></p>
						<div class="clear"></div>
					</div>
				</form>	
			</div>
		</div><br><br>
		<!-- copyright -->
		<div class="copyright">
			<p>© 2019 Copyright PT. Pelindo 4 (Persero). All rights reserved.</p>
		</div>
		<!-- //copyright --> 
	</div>
</div>	
<!-- //main -->

</body>
</html>