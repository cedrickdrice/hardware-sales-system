@extends('front-end.includes.index')

@section('title')
    About | SAM
@endsection
@section('content')


<!-- custom modal for product -->

<div class="main-container">
    
    <div class="banner">

        <div class="row justify-content-center align-items-center h-100">
            
            <div data-parallax="scroll" data-z-index="1" data-image-src="{{asset('assets/images/about.png')}}" id="backdrop" class="h-100 w-100"></div>

        </div>

    </div>

	<div class="container main-wrapper">
		
		<div class="main_area radius5 overflow-hidden mdl-shadow--16dp mb-5">

			<div class="content">

                <div class="layer_1">
                    <div class="container">
                        <div class="row">

                            <div class="col-md-6">
                                <div class="container p-4 h-100">
                                    <div class="d-flex align-items-center justify-content-center h-100">
                                        <div>
                                            <img src="{{asset('assets/images/clothing_store.png')}}" alt="" class="w-100">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="p-5 h-100">
                                    <div class="h-100 d-flex align-items-center">
                                        <div>
                                            <p class="about_title text-uppercase mb-3">About Us</p>
                                            <p class="about_text">"Fashion is part of the daily air and it changes all the time, with all the events. You can even see the approaching of a revolution in clothes. You can see and feel everything in clothes.” <br><i class="text-grayish">—Diana Vreeland</i></p>

                                            <p class="about_text">Shopping Assistant Mirror offers a wide range of apparel to fit anyone's unique sense of style. Our clothings are trendsetting and timeless to provide our customers the latest fashions. To keep our customers in style we post new arrivals daily, as well as offer stylist picks to help any indecisive shoppers. SAM Boutique is a fashionista’s best place to create the perfect wardrobe.</p>

                                            <div class="mt-5 d-flex readmore_wrapper">
                                                <button class="mdl-button mdl-js-button mdl-js-ripple-effect mdl-button--raised mdl-button--colored myButton1 Lspacing2 px-4 select-none readmore">Read more <i class="material-icons">keyboard_arrow_down</i></button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

                <div class="layer_2 mt-5" id="layer2">

                    <div class="my-3 banner_wrapper">
                        <div class="banner_content h-100 w-100 text-white text-center">
                            <p class="banner_subheader mb-0">Using the latest AR (augmented reality) technology, virtually try on a variety of outfits through SAM Mirror</p>
                            <p class="banner_header">Shopping for clothes will never be the same</p>
                        </div>
                    </div>
                    
                    <p class="about_title text-center text-uppercase mb-5">sam mirror</p>

                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-md-6">
                                <div class="px-3">
                                    <p class="about_text text-justify mb-4 lead">SAM is a smart mirror that has augmented reality in order to improve the customer shopping experience. By using the SAM Mirror, the shoppers can try on upper garments like shirts, jackets, blouses, etc. in a virtual way, that is, without the need to go to a fitting room and get undress.</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="mirror_preview">
                        <div class="container">
                            <div class="row justify-content-center">
                                <div class="col-sm-12">
                                    <img src="{{asset('assets/images/mirror_preview_info.png')}}" alt="" class="w-100" id="mirror_preview_info">
                                </div>
                                <div class="col-sm-10">
                                    <img src="{{asset('assets/images/mirror_preview.png')}}" alt="" class="w-100" id="mirror_preview">
                                </div>
                            </div>

                            <!-- mirror preview info -->

                            <div class="mirror_preview_info px-4 mt-4">
                                <p class="header">Back to Home</p>
                                <p class="subheader">To easily navigate to home page.</p>
                                <p class="header">Go to Your Cart</p>
                                <p class="subheader">To navigate to cart page where your added items are found.</p>
                                <p class="header">All the Details</p>
                                <p class="subheader">Find the product information</p>
                                <p class="header">On-the-Go Fashions</p>
                                <p class="subheader">Easily mix-and-match variety of styles instantly.</p>
                                <p class="header">Capture the Moment</p>
                                <p class="subheader">Take a selfy to your chosen garment and share it on your social accounts.</p>
                            </div>

                        </div>
                            
                        <div class="model">
                            <p class="text-center text-primary text-uppercase h4 my-5">all-in-one model includes</p>

                            <div class="container hardwares my-5">
                                <p class="text-center text-uppercase h3 header mb-4">hardware</p>

                                <div class="row justify-content-center">
                                    <div class="col-3 col-sm-2">
                                        <div class="text-center">
                                            <img src="{{asset('assets/images/monitor.png')}}" alt="" class="w-100">
                                            <p class="text-uppercase">monitor</p>
                                        </div>
                                    </div>

                                    <div class="col-3 col-sm-2">
                                        <div class="text-center">
                                            <img src="{{asset('assets/images/kinect.png')}}" alt="" class="w-100">
                                            <p class="text-uppercase">kinect</p>
                                        </div>
                                    </div>

                                    <div class="col-3 col-sm-2">
                                        <div class="text-center">
                                            <img src="{{asset('assets/images/system_unit.png')}}" alt="" class="w-100">
                                            <p class="text-uppercase">precessor</p>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="container hardwares mt-5 pt-4">
                                <p class="text-center text-uppercase h3 header mb-4">software</p>

                                <div class="row justify-content-center">
                                    <div class="col-3 col-sm-2">
                                        <div class="text-center">
                                            <img src="{{asset('assets/images/unity.png')}}" alt="" class="w-100">
                                            <p class="text-uppercase">unity</p>
                                        </div>
                                    </div>

                                    <div class="col-3 col-sm-2">
                                        <div class="text-center">
                                            <img src="{{asset('assets/images/blender.png')}}" alt="" class="w-100">
                                            <p class="text-uppercase">blender</p>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <svg id="feature_curveUpColor" xmlns="http://www.w3.org/2000/svg" version="1.1" width="100%" height="100" viewBox="0 0 100 100" preserveAspectRatio="none">
                            <path d="M0 100 C 20 0 50 0 100 100 Z"></path>
                        </svg>
                        <div class="features">
                            <p class="text-center text-uppercase h4 mb-5 title">main features</p>
                            
                            <div class="container px-5">
                                <div class="row px-4">
                                    <div class="col-sm-6 mb-4">
                                        <img src="{{asset('assets/images/easy_access.png')}}" alt="" class="w-100 mb-3">
                                        <p class="header">Instant Body Recognition</p>
                                        <p class="subheader">Automatic size measurement</p>
                                    </div>
                                    <div class="col-sm-6 mb-4">
                                        <img src="{{asset('assets/images/easy_access.png')}}" alt="" class="w-100 mb-3">
                                        <p class="header">Intuitive User Experience</p>
                                        <p class="subheader">Intuitively browse and try on shop inventory using simple gestures</p>
                                    </div>
                                    <div class="col-sm-6 mb-4">
                                        <img src="{{asset('assets/images/easy_access.png')}}" alt="" class="w-100 mb-3">
                                        <p class="header">Convenient Mix and Match</p>
                                        <p class="subheader">Layer items and try on multiple style combinations</p>
                                    </div>
                                    <div class="col-sm-6">
                                        <img src="{{asset('assets/images/easy_access.png')}}" alt="" class="w-100 mb-3">
                                        <p class="header">Easy Access to Purchase Essentials</p>
                                        <p class="subheader">Scan QR code to access item and purchase details</p>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <svg id="feature_curveDownColor" xmlns="http://www.w3.org/2000/svg" version="1.1" width="100%" height="100" viewBox="0 0 100 100" preserveAspectRatio="none">
                            <path d="M0 0 C 50 100 80 100 100 0 Z"></path>
                        </svg>
                    </div>
                    
                </div>


                <div class="layer_3 mt-5" id="layer3">

                    <p class="about_title text-center text-uppercase mb-5">mobile app</p>

                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-md-6">
                                <div class="px-3">
                                    <p class="about_text text-justify mb-4">SAM Mobile Application let shoppers choose and order garments through online without going to the physical shop. It helps customers to do purchase wherever they are in a fast and less time consuming way.</p>
                                </div>
                                <center>
                                    <button class="mdl-button mdl-js-button mdl-js-ripple-effect mdl-button--raised mdl-button--colored myButton1 Lspacing2 px-4 select-none" id="download_apk">download&nbsp;mobile&nbsp;app&nbsp;<i class="material-icons">vertical_align_bottom</i></button>
                                </center>

                            </div>
                        </div>
                    </div>

                    <img src="{{asset('assets/images/mobile_mockup.png')}}" alt="" class="w-100 select-none mt-4">

                </div>
                
                

                
                


                <!-- <p class="about_title text-center text-uppercase">about</p> -->
                <div class="team">
                    <svg id="bigHalfCircle" xmlns="http://www.w3.org/2000/svg" version="1.1" width="100%" height="100" viewBox="0 0 100 100" preserveAspectRatio="none">
                        <path d="M0 100 C40 0 60 0 100 100 Z"></path>
                    </svg>
                    <div class="mb-5 banner_wrapper">
                        <img src="{{asset('assets/images/team.png')}}" alt="" class="w-100">
                    </div>
                    <div class="container mt-5 pt-5">
                        <div class="grid">
                            <a class="grid__item" href="#">
                                <div class="box">
                                    <div class="box__shadow"></div>
                                    <img class="box__img" src="{{asset('assets/images/members/yohan.jpg')}}" alt="Some image"/>
                                    <h4 class="box__title box__title--right"><span class="box__title-inner" data-hover="Sustiguer">Sustiguer</span></h4>
                                    <h4 class="box__text box__text--top  box__text--right"><span class="box__text-inner">Johanne Marie</span></h4>
                                    <div class="box__deco">♕</div>
                                    <!-- <p class="box__content">"Sometimes we go surfing when it's stormy weather"</p> -->
                                </div>
                            </a>
                            <a class="grid__item" href="#">
                                <div class="box">
                                    <div class="box__shadow"></div>
                                    <img class="box__img" src="{{asset('assets/images/members/richard.jpg')}}" alt="Some image"/>
                                    <h4 class="box__title box__title--left"><span class="box__title-inner" data-hover="Roncales">Roncales</span></h4>
                                    <h4 class="box__text box__text--topcloser box__text--left"><span class="box__text-inner box__text-inner--rotated1">Richard</span></h4>
                                </div>
                            </a>
                            <a class="grid__item" href="#">
                                <div class="box">
                                    <div class="box__shadow"></div>
                                    <img class="box__img" src="{{asset('assets/images/members/ced.jpg')}}" alt="Some image"/>
                                    <h4 class="box__title box__title--left"><span class="box__title-inner" data-hover="Drice">Drice</span></h4>
                                    <h4 class="box__text box__text--topcloser"><span class="box__text-inner">Cedrick</span></h4>
                                    <div class="box__deco">&#10032;</div>
                                </div>
                            </a>
                            <a class="grid__item" href="#">
                                <div class="box">
                                    <div class="box__shadow"></div>
                                    <img class="box__img" src="{{asset('assets/images/members/jed.jpg')}}" alt="Some image"/>
                                    <h4 class="box__title"><span class="box__title-inner" data-hover="Coral">Coral</span></h4>
                                    <h4 class="box__text box__text--topcloser"><span class="box__text-inner">Jade</span></h4>
                                    <div class="box__deco">👀</div>
                                </div>
                            </a>
                            <a class="grid__item" href="#">
                                <div class="box">
                                    <div class="box__shadow"></div>
                                    <img class="box__img" src="{{asset('assets/images/members/dan.jpg')}}" alt="Some image"/>
                                    <h4 class="box__title box__title--right"><span class="box__title-inner" data-hover="Arcojada">Arcojada</span></h4>
                                    <h4 class="box__text box__text--top  box__text--center"><span class="box__text-inner box__text-inner--rotated1">John Nataniel</span></h4>
                                    <div class="box__deco">😇</div>
                                </div>
                            </a>
                            <a class="grid__item" href="#">
                                <div class="box">
                                    <div class="box__shadow"></div>
                                    <img class="box__img" src="{{asset('assets/images/members/jr.jpg')}}" alt="Some image"/>
                                    <h4 class="box__title box__title--right"><span class="box__title-inner" data-hover="Roncales">Roncales</span></h4>
                                    <h4 class="box__text box__text--top  box__text--center"><span class="box__text-inner">John</span></h4>
                                    <div class="box__deco">😈</div>
                                </div>
                            </a>
                            <a class="grid__item" href="#">
                                <div class="box">
                                    <div class="box__shadow"></div>
                                    <img class="box__img" src="{{asset('assets/images/members/tin.jpg')}}" alt="Some image"/>
                                    <h4 class="box__title"><span class="box__title-inner" data-hover="Carpio">Carpio</span></h4>
                                    <h4 class="box__text box__text--center"><span class="box__text-inner box__text-inner--rotated2">Agustin</span></h4>
                                    <p class="box__content">"Love stronger, stranger! Love stronger."</p>
                                </div>
                            </a>
                            <a class="grid__item" href="#">
                                <div class="box">
                                    <div class="box__shadow"></div>
                                    <img class="box__img" src="{{asset('assets/images/members/jessa.jpg')}}" alt="Some image"/>
                                    <h4 class="box__title box__title--right"><span class="box__title-inner" data-hover="Sarmiento">Sarmiento</span></h4>
                                    <h4 class="box__text"><span class="box__text-inner box__text-inner--rotated1">Jessa</span></h4>
                                </div>
                            </a>
                            <a class="grid__item" href="#">
                                <div class="box">
                                    <div class="box__shadow"></div>
                                    <img class="box__img" src="{{asset('assets/images/members/camille.jpg')}}" alt="Some image"/>
                                    <h4 class="box__title box__title--bottom box__title--straight"><span class="box__title-inner" data-hover="Mendoza">Mendoza</span></h4>
                                    <h4 class="box__text box__text--top  box__text--right"><span class="box__text-inner box__text-inner--rotated1">Camille Grace</span></h4>
                                </div>
                            </a>
                            <a class="grid__item" href="#">
                                <div class="box">
                                    <div class="box__shadow"></div>
                                    <img class="box__img" src="{{asset('assets/images/members/rehv.jpg')}}" alt="Some image"/>
                                    <h4 class="box__title"><span class="box__title-inner" data-hover="Boquiren">Boquiren</span></h4>
                                    <h4 class="box__text box__text--top"><span class="box__text-inner">Rehv</span></h4>
                                    <div class="box__deco">💢</div>
                                </div>
                            </a>
                            <a class="grid__item" href="#">
                                <div class="box">
                                    <div class="box__shadow"></div>
                                    <img class="box__img" src="{{asset('assets/images/members/nicole.jpg')}}" alt="Some image"/>
                                    <h4 class="box__title box__title--left"><span class="box__title-inner" data-hover="Hernandez">Hernandez</span></h4>
                                    <h4 class="box__text box_text--left"><span class="box__text-inner box__text-inner--rotated2">Nicole Ann</span></h4>
                                    <p class="box__content">"Call it a hurricane or call it freedom, Frank"</p>
                                </div>
                            </a>
                            <a class="grid__item mb-3" href="#">
                                <div class="box">
                                    <div class="box__shadow"></div>
                                    <img class="box__img" src="{{asset('assets/images/members/mads.jpg')}}" alt="Some image"/>
                                    <h4 class="box__title box__title--straight box__title--bottom"><span class="box__title-inner" data-hover="Madera">Madera</span></h4>
                                    <h4 class="box__text box__text--topcloser box__text--left"><span class="box__text-inner box__text-inner--rotated1">Raymond</span></h4>
                                    <div class="box__deco box__deco--top">&#10153;</div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

		</div>

	</div>

</div>
@endsection

@section('js')
    <script type="text/javascript">
        $('.main-nav').find('li:nth-child(3) > a').addClass('activeLink')
        $('body').addClass('about')
        $('#snl_about > a').addClass('activeSNL')

        $('#download_apk').on('click', function(){
            window.open('{{ URL("download/apk") }}')
        })
	</script>
	<!-- custom js --><script type="text/javascript" src="{{asset('assets/custom/js/script.js')}}"></script>

	@include('includes.links-scripts')
    <!-- about js --> <script src="{{asset('assets/custom/js/about.js')}}"></script>
    <!-- about js --> <script src="{{asset('assets/custom/js/parallax.js')}}"></script>
@endsection