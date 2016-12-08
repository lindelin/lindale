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
    Route::get('home/project', 'HomeController@project');
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
            Route::get('wiki-index/create', 'WikiTypeController@create');
            Route::post('wiki-index', 'WikiTypeController@store');
            Route::patch('wiki-index/{wikiType}', 'WikiTypeController@update');
            Route::delete('wiki-index/{wikiType}', 'WikiTypeController@destroy');
        });

        //成员路由
        Route::group(['prefix' => 'member'], function () {
            Route::get('/', 'MemberController@index');
            Route::post('/', 'MemberController@store');
            Route::delete('{user}', 'MemberController@destroy');
            Route::patch('{user}', 'MemberController@policy');
        });

        //待办路由
        Route::group(['prefix' => 'todo'], function () {
            Route::get('/', 'TodoController@index');
            Route::get('status/{status?}', 'TodoController@index');
            Route::post('/', 'TodoController@store');
            Route::patch('todo/{todo}', 'TodoController@update');
            Route::delete('todo/{todo}', 'TodoController@destroy');
            Route::get('list/show/{list}', 'TodoController@show');
            //待办列表路由
            Route::group(['namespace' => 'Todo'], function () {
                Route::post('list', 'TodoListController@store');
                Route::get('list/create', 'TodoListController@create');
                Route::delete('list/delete/{list}', 'TodoListController@destroy');
            });
        });

        //概要路由
        Route::get('info', 'InfoController@index');

        //设定路由
        Route::group(['prefix' => 'config'], function () {
            //基本设定
            Route::get('/', 'ConfigController@index');
            //语言和地区设定
            Route::get('locale', 'ConfigController@locale');
            Route::patch('locale', 'ConfigController@updateLocale');
            //通知设定
            Route::get('notification', 'ConfigController@notification');
            Route::patch('notification', 'ConfigController@updateNotification');
        });

        Route::group(['prefix' => 'task'], function () {
            Route::get('/', 'TaskController@index');

            Route::group(['namespace' => 'Task', 'prefix' => 'group'], function () {
                Route::get('create', 'TaskGroupController@create');
                Route::post('/', 'TaskGroupController@store');
            });
        });
    });
});

/*
|--------------------------------------------------------------------------
| To-do Routes
|--------------------------------------------------------------------------
|
| To-doルート
|
| To-do路由
|
*/

Route::group(['middleware' => 'auth', 'namespace' => 'Todo', 'prefix' => 'todo'], function () {
    Route::get('/', 'TodoController@index');
    Route::post('/', 'TodoController@store');
    Route::get('status/{status?}', 'TodoController@index');
    Route::patch('todo/{todo}', 'TodoController@update');
    Route::delete('todo/{todo}', 'TodoController@destroy');
    Route::group(['prefix' => 'type/{type}'], function () {
        Route::get('/', 'TodoController@index');
        Route::get('status/{status?}', 'TodoController@index');

        Route::group(['middleware' => 'ProjectAuth'], function () {
            Route::get('project/{project}', 'TodoController@index');
        });
        
        //待办列表路由
        Route::group(['prefix' => 'list'], function () {
            Route::post('/', 'TodoListController@store');
            Route::get('create', 'TodoListController@create');
            Route::delete('delete/{list}', 'TodoListController@destroy');
            Route::get('show/{list}', 'TodoController@index');
        });
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
    //个人资料路由
    Route::group(['prefix' => 'profile'], function () {
        Route::get('/', 'ProfileController@index');
        Route::patch('{user}', 'ProfileController@update');
    });

    //OAuth已授权应用路由
    Route::get('/oauth/authorized', 'OAuthController@authorized');

    //面向开发者设定路由
    Route::group(['prefix' => 'developer'], function () {
        Route::get('/oauth/application', 'DeveloperController@application');
        Route::get('/oauth/personal', 'DeveloperController@personal');
    });

    //语言和地区设定
    Route::get('locale', 'LocaleController@locale');
    Route::patch('locale', 'LocaleController@updateLocale');

    //通知设定
    Route::get('notification', 'NotificationController@notification');
    Route::patch('notification', 'NotificationController@updateNotification');
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
