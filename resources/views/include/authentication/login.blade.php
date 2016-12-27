@extends('master')
@section('login')
<section class="dang-nhap">
    <div class="container">
        <form action="{{route('login')}}" method="post">
            <h3>Đăng nhập</h3>
            <div class="form-group">
                <div class="form-group">
                    <label for="usr">Username : </label>
                    <input type="text" name="username" class="form-control" id="username">
                </div>
                <div class="form-group">
                    <label for="usr">Mật khẩu :</label>
                    <input type="password" name="password" class="form-control" id="password">
                </div>
                <button type="submit" class="btn btn-success btn-wide">Đăng nhập</button>
            </div>
        </form>
    </div>

</section>
    @endsection