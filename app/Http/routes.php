<?php

/*
|--------------------------------------------------------------------------
| Front Routes
|--------------------------------------------------------------------------
|
| 前台路由
|
| フロントルート
|
*/

Route::get('lang/{locale}', 'HomeController@lang')->name('lang');
Route::get('/', 'HomeController@index');
Route::get('/order/{order}', 'HomeController@index');
Route::get('article/{id}', 'ArticleController@show');
Route::post('comment', 'CommentController@store');

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
|
| 后台路由
|
| 管理画面ルート
|
*/

Route::group(['middleware' => ['https', 'auth'], 'namespace' => 'Admin', 'prefix' => 'admin'], function () {
    Route::get('/', 'HomeController@index');
    Route::resource('article', 'ArticleController');
    Route::get('article/index/{order}', 'ArticleController@index');
    Route::resource('comment', 'CommentController');
    Route::get('user', 'UserController@index');
    Route::post('adduser', 'UserController@add');
});

/*
|--------------------------------------------------------------------------
| Logging In/Out Routes
|--------------------------------------------------------------------------
|
| 认证路由
|
| ログイン関連ルート
|
*/

Route::group(['middleware' => 'https', 'prefix' => 'admin'], function () {
    Route::get('login', 'Auth\AuthController@showLoginForm');
    Route::post('login', 'Auth\AuthController@login');
    Route::get('logout', 'Auth\AuthController@logout');
    Route::get('password', 'Admin\UserController@password');
});

Route::group(['middleware' => 'https'], function () {
    Route::get('password/email', 'Auth\PasswordController@getEmail');
    Route::post('password/email', 'Auth\PasswordController@postEmail');
    Route::get('password/reset/{token}', 'Auth\PasswordController@getReset');
    Route::post('password/reset', 'Auth\PasswordController@postReset');
});
