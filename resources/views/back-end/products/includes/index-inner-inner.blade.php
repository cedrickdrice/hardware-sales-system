@foreach($product_filter as $product)
<tr>
    <td>
        <div class="color_icon {{$product->category->name}}"></div>
    </td>
    <input type="hidden" name="sub_ids[]" value="{{$product->id}}">
    <td>
        <input type="number" name="" class="form-control" value="{{$product->stock}}" min="0" step="1" readonly> 
    </td>
    <td>
        <input type="number" name="stock[]" class="form-control" value="0" min="0" step="1"> 
    </td>
    <td>
        <label for="upload_img_color-{{$product->category_id}}" class="text-center w-100 mb-0" id="img_color">
            <img class="file-in border p-1" height="50px" src="{{asset('storage/products/'. $product->image)}}" id="img_{{$product->category_id}}">
            {{-- <input type="file" name="color_images[]" id="upload_img_color-{{$product->category_id}}" class="d-none img-input" data-target="img_${$(this).data('id')}"> --}}
        </label>
    </td>
</tr>
@endforeach