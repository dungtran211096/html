@extends('master')
@section('content')
    <section class="bang-xep-hang">
        <div class="container">
            <div class="row">
                <div class="col-md-3 well">
                    <a class="btn btn-info">Gửi hồ sơ đăng ký</a>
                    <ul class="danh-sach-truong ">
                        <li><a href="{{route($route)}}">Tất Cả</a></li>
                        @foreach($schools as $school )
                            <li><a href="{{route($route,[$school->slug])}}">{{$school->name}}</a></li>
                        @endforeach
                    </ul>
                </div>
                <div class="col-md-9 well">
                    <form class="tim-kiem" method="get" action="">
                        <input type="text" name="name" placeholder="Tên Sinh Viên">
                        <button class="btn btn-info"><span class="fa fa-search"></span></button>
                    </form>
                    <ul class="xep-hang">
                        @foreach($users as $u)
                            <li class="row">
                                <div class="col-md-4 anh-dai-dien">
                                    <a href="{{route('userInfo',[$u->id])}}"><img src="{{asset($u->avatar)}}"></a>
                                </div>
                                <div class="col-md-8">
                                    <ul class="thong-tin">
                                        <li class="row">
                                            <div class="col-md-4">
                                                <p>Họ tên:</p>
                                            </div>
                                            <div class="col-md-8">
                                                <p>{{$u->name}}</p>
                                            </div>
                                        </li>
                                        <li class="row">
                                            <div class="col-md-4">
                                                <p>Trường:</p>
                                            </div>
                                            <div class="col-md-8">
                                                <p>{{$u->school->name}}</p>
                                            </div>
                                        </li>
                                        <li class="row">
                                            <div class="col-md-4">
                                                <p>Mã Sinh Viên:</p>
                                            </div>
                                            <div class="col-md-8">
                                                <p>{{$u->msv}}</p>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </section>
@stop