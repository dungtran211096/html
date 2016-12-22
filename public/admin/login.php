<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Vinasem | Login</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="css/login.css">
    <script src="js/jquery-2.2.3.min.js"></script>
</head>
<body>
<section>
    <div id="login" class="col-md-4 col-md-offset-4">
        <img id="logo" src="images/logo.png" alt="logo">
        <img src="images/vinasem.png" alt="vinasem">

        <form id="loginForm">
            <div class="row">
                <div class="col-md-3">
                    <div class="fa fa-lock"></div>
                </div>
                <div class="col-md-9">
                    <div class="input">
                        <label for="username">Tài Khoản</label>
                        <input class="d-input" type="text" id="username">
                    </div>
                    <div class="input">
                        <label for="password">Mật Khẩu</label>
                        <input class="d-input" type="password" id="password">
                    </div>

                </div>
            </div>
            <div class="text-right">
                <div class="forgot-pass" id="error" style="display: none;">
                    <span class="fa fa-lock"></span>
                    Mật khẩu không đúng
                    <a href="#">>> Quên mật khẩu</a>
                </div>
                <button class="d-btn d-success">Đăng Nhập</button>
            </div>
        </form>
    </div>
</section>
<script src="js/bootstrap.min.js"></script>
<script src="js/config.js"></script>
<script>
    localStorage.removeItem('auth_token');
    localStorage.removeItem('currentUser');
    var url = API_URL + 'login';
    var login = $('#login');
    login.css('margin-top', (screen.height - login.height()) / 2 - 80);

    var loginForm = $('#loginForm');
    loginForm.submit(function (e) {
        e.preventDefault();
        var username = $('#username').val();
        var password = $('#password').val();
        $.ajax({
            dataType: 'json',
            data: {
                username: username,
                password: password
            },
            method: 'post',
            url: url,
            success: function (rs) {
                localStorage.setItem('auth_token', rs.token);
                localStorage.setItem('currentUser', JSON.stringify(rs.user));
                window.location = './';
            },
            error: function (rs) {
                $('#error').show();
            }
        });
    });
</script>
</body>
</html>