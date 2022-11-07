@extends('back-end.includes.manager')
@section('title')
    Dashboard | {{ $configuration->name }}
@endsection
@section('content')
    

    <!-- CUSTOM SNACKBAR -->

    <div class="cust_snackbar snackBar-plain p-3 mdl-shadow--4dp">
        <div class="text-white">
            <p class="d-flex">
                Welcome!
                <img src="{{asset('assets/images/asd.png')}}" width="16px" height="16px" class="ml-2">
            </p>
            {{Auth()->user()->type}}
        </div>
    </div>

    <!-- END CUSTOM SNACKBAR -->


    <div class="main-container w-100 py-5">

        <div class="main-wrapper">
            <div class="container">
                
                <!-- FOUR PANELS -->
                <div class="row">

                    <div class="col-lg-5ths col-md-4 col-sm-6 panel_wrapper mb-4">
                        <div class="panel">
                            <div class="row">
                                <div class="col-6 col-lg-3 col-md-6 col-sm-6">
                                    
                                </div>
                                <div class="col-6 col-lg-9 col-md-6 col-sm-6 py-3">
                                    <p class="h2 text-white mb-0">{{$total_products}}</p>
                                    <p class="text-uppercase text-white"><small>total products</small></p>
                                </div> 
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-5ths col-md-4 col-sm-6 panel_wrapper mb-4">
                        <div class="panel">
                            <div class="row">
                                <div class="col-6 col-lg-3 col-md-6 col-sm-6">
                                    
                                </div>
                                <div class="col-6 col-lg-9 col-md-6 col-sm-6 py-3">
                                    <p class="h2 text-white mb-0">{{$total_customer}}</p>
                                    <p class="text-uppercase text-white"><small>total customer</small></p>
                                </div> 
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-5ths col-md-4 col-sm-6 panel_wrapper mb-4">
                        <div class="panel">
                            <div class="row">
                                <div class="col-6 col-lg-3 col-md-6 col-sm-6">
                                    
                                </div>
                                <div class="col-6 col-lg-9 col-md-6 col-sm-6 py-3">
                                    <p class="h2 text-white mb-0">{{$total_order}}</p>
                                    <p class="text-uppercase text-white"><small>total order</small></p>
                                </div> 
                            </div>
                        </div>
                    </div>
                    
                    
                    <div class="col-lg-5ths col-md-4 col-sm-6 panel_wrapper mb-4">
                        <div class="panel">
                            <div class="row">
                                <div class="col-6 col-lg-3 col-md-6 col-sm-6">
                                    
                                </div>
                                <div class="col-6 col-lg-9 col-md-6 col-sm-6 py-3">
                                <p class="h5 text-white mb-0">{{$total_sales < 0 ? 'GALINGAN NYO MAG BENTA!!!' : '₱'. number_format($total_sales) . '.00'}}</p>
                                    <p class="text-uppercase text-white"><small>total sales</small></p>
                                </div> 
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-5ths col-md-4 col-sm-6 panel_wrapper mb-4">
                        <div class="panel">
                            <div class="row">
                                <div class="col-6 col-lg-3 col-md-6 col-sm-6">
                                    
                                </div>
                                <div class="col-6 col-lg-9 col-md-6 col-sm-6 py-3">
                                    <p class="h5 text-white mb-0">₱ {{number_format($today_sales)}}.00</p>
                                    <p class="text-uppercase text-white"><small>today sales</small></p>
                                </div> 
                            </div>
                        </div>
                    </div>

                </div><!-- END FOUR PANELS -->

                <!-- GRAPH -->
                <div class="row">

                    <div class="col-sm-12">
                        <div class="chart-container bg-white mdl-shadow--8dp mb-4 radius-5">
                            <p class="h1 text-uppercase letter-spacing-2 text-center py-3">monthly sales</p>
                            <!-- <div class="ct-chart ct-perfect-fourth"></div> -->
                            <div id="monthSales_chart" class="chart monthlySales_chart w-100"></div>
                        </div>
                    </div>

                </div><!-- END GRAPH -->

                <!-- TWO PANELS -->
                <div class="row">
                
                    <!-- BEST SELLER  -->
                    <div class="col-md-6 panel2_wrapper mb-4 d-flex">
                        <div class="panel2 d-flex">
                            <div class="row">
                                <div class="col-sm-6 p-4">
                                    <div class="d-flex flex-column h-100">
                                        <div class="mb-auto">
                                            <p class="h2 text-uppercase letter-spacing text-opacity-6 text-white panel2ItemName">{{ ($best_seller != null && isset($best_seller->product) === true) ? $best_seller->product->name : 'No Order just yet' }}</p>
                                        </div>
                                        <div class="align-self-end mt-auto mr-auto">
                                            <p class="h4 text-uppercase letter-spacing text-opacity-6 text-white panel2Caption1">best seller</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="image_holder position-relative w-100 h-100 d-flex align-content-center">
                                        <img src="{{$best_seller != null && isset($best_seller->product) === true ? asset('storage/products/'. $best_seller->product->image) : '' }}" class="w-100 align-self-center">
                                        <p class="h4 text-uppercase letter-spacing text-opacity-6 text-white panel2Caption2 d-none text-center">best seller</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- BEST SELLER  -->
                    <div class="col-md-6 panel2_wrapper mb-4 d-flex">
                        <div class="panel2 d-flex">
                            <div class="row">
                                <div class="col-sm-6 p-4">
                                    <div class="d-flex flex-column h-100">
                                        <div class="mb-auto">
                                            <p class="h2 text-uppercase letter-spacing text-opacity-6 text-white panel2ItemName">{{$critical_product->name}}</p>
                                        </div>
                                        <div class="align-self-end mt-auto mr-auto">
                                            <p class="h4 text-uppercase letter-spacing text-opacity-6 text-white panel2Caption1">critical level</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="image_holder position-relative w-100 h-100 d-flex align-content-center">
                                        <img src="{{asset('storage/products/'. $critical_product->image)}}" class="w-100 align-self-center">
                                        <p class="h4 text-uppercase letter-spacing text-opacity-6 text-white panel2Caption2 d-none text-center">critical level</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div><!-- END TWO PANELS -->

                <!-- UNDER TWO PANELS -->
                <div class="row">
                    
                    <div class="col-lg-8 d-flex">
                        <div class="bg-white mdl-shadow--8dp panelLatestOrder mb-4 radius-5 w-100 d-flex flex-column">

                            <div class="px-4 pt-4 mb-auto">
                                <p class="lead text-uppercase letter-spacing-2">latest orders</p>
                                <div class="table-responsive">
                                    <table class="table table-bordered table-hover text-center">
                                        <thead class="text-uppercase mb-0">
                                            <tr>
                                                <th>order id</th>
                                                <th>customer</th>
                                                <th>no. of items</th>
                                                <th>total</th>
                                                <th>date of purchase</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($latest_orders as $latest_order)
                                            <tr>
                                                <td>{{$latest_order->order_number}}</td>
                                                <td class="text-capitalize">jear</td>
                                                <td>{{count($latest_order->order_details)}}</td>
                                                <td>₱{{Crypt::decrypt($latest_order->amount)}}.00</td>
                                                <td class="text-capitalize">{{date('F m, Y', strtotime($latest_order->created_at))}}</td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="d-flex">
                                <a href="{{URL('/products')}}" class="text-center text-uppercase letter-spacing-2 py-2 w-100 mybg_primary text-white manageBTN mdl-js-button mdl-js-ripple-effect bottom_radius-5 position-relative">manage products</a>
                            </div>

                        </div>
                    </div>

                    <div class="col-lg-4">
                        <div class="bg-white mdl-shadow--8dp panelRecetlyAddedProducts radius-5 mb-4">

                            <div class="px-4 pt-4 pb-3">
                                <p class="lead text-uppercase">recently added products</p>
                                <div class="container-fluid">
                                    <div class="row">
                                    @foreach($recently_addeds as $recently_added)
                                        <!-- ITEM TO BE LOOPED -->
                                        <div class="col-sm-12 mdl-shadow--4dp mb-3 py-2 radius-3">
                                            <div class="row">
                                                <div class="col-sm-2 px-2">
                                                    <div class="img_holderRAP">
                                                        <img src="{{asset('storage/products/'. $recently_added->image)}}" class="img-fluid">
                                                    </div>
                                                </div>
                                                <div class="col-sm-10 px-2">
                                                    <div class="position-relative">
                                                        <div class="itemNameRAP d-flex justify-content-between">
                                                            <a href="#" class="text-uppercase align-self-center">{{$recently_added->name}}</a>
                                                            <div>
                                                                <div class="mybg_primary p-1 radius-3 text-white"><small>₱{{$recently_added->price}}</small></div>
                                                            </div>
                                                        </div>
                                                        <div class="itemParaRAP">
                                                            <p>{{$recently_added->description}}</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div><!-- ITEM TO BE LOOPED -->
                                    @endforeach
                                    </div>
                                </div>
                            </div> 

                            <div class="d-flex">
                                <a href="{{url('admin/products')}}" class="text-center text-uppercase letter-spacing-2 py-2 w-100 mybg_primary text-white manageBTN mdl-js-button mdl-js-ripple-effect bottom_radius-5 position-relative">manage products</a>
                            </div>

                        </div>
                    </div>

                </div><!-- END UNDER TWO PANELS -->

                <!-- 2 charts -->
                <div class="row">
                    
                    <!-- top 10 best seller items -->
                    <div class="col-md-12">
                        
                        <div class="chart-container bg-white mdl-shadow--8dp mb-4 radius-5 pb-4">
                            <p class="h1 text-uppercase letter-spacing-2 text-center py-3">top 10 best sellers</p>
                            <div id="bestSeller_chart" class="chart bestSeller_chart w-100"></div>
                        </div>

                    </div>

                </div>

            </div>
        </div>

    </div>


