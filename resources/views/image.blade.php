@extends('layouts.app')
@section('content')
<style type="text/css">
	.logo-file-upload{display: none !important;}
</style>
<script src="{{asset('public/js/jquery.js')}}"></script>
<script src="{{asset('public/js/croppie.js')}}"></script>
<link rel="stylesheet" href="{{asset('public/css/croppie.css')}}">
<link rel="stylesheet" href="{{asset('public/css/bootstrap.min.css')}}">
<link rel="stylesheet" href="{{asset('public/css/jquery.fancybox.min.css')}}" media="screen">
<script src="{{asset('public/js/jquery.fancybox.min.js')}}"></script>

<div class="container">
    <div class="row justify-content-center">
		<div class="row">
			<form class="form-horizontal" action="" enctype="multipart/form-data" method="post">
				 {{ csrf_field() }} 
				 <input type="hidden" id="ddImage" value="">
				<div class="col-md-6">
					<div class="box box-info">
			            <div class="box-body">
			           		<div class="form-group">
			                	<label class="col-sm-12  control-label" class="control-label"><h2>Image</h2></label>
			                	<div class="col-sm-12 file-upload">
			                		<a href="javascript:void(0)" class="file-upload-image"> 
										<img src="{{asset('public/images/upload.png')}}" class="logo-upload-icon upload-coverpic"  onclick="Image();">
										<input class="logo-file-upload" type="file" name="image" />
									</a>
								</div>
			                </div>
			            </div>
			        </div>
				</div>
			</form>
		</div>
	</div>
</div>

<form method="post" class="submit_image_url">
	{{ csrf_field() }}
	<input type="hidden" class="image_src" name="image_src">
</form>

<script type="text/javascript">


function Image() {

	$('.logo-file-upload').trigger('click');
	
	$(".logo-file-upload").change(function() { 
		readURL(this);
	});
}

function readURL(input) {

    if (input.files && input.files[0]) { 
    	var reader = new FileReader();

        reader.onload = function (e) {
            var image = e.target.result;

            $('.image_src').val(image);
            
            $.ajax({
		        type: "POST",
		        cache: false,
		        url: '<?php echo url('/get-ajax-image-popup'); ?>',
		        data: $(".submit_image_url").serializeArray(),
		        success: function (html)
		        {	 
		        	
		            $.fancybox({
					    content: html,
					    padding: 0,
					    closeBtn: false
					});
		        }
		    });
        }

        reader.readAsDataURL(input.files[0]);
    }
}
</script>
@endsection