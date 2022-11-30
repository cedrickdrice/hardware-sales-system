@extends('front-end.includes.index')

@section('title')
    Order Detail | {{ $configuration->name }}
@endsection
@section('content')
<div class="main-container">

<div class="banner">

    <div class="d-flex justify-content-center align-content-center h-100">
        
        <div class="logo_container h-100 d-flex flex-column">
            <img src="{{asset('assets/images/logo.png')}}" class="img-fluid h-50 d-flex align-self-center mt-5 pt-5"><br>
            <p class="h5 text-uppercase Lspacing2 text-white text-center m-0 align-self-center">{{ $configuration->name }}</p>
        </div>

    </div>

</div>

<div class="container main-wrapper">
    
    <div class="main_area radius5 overflow-hidden mdl-shadow--16dp mb-5">

        <div class="container">
            <div class="d-flex justify-content-between px-5">
                <div>
                    <p class="h5 text-uppercase Lspacing2 pt-5 m-0">order detail</p>
                    <p class="text-uppercase text_grayish mb-4"><b>order no:</b><span class="text-primary"> #{{$order->order_number}}</span></p>
                </div>
                <div>
                    <p class="h5 text-uppercase Lspacing2 pt-5 m-0">total : <span><b> ₱ {{ (fmod(Crypt::decrypt($order->amount), 1) !== 0.00 ? Crypt::decrypt($order->amount) : Crypt::decrypt($order->amount). '.00') }}</b></span></p>
                    <p class="text-uppercase mb-4"><b><span class="text_grayish">placed on:</span> {{date('F d, Y', strtotime($order->created_at))}}</b></p>
                </div>
            </div>

            <!-- PROCESS -->

            <div class="process container mb-5">
                
                <div class="row justify-content-center">
                    <div class="col-md-8">

                        <div class="d-flex justify-content-between position-relative align-content-center">
                            <div class="processCircle {{$order->status == 0 || $order->status == 3 ? 'activeProcess mdl-shadow--4dp' : ''}}"></div>
                            <div class="processCircle {{$order->status == 1 ? 'activeProcess mdl-shadow--4dp' : ''}}"></div>
                            <div class="processCircle {{$order->status == 2 ? 'activeProcess mdl-shadow--4dp' : ''}}"></div>
                            <div class="progressBar w-100">
                                <div class="progressFill"></div>
                            </div>
                        </div>
                        <div class="d-flex justify-content-between position-relative align-content-center mt-2">
                            <p class="text-uppercase processText {{$order->status == 0 ? 'lead activeprocessText' : 'text_grayish'}}"><b>{{ ($order->status == 1) ? 'processing' : 'cancelled'  }}</b></p>
                            <p class="text-uppercase processText {{$order->status == 1 ? 'lead activeprocessText' : 'text_grayish'}}"><b>shipped</b></p>
                            <p class="text-uppercase processText {{$order->status == 2 ? 'lead activeprocessText' : 'text_grayish'}}"><b>delivered</b></p>
                        </div>

                    </div>
                </div>

            </div>

            <!-- MESSAGES -->

            <div class="message_container container mb-5">
                
                <div class="row justify-content-center">
                    <div class="col-md-8">
                        
                        <div class="messagesWrapper radius5 p-4">

                              <div class="collapse" id="collapseExample">
                                  <div class="container pb-3">
                                  @foreach($order->order_notify as $notif)
                                      <!-- TO BE LOOPED -->
                                      <div class="row mb-2">
                                          <div class="col-sm-4">
                                              <p class="text_grayish text-uppercase"><b>{{date('F d, Y', strtotime($notif->created_at))}}</b></p>
                                          </div>
                                          <div class="col-sm-8">
                                              <p><b>{{$notif->comment}}</b></p>
                                          </div>
                                      </div><!-- END TO BE LOOPED -->
                                    @endforeach
                                    @if ($order->status === 3)
                                    <div class="row mb-2">
                                        <div class="col-sm-4">
                                          <p class="text_grayish text-uppercase"><b>{{date('F d, Y', strtotime($order->updated_at))}}</b></p>
                                        </div>
                                        <div class="col-sm-8">
                                          <p><b>Your order has been cancelled.</b></p>
                                        </div>
                                    </div>
                                    @endif
                                  </div>
                              </div>
                            <center>
                                <button class="mdl-button mdl-js-button mdl-js-ripple-effect" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                                    view more
                                  </button>
                              </center>
                        </div>

                    </div>
                </div>

            </div>


            <div class="container">
                <div class="table-responsive">
                    <table class="table cart_table text-center">
                            <tr>
                                <th><div class="td_wrapper"></div></th>
                                <th><div class="td_wrapper">PRODUCT</div></th>
                                <th><div class="td_wrapper">OPTION</div></th>
                                <th><div class="td_wrapper">PRICE</div></th>
                                <th><div class="td_wrapper">QUANTITY</div></th>
                                <th><div class="td_wrapper">TOTAL</div></th>
                                <th></th>
                            </tr>
                        <tbody>
                            @foreach($order->order_details as $order_detail)
                            <!-- TO BE LOOPED -->
                            @if(isset($order_detail->product) === true)
                                <tr>
                                    <td>
                                        <div class="td_wrapper">
                                            <img src="{{asset('storage/products/'. $order_detail->sub_category->image)}}" width="70px" class="border">
                                        </div>
                                    </td>
                                    <td class="text-uppercase"><div class="td_wrapper">{{$order_detail->product->name}}</div></td>
                                    <td class="text-uppercase">{{$order_detail->sub_category->option_name}}</td>
                                    <td class="text-uppercase">₱{{$order_detail->product->price}}</td>
                                    <td class="text-uppercase">
                                        <div class="td_wrapper">
                                            <p class="lead">×{{$order_detail->quantity}}</p>
                                        </div>
                                    </td>
                                    @php
                                        $total = $order_detail->quantity * $order_detail->product->price;
                                    @endphp
                                    <td class="text-uppercase text-primary lead"><div class="td_wrapper">₱ {{ (fmod($total, 1) !== 0.00 ? $total : $total. '.00') }}</div></td>
                                    <td>
                                        <div class="td_wrapper">
                                            @if($order->status == 2)
                                                <!-- <a href="{{url('/order/review/' . Crypt::encrypt($order_detail->product->id). '/' . Crypt::encrypt($order->id))}}" class="mr-2">
                                                    <button class="mdl-button mdl-js-button mdl-js-ripple-effect">
                                                        Write a Review
                                                    </button>
                                                </a> -->
                                                @if($order_detail->status == 0)
                                                    <!-- <a href="{{url('/order/return/' . Crypt::encrypt($order_detail->product->id) . '/' . Crypt::encrypt($order->id))}}">
                                                        <button class="mdl-button mdl-js-button mdl-js-ripple-effect">
                                                            Return Product
                                                        </button>
                                                    </a> -->
                                                @else
                                                    @if($order_detail->status == 1) Process
                                                    @elseif($order_detail->status == 2) Returned
                                                    @else Returned request declined @endif
                                                @endif
                                            @endif
                                        </div>
                                    </td>
                                </tr>
                            @endif
                            <!-- END BE LOOPED -->

                           @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <td colspan="7"><div class="td_wrapper"></div></td>
                            </tr>
                        </tfoot>
                    </table>
                </div><!-- END TABLE CONTAINER -->
                @if (in_array($order->status, [2,3]) === false && $order->type !== 2)
                <a href="{{url('order/cancelOrder/'. Crypt::encrypt($order->id))}}">
                    <button class="mdl-button mdl-js-button mdl-js-ripple-effect mdl-button--raised mdl-button--colored myButton1 px-5 py-2 mb-5">Cancel Order</button>
                </a>
                @endif
            </div>
        </div>

    </div>

</div>
</div>
@endsection

@section('js')
    <script type="text/javascript">
		$('.mdl-navigation2').find('a:nth-child(3)').addClass('activeLink')
	</script>
	<!-- custom js --><script type="text/javascript" src="{{asset('assets/custom/js/script.js')}}"></script>
	@include('includes.links-scripts')
    <script>

    </script>
@endsection