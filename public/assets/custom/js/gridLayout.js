$(document).ready(function(){

	$('.item_holder').on('click', function(){
		$('.custom_modal').show(500)
	})
	$('.close-modal').on('click', function(){
		$('.custom_modal').hide(500)
	})

})