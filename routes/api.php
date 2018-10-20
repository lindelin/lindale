<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('/projects', 'ProjectsController@resources');
Route::get('/profile', 'ProfileController@resources');
Route::get('/tasks', 'TasksController@myTaskCollection');
Route::get('/tasks/{task}', 'TasksController@taskResource');
Route::get('/todos', 'TodosController@myTodoCollection');

Route::prefix('/settings')->group(function () {
    Route::get('/locale', 'SettingsController@locale');
    Route::put('/locale', 'SettingsController@updateLocale');
    Route::put('/password', 'SettingsController@resetPassword');
    Route::get('/notification', 'SettingsController@notification');
    Route::put('/notification', 'SettingsController@updateNotification');
});


