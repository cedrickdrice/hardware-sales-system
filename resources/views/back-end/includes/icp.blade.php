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
	<!-- moment.js --><script type="text/javascript" src="{{asset('assets/Bootstrap/moment.js')}}"></script>

	<!-- custom css --><link rel="stylesheet" type="text/css" href="{{asset('assets/custom/css/admin.css')}}">
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
								<!-- <a href="{{URL('icp/dashboard/')}}" class="d-flex align-content-center position-relative mdl-js-button mdl-js-ripple-effect"><i class="material-icons mx-4 align-self-center">dashboard</i>DASHBOARD</a> -->
								<!-- <ul class="gn-submenu">
									<li><a class="gn-icon gn-icon-illustrator">Vector Illustrations</a></li>
									<li><a class="gn-icon gn-icon-photoshop">Photoshop files</a></li>
								</ul> -->
							</li>
							<li class="prodSNL"><a class="d-flex align-content-center position-relative mdl-js-button mdl-js-ripple-effect" href="{{URL('icp/products/')}}"><i class="material-icons mx-4 align-self-center">layers</i>PRODUCT MANAGEMENT</a></li>
							<li class="retSNL"><a class="d-flex align-content-center position-relative mdl-js-button mdl-js-ripple-effect" href="{{URL('icp/return/')}}"><i class="material-icons mx-4 align-self-center">reply</i>RETURN ITEMS</a></li>
							<li class="ordersSNL"><a class="d-flex align-content-center position-relative mdl-js-button mdl-js-ripple-effect" href="{{URL('icp/orders/')}}"><i class="material-icons mx-4 align-self-center">view_list</i>ORDER MANAGEMENT</a></li>
							<li class="categSNL"><a class="d-flex align-content-center position-relative mdl-js-button mdl-js-ripple-effect" href="{{URL('icp/categories/')}}"><i class="material-icons mx-4 align-self-center">apps</i>CATEGORY MANAGEMENT</a></li>
							<li class="repSNL"><a class="d-flex align-content-center position-relative mdl-js-button mdl-js-ripple-effect" href="{{URL('icp/reports/')}}"><i class="material-icons mx-4 align-self-center">timeline</i>REPORTS</a></li>
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
			<li class="float-right cust_li"><div class="d-flex align-items-center px-4 h-100"><p class="text-uppercase"><small><b>{{Auth()->user()->type}}</b></small></p></div></li>
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
    @yield('js')
	@include('back-end.includes.links-scripts-admin')

</html>