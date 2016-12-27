@extends('master')
@section('content')
<section class="bang-xep-hang">
    <div class="container">
        <div class="row">
            <div class="col-md-3 well">
                <a class="btn btn-info">Gửi hồ sơ đăng ký</a>
                <ul class="danh-sach-truong ">
                    <li><a href="">Đại học Công Nghệ</a></li>
                    <li><a href="">Đại học Công Nghệ</a></li>
                    <li><a href="">Đại học Công Nghệ</a></li>
                </ul>
            </div>
            <div class="col-md-9 well">
                <div class="tim-kiem">
                    <select name="" id="">
                        <option value="Sinhvien">Sinh viên</option>
                        <option value="quangthang">Quang Thắng</option>
                    </select>
                    <input type="text" name="" placeholder="Tìm kiếm">
                    <button class="btn btn-info"><span class="fa fa-search"></span></button>
                </div>
                <ul class="xep-hang">
                    <li class="row">
                        <div class="col-md-4 anh-dai-dien">
                            <img src="{{asset('htmlcss/img/minion.jpg')}}" alt="">
                        </div>
                        <div class="col-md-8">
                            <ul class="thong-tin">
                                <li class="row">
                                    <div class="col-md-4">
                                        <p>Họ tên:</p>
                                    </div>
                                    <div class="col-md-8">
                                        <p>Nguyễn Sỹ Quang Thắng</p>
                                    </div>
                                </li>
                                <li class="row">
                                    <div class="col-md-4">
                                        <p>Trường:</p>
                                    </div>
                                    <div class="col-md-8">
                                        <p>Đại học công nghệ</p>
                                    </div>
                                </li>
                                <li class="row">
                                    <div class="col-md-4">
                                        <p>Khoa</p>
                                    </div>
                                    <div class="col-md-8">
                                        <p>Công nghệ thông tin</p>
                                    </div>
                                </li>
                                <li class="row">
                                    <div class="col-md-4">
                                        <p>Điểm tổng</p>
                                    </div>
                                    <div class="col-md-8">
                                        <p>4.0</p>
                                    </div>
                                </li>
                                <li class="row">
                                    <div class="col-md-4">
                                        <p>Thành tích nổi trội</p>
                                    </div>
                                    <div class="col-md-8">
                                        <p>Đẹp trai vl</p>
                                        <p>Nghèo</p>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</section>
    @stop