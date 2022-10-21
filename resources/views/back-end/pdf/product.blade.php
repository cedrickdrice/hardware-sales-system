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
        <div><p class="sam text-uppercase">shopping assistant mirror</p></div>
    </div>
    <p class="header text-center text-uppercase">{{ $title }}</p>
    <div class="table-responsive bg-white mdl-shadow--2dp" id="table-container">
        <table class="table table-bordered mb-0">
            <thead>
                <tr>
                    <th>Product Name</th>
                    <th>Category</th>
                    <th>Price</th>
                    <th>Available Stock</th>
                    <th>Stock (%)</th>
                </tr>
            </thead>
            <tbody>
                @forelse($products as $product)
                @php
                    $total_stock = $product->used_stock + $product->stock;
                    $percent_stock = ($product->used_stock / $total_stock) * 100;
                @endphp
                    <tr>
                        <td>{{$product->name}}</td>
                        <td>{{$product->category->name}}</td>
                        <td>{{$product->price}}</td>
                        <td>{{$product->stock}}</td>
                        <td>{{$percent_stock}} (%)</td>
                    </tr>
                @empty
                <tr><td colspan="7">No data</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
</body>
    <!-- Bootstrap popper --><script type="text/javascript" src="{{asset('assets/bootstrap/popper.min.js')}}"></script>
    <!-- Bootstrap --><script type="text/javascript" src="{{asset('assets/bootstrap/js/bootstrap.min.js')}}"></script>
</html>