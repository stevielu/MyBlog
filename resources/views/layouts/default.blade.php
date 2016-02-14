<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title>blog</title>
    <link rel="stylesheet" href="{{asset('fonts/font-awesome/css/font-awesome.min.css')}}"/>
    <link rel="stylesheet" href="{{asset('css/bootstrap.css')}}" type="text/css"/>
    <link rel="stylesheet" href="{{asset('css/fileinput.min.css')}}" type="text/css"/>
     <!-- Compiled and minified CSS -->
    

  <!-- Compiled and minified JavaScript -->
  
    <!-- <link rel="stylesheet" href="{{asset('css/material-fullpalette.min.css')}}" type="text/css"/>
    <link rel="stylesheet" href="{{asset('css/material.min.css')}}" type="text/css"/>
    <link rel="stylesheet" href="{{asset('css/ripples.min.css')}}" type="text/css"/>
    <link rel="stylesheet" href="{{asset('css/roboto.min.css')}}" type="text/css"/> -->

    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="blog">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <meta name="author" content="stevie">
    <script type="text/javascript" src="{{asset('js/jquery-1.11.3.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/bootstrap.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/ripples.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/material.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/jquery.cropit.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/fileinput.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/canvas-to-blob.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/angular/angular.js')}}"></script>
    @yield('header')
</head>
<body>
    <div style = "min-height: 100%;">
        <div style ="padding-bottom:150px; overflow:auto;">
        @include('layouts.scrolling_nav')
        @yield('body')
        </div>
    </div>
    @include('layouts.footer')
</body>
</html>