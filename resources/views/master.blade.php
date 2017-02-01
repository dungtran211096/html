<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>@yield('title')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Loading Bootstrap -->
    <link href="{{asset('htmlcss/css/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">

    <!-- Loading Flat UI -->
    {{--    <link href="{{asset('htmlcss/css/flat-ui.min.css')}}" rel="stylesheet">--}}

    <link rel="shortcut icon" href="{{asset('htmlcss/img/favicon.ico')}}">


    <!--    BxSlider-->
    <link rel="stylesheet" href="{{asset('htmlcss/js/bxslider/jquery.bxslider.css')}}">
    <!--    End BxSlider-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{asset('htmlcss/css/thang.css')}}">
    <link rel="stylesheet" href="{{asset('htmlcss/css/main.css')}}">

    @section('head')@show
</head>
<body>
<header>
    <nav class="navbar navbar-inverse navbar-embossed navbar-fixed-top" role="navigation">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-collapse-01">
                <span class="sr-only">Toggle navitation</span>
            </button>
            <a href="{{route('home')}}" class="navbar-brand"><img src="{{asset(getOption('logo'))}}" alt="logo"></a>
        </div>
        <div class="collapse navbar-collapse" id="navbar-collapse-01">
            <ul class="nav navbar-nav menu">
                <li><a href="{{route('gioiThieu')}}">Giới thiệu</a></li>
                <li class="dropdown">
                    <a href="chitiet.html" class="dropdown-toggle" data-toggle="dropdown">Tin tức
                        <b class="caret"></b>
                    </a>
                    <ul class="dropdown-menu">
                        @foreach($categories as $i)
                            <li><a href="{{route('category', $i->slug)}}">{{$i-> name}}</a></li>
                        @endforeach
                    </ul>
                </li>
                <li><a href="{{route('guongMatTieuBieu')}}">Gương mặt tiêu biểu</a></li>
                <li><a href="{{route('bangXepHang')}}">Bảng Xếp Hạng</a></li>
                <li><a href="{{route('question')}}">Hướng Dẫn</a></li>
            </ul>
            @if(!$user)
                <div class="navbar-right chua-dang-nhap">
                    <a href="{{route('login')}}" class="btn btn-success">Đăng nhập</a>
                    <a href="{{route('register')}}" class="btn btn-danger">Đăng kí</a>
                </div>
            @else
                <div class="navbar-right">
                    <ul class="dang-nhap">
                        <li><a href="{{route('thongTinCaNhan')}}">{{$user->name}}</a></li>
                        <li><a href="{{route('logout')}}">Đăng xuất</a></li>
                    </ul>
                </div>
            @endif
        </div>
    </nav>
    <div class="banner">
        <ul id="slide">
            @foreach(getOption('banner') as $banner)
                <li><a href="#"><img src="{{asset($banner)}}" alt="slide"></a></li>
            @endforeach
        </ul>
        <div class="gui-ho-so">
            <a href="{{route('thongTinCaNhan')}}" class="btn btn-wide btn-info">Gửi hồ sơ đăng kí</a>
        </div>
    </div>
</header>
@section('content')
    <section class="container main-news">
        <h2>Tin Tức</h2>
        <?php
        $articles = \App\Article::active()->orderDate()->paginate(5);
        ?>
        <div class="row">
            @foreach($articles as $i)
                @if($i == $articles[0])
                    <div class="col-md-6">
                        <article>
                            <img src="{{url($i->image)}}">
                            <h4>{{\Illuminate\Support\Str::words($i->name,10)}}</h4>
                            <p>
                                {{\Illuminate\Support\Str::words($i->excerpt, 20)}}
                            </p>
                        </article>
                    </div>
                @else
                    <div class="col-md-3">
                        <article>
                            <img src="{{url($i->image)}}">
                            <h4>{{\Illuminate\Support\Str::words($i->name,7)}}</h4>
                        </article>
                    </div>
                @endif
            @endforeach
        </div>
    </section>
    <section class="main-bxh">
        <div class="container">
            <h2>Sinh Viên Tiêu Biểu</h2>
            <div class="row">
                <?php
                $a = \App\User::active()->toter()->paginate(8);
                ?>
                @foreach($a as $v)
                    <div class="col-md-3">
                        <img src="{{url($v->avatar)}}">
                        <h4>{{$v->name}}</h4>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@show
<footer>
    {{--<div class="container">--}}
    {{--<div class="huong-dan-gui-ho-so">--}}
    {{--<h3>Hướng dẫn gửi hồ sơ</h3>--}}
    {{--<ul class="row cac-buoc">--}}
    {{--<li class="col-md-3"><p>Bước 1</p> <span class="fa fa-edit"></span></li>--}}
    {{--<li class="col-md-3"><p>Bước 2</p> <span class="fa fa-tv"></span></li>--}}
    {{--<li class="col-md-3"><p>Bước 3</p> <span class="fa fa-upload"></span></li>--}}
    {{--<li class="col-md-3"><p>Hoàn thành</p> <span class="fa fa-check"></span></li>--}}
    {{--</ul>--}}
    {{--<a href="{{route('thongTinCaNhan')}}" class="btn btn-wide btn-info right">Gửi hồ sơ đăng kí</a>--}}
    {{--</div>--}}
    {{--</div>--}}
    <div class="cong-ty-lien-ket">
        <div class="container">
            <ul>
                @foreach(getOption('partner') as $partner)
                    <li><a href="#" rel="nofollow"><img src="{{asset($partner)}}"></a></li>
                @endforeach
            </ul>
        </div>
    </div>
    <div class="lien-he">
        <div class="container">
            <p>Copyright © 2016, UET - All Rights Reserved</p>
            <ul>
                <li><a href="#"><span class="fa fa-facebook-f"></span></a></li>
                <li><a href="#"><span class="fa fa-google-plus"></span></a></li>
                <li><a href="#"><span class="fa fa-twitter"></span></a></li>
                <li><a href="#"><span class="fa fa-youtube"></span></a></li>
                <li><a href="#"><span class="fa fa-pinterest-p"></span></a></li>
            </ul>
        </div>
    </div>
</footer>

<!-- jQuery (necessary for Flat UI's JavaScript plugins) -->
<script src="{{asset('htmlcss/js/vendor/jquery.min.js')}}"></script>
<script src="{{asset('htmlcss/js/bxslider/jquery.bxslider.min.js')}}"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="{{asset('htmlcss/js/vendor/video.js')}}"></script>
<script src="{{asset('htmlcss/js/flat-ui.min.js')}}"></script>
<script src="{{asset('htmlcss/js/thang.js')}}"></script>
@section('foot')@show
</body>
</html>