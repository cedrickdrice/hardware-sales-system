<script type="text/javascript">
    $('body').addClass('shop')
    $('.main-nav').find('li:nth-child(4) > a').addClass('activeLink')

    $('#snl_shop > a').addClass('activeSNL')

    function getProduct() {
        $('.item_holder').on('click', function(){
            let id = $(this).data('id')
            showProductModal(id);
        })
    }
    function handleClick(event)
    {
        let check = $('#wishlist').data('check')
        let id = $('#wishlist').data('id')
        let url = ''
        if (check === 0) {
            url = "{{ URL('/wishlist/add-item')}}/" + id
            $('#wishlist').data('check', 1)
        } else {
            url = "{{ URL('/wishlist/remove-item')}}/" + id
            $('#wishlist').data('check', 0)
        }
        $.ajax({
            url 	: url,
            type	: 'get',
            success : function(data) {
                console.log(data)
                console.log($('#wishlist').data('check'))
            },
            error 	: function(data) {
                console.log(data)
            }
        })
    }


    $('#btnAddToCart').on('click', function(){
        let id = $(this).data('id')
        let sub_id = $(this).data('sub_id')
        url = "{{url('cart/insert')}}/" + id + '/' + sub_id
        window.location = url
    })

    $('.close-modal').on('click', function(){
        hideModal()
    })
    function getDate(input){
        var d = new Date(Date.parse(input.replace(/-/g, "/")));
        var month = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];
        var date = d.getDate() + " " + month[d.getMonth()] + ", " + d.getFullYear();
        var time = d.toLocaleTimeString().toLowerCase().replace(/([\d]+:[\d]+):[\d]+(\s\w+)/g, "$1$2");
        return (date + " " + time);
    };

    function revealModal(){
        $('.modalDummy').animate({
            "width": "100%",
            "left": "0"
        }, 300, function(){
            $(this).css({
                "right":"initial"
            })
        })
        setTimeout(function(){
            $('.modalDummy').animate({
                "width": "0px"
            }, 300)
        }, 600)
        setTimeout(function(){
            $('.custom_modal').addClass('modal_opened')
            $('body').addClass('overflow-hidden')
            $('.custom_modal').show()
            $('.custom_modal_wrapper').animate({
                "opacity": "1",
                "right": "0px"
            }, 1000)

        }, 600)
    }
    function hideModal(){

        $('.custom_modal_wrapper').animate({
            "opacity": "0",
            "right": "-100px"
        }, 500)

        $('.modalDummy').animate({
            "width": "100%",
            "right": "0"
        }, 500, function(){
            $(this).css({
                "left":"initial"
            })
        })

        setTimeout(function(){
            $('.modalDummy').animate({
                "width": "0px"
            }, 300)
        }, 600)
        setTimeout(function(){
            $('.custom_modal').removeClass('modal_opened')
            $('body').removeClass('overflow-hidden')
            $('.custom_modal').hide()
        }, 600)
    }
    function changeImage(){
        $('.modal_item_colors .color_icon').on('click', function(){
            let colorBtn = $(this).data('color')
            let id = $(this).data('id')
            let modalImg = $('.custom_modal_wrapper').find('.prodImage')
            $.ajax({
                url     : "{{url('shop/getImageOfColor')}}/" + id,
                type    : "get",
                success : function(data) {
                    modalImg.attr("src", "{{asset('storage/products/')}}/" + data.product.image )
                    $('#btnAddToCart').data('sub_id', data.product.id)
                },
                error   : function (data) {
                    console.log(data)
                }
            })
            $('.modal_item_colors .color_icon').removeClass('activeColor')
            $(this).addClass('activeColor')
        })
        $('.custom_modal').on('change', '.selectOption', function (){
            let id = $(this).val()
            let modalImg = $('.custom_modal_wrapper').find('.prodImage')
            $.ajax({
                url     : "{{url('shop/getImageOfColor')}}/" + id,
                type    : "get",
                success : function(data) {
                    modalImg.attr("src", "{{asset('storage/products/')}}/" + data.product.image )
                    $('#btnAddToCart').data('sub_id', data.product.id)
                },
                error   : function (data) {
                    console.log(data)
                }
            })

        })
    }
    function showProductModal(id) {
        let html = ''
        let htmlReview = ''
        $.ajax({
            url     : "{{url('shop/get')}}/" + id,
            type    : 'get',
            success : function(data) {

                if (data.check === 1) {
                    $('#wishlist').trigger('click')
                    $('#wishlist').attr('data-check', 1)
                }
                $('#wishlist').attr('data-id', data.product.id)
                $('#wishlist').on('click', handleClick);
                $('#modal_category').html(data.product.category.name)
                $('#modal_name').html(data.product.name)
                $('#modal_price').html('₱' + data.product.price)
                $('#id').val(data.product.id)
                $('#btnAddToCart').attr('data-id', data.product.id)
                $('#btnAddToCart').attr('data-sub_id', data.sub_product.id)
                $('#itemDescription').html(data.product.description)
                let count = data.product.product_filters.length;
                $.each(data.product.product_filters, function (index, value){
                    if (value.stock > 0){
                        $('.prodImage').attr('src', "{{asset('storage/products')}}/" + value.image  )
                    }
                });
                $('.formulatedReview').html(data.rate)
                $('#countTotal').html(data.count + ' customer/s rating')
                $(data.star).each(function(index,value) {
                    $('#star_'+ index).html(value)
                })
                $(data.width).each(function(index,value) {
                    $('#width_'+ index).width(value + '%')
                })
                html = "<select class='form-control selectOption'>"
                $(data.product.product_filters).each(function(index, value){
                    if ( value.stock != 0) {
                        if (index == 0) {
                            html += '<option value="'+value.id +'" selected>'+ value.option_name +'</option>'
                        } else {
                            html += '<option value="'+value.id +'">'+ value.option_name +'</option>'
                        }
                    }
                })
                html += '</select>';
                $('.modal_append').empty()
                $('.modal_append').append(html)
                changeImage()
                $('.selectOption').change();
                revealModal()
            },
            error : function(data) {
                console.log(data)
            }
        })
    }
