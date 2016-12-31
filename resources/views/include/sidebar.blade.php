<ul class="ben-phai">
    {{--<li>--}}
    {{--<h3 class="tieu-de-phai">Sự kiện</h3>--}}
    {{--<ul class="su-kien">--}}
    {{--<li>--}}
    {{--<a href="#">Ký Thỏa thuận với công ty Quang Thang aegh aegioj aedglhr aegilh--}}
    {{--aedpgi</a>--}}
    {{--</li>--}}
    {{--<li>--}}
    {{--<a href="#">Ký Thỏa thuận với công ty Quang Thang</a>--}}
    {{--</li>--}}
    {{--<li>--}}
    {{--<a href="#">Ký Thỏa thuận với công ty Quang Thang</a>--}}
    {{--</li>--}}
    {{--</ul>--}}
    {{--</li>--}}
    <li>
        <h3 class="tieu-de-phai">Video clips</h3>
        <iframe src="{{getOption('video')}}"></iframe>
    </li>
    <li>
        <h3 class="tieu-de-phai">Đối tác</h3>
        @foreach(getOption('partner') as $partner)
            <img src="{{asset($partner)}}" alt="fpt">
        @endforeach
    </li>
</ul>