@extends('front-end.includes.index')

@section('title')
    Cart | {{ $configuration->name }}
@endsection
@section('content')


<!-- CUSTOM SNACKBAR -->

<div class="cust_snackbar snackBar-label p-3 mdl-shadow--4dp">
    <div class="text-white mb-3 label-text">

        {{$snackbar}}
    </div>
</div>

<div class="cust_snackbar snackBar-okCancel p-3 mdl-shadow--4dp">
    <div class="text-white mb-3" id="snack-question">
        Remove this product?
    </div>
    <div class="d-flex w-100 justify-content-end">
        <button type="button" class="mdl-button mdl-js-button mdl-js-ripple-effect text-primary" id="btnOk">ok</button>
        <button type="button" class="mdl-button mdl-js-button mdl-js-ripple-effect text-primary" id="btnCancel">cancel</button>
    </div>
</div>


<!-- END CUSTOM SNACKBAR --> 


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
				<p class="h5 text-uppercase Lspacing2 py-5 ml-5">cart</p>

				<div class="container" >
					<div id="content">
						@include('front-end.cart.includes.inner-index')
					</div>
					<form action="{{url('cart/payment')}}" method="post">
						{{csrf_field()}}
						<input type="hidden" name="cart_id" id="" value="{{ $cart !== null ? $cart->id : '' }}">
						<input type="hidden" name="grandtotal" id="grandtotal" value="{{$cart === null ? '0' : $cart->total()}}">
						@if ( $cart !== null  && count($cart->items) !== 0)
							<button type="submit" class="mdl-button mdl-js-button mdl-js-ripple-effect mdl-button--raised mdl-button--colored myButton1 px-5 py-2 mb-5">link to payment</button>
						@endif
							<a class="mdl-button mdl-js-button mdl-js-ripple-effect mdl-button--raised mdl-button--colored myButton1 px-5 py-2 mb-5" href="{{url('/shop')}}">shop more</a>
						
					</form>
					
				</div>
			</div>

		</div>

	</div>
</div>

@endsection

@section('js')
	<script type="text/javascript">
		$('.mdl-navigation2').find('a:nth-child(2)').addClass('activeLink')
	</script>
	<!-- custom js --><script type="text/javascript" src="{{asset('assets/custom/js/script.js')}}"></script>
	@include('includes.links-scripts')
	<script type="text/javascript">
	$(document).ready(function(){
		sizeChange()
		inputQuantity()
		colorChange()
		btnRemove()
		@if(Session::has('info'))
			showSnackBar("{{ Session::get('info') }}")
		@endif
	
	})
	let id
	let productName
	function btnRemove(){
		$('.btnRemove').on('click', function(){
			id = $(this).data('id')
			productName = $(this).data('product')
			$('#snack-question').empty()
			$('#snack-question').append("Remove " + productName + " from cart?")

			$(".snackBar-okCancel").show()
			$(".snackBar-okCancel").animate({
				bottom  : 15,
				opacity : 1
			})
		});
		$("#btnOk").on("click",function(){
			deleteItem(id)
		})
		$("#btnCancel").on('click',function(){
			$(".snackBar-okCancel").animate({
				bottom  : 0,
				opacity : 0
			})
		})
	}
	function inputQuantity(){
		$('.quantityChange').on('change', function(){
			var id = $(this).data('id')
			var quantity = $(this).val()
			$.ajax({
				url 	: "{{url('cart/update')}}",
				type	: "post",
				dataType: 'json',
				data 	: {
					"id" : id,
					"quantity" : quantity,
					"_token": "{{ csrf_token() }}"
				}, 
				success : function(data) {
						if ( data.word == "Updated Successfully") {
							$('#grandtotal').val(data.cart.total)
						}
						$('#content').empty()
						$('#content').append(data.content)
						inputQuantity()
						sizeChange()
						colorChange()
						btnRemove()
						showSnackBar(data.word)
				},
				error 	: function(data) {
					console.log(data)
				}
			})
		})
	}
	function colorChange(){
		$('.color-option').on('change', function(){
			let product_id = $(this).val()
			let cart_detail_id = $(this).data('id')
			$.ajax({
				url 	: "{{url('cart/changeColor')}}/" + product_id + '/' + cart_detail_id,
				type	: "get",
				success : function(data) {
						$('#content').empty()
						$('#content').append(data.content)
						// $('#image_' + data.id).attr('src', '{{asset('storage/products')}}/' + data.image)
						inputQuantity()
						colorChange()
						sizeChange()
						btnRemove()
						showSnackBar(data.word)
				},
				error 	: function(data) {
					console.log(data)
				}
			})
		})
	}
	function sizeChange(){
		$('.size-option').on('change', function(){
			let size_id = $(this).val()
			let cart_detail_id = $(this).data('id')
			$.ajax({
				url 	: "{{url('cart/changeSize')}}/" + size_id + '/' + cart_detail_id,
				type	: "get",
				success : function(data) {
						$('#content').empty()
						$('#content').append(data.content)
						inputQuantity()
						colorChange()
						sizeChange()
						btnRemove()
						showSnackBar(data.word)
				},
				error 	: function(data) {
					console.log(data)
				}
			})
		})
	}
	
	function deleteItem(id){
		$.ajax({
			url		: "{{url('cart/delete')}}/" + id,
			type	: "get",
			success : function(data) {
					$('#content').empty()
					$('#content').append(data.content)
					inputQuantity()
					colorChange()
					sizeChange()
					btnRemove()
					showSnackBar(data.word)
					$(".snackBar-okCancel").animate({
						bottom  : 0,
						opacity : 0
					})
			},
			error	: function(data) {
				console.log(data);
			}
		});
	}

	
	</script>
@endsection