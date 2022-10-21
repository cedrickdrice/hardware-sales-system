<!DOCTYPE html>
<html class="no-js" lang="en">
<head>

	<title>@yield('title')</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<link rel="icon" type="img/icon" href="{{asset('assets/images/logo.png')}}">
	<!-- *** JQUERY *** -->

	<!-- Bootstrap jquery --><script type="text/javascript" src="{{asset('assets/jquery/code-jquery-3.2.1.slim.min.js')}}"></script>
	<!-- jquery --><script type="text/javascript" src="{{asset('assets/jquery/jquery-3.3.1.min.js')}}"></script>
	<!-- dragabilly --><script type="text/javascript" src="{{asset('assets/jquery/dragabilly.pkgd.js')}}"></script>
	<!-- moment.js --><script type="text/javascript" src="{{asset('assets/Bootstrap/moment.js')}}"></script>
	
	<!-- amcharts --><script src="{{asset('assets/amcharts/amcharts/amcharts.js')}}"></script>
	<!-- amcharts --><script src="{{asset('assets/amcharts/amcharts/serial.js')}}"></script>
	<!-- amcharts --><script src="{{asset('assets/amcharts/amcharts/plugins/export/export.min.js')}}"></script>
	<!-- amcharts --><link rel="stylesheet" type="text/css" href="{{asset('assets/amcharts/amcharts/plugins/export/export.css')}}">
	<!-- amcharts --><script src="{{asset('assets/amcharts/amcharts/themes/light.js')}}"></script>
	
	<!-- custom css --><link rel="stylesheet" type="text/css" href="{{asset('assets/custom/css/admin.css')}}">
    <!-- additional css --><link rel="stylesheet" type="text/css" href="{{asset('assets/custom/css/col5.css')}}">
	@include('includes.links-styles')
	<script>document.documentElement.className = 'js';</script>

</head>
<body>
	<div class="container">
		<ul id="gn-menu" class="gn-menu-main">
			<li class="gn-trigger">
				<a class="gn-icon gn-icon-menu"><span>Menu</span></a>
				<nav class="gn-menu-wrapper">
					<div class="gn-scroller">
						<ul class="gn-menu">
							<li class="dashSNL">
								<a href="{{URL('admin/dashboard/')}}" class="d-flex align-content-center position-relative mdl-js-button mdl-js-ripple-effect"><i class="material-icons mx-4 align-self-center">dashboard</i>DASHBOARD</a>
								<!-- <ul class="gn-submenu">
									<li><a class="gn-icon gn-icon-illustrator">Vector Illustrations</a></li>
									<li><a class="gn-icon gn-icon-photoshop">Photoshop files</a></li>
								</ul> -->
							</li>
							<li class="logSNL"><a class="d-flex align-content-center position-relative mdl-js-button mdl-js-ripple-effect" href="{{URL('admin/logtrail/')}}"><i class="material-icons mx-4 align-self-center">assignment</i>LOG TRAIL</a></li>
							<li class="audSNL"><a class="d-flex align-content-center position-relative mdl-js-button mdl-js-ripple-effect" href="{{URL('admin/audittrail/')}}"><i class="material-icons mx-4 align-self-center">subtitles</i>AUDIT TRAIL</a></li>
						</ul>
					</div><!-- /gn-scroller -->
				</nav>
			</li>

			
			<li><a href="#" class="position-relative d-block px-2">
				<div class="position-relative">
					<img src="{{asset('assets/images/logo.png')}}" alt="" class="" height="40px">
				</div>
			</a></li>
			<li class="float-right cust_li">
				<a class="codrops-icon d-flex align-content-center px-3" href="{{url('/logout')}}">
					<i class="material-icons align-self-center">exit_to_app</i>
				</a>
			</li>
			<li class="float-right cust_li"><div class="d-flex align-items-center px-2 h-100"><p class="text-uppercase"><small><b>{{Auth()->user()->type}}</b></small></p></div></li>
			<!-- <li class="float-right cust_li">
				<a class="codrops-icon d-flex align-content-center px-3" href="#">
					<i class="material-icons align-self-center">account_circle</i>
				</a>
			</li>
			<li class="float-right cust_li" id="msg_drp">
				<a class="codrops-icon d-flex align-content-center px-3" href="#">
					<i class="material-icons align-self-center mdl-badge mdl-badge--overlap m-0" data-badge="10">mail_outline</i>
				</a>
			</li>
			<ul class="mdl-menu mdl-menu--bottom-right mdl-js-menu mdl-js-ripple-effect" for="msg_drp">
			  <li class="mdl-menu__item">Some Action</li>
			  <li class="mdl-menu__item">Another Action</li>
			  <li class="mdl-menu__item">Yet Another Action</li>
			</ul> -->
		</ul>
		
	</div><!-- /container -->

    @yield('content')
	
</body>

	<!-- custom js --><script type="text/javascript" src="{{asset('assets/custom/js/admin.js')}}"></script>
	@include('back-end.includes.links-scripts-admin')
    @yield('js')

</html>