@forelse($wishlists as $wishlist)
    <tr>
        <td>
            <div class="td_wrapper">
                <div class="item_img_container">
                    <a href="{{url('shop?product_no='. $wishlist->product->id)}}">
                        <img src="{{asset('storage/products/'. $wishlist->product->image)}}" height="80px" class="border">
                    </a>
                </div>
            </div>
        </td>
        <td><div class="td_wrapper">{{$wishlist->product->name}}</div></td>
        <td><div class="td_wrapper">{{$wishlist->product->price}}</div></td>
        <td>
            <div class="td_wrapper">
                <a href="{{url('wishlist/add/' . $wishlist->id)}}">
                    <button data-id="{{$wishlist->id}}" class="mdl-button mdl-js-button mdl-js-ripple-effect mdl-button--icon mr-2 overflow-visible btn_icon-action btnCart" data-inverted="" data-tooltip="Add to Cart" data-position="top center">
                        <i class="material-icons-new outline-add_shopping_cart icon-action"></i>
                    </button>
                </a>
                <button data-id="{{$wishlist->id}}" class="mdl-button mdl-js-button mdl-js-ripple-effect mdl-button--icon overflow-visible btn_icon-action remove_wishlist_item btnRemove" data-inverted="" data-tooltip="Remove to Wishlist" data-position="top center">
                    <i class="material-icons-new outline-delete icon-action"></i>
                </button>
            </div>
        </td>
    </tr>
@empty
    <tr><td colspan="2">Empty.</td></tr>
@endforelse