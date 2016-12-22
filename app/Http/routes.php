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

//Add_Here
});