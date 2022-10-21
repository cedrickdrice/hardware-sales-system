@extends('front-end.includes.index')

@section('title')
    Payment | SAM
@endsection
@section('content')
<div class="main-container">

<div class="banner">

    <div class="row justify-content-center align-items-center h-100">
        
        <div class="col-8 col-sm-6 col-md-6 col-lg-4 align-self-center text-center">
            <img src="{{asset('assets/images/logo.png')}}" class=""  height="150px">
            <br><br>
            <p class="h5 text-uppercase Lspacing2 text-white text-center m-0 align-self-center">shopping assistant mirror</p>
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
                </ul>

                    <div class="tab-content" id="myTabContent">
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
    <script type="text/javascript" src="https://js.stripe.com/v2/"></script>
    <link rel="stylesheet" type="text/css" href="{{asset('css/sweetalert.css')}}">
    <script type="text/javascript" src="{{asset('js/sweetalert.min.js')}}"></script>
    <script type="text/javascript">
		$('.mdl-navigation2').find('a:nth-child(2)').addClass('activeLink')
	</script>
	<!-- custom js --><script type="text/javascript" src="{{asset('assets/custom/js/script.js')}}"></script>
	@include('includes.links-scripts')
    <script type="text/javascript">
        
        //Functions
            function isNumber(keyCode)
            {
            return keyCode >= 48 && keyCode <= 57;
            }

            function isLetter(keyCode)
            {
            return keyCode >= 65 && keyCode <= 90;
            }

            function isBackSpace(keyCode)
            {
            return keyCode == 8;
            }

            function isTab(keyCode)
            {
            return keyCode == 9;
            }
    </script>
    <script type="text/javascript">
        $(document).ready(function(e){
            $('#cn2').on('keydown', function(e){
                if ($('#cn2').val().length >= 9) {
                    if (!isBackSpace(e.keyCode)){
                        return false   
                    }
                }
            })
            $('#card_number').on('keydown', function(e){
                if(!isNumber(e.keyCode) && !isLetter(e.keyCode) && !isBackSpace(e.keyCode) && !isTab(e.keyCode))
                    return false;
            });
            $('#card_number').on('keyup', function(e){
                var currentInput = $(this).val().replace(/-/g, '');
                var result = '';
                for (var i = 0; i < currentInput.length; i++) {
                    result += currentInput[i];
                    if(i > 0 && i % 4 == 3 && i < (15 - 1))
                        result += '-';
                }
                
                if (result.length > 19) {
                    result = result.substring(0,19)
                }
                
                $(this).val(result);
            });

            $('#card_expDate').on('keydown', function(e){
                if(!isNumber(e.keyCode) && !isBackSpace(e.keyCode) && !isTab(e.keyCode))
                    return false;
            });
            $('#card_expDate').on('keyup', function(e){
                var currentInput = $(this).val().replace(/-/g, '');
                var result = '';
                for (var i = 0; i < currentInput.length; i++) {
                    result += currentInput[i];
                    if(i === 1)
                        result += '-';
                }
                
                if (result.length > 7) {
                    result = result.substring(0,7)
                }
                
                $(this).val(result);
            });
            

            });

        Stripe.setPublishableKey("<?php echo env('STRIPE_KEY') ?>");
  
        $('.submit-payment').click(function(event){
                    // form.addEventListener('submit', function(event) {
            event.preventDefault();
            var payment = $("#payment-form").serialize();
            var expMonthAndYear = $('input[name=expiry]').val().split("-");                    
                            Stripe.card.createToken({
                                name: $('input[name=name]').val(),
                                number: $('input[name=number]').val(),
                                cvc: $('input[name=cvv]').val(),
                                exp_month: expMonthAndYear[0],
                                exp_year: expMonthAndYear[1]
                                }, stripeResponseHandler);
            $.ajax({
                'method'   : 'post' ,
                'url'      : '{!! URL('order/check') !!}',       
                'dataType' : 'json',
                'data'     : payment,  
                success    : function(data){
                    if(data.result == 'success'){                          
                            var expMonthAndYear = $('input[name=expiry]').val().split("-");                    
                            Stripe.card.createToken({
                                name: $('input[name=name]').val(),
                                number: $('input[name=number]').val(),
                                cvc: $('input[name=cvv]').val(),
                                exp_month: expMonthAndYear[0],
                                exp_year: expMonthAndYear[1]
                                }, stripeResponseHandler);
                                $('label[id^=payment-error]').text('');   
                                $('[id^=payment-error]').css('display', 'none');                   
                                $('div[id^=payment]').removeClass('has-error');   
                                $('div[id^=payment-error]').text('');
                    }else{
                        swal("Action failed", "Please check your inputs or connection and try again.", "error");
                        console.log(data.errors);
                        $('label[id^=payment-error]').text('');   
                        $('[id^=payment-error]').css('display', 'none');   
                        
                        $('div[id^=payment]').removeClass('has-error');   
                        $('div[id^=payment-error]').text('');   
                        $.each(data.errors, function(key, value){
                            $('#payment-error-'+ key).css('display', 'inline-block');   
                            $('div[id^=payment-'+key+']').addClass('has-error');   
                            $('#payment-error-'+ key).text('*'+value);
                            
                        } );  
                    }
                },error :function(data){
                                console.log(data.responseText);
                            }
            });
            return false;
        });
               var stripeResponseHandler = function(status, result) {
                    $('.loader').css('display', 'block');
                    $('.loader').css('display', 'none'); 
                    $('#stripe-error').text('');
                    if (result.error) {                     
                        swal("Create Token Failed", "Failed", "error");
                        var error_code = result.error.code;
                        var error_code = error_code.replace(/_/g, ' ');                
                        $('#stripe-error').text('*'+error_code);
                    } else {
                        $('#stripe-error').text('');   
                        $('.loader').css('display', 'none');              
                        swal({
                            title             : "Are you sure?",
                            text              : "You are about to checkout ?",
                            type              : "info",
                            showCancelButton  : true,
                            confirmButtonText : "Yes",
                            cancelButtonText  : "No",
                            closeOnConfirm    : false,
                            closeOnCancel     : false,
                            showLoaderOnConfirm: true
                        }, function(isConfirm){
                            if(isConfirm){
                                stripeTokenHandler(result.id);
                            }
                            else{
                                swal.close();
                            }
                        });
                        return false;
                    }
                }

                function isNumberKey(evt){
                    var charCode = (evt.which) ? evt.which : event.keyCode;
                    return !(charCode > 31 && (charCode < 49 || charCode > 57));
                }

            function stripeTokenHandler(token) {
                var form = document.getElementById('payment-form');
                var hiddenInput = document.createElement('input');
                hiddenInput.setAttribute('type', 'hidden');
                hiddenInput.setAttribute('name', 'stripeToken');
                hiddenInput.setAttribute('value', token);
                form.appendChild(hiddenInput);
                
                form.submit();
            }

    </script>
@endsection