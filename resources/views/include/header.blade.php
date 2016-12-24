<header>

    <nav class="navbar navbar-inverse navbar-embossed navbar-fixed-top" role="navigation">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-collapse-01">
                <span class="sr-only">Toggle navitation</span>
            </button>
            <a href="#" class="navbar-brand"><img src="{{asset('./htmlcss/img/minion.jpg')}}" alt="logo"></a>
        </div>
        <div class="collapse navbar-collapse" id="navbar-collapse-01">
            <ul class="nav navbar-nav menu">
                <li><a href="#">Giới thiệu</a></li>
                <li class="dropdown">
                    <a href="chitiet.html" class="dropdown-toggle" data-toggle="dropdown">Tin tức
                        <b class="caret"></b>
                    </a>
                    <ul class="dropdown-menu">
                        <li><a href="{{route('category', 'uet')}}">Đại học công nghệ</a></li>
                        <li><a href="{{route('category','ulis')}}">Đại học ngoại ngữ</a></li>
                        <li><a href="{{route('category','chitiet')}}">Đại học XHNV</a></li>
                        <li><a href="{{route('category','chitiet')}}">Đại học KHTN</a></li>
                        <li><a href="{{route('category','chitiet')}}">Đại học Việt Nhật</a></li>
                        <li><a href="{{route('category','chitiet')}}">Đại học Giáo dục</a></li>
                        <li><a href="{{route('category','chitiet')}}">Đại học kinh tế</a></li>
                        <li><a href="{{route('category','chitiet')}}">Khoa Y dược</a></li>
                        <li><a href="{{route('category','chitiet')}}">Khoa luật</a></li>
                        <li><a href="{{route('category','chitiet')}}">Khoa quốc tế</a></li>
                    </ul>
                </li>
                <li><a href="#">Gương mặt tiêu biểu</a></li>
                <li><a href="#">Gửi hồ sơ đăng kí</a></li>
            </ul>
            <div class="navbar-right chua-dang-nhap">
                <button class="btn btn-success">Đăng nhập</button>
                <button class="btn btn-danger">Đăng kí</button>
            </div>
            <div class="navbar-right hidden">
                <ul class="dang-nhap">
                    <li><a href="">Quang Thắng</a></li>
                    <li><a href="">Đăng xuất</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="banner">
        <ul id="slide">
            <li><a href="#"><img src="{{asset('./htmlcss/img/minion.jpg')}}" alt="slide"></a></li>
            <li><a href="#"><img src="{{asset('./htmlcss/img/minion.jpg')}}" alt="slide"></a></li>
            <li><a href="#"><img src="{{asset('./htmlcss/img/minion.jpg')}}" alt="slide"></a></li>
            <li><a href="#"><img src="{{asset('./htmlcss/img/minion.jpg')}}" alt="slide"></a></li>
        </ul>
        <div class="gui-ho-so">
            <button type="button" class="btn btn-wide btn-info">Gửi hồ sơ đăng kí</button>
        </div>
    </div>
</header>
