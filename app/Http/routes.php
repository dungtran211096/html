<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', [
    'as' => 'home',
    'uses' => 'SiteController@index'
]);

Route::get('/dang-nhap', [
    'as' => 'login',
    'uses' => 'SiteController@login'
]);
Route::get('/dang-xuat', [
    'as' => 'logout',
    'uses' => 'SiteController@logout'
]);
Route::post('/dang-nhap', [
    'as' => 'login',
    'uses' => 'SiteController@postLogin'
]);

Route::get('/dang-ky', [
    'as' => 'register',
    'uses' => 'SiteController@register'
]);
Route::post('/dang-ky', [
    'as' => 'register',
    'uses' => 'SiteController@postRegister'
]);
Route::get('/danh-muc/{slug}', [
    'as' => 'category',
    'uses' => 'SiteController@category'
]);
Route::get('tin-tuc/{slug}', [
    'as' => 'article',
    'uses' => 'SiteController@article'
]);
Route::get('gioi-thieu', [
    'as' => 'gioiThieu',
    'uses' => 'SiteController@gioiThieu'
]);
Route::get('cau-hoi-thuong-gap', [
    'as' => 'question',
    'uses' => 'SiteController@question'
]);
Route::post('cau-hoi-thuong-gap', [
    'as' => 'question',
    'uses' => 'SiteController@postQuestion'
]);
Route::get('thong-tin-ca-nhan', [
    'as' => 'info',
    'uses' => 'SiteController@info'
]);
Route::get('guong-mat-tieu-bieu/{slug?}', [
    'as' => 'guongMatTieuBieu',
    'uses' => 'SiteController@guongMatTieuBieu'
]);
Route::get('bang-xep-hang/{slug?}', [
    'as' => 'bangXepHang',
    'uses' => 'SiteController@bangXepHang'
]);
Route::get('thong-tin-ca-nhan', [
    'as' => 'thongTinCaNhan',
    'uses' => 'SiteController@thongTinCaNhan'
]);
Route::post('thong-tin-ca-nhan', [
    'as' => 'thongTinCaNhan',
    'uses' => 'SiteController@postThongTinCaNhan'
]);
Route::post('api/v1/login', 'Api\AuthController@authenticate');
Route::group(['prefix' => 'api/v1', 'namespace' => 'Api', 'middleware' => ['cors', 'jwt.auth']], function () {
    /*
    * Options Route
    */
    Route::resource('options', 'OptionsController');
    Route::post('options/save', 'OptionsController@save');

    /*
    * User Routes
    */
    Route::get('users/actives', 'UsersController@actives');
    Route::resource('users', 'UsersController');
    Route::delete('users', 'UsersController@destroys');
    Route::get('users/{id}/active', 'UsersController@active');

    /*
    * Article Category Routes
    */
    Route::get('article-categories/actives', 'ArticleCategoriesController@actives');
    Route::resource('article-categories', 'ArticleCategoriesController');
    Route::delete('article-categories', 'ArticleCategoriesController@destroys');
    Route::get('article-categories/{id}/active', 'ArticleCategoriesController@active');
    /*
    * Article Routes
    */
    Route::get('articles/actives', 'ArticlesController@actives');
    Route::resource('articles', 'ArticlesController');
    Route::delete('articles', 'ArticlesController@destroys');
    Route::get('articles/{id}/active', 'ArticlesController@active');

    /*
    * Question Routes
    */
    Route::get('questions/actives', 'QuestionsController@actives');
    Route::resource('questions', 'QuestionsController');
    Route::delete('questions', 'QuestionsController@destroys');
    Route::get('questions/{id}/active', 'QuestionsController@active');
    /*
    * School Routes
    */
    Route::get('schools/actives', 'SchoolsController@actives');
    Route::resource('schools', 'SchoolsController');
    Route::delete('schools', 'SchoolsController@destroys');
    Route::get('schools/{id}/active', 'SchoolsController@active');

//Add_Here
});