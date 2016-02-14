@extends('layouts.default')
@section('header')
<link href="{{asset('themes/blog/css/style.css')}}" rel="stylesheet" type="text/css"/>
<style>
	#contact{
    width: 100%;
    height:150px;
    background-color: #F9F9F7;
    position: absolute;
    bottom: 0;
}
</style>
@endsection
@section('body')

<div class = "extraspace-large"></div>
<script type="text/javascript">  
        function allowDrop(ev)  
        {  
            ev.preventDefault();  
        }  
  
        function drag(ev)  
        {  
            ev.dataTransfer.setData("Text",ev.target.id);  
        }  
  
        function drop(ev)  
        {  
            ev.preventDefault();  
            var data=ev.dataTransfer.getData("Text");  
            ev.target.appendChild(document.getElementById(data));  
        }  
</script>  

    <p>drag it</p>  
    <div id="div1" ondrop="drop(event)" ondragover="allowDrop(event)"></div>  
    <br />  
    <img id="drag1" width = "100px" height = "200px" src="{{asset('images/bg_album.png')}}" draggable="true" ondragstart="drag(event)" />  

<div class = "extraspace-large"></div>
</div>

@endsection