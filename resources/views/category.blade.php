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
                            @include('include.article')
                        @endforeach
                    </ul>
                    @include('template.paginate',['rs' => $articles])
                </div>
                <div class="col-md-3">
                    @include('include.sidebar')
                </div>
            </div>

        </div>
    </section>
@endsection