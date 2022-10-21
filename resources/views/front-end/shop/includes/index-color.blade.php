
<div class="row prod_list">
    @foreach($products as $product)
    <!-- TO BE LOOPED -->
    <div class="col-sm-4 col-md-6 col-lg-4 item_sale_wrapper">
        <a class="item_holder">
            <div class="container h-100 py-3 position-relative">
                <div class="item_img_container h-100 d-flex flex-column">
                    <div class="item_img_holder d-flex align-content-center">
                        <img src="{{asset('storage/products/'. $product->image )}}" class="img-fluid d-flex align-self-center">
                    </div>
                    <div class="mt-auto">
                        <p class="lead text-uppercase m-0">{{$product->product->name}}</p>

                        <div class="d-flex">
                            <p class="sale_price">₱{{$product->product->price}}</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="item_overlay position-absolute py-3 container">
                <div class="container d-flex align-items-start flex-column h-100">

                    <!-- category ng item -->
                    <p class="text-white text-uppercase Lspacing2"><small>{{$product->product->category->name}}</small></p>
                    <div class="d-flex justify-content-center w-100 mt-auto">
                        <button class="mdl-button mdl-js-button mdl-js-ripple-effect mdl-button--raised mdl-button--colored myButton2 px-3 d-flex align-items-center mr-2">
                            <i class="material-icons-new outline-add_shopping_cart icon-white mr-2"></i>add to cart
                        </button>
                        <button class="mdl-button mdl-js-button mdl-js-ripple-effect mdl-button--raised mdl-button--colored myButton2 d-flex align-items-center addtoWishList">
                            <i class="ion-ios-heart-outline text-white"></i>
                        </button>
                    </div>
                    <p class="lead text-uppercase m-0 text-white mt-auto">{{$product->product->name}}</p>
                    <p class="sale_price text-white">₱ {{$product->product->price}}</p>
                </div>
            </div>
        </a>
    </div><!-- END TO BE LOOPED -->
    @endforeach

</div>
<div class="d-flex shop_pagination w-100">
    {{$products->links("pagination::bootstrap-4")}}
</div>