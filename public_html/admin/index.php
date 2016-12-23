<!DOCTYPE html>
<html lang="vi" ng-app="vinasem" ng-controller="Ctr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <base href="/admin/">
    <title>{{title || 'Admin'}}</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <!-- bower:css -->
    <link rel="stylesheet" href="bower_components/angular-loading-bar/build/loading-bar.css"/>
    <link rel="stylesheet" href="bower_components/ngToast/dist/ngToast.css"/>
    <!-- endbower -->
    <link rel="stylesheet" href="css/main.css">
</head>
<body>
<toast></toast>
<aside ng-class="asideClass">
    <div class="logo">
        <a href="#"><img src="images/logo.png" alt="logo"></a>
    </div>
    <div class="admin-info">
        <div class="avatar">
            <img ng-src="{{currentUser.avatar}}" alt="avatar">
        </div>
        <div class="info">
            <span>Xin Chào:</span> <strong>{{currentUser.username}}</strong>
            <br>
            {{currentUser.email}}
        </div>
    </div>
    <ul id="menu">
        <li class="has-child" ng-class="{expanded:$state.includes('config')}">
            <a ng-click="expand($event)" ng-class="{active:$state.includes('config')}">
                <span class="fa fa-cogs"></span> Cấu Hình
            </a>
            <ul>
                <li ui-sref-active="active" ui-sref="config.general">
                    <a>
                        <span class="fa fa-cog"></span> Cài Đặt Chung
                    </a>
                </li>
                <li ui-sref-active="active" ui-sref="config.userInfo">
                    <a>
                        <span class="fa fa-user"></span> Thông Tin Sinh Viên
                    </a>
                </li>
            </ul>
        </li>
        <li>
            <a ui-sref="filemanager" ui-sref-active="active">
                <span class="fa fa-files-o"></span> Quản Lý Files
            </a>
        </li>
        <li>
            <a ui-sref="users.list" ui-sref-active="active">
                <span class="fa fa-users"></span> Thành Viên
            </a>
        </li>
        <li class="has-child" ng-class="{expanded:$state.includes('articles')}">
            <a ng-click="expand($event)" ng-class="{active:$state.includes('articles')}">
                <span class="fa fa-newspaper-o"></span> Tin Tức
            </a>
            <ul>
                <li ui-sref-active="active" ui-sref="articles.cat.list">
                    <a>
                        <span class="fa fa-folder-open-o"></span> Danh Mục Tin Tức
                    </a>
                </li>
                <li ui-sref-active="active" ui-sref="articles.list">
                    <a>
                        <span class="fa fa-list-ol"></span> Danh Sách Tin Tức
                    </a>
                </li>
            </ul>
        </li>
        <li>
            <a ui-sref="questions.list" ui-sref-active="active">
                <span class="fa fa-question-circle-o"></span> Câu Hỏi
            </a>
        </li>
        <li>
            <a ui-sref="schools.list" ui-sref-active="active">
                <span class="fa fa-graduation-cap"></span> Trường
            </a>
        </li>
        //Add_Here
    </ul>
</aside>
<section class="right-section">
    <div class="top-menu">
        <ul class="left">
            <li ng-click="menuToggle()"><a href><span class="fa fa-bars"></span></a></li>
            <li><a href="./login.php"><span class="fa fa-power-off"></span></a></li>
            <li><a href="#" onclick="window.open(SITE_URL,'_blank');"><span class="fa fa-globe"></span> Xem Website</a>
            </li>
        </ul>
        <ul class="right">
            <li><a href="#"><span class="fa fa-bell"></span></a></li>
            <li><a href="#"><span class="fa fa-inbox"></span></a></li>
            <li><a href="#"><span class="fa fa-cog"></span></a></li>
        </ul>
    </div>
    <ui-view></ui-view>
</section>
<script src="js/ckeditor/ckeditor.js"></script>
<script src="js/ckfinder/ckfinder.js"></script>
<!-- bower:js -->
<script src="bower_components/jquery/dist/jquery.js"></script>
<script src="bower_components/bootstrap/dist/js/bootstrap.js"></script>
<script src="bower_components/angular/angular.js"></script>
<script src="bower_components/angular-ui-router/release/angular-ui-router.js"></script>
<script src="bower_components/angular-animate/angular-animate.js"></script>
<script src="bower_components/angular-loading-bar/build/loading-bar.js"></script>
<script src="bower_components/angular-sanitize/angular-sanitize.js"></script>
<script src="bower_components/ngToast/dist/ngToast.js"></script>
<script src="bower_components/angular-bootstrap/ui-bootstrap-tpls.js"></script>
<script src="bower_components/angular-nestable/src/angular-nestable.js"></script>
<script src="bower_components/ngstorage/ngStorage.js"></script>
<!-- endbower -->
<script src="js/config.js"></script>
<script src="app/app.js"></script>
<?php
function import($folder)
{
    foreach (glob("app/$folder/*.js") as $file) {
        echo '<script src="' . $file . '"></script>';
    }
}

?>
<!--Import Services-->
<?php import('services'); ?>
<!--Import Directives-->
<?php import('directives'); ?>
<!--Import Controllers-->
<?php import('controllers'); ?>
</body>
</html>