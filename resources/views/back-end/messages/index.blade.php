@extends('back-end.includes.index')

@section('title')
    Messages | {{ $configuration->name }}
@endsection
@section('content')

    <div class="main-container w-100 h-100">

        <div class="main-wrapper h-100">
            <div class="mdl-layout mdl-js-layout  mdl-layout--fixed-drawer">
              <header class="mdl-layout__header">
                <div class="mdl-layout__header-row">
                    <!-- Title -->
                    <span class="mdl-layout-title">Inbox</span>
                    <!-- Add spacer, to align navigation to the right -->
                    <div class="mdl-layout-spacer"></div>
                    <!-- Navigation -->
                    <nav class="mdl-navigation">
                        <a class="mdl-navigation__link">
                            <button class="cbutton cbutton--effect-sanja" data-toggle="collapse" href="#collapseExample">
                                <i class="cbutton__icon material-icons">search</i>
                            </button>
                        </a>
                    </nav>
                </div>
                </header>
                <div class="mdl-layout__drawer">
                    <span class="mdl-layout-title d-flex justify-content-center mt-4">
                        <button class="mdl-button mdl-js-button mdl-js-ripple-effect mdl-button--raised mdl-button--colored myButton1 px-5 small_txt">
                            <i class="material-icons mr-2">edit</i>Compose
                        </button>
                    </span>
                    <nav class="mdl-navigation">
                        <a class="mdl-navigation__link d-flex" href="#">
                            <i class="material-icons-new outline-all_inbox mr-2"></i>All Inboxes <span class="ml-auto"><small><b>200</b></small></span>
                        </a>
                        <a class="mdl-navigation__link d-flex" href="#">
                            <i class="material-icons-new outline-inbox mr-2"></i>Inbox
                        </a>
                        <a class="mdl-navigation__link d-flex" href="#">
                            <i class="material-icons-new outline-star_border mr-2"></i>Starred
                        </a>
                        <a class="mdl-navigation__link d-flex" href="#">
                            <i class="material-icons-new outline-send mr-2"></i>Sent
                        </a>
                        <a class="mdl-navigation__link d-flex" href="#">
                            <i class="material-icons-new outline-note mr-2"></i>Draft
                        </a>
                        <a class="mdl-navigation__link d-flex" href="#">
                            <i class="material-icons-new outline-delete mr-2"></i>Trash
                        </a>
                    </nav>
                </div>
                <main class="mdl-layout__content h-100">

                    <div class="collapse" id="collapseExample">
                        <div class="search_mail_container">
                            <input type="text" name="" placeholder="Search Something..." class="search_mail p-4 border-0 bg-white w-100">
                        </div>
                    </div>

                    <div class="page-content pt-4 h-100">
                        <div class="container h-100">

                            <div class="mb-4">
                                <button class="mdl-button mdl-js-button mdl-js-ripple-effect mdl-button--raised mdl-button--colored myButton1 px-4 small_txt">
                                    <i class="material-icons mr-2">arrow_back</i>back to inbox
                                </button>
                            </div>
                            <div class="px-2 mb-2">
                                <div class="row align-items-center">
                                    <div class="col-sm-6 mb-2">
                                        <input type="text" name="" placeholder="To" class="form-control">
                                    </div>
                                    <div class="col-sm-6 mb-2">
                                        <input type="text" name="" placeholder="Subject" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <iframe src="{{URL("/admin/messages/compose")}}" onload="resizeIframe(this)"></iframe>
                            <div class="px-2 my-2">
                                <div class="row">
                                    <div class="col">
                                        <button class="mdl-button mdl-js-button mdl-js-ripple-effect mdl-button--raised mdl-button--colored cust_gradient small_txt">
                                            <i class="material-icons mr-2">send</i>Send
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </main>
            </div>
        </div>

    </div>


@endsection

@section('js')
    <script>
        $(".mesSNL").addClass("SNLactive")
        $(".mesSNL a").css("color","white")
    </script>
    <script src="{{asset('assets/tinymce/js/tinymce/tinymce.min.js')}}"></script>
    <script>
        tinymce.init({
            selector: 'textarea',
            height: 500,
            theme: 'modern',
            plugins: 'print preview fullpage searchreplace autolink directionality visualblocks visualchars fullscreen image link media template codesample table charmap hr pagebreak nonbreaking anchor toc insertdatetime advlist lists textcolor wordcount imagetools  contextmenu colorpicker textpattern help',
            toolbar1: 'formatselect | bold italic strikethrough forecolor backcolor | link | alignleft aligncenter alignright alignjustify  | numlist bullist outdent indent  | removeformat',
            image_advtab: true,
            templates: [
                { title: 'Test template 1', content: 'Test 1' },
                { title: 'Test template 2', content: 'Test 2' }
            ]
        });
    </script>
@endsection