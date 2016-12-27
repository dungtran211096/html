@extends('master')
@section('content')
    <section class="main">
        <div class="container">
            <h1 class="tieu-de">
                <a class="noidung">
                    Câu Hỏi Thường Gặp
                </a>
            </h1>
            <div class="row">
                <div class="col-md-9">
                    <ul class="danh-sach">
                        @foreach($questions as $i)
                            @include('include.article')
                        @endforeach
                    </ul>
                    @include('template.paginate',['rs' => $questions])
                    <form action="{{route('question')}}" method="post">
                        <h1 class="tieu-de">
                            <a class="noidung block">Gửi Câu Hỏi Cho Chúng Tôi</a>
                        </h1>
                        <input type="text" name="info" placeholder="Thông tin của bạn" class="form-control">
                        <textarea class="form-control top15" name="content" rows="5"></textarea>
                        <button class="btn btn-primary right top15">Gửi Câu Hỏi</button>
                    </form>
                </div>
                <div class="col-md-3">
                    @include('include.sidebar')
                </div>
            </div>
        </div>
    </section>
@endsection