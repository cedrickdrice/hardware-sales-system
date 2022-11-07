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

	<!-- amcharts --><script src="{{asset('assets/amcharts/amcharts/amcharts.js')}}"></script>
	<!-- amcharts --><script src="{{asset('assets/amcharts/amcharts/serial.js')}}"></script>
	<!-- amcharts --><script src="{{asset('assets/amcharts/amcharts/plugins/export/export.min.js')}}"></script>
	<!-- amcharts --><link rel="stylesheet" type="text/css" href="{{asset('assets/amcharts/amcharts/plugins/export/export.css')}}">
	<!-- amcharts --><script src="{{asset('assets/amcharts/amcharts/themes/light.js')}}"></script>

	
	<!-- custom css --><link rel="stylesheet" type="text/css" href="{{asset('assets/custom/css/admin.css')}}">
    <!-- additional css --><link rel="stylesheet" type="text/css" href="{{asset('assets/custom/css/col5.css')}}">
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
							<!-- <li class="prodSNL"><a class="d-flex align-content-center position-relative mdl-js-button mdl-js-ripple-effect" href="{{URL('admin/products/')}}"><i class="material-icons mx-4 align-self-center">layers</i>PRODUCTS</a></li> -->
							<li class="logSNL"><a class="d-flex align-content-center position-relative mdl-js-button mdl-js-ripple-effect" href="{{URL('admin/logtrail/')}}"><i class="material-icons mx-4 align-self-center">assignment</i>LOG TRAIL</a></li>
							<li class="audSNL"><a class="d-flex align-content-center position-relative mdl-js-button mdl-js-ripple-effect" href="{{URL('admin/audittrail/')}}"><i class="material-icons mx-4 align-self-center">subtitles</i>AUDIT TRAIL</a></li>
							
							<!-- <li class="mesSNL"><a class="d-flex align-content-center position-relative mdl-js-button mdl-js-ripple-effect" href="{{URL('admin/messages/')}}"><i class="material-icons mx-4 align-self-center">message</i>MESSAGES</a></li> -->
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
				<a class="codrops-icon d-flex align-content-center px-3" id="openSidenav">
					<i class="material-icons align-self-center">account_circle</i>
				</a>
				<input type="checkbox" name="" id="menuCkhBx" class="d-none">
			</li> -->
			<!-- <li class="float-right cust_li" id="notif_drp">
				<a class="codrops-icon d-flex align-content-center px-3" href="#">
					<i class="material-icons align-self-center mdl-badge mdl-badge--overlap m-0" data-badge="2">notifications_none</i>
				</a>
			</li>
			<ul class="mdl-menu mdl-menu--bottom-right mdl-js-menu mdl-js-ripple-effect" for="notif_drp">
			  <li class="mdl-menu__item">Some Action</li>
			  <li class="mdl-menu__item">Another Action</li>
			  <li class="mdl-menu__item">Yet Another Action</li>
			</ul> -->
			<!-- <li class="float-right cust_li" id="msg_drp">
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
	<nav id="sidebar" class="position-fixed">
        <div class="sidebar-header position-relative">
            <a href="#" class="d-block">
            	<img src="{{asset('assets/images/logo.png')}}" class="w-100">
            </a>
        </div>
        <div class="container account_form">
        	<form>
                <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label w-100">
                    <input class="mdl-textfield__input" type="text" id="name" name="name">
                    <label class="mdl-textfield__label" for="name">Name</label>
                </div>
                <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label w-100">
                    <input class="mdl-textfield__input" type="text" id="username" name="username">
                    <label class="mdl-textfield__label" for="username">Username</label>
                </div>
                <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label w-100">
                    <input class="mdl-textfield__input" type="text" id="email" name="email">
                    <label class="mdl-textfield__label" for="email">Email</label>
                </div>
                <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label w-100">
                    <input class="mdl-textfield__input" type="password" id="password" name="password">
                    <label class="mdl-textfield__label" for="password">Password</label>
                </div>
                <center>
	                <button class="myButton1 mdl-button mdl-js-button mdl-js-ripple-effect mdl-button--raised mdl-button--colored w-50 my-3">
	                	update
	                </button>
                </center>
        	</form>
        </div>
        <div class="menuTxt">
        	<p class="mb-0 text-uppercase select_none lspacing2" id="menuTxt">account</p>
        </div>
    </nav>
    <div class="overlay position-fixed w-100"></div>

    @yield('content')
	
</body>

	<!-- custom js -->
	<script type="text/javascript" src="{{asset('assets/custom/js/admin.js')}}"></script>
    @yield('js')
	<script src="{{asset('js/backend.js')}}"></script>
	<script>
		new gnMenu( document.getElementById( 'gn-menu' ) )
	</script>

</html>