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

	
	<!-- custom css --><link rel="stylesheet" type="text/css" href="{{asset('assets/custom/css/productPage.css')}}">
	<!-- custom css --><link rel="stylesheet" type="text/css" href="{{asset('assets/Animocons/css/icons.css')}}">
	<!-- custom css --><link rel="stylesheet" type="text/css" href="{{asset('assets/rateYo-master/min/jquery.rateyo.css')}}">
	@include('includes.links-styles')
	<script>document.documentElement.className = 'js';</script>

</head>
<body class="loading render">


<div class="content content--demo-3">
	<a href="javascript:history.back()">
		<div class="hamburger hamburger--demo-3 js-hover">
			<div class="hamburger__line hamburger__line--01">
				<div class="hamburger__line-in hamburger__line-in--01"></div>
			</div>
			<div class="hamburger__line hamburger__line--02">
				<div class="hamburger__line-in hamburger__line-in--02"></div>
			</div>
			<div class="hamburger__line hamburger__line--03">
				<div class="hamburger__line-in hamburger__line-in--03"></div>
			</div>
			<div class="hamburger__line hamburger__line--cross01">
				<div class="hamburger__line-in hamburger__line-in--cross01"></div>
			</div>
			<div class="hamburger__line hamburger__line--cross02">
				<div class="hamburger__line-in hamburger__line-in--cross02"></div>
			</div>
		</div>
	</a>
	<div class="global-menu">
		<div class="
		global-menu__wrap">
			<div class="global-menu__item global-menu__item--demo-3">

				<div class="main-container">
				 	<div class="modalContainer row" id="modalContainer">
				 		<div class="modalBGblue col-5"></div>
				 		<div class="container modal-wrapper d-flex p-0 radius5 overflow-hidden">
				 			<div class="container modal-area row m-0 p-0">

				 				<div class="modalImage col-md-6 p-0">
					 				<div id="carouselExampleIndicators" class="carousel slide">
										<ol class="carousel-indicators">
										    <!-- <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active">
										    	<img src="{{asset('storage/products/'. $product->image)}}" width="30px" height="45px">
										    </li>
										    <li data-target="#carouselExampleIndicators" data-slide-to="1" class="active">
										    	<img src="{{asset('assets/images/1.png')}}" width="30px" height="45px">
										    </li>
										    <li data-target="#carouselExampleIndicators" data-slide-to="2" class="active">
										    	<img src="{{asset('assets/images/2.png')}}" width="30px" height="45px">
										    </li>
										    <li data-target="#carouselExampleIndicators" data-slide-to="3" class="active">
										    	<img src="{{asset('assets/images/3.png')}}" width="30px" height="45px">
										    </li> -->
										</ol>
										<div class="carousel-inner">
										    <div class="carousel-item active">
										      	<img class="d-block w-100 m-100" src="{{asset('storage/products/'. $product->image)}}" alt="First slide">
										    </div>
										    <!-- <div class="carousel-item">
										      	<img class="d-block w-100 m-auto" src="{{asset('assets/images/1.png')}}" alt="Second slide">
										    </div>
										    <div class="carousel-item">
										      	<img class="d-block h-100 m-auto" src="{{asset('assets/images/2.png')}}" alt="Third slide">
										    </div>
										    <div class="carousel-item">
										      	<img class="d-block h-100 m-auto" src="{{asset('assets/images/3.png')}}" alt="Third slide">
										    </div> -->
										</div>
										
									</div>
					 			</div>


					 			<div class="modalItemDesc col-md-6 p-0 position-relative">
					 				<ul class="nav nav-tabs d-none" id="myTab" role="tablist">
									  	<li class="nav-item active">
									    	<a class="nav-link" id="prodInfo-tab" data-toggle="tab" href="#prodInfo" aria-controls="prodInfo" aria-selected="true">Home</a>
									  	</li>
									  	<li class="nav-item">
									    	<a class="nav-link" id="reviews-tab" data-toggle="tab" href="#reviews" aria-controls="reviews" aria-selected="false">Profile</a>
									  	</li>
									</ul>					 				
									<div class="tab-content" id="myTabContent">
									  	<div class="tab-pane fade h-100 show active" id="prodInfo" role="tabpanel" aria-labelledby="prodInfo-tab">
									  		<div class="modalItemDescMain d-flex align-items-end px-5 pt-5">
							 					<div class="modalItemDescWrap d-flex flex-column">
							 						<div class="modalItemCateg">
							 							<p class="lead text-primary text-uppercase">{{$product->category->name}}</p>
							 						</div>
									 				<div class="modalItemName">
									 					<h1 class="font-weight-light">{{$product->name}}</h1>
									 				</div>
									 				<div class="prodRatings">
									 					<small class="text_grayish">{{count($product->product_reviews)}} customer ratings</small>
									 				</div>
									 				<div class="modalItemPrice mt-5">
									 					<h3>₱{{$product->price}}</h3>
									 				</div>
									 				<div>
									 					<b>Stock Status: <span class="text-info">In Stock</span></b>
									 				</div>
									 				<div class="modalItemDesciprtion mt-5 mb-4 text-justify">
									 					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
									 					tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
									 					quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
									 					consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
									 					cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
									 					proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>	
									 				</div>
									 				<div class="modalItemSelsizeContainer mt-auto w-100">
									 					<div class="w-100">
									 						<div class="container">
											 					<form method="post" action="{{url('/cart/insert')}}" class="row w-100 m-0">
																 {{csrf_field()}}
																 	<input type="hidden" name="id" value="{{$product->id}}">
											 						<div class="col-lg-3 mb-3">
											 							<center>
											 								<input type="number" name="quantity" class="quantity p-3 text-center w-100" value="1" min="1">
											 							</center>
											 						</div>
											 						<div class="col-lg-7 mb-3">
											 							<center>
																			<button type="submit" class="mdl-button mdl-button--raised mdl-js-button mdl-js-ripple-effect mdl-button--colored align-self-end mt-auto myButton1 py-2 px-4 add2cart1" name="add2cart">
																				<i class="material-icons mdc-button__icon">add_shopping_cart</i>&nbsp;Add&nbsp;to&nbsp;Cart
																			</button>
																			
																			<!-- <input type="checkbox" name="" id="checkWish" > -->
													 					</center>
												 					</div>
											 						<div class="col-lg-2 mb-3">
																		<ol class="grid m-0 p-0">
																			<li class="grid__item">
																				<label for="checkWish">
																					<button class="icobutton icobutton--heart" data-check="{{$check}}" id="wishlist" type="button"><span class="fa fa-heart" id="wishlist_span"></span></button>
																				</label>
																			</li>
																		</ol>
												 					</div>
												 				</form>
										 					</div>
									 					</div>
									 				</div>
									 			</div>
							 				</div>
									  	</div>
									  	<div class="tab-pane fade" id="reviews" role="tabpanel" aria-labelledby="reviews-tab">

									  		<div class="p-5">
									  			<div class="modalItemCateg">
						 							<p class="lead text-primary text-uppercase">{{$product->category->name}}</p>
						 						</div>
								 				<div class="modalItemName mb-4">
								 					<h1 class="font-weight-light">{{$product->name}}  </h1>
								 				</div>
								 				<div class="prodRating_graph mb-3">
								 					<div class="row">
								 						<div class="col-sm-6">
								 							<h1 class="mb-0">{{ round($product->star(), 1) }}<span class="h5 text_grayish">/5</span></h1>
								 							<div id="rateMain" class="px-0"></div>
								 							<small class="text_grayis1">{{count($product->product_reviews)}} customer ratings</small>
								 						</div>
														 
								 						<div class="col-sm-6">
														 @php $i = 5 @endphp
														 @foreach($product->starsCountGroupByRate() as $star)
															<div class="d-flex align-items-center w-100">
								 								<div id="rateYo{{ $star['star'] }}" class="px-0-mr-2 rateYo{{ $i-- }}"></div>
								 								<div class="progress w-100 mr-2">
																  	<div class="progress-bar bg-warning" role="progressbar" style="width: {{ $star['percent'] }}%;"  aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
																</div>
								 								<p>{{ $star['count'] }}</p>
								 							</div>
														 @endforeach 
								 						</div>
													
								 					</div>
								 				</div>
									  		</div>
									</div>
									<nav class="cust_tabs1 p-0 d-flex w-100">
							            <div class="cust_selector1" id="cust_selector1"></div>
							            <a href="#" class="active mdl-js-button mdl-js-ripple-effect w-50 text-center" id="prodInfo1">PRODUCT DETAILS</a>
							        </nav>
					 			</div>

				 			</div>
				 		</div>
				 	</div>
				</div>

			</div>
		</div>
	</div>
	<svg class="shape-overlays" viewBox="0 0 100 100" preserveAspectRatio="none">
		<path class="shape-overlays__path"></path>
		<path class="shape-overlays__path"></path>
		<path class="shape-overlays__path"></path>
	</svg>