</script>
<script>
    (function($) {
        /**
         * Get the query param on url
         * @type
        */
        $.QueryString = (function(a) {
            if (a == "") return {};
            var b = {};
            for (var i = 0; i < a.length; ++i)
            {
                var p=a[i].split('=');
                if (p.length != 2) continue;
                b[p[0]] = decodeURIComponent(p[1].replace(/\+/g, " "));
            }
            return b;
        })(window.location.search.substr(1).split('&'))
    })($);
    $(document).ready(function(){
        if (window.location.href.indexOf('product_no') > -1) {
            let id = (isNaN(parseInt($.QueryString['product_no'], 10)) === false) ? parseInt($.QueryString['product_no'], 10) : false;
            if (id === false) {
                return;
            }
            showProductModal(id);
        }
        getProduct()
        $('#wishlist').off('click', handleClick)

        if($('.prodImage').width() > $('.prodImage').height()){
            $('.prodImage').addClass('w-100').removeClass('h-100')
        } else if($('.prodImage').width() < $('.prodImage').height()){
            $('.prodImage').addClass('h-100').removeClass('w-100')
        }
    })

    $('.category_trigger').on('click', function(e){
        e.preventDefault();
        var id = $(this).data('id')
        $.ajax({
            type        : "get",
            url         : "{{url('shop/filter')}}/" + id,
            success     : function(data) {
                $('#content').empty();
                $('#content').append(data.content)
                getProduct()
            },
            error       : function(data) {
                console.log(data)
            },
        });
    });
    $('.btnTrigger').on('click', function(e){
        e.preventDefault();
        var id = $(this).data('id')
        $.ajax({
            type        : "get",
            url         : "{{url('shop/filterColor')}}/" + id,
            success     : function(data) {
                $('#content').empty();
                $('#content').append(data.content)
                getProduct()
            },
            error       : function(data) {
                console.log(data)
            },
        });
    });
    $('.filterColor .color_icon').on('click', function(){
        var id = $(this).data('id')
        $.ajax({
            type        : "get",
            url         : "{{url('shop/filterColor')}}/" + id,
            success     : function(data) {
                console.log(data)
                $('#content').empty();
                $('#content').append(data.content)
                getProduct()
            },
            error       : function(data) {
                console.log(data)
            },
        });
    });

    $('.btnGenderTrigger').on('click', function(e){
        e.preventDefault();
        var id = $(this).data('id')
        $.ajax({
            type        : "get",
            url         : "{{url('shop/filterGender')}}/" + id,
            success     : function(data) {
                $('#content').empty();
                $('#content').append(data.content)
                getProduct()
            },
            error       : function(data) {
                console.log(data)
            },
        });
    });
    $('.range').on('change', function(e){
        var min = $('#min_price').val()
        var max = $('#max_price').val()
        price_range(min, max)
    });

    function price_range(min_price, max_price)
    {
        var min = min_price;
        var max = max_price;
        $.ajax({
            url     : "{{url('shop/range_filter')}}/" + min + '/' + max ,
            type    : "get",
            success : function(data) {
                $('#content').empty();
                $('#content').append(data.content)
                getProduct()
            },
            error   : function(data) {
                console.log(data)
            }
        });
    }
    (function() {

        function SVGDDMenu( el, options ) {
            this.el = el;
            this.init();
        }

        SVGDDMenu.prototype.init = function() {
            if ((this.el) == null) {
                return false;
            }
            this.shapeEl = this.el.querySelector( 'div.morph-shape' );

            var s = Snap( this.shapeEl.querySelector( 'svg' ) );
            this.pathEl = s.select( 'path' );
            this.paths = {
                reset : this.pathEl.attr( 'd' ),
                open : this.shapeEl.getAttribute( 'data-morph-open' )
            };

            this.isOpen = false;

            this.initEvents();
        };

        SVGDDMenu.prototype.initEvents = function() {
            this.el.addEventListener( 'click', this.toggle.bind(this) );

            // For Demo purposes only
            [].slice.call( this.el.querySelectorAll('a') ).forEach( function(el) {
                el.onclick = function() { return false; }
            } );
        };

        SVGDDMenu.prototype.toggle = function() {
            var self = this;

            if( this.isOpen ) {
                classie.remove( self.el, 'menu--open' );
            }
            else {
                classie.add( self.el, 'menu--open' );
            }

            this.pathEl.stop().animate( { 'path' : this.paths.open }, 320, mina.easeinout, function() {
                self.pathEl.stop().animate( { 'path' : self.paths.reset }, 1000, mina.elastic );
            } );

            this.isOpen = !this.isOpen;
        };

        new SVGDDMenu( document.getElementById( 'menu' ) );

    })();



</script>