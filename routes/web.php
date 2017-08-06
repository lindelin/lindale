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
    //Home
    Route::get('home', 'HomeController@index');
    Route::get('home/project', 'HomeController@project');
    //Profile
    Route::get('profile/{user}', 'ProfileController@show');
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
    //项目
    Route::resource('project', 'ProjectController', ['except' => ['show']]);
    Route::patch('project/transfer/{project}', 'ProjectController@transfer');
    Route::get('project/{project}', 'ProjectController@show')->middleware('ProjectAuth')->name('project.show');
    Route::get('/unfinished/project', 'ProjectController@unfinished');
    Route::get('/finished/project', 'ProjectController@finished');
    //项目内路由
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

        //进度路由
        Route::group(['prefix' => 'progress'], function () {
            Route::get('/', 'ProgressController@index')->name('progress');
            Route::get('/gantt', 'ProgressController@gantt')->name('progress.gantt');
            Route::get('/gantt-full', 'ProgressController@ganttFull')->name('progress.gantt-full');
            Route::get('/member', 'ProgressController@member')->name('progress.member');
        });

        //概要路由
        Route::group(['prefix' => 'info'], function () {
            Route::get('/', 'InfoController@index');
        });

        //设定路由
        Route::group(['prefix' => 'config'], function () {
            //基本设定
            Route::get('/', 'ConfigController@index')->name('config.index');
            //语言和地区设定
            Route::get('locale', 'ConfigController@locale')->name('config.locale.index');
            Route::patch('locale', 'ConfigController@updateLocale')->name('config.locale.update');
            //通知设定
            Route::get('notification', 'ConfigController@notification')->name('config.notification.index');
            Route::patch('notification', 'ConfigController@updateNotification')->name('config.notification.update');
            //お知らせ
            Route::group(['prefix' => 'notice'], function () {
                Route::get('/', 'NoticeController@index')->name('notice.index');
                Route::post('/', 'NoticeController@store')->name('notice.store');
                Route::delete('/{notice}', 'NoticeController@destroy')->name('notice.delete');
                Route::patch('/{notice}', 'NoticeController@update')->name('notice.update');
            });

            //任务设定
            Route::group(['prefix' => 'task'], function () {
                Route::get('type', 'ConfigController@taskType');
                Route::patch('type/{type?}', 'ConfigController@updateTaskType');

                Route::get('status', 'ConfigController@taskStatus');
                Route::patch('status/{status?}', 'ConfigController@updateTaskStatus');
            });
        });

        //任务路由
        Route::group(['prefix' => 'task'], function () {
            //首页
            Route::get('/', 'TaskController@index');
            Route::get('all', 'TaskController@all');
            Route::get('unfinished', 'TaskController@unfinished');
            Route::get('finished', 'TaskController@finished');
            Route::get('type/{taskType}', 'TaskController@type');
            Route::get('priority/{taskPriority}', 'TaskController@priority');
            Route::get('status/{taskStatus}', 'TaskController@status');
            Route::get('show/{task}', 'TaskController@show')->name('task.show');

            //任务
            Route::group(['prefix' => 'task'], function () {
                Route::post('/', 'TaskController@store');
                Route::delete('/{task}', 'TaskController@destroy');
                Route::patch('/{task}', 'TaskController@update');
                Route::get('create', 'TaskController@create');
                Route::get('edit/{task}', 'TaskController@edit');
            });

            //任务组
            Route::group(['namespace' => 'Task', 'prefix' => 'group'], function () {
                Route::get('create', 'TaskGroupController@create');
                Route::get('edit/{taskGroup}', 'TaskGroupController@edit');
                Route::patch('/edit/{taskGroup}', 'TaskGroupController@update');
                Route::delete('/delete/{taskGroup}', 'TaskGroupController@destroy');
                Route::post('/', 'TaskGroupController@store');
            });

            Route::group(['namespace' => 'Task', 'prefix' => 'show/{task}/sub-task'], function () {
                Route::post('/', 'SubTaskController@store');
                Route::patch('/edit/{subTask}', 'SubTaskController@update');
                Route::delete('/edit/{subTask}', 'SubTaskController@destroy');
            });

            Route::group(['namespace' => 'Task', 'prefix' => 'show/{task}/activity'], function () {
                Route::post('/', 'TaskActivityController@store');
                Route::delete('/{taskActivity}', 'TaskActivityController@destroy');
            });
        });
    });
});

/*
|--------------------------------------------------------------------------
| Task Routes
|--------------------------------------------------------------------------
|
| Taskルート
|
| Task路由
|
*/

Route::group(['middleware' => 'auth', 'namespace' => 'Task', 'prefix' => 'task'], function () {
    Route::get('/', 'TaskController@index');
    Route::get('unfinished', 'TaskController@unfinished');
    Route::get('finished', 'TaskController@finished');
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
| Setting Routes
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

    //账户路由
    Route::get('account', 'AccountController@index');
    Route::post('account', 'AccountController@resetPassword');

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
    Route::get('logs', 'LogController@index');
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

Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
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

/*use Carbon\Carbon;

Route::get('test', function (){
    var_dump(Carbon::parse('2017-05-15')->lt(Carbon::now()));
});*/
