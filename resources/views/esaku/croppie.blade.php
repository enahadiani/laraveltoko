<!DOCTYPE html>
<html>
<head>

    <title>Laravel Crop Image Before Upload using Croppie JS</title>
    <meta name="_token" content="{{ csrf_token() }}">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/css/bootstrap.min.css" crossorigin="anonymous" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha256-WqU1JavFxSAMcLP2WIOI+GB2zWmShMI82mTpLDcqFUg=" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="{{ asset('asset_dore/css/croppie.css') }}" />
    <script src="{{ asset('asset_dore/js/croppie.min.js') }}" ></script>

</head>
<body>
<div class="row">
	<div class="col-sm-6 offset-sm-3">
		<div class="form-group">
			<label>Pilih Gambar</label><br>
			<input type="file" name="upload_image" id="upload_image" accept="image/*" />
		</div>
			
		<div id="uploaded_image"></div>
 	</div>
</div>
 
<div id="uploadimageModal" class="modal" role="dialog">
   <div class="modal-dialog">
      <div class="modal-content">
         <div class="modal-header">
            <h4 class="modal-title" id="myModalLabel">Crop &amp; Upload Gambar</h4>
            <button type="button" class="close" data-dismiss="modal" >
                <span aria-hidden="true">&times;</span>
                <span class="sr-only">Close</span>
            </button>
         </div>
         <div class="modal-body">
            <div class="row">
               <div class="col-md-12 text-center">
                  <div id="image_demo"></div>
               </div>
            </div>
         </div>
         <div class="modal-footer">
            <button class="btn btn-success crop_image">Crop &amp; Upload</button>
         </div>
      </div>
   </div>
</div>
</body>
<script>  
$(document).ready(function(){
  $image_crop = $('#image_demo').croppie({
    enableExif: true,
    viewport: {
      width:250,
      height:200,
      type:'square' //circle
    },
    boundary:{
      width:300,
      height:300
    }
  });

  $('#upload_image').on('change', function(){
    var reader = new FileReader();
    reader.onload = function (event) {
      $image_crop.croppie('bind', {
        url: event.target.result
      }).then(function(){
        console.log('jQuery bind complete');
      });
    }
    reader.readAsDataURL(this.files[0]);
    $('#uploadimageModal').modal('show');
  });

  $('.crop_image').click(function(event){
    $image_crop.croppie('result', {
      type: 'canvas',
      size: 'viewport'
    }).then(function(response){
      $.ajax({
        url:"upload.php",
        type: "POST",
        data:{"image": response},
        success:function(data)
        {
          $('#uploadimageModal').modal('hide');
          $('#uploaded_image').html(data);
        }
      });
    })
  });
});  
</script>
</html> 