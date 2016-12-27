@extends('master')
@section('login')
<section class="dang-nhap">
    <div class="container">
        <form action="{{route('login')}}" method="post">
            <h3>Đăng nhập</h3>
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
            <div class="form-group">
                <div class="form-group">
                    <label for="email">Email : </label>
                    <input type="text" name="email" class="form-control" id="usr">
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