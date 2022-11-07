@extends('back-end.includes.icp')

@section('title')
    Products | {{ $configuration->name }}
@endsection

@section('content')


    <!-- CUSTOM SNACKBAR -->

    <div class="cust_snackbar snackBar-label p-3 mdl-shadow--4dp">
        <div class="text-white mb-3 label-text">
            
        </div>
    </div>

    <div class="cust_snackbar snackBar-okCancel p-3 mdl-shadow--4dp">
        <div class="text-white mb-3" id="snack-question">
            Remove this product?
        </div>
        <div class="d-flex w-100 justify-content-end">
            <button type="button" class="mdl-button mdl-js-button mdl-js-ripple-effect text-primary" id="btnOk">ok</button>
            <button type="button" class="mdl-button mdl-js-button mdl-js-ripple-effect text-primary" id="btnCancel">cancel</button>
        </div>
    </div>
    <!-- END CUSTOM SNACKBAR -->

    <!-- *** FAB *** -->

    <div class="fab_holder">
    <button class="mdl-button mdl-js-button mdl-js-ripple-effect mdl-button--fab mdl-button--raised mdl-button--colored add_item cust_gradient " id="openModal">
    <i class="material-icons">add</i>
    </button>
    </div>


    <!-- *** INITIAL MODAL *** -->

    <div class="ui first longer modal" id="cust_modal">
        <div class="header d-flex justify-content-between">
            <div class="header_title">ADD PRODUCT</div>
            <div class="close_btn_wrapper d-flex align-item-center justify-content-center">
                <a href="#" class="close-button" id="hideModal">
                    <div class="in">
                        <div class="close-button-block"></div>
                        <div class="close-button-block"></div>
                    </div>
                    <div class="out">
                        <div class="close-button-block"></div>
                        <div class="close-button-block"></div>
                    </div>
                </a>
            </div>
        </div>
        <div class="content">
            <div class="container">
                {{--  method="POST" action="{!! URL('icp/products/insert') !!}" --}}
                <form class="modal_form"  id="addProduct" >
                {{csrf_field()}}
                    <!-- FEATURED IMAGE -->
                    <input type="file" name="addImage" id="upload_img" class="d-none">
                    <!-- PRODUCT SKU -->
                    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label w-100">
                        <input class="mdl-textfield__input" type="text" id="name" name="name">
                        <label class="mdl-textfield__label" for="name">Name</label>
                    </div>
                    <label for="" style="color:red;" class="d-none" id="name_error">{{$errors->has('name') ? $errors->first('name') : '' }}</label>
                    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label w-100">
                        <input class="mdl-textfield__input" type="text" id="description" name="description">
                        <label class="mdl-textfield__label" for="description">Description</label>
                    </div>
                    <label for="" style="color:red;" class="d-none" id="description_error">{{$errors->has('description') ? $errors->first('description') : '' }}</label>
                    <!-- PRODUCT NAME -->
                    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label w-100">
                        <input class="mdl-textfield__input" type="number" id="price" name="price">
                        <label class="mdl-textfield__label" for="price">Price</label>
                    </div>
                    <label for="" style="color:red;" class="d-none" id="price_error">{{$errors->has('price') ? $errors->first('price') : '' }}</label>
                    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label w-100">
                        <input class="mdl-textfield__input" type="number" id="delivery_price" name="delivery_price">
                        <label class="mdl-textfield__label" for="delivery_price">Delivery Price</label>
                    </div>
                    <label for="" style="color:red;" class="d-none" id="delivery_price_error">{{$errors->has('delivery_price') ? $errors->first('delivery_price') : '' }}</label>
                    {{-- <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label w-100">
                        <input class="mdl-textfield__input" type="number" id="stock" name="mainStock">
                        <label class="mdl-textfield__label" for="stock">Stock</label>
                    </div> --}}
                    {{-- CHOOSE CATEGORY --}}
                    <div class="filterByCateg mdl_select">
                         <div class="d-inline">
                            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label getmdl-select getmdl-select__fix-height w-100">
                                <input type="text" class="mdl-textfield__input" id="filterByCateg2" name="category" readonly>
                                <input type="hidden" class="mdl-textfield__input" name="filterByCateg2">
                                <i class="drpdwn-icon material-icons mdl-icon-toggle__label">keyboard_arrow_down</i>
                                <label for="filterByCateg2" class="mdl-textfield__label">Categories</label>
                                <ul class="mdl-menu mdl-menu--bottom-left mdl-js-menu mb-0" for="filterByCateg2">
                                    @foreach($categ_products as $categ_product)
                                    <li class="mdl-menu__item" data-val="TS" id="category_{{$categ_product->id}}">{{$categ_product->name}}</li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                    <label for="" style="color:red;" class="d-none" id="category_error">{{$errors->has('category') ? $errors->first('category') : '' }}</label>
                    {{-- CHOOSE GENDER --}}
                    <div class="container">
                        <div class="row">
                            @foreach($categories as $category)
                            <div class="col">
                                <center>
                                    <label class="mdl-radio mdl-js-radio mdl-js-ripple-effect" for="option_{{$category->id}}">
                                        <input type="radio" id="option_{{$category->id}}" class="mdl-radio__button" name="options" value="{{$category->id}}">
                                        <span class="mdl-radio__label">{{$category->name}}</span>
                                    </label>
                                </center>
                            </div>
                            @endforeach
                            
                        </div>
                    </div>
                    <label for="" style="color:red;" class="d-none" id="options_error">{{$errors->has('options') ? $errors->first('options') : '' }}</label>
                    <!-- CHOOSE SIZE -->
                    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label w-100">

                        <dl class="dropdowns mb-0" id=""> 
  
                            <dt class="m-0 p-0 position-relative">
                                <a class="d-block">   
                                    <p class="multiSels m-0" id="size-values"></p>
                                    <span class="hidass">Choose sizes here!</span>  
                                    <span class="hida2"></span>  
                                </a>
                            </dt>
                          
                            <dd class="m-0 p-0 position-relative">
                                <div class="mutliSelects">
                                    <ul class="mdl-shadow--4dp  p-3">
                                        @foreach($sizes as $size)
                                        <li>
                                            <label class="mdl-checkbox mdl-js-checkbox mdl-js-ripple-effect" for="{{$size->name}}">
                                            <input type="checkbox" id="{{$size->name}}" class="mdl-checkbox__input" name="sizes[]" value="{{$size->name}}" data-id="">
                                                {{$size->name}}
                                            </label>
                                        </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </dd>

                        </dl>

                    </div>
                    <label for="" style="color:red;" class="d-none" id="sizes_error">{{$errors->has('sizes') ? $errors->first('sizes') : '' }}</label>
                    <!-- CHOOSE COLOR -->
                    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label w-100">

                        <dl class="dropdown mb-0" id="choose_color"> 
  
                            <dt class="m-0 p-0 position-relative">
                                <a class="d-block">   
                                    <p class="multiSel m-0" id="color-values"></p>
                                    <span class="hidas">Add Color Here!</span>  
                                    <span class="hida"></span>  
                                </a>
                            </dt>
                          
                            <dd class="m-0 p-0 position-relative">
                                <div class="mutliSelect">
                                    <ul class="mdl-shadow--4dp  p-3">
                                        @foreach($colors as $color)
                                        <li>
                                            <label class="mdl-checkbox mdl-js-checkbox mdl-js-ripple-effect" for="{{$color->name}}">
                                                <input type="checkbox" id="{{$color->name}}" class="mdl-checkbox__input check-color" value="{{$color->name}}" data-id="{{ $color->id }}">
                                                <span class="mdl-checkbox__label"><div class="d-flex align-items-center"><div class="color_icon {{$color->name}} mr-2" ></div>{{ $color->name }}</div></span>
                                            </label>
                                        </li>
                                        @endforeach

                                        <li class="position-relative text-center">
                                            <button type="button" class="mdl-button mdl-js-button mdl-js-ripple-effect addColor" id="addColor" data-id="insert">Add Colors</button>
                                        </li>

                                    </ul>
                                </div>
                            </dd>

                        </dl>

                    </div>  

                    <!-- OUTPUT COLORS -->
                    <label for="" style="color:red;" class="d-none" id="color_ids_error">{{$errors->has('color_ids') ? $errors->first('color_ids') : '' }}</label>
                    <div class="table-responsive" >

                        <table class="table table-bordered mb-0">
                            <thead>
                                <tr>
                                    <th colspan="2">COLOR</th>
                                    <th>QUANTITY</th>
                                    <th>IMAGE</th>
                                    <th>FILE</th>
                                </tr>
                            </thead>
                            <tbody id="color_list_table">
                                
                            </tbody>
                            <!-- TO BE LOOP -->

                                <!-- color_ids[] is the name of category id -->
                                <!-- color_images[] is the name of input type file for image per color -->

                            <!-- END TO BE LOOP -->
                        </table>
                    </div>
                    <label for="" style="color:red;" class="d-none" id="stock_error">{{$errors->has('stock') ? $errors->first('stock') : '' }}</label>
                    <label for="" style="color:red;" class="d-none" id="color_images_error">{{$errors->has('color_images') ? $errors->first('color_images') : '' }}</label>
                    <label for="" style="color:red;" class="d-none" id="upload_files_error">{{$errors->has('upload_files') ? $errors->first('upload_files') : '' }}</label>
                     <!-- CHOOSE SIZE -->
                     
                </form>
                <div class="actions text-center border-0 bg-white p-3">
                    <button class="mdl-button mdl-js-button mdl-js-ripple-effect myButton1 text-white px-5 py-2" id="btnSubmit">SUBMIT</button>
                </div>
                
            </div>
        </div>
    </div>
{{-- id="btnSubmit" --}}
                       


    <!-- *** SECOND MODAL / FORM MEDIA LIBRARY *** -->


    <div class="ui second longer large modal draggable" id="media_modal">
        <div class="header d-flex justify-content-between handle">
            <div class="header_title">MEDIA LIBRARY</div>
            <div class="close_btn_wrapper d-flex align-item-center justify-content-center">
                <a href="#" class="close-button" id="hide_media_modal">
                    <div class="in">
                        <div class="close-button-block"></div>
                        <div class="close-button-block"></div>
                    </div>
                    <div class="out">
                        <div class="close-button-block"></div>
                        <div class="close-button-block"></div>
                    </div>
                </a>
            </div>
        </div>
        <div class="content">
            <nav class="cust_tabs mt-4 p-0 border">
                <div class="cust_selector" id="cust_selector"></div>
                <a href="#" class="active" id="mediaLibrary">MEDIA LIBRARY</a>
                <a href="#" class="" id="uploadFiles">UPLOAD IMAGES</a>
            </nav>
            <ul class="nav nav-tabs d-none">
                <li class="active"><a href="#tab1" data-toggle="tab">Shipping</a></li>
                <li><a href="#tab2" data-toggle="tab">Quantities</a></li>
            </ul>
            <div class="tab-content border mt-4">
                <div class="tab-pane active" id="tab1">
                    <p class="p-4 mb-0">MEDIA LIBRARY</p>

                    <div class="media_images_container">

                        <svg xmlns="http://www.w3.org/2000/svg" version="1.1" width="800" class="d-none">
                            <defs>
                                <filter id="goo1">
                                    <feGaussianBlur in="SourceGraphic" stdDeviation="9" result="blur" />
                                    <feColorMatrix in="blur" mode="matrix" values="1 0 0 0 0  0 1 0 0 0  0 0 1 0 0  0 0 0 20 -6" result="goo" />
                                    <feComposite in="SourceGraphic" in2="goo" operator="atop" result="goo"/>
                                </filter>
                            </defs>
                        </svg>

                        <div class="select-container position-relative pb-4">

                            <div class="d-flex justify-content-center">
                                <div class="selection-highlights position-absolute d-flex flex-wrap justify-content-center">
                                    @php $counter = 0; @endphp
                                    @foreach (Storage::disk('products')->files('products') as $filename)
                                        <!-- TO BE LOOPED ALSO AS THE SELECTION ITEM LOOPED -->
                                        <input class="selection-checkbox" type="checkbox" id="selection-check-{{ $counter++ }}">
                                        <div class="selection-highlight"></div>
                                        <!-- END TO BE LOOPED -->
                                    @endforeach
                                </div>
                            </div>
                            @php $counter = 0; @endphp
                            <div class="selection-content d-flex flex-wrap justify-content-center">
                            @foreach (Storage::disk('products')->files('products') as $filename)
                                <label class="selection-item" for="selection-check-{{ $counter++ }}" data-checked="false">
                                    <span class="selection-item-container">
                                        <div class="d-flex justify-content-center h-100 position-relative">
                                            <div class="mediaLib_imgHolder d-flex justify-content-center position-relative align-self-center w-100">
                                                <div class="align-self-center">
                                                    <img src="{{asset('storage/'. $filename )}}" class="img-fluid">
                                                </div>
                                            </div>
                                        </div>
                                    </span>
                                </label>
                            @endforeach
                            </div>
                            

                        </div>

                    </div>
                </div>
                <div class="tab-pane" id="tab2">
                    <div class="tab_wrapper1 w-100 text-center">
                        <p class="h5">DROP FILES ANYWHERE TO UPLOAD</p>
                        <div class="upload_img_container mt-5">
                            <label for="upload_img"><span class="mdl-button mdl-js-button mdl-js-ripple-effect mdl-button--colored mdl-button--raised text-white upload_img_btn">upload files</span></label>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="actions text-center border-0 bg-white p-3">
            <button class="btnSubmit">UPLOAD IMAGES</button>
        </div>
    </div>

    <!-- THIRD MODAL FOR UPDATE PRODUCTS -->

    <div class="ui longer modal" id="updateModal">
        <div class="header d-flex justify-content-between">
            <div class="header_title">UPDATE PRODUCT</div>
            <div class="close_btn_wrapper d-flex align-item-center justify-content-center">
                <a href="#" class="close-button" id="hideUpdateModal">
                    <div class="in">
                        <div class="close-button-block"></div>
                        <div class="close-button-block"></div>
                    </div>
                    <div class="out">
                        <div class="close-button-block"></div>
                        <div class="close-button-block"></div>
                    </div>
                </a>
            </div>
        </div>
        <div class="content">
            <div class="container">
                <form class="modal_form" id="updateProduct">
                {{csrf_field()}}
                    <!-- FEATURED IMAGE -->
                    <div class="ft_img_container w-100 mb-4">
                        
                        <center><label class="lead text-secondary">SET FEATURED IMAGE</label></center>
                        <div class="row justify-content-center">

                            <div class="col-sm-6">
                                <!-- <input type="file" name="" id="chooseFtImg" class="d-none"> -->
                                <label for="upload_imgUpdate" id="haha">
                                    <img class="img-thumbnail w-100 file-in" src="../assets/images/add_img1.png" id="open_media_modalUpdate" >
                                </label>
                            </div>

                        </div><!-- END ROW -->

                    </div>
                    <input type="hidden" name="id" value="" id="idUpdate">
                    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label w-100">
                        <input class="mdl-textfield__input" type="text" id="nameUpdate" name="name">
                        <label class="mdl-textfield__label" for="name">Name</label>
                    </div>
                    <label for="" style="color:red;" class="d-none" id="name_update_error">{{$errors->has('name') ? $errors->first('name') : '' }}</label>
                    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label w-100">
                        <input class="mdl-textfield__input" type="number" id="priceUpdate" name="price" readonly>
                        <label class="mdl-textfield__label" for="price">Price</label>
                    </div>
                    <label for="" style="color:red;" class="d-none" id="price_update_error">{{$errors->has('price') ? $errors->first('price') : '' }}</label>
                    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label w-100">
                        <input class="mdl-textfield__input" type="text" id="descriptionUpdate" name="description">
                        <label class="mdl-textfield__label" for="description">Description</label>
                    </div>
                    <label for="" style="color:red;" class="d-none" id="description_update_error">{{$errors->has('description') ? $errors->first('description') : '' }}</label>
                    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label w-100">
                        <input class="mdl-textfield__input" type="number" id="delivery_priceUpdate" name="delivery_price">
                        <label class="mdl-textfield__label" for="delivery_price">Delivery Price</label>
                    </div>

                    <!--  CATEGORY -->
                    <div class="filterByCateg mdl_select">
                        <div class="d-inline">
                            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label getmdl-select getmdl-select__fix-height w-100">
                                <input type="text" class="mdl-textfield__input" id="updateCategory" readonly>
                                <input type="hidden" value="" name="updateCategory" id="updateCategoryValue">
                                <i class="drpdwn-icon material-icons mdl-icon-toggle__label">keyboard_arrow_down</i>
                                <label for="filterByCateg" class="mdl-textfield__label">Category</label>

                                <ul class="mdl-menu mdl-menu--bottom-left mdl-js-menu mb-0" for="updateCategory">
                                    @foreach ($categ_products as $category)
                                        <li class="mdl-menu__item" data-val="{{ $category->id }}">{{ UCFirst($category->name) }}</li>
                                    @endforeach
                                </ul>
                                {{-- <ul class="mdl-menu mdl-menu--bottom-left mdl-js-menu mb-0" for="filterByCateg">
                                    <li class="mdl-menu__item" data-val="TS" id="TS">T-Shirt</li>
                                    <li class="mdl-menu__item" data-val="PS" id="PS">Polo Shirt</li>
                                    <li class="mdl-menu__item" data-val="J" id="J">Jacket</li>
                                    <li class="mdl-menu__item" data-val="LS" id="LS">Long Sleeve</li>
                                    <li class="mdl-menu__item" data-val="TF" id="TF">Three Fourth's</li>
                                    <li class="mdl-menu__item" data-val="B" id="B">Blouse</li>
                                </ul> --}}
                            </div>
                        </div>
                    </div><!-- CATEGORY -->

                    <label for="" style="color:red;" class="d-none" id="delivery_price_update_error">{{$errors->has('delivery_price') ? $errors->first('delivery_price') : '' }}</label>
                    <!-- <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label w-100">
                        <input class="mdl-textfield__input" type="number" id="stockUpdate" name="stock">
                        <label class="mdl-textfield__label" for="stock">Stock</label>
                    </div> -->
                   

                    <!-- CHOOSE COLOR -->
                    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label w-100 d-none">

                        <dl class="dropdown"> 
  
                            <dt class="m-0 p-0 position-relative">
                                <a href="#" class="d-block">   
                                    <p class="multiSel m-0" id="color-values"></p>
                                    <span class="hidas">Color</span>  
                                    <span class="hida"></span>  
                                </a>
                            </dt>
                          
                            <dd class="m-0 p-0 position-relative ">
                                <div class="mutliSelect">
                                    <ul class="mdl-shadow--4dp  p-3">
                                        @foreach($colors as $color)
                                        <li>
                                            <label class="mdl-checkbox mdl-js-checkbox mdl-js-ripple-effect" for="color_{{$color->name}}">
                                                <input type="checkbox" id="color_{{$color->name}}" class="mdl-checkbox__input check-color" value="{{$color->name}}" data-id="{{ $color->id }}">
                                                <span class="mdl-checkbox__label"><div class="d-flex align-items-center"><div class="color_icon {{$color->name}} mr-2" ></div>{{ $color->name }}</div></span>
                                            </label>
                                        </li>
                                        @endforeach

                                        <li class="text-center">
                                            <button type="button" class="mdl-button mdl-js-button mdl-js-ripple-effect addColor" id="addColorUpdate" data-id="update">Add Colors</button>
                                        </li>

                                    </ul>
                                </div>
                            </dd>

                        </dl>

                    </div>  
                    <div class="table-responsive">
                        <table class="table table-bordered mb-0">
                            <thead>
                                <tr>
                                    <th colspan="1">COLOR</th>
                                    <th>REMAINING STOCK</th>
                                    <th>ADD STOCK</th>
                                    <th>IMAGE</th>
                                </tr>
                            </thead>
                            <tbody id="color_list_table_update">
                                
                            </tbody>
                        </table>
                    </div>
                    <label for="" style="color:red;" class="d-none" id="stock_update_error">{{$errors->has('stock') ? $errors->first('stock') : '' }}</label>
                </form>
            </div>
        </div>
        <div class="actions text-center border-0 bg-white p-3">
            <button class="mdl-button mdl-js-button mdl-js-ripple-effect myButton1 text-white px-5 py-2" id="btnUpdateProduct">SUBMIT</button>
        </div>
    </div>
    

    <!-- FOURTH MODAL FOR REMOVE ITEM STOCK -->
    <div class="ui mini modal" id="removeStockModal">
        <div class="header d-flex justify-content-between">
            <div class="header_title">REMOVE PRODUCT</div>
            <div class="close_btn_wrapper d-flex align-item-center justify-content-center">
                <a href="#" class="close-button" id="hideRemoveModal">
                    <div class="in">
                        <div class="close-button-block"></div>
                        <div class="close-button-block"></div>
                    </div>
                    <div class="out">
                        <div class="close-button-block"></div>
                        <div class="close-button-block"></div>
                    </div>
                </a>
            </div>
        </div>
        <div class="content">
            <div class="container">
                <form id="formRemoveStock">
                {{csrf_field()}}

                    <input type="hidden" name="id" class="hidden_id">
                    <div class="container subproduct">
                        {{-- APPEND SUBPRODUCT FILE --}}
                    </div>
                    <label for="" style="color:red;" class="d-none" id="options_stock_error">{{$errors->has('options') ? $errors->first('options') : '' }}</label>
                    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label w-100">
                        <input class="mdl-textfield__input" type="number" id="removeStock" name="stock">
                        <label class="mdl-textfield__label" for="removeStock">Stock(s) to be Removed</label>
                    </div>
                    <label for="" style="color:red;" class="d-none" id="stock_stock_error">{{$errors->has('stock') ? $errors->first('stock') : '' }}</label>

                    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label w-100">
                        <input class="mdl-textfield__input" type="password" id="removePassword" name="password">
                        <label class="mdl-textfield__label" for="password">Manager's Password</label>
                    </div>
                    <label for="" style="color:red;" class="d-none" id="password_stock_error">{{$errors->has('password') ? $errors->first('password') : '' }}</label>
                </form>
                    <div class="actions text-center border-0 bg-white p-3">
                        <button class="mdl-button mdl-js-button mdl-js-ripple-effect myButton1 text-white px-5 py-2" id="btnRemoveStock">SUBMIT</button>
                    </div>
               
            </div>
        </div>
    </div>

    <!-- FIFTH MODAL FOR UPDATE PRICE/STOCK -->
    <div class="ui mini modal" id="updatePriceStockModal">
        <div class="header d-flex justify-content-between">
            <div class="header_title">UPDATE PRICE PRODUCT</div>
            <div class="close_btn_wrapper d-flex align-item-center justify-content-center">
                <a href="#" class="close-button" id="hidePriceStockModal">
                    <div class="in">
                        <div class="close-button-block"></div>
                        <div class="close-button-block"></div>
                    </div>
                    <div class="out">
                        <div class="close-button-block"></div>
                        <div class="close-button-block"></div>
                    </div>
                </a>
            </div>
        </div>
        <div class="content">
            <div class="container">

                <ul class="row nav nav_account w-100 m-0">
                    <li class="nav-item w-100">
                        <a class="nav-link active text-uppercase mdl-js-button mdl-js-ripple-effect position-relative text-center" href="#accountDetails" data-toggle="tab"><b>Price</b><div class="nav_item_line visible"></div></a>
                    </li>
                    {{-- <li class="nav-item w-50">
                        <a class="nav-link text-uppercase mdl-js-button mdl-js-ripple-effect position-relative text-center" href="#addresses" data-toggle="tab"><b>Stock</b><div class="nav_item_line"></div></a>
                    </li> --}}
                </ul>

                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade pt-5 show active" id="accountDetails" role="tabpanel">
                        <div class="container">
                            

                            <!-- UPDATE FOR PRICE -->


                            <form id="price_form">
                            {{csrf_field()}}
                            <input type="hidden" name="id" class="hidden_id">
                                <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label w-100">
                                    <input type="hidden" name="label" value="color">
                                    <input class="mdl-textfield__input" type="text" id="m_price" name="price">
                                    <label class="mdl-textfield__label" for="updatePrice">Price</label>
                                </div>
                                <label for="" style="color:red;" class="d-none" id="price_price_error">{{$errors->has('price') ? $errors->first('price') : '' }}</label>
                                <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label w-100">
                                    <input class="mdl-textfield__input" type="password" id="m_password" name="m_password">
                                    <label class="mdl-textfield__label" for="m_password">Manager's Password</label>
                                </div>
                                <label for="" style="color:red;" class="d-none" id="m_password_price_error">{{$errors->has('m_password') ? $errors->first('m_password') : '' }}</label>
                            </form>
                            <div class="text-center mt-5">
                                <button class="mdl-button mdl-js-button mdl-js-ripple-effect myButton1 text-white px-5 py-2" id="btnPrice">SUBMIT</button>
                            </div>
                        </div>
                    </div>
                    
                </div>

                
            </div>
        </div>
    </div>

    <!-- *** MAIN CONTAINER *** -->

    <div class="main-container w-100 py-5">

        <!-- THIS AREA IS THE MAIN WRAPPER -->
        <div class="main-wrapper">
            <div class="container">

                <!-- FILTER/ACTION AREA -->

                <div class="filterArea container">
                    <div class="container">

                        <div class="d-flex align-items-center">
                            <!-- FILTER BY CATEGORY -->
                                <div class="filterByCateg mdl_select">
                                    <div class="d-inline">
                                        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label getmdl-select getmdl-select__fix-height w-100">
                                            <input type="text" class="mdl-textfield__input" id="filterByCateg" name="filterByCateg" readonly>
                                            <input type="hidden" value="" name="filterByCateg">
                                            <i class="drpdwn-icon material-icons mdl-icon-toggle__label">keyboard_arrow_down</i>
                                            <label for="filterByCateg" class="mdl-textfield__label">Category</label>

                                            <ul class="mdl-menu mdl-menu--bottom-left mdl-js-menu mb-0" for="filterByCateg">
                                                <li class="mdl-menu__item" data-val="ALL">All</li>
                                                @foreach ($categ_products as $category)
                                                    <li class="mdl-menu__item" data-val="{{ $category->id }}">{{ UCFirst($category->name) }}</li>
                                                @endforeach
                                            </ul>
                                            {{-- <ul class="mdl-menu mdl-menu--bottom-left mdl-js-menu mb-0" for="filterByCateg">
                                                <li class="mdl-menu__item" data-val="TS" id="TS">T-Shirt</li>
                                                <li class="mdl-menu__item" data-val="PS" id="PS">Polo Shirt</li>
                                                <li class="mdl-menu__item" data-val="J" id="J">Jacket</li>
                                                <li class="mdl-menu__item" data-val="LS" id="LS">Long Sleeve</li>
                                                <li class="mdl-menu__item" data-val="TF" id="TF">Three Fourth's</li>
                                                <li class="mdl-menu__item" data-val="B" id="B">Blouse</li>
                                            </ul> --}}
                                        </div>
                                    </div>
                                </div><!-- END FILTER BY CATEGORY -->

                                <div class="mdl-layout-spacer"></div>

                                
                                <div class="search-wrap d-flex position-relative align-items-center">
                                    <form class="w-100 d-flex justify-content-end search_form"><input type="text" class="search_input" id="search_word"></form>
                                    <button id="custBtn-search" class="mdl-button mdl-js-button mdl-js-ripple-effect cust_gradient text-white">
                                        <i class="material-icons">search</i>
                                    </button>
                                </div>  
                                

                        </div><!-- END ROW FILTER/ACTIONS -->

                    </div>
                </div><!-- END FILTER/ACTIONS AREA -->

                <div id="content">
                    @include('back-end.products.includes.index-inner')
                </div>
                
            </div>
        </div>

    </div>

