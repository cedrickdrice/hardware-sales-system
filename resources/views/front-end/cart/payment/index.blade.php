@extends('front-end.includes.index')

@section('title')
    Payment | {{ $configuration->name }}
@endsection
@section('content')
<div class="main-container">

<div class="banner">

    <div class="row justify-content-center align-items-center h-100">

        <div class="col-8 col-sm-6 col-md-6 col-lg-4 align-self-center text-center">
            <img src="{{asset('assets/images/logo.png')}}" class=""  height="150px">
            <br><br>
            <p class="h5 text-uppercase Lspacing2 text-white text-center m-0 align-self-center">{{ $configuration->name }}</p>
        </div>

    </div>

</div>

<div class="container main-wrapper">

    <div class="main_area radius5 overflow-hidden mdl-shadow--16dp mb-5">

        <div class="container">
            <div class="row justify-content-between px-5 py-5">
                <div class="col-md">
                    <a href="javascript:history.back()">← Back</a>
                    <p class="h5 text-uppercase Lspacing2 m-0 mb-2">select a payment method</p>
                </div>
            </div>

            <div class="container">

                 <ul class="row nav nav_account">
                    <li class="nav-item">
                        <a class="nav-link active text-uppercase mdl-js-button mdl-js-ripple-effect position-relative" href="#accountDetails" data-toggle="tab">
                            <div class="text-center">
                                <img src="{{asset('assets/images/cod.png')}}" height="50px">
                            </div>
                            <b>Cash&nbsp;On&nbsp;Delivery</b>
                            <div class="nav_item_line visible"></div>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-uppercase mdl-js-button mdl-js-ripple-effect position-relative" href="#addresses" data-toggle="tab">
                            <div class="text-center">
                                <img src="{{asset('assets/images/credit_card.png')}}" height="50px">
                            </div>
                            <b>Credit&nbsp;Card</b>
                            <div class="nav_item_line"></div>
                        </a>
                    </li>
                     @if($cart->total() >= 100)

                         <li class="nav-item">
                             <a class="nav-link text-uppercase mdl-js-button mdl-js-ripple-effect position-relative" href="#gcash-pay" data-toggle="tab">
                                 <div class="text-center">
                                     <img src="{{asset('assets/images/gcash.png')}}" height="50px">
                                 </div>
                                 <b>Paymongo</b>
                                 <div class="nav_item_line"></div>
                             </a>
                         </li>
                     @endif
                </ul>

                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade py-5" id="gcash-pay" role="tabpanel">
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-5 payment-create">
                                        <button
                                            style="background: #3853D8!important;"
                                            class="create-payment myButton1 mdl-button mdl-js-ripple-effect mdl-js-button mdl-button--raised mdl-button--colored px-4 mt-4"
                                            data-cart-id="{{ $id }}">
                                            Create Payment Link
                                        </button>
                                        <img src="{{ asset('assets/images/loading.gif') }}" class="payment-loading mt-4 ml-4 d-none" style="height: 36px;">
                                    </div>
                                    <div class="col-md-5 d-none payment-created">
                                        <a
                                            href="#"
                                            target="_blank"
                                            style="background: #3853D8!important;"
                                            class="col-md-12 d-block payment-proceed myButton1 mdl-button mdl-js-ripple-effect mdl-js-button mdl-button--raised mdl-button--colored px-4 mt-4"
                                            data-cart-id="{{ $id }}">
                                            Proceed to Payment
                                        </a>
                                        <button
                                            target="_blank"
                                            class="d-none payment-done myButton1 mdl-button mdl-js-button mdl-button--raised mdl-button--colored mdl-js-ripple-effect px-4 mt-4"
                                            data-cart-id="{{ $id }}"
                                            data-grandtotal="{{$total}}"
                                            data-reference=""
                                        >
                                            Mark as Paid
                                        </button>
                                        <img alt="Powered by PayMongo" class="d-block payment-loading mt-4 ml-4" style="height: 36px;" src="https://pm.link/static/media/powered_by.b537e1c4.png">
                                    </div>
                                </div><!-- END ROW -->
                            </div>
                        </div>

                        <div class="tab-pane fade py-5 show active" id="accountDetails" role="tabpanel">
                            <div class="container">

                                <p class="text-secondary">Pay using our Cash on Delivery Service. Full payment is done directly to the courier. No down payments required.</p>

                                <p class="text-secondary">If you want to send your order into another address, just fill the following inputs.</p>
                                <form action="{{url('/order/insert_cod')}}" method="post" class="mt-3">
                                    {{csrf_field()}}
                                    <input type="hidden" name="grandtotal" value="{{$total}}">
                                    <input type="hidden" name="cart_id" value="{{Crypt::encrypt($id)}}">
                                    <input type="hidden" name="label" value="COD">
                                    <label class="text-secondary" for="address">Address</label>
                                    <input type="text" name="address" class="radius5 py-3 px-4 w-100 login_field mb-4" autocomplete="off" placeholder="Put the shipping address here" value="" id="address">
                                    <label class="text-secondary" for="contact_number">Contact Number</label>
                                    <input type="text" name="contact_number1" class="radius5 py-3 px-4 w-100 login_field mb-4" autocomplete="off" value="639+" id="cn" readonly>
                                    <input type="number" name="contact_number2" class="radius5 py-3 px-4 w-100 login_field mb-4" autocomplete="off" placeholder="Enter the remaining number" value="" id="cn2">
                                    <button class="myButton1 mdl-button mdl-js-button mdl-button--raised mdl-button--colored mdl-js-ripple-effect px-4 mt-4">place order now</button>
                                </form>
                            </div>
                        </div>
                        <div class="tab-pane fade py-5" id="addresses" role="tabpanel">
                           <div class="container">

                                <div class="row">
                                    <form id="payment-form" action="{!! URL('order/insert') !!}" method="POST">
                                    <div class="col-md-6">
                                    	<input type="hidden" name="grandtotal" value="{{$total}}">
                                        <input type="hidden" name="cart_id" value="{{Crypt::encrypt($id)}}">
                                        <label id="stripe-error" style="color: red;" class="control-label"></label><br>
                                        <label class="text-secondary" for="card_name">Name on Card</label>
                                        <input type="text" name="name" class="radius5 py-3 px-4 w-100 login_field mb-4" autocomplete="off" placeholder="Name on Card" value="" id="card_name">
                                        <label id="payment-error-name" class="control-label"></label><br>

                                        <label class="text-secondary" for="card_number">Card Number</label>
                                        <input type="text" name="number" class="radius5 py-3 px-4 w-100 login_field mb-4" autocomplete="off" id="card_number" data-stripe="number" data-parsley-type="number"
                                        maxlength="19" data-parsley-trigger="change focusout" data-parsley-class-handler="#cc-group" placeholder="1234 5678 9012 3456">
                                        <label id="payment-error-number" class="control-label"></label><br>

                                        <div class="row">
                                            <div class="col-md-6">
                                                <label class="text-secondary" for="card_expDate">Expiration Date</label>
                                                <input type="text" name="expiry" class="radius5 py-3 px-4 w-100 login_field mb-4" autocomplete="off" placeholder="XX-XXXX" value="" id="card_expDate">
                                                <label id="payment-error-expiry" class="control-label"></label><br>
                                            </div>
                                            <div class="col-md-6">
                                                <label class="text-secondary" for="cvv">CVV</label>
                                                <input type="text" name="cvv" class="radius5 py-3 px-4 w-100 login_field mb-4" autocomplete="off" placeholder="XXXX" value="" id="cvv"
                                                data-stripe = 'cvc' data-parsley-type = 'number'                        data-parsley-trigger = 'change focusout' maxlength = '4'                       data-parsley-class-handler = '#ccv-group'>
                                                <label id="payment-error-cvv" class="control-label"></label><br>
                                            </div>
                                        </div>
                                        {!! csrf_field() !!}
                                        <div class="d-flex">
                                            <div class="toggle_wrapper d-flex position-relative">
                                                <label for="bubble">
                                                    <div class="form">
                                                        <input type="checkbox" id="bubble" / class="d-none">
                                                        <label class="bubble" for="bubble"></label>
                                                    </div>
                                                </label>
                                                <label for="bubble" class="mt-3 rememberMe">Save Card<br><sup class="text-secondary">Information is encrypted and securely stored</sup></label>
                                            </div>
                                        </div>

                                        <button class="submit-payment myButton1 mdl-button mdl-js-ripple-effect mdl-js-button mdl-button--raised mdl-button--colored px-4 mt-4">pay now</button>
                                    </div>
                                    </form>
                                </div><!-- END ROW -->

                           </div>
                        </div>
                    </div>


            </div>
        </div>

    </div>

</div>
</div>
@endsection

@section('js')
    @include('front-end.cart.includes.payment-script')
@endsection