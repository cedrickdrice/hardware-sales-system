
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
    $(document).ready(function(e) {
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

    Stripe.setPublishableKey("{{ env('STRIPE_KEY') }}");

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

    $('.create-payment').on('click', function (e) {
        e.preventDefault();
        let oElement = $(this);
        let iCartId = $(this).data('cart-id');
        $(this).siblings('.payment-loading').removeClass('d-none');
        // $(this).prop('disabled', true);

        $.ajax({
            url 	: "{{ url('order/paymongo/payment/create') }}",
            type	: "post",
            dataType: 'json',
            data 	: {
                "id" : iCartId,
                "_token": "{{ csrf_token() }}"
            },
            success : function(data) {
                let ePaymentCreated = oElement.parent().siblings('.payment-created');
                oElement.parent().addClass('d-none');
                ePaymentCreated.removeClass('d-none');
                ePaymentCreated.find('.payment-proceed').attr('href', data.data.checkout_url);
                ePaymentCreated.find('.payment-done').attr('data-reference', data.data.reference_number);
            },
            error 	: function(data) {
                console.log(data)
            }
        })
    });
    $('.payment-proceed').on('click', function (e) {
        let oElement = $(this);
        oElement.siblings('.payment-done')
            .removeClass('d-none')
            .addClass('d-block');
    });
    $('.payment-done').on('click', function (e) {
        e.preventDefault();
        let oElement = $(this);
        let iCartId = $(this).data('cart-id');
        let sReference = $(this).data('reference');
        let sGrandtotal = $(this).data('grandtotal');

        $.ajax({
            url 	: "{{url('/order/insert_mongo')}}",
            type	: "post",
            dataType: 'json',
            data 	: {
                "cart_id" : iCartId,
                "label" : 'Paymongo',
                "reference_number" : sReference,
                "grandtotal" : sGrandtotal,
                "_token": "{{ csrf_token() }}"
            },
            success : function(data) {
                if (data.status === 'failed') {
                    swal({
                        title             : "Unpaid Payment",
                        text              : "Please pay through Proceed to Payment",
                        type              : "error"
                    });
                    return;
                }
                location.href = '/account#recentOrders';
            },
            error 	: function(data) {
                console.log(data)
            }
        })
    });
</script>