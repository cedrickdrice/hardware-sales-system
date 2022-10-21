@extends('back-end.includes.icp')

@section('title')
    Orders | SAM
@endsection

@section('content')


    <!-- *** UI MODAL *** -->

    <div class="ui modal" id="order_detail_modal">
        <div class="header d-flex justify-content-between">
            <div class="header_title">ORDER DETAIL</div>
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
                        <h4 class="mb-0" id="nameofcustomer"></h4>
                        <p id="date" class="text_grayish"><sup>SEPTEMBER 22, 2018</sup></p>
                    </div>
                    <div class="position-relative">
                        <button id="change_order_status" class="mdl-button mdl-js-button mdl-js-ripple-effect change_order_status position-relative">
                            <div class="d-flex align-items-center">
                                <span class="text_grayish mr-3">Status:</span><span class="status_text text-uppercase status" data-id="">PROCESSED</span>
                            </div>
                        </button>

                        <ul class="mdl-menu mdl-menu--bottom-right mdl-js-menu mdl-js-ripple-effect change_order_status_items" for="change_order_status">
                            <li class="mdl-menu__item" data-value="processed">PROCESSED</li>
                            <li class="mdl-menu__item" data-value="shipped">SHIPPED</li>
                            <li class="mdl-menu__item" data-value="delivered">DELIVERED</li>
                            <li class="mdl-menu__item" data-value="closed">CLOSED</li>
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

                <div id="content">
                    @include('back-end.orders.includes.index-inner')
                </div>
                
            </div>
        </div>

    </div>

@endsection

@section('js')
    <script type="text/javascript" src="{{asset('assets/jquery/aes.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/semantic/semantic.min.js')}}"></script>

    <script>
    $(".ordersSNL").addClass("SNLactive")
    $(".ordersSNL a").css("color","white")  

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
                url     : "{{url('/icp/orders/detail')}}/" + id ,
                type    : "get",
                success : function(data){
                    if (data.order.status == 0 ){
                        $('#change_order_status').prop('disabled', false)
                        $('.status').html('processed')
                    } else if (data.order.status == 1){
                        $('#change_order_status').prop('disabled', false)
                        $('.status').html('shipped')
                    } else if (data.order.status == 2 || data.order.status == 3) {
                        $('#change_order_status').prop('disabled', true)
                        if (data.order.status == 2 )
                            $('.status').html('delivered')
                        else 
                            $('.status').html('canceled')
                    }
                    $('.status').data('id', data.order.id)
                    $('#second-content').empty()
                    $('#second-content').append(data.content)
                    $('.ui.modal').modal("refresh")
                    $('#nameofcustomer').text(data.user.first_name + ' ' + data.user.last_name)
                    $('#totalAmount').html('TOTAL: ₱' + data.amount)
                    $('#date').html(data.date)



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
                url     : "{{url('/icp/orders/update')}}/" + id + "/" + status,
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
        $('#order_detail_modal').modal('attach events', '.order_number', 'show')
        $('#order_detail_modal').modal('attach events', '#hide_order_detail_modal', 'hide')
    }
        
    </script>
    
@endsection