@extends('master')
@section('content')
    <section class="main">
        <div class="container">
            <h1 class="tieu-de">
                <a class="noidung">
                    Tin tức {{$cat->name}}
                </a>
            </h1>
            <div class="row">
                <div class="col-md-9">
                    <ul class="danh-sach">
                        @foreach($articles as $i)
                            <li class="bai-dang">
                                <h3 class="tieu-de-bai-dang">
                                    <a href="#">{{$i -> name}}</a>
                                </h3>
                                <div class="row">
                                    <div class="col-md-4 anh-dai-dien">
                                        <a href="#"><img src="{{asset($i->image)}}" alt="{{$i->image_name}}"></a>
                                    </div>
                                    <div class="col-md-8 noi-dung-bai-dang">
                                        {{$i ->excerpt}}
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="ngay-dang">{{$i->created_at}}</div>
                                    <ul class="tag">
                                        @foreach($i->categories as $cat)
                                            <li><a href="{{route('category', [$cat->slug])}}">{{$cat->name}}</a></li>
                                        @endforeach
                                    </ul>
                                    <a href="{{route('article',[$i->slug])}}" class="btn btn-wide btn-info xem-them">Xem
                                        thêm</a>
                                </div>
                            </li>
                        @endforeach


                    </ul>
                    @include('template.paginate',['rs' => $articles])
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
                                    <a href="#">Ký Thỏa thuận với công ty Quang Thang aegh aegioj aedglhr aegilh
                                        aedpgi</a>
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
                            {{--<iframe src="https://www.youtube.com/embed/XGSy3_Czz8k"></iframe>--}}
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