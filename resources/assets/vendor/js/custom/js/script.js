
// price range

$(document).ready(function(){
	
	$('#price-range-submit').hide();

	$("#min_price,#max_price").on('change', function () {

	  $('#price-range-submit').show();

	  var min_price_range = parseInt($("#min_price").val());

	  var max_price_range = parseInt($("#max_price").val());

	  if (min_price_range > max_price_range) {
		$('#max_price').val(min_price_range);
	  }

	  $("#slider-range").slider({
		values: [min_price_range, max_price_range]
	  });
	  
	});


	$("#min_price,#max_price").on("paste keyup", function () {                                        

	  $('#price-range-submit').show();

	  var min_price_range = parseInt($("#min_price").val());

	  var max_price_range = parseInt($("#max_price").val());
	  
	  if(min_price_range == max_price_range){

			max_price_range = min_price_range + 100;
			
			$("#min_price").val(min_price_range);		
			$("#max_price").val(max_price_range);
	  }

	  $("#slider-range").slider({
		values: [min_price_range, max_price_range]
	  });

	});

  $(function () {
    var max_value = parseInt($('#max_value').val()) + 1;
	  $("#slider-range").slider({
		range: true,
		orientation: "horizontal",
		min: 0,
		max: max_value,
		values: [0, max_value],
		step: 1,

		slide: function (event, ui) {
		  if (ui.values[0] == ui.values[1]) {
			  return false;
		  }
		  
		  $("#min_price").val(ui.values[0]);
		  $("#max_price").val(ui.values[1]);
		}
	  });

	  $("#min_price").val($("#slider-range").slider("values", 0));
	  $("#max_price").val($("#slider-range").slider("values", 1));

	});

	$("#slider-range,#price-range-submit").click(function () {
    
	  var min_price = $('#min_price').val();
    var max_price = $('#max_price').val();
    
    price_range(min_price, max_price)
	});

});


//  custom tabs login

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




$('#uploadFiles').click(function(){
    $('.nav-tabs > .active').next('li').find('a').trigger('click')
})
$('#mediaLibrary').click(function(){
    $('.nav-tabs > .active > a').trigger('click')
})



// rating




$(".remove_wishlist_item").on('click',function(){
	var tr_parent = $(this).closest("tr")
	tr_parent.animate({'backgroundColor':'#fb6c6c'},300)
	setTimeout(function(){
		tr_parent.find(".td_wrapper").slideUp(500,function(){
			tr_parent.remove()
		})
	})
})



$(document).ready(function(){
    $(".snackBar-plain").show()
    $(".snackBar-action").show()
    $(".snackBar-plain").animate({
        bottom  : 15,
        opacity : 1,
    })
    setTimeout(function(){
        $(".snackBar-plain").animate({
            bottom  : 0,
            opacity : 0
        })
        setTimeout(function(){
            $(".snackBar-plain").hide()
        },2000)
    }, 2000)

    $(".snackBar-action").animate({
        bottom  : 15,
        opacity : 1
    })
    setTimeout(function(){
        $(".snackBar-action").animate({
            bottom  : 0,
            opacity : 0
        })
        setTimeout(function(){
            $(".snackBar-action").hide()
        },5000)
    }, 5000)
})

function showOkCancel() {
    $(".snackBar-okCancel").show()
    $(".snackBar-okCancel").animate({
        bottom  : 15,
        opacity : 1,
    })
    setTimeout(function(){
        $(".snackBar-okCancel").animate({
            bottom  : 0,
            opacity : 0
        })
        setTimeout(function(){
            $(".snackBar-okCancel").hide()
        },10000)
    }, 10000)
}
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
var galImg = $('.gallery_img_holder').width()
$('.gallery_img_holder').height(galImg)
$(window).on('resize',function(){
    var galImg = $('.gallery_img_holder').width()
    $('.gallery_img_holder').height(galImg)
})
$("#btn").on('click',function(){
    var gal_size = $('gallery_img_holder').attr("data-size")
    alert(gal_size)
})

