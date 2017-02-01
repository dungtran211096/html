@extends('master')
@section('content')
    <section class="gioi-thieu">
        <div class="container">
            <img src="{{asset('htmlcss/img/minion.jpg')}}"/>
            <ul class="row list">
                <li class="col-md-4 ">
                    <i class="fa fa-clock-o fa-2x"></i>
                    <p>Thông tin sinh viên tiêu biểu</p>
                </li>
                <li class="col-md-4 ">
                    <i class="fa fa-external-link fa-2x"></i>
                    <p>Xét chọn sinh viên năm tốt dễ dàng</p>
                </li>
                <li class="col-md-4 ">
                    <i class="fa fa-line-chart fa-2x"></i>
                    <p>Quảng bá rộng dãi</p>
                </li>
                <li class="col-md-4">
                    <i class="fa fa-pencil-square-o fa-2x"></i>
                    <p>Tạo đăng ký hồ sơ sinh viên 5 tốt</p>
                </li>
                <li class="col-md-4">
                    <i class="fa fa-child fa-2x"></i>
                    <p>Nâng cao chất lượng sinh viên</p>
                </li>
                <li class="col-md-4">
                    <i class="fa fa-cubes fa-2x"></i>
                    <p>Xây dựng hình ảnh sinh viên ĐHQG</p>
                </li>
            </ul>
        </div>

        <div class="container">
            <ul class="row stats">
                <li class="col-md-3">
                    <p><i class="fa fa-users fa-2x"></i>7</p>
                    <p>Trường thành viên</p>
                </li>
                <li class="col-md-3">
                    <p><i class="fa fa-universal-access fa-2x"></i> 1632</p>
                    <p>Sinh viên 5 tốt cấp cơ sở</p>
                </li>
                <li class="col-md-3">
                    <p><i class="fa fa-user-circle-o fa-2x"></i> 312</p>
                    <p>Sinh viên 5 tốt cấp ĐHQG</p>
                </li>
                <li class="col-md-3">
                    <p><i class="fa fa-bullseye fa-2x"></i> 72</p>
                    <p>Sinh viên 5 tốt cấp Trung ương</p>
                </li>
            </ul>
        </div>
    </section>
@stop
