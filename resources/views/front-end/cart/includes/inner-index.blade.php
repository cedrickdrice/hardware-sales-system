<div class="table-responsive" >
    <table class="table cart_table text-center" >
        <thead>
            <tr>
                <th></th>
                <th>IMAGE</th>
                <th>NAME</th>
                <th>COLOR</th>
                <th>SIZE</th>
                <th>PRICE</th>
                <th>QUANTITY</th>
                <th>TOTAL</th>
                <th></th>
            </tr>
        </thead>
        <tbody >
        @if ( $cart !== null )
            @forelse($cart->items as $item)
            <!-- TO BE LOOPED -->
            <tr>
                <td></td>
                <td>
                    <div class="td_wrapper">
                        <img src="{{$item->sub_category_id === null ? asset('storage/products/'.$item->product->image) : asset('storage/products/'.$item->product_filters->image) }}" width="70px" class="border" id="image_{{$item->id}}">
                    </div>
                </td>
                <td class="text-uppercase">
                    <div class="td_wrapper">
                        {{$item->product->name}} 
                    </div>
                </td>
                <td class="text-uppercase">
                    <div class="td_wrapper">
                        <select class="text-uppercase color-option" name="color" id="color_picker" data-id="{{$item->id}}">
                            @foreach($item->product->product_filters as $color)
                                <option class="text-uppercase" value="{{$color->id}}" {{$item->sub_category_id === $color->id ? 'selected' : ''}}>{{$color->category->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </td>
                <td class="text-uppercase">
                    <div class="td_wrapper">
                        <select name="size" id="size_picker" class="text-uppercase size-option" data-id="{{$item->id}}">
                            @php 
                                $sizes = explode(',',$item->product->sizes);
                            @endphp
                            @foreach($sizes as $size)
                                <option value="{{$size}}" class="text-uppercase" {{$item->size === $size ? 'selected' : ''}}>{{$size}}</option>
                            @endforeach
                        </select>
                    </div>
                </td>
                <td class="text-uppercase">
                    <div class="td_wrapper">
                        ₱{{$item->product->price}}</td>
                    </div>
                <td class="text-uppercase">
                    <div class="td_wrapper">
                        <input type="hidden" name="id" value="{{$item->id}}">
                        <input type="number" name="quantity" min="1" class="quantity p-3 text-center quantityChange" value="{{$item->quantity}}" data-id="{{$item->id}}">
                    </div>
                </td>

                <td class="text-uppercase text-primary lead">
                    <div class="td_wrapper">
                        ₱{{$item->sub_total()}}.00</td>
                    </div>
                <td>
                    <div class="td_wrapper">
                        <button data-id="{{Crypt::encrypt($item->id)}}" data-product="{{$item->product->name}}" class="mdl-button mdl-js-button mdl-js-ripple-effect mdl-button--fab mdl-button--mini-fab removeToCart btnRemove" type="button">
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
    <p class="h5 text-uppercase">cart total: <span class="text-primary">₱{{$cart === null ? '0' : $cart->total(). '.00'}}</span></p>
</div>