@extends('back-end.includes.icp')

@section('title')
    Orders | {{ $configuration->name }}
@endsection

@section('content')


    <!-- *** UI MODAL *** -->

    <div class="ui modal" id="return_modal">
        <div class="header d-flex justify-content-between">
            <div class="header_title">Item Return</div>
            <div class="close_btn_wrapper d-flex align-item-center justify-content-center">
                <a href="#" class="close-button" id="hide_order_detail_modal">
                    <div class="in">
                        <div class="close-button-block"></div>
                        <div class="close-button-block"></div>
                    </div>
                    <div class="out">
                        <div class="close-button-block"></div>
                        <div class="close-button-block"></div>
                    </div>
                </a>
            </div>
        </div>
        <div class="content">
            <div class="container">

                <div class="row">
                    <div class="col-sm">
                        <h4 class="mb-0" id="nameofcustomer">123incognito</h4>
                        <p id="date" class="text_grayish"><sup>SEPTEMBER 22, 2018</sup></p>
                    </div>
                    <div class="position-relative">
                        <button id="change_order_status" class="mdl-button mdl-js-button mdl-js-ripple-effect change_order_status position-relative">
                            <div class="d-flex align-items-center">
                                <span class="text_grayish mr-3">Status:</span><span class="status_text text-uppercase status" data-id=""></span>
                            </div>
                        </button>

                        <ul class="mdl-menu mdl-menu--bottom-right mdl-js-menu mdl-js-ripple-effect change_order_status_items" for="change_order_status">
                            <li class="mdl-menu__item" data-value="accept">Accept</li>
                            <li class="mdl-menu__item" data-value="decline">Decline</li>
                        </ul>
                    </div>
                </div>

                <div id="second-content">

                </div>
                
                <!-- TOTAL: ₱ -->
                <h4 class="mb-0 px-3 text-right" id="totalAmount"> </h4>

            </div>
        </div>
        <div class="actions text-center border-0 bg-white p-3">
            <button class="mdl-button mdl-js-button mdl-js-ripple-effect myButton1 text-white px-5 py-2" id="btnSubmit">SUBMIT</button>
        </div>
    </div>

    <!-- *** MAIN CONTAINER *** -->

    <div class="main-container w-100 py-5">

        <!-- THIS AREA IS THE MAIN WRAPPER -->
        <div class="main-wrapper">
            <div class="container">

                <!-- FILTER/ACTION AREA -->

                <div class="filterArea mb-4 mt-3">
                    <div class="container">

                        <div class="container d-flex">

                            <div class="mdl-layout-spacer"></div>
                            <div class="search-wrap d-flex position-relative align-items-center">
                                <form class="w-100 d-flex justify-content-end search_form"><input type="text" class="search_input" id="search_word"></form>
                                <button id="custBtn-search" class="mdl-button mdl-js-button mdl-js-ripple-effect cust_gradient text-white">
                                    <i class="material-icons">search</i>
                                </button>
                            </div>

                        </div>

                    </div>
                </div><!-- END FILTER/ACTIONS AREA -->

                <div>
                <div class="table_container table-responsive mdl-shadow--8dp mb-0 mt-3">
                        <table class="table table-hover table-bordered">
                            <thead>
                                <tr>
                                    <th scope="col">ORDER NUMBER</th>
                                    <th scope="col">CUSTOMER</th>
                                    <th scope="col">PRODUCT</th>
                                    <th scope="col">DATE OF RETURN</th>
                                    <th scope="col">STATUS</th>
                                </tr>
                            </thead>
                            <tbody id="content">
                                @include('back-end.return.include.index-inner')
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td colspan="10">
                                        
                                    </td>
                                </tr>
                            </tfoot>
                        </table>
                        
                        <svg xmlns="http://www.w3.org/2000/svg" version="1.1" width="800" class="d-none">
                            <defs>
                                <filter id="goo">
                                    <feGaussianBlur in="SourceGraphic" stdDeviation="10" result="blur" />
                                    <feColorMatrix in="blur" mode="matrix" values="1 0 0 0 0  0 1 0 0 0  0 0 1 0 0  0 0 0 19 -9" result="goo" />
                                    <feComposite in="SourceGraphic" in2="goo" operator="atop"/>
                                </filter>
                            </defs>
                        </svg>
                    
                    </div>
                </div>
                
            </div>
        </div>

    </div>

