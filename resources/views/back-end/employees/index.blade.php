@extends('back-end.includes.manager')

@section('title')
    Employees | SAM
@endsection
@section('content')

    <!-- *** FAB *** -->

    <div class="fab_holder">
    <button class="mdl-button mdl-js-button mdl-js-ripple-effect mdl-button--fab mdl-button--raised mdl-button--colored add_item cust_gradient " id="openModal">
    <i class="material-icons">add</i>
    </button>
    </div>


    <!-- *** INITIAL MODAL *** -->

    <div class="ui first longer modal" id="cust_modal">
        <div class="header d-flex justify-content-between">
            <div class="header_title">ADD EMPLOYEE</div>
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
                <form class="modal_form" id="addEmployee">
                {{csrf_field()}}
                   
                    <div class="row">
                     <!-- EMPLOYEE F NAME -->
                        <div class="col-sm-4">
                            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label w-100">
                                <input class="mdl-textfield__input" type="text" id="fname" name="first_name">
                                <label class="mdl-textfield__label" for="fname">First Name</label>
                            </div>
                        </div>
                        
                    <label for="" style="color:red;" class="d-none" id="first_name_error">{{$errors->has('first_name') ? $errors->first('first_name') : '' }}</label>
                         <!-- EMPLOYEE M NAME -->
                         <div class="col-sm-4">
                            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label w-100">
                                <input class="mdl-textfield__input" type="text" id="mname" name="middle_name">
                                <label class="mdl-textfield__label" for="mname">Middle Name</label>
                            </div>
                        </div>
                        <label for="" style="color:red;" class="d-none" id="middle_name_error">{{$errors->has('middle_name') ? $errors->first('middle_name') : '' }}</label>
                    <!-- EMPLOYEE L NAME -->
                        <div class="col-sm-4">
                            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label w-100">
                                <input class="mdl-textfield__input" type="text" id="lname" name="last_name">
                                <label class="mdl-textfield__label" for="lname">Last Name</label>
                            </div>
                        </div>
                        <label for="" style="color:red;" class="d-none" id="last_name_error">{{$errors->has('last_name') ? $errors->first('last_name') : '' }}</label>
                       
                    </div>

                    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label w-100">
                        <input class="mdl-textfield__input" type="text" id="username" name="username">
                        <label class="mdl-textfield__label" for="username">Username</label>
                    </div>
                    <label for="" style="color:red;" class="d-none" id="username_error">{{$errors->has('username') ? $errors->first('username') : '' }}</label>
                    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label w-100">
                        <input class="mdl-textfield__input" type="email" id="email" name="email">
                        <label class="mdl-textfield__label" for="email">Email</label>
                    </div>
                    <label for="" style="color:red;" class="d-none" id="email_error">{{$errors->has('email') ? $errors->first('email') : '' }}</label>
                    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label w-100">
                        <input class="mdl-textfield__input" type="password" id="password" name="password">
                        <label class="mdl-textfield__label" for="password">Password</label>
                    </div>
                    <label for="" style="color:red;" class="d-none" id="password_error">{{$errors->has('password') ? $errors->first('password') : '' }}</label>
                    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label w-100">
                        <input class="mdl-textfield__input" type="password" id="confirm_password" name="confirm_password">
                        <label class="mdl-textfield__label" for="password">Confirm Password</label>
                    </div>
                    <label for="" style="color:red;" class="d-none" id="confirm_password_error">{{$errors->has('confirm_password') ? $errors->first('confirm_password') : '' }}</label>
                </form>
            </div>
        </div>
        <div class="actions text-center border-0 bg-white p-3">
            <button class="mdl-button mdl-js-button mdl-js-ripple-effect myButton1 text-white px-5 py-2" id="btnSubmit">SUBMIT</button>
        </div>
    </div>

    <div class="main-container w-100">

        <div class="main-wrapper">
            <div class="container">
                             
                <div class="py-5">
                    <div class="table-responsive">
                        <table class="table table-hover table-bordered bg-white mdl-shadow--4dp" id="iReportsTbl">
                            <thead>
                                <tr>
                                    <th>Employee Name</th>
                                    <th>Email</th>
                                    <th>Username</th>
                                    <th>Role</th>
                                    <th class="text-center">Setting</th>
                                </tr>
                            </thead>
                            <tbody id="content">
                                @include('back-end.employees.includes.index-inner')
                            </tbody>
                            
                            <tfoot>
                                <tr>
                                    <th colspan="9">
                                    {{$employees->links("pagination::bootstrap-4")}}
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
        $(".empSNL").addClass("SNLactive")
        $(".empSNL a").css("color","white")  
    $(document).ready(function(){
        $('#btnSubmit').on('click', function(){
            $('#addEmployee').submit() 
        });
        $('#addEmployee').on('submit', function(e){
            e.preventDefault();
            var formData = new FormData($(this)[0]);
            $.ajax({
                url     : "{{url('/manager/employees/insert')}}",
                method  : 'post',
                data    : formData,
                success : function(data) {
                        $('#content').empty()
                        $('#content').append(data.content)
                        $('.close-button').trigger('click')
                },
                error   : function(data) {
                        if( data.status === 422 ) {
                            var errors = $.parseJSON(data.responseText);
                            $.each(errors.errors, function (key, val) {
                                $("#" + key + "_error").text(val[0])
                                $("#" + key + "_error").removeClass('d-none')
                            });
                        }
                },
                contentType		: false,
                cache			: false,
                processData		: false

            })
        })
        $()
        $('#cust_modal').modal('attach events', '#openModal', 'show')
        $('#cust_modal').modal('attach events', '.close-button', 'hide')
    });

    </script>
@endsection