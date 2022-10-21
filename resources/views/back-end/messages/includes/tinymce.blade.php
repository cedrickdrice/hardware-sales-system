<!DOCTYPE html>
<html>
<head>
	<title>asdsad</title>
	<link rel="stylesheet" type="text/css" href="{{ asset('assets/bootstrap/css/bootstrap.min.css') }}">
	<style>
		.mce-notification, #mceu_38{ display: none !important; }
	</style>
</head>
<body class="px-2">

	<form method="post">
	    <textarea id="mytextarea"></textarea>
	    <input name="image" type="file" id="upload" class="d-none" onchange="">
	</form>

</body>
<script src="{{asset("assets/tinymce/js/ajax.min.js")}}"></script>
<script src="{{asset("assets/tinymce/js/tinymce/tinymce.min.js")}}"></script>
	<script>
	 	tinymce.init({
		    selector: "textarea",
		  	height: 500,
		    theme: "modern",
		    paste_data_images: true,
		    plugins: [
		      "advlist autolink lists link image charmap print preview hr anchor pagebreak",
		      "searchreplace wordcount visualblocks visualchars code fullscreen",
		      "insertdatetime media nonbreaking save table contextmenu directionality",
		      "emoticons template paste textcolor colorpicker textpattern"
		    ],
		    toolbar1: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image | print | preview media | forecolor backcolor emoticons",
		    image_advtab: true,
		    file_browser_callback: function(field_name, url, type, win) {
			    win.document.getElementById(field_name).value = 'my browser value';
		  	},
		  	file_picker_callback: function(callback, value, meta) {
		      if (meta.filetype == 'image') {
		        $('#upload').trigger('click');
		        $('#upload').on('change', function() {
		          var file = this.files[0];
		          var reader = new FileReader();
		          reader.onload = function(e) {
		            callback(e.target.result, {
		              alt: ''
		            });
		          };
		          reader.readAsDataURL(file);
		        });
		      }
		    },
		    templates: [{
		      title: 'Test template 1',
		      content: 'Test 1'
		    }, {
		      title: 'Test template 2',
		      content: 'Test 2'
		    }]
  		});
	</script>
</html>