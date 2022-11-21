@extends('front-end.includes.index')

@section('title')
    Home | {{ $configuration->name }}
@endsection
@section('content')

<div class="cust_snackbar snackBar-label p-3 mdl-shadow--4dp">
    <div class="text-white mb-3 label-text">

    </div>
</div>

<!-- custom modal for product -->
<div class="modalDummy"></div>
    <div class="custom_modal">
        <div class="custom_modal_wrapper">
            
            <div class="h-100 position-relative">
                <span class="close-modal">
                    <span><i class="material-icons">close</i></span>
                </span>
                <div class="row h-100 w-100 m-0">

                    <div class="col-md-6 prodImgContainer">
                        <div class="py-5 d-flex align-items-center h-100">
                            <div>
                                <img src="{{asset('assets/images/yellow.png')}}" class="w-100 prodImage">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 prodDescContainer">
                        
                        <div class="h-100">
                            <div>
                                <div class="modalItemCateg">
                                    <p class="lead text-primary text-uppercase pt-5">T-Shirt</p>
                                </div>
                                <div class="modalItemName">
                                    <h1 class="font-weight-light">YELLOW SHIRT</h1>
                                </div>
                                <div class="modalItemPrice mt-5">
                                    <h3>₱300.00</h3>
                                </div>
                                <div class="modalStock">
                                    <b>Stock Status: <span class="text-info">In Stock</span></b>
                                </div>
                                <div class="mt-4">
                                    <div class="d-flex modal_item_colors">
                                        <button class="color_icon yellow mr-2 activeColor" data-color="yellow"></button>
                                        <button class="color_icon purple mr-2" data-color="purple"></button>
                                        <button class="color_icon blue mr-2" data-color="blue"></button>
                                        <button class="color_icon pink mr-2" data-color="pink"></button>
                                    </div>
                                </div>
                                <div class="modalItemDesciprtion mt-5 mb-4 text-justify">
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                                    tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                                    quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                                    consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                                    cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                                    proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>    
                                </div>

                                <div class="modalItemSelsizeContainer mt-auto w-100 mb-5">
                                    <div class="w-100">
                                        <div class="container">
                                            <form method="post" action="{{url('/cart/insert')}}" class="d-flex w-100 m-0 justify-content-center align-items-center">
                                             {{csrf_field()}}

                                                <input type="hidden" name="id" value="1">
                                                <button type="submit" class="mdl-button mdl-button--raised mdl-js-button mdl-js-ripple-effect mdl-button--colored align-self-end mt-auto myButton1 py-2 px-4 add2cart1 mr-4" name="add2cart">
                                                    <i class="material-icons mdc-button__icon">add_shopping_cart</i>&nbsp;Add&nbsp;to&nbsp;Cart
                                                </button>                                                    
                                                <ol class="grid m-0 p-0">
                                                    <li class="grid__item">
                                                        <label for="checkWish" class="mb-0">
                                                            <button class="icobutton icobutton--heart" data-check="0" id="wishlist" type="button"><span class="fa fa-heart" id="wishlist_span"></span></button>
                                                        </label>
                                                    </li>
                                                </ol>

                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                </div>
            </div>

        </div>
    </div>

<!-- end custom modal -->

