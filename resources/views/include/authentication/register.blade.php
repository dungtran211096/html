@extends('master')
@section('register')
    <section class="dang-nhap">
        <div class="container">
            <form action="{{route('register')}}" method="post">
                <h3>Đăng ký</h3>
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    @if (count($errors) > 0)
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    @if($var == true)
                    <div class="alert alert-success">
                        Đăng ký thành công. Vui lòng đăng nhập để sử dụng tiếp !
                    </div>
                        @endif
                    <div class="form-group">
                        <label for="usr">Họ và Tên : </label>
                        <input type="text" name="name" class="form-control">
                    </div>
                <div class="form-group">
                    <label for="usr">Username : </label>
                    <input type="text" name="username" class="form-control">
                </div>
                    <div class="form-group">
                        <label for="email">Email : </label>
                        <input type="text" name="email" class="form-control" >
                    </div>
                    <div class="form-group">
                        <label for="password">Mật khẩu :</label>
                        <input type="password" name="password" class="form-control" >
                    </div>
                    <div class="form-group">
                        <label for="password_confirmation">Nhập lại mật khẩu : </label>
                        <input type="password" name="password_confirmation" class="form-control" >
                    </div>
                    <button type="submit" class="btn btn-success btn-wide">Đăng ký</button>
            </form>

        </div>

    </section>
@endsection