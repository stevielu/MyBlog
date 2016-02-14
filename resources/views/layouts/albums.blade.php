@extends('layouts.default')
@section('header')
<link href="{{asset('themes/blog/css/style.css')}}" rel="stylesheet" type="text/css"/>
<link href="{{asset('css/upload.css')}}" rel="stylesheet" type="text/css"/>
<script type="text/javascript" src="{{asset('js/core.js')}}"></script>
<script type="text/javascript" src="{{asset('js/upload.js')}}"></script>
<style>
    body{
    	width: 100%;
    	background:url("{{asset('images/bg_album.png')}}") no-repeat center center fixed;
    }
    .cropit-image-preview {
        background-color: #f8f8f8;
        background-size: cover;
        border: 1px solid #ccc;
        border-radius: 3px;
        margin-top: 7px;
        cursor: move;
        height: 280px;
        width: 280px;
      }
    .center-block{
    	position: relative;
    	left: 50%;
    	top:50%;
    	margin-left: -25%;
    }
    input.cropit-image-input {
  		visibility: hidden;
	}	
}

.filelists { margin: 20px 0; }
.filelists h5 {text-align: left; margin: 10px 0 0; }
.filelists .cancel_all { color: red; cursor: pointer; clear: both; font-size: 10px; margin: 0; text-transform: uppercase; }
.filelist { margin: 0; padding: 10px 0; }
.filelist li { background: #fff; border-bottom: 1px solid #eee; font-size: 14px; list-style: none; padding: 5px; }
.filelist li:before { display: none; }
.filelist li .file { color: #333; }
.filelist li .progress { color: #666; float: right; font-size: 10px; text-transform: uppercase; }
.filelist li .cancel { color: red; cursor: pointer; float: right; font-size: 10px; margin: 0 0 0 10px; text-transform: uppercase; }
.filelist li.error .progress { color: red; }
.filelist li.error .cancel { display: none; }

</style>
@endsection
@section('body')
<div class = "extraspace-large"></div>
<div class="container-fluid" >
	<div class = "extraspace-small"></div>
	<div class = 'row'>
		<div class="col-lg-1 col-md-1 col-sm-1 col-xs-1"><?php echo "<a class = 'a_nav padding_top' href='".url()."'>Home</a>"."<a class='a_nav_active' href='Request::getRequestUri();'>".Request::getRequestUri()."</a>"?></div>
		
		<!-- Modal -->
		<div class="modal fade" id="create-new" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		  	<div class="modal-dialog modal-sm" role="document">
			    <div class="modal-content">
				    <div class="modal-header">
				        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				        <h5 class="modal-title grey" id="myModalLabel">Create New Album</h5>
				    </div>
			      	<div class="modal-body">
			      		<div class = 'row'>
				      		<form enctype="multipart/form-data" id = 'coverimg_uplaod'  method = 'post' name = 'coverimg_uplaod'>

				      			<input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
							  	<!-- <div class="form-group col-lg-12 col-md-12 col-xs-12">
							    	<input class = 'form-control' placeholder="Name" name="name">
							  	</div> -->
							  	<div class="form-group col-lg-8 col-md-8 col-xs-8">
							 
								    	<input class = 'form-control' placeholder="Name" name='name'>
								</div>   
								<div class = "form-group col-lg-4 col-md-4 col-xs-4">
								    	<button type="submit" class = "newalbum_submit btn btn-default red" id="exampleInputFile">Submit</button>
							  	</div>
							  	<div class="form-group col-lg-12 col-md-12 col-xs-12">
							  		<div id="image-editor">

							  			
								    	<input style = "height:0px" type="file" class="cropit-image-input" />
									  	<!-- This is where the preview image is displayed -->
									  	<div class="cropit-image-preview-container">
										  	<div class="cropit-image-preview img-responsive">
										  		<div class="col-lg-6  col-md-6 center-block select-image-btn btn btn-default">Uplaod</div>
										  	</div>
									  	</div>
										  
									  	<!-- This range input controls zoom -->
									  	<!-- You can add additional elements here, e.g. the image icons -->
									  	<input type="range" class="cropit-image-zoom-input" />
										
										<!-- <input id="input-id" type="file" class="file" data-preview-file-type="text"> -->
									  	<!-- This is where user selects new image -->
									  	
									  	<!-- The cropit- classes above are needed
										       so cropit can identify these elements -->
										<input type="hidden" name="cover_image" class="hidden-image-data" required>
									</div>
							  	</div>
							  
							</form>
						</div>
		      		</div>
			    </div>
		  	</div>
		</div>
	</div>
	<div class = "extraspace-tiny bg_line"></div>
	<div class = 'col-lg-1 col-md-1 col-xs-6 zero_padding padding_top'>
			<button type="button" class=" btn shadow btn-danger btn-xs"  data-toggle="modal" data-target="#create-new" ><span class="fa fa-plus"></span> New Album</button>
	</div>
	<div class = "extraspace-large"></div>
	<div class="row">
		<div class = "extraspace-tiny"></div>
          @foreach($albums as $album)
            <div class="col-lg-2 col-md-3 col-sm-3">
              <a class="thumbnail" href="photos/{{$album->id}}" style=""><!-- "{{asset('storage/users/albums')}}/{{$album->cover_image}}" -->
                <h3>{{$album->album_name}}</h3>
                <img alt="{{$album->name}}" src="{{url('/storage/users/albums',$album->cover_image)}}"/>
                <div class="caption">
                  
                  <!-- <p>{{count($album->Photos)}} image(s).</p> -->
                  <!-- <p>Created date:  {{ date("d F Y",strtotime($album->created_at)) }} at {{date("g:ha",strtotime($album->created_at)) }}</p> -->
                  
                </div>
              </a>
            </div>
          @endforeach
    </div>
    <div class = "extraspace-large"></div>
	
	 
<div class = "extraspace-large"></div>
</div>
<script>
	var $filequeue,
		$filelist;

	$(document).ready(function() {
		$filequeue = $(".filelist.queue");
		$filelist = $(".filelist.complete");

		$(".upload").upload({
			maxSize: 1073741824,
			beforeSend: onBeforeSend
		}).on("start.upload", onStart)
		  .on("complete.upload", onComplete)
		  .on("filestart.upload", onFileStart)
		  .on("fileprogress.upload", onFileProgress)
		  .on("filecomplete.upload", onFileComplete)
		  .on("fileerror.upload", onFileError);

		$filequeue.on("click", ".cancel", onCancel);
		$(".cancel_all").on("click", onCancelAll);
	});

	function onCancel(e) {
		console.log("Cancel");
		var index = $(this).parents("li").data("index");
		$(".upload").upload("abort", parseInt(index, 10));
	}

	function onCancelAll(e) {
		console.log("Cancel All");
		$(".upload").upload("abort");
	}

	function onBeforeSend(formData, file) {
		console.log("Before Send");
		formData.append("test_field", "test_value");
		// return (file.name.indexOf(".jpg") < -1) ? false : formData; // cancel all jpgs
		return formData;
	}

	function onStart(e, files) {
		console.log("Start");
		var html = '';
		for (var i = 0; i < files.length; i++) {
			html += '<li data-index="' + files[i].index + '"><span class="file">' + files[i].name + '</span><span class="cancel">Cancel</span><span class="progress">Queued</span></li>';
		}
		$filequeue.append(html);
	}

	function onComplete(e) {
		console.log("Complete");
		// All done!
	}

	function onFileStart(e, file) {
		console.log("File Start");
		$filequeue.find("li[data-index=" + file.index + "]")
				  .find(".progress").text("0%");
	}

	function onFileProgress(e, file, percent) {
		console.log("File Progress");
		$filequeue.find("li[data-index=" + file.index + "]")
				  .find(".progress").text(percent + "%");
	}

	function onFileComplete(e, file, response) {
		console.log("File Complete");
		if (response.trim() === "" || response.toLowerCase().indexOf("error") > -1) {
			$filequeue.find("li[data-index=" + file.index + "]").addClass("error")
					  .find(".progress").text(response.trim());
		} else {
			var $target = $filequeue.find("li[data-index=" + file.index + "]");
			$target.find(".file").text(file.name);
			$target.find(".progress").remove();
			$target.find(".cancel").remove();
			$target.appendTo($filelist);
		}
	}

	function onFileError(e, file, error) {
		console.log("File Error");
		$filequeue.find("li[data-index=" + file.index + "]").addClass("error")
				  .find(".progress").text("Error: " + error);
	}
	
</script>
<script>

function dataURItoBlob(dataURI) {
    // convert base64/URLEncoded data component to raw binary data held in a string
    // var byteString;
    // if (dataURI.split(',')[0].indexOf('base64') >= 0)
    //     byteString = atob(dataURI.split(',')[1]);
    // else
    //     byteString = unescape(dataURI.split(',')[1]);

    // // separate out the mime component
    // var mimeString = dataURI.split(',')[0].split(':')[1].split(';')[0];

    // // write the bytes of the string to a typed array
    // var ia = new Uint8Array(byteString.length);
    // for (var i = 0; i < byteString.length; i++) {
    //     ia[i] = byteString.charCodeAt(i);
    // }

    // return new Blob([ia],{type: 'image/png'});
    var binary = atob(dataURI.split(',')[1]);
    var array = [];
    console.log(binary.length);
    for(var i = 0; i < binary.length; i++) {
        array.push(binary.charCodeAt(i));
    }
    
    var blob = new Blob([new Uint8Array(array)], {type: 'image/png'});
    
    
    var obj = new FormData($("#coverimg_uplaod"));
    console.log(obj);
    obj.append("cover_image", blob,"test.png");
    var request = new XMLHttpRequest();
	request.open("POST", "albums");
	console.log(obj);
	request.send(obj);
	// var formdata = new FormData($('#coverimg_uplaod'));
	// formdata.append("cover_image", blob, "filename.png");
	// var request = new XMLHttpRequest();
	// request.open("POST", "/albums");
	// request.send(formdata);
	return;
}

	//$("#img_cover").fileinput({'showUpload':true, 'previewFileType':'any'})
	$('#image-editor').cropit();
 //    $('#image-editor').cropit({
	//   imageBackground: false,
	//   imageBackgroundBorderWidth: 15 // Width of background border
	// });
	$('.select-image-btn').click(function() {
		$('.cropit-image-input').click();
	});

	$('#coverimg_uplaod').submit(function(){
		var imageData = $('#image-editor').cropit('export');
		//dataURItoBlob(imageData);
		if(imageData!=undefined){
			$('.hidden-image-data').val(imageData);
		}
		else{
			alert("pls uplaod file ");
			return false;
		}

		// console.log($('.hidden-image-data').val());
	});
</script>
@endsection