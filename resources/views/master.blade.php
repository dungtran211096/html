<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>@yield('title')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Loading Bootstrap -->
    <link href="{{asset('htmlcss/css/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">

    <!-- Loading Flat UI -->
    <link href="{{asset('htmlcss/css/flat-ui.min.css')}}" rel="stylesheet">

    <link rel="shortcut icon" href="{{asset('htmlcss/img/favicon.ico')}}">


    <!--    BxSlider-->
    <link rel="stylesheet" href="{{asset('htmlcss/js/bxslider/jquery.bxslider.css')}}">
    <!--    End BxSlider-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{asset('htmlcss/css/thang.css')}}">
    <link rel="stylesheet" href="{{asset('htmlcss/css/main.css')}}">

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
                <li><a href="#">Gửi hồ sơ đăng kí</a></li>
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
                        <li><a href="">{{$user->name}}</a></li>
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
            <button type="button" class="btn btn-wide btn-info">Gửi hồ sơ đăng kí</button>
        </div>
    </div>
</header>
@section('content')
@show
<footer>
    <div class="container">
        <div class="huong-dan-gui-ho-so">
            <h3>Hướng dẫn gửi hồ sơ</h3>
            <ul class="row cac-buoc">
                <li class="col-md-3"><p>Bước 1</p> <span class="fa fa-edit"></span></li>
                <li class="col-md-3"><p>Bước 2</p> <span class="fa fa-tv"></span></li>
                <li class="col-md-3"><p>Bước 3</p> <span class="fa fa-upload"></span></li>
                <li class="col-md-3"><p>Hoàn thành</p> <span class="fa fa-check"></span></li>
            </ul>
            <button type="button" class="btn btn-wide btn-info">Gửi hồ sơ đăng kí</button>
        </div>
    </div>
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
            <div class="row">
                <div class="col-md-4">
                    <div class="logo-truong">
                        <img src="{{asset('./htmlcss/img/minion.jpg')}}" alt="logo">
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="thong-tin-truong">
                        <p>Đoàn TNCS Hà Nội - Hội sinh viên Việt Nam Trường Đại học Công Nghệ</p>
                        <p>Địa chỉ: Nhà G3-Trường Đại học Công Nghệ 144 Xuân Thủy Cầu Giấy Hà Nội</p>
                        <p>Điện thoại : 0989999999</p>
                        <p>Email : uet.vnu@vnu.edu.vn</p>
                    </div>
                </div>
            </div>
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
</body>
</html>