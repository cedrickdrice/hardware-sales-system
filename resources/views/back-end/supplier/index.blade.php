@extends('back-end.includes.manager')

@section('title')
    Supplier | {{ $configuration->name }}
@endsection
@section('content')

    <!-- *** FAB *** -->

    <div class="fab_holder d-none">
    <button class="mdl-button mdl-js-button mdl-js-ripple-effect mdl-button--fab mdl-button--raised mdl-button--colored add_item cust_gradient " id="openModal">
    <i class="material-icons">add</i>
    </button>
    </div>


    <!-- *** INITIAL MODAL *** -->

    <div class="ui first longer modal" id="cust_modal">
        <div class="header d-flex justify-content-between">
            <div class="header_title">ADD SUPPLIER</div>
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
                <form class="modal_form" id="addSupplier">
                {{csrf_field()}}
                   

                    {{-- <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label w-100">
                        <input class="mdl-textfield__input" type="text" id="name" name="name">
                        <label class="mdl-textfield__label" for="name">Name</label>
                    </div>
                    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label w-100">
                        <input class="mdl-textfield__input" type="email" id="email" name="email">
                        <label class="mdl-textfield__label" for="email">Email</label>
                    </div>
                    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label w-100">
                        <input class="mdl-textfield__input" type="text" id="phone" name="phone">
                        <label class="mdl-textfield__label" for="phone">Phone</label>
                    </div>
                    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label w-100">
                        <textarea class="mdl-textfield__input" type="text" id="address" name="address"></textarea> 
                        <label class="mdl-textfield__label" for="address">Address</label>
                    </div>
                    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label w-100">
                        <input class="mdl-textfield__input" type="text" id="Manager" name="Manager">
                        <label class="mdl-textfield__label" for="Manager">Manager</label>
                    </div> --}}

                </form>
            </div>
        </div>
        <div class="actions text-center border-0 bg-white p-3">
            <button class="mdl-button mdl-js-button mdl-js-ripple-effect myButton1 text-white px-5 py-2" id="">SUBMIT</button>
        </div>
    </div>
    <!-- *** UPDATE MODAL *** -->

    <div class="ui second longer modal" id="edit_modal">
        <div class="header d-flex justify-content-between">
            <div class="header_title">UPDATE SUPPLIER</div>
            <div class="close_btn_wrapper d-flex align-item-center justify-content-center">
                <a href="#" class="close-button" id="hideUpdateModal">
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
                <form class="modal_form" id="formEdit">
                {{csrf_field()}}
                   <input type="hidden" name="id" id="id">
                    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label w-100">
                        <input class="mdl-textfield__input" type="text" id="name" name="name">
                        <label class="mdl-textfield__label" for="name">Name</label>
                    </div>
                    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label w-100">
                        <input class="mdl-textfield__input" type="email" id="email" name="email">
                        <label class="mdl-textfield__label" for="email">Email</label>
                    </div>
                    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label w-100">
                        <input class="mdl-textfield__input" type="text" id="phone" name="phone_number">
                        <label class="mdl-textfield__label" for="phone">Phone</label>
                    </div>
                    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label w-100">
                        <textarea class="mdl-textfield__input" type="text" id="address" name="address"></textarea> 
                        <label class="mdl-textfield__label" for="address">Address</label>
                    </div>

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
                                    <th>Supplier Name</th>
                                    <th>Supplier Email</th>
                                    <th>Supplier Phone</th>
                                    <th>Supplier Address</th>
                                    <th class="text-center">Setting</th>
                                </tr>
                            </thead>
                            <tbody id="content">
                                @include('back-end.supplier.includes.index')
                            </tbody>
                            
                            <tfoot>
                                <tr>
                                    <th colspan="9">
                                    
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
        $(".supSNL").addClass("SNLactive")
        $(".supSNL a").css("color","white")  
    $(document).ready(function(){
        $('#btnSubmit').on('click', function(){
            $('#formEdit').submit() 
        });
        $('#formEdit').on('submit', function(e){
            e.preventDefault();
            var formData = new FormData($(this)[0]);
            $.ajax({
                url     : "{{url('/manager/supplier/update')}}",
                method  : 'post',
                data    : formData,
                success : function(data) {
                        $('#content').empty()
                        $('#content').append(data.content)
                        $('.close-button').trigger('click')
                },
                error   : function(data) {
                        console.log(data)
                },
                contentType		: false,
                cache			: false,
                processData		: false

            })
        })
        $('.edit').on('click', function() {
            let id = $(this).data('id')
            $.ajax({
                url     : "{{url('/manager/supplier/edit')}}/" + id,
                method  : 'get',
                success : function(data) {
                        $('#id').val(data.id)
                        $('#name').val(data.name)
                        $("#name").parent().addClass("is-dirty");
                        $('#email').val(data.email)
                        $("#email").parent().addClass("is-dirty");
                        $('#address').val(data.address)
                        $("#address").parent().addClass("is-dirty");
                        $('#phone').val(data.phone_number)
                        $("#phone").parent().addClass("is-dirty");
                },
                error   : function(data) {
                        console.log(data)
                },
            })
        })
        $('#cust_modal').modal('attach events', '#openModal', 'show')
        $('#cust_modal').modal('attach events', '#hideModal', 'hide')
        $('#edit_modal').modal('attach events', '.edit', 'show')
        $('#edit_modal').modal('attach events', '#hideUpdateModal', 'hide')
    });

    </script>
@endsection