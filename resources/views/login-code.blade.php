<!DOCTYPE html>
<html class="no-js" lang="en">
<head>

    <title>Update Account | {{ $configuration->name }}</title>
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
    

<!-- main container -->
<div class="main-container">
    <div class="modalContainer row" id="modalContainer">
        <div class="modalBGblue col-5"></div>
        <a href="{{url('/logout')}}" class="link-top-home">
            <i class="material-icons-new icon-white outline-exit_to_app"></i>
        </a>
        <div class="container modal-wrapper d-flex p-0 radius5">
            <div class="container modal-area row m-0 p-0 radius5 overflow-hidden">

                <div class="col-md-6 py-5 rightSide">
                    <div class="container logoArea mt-4 mb-5 text-center text-white">
                        <div class="align-self-center"><img src="{{asset('assets/images/logo.png')}}" class="img-fluid w-75"></div>
                        <p class="mb-5 mt-2 text-center text-uppercase Lspacing2 lead">shopping assistant mirror</h2>
                        <p class="text-center lead mb-0 mt-5">Whoevery said that money can't buy happiness,</p>
                        <p class="text-center lead mb-5">simply didn't know where to go shopping.</p>
                        <!-- <button class="mdl-button mdl-js-button mdl-js-ripple-effect mdl-button--raised mdl-button--colored myButton1 px-5 py-2 mt-5">read more</button> -->
                    </div>
                </div>

                <div class="col-md-6 leftSide py-5">
                    <div class="loginArea h-100 w-100">
                        
                        <form method="post" action="{{URL('/updateAccountByCode')}}" class="w-100 align-self-center">
                                {{csrf_field()}}
                                    <h1 class="text-center mycolor">Sign Up</h1>
                                    <div class="mx-4 inputs">
                                        <center>
                                            <input type="text" name="first_name" class="radius5 py-3 px-4 w-75 login_field mb-3" autocomplete="off" placeholder="First name" required>
                                            <input type="text" name="last_name" class="radius5 py-3 px-4 w-75 login_field mb-3" autocomplete="off" placeholder="Last name" required>
                                            <input type="text" name="username" class="radius5 py-3 px-4 w-75 login_field mb-3" autocomplete="off" placeholder="Username" required>
                                            <label for="" style="color:red;">{{$errors->has('username') ? $errors->first('username') : '' }}</label>
                                            <input type="email" name="email" class="radius5 py-3 px-4 w-75 login_field mb-3" autocomplete="off" placeholder="Email" required>
                                            <label for="" style="color:red;">{{$errors->has('email') ? $errors->first('email') : '' }}</label>
                                            <input type="password" name="password" class="radius5 py-3 px-4 w-75 login_field mb-3" autocomplete="off" placeholder="Password" required>
                                            <label for="" style="color:red;">{{$errors->has('password') ? $errors->first('password') : '' }}</label>
                                            <input type="password" name="confirm_password" class="radius5 py-3 px-4 w-75 login_field mb-3" autocomplete="off" placeholder="Confirm Password" required>
                                            <label for="" style="color:red;">{{$errors->has('confirm_password') ? $errors->first('confirm_password') : '' }}</label>
                                        </center>
                                    </div>
                                    <center><div class="container signin mt-5">
                                        <button type="submit" class="mdl-button mdl-js-button mdl-js-ripple-effect mdl-button--raised mdl-button--colored button myButton1 px-5 py-2 mb-4" name="signin">sign up</button>
                                    </div></center>
                                </form>

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

    $('.close-button').on('click', function(){
        $('#forgotPassword_modal').modal('hide')
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
</html>
