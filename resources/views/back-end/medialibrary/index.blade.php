@extends('back-end.includes.manager')

@section('title')
    Media Library | {{ $configuration->name }}
@endsection
@section('content')
    <div class="fab_holder">
        <button class="mdl-button mdl-js-button mdl-js-ripple-effect mdl-button--fab mdl-button--raised mdl-button--colored add_item cust_gradient " id="openModal">
            <i class="material-icons">add</i>
        </button>
    </div>


            <!-- *** INITIAL MODAL *** -->

    <div class="ui first longer modal" id="cust_modal">
        <div class="header d-flex justify-content-between">
            <div class="header_title">ADD AN IMAGE</div>
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
            <form class="modal_form--mediaLib border" id="form-upload" enctype="multipart/form-data">

                <div class="h-100">

                    <div class="d-flex justify-content-center meidaLib_uploadWrapper" id="upload-wrapper">
                        <label class="mb-0 align-self-center" for="images" >
                            <span class="mdl-button mdl-js-button mdl-js-ripple-effect mdl-button--raised mdl-button--colored cust_gradient align-self-center">upload image</span>
                        </label>
                            {{ csrf_field() }}
                            <input type="file" name="images[]" multiple id="images" class="d-none">

                    </div>

                    <div class="h-100 w-100">

                        <div class="mediaLib_imagesContainer position-relative">

                            <div class="p-3">
                                <div class="row" id="images_tobeupload">

                                    <!-- <div class="col-sm-3 col-lg-2 mb-3" id="mediaLib_wrapper">
                                        <div class="d-flex justify-content-center h-100 mediaLib_inner">
                                            <div class="mediaLib_imgHolder d-flex justify-content-center position-relative align-self-center w-100">
                                                <i class="material-icons removeAddedImage">close</i>
                                                <div class="align-self-center">
                                                    <img src="../assets/images/logo.png" class="img-fluid">
                                                </div>
                                            </div>
                                        </div>
                                    </div> -->

                                </div>
                            </div>

                        </div>
                        
                    </div>

                    
                            
                </div>

            </form>

            <!-- <form action="/file-upload" class="dropzone" id="my-awesome-dropzone"></form> -->

        </div>
        <div class="actions text-center border-0 bg-white p-3">
            <button class="btnSubmit" id="submit-upload">SUBMIT</button>
        </div>
    </div>



            <!-- *** MAIN CONTAINER *** -->

    <div class="main-container w-100 py-5">

        <!-- THIS AREA IS THE MAIN WRAPPER -->
        <div class="main-wrapper">
            <div class="container">

                <!-- FILTER/ACTION AREA -->

                <div class="filterArea container">
                    <div class="container">

                        <div class="row">
                            <!-- FILTER BY CATEGORY -->
                            <div class="col-sm-6 col-md-6 col-lg-3">
                                <div class="filterByCateg mdl_select">
                                    <div class="d-inline">
                                        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label getmdl-select getmdl-select__fix-height w-100">
                                            <input type="text" class="mdl-textfield__input" id="filterByCateg" name="filterByCateg" readonly>
                                            <input type="hidden" value="prodSize" name="" id="filterByCateg">
                                            <i class="drpdwn-icon material-icons mdl-icon-toggle__label">keyboard_arrow_down</i>
                                            <label for="filterByCateg" class="mdl-textfield__label">Filter By Date</label>
                                            <ul class="mdl-menu mdl-menu--bottom-left mdl-js-menu mb-0" for="filterByCateg">
                                                <li class="mdl-menu__item" data-val="CL" id="CL">Small</li>
                                                <li class="mdl-menu__item" data-val="SH" id="SH">Medium</li>
                                                <li class="mdl-menu__item" data-val="AC" id="AC">Large</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div><!-- END FILTER BY CATEGORY -->

                            <!-- FILTER/ACTION -->
                            <div class="col-md-12 col-sm-12 col-lg-9">

                                <div class="d-flex justify-content-between h-100">
                                    <div class="filterAction h-100">
                                        <div class="d-flex align-content-center h-100">
                                            <div class="align-self-center">
                                                <button class="mdl-button mdl-js-button mdl-js-ripple-effect mdl-button--raised mdl-button--colored cust_gradient">Trash</button>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="mdl-layout-spacer"></div>
                                    <div class="search-wrap d-flex position-relative align-items-center">
                                        <form class="w-100 d-flex justify-content-end"><input type="" name="" class="search_input"></form>
                                        <button id="custBtn-search" class="mdl-button mdl-js-button mdl-js-ripple-effect cust_gradient text-white">
                                            <i class="material-icons">search</i>
                                        </button>
                                    </div>
                                    
                                </div>

                            </div><!-- END FILTER/ACTION -->

                        </div><!-- END ROW FILTER/ACTIONS -->

                    </div>
                </div><!-- END FILTER/ACTIONS AREA -->


                <!-- MAIN AREA -->

                <div class="container bg-white mdl-shadow--8dp mt-4 py-4">
                    <div class="media_images_container">

                        <svg xmlns="http://www.w3.org/2000/svg" version="1.1" width="800" class="d-none">
                            <defs>
                                <filter id="goo1">
                                    <feGaussianBlur in="SourceGraphic" stdDeviation="9" result="blur" />
                                    <feColorMatrix in="blur" mode="matrix" values="1 0 0 0 0  0 1 0 0 0  0 0 1 0 0  0 0 0 20 -6" result="goo" />
                                    <feComposite in="SourceGraphic" in2="goo" operator="atop" result="goo"/>
                                </filter>
                            </defs>
                        </svg>

                        <div class="select-container position-relative" id="images-container">
                            @include('back-end.medialibrary.includes.index-inner')
                        </div>

                    </div>
                    <svg xmlns="http://www.w3.org/2000/svg" version="1.1" width="800" class="d-none">
                        <defs>
                            <filter id="goo">
                                <feGaussianBlur in="SourceGraphic" stdDeviation="10" result="blur" />
                                <feColorMatrix in="blur" mode="matrix" values="1 0 0 0 0  0 1 0 0 0  0 0 1 0 0  0 0 0 19 -9" result="goo" />
                                <feComposite in="SourceGraphic" in2="goo" operator="atop"/>
                            </filter>
                        </defs>
                    </svg>
                    <div class="pagination-navigation1">
                        <div class="pagination-current"></div>
                        <div class="pagination-dots">
                            <button class="pagination-dot paginate_active">
                                <span class="pagination-number">1</span>
                            </button>
                            <button class="pagination-dot">
                                <span class="pagination-number">2</span>
                            </button>
                            <button class="pagination-dot">
                                <span class="pagination-number">3</span>
                            </button>
                            <button class="pagination-dot">
                                <span class="pagination-number">4</span>
                            </button>
                            <button class="pagination-dot">
                                <span class="pagination-number">5</span>
                            </button>
                        </div>
                    </div>
                </div><!-- MAIN AREA -->

            </div>
        </div>

    </div>
