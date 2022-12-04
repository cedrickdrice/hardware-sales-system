<!DOCTYPE html>
<html class="no-js" lang="en">
<head>

    <title>Login | {{ $configuration->name }}</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="icon" type="img/icon" href="{{asset('assets/images/logo.png')}}">

    <!-- *** JQUERY *** -->

    <!-- Bootstrap jquery --><script type="text/javascript" src="{{asset('assets/jquery/code-jquery-3.2.1.slim.min.js')}}"></script>
    <!-- jquery --><script type="text/javascript" src="{{asset('assets/jquery/jquery-3.3.1.min.js')}}"></script>
    <!-- dragabilly --><!-- <script type="text/javascript" src="{{asset('assets/jquery/dragabilly.pkgd.js')}}"></script> -->
    
    <!-- custom css --><link rel="stylesheet" type="text/css" href="{{asset('assets/custom/css/productPage.css')}}">
    @include('includes/links-styles')
    
    <script>document.documentElement.className = 'js';</script>

</head>
<body class="loading render">
     <!-- CUSTOM SNACKBAR -->

     <div class="cust_snackbar snackBar-label p-3 mdl-shadow--4dp">
            <div class="text-white mb-3 label-text">
                
            </div>
        </div>
    
<!-- VERIFICATION MODAL -->

<div class="ui mini modal" id="cust_modal">
    <div class="header d-flex justify-content-between">
        <div class="header_title">VERIFICATION</div>
        <div class="close_btn_wrapper d-flex align-item-center justify-content-center">
            <a href="#" class="close-button" id="hideModal">
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
            <form class="modal_form" method="post" action="{{url('verify')}}">
            {{csrf_field()}}
                <!-- PRODUCT SKU -->
                <input type="text" name="code" class="radius5 py-3 px-4 w-100 login_field mb-4" autocomplete="off" placeholder="Verification Code">

                <div class="actions text-center border-0 bg-white p-3">
                    <button type="submit" class="mdl-button mdl-js-button mdl-js-ripple-effect mdl-button--raised mdl-button--colored button myButton1 px-5 py-2 mb-4" name="signin">submit</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- FORGOT VERIFICATION MODAL -->
<div class="ui mini modal" id="verify_modal">
    <div class="header d-flex justify-content-between">
        <div class="header_title">VERIFICATION</div>
        <div class="close_btn_wrapper d-flex align-item-center justify-content-center">
            <a href="#" class="close-button" id="hideModal">
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
            <form class="modal_form" method="post" action="{{url('verify_forgot')}}">
            {{csrf_field()}}
                <!-- PRODUCT SKU -->
                <input type="text" name="code" class="radius5 py-3 px-4 w-100 login_field mb-4" autocomplete="off" placeholder="Verification Code">
                <input type="hidden" name="email" id="emailVerify">
                <div class="actions text-center border-0 bg-white p-3">
                    <button type="submit" class="mdl-button mdl-js-button mdl-js-ripple-effect mdl-button--raised mdl-button--colored button myButton1 px-5 py-2 mb-4" name="signin">submit</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- FORGOT PASSWORD MODAL -->
<div class="ui mini modal" id="forgotPassword_modal">
    <div class="header d-flex justify-content-between">
        <div class="header_title">FORGOT PASSWORD</div>
        <div class="close_btn_wrapper d-flex align-item-center justify-content-center">
            <a href="#" class="close-button" id="hideModal">
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
            <form class="modal_form" id="forgotPassword">
            {{csrf_field()}}
                <!-- PRODUCT SKU -->
                <input type="text" name="email" class="radius5 py-3 px-4 w-100 login_field" placeholder="Your Email Address..." required>
                {{-- <div class="d-flex w-100 align-items-center">
                    <hr class="w-50"><span class="mx-3 text_grayish">Or</span><hr class="w-50">
                </div>
                <input type="number" name="number" class="radius5 py-3 px-4 w-100 login_field" autocomplete="off" placeholder="Use Phone Number..."> --}}
            </form>
        </div>
    </div>
    <div class="actions text-center border-0 bg-white p-3">
        <button type="button" class="mdl-button mdl-js-button mdl-js-ripple-effect mdl-button--raised mdl-button--colored button myButton1 px-5 py-2 mb-4" name="signin" id="btnForgotPassword">submit</button>
    </div>
