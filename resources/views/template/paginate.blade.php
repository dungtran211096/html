<?php
$next = $rs->nextPageUrl();
$prev = $rs->previousPageUrl()
?>
<div class="chuyen-trang row">
    <a href="{{$prev}}" class="btn btn-default btn-wide trang-truoc @if(!$prev) hidden @endif">Trang trước</a>
    <a href="{{$next}}" class="btn btn-default btn-wide trang-sau @if(!$next) hidden @endif">Trang sau</a>
</div>