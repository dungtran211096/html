<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>@yield('title')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Loading Bootstrap -->
    <link href="{{asset('htmlcss/css/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">

    <!-- Loading Flat UI -->
    <link href="{{asset('htmlcss/css/vendor/bootstrap/css/flat-ui.min.css')}}" rel="stylesheet">

    <link rel="shortcut icon" href="{{asset('htmlcss/img/favicon.ico')}}">


    <!--    BxSlider-->
    <link rel="stylesheet" href="{{asset('htmlcss/js/bxslider/jquery.bxslider.css')}}">
    <!--    End BxSlider-->
    <link rel="stylesheet" href="{{asset('htmlcss/css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('htmlcss/css/thang.css')}}">

</head>
<body>
@include('include.header')
@section('content')
@show
@section('login')
    @show
@section('register')
    @show
@include('include.footer')
<!-- jQuery (necessary for Flat UI's JavaScript plugins) -->
<script src="{{asset('htmlcss/js/vendor/jquery.min.js')}}"></script>
<script src="{{asset('htmlcss/js/bxslider/jquery.bxslider.min.js')}}"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="{{asset('htmlcss/js/vendor/video.js')}}"></script>
<script src="{{asset('htmlcss/js/flat-ui.min.js')}}"></script>
<script src="{{asset('htmlcss/js/thang.js')}}"></script>
</body>
</html>