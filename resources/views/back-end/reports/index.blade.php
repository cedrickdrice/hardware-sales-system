@extends('back-end.includes.manager')

@section('title')
    Reports | {{ $configuration->name }}
@endsection
@section('content')

    <div class="main-container w-100">

        <div class="main-wrapper">
            <div class="container">
                
                <ul class="nav nav-tabs d-none" id="reportsTab" role="tablist">
                    <li class="nav-item active">
                        <a class="nav-link" id="iReport-tab" data-toggle="tab" href="#iReport" aria-controls="iReport" aria-selected="true">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="sReport-tab" data-toggle="tab" href="#sReport" aria-controls="sReport" aria-selected="false">Profile</a>
                    </li>
                </ul> 
                <nav class="cust_tabs1 mt-4 p-0 d-flex w-100 bg-white">
                    <div class="cust_selector1" id="cust_selector1"></div>
                    <a href="#" class="reportsTab_active mdl-js-button mdl-js-ripple-effect w-50 text-center position-relative py-3" id="iReport1">INVENTORY REPORTS</a>
                    <a href="#" class="mdl-js-button mdl-js-ripple-effect w-50 text-center position-relative py-3" id="sReport1">SALES REPORT</a>
                </nav>                                  
                <div class="tab-content" id="myReportTab">
                    <div class="tab-pane fade show active h-100 py-5" id="iReport" role="tabpanel" aria-labelledby="iReport-tab">
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
                                    $percent_stock = ($product->used_stock / $total_stock) * 100;
                                @endphp
                                    <tr>
                                        <td>{{$product->name}}</td>
                                        <td class="text-capitalize">{{$product->category->name}}</td>
                                        <td>₱{{$product->price}}</td>
                                        <td>{{$product->stock}}</td>
                                        <td>{{$percent_stock}} (%)</td>
                                    </tr>
                                @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th colspan="8">
                                            <a href="{{url('/manager/reports/download_invent')}}">
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
                                {{-- <svg xmlns="http://www.w3.org/2000/svg" version="1.1" width="800" class="d-none">
                                    <defs>
                                        <filter id="goo">
                                            <feGaussianBlur in="SourceGraphic" stdDeviation="10" result="blur" />
                                            <feColorMatrix in="blur" mode="matrix" values="1 0 0 0 0  0 1 0 0 0  0 0 1 0 0  0 0 0 19 -9" result="goo" />
                                            <feComposite in="SourceGraphic" in2="goo" operator="atop"/>
                                        </filter>
                                    </defs>
                                </svg> --}}
                            </table>
                        </div>
                    </div>
                    <div class="tab-pane fade active py-5" id="sReport" role="tabpanel" aria-labelledby="sReport-tab">
                        <form action="{{url('/manager/reports/search')}}" method="post">
                        {{csrf_field()}}
                            <div class="container-fluid">
                                <div class="row w-100">
                                    <div class="col-sm-3">
                                        <div class="dateFrom">
                                            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txtFields">
                                                <input class="mdl-textfield__input" type="text" id="date1" name="dateFrom">
                                                <label class="mdl-textfield__label" for="date1">From</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="d-flex">
                                            <div class="dateTo mr-4">
                                                <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txtFields">
                                                    <input class="mdl-textfield__input" type="text" id="date2" name="dateTo">
                                                    <label class="mdl-textfield__label" for="date2">To</label>
                                                </div>
                                            </div>
                                            <div class="alingn-self-center">
                                                <button class="mdl-button mdl-js-ripple-effect mdl-js-button mdl-button--raised mdl-button--colored mdl-button--fab cust_gradient text-white">
                                                    <i class="material-icons">search</i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <div class="table-responsive">
                            <table class="table table-hover table-bordered bg-white mdl-shadow--4dp">
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
                                @foreach($sales as $sale)
                                    <tr>
                                        <td class="text-capitalize">{{$sale->order_number}}</td>
                                        <td>{{number_format(Crypt::decrypt($sale->amount)) < 0 ? '₱ 0.00' : '₱'. number_format(Crypt::decrypt($sale->amount)) . '.00'}}</td>
                                        <td class="text-uppercase @if($sale->status === 0 ) text-primary @elseif($sale->status === 1) text-warning @elseif($sale->status === 2) text-success @else text-danger @endif">@if ($sale->status === 0 ) processed @elseif ($sale->status === 1) shipped @elseif($sale->status === 2) delivered @else canceled @endif</td>
                                        <td>{{date('F d, Y', strtotime($sale->created_at))}}</td>
                                        <td>
                                            @if($sale->type == 0 ) Cash on Delivery
                                            @elseif($sale->type == 1 ) Credit Card
                                            @elseif($sale->type == 2 ) Paymongo
                                            @else Through POS @endif
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th colspan="5">
                                            <a href="{{url('/manager/reports/download_sales')}}">
                                            <button class="mdl-button mdl-js-ripple-effect mdl-js-button mdl-button--raised mdl-button--colored myButton1 px-4 py-2 d-flex align-items-center">
                                                <i class="material-icons-new outline-print icon-white mr-2"></i>Print Report
                                            </button></a>
                                        </th>
                                    </tr>
                                </tfoot>
                                <tfoot>
                                    <tr>
                                        <th colspan="4">
                                            {{$sales->links("pagination::bootstrap-4")}}
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

    </div>


@endsection

@section('js')
    <script type="text/javascript" src="{{asset('assets/custom/js/admin.js')}}"></script>
    <script>
        $(".repSNL").addClass("SNLactive")
        $(".repSNL a").css("color","white") 

        $('#date1').bootstrapMaterialDatePicker({ weekStart : 0, time: false, clearButton: true })
        $('#date2').bootstrapMaterialDatePicker({ weekStart : 0, time: false, clearButton: true })
        
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

        $(document).ready(function(){
            if ( '{{$label}}' == 'yes') {
                $('#sReport1').click()
            }
        })
        

    </script>
@endsection