@endsection

@section('js')
    <script type="text/javascript" src="{{asset('assets/custom/js/admin.js')}}"></script>
    <script>
    $(".prodSNL").addClass("SNLactive")
    $(".prodSNL a").css("color","white")  
    
    $(document).ready(function(){

        $('#custBtn-search').on('click',function(){
            $('.search_input').toggleClass('expand')
            $('.search_input').focus()
        })
        $('.snackBar-okCancel').hide()
        $('.search_input').focusout(function(){
            $('.search_input').toggleClass('expand')
        })
        $('.page-item:first-child .page-link').empty()
        $('.page-item:first-child .page-link').append('<i class="material-icons">keyboard_arrow_left</i>')
        $('.page-item:last-child .page-link').empty()
        $('.page-item:last-child .page-link').append('<i class="material-icons">keyboard_arrow_right</i>')

        $('#cust_modal').modal('attach events', '#openModal', 'show')
        $('#cust_modal').modal('attach events', '#hideModal', 'hide')

        $('#updateModal').modal('attach events', '.btnUpdate', 'show')
        $('#updateModal').modal('attach events', '#hideUpdateModal', 'hide')

        $('#removeStockModal').modal('attach events', '.btnRemove', 'show')
        $('#removeStockModal').modal('attach events', '#hideRemoveModal', 'hide')

        $('#updatePriceStockModal').modal('attach events', '.btnPriceStock', 'show')
        $('#updatePriceStockModal').modal('attach events', '#hidePriceStockModal', 'hide')


        getPriceEdit()
        getEdit()
        btnRemove()
        getRemoveStock()

        $('#btnSubmit').on('click', function(){
            $('#addProduct').submit() 
        });
        $('#btnUpdateProduct').on('click', function(){
            $('#updateProduct').submit() 
        })
        $('#btnRemoveStock').on('click', function(){
            $('#formRemoveStock').submit()
        })
        $('#btnPrice').on('click', function(){
            $('#price_form').submit()
        })
        $('#btnStock').on('click', function(){
            $('#stock_form').submit()
        })

        $("#upload_img").change(function() {
            readURL(this)
        });
        $('#upload_imgUpdate').change(function(){
            readURL(this)
        })
        $('#price_form').submit(function(e){
            e.preventDefault();
            var formData = new FormData($(this)[0]);
            $.ajax({
                'url'			: "{!! URL('icp/products/updatePrice') !!}",
                'method'		: 'post',
                'dataType'      : 'json',
                'data'			: formData,
                success 		: function(data){
                                $('#m_price').val(null)
                                $('#m_password').val(null)
                                $("#m_price").parent().removeClass("is-dirty");
                                $("#m_password").parent().removeClass("is-dirty");
                                if(data.error != null) {
                                    showSnackBar(data.error)
                                } else {
                                    showSnackBar('price has been successfully updated')
                                    $('#content').empty();
                                    $('#content').append(data.content)
                                    rerun_modal()
                                    btnRemove()
                                    getEdit()
                                    getPriceEdit()
                                    getRemoveStock()
                                }
                                $('#hidePriceStockModal').trigger('click')
                },
                error           : function(data){
                                if( data.status === 422 ) {
                                    clearErrors()
                                    var errors = $.parseJSON(data.responseText);
                                    $.each(errors.errors, function (key, val) {
                                        $("#" + key + "_price_error").text(val[0])
                                        $("#" + key + "_price_error").removeClass('d-none')
                                    });
                                }
                },
                contentType		: false,
                cache			: false,
                processData		: false
            })
        })
        $('#formRemoveStock').submit(function(e){
            e.preventDefault();
            var formData = new FormData($(this)[0]);
            $.ajax({
                'url'			: "{!! URL('icp/products/updateStock') !!}",
                'method'		: 'post',
                'dataType'      : 'json',
                'data'			: formData,
                success 		: function(data){
                                $('#removeStock').val(null)
                                $('#removePassword').val(null)
                                $("#removeStock").parent().removeClass("is-dirty");
                                $("#removePassword").parent().removeClass("is-dirty");
                                if(data.error != null) {
                                    showSnackBar(data.error)
                                } else {
                                    showSnackBar('stock has been successfully removed')
                                    $('#content').empty();
                                    $('#content').append(data.content)
                                    rerun_modal()
                                    btnRemove()
                                    getEdit()
                                    getPriceEdit()
                                    getRemoveStock()
                                }
                                $('#hideRemoveModal').trigger('click')
                },
                error           : function(data){
                                if( data.status === 422 ) {
                                    clearErrors()
                                    var errors = $.parseJSON(data.responseText);
                                    $.each(errors.errors, function (key, val) {
                                        $("#" + key + "_stock_error").text(val[0])
                                        $("#" + key + "_stock_error").removeClass('d-none')
                                    });
                                }
                },
                contentType		: false,
                cache			: false,
                processData		: false
            })
        })
        $('.search_form').on('submit',function(e){
            e.preventDefault();
            var keyword = $('#search_word').val()
            $.ajax({
                type        : "get",
                url         : "{{ URL('icp/products/search')}}/" + keyword,
                success     : function(data) {
                            $('#content').empty();
                            $('#content').append(data.content);
                            rerun_modal()
                            btnRemove()
                            getEdit()
                            getPriceEdit()
                            getRemoveStock()
                },
                error       : function(data) {
                            console.log(data)
                },
            })
        })
        $('#filterByCateg').on('change', function(){
            $.ajax({
                type        : "get",
                url         : "{{ URL('icp/products/filter') }}/" + $(this).val(),
                success     : function(data) {
                            $('#content').empty();
                            $('#content').append(data.content);
                            rerun_modal()
                            btnRemove()
                            getEdit()
                            getPriceEdit()
                            getRemoveStock()
                },
                error       : function(data) {
                            console.log(data)
                },
            })
        })
        
        $('#updateProduct').submit(function(e){
            e.preventDefault();
            var formData = new FormData($(this)[0]);
            $.ajax({
                'url'			: "{!! URL('icp/products/update') !!}",
                'method'		: 'post',
                'dataType'      : 'json',
                'data'			: formData,
                success 		: function(data){
                                $('#content').empty();
                                $('#content').append(data.content)
                                $('#hideUpdateModal').trigger('click')
                                rerun_modal()
                                btnRemove()
                                getEdit()
                                getPriceEdit()
                                getRemoveStock()
                },
                error           : function(data){
                                if( data.status === 422 ) {
                                    clearErrors()
                                    var errors = $.parseJSON(data.responseText);
                                    $.each(errors.errors, function (key, val) {
                                        $("#" + key + "_update_error").text(val[0])
                                        $("#" + key + "_update_error").removeClass('d-none')
                                    });
                                }
                },
                contentType		: false,
                cache			: false,
                processData		: false
            })
        })
        
        $('#addProduct').submit(function(e){
            e.preventDefault();
            var formData = new FormData($(this)[0]);
            $.ajax({
                'url'			: "{!! URL('icp/products/insert') !!}",
                'method'		: 'post',
                'dataType'      : 'json',
                'data'			: formData,
                success 		: function(data){
                                $('#content').empty();
                                $('#content').append(data.content);
                                $('#hideModal').trigger('click')
                                rerun_modal()
                                btnRemove()
                                getEdit()
                                getPriceEdit()
                                getRemoveStock()
                                showSnackBar(data.word)
                },
                error           : function(data){
                                if( data.status === 422 ) {
                                    clearErrors()
                                    var errors = $.parseJSON(data.responseText);
                                    $.each(errors.errors, function (key, val) {
                                        $("#" + key + "_error").text(val[0])
                                        $("#" + key + "_error").removeClass('d-none')
                                    });
                                }
                },
                contentType		: false,
                cache			: false,
                processData		: false
            })
        })

        //color events

        $('.addColor').on('click',function(){
            var label = $(this).data('id')
            $(".dropdown dd ul").hide()
            let str_color_images = ''

            $('.check-color').each(function(){
               if($(this).is(':checked')) {
                str_color_images += `<tr>
                                        <td><div class="color_icon ${$(this).val()}"></div></td>
                                        <td class="text-center">
                                            ${$(this).val()}
                                            <input type="hidden" name="color_ids[]" value="${$(this).data('id')}">
                                        </td>
                                        <td>
                                            <input type="number" name="stock[]" class="form-control">
                                        </td>
                                        <td>
                                            <label for="upload_img_color-${$(this).data('id')}" class="text-center w-100 mb-0" id="img_color">
                                                <img class="file-in border p-1" height="50px" src="../assets/images/add_img1.png" id="img_${$(this).data('id')}">
                                                <input type="file" name="color_images[]" id="upload_img_color-${$(this).data('id')}" class="d-none img-input" data-target="img_${$(this).data('id')}" accept="image/*">
                                            </label>
                                        </td>
                                        <td>
                                            <input type="file" name="upload_files[]" class="" accept=".zip">
                                        </td>
                                    </tr>`
               }
            })
            
            if (label === 'insert') {
                $('#color_list_table').empty()
                $('#color_list_table').append(str_color_images)
            } else {
                $('#color_list_table_update').empty()
                $('#color_list_table_update').append(str_color_images)
            }
            

            $(".img-input").change(function () {
                if (this.files && this.files[0]) {
                    var reader = new FileReader();
                    let target_img = $(this).data('target')
                    reader.onload = function (e) {

                        $('#' + target_img).attr('src', e.target.result);
                    }
                    reader.readAsDataURL(this.files[0]);
                }
            })
        })
    })
    function getPriceEdit() {
        $('.btnPriceStock').on('click', function(){
            var id = $(this).data('id')
            $.ajax({
                type        : "get",
                url         : "{!! URL('icp/products/editPrice') !!}/" + id,
                success     : function(data) {
                            $('.hidden_id').val(data.product.id)
                },
                error       : function(data) {
                            console.log(data)
                },
            })
        })
    }
    function getRemoveStock() {
        $('.btnRemove').on('click', function(){
            var id = $(this).data('id')
            $.ajax({
                type        : "get",
                url         : "{!! URL('icp/products/removeStock') !!}/" + id,
                success     : function(data) {
                            $('.subproduct').empty()
                            $('.subproduct').append(data.content)
                            $('.hidden_id').val(data.product.id)
                },
                error       : function(data) {
                            console.log(data)
                },
            })
        })
    }
    function getEdit() {
        $('.btnUpdate').on('click', function(){
            var id = $(this).data('id')
            $.ajax({
                type        : "get",
                url         : "{!! URL('icp/products/edit') !!}/" + id,
                success     : function(data) {
                            $('#nameUpdate').val(data.product.name)
                            $('#priceUpdate').val(data.product.price)
                            $('#idUpdate').val(data.product.id)
                            $('#descriptionUpdate').val(data.product.description)
                            $('#delivery_priceUpdate').val(data.product.delivery_price)
                            $('#open_media_modalUpdate').attr('src', "{{asset('storage/products')}}/" + data.product.image)
                            $("#nameUpdate").parent().addClass("is-dirty");
                            $("#priceUpdate").parent().addClass("is-dirty");
                            $("#descriptionUpdate").parent().addClass("is-dirty");
                            $("#delivery_priceUpdate").parent().addClass("is-dirty");
                            $('#color_list_table_update').empty()
                            $('#color_list_table_update').append(data.content)
                            $('#updateModal').modal({ observeChanges: true }).modal('refresh')
                            $('#updateModal').modal('refresh')
                            $(window).trigger('resize')
                },
                error       : function(data) {
                            console.log(data)
                },
            })
        })
    }
    function btnRemove(){
        $('.btnDelete').on('click', function(){
			id = $(this).data('id')
			$('#snack-question').empty()
			$('#snack-question').append("Remove this product from database?")

			$(".snackBar-okCancel").show()
			$(".snackBar-okCancel").animate({
				bottom  : 15,
				opacity : 1
			})
        });
        $("#btnOk").on("click",function(){
            deleteProduct(id)
        })
        $("#btnCancel").on('click',function(){
            $(".snackBar-okCancel").animate({
                bottom  : 0,
                opacity : 0
            }).hide()
        })
    }
    
    function deleteProduct(id){
        $.ajax({
            type        : "get",
            url         : "{!! URL('icp/products/delete') !!}/" + id,
            success     : function(data) {
                        $('#content').empty();
                        $('#content').append(data.content);
                        $('#snackbar').show()
                        $('#snackbar-text').html("Deleted Successfully")
                        btnRemove()            
                        rerun_modal()
                        showSnackBar(data.word)
                        $(".snackBar-okCancel").animate({
                            bottom  : 0,
                            opacity : 0
                        })
            },
            error       : function(data) {
                        console.log(data)
            },
        })
    }
    function rerun_modal(){
        $('#cust_modal').modal('attach events', '#openModal', 'show')
        $('#media_modal').modal('attach events', '.open_media_modal', 'show')
        $('#cust_modal').modal('attach events', '#hideModal', 'hide')
        $('#media_modal').modal('attach events', '#hide_media_modal', 'hide')

        $('#updateModal').modal('attach events', '.btnUpdate', 'show')
        $('#updateModal').modal('attach events', '#hideUpdateModal', 'hide')

        $('#removeStockModal').modal('attach events', '.btnRemove', 'show')
        $('#removeStockModal').modal('attach events', '#hideRemoveModal', 'hide')

        $('#updatePriceStockModal').modal('attach events', '.btnPriceStock', 'show')
        $('#updatePriceStockModal').modal('attach events', '#hidePriceStockModal', 'hide')
    }
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function(e) {
                $('#open_media_modal').attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]);
        }
    }

    function clearInputs() {
        $('#name').val()
        $('#price').val()
        $('#stock').val()
        $('#nameUpdate').val()
        $('#priceUpdate').val()
        $('#stockUpdate').val()
    }
    function clearErrors() {
        // INSERT ERRORS
        $('#name_error').addClass('d-none')
        $('#price_error').addClass('d-none')
        $('#description_error').addClass('d-none')
        $('#price_error').addClass('d-none')
        $('#category_error').addClass('d-none')
        $('#options_error').addClass('d-none')
        $('#sizes_error').addClass('d-none')
        $('#stock_error').addClass('d-none')
        $('#color_images_error').addClass('d-none')
        $('#upload_files_error').addClass('d-none')
        // UPDATE ERRORS
        $('#name_update_error').addClass('d-none')
        $('#price_update_error').addClass('d-none')
        $('#description_update_error').addClass('d-none')
        $('#stock_update_error').addClass('d-none')
    }
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