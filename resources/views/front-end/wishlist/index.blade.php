@extends('front-end.includes.index')

@section('title')
    Wishlist | SAM
@endsection
@section('content')

<!-- CUSTOM SNACKBAR -->

<div class="cust_snackbar snackBar-action p-3 mdl-shadow--4dp" id="snackbar">
    <div class="text-white mb-3" id="snackbar-text">
        Product name has been removed.
    </div>
    <div class="d-flex w-100 justify-content-end">
        <button class="mdl-button mdl-js-button mdl-js-ripple-effect text-primary">Undo</button>
    </div>
</div>

<!-- END CUSTOM SNACKBAR -->

<div class="main-container">

    <div class="banner">

        <div class="row justify-content-center align-items-center h-100">
            
            <div class="col-8 col-sm-6 col-md-6 col-lg-4 align-self-center text-center">
                <img src="{{asset('assets/images/logo.png')}}" class="" height="150px">
                <br><br>
                <p class="h5 text-uppercase Lspacing2 text-white text-center m-0 align-self-center">shopping assistant mirror</p>
            </div>

        </div>

    </div>

    <div class="container main-wrapper">
        
        <div class="main_area radius5 overflow-hidden mdl-shadow--16dp mb-5">

            <div class="container">
                <p class="h5 text-uppercase Lspacing2 py-5 ml-5">wishlist</p>

                <div class="container">

                    <div class="table-responsive">
                        <table class="table cart_table text-center">
                            <thead>
                                <tr>
                                    <th></th>
                                    <th>PRODUCT</th>
                                    <th>PRICE</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody id="content">
                                @include('front-end.wishlist.includes.index-inner')
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td colspan="6"></td>
                                </tr>
                            </tfoot>
                        </table>

                    </div><!-- END TABLE CONTAINER -->
                    
                </div>
            </div>

        </div>

    </div>
</div>

@endsection

@section('js')
    <script type="text/javascript">
        $('.mdl-navigation2').find('a:nth-child(1)').addClass('activeLink')
    </script>
    <!-- custom js --><script type="text/javascript" src="{{asset('assets/custom/js/script.js')}}"></script>
    @include('includes.links-scripts')
    <script>
    $(document).ready(function(){
        $('#snackbar').hide()
        $('.btnRemove').on('click', function(){
        var id = $(this).data('id')
        $.ajax({
            url     : "wishlist/delete/" + id ,
            type    : "get",
            success : function(data) {
                    $('#content').empty();
                    $('#content').append(data.content)
                    $('#snackbar').show()
                    $('#snackbar-text').html(data.snackbar)
            },
            error   : function(data) {
                    console.log(data)
            }
        });
    });
    });
    
    </script>
@endsection