<div class="main-container">

	<div class="slideshow">
		<div class="slides">
			<div class="slide slide--current">
				<div class="slide__img" style="background-image: url({{asset('assets/images/wallpaper1.jpg')}});"></div>
				<h1 class="slide__title text-white Lspacing2 text-uppercase display-4">SAM APPAREL</h1>
				<p class="slide__desc text-white">Clothes mean nothing until someone lives in them. -Marc Jacobs</p>
				<a class="slide__link mdl-button mdl-js-button mdl-js-ripple-effect mdl-button--raised mdl-button--colored myButton1 Lspacing2 py-2 px-5 d-none" href="#">Read More</a>
			</div>
			<div class="slide">
				<div class="slide__img" style="background-image: url({{asset('assets/images/wallpaper2.jpg')}});"></div>
				<h2 class="slide__title text-white Lspacing2 text-uppercase display-4">Fashion</h2>
				<p class="slide__desc text-white">When in doubt, wear read - Bill Blass</p>
				<a class="slide__link mdl-button mdl-js-button mdl-js-ripple-effect mdl-button--raised mdl-button--colored myButton1 Lspacing2 py-2 px-5 d-none" href="{{url('/shop')}}">Go to Shop</a>
			</div>
			<div class="slide">
				<div class="slide__img" style="background-image: url({{asset('assets/images/wallpaper3.jpg')}});"></div>
				<h2 class="slide__title text-white Lspacing2 text-uppercase display-4">Dress according to the theme</h2>
				<p class="slide__desc text-white">Clothes is just something you put on to cover yourself... fashion is a way to communicate. - Dries van Noten</p>
				<a class="slide__link mdl-button mdl-js-button mdl-js-ripple-effect mdl-button--raised mdl-button--colored myButton1 Lspacing2 py-2 px-5 d-none" href="#">Find out more</a>
			</div>
			<div class="slide">
				<div class="slide__img" style="background-image: url({{asset('assets/images/wallpaper4.jpg')}});"></div>
				<h2 class="slide__title text-white Lspacing2 text-uppercase display-4">Look up, Pay out, Dress up, Get out</h2>
				<p class="slide__desc text-white">"Fashion is like eating, you shouldn't stick to the same menu. - Kenzo Takada</p>
				<a class="slide__link mdl-button mdl-js-button mdl-js-ripple-effect mdl-button--raised mdl-button--colored myButton1 Lspacing2 py-2 px-5 d-none" href="#">Uncover beauty</a>
			</div>
		</div>
		<nav class="slidenav d-flex justify-content-between">
			<button class="slidenav__item slidenav__item--prev mdl-button mdl-js-button mdl-js-ripple-effect mdl-button--fab"><i class="material-icons text-white">keyboard_arrow_left</i></button>
			<button class="slidenav__item slidenav__item--next mdl-button mdl-js-button mdl-js-ripple-effect mdl-button--fab"><i class="material-icons text-white">keyboard_arrow_right</i></button>
		</nav>
	</div>

	<div class="container main-wrapper">
		
		<div class="main_area radius5 overflow-hidden mdl-shadow--16dp mb-5">

			<div class="layer1">
				<div class="container">

					<div class="row">
						@foreach($newest_products as $newest_product)
						<div class="col-sm-6">

							<div class="row">
								<div class="col-md-6 py-5">
									<div class="container newItemWrapper h-100 d-flex flex-column justify-content-center">
										<div class="mb-auto">
											<label class="text-uppercase text-white py-1 px-2 radius3 bg-black"><small>new</small></label>
										</div>
										<div class="container hiddenNewItem">
											<div class="item_img_container h-100 row justify-content-center">
												<div class="col-8 col-sm-12">
													<div class="item_img_holder d-flex align-content-center">
														<img src="{{asset('storage/products/'.$newest_product->image)}}" class="img-fluid d-flex align-self-center">
													</div>
												</div>
											</div>
										</div>
										<p class="h1 text-uppercase Lspacing2 text-white newItemName">{{$newest_product->name}}</p>
										<div class="newItemName_button_wrapper mt-auto">
											<div class="moreInfoContainer">
												<a class="mdl-button mdl-js-button mdl-js-ripple-effect mdl-button--raised mdl-button--colored myButton2 px-5 py-2" href="{{ url('/shop?product_no=' . $newest_product->id) }}">more&nbsp;info</a>
											</div>
										</div>
									</div>
								</div>
								<div class="col-md-6 py-5 visibleNewItem">
									<div class="container h-100">
										<div class="item_img_container h-100 d-flex">
											<div class="item_img_holder d-flex align-content-center">
												<img src="{{asset('storage/products/'.$newest_product->image)}}" class="img-fluid d-flex align-self-center">
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						@endforeach
					</div><!-- END ROW -->

				</div>
			</div><!-- END LAYER1 -->

			<div class="layer3">
				
				<h1 class="text-center text-uppercase Lspacing2 my-4 home_title">Sample Products</h1>

				<div class="container item_sale_container">
					<div class="row">

						@foreach($random_products as $random_product)
						<!-- TO BE LOOPED -->
						<div class="col-sm-6 col-md-4 col-lg-3 item_sale_wrapper position-relative">
							<a class="" href="{{ url('/shop?product_no=' . $random_product->id) }}">
								<div class="container h-100 py-3 position-relative">
									<div class="item_img_container h-100 d-flex flex-column">
										<div class="item_img_holder d-flex align-content-center justify-content-center">
											<img src="{{asset('storage/products/'. $random_product->image)}}" class="img-fluid d-flex align-self-center">
										</div>
										<div class="mt-auto">
											<p class="lead text-uppercase m-0">{{$random_product->name}}</p>
											
											<div class="d-flex">
												<p class="sale_price">₱ {{$random_product->price}}</p>
											</div>
										</div>
									</div>
								</div>
								<!-- <div class="item_overlay position-absolute py-3 container">
									<div class="container d-flex align-items-start flex-column h-100">

										<p class="text-white text-uppercase Lspacing2"><small>{{$random_product->category->name}}</small></p>
										<div class="d-flex justify-content-center w-100 mt-auto">
                                            <button class="mdl-button mdl-js-button mdl-js-ripple-effect mdl-button--raised mdl-button--colored myButton2 px-3 d-flex align-items-center mr-2">
                                                view product
                                            </button>
											<button class="mdl-button mdl-js-button mdl-js-ripple-effect mdl-button--raised mdl-button--colored myButton2 d-flex align-items-center addtoWishList">
												<i class="ion-ios-heart-outline text-white"></i>
											</button>
										</div>
										<p class="lead text-uppercase m-0 text-white mt-auto">{{$random_product->name}}</p>
										<p class="sale_price text-white">₱ {{$random_product->price}}</p>
									</div>
								</div> -->
							</a>
						</div>
						@endforeach
						
					</div><!-- END ROW -->
				</div>

			</div>

			<div class="layer4">
				
				<div class="container">
					<div class="text-center">
						<a class="mdl-button mdl-js-button mdl-js-ripple-effect mdl-button--raised mdl-button--colored myButton1 py-2 px-5 my-5" href="{{url('/shop')}}">go to shop</a>
					</div>
				</div>

			</div>

		</div>

	</div>

    <!-- slideshow --><script src="{{asset('assets/custom/js/demo.js')}}"></script>
    <!-- slideshow --><script src="{{asset('assets/custom/js/imagesloaded.pkgd.min.js')}}"></script>
    <!-- slideshow --><script src="{{asset('assets/custom/js/anime.min.js')}}"></script>
    <!-- slideshow --><script src="{{asset('assets/custom/js/demo1.js')}}"></script>
