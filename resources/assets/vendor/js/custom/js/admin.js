var animateButton = function(e) {
  e.preventDefault
  //reset animation
  e.target.classList.remove("animate")

  e.target.classList.add("animate")
  setTimeout(function() {
    e.target.classList.remove("animate")
  }, 700)
}


// $('#cust_modal').modal('attach events', '#openModal', 'show')
// $('#media_modal').modal('attach events', '.open_media_modal', 'show')
// $('#cust_modal').modal('attach events', '#hideModal', 'hide')
// $('#media_modal').modal('attach events', '#hide_media_modal', 'hide')

// $('#updateModal').modal('attach events', '.btnUpdate', 'show')
// $('#updateModal').modal('attach events', '#hideUpdateModal', 'hide')


$("#cust_selector").width(153)
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




$('#uploadFiles').click(function(){
    $('.nav-tabs > .active').next('li').find('a').trigger('click')
})
$('#mediaLibrary').click(function(){
    $('.nav-tabs > .active > a').trigger('click')
})

$(function(){
  function mediaSize() {
    if(window.matchMedia('(max-width: 576px)').matches){
      $(".panel2Caption1").addClass("d-none")
      $(".panel2ItemName").addClass("text-center")
      $(".panel2Caption2").addClass("d-block")
      $(".image_holder").addClass("ml-0 flex-column")
      $(".image_holder img").removeClass("w-100").addClass("w-50")
      $(".panel2").css("width","100%")
    } else if (window.matchMedia('(min-width: 577px)').matches){
      $(".panel2Caption1").removeClass("d-none")
      $(".panel2ItemName").removeClass("text-center")
      $(".panel2Caption2").removeClass("d-block")
      $(".image_holder").removeClass("ml-0 flex-column")
      $(".image_holder img").addClass("w-100").removeClass("w-50")
      $(".panel2").css("width","90%")
    }
  }
  mediaSize()
  window.addEventListener('resize', mediaSize, false)
})


$('#iReportsPag .pagination-dot').click(function(){
  $('#iReportsPag .pagination-dot').removeClass('paginate_active')
  $(this).addClass('paginate_active')
})
$('#iSalesPag .pagination-dot1').click(function(){
  $('#iSalesPag .pagination-dot1').removeClass('paginate_active')
  $(this).addClass('paginate_active')
})
$('#mediaLibPag .pagination-dot').click(function(){
  $('#mediaLibPag .pagination-dot').removeClass('paginate_active')
  $(this).addClass('paginate_active')
})


$(function(){
  function mediaSize(){
    if ((window.matchMedia('(max-width : 576px)').matches) && (window.matchMedia('(min-width : 477px)').matches)){
      $('.mediaLib_wrapper').removeClass('col-4').addClass('col-3')
    } else if ((window.matchMedia('(max-width : 476px)').matches) && (window.matchMedia('(min-width : 377px)').matches)){
      $('.mediaLib_wrapper').removeClass('col-3 col-6').addClass("col-4")
    } else if (window.matchMedia('(max-width : 376px)').matches){
      $('.mediaLib_wrapper').removeClass('col-4').addClass("col-6")
    }
  }
  mediaSize()
  window.addEventListener('resize',mediaSize,false)
})


var tempArrayFiles = []
var tempRemovedIndexes = []
$('#images').on('change',function(e){

  var files = e.target.files
  tempArrayFiles = []
  tempRemovedIndexes = []

  $.each(files, function(i, file){
    tempArrayFiles[i] = file
  })

  displayImagesToUpload(tempArrayFiles)
})

function displayImagesToUpload(files) {
  $.each(files, function(i, file){


    var reader = new FileReader()
    reader.readAsDataURL(file)
    reader.onload = function(e){

      var template = '<div class="col-sm-3 col-lg-2 mb-3 mediaLib_wrapper">'+
                        '<div class="d-flex justify-content-center h-100 mediaLib_inner position-relative">'+
                            '<i class="material-icons removeAddedImage" onclick="removePic(' + i + ')">close</i>'+
                            '<div class="mediaLib_imgHolder d-flex justify-content-center position-relative align-self-center w-100">'+
                                '<div class="align-self-center">'+
                                    '<img src="' + e.target.result + '" class="img-fluid" id="img-' + i + '">' +
                                '</div>'+
                            '</div>'+
                        '</div>'+
                    '</div>'

      $('#images_tobeupload').append(template)
    }
  })
}

$('.cbutton').on('click',function(ev){
  let obj = $(this)
  obj.addClass('cbutton--click')
  setTimeout(function(){
    obj.removeClass('cbutton--click')
  },1000)
})
      
function removePic(index) {
  tempArrayFiles.splice(index, 1);
  tempRemovedIndexes[tempRemovedIndexes.length] = index
  $('#images_tobeupload').empty()
  displayImagesToUpload(tempArrayFiles)
}