@endsection

@section('js')
    <script>
        $(".dashSNL").addClass("SNLactive")
        $(".dashSNL a").css("color","white")   
    </script>
    <script>

    // $.each('{!!$monthly_sales!!}', function(index, value){
        
    // })
    let month_arr = []
    let prod_arr = []
    let stock = ''
    let used_stock = ''
    let total_stock = 0
    let delivery_price = ''
    let payment = 0 
    @foreach($monthly_products as $product)
        @foreach($product as $p)
             stock = '{!! $p->stock !!}'
             used_stock = '{!! $p->used_stock !!}'
             total_stock = parseInt(stock) + parseInt(used_stock)
             delivery_price = '{!! $p->delivery_price !!}'
             payment = parseInt(delivery_price) * parseInt(total_stock)
            prod_arr['{!! $loop->index !!}'] = payment
        @endforeach
    @endforeach

    @foreach($monthly_sales as $sale)
        total = 0
        payment = 0
        @foreach($sale as $s)
            total += parseInt('{!! $s->totalAmount() !!}')
            
        @endforeach
        month_arr.push(
                {
                    "month" : '{!! date("M",strtotime($s->created_at))!!}',
                    "sales1" : total,
                    "market1" : prod_arr['{!! $loop->index !!}']
                }
            )
    @endforeach
    var monthly = AmCharts.makeChart("monthSales_chart", {
    "type": "serial",
    "theme": "light",
    "addClassNames": true,
    "classNamePrefix": "amcharts",
    "precision": 2,
    "valueAxes": [{
        "id": "v1",
        "title": "Sales",
        "position": "left",
        "autoGridCount": false,
        "labelFunction": function(value) {
        return "" + Math.round(value);
        },
        "gridAlpha": 0,
        "gridThickness": 0
    }],
    "graphs": [ {
        "id": "g4",
        "valueAxis": "v1",
        "lineColor": "#4486F4",
        "fillColors": "#4486F4",
        "fillAlphas": 1,
        "type": "column",
        "title": "Actual Sales",
        "valueField": "sales1",
        "clustered": false,
        "columnWidth": 0.3,
        "legendValueText": "₱[[value]]",
        "balloonText": "[[title]]<br /><b style='font-size: 130%'>₱[[value]]</b>"
    }, {
    "id": "g1",
    "valueAxis": "v2",
    "bullet": "round",
    "bulletBorderAlpha": 1,
    "bulletColor": "#FFFFFF",
    "bulletSize": 10,
    "hideBulletsCount": 50,
    "lineThickness": 2,
    "lineColor": "#FF4F72",
    "type": "smoothedLine",
    "title": "Target Sales",
    "useLineColorForBulletBorder": true,
    "valueField": "market1",
    "legendValueText": "₱[[value]]",
    "balloonText": "[[title]]<br /><b style='font-size: 130%'>₱[[value]]</b>"
  }],
    "chartScrollbar": {
        "graph": "g1",
        "oppositeAxis": false,
        "offset": 30,
        "scrollbarHeight": 50,
        "backgroundAlpha": 0,
        "selectedBackgroundAlpha": 0.1,
        "selectedBackgroundColor": "#888888",
        "graphFillAlpha": 0,
        "graphLineAlpha": 0.5,
        "selectedGraphFillAlpha": 0,
        "selectedGraphLineAlpha": 1,
        "autoGridCount": true,
        "color": "#AAAAAA"
    },
    "chartCursor": {
        "pan": false,
        "valueLineEnabled": true,
        "valueLineBalloonEnabled": true,
        "cursorAlpha": 0,
        "valueLineAlpha": 0.2,
        "categoryBalloonColor": "#222222"
    },
    "categoryField": "month",
    "categoryAxis": {
        "parsemonths": true,
        "dashLength": 1,
        "minorGridEnabled": true,
        "axisAlpha":0,
        "gridAlpha":0
    },
    "legend": {
        "useGraphSettings": true,
        "position": "top",
        "align":"center"
    },
    "balloon": {
        "borderThickness": 1,
        "shadowAlpha": 0
    },
    "export": {
    "enabled": true
    },
    "responsive": {
        "enabled": true
    },
    "dataProvider": month_arr
    });

    </script>

    <script>
    let best_arr = []
    @foreach($best_sellers as $best)
        @if(isset($best->product) === true)
            best_arr.push(
                {
                    "name" : '{!! $best->product->name !!}',
                    "points" : "{!! $best->best_seller !!}",
                    "color" : "#4486F4",
                    "bullet" : '{!! asset("storage/products/" . $best->product->image) !!}',
                }
            )
        @endif
    @endforeach
    var chart = AmCharts.makeChart("bestSeller_chart",
    {
        "type": "serial",
        "theme": "light",
        "dataProvider": best_arr,
        "valueAxes": [{
            "maximum": 100,
            "minimum": 0,
            "axisAlpha": 0,
            "dashLength": 4,
            "position": "left",
            "labelsEnabled":false
        }],
        "startDuration": 1,
        "graphs": [{
            "balloonText": "<span style='font-size:13px;'>[[category]]: <b>[[value]]</b></span>",
            "bulletOffset": 10,
            "bulletSize": 52,
            "colorField": "color",
            "customBulletField": "bullet",
            "fillAlphas": 1,
            "lineAlpha": 0,
            "type": "column",
            "valueField": "points"
        }],
        "autoMargins": true,
        "categoryField": "name",
        "categoryAxis": {
            "axisAlpha": 0,
            "gridAlpha": 0,
            "inside": false,
            "tickLength": 0,
            "labelRotation": 45
        },
        "export": {
            "enabled": true
        }
    });
    </script>
   
    <script src="{{asset('assets/custom/js/charts/cashierPerf.js')}}"></script>
@endsection
