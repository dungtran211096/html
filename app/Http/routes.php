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
Route::get('/dang-nhap',[
   'as' => 'login',
    'uses' => 'SiteController@login'
]);
Route::post('/dang-nhap', [
    'as' => 'login',
    'uses' => 'SiteController@postLogin'
]);

Route::get('/dang-ky',[
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
Route::get('/tim-kiem', [
    'as' => 'search',
    'uses' => 'SiteController@search'
]);
Route::post('/chia-se-tai-lieu', [
    'as' => 'upload',
    'uses' => 'SiteController@postUpload'
]);

Route::get('/{slug}', [
    'as' => 'detail',
    'uses' => 'SiteController@detail'
]);

Route::post('api/v1/login', 'Api\AuthController@authenticate');
Route::group([
    'prefix' => 'api/v1',
    'namespace' => 'Api',
    'middleware' => ['cors', 'jwt.auth']
], function () {
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