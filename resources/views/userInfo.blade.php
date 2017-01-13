@extends('master')
@section('title', $u->name)
@section('content')
    <section class="thong-tin-ca-nhan">
        <?php $user = $u ?>
        <div class="container well">
            <h2>Thông tin {{$user->name}}</h2>
            @if(session('error'))
                <a href="" class="btn btn-block btn-lg btn-danger">Sai Mật Khẩu</a>
            @endif
            <form method="post">
                {{csrf_field()}}
                <div class="group">
                    <p>Thông tin cơ bản</p>
                    <ul role="menu" class="menu">
                        <li>
                            <div class="row">
                                <div class="col-md-6">Họ tên</div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        {{$user->name}}
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="row">
                                <div class="col-md-6">Mã sinh viên</div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        {{$user->msv}}
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="row">
                                <div class="col-md-6">Ngày sinh</div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        {{$user->birthday}}
                                    </div>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
                @foreach($questions as $key => $name)
                    <div class="group">
                        <p>{{$name}} Tốt</p>
                        <ul role="menu" class="menu">
                            @foreach(getOption($key) as $id => $question)
                                <li>
                                    <div class="row">
                                        <div class="col-md-6">{{$question}}</div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                {{$user->data1[$key][$id]}}
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                @endforeach
            </form>

        </div>
    </section>
    <?php $user = isLogin() ?>
@stop