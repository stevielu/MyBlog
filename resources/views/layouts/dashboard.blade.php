@extends('layouts.default')
@section('header')
<title>{{$album->name}}</title>
<link href="{{asset('themes/blog/css/style.css')}}" rel="stylesheet" type="text/css"/>
<link href="{{asset('css/upload.css')}}" rel="stylesheet" type="text/css"/>
<script type="text/javascript" src="{{asset('js/core.js')}}"></script>
<script type="text/javascript" src="{{asset('js/upload.js')}}"></script>

<style>
	

</style>
@endsection
@section('body')
<div class="container-fluid" >
	<div class = 'row'>
	<div class = 'col-md-3' style = "min-height:600px;background-color: #282b34;">
		
	</div>
	<div class = 'col-md-9' id = 'main-box' style="min-height:600px; background-color: rgba(238, 238, 238,1);">
		
		
		
	</div>   
</div>		

	  	
	  


<script>
</script>	
@endsection