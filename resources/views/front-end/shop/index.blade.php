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
                            <div class="h-100 w-100" style="display: flex; justify-content: center; align-items: center;">
                                <div class="text-center w-100 h-100" style="height: 300px!important;">
                                    <img src="{{asset('assets/images/yellow.png')}}" class="prodImage"> 
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 prodDescContainer h-100">
                        
                        <div class="h-100" style="display: flex; justify-content: center; align-items: center;">
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
                                    <p class="text_grayish available_colors"><small>OPTIONS</small></p>
                                    <div class="d-flex modal_item_colors modal_append">
                                    </div>
                                </div>
                                <div class="modalItemDesciprtion mt-5 mb-4 text-justify" id="itemDescription">
                                    <p></p>
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
                    <p class="h5 text-uppercase Lspacing2 text-white text-center m-0 align-self-center">{{ $configuration->name }}</p>
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
	@include('front-end.shop.includes.script')
@endsection