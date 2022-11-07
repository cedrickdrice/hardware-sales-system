@extends('front-end.includes.index')

@section('title')
    Shop | {{ $configuration->name }}
@endsection
@section('content')

    <!-- custom modal for product -->
    <div class="modalDummy"></div>
    <div class="custom_modal">
        <div class="custom_modal_wrapper">
            
            <div class="h-100 position-relative">
                <span class="close-modal">
                    <span><i class="material-icons">close</i></span>
                </span>
                <div class="row h-100 w-100 m-0">

                    <div class="col-md-6 prodImgContainer h-100">
                        <div class="py-5 h-100">
                            <div class="h-100 w-100">
                                <div class="text-center w-100 h-100">
                                    <img src="{{asset('assets/images/yellow.png')}}" class="prodImage"> 
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 prodDescContainer h-100">
                        
                        <div class="h-100">
                            <div>
                                <div class="modalItemCateg">
                                    <p class="lead text-primary text-uppercase pt-5" id="modal_category" >T-Shirt</p>
                                </div>
                                <div class="modalItemName" >
                                    <h1 class="font-weight-light" id="modal_name">YELLOW SHIRT</h1>
                                </div>
                                <div class="modalItemPrice mt-5" >
                                    <h3 id="modal_price">₱300.00</h3>
                                </div>
                                <div class="modalStock">
                                    <b>Stock Status: <span class="text-info">In Stock</span></b>
                                </div>
                                <div class="mt-4 ">
                                    <p class="text_grayish available_colors"><small>AVAILABLE COLORS</small></p>
                                    <div class="d-flex modal_item_colors modal_append">
                                        <!-- <button class="color_icon purple mr-2" data-color="purple"></button>
                                        <button class="color_icon blue mr-2" data-color="blue"></button>
                                        <button class="color_icon pink mr-2" data-color="pink"></button> -->
                                    </div>
                                </div>
                                <div class="modalItemDesciprtion mt-5 mb-4 text-justify" id="itemDescription">
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
                                            <div class="d-flex w-100 m-0 justify-content-center align-items-center">
                                                @if (Auth::check())
                                                <input type="hidden" name="id" value="1" id="id">
                                                <button class="mdl-button mdl-button--raised mdl-js-button mdl-js-ripple-effect mdl-button--colored align-self-end mt-auto myButton1 py-2 px-4 add2cart1 mr-4" name="add2cart" id="btnAddToCart" data-id="">
                                                    <i class="material-icons mdc-button__icon">add_shopping_cart</i>&nbsp;Add&nbsp;to&nbsp;Cart
                                                </button>                                                    
                                                <ol class="grid m-0 p-0">
                                                    <li class="grid__item">
                                                        <label for="checkWish" class="mb-0">
                                                            <button class="icobutton icobutton--heart" data-check="0" id="wishlist" type="button"><span class="fa fa-heart" id="wishlist_span"></span></button>
                                                        </label>
                                                    </li>
                                                </ol>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="modalItemCateg mb-4">
                                    <p class="lead text-grayish text-uppercase">Product Reviews</p>
                                </div>

                                <!-- rating -->
                                <div class="container prodRating_graph mb-3">
                                    <div class="row">
                                        <div class="col-sm-6 mainRate mb-3">
                                            <h1 class="mb-0 "> <span class="formulatedReview">5</span> <span class="h5 text_grayish">/5</span></h1>
                                            <div class="d-flex rateMain_holder"><div id="rateMain" class="px-0 rateMain"></div></div>
                                            <div class="prodRatings">
                                                <small class="text_grayish " id="countTotal">1 customer ratings</small>
                                            </div>
                                        </div>
                                         
                                        <div class="col-sm-6">

                                            <div class="d-flex align-items-center w-100">
                                                <div id="rateYo5" class="px-0-mr-2 rateYo5"></div>
                                                <div class="progress w-100 mr-2">
                                                    <div class="progress-bar bg-warning" id="width_4" role="progressbar" style="width: 100%"  aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                                <p id="star_4">1</p>
                                            </div>
                                            <div class="d-flex align-items-center w-100">
                                                <div id="rateYo4" class="px-0-mr-2 rateYo4"></div>
                                                <div class="progress w-100 mr-2">
                                                    <div class="progress-bar bg-warning" id="width_3" role="progressbar" style="width: 0%"  aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                                <p id="star_3">0</p>
                                            </div>
                                            <div class="d-flex align-items-center w-100">
                                                <div id="rateYo3" class="px-0-mr-2 rateYo3"></div>
                                                <div class="progress w-100 mr-2">
                                                    <div class="progress-bar bg-warning" id="width_2" role="progressbar" style="width: 0%"  aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                                <p id="star_2">0</p>
                                            </div>
                                            <div class="d-flex align-items-center w-100">
                                                <div id="rateYo2" class="px-0-mr-2 rateYo2"></div>
                                                <div class="progress w-100 mr-2">
                                                    <div class="progress-bar bg-warning" id="width_1" role="progressbar" style="width: 0%"  aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                                <p id="star_1">0</p>
                                            </div>
                                            <div class="d-flex align-items-center w-100">
                                                <div id="rateYo1" class="px-0-mr-2 rateYo1"></div>
                                                <div class="progress w-100 mr-2">
                                                    <div class="progress-bar bg-warning" id="width_0" role="progressbar" style="width: 0%"  aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                                <p id="star_0">0</p>
                                            </div>

                                        </div>
                                    
                                    </div>
                                </div>

                                <div class="productReviewsHead mb-2">
                                    <div class="container">
                                        <div class="d-flex align-items-center">
                                            <div class="text-center mr-auto">
                                                <p class="text-uppercase p-3">Product Reviews</p>
                                            </div>

                                            <!-- <div class=" position-relative menu" id="menu">
                                                <div class="morph-shape" data-morph-open="M260,500H0c0,0,8-120,8-250C8,110,0,0,0,0h260c0,0-8,110-8,250C252,380,260,500,260,500z">
                                                    <svg width="100%" height="100%" viewBox="0 0 260 500" preserveAspectRatio="none">
                                                        <path fill="none" d="M260,500H0c0,0,0-120,0-250C0,110,0,0,0,0h260c0,0,0,110,0,250C260,380,260,500,260,500z"/>
                                                    </svg>
                                                </div>
                                                <button class="menu__label d-flex align-items-center"><i class="material-icons">filter_list</i><span>Filter: </span><span id="sortTxt" class="ml-2">All Star</span></button>
                                                <ul class="menu__inner">
                                                    <li><a href="#"><span>All Star</span></a></li>
                                                    <li><a href="#"><span>5 Star</span></a></li>
                                                    <li><a href="#"><span>4 Star</span></a></li>
                                                    <li><a href="#"><span>3 Star</span></a></li>
                                                    <li><a href="#"><span>2 Star</span></a></li>
                                                    <li><a href="#"><span>1 Star</span></a></li>
                                                </ul>
                                            </div> -->

                                        </div>
                                    </div>
                                </div><!-- END PRODUCT REVIEW HEAD -->

                                <div class="container ">
                                    <!-- review -->
                                    <div class="modal_reviews">
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <div class="px-0-mr-2 rateYo4"></div>
                                                <small class="text_grayish">by Anonymous 2.</small>
                                            </div>
                                            <div class="col-sm-6 d-flex justify-content-end">
                                                <small class="text_grayish">3 months ago</small>
                                            </div>
                                        </div>
                                            <pre class="reviewTxt">
                                            
                                            </pre>
                                        <hr>
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

        <div class="banner">

            <div class="row justify-content-center align-items-center h-100">
                
                <div class="col-8 col-sm-6 col-md-6 col-lg-4 align-self-center text-center">
                    <img src="{{asset('assets/images/logo.png')}}" class="" height="150px">
                    <br><br>
                    <p class="h5 text-uppercase Lspacing2 text-white text-center m-0 align-self-center">shopping assistant mirror</p>
                </div>

            </div>

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

                <div class="container main_shop">
                    
                    <div class="row">
                        <div class="col-md-4 col-lg-3 p-0">

                            <div class="container py-4">
                                <a href="">
                                    <p class="lead text-uppercase Lspacing2 px-3">CLEAR FILTER</p>
                                </a>
                            </div>

                            <div class="accordion" id="accordionExample">
                                <!-- CATEGORY FILTER -->
                                <div class="card border-top">
                                    <div class="card-header" id="headingOne">
                                        <h5 class="mb-0">
                                            <button class="btn btn-link text-uppercase d-flex" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                                <i class="material-icons mr-2">keyboard_arrow_down</i> <b>categories</b>
                                            </button>
                                        </h5>
                                    </div>

                                    <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
                                        <div class="card-body">
                                            <div class="categ_list">
                                                <ul>
                                                @foreach($category_products as $category_product)
                                                    <li class="d-flex justify-content-between"><a href="" class="category_trigger" data-id="{{$category_product->id}}">{{$category_product->name}}</a><span class="mt-1">{{count($category_product->products)}}</span></li>
                                                @endforeach
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- COLOR FILTER -->
                                <div class="card">
                                    <div class="card-header" id="headingThree">
                                        <h5 class="mb-0">
                                            <button class="btn btn-link text-uppercase d-flex" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseThree">
                                                <i class="material-icons mr-2">keyboard_arrow_down</i> <b>color</b>
                                            </button>
                                        </h5>
                                    </div>
                                    <div id="collapseTwo" class="collapse show" aria-labelledby="headingThree" data-parent="#accordionExample">
                                        <div class="card-body">
                                            <div class="container d-block">
                                                <div class="d-flex flex-wrap filterColor">
                                                @foreach($category_colors as $category_color)
                                                    <button class="color_icon {{$category_color->name}}" data-id="{{$category_color->id}}" data-inverted="" data-tooltip="{{$category_color->name}}"></button>
                                                @endforeach
                                                </div>

                                            </div>
                                        </div><!-- end card body -->
                                    </div>
                                </div>
                                
                                <!-- GENDER FILTER -->
                                <div class="card border-top">
                                    <div class="card-header" id="headingThree">
                                        <h5 class="mb-0">
                                            <button class="btn btn-link text-uppercase d-flex" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="true" aria-controls="collapseThree">
                                                <i class="material-icons mr-2">keyboard_arrow_down</i> <b>GENDER</b>
                                            </button>
                                        </h5>
                                    </div>

                                    <div id="collapseThree" class="collapse show" aria-labelledby="headingThree" data-parent="#accordionExample">
                                        <div class="card-body">
                                            <div class="categ_list">
                                                <ul>
                                                @foreach($category_genders as $category_gender)
                                                    <li class="d-flex justify-content-between"><a href="" class="btnGenderTrigger" data-id="{{$category_gender->id}}">{{$category_gender->name}}</a><span class="mt-1">{{count($category_gender->product_genders)}}</span></li>
                                                @endforeach
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- PRICE RANGE -->
                                <div class="card">
                                    <div class="card-header" id="headingTwo">
                                        <h5 class="mb-0">
                                            <button class="btn btn-link text-uppercase d-flex" type="button" data-toggle="collapse" data-target="#collapse4" aria-expanded="false" aria-controls="collapseTwo">
                                                <i class="material-icons mr-2">keyboard_arrow_down</i> <b>price range</b>
                                            </button>
                                        </h5>
                                    </div>
                                    <div id="collapse4" class="collapse show" aria-labelledby="headingTwo" data-parent="#accordionExample">
                                        <div class="card-body">
                                            <div class="price_range">
                                                <div class="container">
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <input type="number" name="" placeholder="From" class="p-3 w-100 price-range-field mb-4 range" min=0 oninput="validity.valid||(value='0');" id="min_price" >
                                                        </div>	
                                                        <div class="col-lg-6">
                                                            <input type="number" name="" placeholder="To" class="p-3 w-100 price-range-field mb-4 range" min=0 max="300" oninput="validity.valid||(value='300');" id="max_price">
                                                        </div>	
                                                    </div>
                                                    <div class="py-3">
                                                        <div id="slider-range" class="price-filter-range radius5" name="rangeInput" id="price_range"></div>
                                                        <input type="hidden" name="" value="{{$max_value->price}}" id="max_value">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                        <div class="col-md-8 col-lg-9" id="content">
                            @include('front-end.shop.includes.index-inner')
                        </div>
                    </div>

                </div>

            </div>

        </div>

    </div>

