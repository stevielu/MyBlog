@extends('layouts.default')
@section('header')
<title>{{$album->name}}</title>
<link href="{{asset('themes/blog/css/style.css')}}" rel="stylesheet" type="text/css"/>
<link href="{{asset('css/upload.css')}}" rel="stylesheet" type="text/css"/>
<script type="text/javascript" src="{{asset('js/core.js')}}"></script>
<script type="text/javascript" src="{{asset('js/upload.js')}}"></script>

<style>
	
img{
	box-shadow:0 1px 2px rgba(0,0,0,0.15);
	-webkit-transform: translateY(0);
    -webkit-transition: all 0.6s cubic-bezier(0.165, 0.84, 0.44, 1);
    transition: all 0.6s cubic-bezier(0.165, 0.84, 0.44, 1);
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
figcaption {
	position: absolute;
	top: 0;
	left: 0;
	padding: 20px;
	background: #282B34;
	color: #ed4e6e;
}
figcaption h3 {
	margin: 0;
	padding: 0;
	color: #fff;
}
 figcaption span:before {
	content: 'by ';
}
figcaption a {
	text-align: center;
	padding: 5px 10px;
	border-radius: 2px;
	display: inline-block;
	color: white;
}
figcaption a small{
	font-size: 0.6em;
}
figure {
	overflow: hidden;
}
figure img {
	transition: transform 0.4s;
}
figure:hover img {
	transform: translateY(-25px);
}
figcaption {
	height: 50px;
	width: 100%;
	top: auto;
	border-radius:0 0 6px 6px;
	bottom: 0;
	opacity: 0;
	transform: translateY(100%);
	transition: transform 0.4s, opacity 0.1s 0.3s;
}
figure:hover figcaption{
	opacity: 1;
	transform: translateY(0px);
	transition: transform 0.4s, opacity 0.1s;
}
figcaption a {
	position: absolute;
	border-radius:0 0 0px 0px;
	bottom: 20px;
	
}
.nav-overlay{
	position: absolute;
    top: 0;
    left: 0;
    z-index: 100;
    width: 100%;
    height: 100%;
}
.nav-overlay a{
	width: 50%;
    z-index: 100;
    display: block;
    width: 49%;
    height: 100%;
    font-size: 30px;
    color: #fff;
    text-shadow: 2px 2px 4px #000;
    opacity: 0;
    filter: dropshadow(color=#000000,offx=2,offy=2);
    -webkit-transition: opacity .5s;
    -moz-transition: opacity .5s;
    -o-transition: opacity .5s;
    transition: opacity .5s;
}
.nav-overlay a:hover {
	opacity: 1;
	text-decoration:none;
}
.glyphicon-chevron-right {
    right: 0;
    float: right;
    padding-right: 15px;
    text-align: right;
}
.glyphicon-chevron-left {
    left: 0;
    float: left;
    padding-left: 15px;
    text-align: left;
}
</style>
@endsection
@section('body')
<div class="container-fluid" >
	<div class = 'row'>
	<div class = 'col-md-3' style = "min-height:600px;background-color: #282b34;">
		<div class="col-md-12 red_line2" style="height:40px">
			<h4 style="line-height:40px;color: #A9AAAC;">
				DETAILS
			</h4>
		</div>
		<div class="col-md-12 " style = "min-height:250px;color: #A9AAAC;">
			<p class = 'content' id = 'des' style = "text-align:left">
			
			</p>

			
		</div>
		<small class="col-md-12 red_line2" id = 'creat_date' style = "color: #A9AAAC; min-height:20px;">
				
		</small>
	</div>
	<div class = 'col-md-9' id = 'main-box' style="min-height:600px; background-color: rgba(238, 238, 238,1);">
		<form action="/photos" method = "POST" enctype="multipart/form-data">
		<div class = 'col-md-12' style = "height:40px;width:40%; color:black">
			
			<input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
			<input type = "hidden" name = 'album_id' value = '{{$album->id}}'>
			<input id = 'addimg' name = 'myimage' type="file" multiple style="display:none" />
			<button type = 'button' id = 'fileUpload' class="btn btn-link btn-lg"  data-target="#image_preview" aria-expanded="false" aria-controls="collapseExample">
				<span class="fa fa-camera"></span>
			</button>
			<button type="button" id = 'delete' class="btn btn-link btn-lg" >
				<span class="fa fa-trash"></span>
			</button>
			<button type="button" id = 'edit' class="btn btn-link btn-lg" >
				<span class="fa fa-pencil-square-o"></span>
			</button>
			<button type="button" id = 'yes' class="hover_button item btn" >
				<span class="fa fa-check"></span>
			</button>
			<button  type="button" id = 'no' class="hover_button item btn" >
				<span class="fa fa-ban"></span>
			</button>
		</div>
		<div class = 'col-md-12'>
			<div class = "extraspace-small"></div>
		</div>
		<div class = 'col-md-12'>
			<div class = "collapse" id = "image_preview">
			<div class = 'pull-right myfloater'>
				<button id = "upload" type = "submit" class="btn btn-sm btn-primary vcenter">
			   		UPLOAD
				</button>
				<button id = "cancle_upload" type = "button" class="btn btn-sm btn-danger vcenter">
			   		CANCLE
				</button>
			</div>
		  	<div class = "well mywell" id = 'preview_container'>
			</div>
			</div>
		</div>
		</form>
		
		<!-- <div style = "height:30px;overflow:hidden">
			
		</div> -->
		<div class = "extraspace-large"></div>
		<div class = "starter-template" id = "imgs_box">
		        @foreach($album->Photos as $photo)
		            <div class="col-md-3" style="overflow:hidden;" name = 'pic' image-id = "{{$photo->id}}" image-des = "{{$photo->description}}" image-date = "{{$photo->created_at}}">
	              		<figure>
	              			<img class = 'img-responsive img-rounded'  style = 'max-height: 150px;min-height: 150px;min-width:200px;'alt="{{$photo->name}}" src="{{url('/storage/users/albums',$photo->image)}}">
		              		<div class = 'col-xs-12'>
			              		<figcaption>
									<a class = 'col-md-6' href="#" data-toggle="modal" data-target="#{{$photo->id}}" style="padding-bottom:0; padding-top:0;line-height:50px"><span class="fa fa-lg fa-search-plus"></span></a>
									<a class = 'col-md-6 pull-right' href="#" style="padding-bottom:0; padding-top:0;line-height:50px"><span class="fa fa-lg fa-thumbs-o-up">&nbsp<small>0</small></p></a>
								</figcaption>
							</div>
		              	</figure>
		              	
		              	<div class="caption">
		              		<div class = "extraspace-small"></div>
		              	</div>
		            </div>
		        @endforeach
    	</div>
    	<div class="img-modal modal fade" ="-1" role="image-dialog">
		  	<div class="modal-dialog modal-size" style = "width:auto" role="document" >
			    <div class="modal-content">
			      	<div class="modal-header">
				        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				        <h4 class="modal-title" id="img-name">No Name</h4>
			      	</div>
			      	<div class="modal-body">
			      		<div>
		      				<div>
			      				<img id = 'img-zoomin' src = '' class = "img-responsive">
		      				</div>
		      				<div class="nav-overlay">
		      					<a href="#" id = "left-nav" class="glyphicon glyphicon-chevron-left"></a>
		      					<a href="#" id = "right-nav" class="glyphicon glyphicon-chevron-right"></a>
		      				</div>
			      		</div>
			      	</div>
			  	</div>
			</div>
		</div>
	
</div>   
</div>		

	  	
	  


<script>
	$index = 0;
	var edit_type = 'default';
	var img_content = new Object();
	img_content.img_name = '';
	img_content.img_id = null;
	img_content.img_idgroup = null;
	img_content.img_des = "";
	img_content.img_date = "";
	img_content.img_next = "";
	img_content.img_prev = "";
	img_content.editDes = function(content){
		$this.img_des = content;
	};

	// function resize(width,obj) {
 //      var width_total;
 //      width_total = width ;+ //obj.border.left + obj.padding.left + obj.padding.right + obj.border.right;
 //      obj.modal_dialog.css({'width':'auto','max-width': width_total});
 //    }

	$.ajaxSetup({
        	headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        	}
		});

	$('#edit').on('click',function(){
		if(img_content.img_id == null){
			alert('pls select your target');
			return false;
		}

		edit_type = 'edit';

		$('#des').html('');
		$('#des').append('<textarea  maxlength="500" style="resize:none" des-data="content" class="form-control" rows="3"></textarea>');
		$('[des-data="content"]').html(img_content.img_des);

		$(this).css("display","none");
		$('#yes').css("display","inline-block");
		$('#no').css("display","inline-block");
		
		//$content = $('[des-data]');

		
		//$obj.attr('image-des',$content);
		//$('#des').html("Description:&nbsp"+$obj.attr('image-des'));
	});

	$('#delete').on('click',function(){
		if(img_content.img_id == null){
			alert('pls select your target');
			return false;
		}

		edit_type = 'remove';

		$(this).css("display","none");
		$('#yes').css("display","inline-block");
		$('#no').css("display","inline-block");
	});

	$('#yes').click(function(){
		$content = $('[des-data="content"]').val();
		if(edit_type == 'edit'){
			$obj = $("[image-id ='"+img_content.img_id+"']");
			$obj.attr('image-des',$content);
			$('#des').html("Description:&nbsp"+$content);
		}

		
		var url = location.href;  
		$id = url.substring(url.lastIndexOf("/")+1,url.length); 
		$.ajax({
			type:'post',
			url:'/photos/'+$id,
			data:{'type':edit_type,'des':$content,'id':img_content.img_id},
			success:function(data){
				if(edit_type == 'edit'){
					//edit
					img_content.img_des = $content;
				}
				else if(edit_type == 'remove'){
					//remove
					$("[image-id ='"+img_content.img_id+"']").remove();
				}
			},
			error:function(jqXHR,textStatus,errorThrown){
				alert(textStatus,errorThrown);
			}
		});

		$('#yes').css("display","none");
		$('#no').css("display","none");
		$('#edit').css("display","inline-block");
		$('#delete').css("display","inline-block");
	});

	$('#no').click(function(){
		$('#yes').css("display","none");
		$('#no').css("display","none");
		if(edit_type == 'edit'){
			
			$obj = $("[image-id ='"+img_content.img_id+"']");
			$('#des').html("Description:&nbsp"+$obj.attr('image-des'));
		}
			$('#delete').css("display","inline-block");
			$('#edit').css("display","inline-block");
		
	});

	$('[name = "pic"]').on('click',function(){
		$('#des').html("Description:&nbsp"+$(this).attr('image-des'));
		$('#creat_date').html("Created At:&nbsp"+$(this).attr('image-date'));
		img_content.img_id = $(this).attr('image-id');
		img_content.img_des = $(this).attr('image-des');
		img_content.img_date = $(this).attr('image-date');
		img_content.img_name = $(this).find('img').attr('src');

		
		
		console.log(img_content.img_prev);
		//zoom effect
		$('[role = "image-dialog"]').attr('id',img_content.img_id);
		$('#img-zoomin').attr('src',img_content.img_name);

		
	});

	$(".img-modal").on('show.bs.modal', function (){
		$("<img/>").load(function(){
			if(this.width > $('#main-box').width()){
				this.width = $('#main-box').width();
				
			}
			// 
			$('.modal-size').css('max-width',this.width);    
  		}).attr("src", img_content.img_name);

		
	
	});

	$(".img-modal").on('shown.bs.modal', function (){
		$('#left-nav').css('line-height',$('#right-nav').height()+"px");
		$('#right-nav').css('line-height',$('#right-nav').height()+"px");
	
	});

	

	$('#left-nav').click(function(){
		$cur_id = $('[role = "image-dialog"]').attr("id");
		$cur_obj = $('#imgs_box').find("[image-id='"+$cur_id+"']");
		img_content.img_prev = $cur_obj.prev();
		if(img_content.img_prev){
				img_content.img_id = $cur_obj.prev().attr('image-id');
				
				$('[role = "image-dialog"]').attr('id',img_content.img_id);
				$img_src = $cur_obj.prev().find('img').attr('src');
				img_content.img_name = $img_src;
				$('#img-zoomin').attr('src',$img_src);

				
				$("<img/>").load(function(){
				if(this.width > $('#main-box').width()){
					this.width = $('#main-box').width();
					
				}
			// 
					$('.modal-size').css('max-width',this.width);    
  				}).attr("src", img_content.img_name);
  				$('#left-nav').css('line-height',$(this).height()+"px");
				$('#right-nav').css('line-height',$(this).height()+"px");
		}
	});
	$('#right-nav').click(function(){
		$cur_id = $('[role = "image-dialog"]').attr("id");
		$cur_obj = $('#imgs_box').find("[image-id='"+$cur_id+"']");
		img_content.img_next = $cur_obj.next();
		//console.log(img_content.img_next);
		if(img_content.img_next){
			img_content.img_id = $cur_obj.next().attr('image-id');
			$('[role = "image-dialog"]').attr('id',img_content.img_id);
			$img_src = $cur_obj.next().find('img').attr('src');
			$('#img-zoomin').attr('src',$img_src);
			img_content.img_name = $img_src;

			$("<img/>").load(function(){
				if(this.width > $('#main-box').width()){
					this.width = $('#main-box').width();
					
				}
			// 
				$('.modal-size').css('max-width',this.width);    
  			}).attr("src", img_content.img_name);
			$('#left-nav').css('line-height',$(this).height()+"px");
			$('#right-nav').css('line-height',$(this).height()+"px");
			
		}
	});

	$(".img-modal").on('hidden.bs.modal', function (event){
		$("[image-id ='"+img_content.img_id+"']").closest('figure').css('transform','translateY(0px)');
		event.stopImmediatePropagation();
	});
	
	function readURL(input) {
    if (input.files && input.files[0]) {
    	$('#preview_container').append('<div class= "col-md-2"><img id='+$index+' class = "img-rounded img-responsive" src="#" alt="your image"  style ="width:120px;height:120px"/></div>');

        var reader = new FileReader();
        reader.onload = function (e) {
            $('#'+$index).attr('src', e.target.result);
        }
        reader.readAsDataURL(input.files[0]);
    }
    else{
    	return false;
    }

}


$("#image_preview").collapse('hide')
$('.collapse').collapse()
// $('#upload').click(function(){
// 	$(this).submit();
// })

$("#fileUpload").on('click',function(){
	$("#image_preview").collapse('show')
	$("#addimg").click();
});
$("#addimg").change(function(){
	$index = $index+1;
    readURL(this);
});
$("#cancle_upload").on('click',function(){
	$('#preview_container').html('');
	$("#addimg").closest('form').trigger('reset');
	$("#image_preview").collapse('hide');
});
</script>	
@endsection