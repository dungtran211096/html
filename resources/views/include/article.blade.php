<?php
$a = isset($is_question) ? 'question-detail' : 'article';
?>
<li class="bai-dang">
    <h3 class="tieu-de-bai-dang">
        <a href="#">{{$i -> name}}</a>
    </h3>
    <div class="row">
        <div class="col-md-4 anh-dai-dien">
            <a href="{{route($a,[$i->slug])}}">
                <img src="{{asset($i->image)}}" alt="{{$i->image_name}}">
            </a>
        </div>
        <div class="col-md-8 noi-dung-bai-dang">
            {{$i ->excerpt}}
        </div>
    </div>
    <div class="row">
        <div class="ngay-dang">{{$i->created_at}}</div>
        @if(isset($is_question))
            <ul class="tag">
                @foreach($i->categories as $cat)
                    <li><a href="{{route('category', [$cat->slug])}}">{{$cat->name}}</a></li>
                @endforeach
            </ul>
        @endif
        <a href="{{route($a,[$i->slug])}}" class="btn btn-wide btn-info xem-them">Xem
            thêm</a>
    </div>
</li>