@endsection

@section('js')
    <!-- SearchUIEffects --><script type="text/javascript" src="../assets/SearchUIEffects/js/demo5.js"></script>
    <script type="text/javascript" src="{{asset('assets/custom/js/admin.js')}}"></script>
    <script type="text/javascript" src="../assets/custom/js/admin.js"></script>
    
    <script>
        $(".libSNL").addClass("SNLactive")
        $(".libSNL a").css("color","white")
    </script>

    <!-- dropzone js --><script type="text/javascript" src="../dropzone.js"></script>

    <!-- custom js -->
    <script>

        $(document).on('click', function(){
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
        })

        // -- on upload, hide "upload-wrapper" -- //
        $('#images').change(function(){
            $('#upload-wrapper').removeClass('d-flex')
            $('#upload-wrapper').addClass('d-none')
        })
        
        // -- submit form -- //
        $('#submit-upload').on('click', function(){
            $('#form-upload').submit()
        })
        $('#form-upload').on('submit', function(e){
            var formData = new FormData($(this)[0]);
            formData.append('removed_indexes', tempRemovedIndexes);
            e.preventDefault()
            $.ajax({
                url             : "{{ URL('manager/medialibrary/insert') }}",
                method          : "POST",
                data            : formData,
                success 		: function(data) {
                                $('#images-container').empty()
                                $('#images-container').append(data.content)
                                console.log(data)
                },
                error           : function(data){
                                console.log(data);
                },
                contentType		: false,
                cache			: false,
                processData		: false

            })
        })

    </script>
@endsection