$(document).ready(function(){
    var prog1 = $('.processCircle:first-child')
    var prog2 = $('.processCircle:nth-child(2)')
    var prog3 = $('.processCircle:nth-child(3)')
    var progFill = $('.progressFill')
    if(prog1.hasClass('activeProcess')){
        progFill.css("width","0%")
        prog1.css("background-color","#3853D8")
        $('.processText:first-child').addClass('activeprocessText lead')
        $('.processText:first-child').removeClass('text_grayish')
    } else if(prog2.hasClass('activeProcess')) {
        progFill.css("width","50%")
        prog1.css("background-color","#3853D8")
        prog2.css("background-color","#3853D8")
        $('.processText:first-child').removeClass('activeProcess lead')
        $('.processText:first-child').addClass('text_grayish')
        $('.processText:nth-child(2)').addClass('activeprocessText lead')
        $('.processText:nth-child(2)').removeClass('text_grayish')
    } else if(prog3.hasClass('activeProcess')) {
        progFill.css("width","100%")
        prog1.css("background-color","#3853D8")
        prog2.css("background-color","#3853D8")
        prog3.css("background-color","#3853D8")
        $('.processText:nth-child(2)').removeClass('activeProcess lead')
        $('.processText:nth-child(2)').addClass('text_grayish')
        $('.processText:last-child').addClass('activeprocessText lead')
        $('.processText:last-child').removeClass('text_grayish')
    } else {

    }

    $('.payment_navlink.active .line_link').css({
        opacity: 1
    })
    $('.payment_navlink').on('click',function(){
        $('.payment_navlink .line_link').animate({
            opacity: 0
        }, 300)
        $(this).find('.line_link').animate({
            opacity: 1
        }, 300)
    })


    // back to top button

    var back2top = $('#back2topBtn'),
        readmore = $('.readmore'),
        layer2 = $('#layer2').offset()

    $(window).scroll(function() {
        if ($(window).scrollTop() > 300) {
            back2top.addClass('show')
        } else {
            back2top.removeClass('show')
        }
    })

    back2top.on('click', function(e) {
        e.preventDefault()
        $('html, body').animate({scrollTop:0}, '300')
    })
    readmore.on('click', function(e){
        e.preventDefault()
        $('html, body').animate({scrollTop: layer2.top - 64}, '300')
    })

    $('.nav_account .nav-item > a').on('click',function(){
        $('.nav_account .nav-item>a>.nav_item_line').removeClass('visible')
        $(this).find('.nav_item_line').addClass('visible')
    })

    $('.mdl-layout__drawer-button').on('click', function(){
        alert('hahahaha')
    })

    if($('.mdl-layout__drawer').hasClass('.is-visible')){
        // $('body').toggleClass('overflow-hidden')
        alert('hahahahaha')
    }


    // opening sidebar
    $(function(){

        $('.overlay').on('click', function () {
            // hide sidebar
            if (!$("#menuCkhBx").is('checked')) {
                $('#openSidenav').trigger('click')
                $('#sidebar').removeClass('sidebar_active')
                // hide overlay
                $('.overlay').removeClass('overlay_active')
                $('body').removeClass('overflow-hidden')
            }
        })
        $('#openSidenav').on('click', function () {
            if ($("#menuCkhBx").is(':checked')) {
                $('body').addClass('overflow-hidden')
                // open sidebar
                $('#sidebar').addClass('sidebar_active')
                // fade in the overlay
                $('.overlay').addClass('overlay_active')
                $('.collapse.in').toggleClass('in')
                $('a[aria-expanded=true]').attr('aria-expanded', 'false')
            } else {
                $('body').removeClass('overflow-hidden')
                $('#sidebar').removeClass('sidebar_active')
                // hide overlay
                $('.overlay').removeClass('overlay_active')
            }
        })

    })

})