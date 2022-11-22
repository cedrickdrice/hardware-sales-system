
@foreach($order->order_details as $order_detail)
<div class="orders_container my-3">
    <!-- to be looped -->
    <div class="container-fluid order_item py-3">
        <div class="row">
            <div class="col-sm-3">
                <div class="d-flex w-100 justify-content-center align-items-center h-100">
                    <div class="align-self-center">
                        <img src="{{asset('storage/products/' . $order_detail->sub_category->image)}}" height="100px">
                    </div>
                </div>
            </div>
            <div class="col-sm-9">
                <h2 class="mb-0">{{$order_detail->product->name}}</h2>
                <p class="text_grayish text-uppercase">
                    <sup>Option: {{$order_detail->sub_category->option_name}}</sup><br>
                    <sup>{{$order_detail->product->category->name}}</sup>
                </p>

                <!-- <div class="color_icon mb-3 yellow"></div> -->
                <p>₱ {{$order_detail->product->price}} X {{$order_detail->quantity}} = {{$total = $order_detail->product->price * $order_detail->quantity}}</p>
            </div>
        </div>
    </div>
    <!-- end to be looped -->
</div>
@endforeach