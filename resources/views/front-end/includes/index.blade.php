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
	<!-- jquery --><script type="text/javascript" src="{{asset('assets/jquery/jquery-ui.js')}}"></script>
	
	<!-- custom css --><link rel="stylesheet" type="text/css" href="{{asset('assets/custom/css/style.css')}}">
	<!-- custom css --><link rel="stylesheet" type="text/css" href="{{asset('assets/Animocons/css/icons.css')}}">
	@include('includes.links-styles')
	<script src="{{asset('assets/custom/js/modernizr.custom.js')}}"></script>
	<script src="{{asset('assets/custom/js/snap.svg-min.js')}}"></script>
	<script>document.documentElement.className = 'js';</script>

</head>
<body class="demo-1">
	
	<button class="mdl-button mdl-js-button mdl-js-ripple-effect mdl-button--raised mdl-button--colored mdl-button--fab cust_gradient" id="back2topBtn" data-tooltip="BACK TO TOP" data-inverted="">
		<!-- <div class="mdl-tooltip" for="back2topBtn">BACK TO TOP</div> -->
		<i class="material-icons">keyboard_arrow_up</i>
	</button>
	
	<div class="top_nav sticky-top">
		<div class="menu cross menu--1 position-relative">
						
		    <label id="openSidenav" class="position-absolute">
		      	<input type="checkbox" class="d-none" id="menuCkhBx">
		      	<svg viewBox="0 0 100 100" xmlns="http://www.w3.org/2000/svg">
		        	<path class="line--1" d="M0 40h62c13 0 6 28-4 18L35 35" />
		        	<path class="line--2" d="M0 50h70" />
		        	<path class="line--3" d="M0 60h62c13 0 6-28-4-18L35 65" />
		      	</svg>
		    </label>

	  	</div>
		<ul class="mb-0 position-relative d-flex main-nav">
			<li class="bright">
				<a href="{{url('/')}}" class="mdl-js-button mdl-js-ripple-effect position-relative">
					<div class="d-flex align-items-center justify-content-center h-100">
						<div><img src="{{asset('assets/images/logo.png')}}" height="44px"></div>
					</div>
				</a>
			</li>
			<li class="bright">
				<a href="{{url('/')}}" class="mdl-js-button mdl-js-ripple-effect position-relative Lspacing2 text-center text-uppercase">
					<div class="d-flex align-items-center justify-content-center h-100">
						<div>home</div>
					</div>
				</a>
			</li>
			<li class="bright">
				<a href="{{url('/about')}}" class="mdl-js-button mdl-js-ripple-effect position-relative Lspacing2 text-center text-uppercase">
					<div class="d-flex align-items-center justify-content-center h-100">
						<div>about</div>
					</div>
				</a>
			</li>
			<li class="bright">
				<a href="{{url('/shop')}}" class="mdl-js-button mdl-js-ripple-effect position-relative Lspacing2 text-center text-uppercase">
					<div class="d-flex align-items-center justify-content-center h-100">
						<div>shop</div>
					</div>
				</a>
			</li>
			<li class="mdl-layout-spacer"></li>
			@if (Auth::check())
			<li class="bleft">
				<a href="{{url('/wishlist')}}" class="mdl-js-button mdl-js-ripple-effect position-relative Lspacing2 text-center text-uppercase px-4">
					<div class="d-flex align-items-center justify-content-center h-100">
						<div><i class="ion-ios-heart-outline"></i></div>
					</div>
				</a>
			</li>
			<li class="bleft">
				<a href="{{url('/cart')}}" class="mdl-js-button mdl-js-ripple-effect position-relative Lspacing2 text-center text-uppercase px-4">
					<div class="d-flex align-items-center justify-content-center h-100">
						<div><i class="ion-ios-cart-outline"></i></div>
					</div>
				</a>
			</li>
			@endif
			<li class="bleft">
				<a href="#" class="mdl-js-button mdl-js-ripple-effect position-relative Lspacing2 text-center text-uppercase px-4" id="btnAccount">
					<div class="d-flex align-items-center justify-content-center h-100">
						<div><i class="ion-ios-contact-outline"></i></div>
					</div>
				</a>
				<ul class="mdl-menu mdl-menu--bottom-right mdl-js-menu mdl-js-ripple-effect" for="btnAccount">
					@if (Auth::check())
					<a href="{{url('/account')}}"><li class="mdl-menu__item">My Account</li></a>
					<a href="{{url('/logout')}}"><li class="mdl-menu__item">Logout</li></a>
					@else 
					<a href="{{url('/login')}}"><li class="mdl-menu__item">Sign in</li></a>
					@endif
				</ul>
			</li>
		</ul>
	</div>
	<nav id="sidebar" class="position-fixed text-white">
        <div class="sidebar-header position-relative">
            <a href="#" class="">
            	<div>
            		<img src="{{asset('assets/images/logo.png')}}" class="img-fluid">
            	</div>
            </a>
        </div>

        <ul class="list-unstyled components">
            <li id="snl_home">
                <a href="{{url('/')}}" aria-expanded="false" class="text-uppercase Lspacing2">Home</a>
            </li>
            <li id="snl_about">
                <a href="{{url('/about')}}" class="text-uppercase Lspacing2">About</a>
            </li>
            <li id="snl_shop">
                <a href="{{url('/shop')}}" class="text-uppercase Lspacing2">Shop</a>
            </li>
        </ul>
        <div class="menuTxt">
        	<p class="mb-0 text-uppercase cust_bold select_none lspacing2" id="menuTxt"></p>
        </div>
    </nav>
    <div class="overlay position-fixed w-100"></div>

    @yield('content')

	<div class="footer_container">
	<div class="footer1 pt-5">
	<!-- TATANGGALIN TO! -->
		<div class="container py-5">
			<div class="w-100 pt-5">
				<div class="text-center">
					<img src="{{asset('assets/images/logo.png')}}" alt="" height="100px">
				</div>
			</div>
			<h2 class="text-center text-uppercase Lspacing2 mb-5">Shopping Assistant Mirror</h2>
			<div class="container">
				<div class="row justify-content-center mb-5">
					<div class="col-sm-7">
						<p class="text-center lead">SAM is a shopping assistant mirror with augmented reality to improve the customer shopping experience.</p>
					</div>
				</div>
			</div>

		</div>
		<svg id="footer_svg" preserveAspectRatio="xMidYMax meet" class="svg-separator sep1" viewBox="0 0 1600 100" style="" data-height="100">
			<path class="" style="opacity: 1;fill: #666;" d="M1040,56c0.5,0,1,0,1.6,0c-16.6-8.9-36.4-15.7-66.4-15.7c-56,0-76.8,23.7-106.9,41C881.1,89.3,895.6,96,920,96
			C979.5,96,980,56,1040,56z"></path>
			<path class="" style="opacity: 1;fill: #666;" d="M1699.8,96l0,10H1946l-0.3-6.9c0,0,0,0-88,0s-88.6-58.8-176.5-58.8c-51.4,0-73,20.1-99.6,36.8
			c14.5,9.6,29.6,18.9,58.4,18.9C1699.8,96,1699.8,96,1699.8,96z"></path>
			<path class="" style="opacity: 1;fill: #666;" d="M1400,96c19.5,0,32.7-4.3,43.7-10c-35.2-17.3-54.1-45.7-115.5-45.7c-32.3,0-52.8,7.9-70.2,17.8
			c6.4-1.3,13.6-2.1,22-2.1C1340.1,56,1340.3,96,1400,96z"></path>
			<path class="" style="opacity: 1;fill: #666;" d="M320,56c6.6,0,12.4,0.5,17.7,1.3c-17-9.6-37.3-17-68.5-17c-60.4,0-79.5,27.8-114,45.2
			c11.2,6,24.6,10.5,44.8,10.5C260,96,259.9,56,320,56z"></path>
			<path class="" style="opacity: 1;fill: #666;" d="M680,96c23.7,0,38.1-6.3,50.5-13.9C699.6,64.8,679,40.3,622.2,40.3c-30,0-49.8,6.8-66.3,15.8
			c1.3,0,2.7-0.1,4.1-0.1C619.7,56,620.2,96,680,96z"></path>
			<path class="" style="opacity: 1;fill: #666;" d="M-40,95.6c28.3,0,43.3-8.7,57.4-18C-9.6,60.8-31,40.2-83.2,40.2c-14.3,0-26.3,1.6-36.8,4.2V106h60V96L-40,95.6
			z"></path>
			<path class="" style="opacity: 1;fill: #333;" d="M504,73.4c-2.6-0.8-5.7-1.4-9.6-1.4c-19.4,0-19.6,13-39,13c-19.4,0-19.5-13-39-13c-14,0-18,6.7-26.3,10.4
			C402.4,89.9,416.7,96,440,96C472.5,96,487.5,84.2,504,73.4z"></path>
			<path class="" style="opacity: 1;fill: #333;" d="M1205.4,85c-0.2,0-0.4,0-0.6,0c-19.5,0-19.5-13-39-13s-19.4,12.9-39,12.9c0,0-5.9,0-12.3,0.1
			c11.4,6.3,24.9,11,45.5,11C1180.6,96,1194.1,91.2,1205.4,85z"></path>
			<path class="" style="opacity: 1;fill: #333;" d="M1447.4,83.9c-2.4,0.7-5.2,1.1-8.6,1.1c-19.3,0-19.6-13-39-13s-19.6,13-39,13c-3,0-5.5-0.3-7.7-0.8
			c11.6,6.6,25.4,11.8,46.9,11.8C1421.8,96,1435.7,90.7,1447.4,83.9z"></path>
			<path class="" style="opacity: 1;fill: #333;" d="M985.8,72c-17.6,0.8-18.3,13-37,13c-19.4,0-19.5-13-39-13c-18.2,0-19.6,11.4-35.5,12.8
			c11.4,6.3,25,11.2,45.7,11.2C953.7,96,968.5,83.2,985.8,72z"></path>
			<path class="" style="opacity: 1;fill: #333;" d="M743.8,73.5c-10.3,3.4-13.6,11.5-29,11.5c-19.4,0-19.5-13-39-13s-19.5,13-39,13c-0.9,0-1.7,0-2.5-0.1
			c11.4,6.3,25,11.1,45.7,11.1C712.4,96,727.3,84.2,743.8,73.5z"></path>
			<path class="" style="opacity: 1;fill: #333;" d="M265.5,72.3c-1.5-0.2-3.2-0.3-5.1-0.3c-19.4,0-19.6,13-39,13c-19.4,0-19.6-13-39-13
			c-15.9,0-18.9,8.7-30.1,11.9C164.1,90.6,178,96,200,96C233.7,96,248.4,83.4,265.5,72.3z"></path>
			<path class="" style="opacity: 1;fill: #333;" d="M1692.3,96V85c0,0,0,0-19.5,0s-19.6-13-39-13s-19.6,13-39,13c-0.1,0-0.2,0-0.4,0c11.4,6.2,24.9,11,45.6,11
			C1669.9,96,1684.8,96,1692.3,96z"></path>
			<path class="" style="opacity: 1;fill: #333;" d="M25.5,72C6,72,6.1,84.9-13.5,84.9L-20,85v8.9C0.7,90.1,12.6,80.6,25.9,72C25.8,72,25.7,72,25.5,72z"></path>
			<path class="" style="fill: #111;" d="M-40,95.6C20.3,95.6,20.1,56,80,56s60,40,120,40s59.9-40,120-40s60.3,40,120,40s60.3-40,120-40
			s60.2,40,120,40s60.1-40,120-40s60.5,40,120,40s60-40,120-40s60.4,40,120,40s59.9-40,120-40s60.3,40,120,40s60.2-40,120-40
			s60.2,40,120,40s59.8,0,59.8,0l0.2,143H-60V96L-40,95.6z"></path>
		</svg>
	</div><!-- END FOOTER 1 -->

	<!-- <div class="footer2 pb-5">
		<div class="container">
			
			<div class="row">
				<div class="col-sm-3">
					<h2 class="text-white Lspacing2 mt-5">SAM</h2>
					<p class="text-white pt-2">SAM is a shopping assistant mirror with augmented reality to improve the customer shopping experience.</p>
				</div>
				<div class="col-sm-3">
					<h2 class="text-white Lspacing2 mt-5">SITE MAP</h2>
					<div class="sitemap">
						<ul class="m-0 p-0">
							<li><a href="{{url('/')}}">Home</a></li>
							<li><a href="{{url('/shop')}}">Shop</a></li>
							<li><a href="{{url('/cart')}}">Cart</a></li>
							<li><a href="{{url('/account')}}">Account</a></li>
						</ul>
					</div>
				</div>
				<div class="col-sm-6">
					<h2 class="text-white Lspacing2 mt-5">CONTACT US</h2>
					<div class="contactus">
						<form>
							<div class="row">
								<div class="col-sm-12 col-md-12 col-lg-9">
									<input type="text" name="" placeholder="NAME *" class="mb-3 p-3 radius3 mdl-shadow--4dp w-100" autocomplete="off">
								</div>
								<div class="col-sm-12 col-md-12 col-lg-9">
									<input type="text" name="" placeholder="EMAIL *" class="mb-3 p-3 radius3 mdl-shadow--4dp w-100" autocomplete="off">
								</div>
								<div class="col-sm-12 col-md-12 col-lg-9">
									<textarea  name="" placeholder="MESSAGE *" class="mb-3 p-3 radius3 mdl-shadow--4dp w-100" rows="6"></textarea>
								</div>
								<div class="col-sm-12 col-md-12 col-lg-9"><button class="mdl-button mdl-js-button mdl-js-ripple-effect mdl-button--raised mdl-button--colored w-100 myButton3">submit</button>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>

		</div>
	</div> --><!-- END FOOTER 2 -->
	
	<div class="footer3 py-3">

		<div class="container">
			
			<div class="d-flex justify-content-center">
				<div class="text-white mb-3">
					<a href="#" class="text-white mr-2">FAQs</a>|
					<a href="#" class="text-white mr-2">Privacy</a>|
					<a href="#" class="text-white">Terms of Service</a>
				</div>
			</div>
			<p class="text-white text-center">SAM © 2018-2019</p>

		</div>
	</div><!-- END FOOTER 3 -->
	</div>
</body>
    @yield('js')
    <script>
  //   	$(document).ready(function(){
	 //       	if ($('.top_nav').width() <= 767 ){
	 //       		$('.top_nav').addClass('sticky-top')
	 //       	}
		// })
  //   	$(window).resize(function(){
	 //       	if ($('.top_nav').width() <= 767 ){
	 //       		$('.top_nav').addClass('sticky-top')
	 //       	}
		// })
    </script>
</html>

