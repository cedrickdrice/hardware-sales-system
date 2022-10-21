<div class="col">
    @foreach($product_filter as $product)
    <div class="row">
        <center>
            <label class="mdl-radio mdl-js-radio mdl-js-ripple-effect" for="option_{{$product->id}}">
                <input type="radio" id="option_{{$product->id}}" class="mdl-radio__button" name="options" value="{{$product->id}}">
            <span class="mdl-radio__label">{{$product->product->name}} - {{$product->category->name}} - {{$product->stock}}</span>
            </label>
        </center>
    </div>
    @endforeach
    
</div>