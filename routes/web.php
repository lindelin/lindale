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

Route::get('/', 'HomeController@index')->name('root');;
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
    Route::get('home', 'HomeController@index')->name('home');
    Route::get('home/project', 'HomeController@project')->name('my.project');
    Route::post('home/favorites', 'HomeController@addFavorites')->name('add.favorites');
    Route::post('home/favorites/remove', 'HomeController@removeFavorites')->name('remove.favorites');
    //Profile
    Route::get('profile/{user}', 'ProfileController@show')->name('profile');
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
    Route::patch('project/transfer/{project}', 'ProjectController@transfer')->name('project.transfer');
    Route::get('project/{project}', 'ProjectController@show')->middleware('ProjectAuth')->name('project.show');
    Route::get('/unfinished/project', 'ProjectController@unfinished')->name('project.unfinished');
    Route::get('/finished/project', 'ProjectController@finished')->name('project.finished');
    //项目内路由
    Route::group(['middleware' => 'ProjectAuth', 'prefix' => 'project/{project}'], function () {

        //Wiki路由
        Route::resource('wiki', 'WikiController');
        Route::post('wiki/first', 'WikiController@first')->name('wiki.first');
        Route::group(['namespace' => 'Wiki'], function () {
            Route::get('wiki-index/create', 'WikiTypeController@create')->name('wiki-index.create');
            Route::post('wiki-index', 'WikiTypeController@store')->name('wiki-index.store');
            Route::patch('wiki-index/{wikiType}', 'WikiTypeController@update')->name('wiki-index.update');
            Route::delete('wiki-index/{wikiType}', 'WikiTypeController@destroy')->name('wiki-index.destroy');
        });

        //成员路由
        Route::group(['prefix' => 'member'], function () {
            Route::get('/', 'MemberController@index')->name('member.index');
            Route::post('/', 'MemberController@store')->name('member.store');
            Route::post('/invite', 'MemberController@invite')->name('member.invite');
            Route::delete('{user}', 'MemberController@destroy')->name('member.destroy');
            Route::patch('{user}', 'MemberController@policy')->name('member.policy');
        });

        //待办路由
        Route::group(['prefix' => 'todo'], function () {
            Route::get('/', 'TodoController@index')->name('todo.index');
            Route::get('status/{status?}', 'TodoController@index')->name('todo.status');
            Route::post('/', 'TodoController@store')->name('todo.store');
            Route::patch('todo/{todo}', 'TodoController@update')->name('todo.update');
            Route::delete('todo/{todo}', 'TodoController@destroy')->name('todo.destroy');
            Route::get('list/show/{list}', 'TodoController@show')->name('todo.list');
            //待办列表路由
            Route::group(['namespace' => 'Todo'], function () {
                Route::post('list', 'TodoListController@store')->name('todo-list.store');
                Route::get('list/create', 'TodoListController@create')->name('todo-list.create');
                Route::delete('list/delete/{list}', 'TodoListController@destroy')->name('todo-list.destroy');
            });
        });

        //进度路由
        Route::group(['prefix' => 'progress'], function () {
            Route::get('/', 'ProgressController@index')->name('progress');
            Route::get('/member', 'ProgressController@member')->name('progress.member');
            Route::get('/gantt', 'ProgressController@gantt')->name('progress.gantt');
            Route::get('/gantt-full', 'ProgressController@ganttFull')->name('progress.gantt-full');
            Route::get('/tasks', 'ProgressController@tasks')->name('progress.tasks');
            Route::get('/todo', 'ProgressController@todo')->name('progress.todo');
        });

        //概要路由
        Route::group(['prefix' => 'info'], function () {
            Route::get('/', 'InfoController@index')->name('project.info');
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
                Route::get('type', 'ConfigController@taskType')->name('config.taskType');
                Route::patch('type/{type?}', 'ConfigController@updateTaskType')->name('config.taskType.update');

                Route::get('status', 'ConfigController@taskStatus')->name('config.taskStatus');
                Route::patch('status/{status?}', 'ConfigController@updateTaskStatus')->name('config.taskStatus.update');
            });
        });

        //任务路由
        Route::group(['prefix' => 'task'], function () {
            //首页
            Route::get('/', 'TaskController@index')->name('task.index');
            Route::get('all', 'TaskController@all')->name('task.all');
            Route::get('unfinished', 'TaskController@unfinished')->name('task.unfinished');
            Route::get('finished', 'TaskController@finished')->name('task.finished');
            Route::get('type/{taskType}', 'TaskController@type')->name('task.type');
            Route::get('priority/{taskPriority}', 'TaskController@priority')->name('task.priority');
            Route::get('status/{taskStatus}', 'TaskController@status')->name('task.status');
            Route::get('show/{task}', 'TaskController@show')->name('task.show');

            //任务
            Route::group(['prefix' => 'task'], function () {
                Route::post('/', 'TaskController@store')->name('task.store');
                Route::delete('/{task}', 'TaskController@destroy')->name('task.destroy');
                Route::patch('/{task}', 'TaskController@update')->name('task.update');
                Route::get('create', 'TaskController@create')->name('task.create');
                Route::get('edit/{task}', 'TaskController@edit')->name('task.edit');
            });

            //任务组
            Route::group(['namespace' => 'Task', 'prefix' => 'group'], function () {
                Route::get('create', 'TaskGroupController@create')->name('taskGroup.create');
                Route::get('edit/{taskGroup}', 'TaskGroupController@edit')->name('taskGroup.edit');
                Route::patch('/edit/{taskGroup}', 'TaskGroupController@update')->name('taskGroup.update');
                Route::delete('/delete/{taskGroup}', 'TaskGroupController@destroy')->name('taskGroup.destroy');
                Route::post('/', 'TaskGroupController@store')->name('taskGroup.store');
            });

            Route::group(['namespace' => 'Task', 'prefix' => 'show/{task}/sub-task'], function () {
                Route::post('/', 'SubTaskController@store')->name('subTask.store');
                Route::patch('/edit/{subTask}', 'SubTaskController@update')->name('subTask.update');
                Route::delete('/edit/{subTask}', 'SubTaskController@destroy')->name('subTask.destroy');
            });

            Route::group(['namespace' => 'Task', 'prefix' => 'show/{task}/activity'], function () {
                Route::post('/', 'TaskActivityController@store')->name('taskActivity.store');
                Route::delete('/{taskActivity}', 'TaskActivityController@destroy')->name('taskActivity.destroy');
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
Route::get('auth/token/{token}', 'Auth\SetPasswordController@showSetForm')->name('password.set');

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
Route::post('password/set', 'Auth\SetPasswordController@setPassword')->name('password.update');
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

/*Route::get('test', function (){
    $user = \App\User::first();
    $user->favorites()->attach(24);
});*/