@endsection

@section('js')
	<!-- custom js --><script type="text/javascript" src="{{asset('assets/custom/js/script.js')}}"></script>
    <!-- custom js --><script type="text/javascript" src="{{asset('assets/Animocons/js/mo.min.js')}}"></script>
    <!-- custom js --><script type="text/javascript" src="{{asset('assets/Animocons/js/demo.js')}}"></script>
    <!-- custom js --><script type="text/javascript" src="{{asset('assets/animsition-master/dist/js/animsition.min.js')}}"></script>
	@include('includes.links-scripts')
    <script type="text/javascript">
        $('body').addClass('shop')
        $('.main-nav').find('li:nth-child(4) > a').addClass('activeLink')
        
            $('#snl_shop > a').addClass('activeSNL')

        function getProduct() {
            $('.item_holder').on('click', function(){
                let id = $(this).data('id')
                let html = ''
                let htmlReview = ''
                $.ajax({
                    url     : "{{url('shop/get')}}/" + id,
                    type    : 'get',
                    success : function(data) {
                            if (data.check === 1) {
                                $('#wishlist').trigger('click')
                                $('#wishlist').attr('data-check', 1)
                            }
                            $('#wishlist').attr('data-id', data.product.id)
                            $('#wishlist').on('click', handleClick);
                            $('#modal_category').html(data.product.category.name)
                            $('#modal_name').html(data.product.name)
                            $('#modal_price').html('₱' + data.product.price)
                            $('#id').val(data.product.id)
                            $('#btnAddToCart').attr('data-id', data.product.id)
                            $('#btnAddToCart').attr('data-sub_id', data.sub_product.id)
                            $('#itemDescription').html(data.product.description)
                            let count = (data.product.product_filters).length
                            for (let i=0; i<count; i++ ) {
                                if (data.product.product_filters[i].stock != 0){
                                    $('.prodImage').attr('src', "{{asset('storage/products')}}/" + data.product.product_filters[i].image  )
                                    break;
                                }
                            }
                            


                            $('.formulatedReview').html(data.rate)
                            $('#countTotal').html(data.count + ' customer/s rating')
                            rateMain(data.rate)
                            $(data.star).each(function(index,value) { 
                                $('#star_'+ index).html(value)
                            })
                            $(data.width).each(function(index,value) {
                                $('#width_'+ index).width(value + '%')
                            })
                            $(data.product.product_filters).each(function(index){
                                // console.log(this.category.name)  
                                if ( this.stock != 0) {
                                    if (index == 0) {
                                        html += '<button class="color_icon '+ this.category.name +' mr-2 activeColor" data-color="'+this.category.id +'" data-id="'+this.id+'"></button>'
                                    }
                                    else {
                                        html += '<button class="color_icon '+ this.category.name +' mr-2" data-color="'+this.category.id +'" data-id="'+this.id+'"></button>'
                                    }
                                }
                                
                            })
                            $(data.product.product_reviews).each(function(){
                            htmlReview +=   `<div class="row">
                                                    <div class="col-sm-6">
                                                        <div class="px-0-mr-2 `+ 'rateYo' + this.rate +`"></div>
                                                        <small class="text_grayish">by `+ this.user.email +`</small>
                                                    </div>
                                                    <div class="col-sm-6 d-flex justify-content-end">
                                                        <small class="text_grayish"> `+ getDate(this.created_at) +`</small>
                                                    </div>
                                                    <pre class="reviewTxt">`      +     this.comment + `</pre>
                                                </div>
                                                <hr>`
                            // $('.stars').addClass('rateYo' + this.rate)
                            })
                            $('.modal_reviews').empty()
                            if (htmlReview === '') {
                                htmlReview += `<div>
                                                    <center><strong>No review yet.</strong></center>
                                                </div>`
                            }
                            $('.modal_reviews').append(htmlReview)
                            rateYours()
                            $('.modal_append').empty()
                            $('.modal_append').append(html)
                            if (data.check === 1) {
                                
                            }
                            changeImage()
                    }, 
                    error : function(data) {
                            console.log(data)
                    }
                })
                revealModal()
            })
        }
        function handleClick(event) 
        {
            let check = $('#wishlist').data('check')
            let id = $('#wishlist').data('id')
            let url = ''
            if (check === 0) {
                url = "{{ URL('/wishlist/add-item')}}/" + id
                $('#wishlist').data('check', 1)
            } else {
                url = "{{ URL('/wishlist/remove-item')}}/" + id
                $('#wishlist').data('check', 0)
            }
            $.ajax({
                url 	: url,
                type	: 'get',
                success : function(data) {
                    console.log(data)
                    console.log($('#wishlist').data('check'))
                },
                error 	: function(data) {
                    console.log(data)
                }
            })
        }
        
        
        $('#btnAddToCart').on('click', function(){
            let id = $(this).data('id')
            let sub_id = $(this).data('sub_id')
            url = "{{url('cart/insert')}}/" + id + '/' + sub_id
            window.location = url
        })

        $('.close-modal').on('click', function(){
            hideModal()
        })
        function getDate(input){
            var d = new Date(Date.parse(input.replace(/-/g, "/")));
            var month = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];
            var date = d.getDate() + " " + month[d.getMonth()] + ", " + d.getFullYear();
            var time = d.toLocaleTimeString().toLowerCase().replace(/([\d]+:[\d]+):[\d]+(\s\w+)/g, "$1$2");
            return (date + " " + time);  
        };

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
        function changeImage(){
            $('.modal_item_colors .color_icon').on('click', function(){
                let colorBtn = $(this).data('color')
                let id = $(this).data('id')
                let modalImg = $('.custom_modal_wrapper').find('.prodImage')
                $.ajax({
                    url     : "{{url('shop/getImageOfColor')}}/" + id,
                    type    : "get",
                    success : function(data) {
                        modalImg.attr("src", "{{asset('storage/products/')}}/" + data.product.image )
                        $('#btnAddToCart').data('sub_id', data.product.id)
                    }, 
                    error   : function (data) {
                        console.log(data)
                    }
                })
                $('.modal_item_colors .color_icon').removeClass('activeColor')
                $(this).addClass('activeColor')
            })    
        }
        
        function rateMain(rate) {
            $('.rateMain').rateYo({
                rating: rate,
                readOnly: true,
                starWidth: "40px"
            })
        }
        function rateYours() {
            $(".rateYo5").rateYo({
            rating: 5,
            readOnly: true,
            starWidth: "12px"
            });
            $(".rateYo4").rateYo({
            rating: 4,
            readOnly: true,
            starWidth: "12px"
            });
            $(".rateYo3").rateYo({
            rating: 3,
            readOnly: true,
            starWidth: "12px"
            });
            $(".rateYo2").rateYo({
            rating: 2,
            readOnly: true,
            starWidth: "12px"
            });
            $(".rateYo1").rateYo({
            rating: 1,
            readOnly: true,
            starWidth: "12px"
            });
        }
	</script>
    <script>
    $(document).ready(function(){
        getProduct()
        rateYours()
        $('#wishlist').off('click', handleClick)

        if($('.prodImage').width() > $('.prodImage').height()){
            $('.prodImage').addClass('w-100').removeClass('h-100')
        } else if($('.prodImage').width() < $('.prodImage').height()){
            $('.prodImage').addClass('h-100').removeClass('w-100')
        }
    })
    
        $('.category_trigger').on('click', function(e){
            e.preventDefault();
            var id = $(this).data('id')
            $.ajax({
                type        : "get",
                url         : "{{url('shop/filter')}}/" + id,
                success     : function(data) {
                            $('#content').empty();
                            $('#content').append(data.content)
                            getProduct()
                },
                error       : function(data) {
                            console.log(data)
                },
            });
        });
        $('.btnTrigger').on('click', function(e){
            e.preventDefault();
            var id = $(this).data('id')
            $.ajax({
                type        : "get",
                url         : "{{url('shop/filterColor')}}/" + id,
                success     : function(data) {
                            $('#content').empty();
                            $('#content').append(data.content)
                            getProduct()
                },
                error       : function(data) {
                            console.log(data)
                },
            });
        });
        $('.filterColor .color_icon').on('click', function(){
            var id = $(this).data('id')
            $.ajax({
                type        : "get",
                url         : "{{url('shop/filterColor')}}/" + id,
                success     : function(data) {
                    console.log(data)
                            $('#content').empty();
                            $('#content').append(data.content)
                            getProduct()
                },
                error       : function(data) {
                            console.log(data)
                },
            });
        });

        $('.btnGenderTrigger').on('click', function(e){
            e.preventDefault();
            var id = $(this).data('id')
            $.ajax({
                type        : "get",
                url         : "{{url('shop/filterGender')}}/" + id,
                success     : function(data) {
                            $('#content').empty();
                            $('#content').append(data.content)
                            getProduct()
                },
                error       : function(data) {
                            console.log(data)
                },
            });
        });
        $('.range').on('change', function(e){
            var min = $('#min_price').val()
            var max = $('#max_price').val()
            price_range(min, max)
        });

        function price_range(min_price, max_price)
        {
            var min = min_price;
            var max = max_price;
            $.ajax({
                url     : "{{url('shop/range_filter')}}/" + min + '/' + max ,
                type    : "get",
                success : function(data) {
                            $('#content').empty();
                            $('#content').append(data.content)
                            getProduct()
                },
                error   : function(data) {
                        console.log(data)
                }
            });
        }
        (function() {

                function SVGDDMenu( el, options ) {
                    this.el = el;
                    this.init();
                }

                SVGDDMenu.prototype.init = function() {
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
@endsection