@extends('back-end.includes.icp')

@section('title')
    Categories | SAM
@endsection

@section('content')

<div class="cust_snackbar snackBar-label p-3 mdl-shadow--4dp">
    <div class="text-white mb-3 label-text">

    </div>
</div>
     <!-- *** FAB *** -->

    <div class="fab_holder">
        <button class="mdl-button mdl-js-button mdl-js-ripple-effect mdl-button--fab mdl-button--raised mdl-button--colored add_item cust_gradient " id="openModal">
            <i class="material-icons">add</i>
        </button>
    </div>


    <!-- *** INITIAL MODAL *** -->

    <div class="ui first mini modal" id="add_modal">
        <div class="header d-flex justify-content-between">
            <div class="header_title">ADD PRODUCT</div>
            <div class="close_btn_wrapper d-flex align-item-center justify-content-center">
                <a href="#" class="close-button" id="hideModal_add">
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

                <ul class="row nav nav_account w-100 m-0">
                    <li class="nav-item w-50">
                        <a class="nav-link active text-uppercase mdl-js-button mdl-js-ripple-effect position-relative text-center" href="#accountDetails" data-toggle="tab"><b>Color</b><div class="nav_item_line visible"></div></a>
                    </li>
                    <li class="nav-item w-50">
                        <a class="nav-link text-uppercase mdl-js-button mdl-js-ripple-effect position-relative text-center" href="#addresses" data-toggle="tab"><b>Category</b><div class="nav_item_line"></div></a>
                    </li>
                </ul>

                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade pt-5 show active" id="accountDetails" role="tabpanel">
                        <div class="container">
                            
                            <form id="color_form">
                            {{csrf_field()}}
                                <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label w-100">
                                    <input type="hidden" name="label" value="color">
                                    <input class="mdl-textfield__input" type="text" id="name" name="name">
                                    <label class="mdl-textfield__label" for="name">Color Name</label>
                                </div>
                            </form>
                            <div class="text-center mt-5">
                                <button class="mdl-button mdl-js-button mdl-js-ripple-effect myButton1 text-white px-5 py-2" id="btnColor">SUBMIT</button>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade pt-5" id="addresses" role="tabpanel">
                       <div class="container">
                           
                            <form id="category_form">
                            {{csrf_field()}}
                                <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label w-100">
                                    <input type="hidden" name="label" value="category">
                                    <input class="mdl-textfield__input" type="text" id="name" name="name">
                                    <label class="mdl-textfield__label" for="name">Category Name</label>
                                </div>
                            </form>
                            <div class="text-center mt-5">
                                <button class="mdl-button mdl-js-button mdl-js-ripple-effect myButton1 text-white px-5 py-2" id="btnCategory">SUBMIT</button>
                            </div>
                       </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <div class="ui first mini modal" id="update_modal">
        <div class="header d-flex justify-content-between">
            <div class="header_title"></div>
            <div class="close_btn_wrapper d-flex align-item-center justify-content-center">
                <a href="#" class="close-button" id="hideModal_update">
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

                <form>
                    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label w-100">
                        <input class="mdl-textfield__input" type="text" id="name" name="name">
                        <label class="mdl-textfield__label updateModal_input_label" for="name"></label>
                    </div>
                    <div class="text-center mt-5">
                        <button class="mdl-button mdl-js-button mdl-js-ripple-effect myButton1 text-white px-5 py-2" id="btnSubmit">SUBMIT</button>
                    </div>
                </form>

            </div>
        </div>
    </div>

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
                    <div class="cust_selector1 w-50" id="cust_selector1"></div>
                    <a href="#" class="reportsTab_active mdl-js-button mdl-js-ripple-effect w-50 text-center position-relative py-3" id="iReport1">CATEGORIES</a>
                    <a href="#" class="mdl-js-button mdl-js-ripple-effect w-50 text-center position-relative py-3" id="sReport1">COLORS</a>
                </nav>                                  
                <div class="tab-content" id="myReportTab">
                    <div class="tab-pane fade h-100 py-5" id="iReport" role="tabpanel" aria-labelledby="iReport-tab">
                        
                        <div class="table-responsive">
                            <table class="table table-hover table-bordered bg-white mdl-shadow--4dp" id="iReportsTbl">
                                <thead>
                                    <tr>
                                        <th colspan="3">Category</th>
                                    </tr>
                                </thead>
                                <tbody id="content_category">
                                    @include('back-end.categories.includes.index-category')
                                </tbody>
                                
                                <tfoot>
                                    <tr>
                                        <th colspan="4">
                                            
                                        </th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                    <div class="tab-pane fade active py-5 show active" id="sReport" role="tabpanel" aria-labelledby="sReport-tab">
                        <div class="table-responsive">
                            <table class="table table-hover table-bordered bg-white mdl-shadow--4dp" id="iReportsTbl">
                                <thead>
                                    <tr>
                                        <th colspan="3">Color</th>
                                    </tr>
                                </thead>
                                <tbody id="content_color">
                                    @include('back-end.categories.includes.index-color')
                                </tbody>
                                
                                <tfoot>
                                    <tr>
                                        <th colspan="4">
                                            
                                        </th>
                                    </tr>
                                </tfoot>
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
    <!-- Semantic UI --><script type="text/javascript" src="{{asset('assets/semantic/semantic.min.js')}}"></script>
    <script>

        $(".categSNL").addClass("SNLactive")
        $(".categSNL a").css("color","white")  
        $('#add_modal').modal('attach events', '#openModal', 'show')
        $('#add_modal').modal('attach events', '#hideModal_add', 'hide')
        $('#updateModal_categ').on('click', function(){
            $('#update_modal').modal('show')
            $('#update_modal').find('.header_title').html("UPDATE CATEGORY")
            $('#update_modal').find('.updateModal_input_label').html("Category Name")
        })
        $('#updateModal_color').on('click', function(){
            $('#update_modal').modal('show')
            $('#update_modal').find('.header_title').html("UPDATE COLOR")
            $('#update_modal').find('.updateModal_input_label').html("Color Name")
        })
        $('#update_modal').modal('attach events', '#hideModal_update', 'hide')
        $('.nav_account .nav-item > a').on('click',function(){
            $('.nav_account .nav-item>a>.nav_item_line').removeClass('visible')
            $(this).find('.nav_item_line').addClass('visible')
        })
        $('#custBtn-search').on('click',function(){
            $('.search_input').toggleClass('expand')
            $('.search_input').focus()
        })
        $('.search_input').focusout(function(){
            $('.search_input').toggleClass('expand')
        })
        $('.page-item:first-child .page-link').empty()
        $('.page-item:first-child .page-link').append('<i class="material-icons">keyboard_arrow_left</>')
        $('.page-item:last-child .page-link').empty()
        $('.page-item:last-child .page-link').append('<i class="material-icons">keyboard_arrow_right</>')

        $(".cust_tabs1").on("click","a",function(){
            $('.cust_tabs1 a').removeClass("active")
            $(this).addClass('active')
            var activeWidth = $(this).innerWidth()
            var itemPos = $(this).position()
            $(".cust_selector1").css({
                "left":itemPos.left+"px", 
                "width":activeWidth+"px"
            })
        })
        $('#sReport1').click(function(){
            $('.nav-tabs > .active').next('li').find('a').trigger('click')
        })
        $('#iReport1').click(function(){
            $('.nav-tabs > .active > a').trigger('click')
        })
        $(document).ready(function(){
            $('#btnColor').on('click', function(){
                $('#color_form').submit()
            })
            $('#btnCategory').on('click', function(){
                $('#category_form').submit()
            })
            $('#iReport1').click()
        })
        $('#color_form').on('submit', function(e){
            e.preventDefault()
            var formData = new FormData($(this)[0])
            $.ajax({
                url     : "{{url('icp/categories/insert')}}",
                type    : 'post',
                data	: formData,
                success : function(data) {
                    if (data.text === 'success') {
                        $('#content_color').empty()
                        $('#content_color').append(data.content)
                    } 
                    $('#hideModal_add').trigger('click')
                    showSnackBar(data.label)
                    
                },
                error   : function(data) {
                    console.log(data)
                },
                contentType		: false,
                cache			: false,
                processData		: false
            })
        })
        $('#category_form').on('submit', function(e){
            e.preventDefault()
            var formData = new FormData($(this)[0])
            $.ajax({
                url     : "{{url('icp/categories/insert')}}",
                type    : 'post',
                data	: formData,
                success : function(data) {
                    if (data.text === 'success') {
                        $('#content_category').empty()
                        $('#content_category').append(data.content)
                    } 
                    $('#hideModal_add').trigger('click')
                    showSnackBar(data.label)
                    
                },
                error   : function(data) {
                    console.log(data)
                },
                contentType		: false,
                cache			: false,
                processData		: false
            })
        })
        
        function showSnackBar(word) {
            $('.label-text').html(word)
            $(".snackBar-label").show()
            $(".snackBar-label").animate({
                bottom  : 15,
                opacity : 1,
            })
            setTimeout(function(){
                $(".snackBar-label").animate({
                    bottom  : 0,
                    opacity : 0
                })
                setTimeout(function(){
                    $(".snackBar-label").hide()
                },2000)
            }, 2000)
        }
    </script>

@endsection