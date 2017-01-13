<ul class="ben-phai">
    <li>
        <h3 class="tieu-de-phai">Video clips</h3>
        <iframe src="{{getYoutube(getOption('video'))}}" frameborder="0"></iframe>
    </li>
    <li>
        <h3 class="tieu-de-phai">Đối tác</h3>
        @foreach(getOption('partner') as $partner)
            <img src="{{asset($partner)}}" alt="fpt">
        @endforeach
    </li>
</ul>