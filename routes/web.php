<?php

/*
|--------------------------------------------------------------------------
| Welcome Routes
|--------------------------------------------------------------------------
|
| 歓迎画面ルート
|
| 欢迎界面路由
|
*/

Route::get('/', 'HomeController@index');
Route::get('/lang/{lang}', 'HomeController@lang')->name('lang');

/*
|--------------------------------------------------------------------------
| Home Routes
|--------------------------------------------------------------------------
|
| ホーム画面ルート
|
| 个人首页路由
|
*/

Route::group(['middleware' => 'auth', 'namespace' => 'Home'], function () {
    Route::get('home', 'HomeController@index');
});

/*
|--------------------------------------------------------------------------
| Project Routes
|--------------------------------------------------------------------------
|
| プロジェクトルート
|
| 项目路由
|
*/

Route::group(['middleware' => 'auth', 'namespace' => 'Project'], function () {
    Route::resource('project', 'ProjectController');
    Route::group(['middleware' => 'ProjectAuth', 'prefix' => 'project/{project}'], function () {

        //Wiki路由
        Route::resource('wiki', 'WikiController');
        Route::post('wiki/first', 'WikiController@first');
        Route::group(['namespace' => 'Wiki'], function () {
            Route::resource('wiki-index', 'WikiTypeController');
        });

        //成员路由
        Route::get('member', 'MemberController@index');
        Route::post('member', 'MemberController@store');
    });
});

/*
|--------------------------------------------------------------------------
| Settings Routes
|--------------------------------------------------------------------------
|
| 個人設定ルート
|
| 设定路由
|
*/

Route::group(['middleware' => 'auth', 'namespace' => 'Settings', 'prefix' => 'settings'], function () {
    Route::get('profile', 'ProfileController@index');
    Route::patch('profile/{user}', 'ProfileController@update');
});

/*
|--------------------------------------------------------------------------
| Super Admin Routes
|--------------------------------------------------------------------------
|
| スーパー管理人ルート
|
| 超级管理员路由
|
*/

Route::group(['middleware' => ['auth', 'AdminAuth'], 'namespace' => 'Admin', 'prefix' => 'admin'], function () {
    Route::get('/', 'HomeController@index');
    //用户管理路由
    Route::get('user', 'UserController@index');
    Route::get('user/create', 'UserController@create');
    Route::post('user', 'UserController@store');
    Route::delete('user/{user}', 'UserController@destroy');
});

/*
|--------------------------------------------------------------------------
| Logging In/Out Routes
|--------------------------------------------------------------------------
|
| ログイン関連ルート
|
| 认证路由
|
*/

Route::get('login', 'Auth\LoginController@showLoginForm');
Route::post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout');

/*
|--------------------------------------------------------------------------
| Password Routes
|--------------------------------------------------------------------------
|
| パスワード関連ルート
|
| 密码重置
|
*/

Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm');
Route::post('password/reset', 'Auth\ResetPasswordController@reset');

/*
|--------------------------------------------------------------------------
| Test Routes
|--------------------------------------------------------------------------
|
| テストルート
|
| 测试路由
|
*/
