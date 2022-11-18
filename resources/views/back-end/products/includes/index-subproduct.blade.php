<label for="" style="color:black;" ><strong>PRODUCT</strong></label><br>
<label for="" style="color:black;" >{{ $product->name }}</label><br><br>
<label for="" style="color:black;" ><strong>SELECT PRODUCT OPTION</strong></label><br>
<div class="col">
    @foreach($product_filter as $option)
    <div class="row">
        <center>
            <label class="mdl-radio mdl-js-radio mdl-js-ripple-effect" for="option_{{$option->id}}">
                <input type="radio" id="option_{{$option->id}}" class="mdl-radio__button" name="options" value="{{$option->id}}">
            <span class="mdl-radio__label"><strong>{{$option->option_name}}</strong> - {{$option->stock}}</span>
            </label>
        </center>
    </div>
    @endforeach
    
</div>