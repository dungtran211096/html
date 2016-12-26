@extends('master')
@section('content')
<section class="main">
    <div class="container">
        <h1 class="tieu-de">
            <a class="noidung">
                Tin tức trường Đại học công nghệ
            </a>
        </h1>
        <div class="row">
            <div class="col-md-9">
                <ul class="danh-sach">
                    @foreach($articles as $i)
                    <li class="bai-dang">
                        <h3 class="tieu-de-bai-dang">
                            <a href="#">{{$i -> title}}</a>
                        </h3>
                        <div class="row">
                            <div class="col-md-4 anh-dai-dien">
                                <a href="#"><img src="{{$i->image}}" alt="{{$i->image_name}}"></a>
                            </div>
                            <div class="col-md-8 noi-dung-bai-dang">
                                {{$i ->description}}
                            </div>
                        </div>
                        <div class="row">
                            <div class="ngay-dang">{{$i->created_at}}</div>
                            <ul class="tag">
                                <li><a href="#">Hop tac</a></li>
                                <li><a href="#">Sinh vien</a></li>
                                <li><a href="#">Thông tin việc làn</a></li>
                            </ul>
                            <a href="#" class="btn btn-wide btn-info xem-them">Xem thêm</a>
                        </div>
                    </li>
                        @endforeach


                </ul>
                <div class="chuyen-trang row">
                    <a href="#" class="btn btn-default btn-wide trang-truoc">Trang trước</a>
                    <a href="#" class="btn btn-default btn-wide trang-sau">Trang sau</a>
                </div>
            </div>
            <div class="col-md-3">
                <ul class="ben-phai">
                    <li>
                        <img src="./img/namtot.png" alt="namtot">
                        <a href="#" class="btn btn-wide btn-info">Gửi hồ sơ đăng kí</a>
                    </li>
                    <li>
                        <h3 class="tieu-de-phai">Sự kiện</h3>
                        <ul class="su-kien">
                            <li>
                                <a href="#">Ký Thỏa thuận với công ty Quang Thang aegh aegioj aedglhr aegilh aedpgi</a>
                            </li>
                            <li>
                                <a href="#">Ký Thỏa thuận với công ty Quang Thang</a>
                            </li>
                            <li>
                                <a href="#">Ký Thỏa thuận với công ty Quang Thang</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <h3 class="tieu-de-phai">Video clips</h3>
                        <iframe src="https://www.youtube.com/embed/XGSy3_Czz8k"></iframe>
                    </li>
                    <li>
                        <h3 class="tieu-de-phai">Đối tác</h3>
                        <img src="./img/LogoFPT2.jpg" alt="fpt">
                        <img src="./img/LogoFPT2.jpg" alt="fpt">
                        <img src="./img/LogoFPT2.jpg" alt="fpt">
                    </li>
                </ul>
            </div>
        </div>
    </div>
</section>
    @endsection