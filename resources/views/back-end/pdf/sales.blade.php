<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Export Data</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap jquery --><script type="text/javascript" src="{{asset('assets/jquery/code-jquery-3.2.1.slim.min.js')}}"></script>
    <!-- jquery --><script type="text/javascript" src="{{asset('assets/jquery/jquery-3.3.1.min.js')}}"></script>


    <!-- Bootstrap --><link rel="stylesheet" type="text/css" href="{{asset('assets/bootstrap/css/bootstrap.min.css')}}">

    <style>
        .header{
            font-size: 30px;
        }
        .sam{
            font-size: 12px;
            letter-spacing: 2px;
            color: #4285F4;
        }
    </style>
</head>
<body>
    <div class="text-center">
        <img src="{{asset('assets/images/logo.png')}}" height="100px">
        <div><p class="sam text-uppercase">{{ $configuration->name }}</p></div>
    </div>
    <p class="header text-center text-uppercase">{{ $title }}</p>
    <div class="table-responsive bg-white mdl-shadow--2dp" id="table-container">
        <table class="table table-bordered mb-0">
            <thead>
                <tr>
                    <th>Order Name</th>
                    <th>Payment</th>
                    <th>Status</th>
                    <th>Date of Ordered</th>
                    <th>Type of Payment</th>
                </tr>
            </thead>
            <tbody>
                @php $i=0 @endphp
                @foreach($sales as $sale)
                    <tr>
                        <td class="text-capitalize">{{$sale->order_number}}</td>
                        <td>{{Crypt::decrypt($sale->amount) < 0 ? '₱ 0.00' : '₱'. number_format(Crypt::decrypt($sale->amount)) . '.00'}}</td>
                        <td class="text-uppercase @if($sale->status === 0 ) text-primary @elseif($sale->status === 1) text-warning @elseif($sale->status === 2) text-success @else text-danger @endif">@if ($sale->status === 0 ) processed @elseif ($sale->status === 1) shipped @elseif($sale->status === 2) delivered @else canceled @endif</td>                        
                        <td>{{date('F d, Y', strtotime($sale->created_at))}}</td>
                        <td>
                            @if($sale->type == 0 ) Cash on Delivery
                            @elseif($sale->type == 1 ) Credit Card
                            @elseif($sale->type == 2 ) Paymongo
                            @else Through POS @endif
                        </td>
                    </tr>
                    @php $i += $sale->totalAmount() @endphp
                @endforeach
            </tbody>
        </table>
    </div>
    <p class="header text-uppercase">TOTAL : {{ $i }}</p>
</body>
    <!-- Bootstrap popper --><script type="text/javascript" src="{{asset('assets/bootstrap/popper.min.js')}}"></script>
    <!-- Bootstrap --><script type="text/javascript" src="{{asset('assets/bootstrap/js/bootstrap.min.js')}}"></script>
</html>

