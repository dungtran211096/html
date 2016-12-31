@extends('master')
@section('content')
    <section class="thong-tin-ca-nhan">
        <div class="container well">
            <h2>Thông tin cá nhân</h2>
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
                                        <input name="name" type="text" class="form-control" value="{{$user->name}}">
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="row">
                                <div class="col-md-6">Mã sinh viên</div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input name="msv" type="text" class="form-control" value="{{$user->msv}}">
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="row">
                                <div class="col-md-6">Ngày sinh</div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input name="birthday" type="text" class="form-control"
                                               value="{{$user->birthday}}">
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
                                                <input name="data[{{$key}}][{{$id}}]" type="text" class="form-control"
                                                       value="{{$user->data1[$key][$id]}}">
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                @endforeach
                <div class="group">
                    <p>Mật Khẩu</p>
                    <ul role="menu" class="menu">
                        <li>
                            <div class="row">
                                <div class="col-md-6">Mật Khẩu Cũ</div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input name="password" type="password" class="form-control"
                                               placeholder="Bắt buộc nhập để xác thực">
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="row">
                                <div class="col-md-6">Mật Khẩu Mới</div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input name="newPassword" type="password" class="form-control"
                                               placeholder="Để trông nếu không đổi">
                                    </div>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
                <div class="row">
                    <div class="col-md-2 col-md-offset-10">
                        <button class="btn btn-block btn-sm btn-info">Gửi</button>
                    </div>
                </div>
            </form>

        </div>
    </section>
@stop