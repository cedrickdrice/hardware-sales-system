<!DOCTYPE html>
<html class="no-js" lang="en">
<head>

	<title>SAM</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<!-- *** JQUERY *** -->

	<!-- Bootstrap jquery --><script type="text/javascript" src="{{asset('assets/jquery/code-jquery-3.2.1.slim.min.js')}}"></script>
	<!-- jquery --><script type="text/javascript" src="{{asset('assets/jquery/jquery-3.3.1.min.js')}}"></script>
	<!-- dragabilly --><script type="text/javascript" src="{{asset('assets/jquery/dragabilly.pkgd.js')}}"></script>
	
	<!-- custom css --><link rel="stylesheet" type="text/css" href="{{asset('assets/custom/css/style.css')}}">
	@include('includes/links-styles')
	<script>document.documentElement.className = 'js';</script>

</head>
<body class="demo-1">
	
	<div class="top_nav">
		<div class="container">
			<ul class="m-0 p-0">
				<li><a href="#"><img src=""><img src="{{asset('assets/images/facebook.png')}}" height="15px"></a></li>
				<li><a href="#"><img src=""><img src="{{asset('assets/images/twitter.png')}}" height="15px"></a></li>
				<li><a href="#"><img src=""><img src="{{asset('assets/images/instagram.png')}}" height="15px"></a></li>
				<li><a href="#"><img src=""><img src="{{asset('assets/images/google.png')}}" height="15px"></a></li>
			</ul>
		</div>
	</div>
	<div class="mdl-layout mdl-js-layout mdl-shadow--4dp" id="mdl-layout">
	  <header class="mdl-layout__header">
		    <div class="mdl-layout__header-row px-0">
		      	<!-- Title -->
		      	<span class="mdl-layout-title px-3 h-100">
		      		<a href="#"><img src="{{asset('assets/images/logo.png')}}" class="mt-3"></a>
		      	</span>
		      	<nav class="mdl-navigation mdl-navigation1">
			        <a class="mdl-navigation__link text-uppercase Lspacing2" href="home.php">Home</a>
			        <a class="mdl-navigation__link text-uppercase Lspacing2" href="shop.php">Shop</a>
		      	</nav>
		      	<!-- Add spacer, to align navigation to the right -->
		      	<div class="mdl-layout-spacer"></div>
		      	<!-- Navigation -->
		      	<nav class="mdl-navigation mdl-navigation2">
			        <a class="mdl-navigation__link" href="{{url('/wishlist')}}"><i class="ion-ios-heart-outline"></i></a>
			        <a class="mdl-navigation__link" href=""><i class="ion-ios-cart-outline"></i></a>
			        <a class="mdl-navigation__link" href="signin.php"><i class="ion-ios-contact-outline"></i></a>
		      	</nav>
		    </div>
	  	</header>
	  	<div class="mdl-layout__drawer">
	    	<span class="mdl-layout-title">Title</span>
	    	<nav class="mdl-navigation">
	      		<a class="mdl-navigation__link" href="">Link</a>
	      		<a class="mdl-navigation__link" href="">Link</a>
	      		<a class="mdl-navigation__link" href="">Link</a>
	      		<a class="mdl-navigation__link" href="">Link</a>
	    	</nav>
	  	</div>
	</div>