$("#main_filter_choices > .mdl-menu__item").on("click",function(){
  var data = $(this).attr("data-val")
  document.getElementById("mail_filtered_txt").innerHTML = data
})






$("#mail_star1").on("click",function(){
  var starred = $("#mail_star_i1").attr("starred")
  var unstarred = $("#mail_star_i1").attr("unstarred")
  if($("#mail_star_i1").hasClass("unstarred")){
    $(this).find("i").toggleClass("unstarred")
    document.getElementById("mail_star_i1").innerHTML = starred
    $("#mail_star_chkbx_1").click()
  } else {
    $(this).find("i").toggleClass("unstarred")
    document.getElementById("mail_star_i1").innerHTML = unstarred
    $("#mail_star_chkbx_1").click()
  }
})


function resizeIframe(iframe) {
    iframe.height = iframe.contentWindow.document.body.scrollHeight + "px";
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

$(document).ready(function(){
    $(".snackBar-plain").animate({
        bottom  : 15,
        opacity : 1
    })
    setTimeout(function(){
        $(".snackBar-plain").animate({
            bottom  : 0,
            opacity : 0
        })
    }, 2000)

    $(".snackBar-action").animate({
        bottom  : 15,
        opacity : 1
    }).show()
    setTimeout(function(){
        $(".snackBar-action").animate({
            bottom  : 0,
            opacity : 0
        }).hide()
    }, 5000)

    $('.change_order_status_items .mdl-menu__item').on('click',function(){
        var status = $(this).attr('data-value')
        $('.status_text').html(status)
        $('.change_order_status_items .mdl-menu__item').removeClass('active_status')
        $(this).addClass('active_status')
    })


    $(".dropdown dt a").off().on('click', function() {
        $(".dropdown dd ul").slideToggle('fast')
    })
    $(".dropdowns dt a").off().on('click', function() {
        $(".dropdowns dd ul").slideToggle('fast')
    })

    function getSelectedValue(id) {
      return $("#" + id).find("dt a span.value").html();
    }

    $(document).bind('click', function(e) {
        var $clicked = $(e.target)
        if (!$clicked.parents().hasClass("dropdown")) $(".dropdown dd ul").hide()
    })

    $(document).bind('click', function(e) {
        var $clicked = $(e.target)
        if (!$clicked.parents().hasClass("dropdowns")) $(".dropdowns dd ul").hide()
    })


    $('.mutliSelect input[type="checkbox"]').off().on('click', '.mutliSelect input[type="checkbox"]', function() {

      var title = $(this).closest('.mutliSelect').find('input[type="checkbox"]').val(),
      title = $(this).val() + ","
        
      if ($(this).is(':checked')) {
        var html = '<span title="' + title + '">' + title + '</span>'
        $('.hidas').addClass('activeHidas')
        $('.multiSel').append(html)
        $(".hida").hide()
      } else {
        $('span[title="' + title + '"]').remove()
        $('.hidas').addClass('activeHidas')
        var ret = $(".hida")
        $('.dropdown dt a').append(ret)
      }
    })
    $('.mutliSelects input[type="checkbox"]').off().on('click', '.mutliSelects input[type="checkbox"]', function() {

      var title = $(this).closest('.mutliSelects').find('input[type="checkbox"]').val(),
      title = $(this).val() + ","
        
      if ($(this).is(':checked')) {
        var html = '<span title="' + title + '">' + title + '</span>'
        $('.hidass').addClass('activeHidas')
        $('.multiSels').append(html)
        $(".hida2").hide()
      } else {
        $('span[title="' + title + '"]').remove()
        $('.hidas').addClass('activeHidas')
        var ret = $(".hida2")
        $('.dropdowns dt a').append(ret)
      }
    })
})

function closeSnackBar(){
    $(".snackBar-action").animate({
        bottom  : 0,
        opacity : 0
    },"300")
    setTimeout(function(){
        $(".snackBar-action").hide()
    }, 300)
}
$('.closeSnackBar').on('click',function(){
    closeSnackBar()
})


$(function(){
    $('#openSidenav').on('click', function () {

      if ($("#menuCkhBx").is(':checked')) {
          $("#menuCkhBx").click()
          $('#sidebar').removeClass('sidebar_active')
          // hide overlay
          $('.overlay').removeClass('overlay_active')
      } else {
          // open sidebar
          $('#sidebar').addClass('sidebar_active')
          // fade in the overlay
          $('.overlay').addClass('overlay_active')
          $('.collapse.in').toggleClass('in')
          $('a[aria-expanded=true]').attr('aria-expanded', 'false')
          $("#menuCkhBx").click()
      }
    })
    $('.overlay').on('click',function(){
        $("#menuCkhBx").click()
        $('#sidebar').removeClass('sidebar_active')
        // hide overlay
        $('.overlay').removeClass('overlay_active')
    })

})