</div>

<!-- VERIFY MODAL -->
<div class="ui mini modal" id="forgotVerify_modal">
    <div class="header d-flex justify-content-between">
        <div class="header_title">VERIFY YOUR ACCOUNT</div>
        <div class="close_btn_wrapper d-flex align-item-center justify-content-center">
            <a href="#" class="close-button" id="hideModal">
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
            <form class="modal_form">
            {{csrf_field()}}
                <!-- PRODUCT SKU -->
                <input type="text" name="code" id="emailAddress" class="radius5 py-3 px-4 w-100 login_field mb-4" autocomplete="off" placeholder="Your Email Address">

                <div class="actions text-center border-0 bg-white p-3">
                    <button class="mdl-button mdl-js-button mdl-js-ripple-effect mdl-button--raised mdl-button--colored button myButton1 px-5 py-2 mb-4" name="signin" id="resendEmail">submit</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- main container -->
<div class="main-container">
    <div class="modalContainer row" id="modalContainer">
        <div class="modalBGblue col-5"></div>
        <a href="{{url('/')}}" class="link-top-home">
            <i class="material-icons-new icon-white outline-home"></i>
        </a>
        <div class="container modal-wrapper d-flex p-0 radius5">
            <div class="container modal-area row m-0 p-0 radius5 overflow-hidden">

                <div class="col-md-6 py-5 rightSide">
                    <div class="container logoArea mt-4 mb-5 text-center text-white">
                        <div class="align-self-center"><img src="{{asset('assets/images/logo.png')}}" class="img-fluid w-75"></div>
                        <!-- <button class="mdl-button mdl-js-button mdl-js-ripple-effect mdl-button--raised mdl-button--colored myButton1 px-5 py-2 mt-5">read more</button> -->
                    </div>
                </div>

                <div class="col-md-6 leftSide py-5">
                    <div class="loginArea h-100 w-100">
                        <center>
                            <nav class="cust_tabs mt-4 p-0">
                                <div class="cust_selector" id="cust_selector"></div>
                                <a href="#" class="active" id="mediaLibrary">SIGN IN</a>
                                <a href="#" class="" id="uploadFiles">SIGN UP</a>
                            </nav>
                        </center>
                        <ul class="nav nav-tabs d-none">
                            <li class="active"><a href="#tab1" data-toggle="tab">SIGN IN</a></li>
                            <li><a href="#tab2" data-toggle="tab">SIGN UP</a></li>
                        </ul>
                        <div class="tab-content mt-4">
                            <div class="tab-pane active" id="tab1">

                                <form method="post" action="{{URL('/signin')}}" class="w-100 align-self-center">
                                {{csrf_field()}}
                                    <h1 class="text-center mycolor">Sign In</h1>
                                    <center><label for="" style="color:red;">{{session('errors') ? session('errors')->first('error') : '' }}</label></center>
                                    <div class="mx-4 inputs">
                                        <center>
                                            <div class="d_mat_input d_mat_input1 w-75">
                                                <label for="username">Email / Username</label>
                                                <input type="text" name="email" class="mb-4 w-100" autocomplete="off" id="username">
                                            </div>
                                            <div class="d_mat_input d_mat_input1 w-75">
                                                <label for="password">Password</label>
                                                <input type="password" name="password" class="mb-3 w-100" autocomplete="off" id="password">
                                            </div>
                                        </center>
                                    </div>
                                    <center><div class="container signin mt-5">
                                        <button type="submit" class="mdl-button mdl-js-button mdl-js-ripple-effect mdl-button--raised mdl-button--colored button myButton1 px-5 py-2" name="signin">sign in</button>
                                    </div></center>
                                    <div class="d-flex flex-column">
                                        <a href="#" id="open_forgotPassword_modal" class="text-center">Forgot Password?</a>
                                        <a href="#" id="resendcode" class="text-center">Forgot to verify account?</a>
                                    </div>
                                </form>

                            </div>
                            <div class="tab-pane" id="tab2">
                                
                                <form method="post" action="{{URL('/register')}}" class="w-100 align-self-center">
                                {{csrf_field()}}
                                    <h1 class="text-center mycolor">Sign Up</h1>
                                    <div class="mx-4 inputs">
                                        <center>
                                            <div class="d_mat_input d_mat_input1 w-75 d-inline-block my-2">
                                                <label for="f_name">First name</label>
                                                <input type="text" name="first_name" class="w-100" autocomplete="off" id="f_name" value="{{ old('first_name') }}">
                                            </div>
                                            <label for="" style="color:red;">{{$errors->has('first_name') ? $errors->first('first_name') : '' }}</label>

                                            <div class="d_mat_input d_mat_input1 w-75 d-inline-block my-2">
                                                <label for="l_name">Last name</label>
                                                <input type="text" name="last_name" class="w-100 mb-1" autocomplete="off" placeholder="" value="{{ old('last_name') }}" id="l_name">
                                            </div>
                                            <label for="" style="color:red;">{{$errors->has('last_name') ? $errors->first('last_name') : '' }}</label>
                                            
                                            <div class="d_mat_input d_mat_input1 w-75 d-inline-block my-2">
                                                <label for="username_1">Userame</label>
                                                <input type="text" name="username" class="w-100 mb-1" autocomplete="off" placeholder="" value="{{ old('username') }}" id="username_1">
                                            </div>
                                            <label for="" style="color:red;">{{$errors->has('username') ? $errors->first('username') : '' }}</label>

                                            <div class="d_mat_input d_mat_input1 w-75 d-inline-block my-2">
                                                <label for="email">Email</label>
                                                <input type="email" name="email" class="w-100 mb-1" autocomplete="off" placeholder="" value="{{ old('email') }}" id="email">
                                            </div>
                                            <label for="" style="color:red;">{{$errors->has('email') ? $errors->first('email') : '' }}</label>

                                            <div class="d_mat_input d_mat_input1 w-75 d-inline-block my-2">
                                                <label for="number">Phone Number</label>
                                                <input type="number" name="phone_number" class="w-100 mb-1" autocomplete="off" placeholder="" value="{{ old('phone_number') }}" id="number">
                                            </div>
                                            <label for="" style="color:red;">{{$errors->has('phone_number') ? $errors->first('phone_number') : '' }}</label>

                                            <div class="d_mat_input d_mat_input1 w-75 d-inline-block my-2">
                                                <label for="password">Password</label>
                                                <input type="password" name="password" class="sign-up-password w-100 mb-1" autocomplete="off" placeholder="" value="" id="password">
                                            </div>
                                            <label for="" style="color:red;">{{$errors->has('password') ? $errors->first('password') : '' }}</label>

                                            <div class="d_mat_input d_mat_input1 w-75 d-inline-block my-2">
                                                <label for="c_password">Confirm Password</label>
                                                <input type="password" name="retype_password" class="w-100 mb-1" autocomplete="off" placeholder="" value="" id="c_password">
                                            </div>
                                            <label for="" style="color:red;">{{$errors->has('retype_password') ? $errors->first('retype_password') : '' }}</label>
                                        </center>
                                    </div>
                                    <center>
                                        <div class="container signin mt-5">
                                            <button type="submit" class="mdl-button mdl-js-button mdl-js-ripple-effect mdl-button--raised mdl-button--colored button myButton1 px-5 py-2 mb-4" name="signin">sign up</button>
                                        </div>
                                    </center>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>




