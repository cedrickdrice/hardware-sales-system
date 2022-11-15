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
                        <input class="mdl-textfield__input" type="text" id="name" name="product_name">
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
                    {{-- ADD OPTION --}}
                    <div class="w-100 optionform">
                        <label for="" style="color:black;" ><strong>ADD PRODUCT OPTION</strong></label><br>
                        <div class="col-sm-4" style="display: inline; padding-right: 0px; padding-left: 0px;">
                            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label" style="width: 50%;">
                                <input class="mdl-textfield__input" type="text" id="name" name="name">
                                <label class="mdl-textfield__label" for="name">Option Name</label>
                            </div>
                        </div>
                        <div class="col-sm-5" style="display:inline-block; padding-right: 0px; padding-left: 0px;">
                            <div class="actions text-center border-0 bg-white p-3">
                                <button class="mdl-button mdl-js-button mdl-js-ripple-effect myButton1 text-white px-5 py-2"
                                        style="height: 30px!important; border-radius: 0!important; line-height: 16px;"
                                        id="btnAddOption"
                                        data-id="insert">ADD OPTION</button>
                            </div>
                        </div>
                    </div>
                    <!-- OUTPUT COLORS -->
                    <label for="" style="color:red;" class="d-none" id="color_ids_error">{{$errors->has('color_ids') ? $errors->first('color_ids') : '' }}</label>
                    <div class="table-responsive" >
                        <table class="table table-bordered mb-0">
                            <thead>
                                <tr>
                                    <th>OPTION</th>
                                    <th>QUANTITY</th>
                                    <th>IMAGE</th>
                                    <th>FILE</th>
                                </tr>
                            </thead>
                            <tbody id="color_list_table">
                            </tbody>
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
                        
                        <center><label class="upload_imgUpdate lead text-secondary">SET FEATURED IMAGE</label></center>
                        <div class="row justify-content-center">
                            <div class="col-sm-6">
                                <input type="file" name="image" id="upload_imgUpdate" class="d-none">
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
                            </div>
                        </div>
                    </div><!-- CATEGORY -->

                    <label for="" style="color:red;" class="d-none" id="delivery_price_update_error">{{$errors->has('delivery_price') ? $errors->first('delivery_price') : '' }}</label>
                    {{-- ADD OPTION --}}
                    <div class="w-100 optionFormUpdate">
                        <label for="" style="color:black;" ><strong>ADD PRODUCT OPTION</strong></label><br>
                        <div class="col-sm-4" style="display: inline; padding-right: 0px; padding-left: 0px;">
                            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label" style="width: 50%;">
                                <input class="mdl-textfield__input" type="text" id="name" name="option_name">
                                <label class="mdl-textfield__label" for="name">Option Name</label>
                            </div>
                        </div>
                        <div class="col-sm-5" style="display:inline-block; padding-right: 0px; padding-left: 0px;">
                            <div class="actions text-center border-0 bg-white p-3">
                                <button class="mdl-button mdl-js-button mdl-js-ripple-effect myButton1 text-white px-5 py-2"
                                        style="height: 30px!important; border-radius: 0!important; line-height: 16px;"
                                        id="btnAddOptionUpdate"
                                        data-id="insert">ADD OPTION</button>
                            </div>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-bordered mb-0">
                            <thead>
                                <tr>
                                    <th>OPTION NAME</th>
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
    @include('back-end.products.includes.script')
@endsection