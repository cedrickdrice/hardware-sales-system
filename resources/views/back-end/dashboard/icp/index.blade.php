@extends('back-end.includes.icp')

@section('title')
    Dashboard | SAM
@endsection
@section('content')
    

    <!-- CUSTOM SNACKBAR -->

    <div class="cust_snackbar snackBar-plain p-3 mdl-shadow--4dp">
        <div class="text-white">
            <p class="d-flex">
                Welcome!
                <img src="{{asset('assets/images/asd.png')}}" width="16px" height="16px" class="ml-2">
            </p>
            Firstname Lastname
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

                    <div class="col-sm-6 col-md-6 col-lg-3 panel_wrapper mb-4">
                        <div class="panel">
                            <div class="row">
                                <div class="col-6">
                                    
                                </div>
                                <div class="col-6 py-3">
                                    <p class="h2 text-white mb-0">12,508</p>
                                    <p class="text-uppercase text-white"><small>total products</small></p>
                                </div> 
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-6 col-md-6 col-lg-3 panel_wrapper mb-4">
                        <div class="panel">
                            <div class="row">
                                <div class="col-6">
                                    
                                </div>
                                <div class="col-6 py-3">
                                    <p class="h2 text-white mb-0">12,508</p>
                                    <p class="text-uppercase text-white"><small>total products</small></p>
                                </div> 
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-6 col-md-6 col-lg-3 panel_wrapper mb-4">
                        <div class="panel">
                            <div class="row">
                                <div class="col-6">
                                    
                                </div>
                                <div class="col-6 py-3">
                                    <p class="h2 text-white mb-0">12,508</p>
                                    <p class="text-uppercase text-white"><small>total products</small></p>
                                </div> 
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-6 col-md-6 col-lg-3 panel_wrapper mb-4">
                        <div class="panel">
                            <div class="row">
                                <div class="col-6">
                                    
                                </div>
                                <div class="col-6 py-3">
                                    <p class="h2 text-white mb-0">12,508</p>
                                    <p class="text-uppercase text-white"><small>total products</small></p>
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
                                            <p class="h2 text-uppercase letter-spacing text-opacity-6 text-white panel2ItemName">yellow blouse</p>
                                        </div>
                                        <div class="align-self-end mt-auto mr-auto">
                                            <p class="h4 text-uppercase letter-spacing text-opacity-6 text-white panel2Caption1">best seller</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="image_holder position-relative w-100 h-100 d-flex align-content-center">
                                        <img src="{{asset('assets/images/yellow.png')}}" class="w-100 align-self-center">
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
                                            <p class="h2 text-uppercase letter-spacing text-opacity-6 text-white panel2ItemName">gray stripe</p>
                                        </div>
                                        <div class="align-self-end mt-auto mr-auto">
                                            <p class="h4 text-uppercase letter-spacing text-opacity-6 text-white panel2Caption1">critical level</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="image_holder position-relative w-100 h-100 d-flex align-content-center">
                                        <img src="{{asset('assets/images/stripe.png')}}" class="w-100 align-self-center">
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
                                            <tr>
                                                <td>#20180001</td>
                                                <td class="text-capitalize">jear</td>
                                                <td>2</td>
                                                <td>₱ 2018.00</td>
                                                <td class="text-capitalize">August 08, 2018</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="d-flex">
                                <a href="{{URL('/icp/products')}}" class="text-center text-uppercase letter-spacing-2 py-2 w-100 mybg_primary text-white manageBTN mdl-js-button mdl-js-ripple-effect bottom_radius-5 position-relative">manage products</a>
                            </div>

                        </div>
                    </div>

                    <div class="col-lg-4">
                        <div class="bg-white mdl-shadow--8dp panelRecetlyAddedProducts radius-5 mb-4">

                            <div class="px-4 pt-4 pb-3">
                                <p class="lead text-uppercase">recently added products</p>
                                <div class="container-fluid">
                                    <div class="row">

                                        <!-- ITEM TO BE LOOPED -->
                                        <div class="col-sm-12 mdl-shadow--4dp mb-3 py-2 radius-3">
                                            <div class="row">
                                                <div class="col-sm-2 px-2">
                                                    <div class="img_holderRAP">
                                                        <img src="{{asset('assets/images/yellow.png')}}" class="img-fluid">
                                                    </div>
                                                </div>
                                                <div class="col-sm-10 px-2">
                                                    <div class="position-relative">
                                                        <div class="itemNameRAP d-flex justify-content-between">
                                                            <a href="#" class="text-uppercase align-self-center">yellow blouse</a>
                                                            <div>
                                                                <div class="mybg_primary p-1 radius-3 text-white"><small>₱ 2018.00</small></div>
                                                            </div>
                                                        </div>
                                                        <div class="itemParaRAP">
                                                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                                                            tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                                                            quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                                                            consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                                                            cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                                                            proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div><!-- ITEM TO BE LOOPED -->

                                    </div>
                                </div>
                            </div> 

                            <div class="d-flex">
                                <a href="{{url('icp/products')}}" class="text-center text-uppercase letter-spacing-2 py-2 w-100 mybg_primary text-white manageBTN mdl-js-button mdl-js-ripple-effect bottom_radius-5 position-relative">manage products</a>
                            </div>

                        </div>
                    </div>

                </div><!-- END UNDER TWO PANELS -->

                <!-- 2 charts -->
                <div class="row">
                    
                    <!-- top 10 best seller items -->
                    <div class="col-md-6">
                        
                        <div class="chart-container bg-white mdl-shadow--8dp mb-4 radius-5 pb-4">
                            <p class="h1 text-uppercase letter-spacing-2 text-center py-3">top 10 best sellers</p>
                            <div id="bestSeller_chart" class="chart bestSeller_chart w-100"></div>
                        </div>

                    </div>
                    <!-- cashier performance -->
                    <div class="col-md-6">
                        
                        <div class="chart-container bg-white mdl-shadow--8dp mb-4 radius-5 pb-4">
                            <p class="h1 text-uppercase letter-spacing-2 text-center py-3">cashier sales</p>
                            <div id="cashierSales_chart" class="chart bestSeller_chart w-100"></div>
                        </div>

                    </div>

                </div>

            </div>
        </div>

    </div>


@endsection

@section('js')
    <script type="text/javascript" src="../assets/custom/js/admin.js"></script>
    <script type="text/javascript" src="{{asset('assets/custom/js/dashboard_chart.js')}}"></script>
    <script>
        $(".dashSNL").addClass("SNLactive")
        $(".dashSNL a").css("color","white")   
    </script>
@endsection