@endsection

@section('js')
    <script type="text/javascript" src="{{asset('assets/jquery/aes.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/semantic/semantic.min.js')}}"></script>

    <script>
    $(".retSNL").addClass("SNLactive")
    $(".retSNL a").css("color","white")

    $(document).ready(function(){
        $('#custBtn-search').on('click',function(){
            $('.search_input').toggleClass('expand')
            $('.search_input').focus()
        })
        $('.search_input').focusout(function(){
            $('.search_input').toggleClass('expand')
        })
        $('.page-item:first-child .page-link').empty()
        $('.page-item:first-child .page-link').append('<i class="material-icons">keyboard_arrow_left</i>')
        $('.page-item:last-child .page-link').empty()
        $('.page-item:last-child .page-link').append('<i class="material-icons">keyboard_arrow_right</i>')
        $('.order_number').on('click', function(){
            var id = $(this).data('id')
            $.ajax({
                url     : "{{url('/icp/return/detail')}}/" + id ,
                type    : "get",
                success : function(data){
                    
                    if (data.detail.status == 1 ){
                        $('.status').html('processed')
                        $('#change_order_status').prop('disabled', false);
                    } else if (data.detail.status == 2){
                        $('#change_order_status').prop('disabled', true);
                        $('.status').html('returned')
                    } else {
                        $('#change_order_status').prop('disabled', true);
                        $('.status').html('canceled/declined')
                    }
                    
                    $('.status').data('id', data.detail.id)
                    $('#second-content').empty()
                    $('#second-content').append(data.content)
                    $('.ui.modal').modal("refresh")
                    $('#date').html('Ordered in ' + data.date)
                    console.log(data.detail.order)
                    $('#nameofcustomer').html(data.user.first_name + ' ' + data.user.last_name)


                    if ($('.status_text').html() == "processed") {
                        $('.change_order_status_items .mdl-menu__item').removeClass('active_status')
                        $('.change_order_status_items .mdl-menu__item:nth-child(1)').addClass('active_status')
                    } else if ($('.status_text').html() == "shipped") {
                        $('.change_order_status_items .mdl-menu__item').removeClass('active_status')
                        $('.change_order_status_items .mdl-menu__item:nth-child(2)').addClass('active_status')
                    } else if ($('.status_text').html() == "delivered") {
                        $('.change_order_status_items .mdl-menu__item').removeClass('active_status')
                        $('.change_order_status_items .mdl-menu__item:nth-child(3)').addClass('active_status')
                    } else if ($('.status_text').html() == "closed") {
                        $('.change_order_status_items .mdl-menu__item').removeClass('active_status')
                        $('.change_order_status_items .mdl-menu__item:nth-child(4)').addClass('active_status')
                    }
                },
                error   : function(data){
                    console.log(data)
                }
            })
        })
        $('.search_form').on('submit',function(e){
            e.preventDefault();
            var keyword = $('#search_word').val()
            $.ajax({
                type        : "get",
                url         : "{{ URL('icp/orders/search')}}/" + keyword,
                success     : function(data) {
                            $('#content').empty();
                            $('#content').append(data.content);
                            modals()
                },
                error       : function(data) {
                            console.log(data)
                },
            });
        });
        $('#btnSubmit').on('click', function(){
            var status = $('.status').html()
            var id = $('.status').data('id')
            $.ajax({
                url     : "{{url('/icp/return/update')}}/" + id + "/" + status,
                type    : "get",
                success : function(data) {
                        $('#content').empty()
                        $('#content').append(data.content)
                        $('#hide_order_detail_modal').trigger('click')
                        modals()
                },
                error   : function(data) {
                    console.log(data)
                }
            })
        })
        modals()
    });
    function modals(){
        $('#return_modal').modal('attach events', '.order_number', 'show')
        $('#return_modal').modal('attach events', '#hide_order_detail_modal', 'hide')
    }
        
    </script>
    
@endsection