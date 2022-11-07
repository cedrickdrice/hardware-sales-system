@extends('front-end.includes.index')

@section('title')
    Account | {{ $configuration->name }}
@endsection
@section('content')


<!-- CUSTOM SNACKBAR -->

@if ( Auth::check() )
<div class="cust_snackbar snackBar-plain p-3 mdl-shadow--4dp">
    <div class="text-white">
        <p class="d-flex">
            Welcome!
            <img src="{{asset('assets/images/asd.png')}}" width="16px" height="16px" class="ml-2">
        </p>
        {{$account->full_name()}}
    </div>
</div>
@endif

<div class="cust_snackbar snackBar-label p-3 mdl-shadow--4dp">
    <div class="text-white mb-3 label-text">

    </div>
</div>

<!-- END CUSTOM SNACKBAR -->


<div class="main-container">

    <div class="banner">

        <div class="row justify-content-center align-items-center h-100">
            
            <div class="col-8 col-sm-6 col-md-6 col-lg-4 align-self-center text-center">
                <img src="{{asset('assets/images/logo.png')}}" class=""  height="150px">
                <br><br>
                <p class="h5 text-uppercase Lspacing2 text-white text-center m-0 align-self-center">shopping assistant mirror</p>
            </div>

        </div>

    </div>

    <div class="container main-wrapper">
        
        <div class="main_area radius5 overflow-hidden mdl-shadow--16dp mb-5">

            <div class="container">
                <div class="row justify-content-between px-4 pt-5 pb-3">
                    <div class="col-md-6">
                        <p class="h5 text-uppercase Lspacing2 mb-3 order_txt"></p>
                    </div>
                    <div class="col-md-6">
                        <p class="h5 text-uppercase Lspacing2 username">{{Auth::user()->username}}</p>
                    </div>
                </div>

                <div class="container">
                    
                    <ul class="row nav nav_account">
                        <li class="col-sm nav-item">
                            <a class="nav-link active text-uppercase mdl-js-button mdl-js-ripple-effect position-relative text-center" href="#accountDetails" data-toggle="tab"><b>Account&nbsp;Details</b><div class="nav_item_line visible"></div></a>
                        </li>
                        <li class="col-sm nav-item">
                            <a class="nav-link text-uppercase mdl-js-button mdl-js-ripple-effect position-relative text-center" href="#gallery" data-toggle="tab"><b>My&nbsp;Gallery</b><div class="nav_item_line"></div></a>
                        </li>
                        <li class="col-sm nav-item">
                            <a class="nav-link text-uppercase mdl-js-button mdl-js-ripple-effect position-relative text-center" href="#recentOrders" data-toggle="tab"><b>recent&nbsp;orders</b><div class="nav_item_line"></div></a>
                        </li>
                    </ul>
                    <div class="tab-content" id="myTabContent">
                        <!-- account info -->
                        <div class="tab-pane fade py-5 show active" id="accountDetails" role="tabpanel">
                            <form id="updateAccount">
                                {{csrf_field()}}
                                <div id="account_content">
                                    @include('front-end.account.includes.index-info')
                                </div>
                            </form>
                            <button type="button" class="mdl-button mdl-js-button mdl-js-ripple-effect mdl-button--raised mdl-button--colored myButton1 px-5 py-2 mb-3 mt-5" id="btnSave">save changes</button>
                        </div><!-- END TAB PANE -->
                        
                        <div class="tab-pane fade py-5" id="gallery" role="tabpanel">

                            <div class="gallery_container">
                                <div class="container">
                                    <div class="row my-gallery" itemscope>
                                        
                                        <!-- TO BE LOOPED -->
                                        @foreach($galleries as $gallery)
                                        <figure class="col-lg-2 col-md-3 col-sm-4 col-6 p-1 m-0" itemprop="associatedMedia" itemscope>
                                            <a class="gallery_img_holder overflow-hidden position-relative w-100 p-2 border d-block h-100" href="{{asset('storage/gallery/' . $gallery->image)}}" data-size="1024x1024">
                                                <img src="{{asset('storage/gallery/'. $gallery->image)}}" class="w-100 gallery_img" itemprop="thumbnail">
                                            </a>
                                        </figure>
                                        @endforeach
                                        <!-- END TO BE LOOPED -->

                                    </div><!-- END ROW -->
                                </div>
                            </div><!-- END GALLERY container -->

                        </div><!-- END TAB PANE -->
                        <div class="tab-pane fade py-5" id="recentOrders" role="tabpanel">

                            <div class="container">

                                <div class="container">
                                    <div class="table-responsive">
                                        <table class="table cart_table text-center">
                                                <tr>
                                                    <th><div class="td_wrapper">ORDER NO.</div></th>
                                                    <th><div class="td_wrapper">TOTAL</div></th>
                                                    <th><div class="td_wrapper">DATE OF PURCHASE</div></th>
                                                </tr>
                                            <tbody>
                                                @forelse($orders as $order)
                                                <!-- TO BE LOOPED -->
                                                <tr>
                                                    <td class="text-uppercase">
                                                        <div class="td_wrapper"><a href="{{url('order/detail/' . Crypt::encrypt($order->id))}}">#{{$order->order_number}}</a></div>
                                                    </td>
                                                    <td class="text-uppercase"><div class="td_wrapper">₱{{Crypt::decrypt($order->amount)}}.00</div></td>
                                                    <td class="text-uppercase"><div class="td_wrapper">{{date('F d, Y',strtotime($order->created_at))}}</div></td>
                                                </tr><!-- END BE LOOPED -->
                                                @empty

                                                @endforelse
                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                    <td colspan="3"></td>
                                                </tr>
                                            </tfoot>
                                        </table>
                                    </div><!-- END TABLE CONTAINER -->
                                    <a class="mdl-button mdl-js-button mdl-js-ripple-effect mdl-button--raised mdl-button--colored myButton1 px-5 py-2 mb-5" href="{{url('/shop')}}">shop more</a>
                                </div>
                            </div>

                        </div><!-- END TAB PANE -->
                    </div>

                </div>
            </div>

        </div>

    </div>

