<div class="table-responsive pb-5" >
    <table class="table cart_table text-center" >
        <thead>
            <tr>
                <th></th>
                <th>IMAGE</th>
                <th>NAME</th>
                <th>COLOR</th>
                <th>PRICE</th>
                <th>QUANTITY</th>
                <th>TOTAL</th>
                <th></th>
            </tr>
        </thead>
        <tbody >
        @if ( $cart !== null )
            @forelse($cart->items as $oCartItem)
            <!-- TO BE LOOPED -->
            <tr>
                <td></td>
                <td>
                    <div class="td_wrapper">
                        <a href="{{ url('/shop?product_no=' . $oCartItem->product->id) }}"><img src="{{$oCartItem->sub_category_id === null ? asset('storage/products/'.$oCartItem->product->image) : asset('storage/products/'.$oCartItem->product_filters->image) }}" width="70px" class="border" id="image_{{$oCartItem->id}}"></a>
                    </div>
                </td>
                <td class="text-uppercase">
                    <div class="td_wrapper">
                        {{$oCartItem->product->name}}
                    </div>
                </td>
                <td class="text-uppercase">
                    <div class="td_wrapper">
                        <select class="text-uppercase color-option" name="color" id="color_picker" data-id="{{$oCartItem->id}}">
                            @foreach($oCartItem->product->product_filters as $oProductOption)
                                <option class="text-uppercase" value="{{$oProductOption->id}}" {{$oCartItem->sub_category_id === $oProductOption->id ? 'selected' : ''}}>{{$oProductOption->option_name}}</option>
                            @endforeach
                        </select>
                    </div>
                </td>
                <td class="text-uppercase">
                    <div class="td_wrapper">
                        ₱ {{$oCartItem->product->price}}</td>
                    </div>
                <td class="text-uppercase">
                    <div class="td_wrapper">
                        <input type="hidden" name="id" value="{{$oCartItem->id}}">
                        <input type="number" name="quantity" min="1" class="quantity p-3 text-center quantityChange" value="{{$oCartItem->quantity}}" data-id="{{$oCartItem->id}}">
                    </div>
                </td>

                <td class="text-uppercase text-primary lead">
                    <div class="td_wrapper">
                        ₱ {{ (fmod($oCartItem->sub_total(), 1) !== 0.00 ? $oCartItem->sub_total() : $oCartItem->sub_total(). '.00') }}
                    </div>
                <td>
                    <div class="td_wrapper">
                        <button data-id="{{Crypt::encrypt($oCartItem->id)}}" data-product="{{$oCartItem->product->name}}" class="mdl-button mdl-js-button mdl-js-ripple-effect mdl-button--fab mdl-button--mini-fab removeToCart btnRemove" type="button">
                            <i class="material-icons">clear</i>
                        </button>
                    </div>
                </td>
            </tr><!-- END BE LOOPED -->
            @empty
                <tr>
                    <td colspan="9">NO ITEM</td>
                </tr>
            @endforelse
        @else 
            <tr>
                <td>NO ITEM</td>
            </tr>
        @endif
        </tbody>
        <tfoot>
            <tr>
                <td colspan="9"></td>
            </tr>
        </tfoot>
    </table>
</div>
<div class="mb-5">
    <p class="h5 text-uppercase">cart total: <span class="text-primary">₱{{$cart === null ? '0' : (fmod($cart->total(), 1) !== 0.00 ? $cart->total() : $cart->total(). '.00') }}</span></p>
</div>