@extends('master')

@section('title', $article->title? $article->title : $article->name)
@section('head')
    <!-- Go to www.addthis.com/dashboard to customize your tools -->
    <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-58670963ccee32d4"></script>
@stop
@section('content')
    <section class="main">
        <div class="container">
            <h1 class="tieu-de">
                <a class="noidung">
                    {{$article->name}}
                </a>
            </h1>
            <div class="row">
                <div class="col-md-9">
                    {!! $article->content !!}
                </div>
                <div class="col-md-3">
                    @include('include.sidebar')
                </div>
            </div>

        </div>
    </section>
@stop