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
        <li>
            <a ui-sref="home" ui-sref-active="active">
                <span class="fa fa-home"></span> Trang Chủ
            </a>
        </li>
        <li>
            <a ui-sref="filemanager" ui-sref-active="active">
                <span class="fa fa-files-o"></span> Quản Lý Files
            </a>
        </li>
        <li class="has-child" ng-class="{expanded:$state.includes('documents')}">
            <a ng-click="expand($event)" ng-class="{active:$state.includes('documents')}">
                <span class="fa fa-newspaper-o"></span> Tài Liệu
            </a>
            <ul>
                <li ui-sref-active="active" ui-sref="documents.cat.list">
                    <a>
                        <span class="fa fa-folder-open-o"></span> Danh Mục Tài Liệu
                    </a>
                </li>
                <li ui-sref-active="active" ui-sref="documents.list">
                    <a>
                        <span class="fa fa-list-ol"></span> Danh Sách Tài Liệu
                    </a>
                </li>
            </ul>
        </li>
        <li>
            <a ui-sref="users.list" ui-sref-active="active">
                <span class="fa fa-users"></span> Quản Trị Viên
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