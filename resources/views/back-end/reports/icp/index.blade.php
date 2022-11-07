@extends('back-end.includes.icp')

@section('title')
    Reports | {{ $configuration->name }}
@endsection
@section('content')

    <div class="main-container w-100">

        <div class="main-wrapper">
            
            <div class="container">
                             
                <div class="py-5">
                    <div class="table-responsive">
                            <table class="table table-hover table-bordered bg-white mdl-shadow--4dp" id="iReportsTbl">
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
                                @foreach($products as $product)
                                @php
                                    $total_stock = $product->used_stock + $product->stock;
                                    if ($total_stock != 0 ) {
                                        $percent_stock = ($product->used_stock / $total_stock) * 100;
                                    } else 
                                        $percent_stock = 0;
                                    
                                @endphp
                                    <tr>
                                        <td>{{$product->name}}</td>
                                        <td class="text-capitalize">{{$product->category->name}}</td>
                                        <td>₱ {{$product->price}}</td>
                                        <td>{{$product->stock}}</td>
                                        <td>{{$percent_stock}}%</td>
                                    </tr>
                                @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th colspan="8">
                                            <a href="{{url('/icp/reports/download_invent')}}">
                                            <button class="mdl-button mdl-js-ripple-effect mdl-js-button mdl-button--raised mdl-button--colored myButton1 px-4 py-2 d-flex align-items-center">
                                                <i class="material-icons-new outline-print icon-white mr-2"></i>Print Report
                                            </button></a>
                                        </th>
                                    </tr>
                                </tfoot>
                                <tfoot>
                                    <tr>
                                        <th colspan="8">
                                            {{$products->links("pagination::bootstrap-4")}}
                                        </th>
                                    </tr>
                                </tfoot>
                                <svg xmlns="http://www.w3.org/2000/svg" version="1.1" width="800" class="d-none">
                                    <defs>
                                        <filter id="goo">
                                            <feGaussianBlur in="SourceGraphic" stdDeviation="10" result="blur" />
                                            <feColorMatrix in="blur" mode="matrix" values="1 0 0 0 0  0 1 0 0 0  0 0 1 0 0  0 0 0 19 -9" result="goo" />
                                            <feComposite in="SourceGraphic" in2="goo" operator="atop"/>
                                        </filter>
                                    </defs>
                                </svg>
                            </table>
                        </div>
                </div>

            </div>
        </div>

    </div>


@endsection

@section('js')
    <script type="text/javascript" src="{{asset('assets/custom/js/admin.js')}}"></script>
    <script>
        $(".repSNL").addClass("SNLactive")
        $(".repSNL a").css("color","white") 

        $('#sReport1').click(function(){
            $('.nav-tabs > .active').next('li').find('a').trigger('click')
        })
        $('#iReport1').click(function(){
            $('.nav-tabs > .active > a').trigger('click')
        })

        $(".cust_tabs1").on("click","a",function(){
            $('.cust_tabs1 a').removeClass("reportsTab_active")
            $(this).addClass('reportsTab_active')
            var itemPos = $(this).position()
            $(".cust_selector1").css({
                "left":itemPos.left+"px"
            })
        })  
    </script>
@endsection