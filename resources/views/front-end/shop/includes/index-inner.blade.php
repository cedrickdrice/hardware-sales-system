
<div class="row prod_list">
    @foreach($products as $product)
    <!-- TO BE LOOPED -->
    <div class="col-sm-6 col-md-6 col-lg-4 item_sale_wrapper">
        <a class="item_holder" data-id="{{$product->id}}">
            <div class="container h-100 py-3 position-relative">
                <div class="item_img_container h-100 d-flex flex-column">
                    <div class="item_img_holder d-flex align-content-center justify-content-center">
                        <img src="{{asset('storage/products/'. $product->image)}}" class="img-fluid d-flex align-self-center">
                    </div>
                    <div class="mt-auto">
                        <p class="lead text-uppercase m-0">{{$product->name}}</p>
                        
                        <div class="d-flex">
                            <p class="sale_price">₱ {{$product->price}}</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="item_overlay position-absolute py-3 container">
                <div class="container d-flex align-items-start flex-column h-100">

                    <!-- category ng item -->
                    <p class="text-white text-uppercase Lspacing2"><small>{{$product->category->name}}</small></p>
                    <div class="d-flex justify-content-center w-100 mt-auto">
                        <button class="mdl-button mdl-js-button mdl-js-ripple-effect mdl-button--raised mdl-button--colored myButton2 px-3 d-flex align-items-center mr-2">
                            view product
                        </button>
                    </div>
                    <p class="lead text-uppercase m-0 text-white mt-auto">{{$product->name}}</p>
                    <p class="sale_price text-white">₱ {{$product->price}}</p>
                </div>
            </div>
        </a>
    </div><!-- END TO BE LOOPED -->
    @endforeach

</div>

<div class="d-flex shop_pagination w-100">
    {{$products->links("pagination::bootstrap-4")}}
</div>