
<div class="container col-md-12">
    <div class="panel panel-default">
        <div class="panel-heading">Crop Image</div>
        <div class="panel-body">
            <div class="row">
                <div class="text-center" style="margin: 0px auto;">
                    <div id="upload-demo"></div>
                </div>                
            </div>
            <div class="row">
                <div class="col-md-12 text-center">
                    <button class="btn btn-success upload-result" style="margin: 0px auto;">Upload Image</button>
                </div>
            </div>
        </div>
    </div>
</div>


<style type="text/css">
.fancybox-wrap, .fancybox-inner {
    width: 600px !important;
}    

</style>

<script type="text/javascript">
$('#upload-demo').show();
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

$uploadCrop = $('#upload-demo').croppie({
    enableExif: true,
    viewport: {
        width: 250,
        height: 250,
        type: 'square'
    },
    boundary: {
        width: 350,
        height: 350
    }
});

$uploadCrop.croppie('bind', {
    url: "<?php echo $data['image_src']; ?>"
    }).then(function(){
    console.log('jQuery bind complete');
});

$('.upload-result').on('click', function (ev) {
    $uploadCrop.croppie('result', {
        type: 'canvas',
        size: 'viewport'
    }).then(function (resp) {
        $.ajax({
            url: "{{url('image-crop')}}",

            type: "POST",
            data: {"image_path": resp,"_token":"{{ csrf_token() }}"},
            success: function (data) {
                if(data!=''){
                    var path="<?php echo url('public/images').'/';  ?>"+data;
                    $('#ddImage').val(path);
                    $('.file-upload-image').html("<img src="+"'"+path+"'"+ "class='logo-upload-icon upload-coverpic' onclick='Image();' ><input class='logo-file-upload' type='file' name='image'/>");
                    }
                $.fancybox.close();
            }
        });
    });
});

</script>