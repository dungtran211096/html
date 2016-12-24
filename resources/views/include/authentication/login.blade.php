@extends('master')
@section('login')
<section class="dang-nhap">
    <div class="container">
        <form action="" method="post">
            <h3>Đăng nhập</h3>
            <div class="form-group">
                <div class="form-group">
                    <label for="usr">Email : </label>
                    <input type="text" class="form-control" id="usr">
                </div>
                <div class="form-group">
                    <label for="usr">Mật khẩu :</label>
                    <input type="password" class="form-control" id="password">
                </div>
                <button type="submit" class="btn btn-success btn-wide">Đăng nhập</button>
            </div>
        </form>
    </div>

</section>
    @endsection