</div>


<input type="hidden" name="" id="hidden_snackbar" value="{{$snackbar}}">

<script>
	$(document).on('load',function(){
		$('.hamburger').toggle('click')
	})
</script>
</body>

<!-- shape_overlay --><script type="text/javascript" src="{{asset('assets/custom/js/easings.js')}}"></script>
<!-- shape_overlay --><script type="text/javascript" src="{{asset('assets/custom/js/shape_overlay.js')}}"></script>
<!-- shape_overlay --><script type="text/javascript" src="{{asset('assets/jquery/jquery-ui.js')}}"></script>
<!-- custom js --><script type="text/javascript" src="{{asset('assets/custom/js/script.js')}}"></script>
<!-- custom js --><script type="text/javascript" src="{{asset('assets/Animocons/js/mo.min.js')}}"></script>
<!-- custom js --><script type="text/javascript" src="{{asset('assets/Animocons/js/demo.js')}}"></script>
<!-- custom js --><script type="text/javascript" src="{{asset('assets/rateYo-master/min/jquery.min.js')}}"></script>
<!-- custom js --><script type="text/javascript" src="{{asset('assets/rateYo-master/min/jquery.rateyo.min.js')}}"></script>
@include('includes.links-scripts')
	<script>
	var checker = 0
	$(document).ready(function(){



		
		var b = $('#wishlist').data('check')
		console.log(b) 

			if ( $('#hidden_snackbar').val() !== "" ) {
				alert($('#hidden_snackbar').val())
			} 
			});
			$('#reviews1').click(function(){
				$('.nav-tabs > .active').next('li').find('a').trigger('click')
			})
			$('#prodInfo1').click(function(){
				$('.nav-tabs > .active > a').trigger('click')
			})

		$("#wishlist").on('click',function(){
			if (checker != 0 ) {

				let url
				if ($(this).hasClass('wishlist_active')) {
					url = "{{ URL('/wishlist/add-item/') }}/{{ $product->id }}"
				} else {
					url = "{{ URL('/wishlist/remove-item/') }}/{{ $product->id }}"
				}

				$.ajax({
					url 	: url,
					type	: 'get',
					success : function(data) {
						console.log(data)
					},
					error 	: function(data) {
						console.log(data)
					}
				})
			}

		})

		@if($check === 0) 
			$("#wishlist").click()
		@endif
		checker = 1

	</script>

</html>