</body>

<!-- *** SCRIPTS *** -->

    <!-- Bootstrap popper --><script type="text/javascript" src="{{asset('assets/bootstrap/popper.min.js')}}"></script>
    <!-- Bootstrap --><script type="text/javascript" src="{{asset('assets/bootstrap/js/bootstrap.min.js')}}"></script>
    <!-- Material Design Lite --><script type="text/javascript" src="{{asset('assets/MDL/material.min.js')}}"></script>
    <!-- Semantic UI --><script type="text/javascript" src="{{asset('assets/semantic/semantic.min.js')}}"></script>
    <!-- custom js --><!-- <script type="text/javascript" src="{{asset('assets/custom/js/script.js')}}"></script> -->

<script>
    // $('#cust_modal').modal('attach events', '#openModal', 'show')
    // $('#cust_modal').modal('attach events', '.close-button', 'hide')
    $("#forgotPassword_modal").modal('attach events', '#open_forgotPassword_modal', 'show')
    $("#forgotPassword_modal").modal('attach events', '.close-button', 'hide')
    $("#forgotVerify_modal").modal('attach events', '#resendcode', 'show')
    $("#forgotVerify_modal").modal('attach events', '.close-button', 'hide')
    $("#loginCode_modal").modal('attach events', '#openLoginCodeModal', 'show')
    $("#loginCode_modal").modal('attach events', '.close-button', 'hide')

    $('.close-button').on('click', function(){
        $('#forgotPassword_modal').modal('hide')
    })
    // $('.ui.modal').modal('attach events', '.close-button', 'hide')
    $(document).ready(function(){

        if ( '{{$label }}' == "yes") {
            $('#cust_modal').modal('show')
        } else if ( '{{$label}}' == "status") {
            showSnackBar('Please verify your account.')
        }

        if ( '{{$status}}' != 'no') {
            showSnackBar('{{$status}}')
        }

        $('#btnForgotPassword').on('click', function(){
            $('#forgotPassword').submit()
        })
        $('#forgotPassword').on('submit', function(e){
            e.preventDefault()
            let formData = new FormData($(this)[0]);
            $.ajax({
                'url'			: "{!! URL('forgot-password') !!}",
                'method'		: 'post',
                'data'			: formData,
                success 		: function(data){
                                $('.close-button').trigger('click')
                                
                                if (data == 'error') 
                                    showSnackBar('account not found')
                                else 
                                    showSnackBar('mail has been sent')
                },
                error           : function(data){
                                console.log(data)
                },
                contentType		: false,
                cache			: false,
                processData		: false
            })
        })
        $('#resendEmail').on('click',function(e) {
            e.preventDefault()
            var email = $('#emailAddress').val()
            $.ajax({
                url     : "{{url('/resend')}}/" + email,
                type    : "get",
                success : function(data) {
                    
                    if (data.error) {
                        showSnackBar(data.error)
                        $("#forgotVerify_modal").modal('hide')
                    } else {
                        $('#verify_modal').modal('show')
                        $('#emailVerify').val(email)
                    }
                },
                error   : function(data) {
                    console.log(data)
                }
            })
        })



        $('#uploadFiles').click(function(){
            $('.nav-tabs > .active').next('li').find('a').trigger('click')
        })
        $('#mediaLibrary').click(function(){
            $('.nav-tabs > .active > a').trigger('click')
        })
        $("#cust_selector").width(93)
        $(".cust_tabs").on("click","a",function(){
            $('.cust_tabs a').removeClass("active")
            $(this).addClass('active')
            var activeWidth = $(this).innerWidth()
            var itemPos = $(this).position()
            $(".cust_selector").css({
                "left":itemPos.left+"px", 
                "width":activeWidth+"px"
            })
        })
        $("#cust_selector1").css("width","50%")
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

        var hash = window.location.hash.substr(1);
        if (hash.length > 0 && hash === 'register') {
            $('[id="uploadFiles"]').click();
            $('#f_name').siblings('label').addClass('active');
            $('#l_name').siblings('label').addClass('active');
            $('#username_1').siblings('label').addClass('active');
            $('#email').siblings('label').addClass('active');
            $('#number').siblings('label').addClass('active');
        }
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
    // for material input 1
    $('.d_mat_input1 input').focus(function(){
        let holder  = $(this).closest('.d_mat_input1'),
            label   = holder.find('label')

        label.addClass('active')
    })

    $('.d_mat_input1 input').blur(function(){
        let holder    = $(this).closest('.d_mat_input1'),
            label     = holder.find('label'),
            input     = holder.find('input')
            input_val = input.val()

        if(input_val == ''){
            label.removeClass('active')
        }
    })
</script>
</html>
