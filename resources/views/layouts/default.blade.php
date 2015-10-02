<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title>blog</title>
    <link rel="stylesheet" href="{{asset('fonts/font-awesome/css/font-awesome.min.css')}}"/>
    <link rel="stylesheet" href="{{asset('css/bootstrap.css')}}" type="text/css"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="blog">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <meta name="author" content="stevie">
    <script type="text/javascript" src="{{asset('js/jquery-1.11.3.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/bootstrap.min.js')}}"></script>
    @yield('header')
</head>
<body >
<header>
    @include('layouts.scrolling_nav')
</header>
    @yield('body')
<footer>
    @include('.layouts.footer')
</footer>



</body>
</html>