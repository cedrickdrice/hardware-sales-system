@extends('back-end.includes.admin')

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
                <!-- {{-- <div class="row">
                    <div class="col-sm-12">
                        <form method="post">
                            <textarea id="mytextarea1">Hello, Worldasdasdasdasdasd!</textarea>
                        </form>
                    </div>
                </div> --}} -->
                <div class="row">

                    <div class="col-sm-6 col-md-6 col-lg-4 panel_wrapper_plain mb-4">
                        <div class="panel h-100">
                            <div class="row">
                                <div class="col-6">
                                    <div class="h-100 d-flex align-items-center">
                                        <div>
                                            <img src="{{asset('assets/images/process.png')}}" alt="" class="w-100">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6 py-5">
                                    <div class="px-3">
                                        <p class="h2 mb-0">{{$total_process}}</p>
                                        <p class="text-uppercase"><small>total processed & shipped order</small></p>
                                    </div>
                                </div> 
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-6 col-md-6 col-lg-4 panel_wrapper_plain mb-4">
                        <div class="panel h-100">
                            <div class="row">
                                <div class="col-6">
                                    <div class="h-100 d-flex align-items-center">
                                        <div>
                                            <img src="{{asset('assets/images/delivery.png')}}" alt="" class="w-100">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6 py-5">
                                    <div class="px-3">
                                        <p class="h2 mb-0">{{$total_shipped}}</p>
                                        <p class="text-uppercase"><small>total delivered order</small></p>
                                    </div>
                                </div> 
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-6 col-md-6 col-lg-4 panel_wrapper_plain mb-4">
                        <div class="panel h-100">
                            <div class="row">
                                <div class="col-6">
                                    <div class="h-100 d-flex align-items-center">
                                        <div>
                                            <img src="{{asset('assets/images/payment.png')}}" alt="" class="w-100">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6 py-5">
                                    <div class="px-3">
                                        <p class="h2 mb-0">{{$total_paid}}</p>
                                        <p class="text-uppercase"><small>total paid order via credit card</small></p>
                                    </div>
                                </div> 
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-6 col-md-6 col-lg-4 panel_wrapper_plain mb-4">
                        <div class="panel h-100 container">
                            <div class="row">
                                <div class="col-6">
                                    <div class="h-100 d-flex align-items-center">
                                        <div>
                                            <img src="{{asset('assets/images/payment-processed.png')}}" alt="" class="w-100">
                                        </div>
                                    </div>
                                </div> 
                                <div class="col-6 py-5">
                                    <div class="px-3">
                                        <p class="h2 mb-0">{{$total_cod}}</p>
                                        <p class="text-uppercase"><small>total cash on delivery transaction</small></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-6 col-md-6 col-lg-4 panel_wrapper_plain mb-4">
                        <div class="panel h-100">
                            <div class="row">
                                <div class="col-6">
                                    <div class="h-100 d-flex align-items-center px-3">
                                        <div>
                                            <img src="{{asset('assets/images/inventory.png')}}" alt="" class="w-100">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6 py-5 px-3">
                                    <div class="px-3">
                                        <p class="h2 mb-0">{{$total_products}}</p>
                                        <p class="text-uppercase"><small>total products</small></p>
                                    </div>
                                </div> 
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-6 col-lg-4 panel_wrapper_plain mb-4">
                        <div class="panel h-100">
                            <div class="row">
                                <div class="col-6">
                                    <div class="h-100 d-flex align-items-center">
                                        <div>
                                            <img src="{{asset('assets/images/employee.png')}}" alt="" class="w-100">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6 py-5">
                                    <div class="px-3">
                                        <p class="h2 mb-0">{{$total_employee}}</p>
                                        <p class="text-uppercase"><small>total employee</small></p>
                                    </div>
                                </div> 
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-6 col-lg-4 panel_wrapper_plain mb-4">
                        <div class="panel h-100">
                            <div class="row">
                                <div class="col-6">
                                    <div class="h-100 d-flex align-items-center">
                                        <div>
                                            <img src="{{asset('assets/images/Online_shopping.png')}}" class="w-100" alt="">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6 py-5 px-3">
                                    <div class="px-3">
                                        <p class="h2 mb-0">{{$total_customer}}</p>
                                        <p class="text-uppercase"><small>total customer</small></p>
                                    </div>
                                </div> 
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-6 col-lg-4 panel_wrapper_plain mb-4">
                        <div class="panel h-100">
                            <div class="row">
                                <div class="col-6">
                                    <div class="h-100 d-flex align-items-center">
                                        <div>
                                            <img src="{{asset('assets/images/total_sales.png')}}" alt="" class="w-100">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6 py-5">
                                    <div class="px-3">
                                        <p class="h2 mb-0">₱ {{number_format($total_sales)}}.00</p>
                                        <p class="text-uppercase"><small>total sales</small></p>
                                    </div>
                                </div> 
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-6 col-lg-4 panel_wrapper_plain mb-4">
                        <div class="panel h-100">
                            <div class="row">
                                <div class="col-6">
                                    <div class="h-100 d-flex align-items-center">
                                        <div>
                                            <img src="{{asset('assets/images/today_sales.png')}}" alt="" class="w-100">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6 py-5">
                                    <div class="px-3">
                                        <p class="h2 mb-0">₱{{number_format($today_sales)}}.00</p>
                                        <p class="text-uppercase"><small>today sales</small></p>
                                    </div>
                                </div> 
                            </div>
                        </div>
                    </div>
                </div><!-- END FOUR PANELS -->

            </div>
        </div>

    </div>


@endsection

@section('js')
    <script type="text/javascript" src="../assets/custom/js/admin.js"></script>
    <script type="text/javascript" src="{{asset('assets/custom/js/dashboard_chart.js')}}"></script>
    <script>
        $(".dashSNL").addClass("SNLactive")
        $("body").addClass("admin")
        $(".dashSNL a").css("color","white")   
    </script>
@endsection