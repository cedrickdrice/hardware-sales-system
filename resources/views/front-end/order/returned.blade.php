@extends('front-end.includes.index')

@section('title')
    Return Product | {{ $configuration->name }}
@endsection
@section('content')
<div class="cust_snackbar snackBar-label p-3 mdl-shadow--4dp">
    <div class="text-white mb-3 label-text">

    </div>
</div>
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
            <div class="row justify-content-between px-5 py-5">
                <div class="col-md">
                    <a href="javascript:history.back()">← Back</a>
                    <p class="h5 text-uppercase Lspacing2 m-0 mb-2">write a comment</p>
                </div>
                <div class="col-md">
                    <p class="text-uppercase dateTxt"><b><span class="text_grayish">purchased on:</span> {{date('F d, Y',strtotime($order->created_at))}} </b></p>
                </div>
            </div>

            <div class="container">

                <div class="row justify-content-center">

                    <div class="col-md-6">

                        <div class="row">
                            <div class="col-sm-4 mb-2">
                                <img src="{{asset('storage/products/' . $product->image)}}" class="w-100">
                            </div>
                            <div class="col-sm-8 mb-2 d-flex align-items-center">
                                <div class="align-self-center">
                                    <p class="lead mb-0 text-capitalize">{{$product->name}}</p>
                                    <small>Category: <strong>{{$product->category->name}}</strong></small>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <form method="POST" action="{{ URL('order/return/add') }}" id="formSubmit">
                                    {{ csrf_field() }}
                                    <input type="hidden" name="product_id" value="{{ $product->id }}">
                                    <input type="hidden" name="order_id" value="{{$order->id}}">
                                    <p class="text-uppercase my-3 lead text-secondary">Why u will return this item?</p>
                                    <textarea class="radius5 py-3 px-4 w-100 login_field mb-4 reviewTxtArea" placeholder="Write here your comment here" rows="7" name="buyer_note" required></textarea>
 
                                    <div class="template_review mb-4">
                                        <span class="temp_add">Deffective</span>
                                        <span class="temp_add">Wrong Item</span>
                                        <span class="temp_add">Wrong Color</span>
                                    </div>

                                    <input type="number" name="quantity" id="quan" required class="login_field radius5 py-3 px-4 mr-3 w-100 mb-3" placeholder="Number of items to be returned">
                                    @foreach($order->order_details as $order_detail)
                                        @if($order_detail->product_id == $product->id)
                                            <input type="hidden" name="" id="maxquan" value="{{$order_detail->quantity}}">
                                        @endif
                                    @endforeach
                                    <button type="submit" class="mdl-button mdl-js-button mdl-js-ripple-effect mdl-button--colored mdl-button--raised myButton1">submit</button>
                                </form>
                            </div>
                        </div>
                        
                    </div>

                </div><!-- END ROW -->
                
                <button class="mdl-button mdl-js-button mdl-js-ripple-effect mdl-button--raised mdl-button--colored myButton1 px-5 py-2 mb-5">continue shopping</button>

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
	@include('includes.links-scripts')
	<!-- custom js --><script type="text/javascript" src="{{asset('assets/custom/js/script.js')}}"></script>

    <script>
        $(document).ready(function(){
            $('#formSubmit').on('submit', function(e){
                let quantity = $('#quan').val()
                let max_quantity = $('#maxquan').val()
                if ( quantity > max_quantity) {
                    e.preventDefault()
                    showSnackBar('The maximum quantity of the product you bought is ' + max_quantity)
                }
            })
            $('.temp_add').on('click', function(){
                // $('.reviewTxtArea').val(content.val() + ' ' $(this).html())
                $('.reviewTxtArea').val($('.reviewTxtArea').val() + ' ' + $(this).html())
            })

        })
        function showSnackBar(word) {
        $('.label-text').html(word)
        $(".snackBar-label").show()
        $(".snackBar-label").animate({
            bottom  : 15,
            opacity : 1,
        })
        setTimeout(function(){
            $(".snackBar-label").animate({
                bottom  : 0,
                opacity : 0
            })
            setTimeout(function(){
                $(".snackBar-label").hide()
            },2000)
        }, 2000)
    }
    </script>
@endsection