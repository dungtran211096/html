@extends('master')
@section('register')
    <section class="dang-nhap">
        <div class="container">
            <form action="" method="post">
                <h3>Đăng ký</h3>
                <div class="form-group">
                    <div class="form-group">
                        <label for="usr">Họ và Tên : </label>
                        <input type="text" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="usr">Email : </label>
                        <input type="text" class="form-control" >
                    </div>
                    <div class="form-group">
                        <label for="usr">Mật khẩu :</label>
                        <input type="password" class="form-control" >
                    </div>
                    <div class="form-group">
                        <label for="usr">Nhập lại mật khẩu : </label>
                        <input type="password" class="form-control" >
                    </div>
                    <button type="submit" class="btn btn-success btn-wide">Đăng ký</button>
                </div>
            </form>
        </div>

    </section>
@endsection