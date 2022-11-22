@extends('front-end.includes.index')

@section('title')
    Order | {{ $configuration->name }}
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
                <p class="h5 text-uppercase Lspacing2 py-5 ml-5">recent orders</p>

                <div class="container">
                    <div class="table-responsive pb-5">
                        <table class="table cart_table text-center">
                                <tr>
                                    <th>ORDER NO.</th>
                                    <th>TOTAL</th>
                                    <th>DATE OF PURCHASE</th>
                                </tr>
                            <tbody>
                                @forelse($orders as $order)
                                <!-- TO BE LOOPED -->
                                <tr>
                                    <td class="text-uppercase">
                                        <a href="{{url('order/detail/' . Crypt::encrypt($order->id))}}">#{{$order->order_number}}</a>
                                    </td>
                                    <td class="text-uppercase">₱{{Crypt::decrypt($order->amount)}}.00</td>
                                    <td class="text-uppercase">{{date('F d, Y',strtotime($order->created_at))}}</td>
                                </tr><!-- END BE LOOPED -->
                                @empty

                                @endforelse
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td colspan="3"></td>
                                </tr>
                            </tfoot>
                        </table>
                    </div><!-- END TABLE CONTAINER -->
                    <a class="mdl-button mdl-js-button mdl-js-ripple-effect mdl-button--raised mdl-button--colored myButton1 px-5 py-2 mb-5" href="{{url('/shop')}}">shop more</a>

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
@endsection