</div>
@endsection

@section('js')
    <script type="text/javascript">
        
        $(document).ready(function(){
            window.setInterval(function(){
                $('.slidenav__item--next').click()
            }, 5000)

            $('#snl_home > a').addClass('activeSNL')

            @if(Session::has('info'))
                showSnackBar("{!! Session::get('info') !!}")
            @endif
        })
    	$('.item_holder').on('click', function(){
            revealModal()
        })
        $('.close-modal').on('click', function(){
            hideModal()
        })
        function revealModal(){
            
            $('.modalDummy').animate({
                "width": "100%",
                "left": "0"
            }, 300, function(){
                $(this).css({
                    "right":"initial"
                })
            })
            setTimeout(function(){
                 $('.modalDummy').animate({
                    "width": "0px"
                 }, 300)
            }, 600)
            setTimeout(function(){
                $('.custom_modal').addClass('modal_opened')
                $('body').addClass('overflow-hidden')
                $('.custom_modal').show()
                $('.custom_modal_wrapper').animate({
                    "opacity": "1",
                    "right": "0px"
                }, 1000)

            }, 600)
        }
        function hideModal(){

            $('.custom_modal_wrapper').animate({
                "opacity": "0",
                "right": "-100px"
            }, 500)

            $('.modalDummy').animate({
                "width": "100%",
                "right": "0"
            }, 500, function(){
                $(this).css({
                    "left":"initial"
                })
            })
            
            setTimeout(function(){
                 $('.modalDummy').animate({
                    "width": "0px"
                 }, 300)
            }, 600)
            setTimeout(function(){
                $('.custom_modal').removeClass('modal_opened')
                $('body').removeClass('overflow-hidden')
                $('.custom_modal').hide()
            }, 600)
        }
        $('.main-nav').find('li:nth-child(2) > a').addClass('activeLink')
	</script>
	<!-- custom js -->
    <script type="text/javascript" src="{{asset('assets/custom/js/script.js')}}"></script>

	@include('includes.links-scripts')
    <!-- custom js --><script type="text/javascript" src="{{asset('assets/Animocons/js/mo.min.js')}}"></script>
    <!-- custom js --><script type="text/javascript" src="{{asset('assets/Animocons/js/demo.js')}}"></script>
	<!-- elastic_slideshow --><script type="text/javascript" src="{{asset('assets/custom/js/elastic_slideshow_dynamics.min.js')}}"></script>
	<!-- elastic_slideshow --><script type="text/javascript" src="{{asset('assets/custom/js/elastic_slideshow.js')}}"></script>
	<script>
        
		(function() {

                function SVGDDMenu( el, options ) {
                    this.el = el;
                    this.init();
                }

                SVGDDMenu.prototype.init = function() {
                    if ((this.el) == null) {
                        return false;
                    }
                    this.shapeEl = this.el.querySelector( 'div.morph-shape' );

                    var s = Snap( this.shapeEl.querySelector( 'svg' ) );
                    this.pathEl = s.select( 'path' );
                    this.paths = {
                        reset : this.pathEl.attr( 'd' ),
                        open : this.shapeEl.getAttribute( 'data-morph-open' )
                    };

                    this.isOpen = false;

                    this.initEvents();
                };

                SVGDDMenu.prototype.initEvents = function() {
                    this.el.addEventListener( 'click', this.toggle.bind(this) );
                        
                    // For Demo purposes only
                    [].slice.call( this.el.querySelectorAll('a') ).forEach( function(el) {
                        el.onclick = function() { return false; }
                    } );
                };

                SVGDDMenu.prototype.toggle = function() {
                    var self = this;

                    if( this.isOpen ) {
                        classie.remove( self.el, 'menu--open' );
                    }
                    else {
                        classie.add( self.el, 'menu--open' );
                    }

                    this.pathEl.stop().animate( { 'path' : this.paths.open }, 320, mina.easeinout, function() {
                        self.pathEl.stop().animate( { 'path' : self.paths.reset }, 1000, mina.elastic );
                    } );

                    this.isOpen = !this.isOpen; 
                };

                new SVGDDMenu( document.getElementById( 'menu' ) );

            })();
	</script>
	<script>
        function showSnackBar(word) {
            $('.label-text').html(word)
            $(".snackBar-label").show()
            $(".snackBar-label").animate({
                bottom  : 15,
                opacity : 1,
            })
            setTimeout(function(){
                $(".snackBar-label").animate({
                    bottom  : 0,
                    opacity : 0
                })
                setTimeout(function(){
                    $(".snackBar-label").hide()
                },2000)
            }, 2000)
        }
    </script>
@endsection