</div>

<div class="pswp" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="pswp__bg"></div>
    <div class="pswp__scroll-wrap">

        <!-- Container that holds slides. PhotoSwipe keeps only 3 slides in DOM to save memory. -->
        <div class="pswp__container">
            <!-- don't modify these 3 pswp__item elements, data is added later on -->
            <div class="pswp__item"></div>
            <div class="pswp__item"></div>
            <div class="pswp__item"></div>
        </div>

        <!-- Default (PhotoSwipeUI_Default) interface on top of sliding area. Can be changed. -->
        <div class="pswp__ui pswp__ui--hidden">

            <div class="pswp__top-bar">

                <!--  Controls are self-explanatory. Order can be changed. -->

                <div class="pswp__counter"></div>

                <button class="pswp__button pswp__button--close" title="Close (Esc)"></button>

                <button class="pswp__button pswp__button--share" title="Share"></button>

                <button class="pswp__button pswp__button--fs" title="Toggle fullscreen"></button>

                <button class="pswp__button pswp__button--zoom" title="Zoom in/out"></button>

                <!-- Preloader demo https://codepen.io/dimsemenov/pen/yyBWoR -->
                <!-- element will get class pswp__preloader--active when preloader is running -->
                <div class="pswp__preloader">
                    <div class="pswp__preloader__icn">
                      <div class="pswp__preloader__cut">
                        <div class="pswp__preloader__donut"></div>
                      </div>
                    </div>
                </div>
            </div>

            <div class="pswp__share-modal pswp__share-modal--hidden pswp__single-tap">
                <div class="pswp__share-tooltip"></div> 
            </div>

            <button class="pswp__button pswp__button--arrow--left" title="Previous (arrow left)">
            </button>

            <button class="pswp__button pswp__button--arrow--right" title="Next (arrow right)">
            </button>

            <div class="pswp__caption">
                <div class="pswp__caption__center"></div>
            </div>

        </div>

    </div>
</div>
@endsection

@section('js')
    <script type="text/javascript">
		$('.mdl-navigation2').find('a:nth-child(3)').addClass('activeLink')
        $('body').addClass('account')
	</script>
	@include('includes.links-scripts')
    <!-- photoswipe --><script type="text/javascript" src="{{asset('assets/PhotoSwipe-master/dist/photoswipe.min.js')}}"></script>
    <!-- photoswipe --><script type="text/javascript" src="{{asset('assets/PhotoSwipe-master/dist/photoswipe-ui-default.min.js')}}"></script>
    <!-- custom js --><script type="text/javascript" src="{{asset('assets/custom/js/photoswipe.js')}}"></script>
    <!-- custom js --><script type="text/javascript" src="{{asset('assets/custom/js/script.js')}}"></script>

    <script>

    $(".tblField_container").hide()
    $(document).ready(function(){
        $('#btnSave').on('click', function(){
            $('#updateAccount').submit()
        })
    })
    $(".edit_address").on("click",function(){
        $(".tblField_container").show(100)
        $(".tbl_container").hide(100)
        var id = $(this).data('id')
        $.ajax({
            url     : "{{ URL('account/edit_address')}}/" + id ,
            type    : "get",
            success : function(data) {
                    $('#fn').val(data.address.full_name)
                    $('#addrs').val(data.address.address)
                    $('#pc').val(data.address.post_code)
                    $('#pn').val(data.address.phone_number)
            },error : function(data){
                    console.log(data)
            }
        })
    })
    
    $('#updateAccount').on('submit',function(e){
        e.preventDefault()
        var formData = new FormData($(this)[0])
        $.ajax({
            url     : "{{url('account/update')}}",
            type    : 'post',
            data	: formData,
            success : function(data) {
                    $('#account_content').empty()
                    $('#account_content').append(data.content)
                    showSnackBar(data.label)
            },
            error   : function(data) {
                if( data.status === 422 ) {
                    var errors = $.parseJSON(data.responseText);
                    $.each(errors.errors, function (key, val) {
                        $("#" + key + "_error").text(val[0]);
                    });
                }
            },
            contentType		: false,
            cache			: false,
            processData		: false
        })
    })
    $('#add_address').on('click', function(){
        $.ajax({
            url     : "{!! URL('account/insert') !!}",
            type    : 'post',
            data    : $('#address_form').serialize(),
                       
            success : function(data) {
                    $('#content').empty()
                    $('#content').append(data.content)
                    cancelEdit()
                    addNew()
                    $("#cancel_edit_address").trigger('click')
            }, error : function(data){
                console.log(data)
            }
        })
    })

    function cancelEdit()
    {
        $(".cancel_edit_address").on("click",function(){
            $(".tblField_container").hide(100)
            $(".tbl_container").show(100)
        })
    }
    function addNew()
    {
        $('#add_new_address').on('click', function(){
            $(".tblField_container").show(100)
            $(".tbl_container").hide(100)
        })
    }

    cancelEdit()
    addNew()
    
    </script>
@endsection