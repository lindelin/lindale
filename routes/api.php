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
Route::post('/device-token', 'ServiceController@storeDeviceToken');
Route::get('/projects', 'ProjectsController@resources');
Route::get('/projects/favorites', 'ProjectsController@favorites');
Route::get('/projects/{project}/top', 'ProjectsController@topResources');
Route::get('/projects/{project}/tasks/groups', 'ProjectsController@taskGroups');
Route::get('/projects/{project}/todos/', 'ProjectsController@todos');
Route::get('/projects/{project}/wikis/types', 'WikisController@wikiTypes');
Route::get('/projects/{project}/wikis/types/{wikiType}', 'WikisController@wikisByType');
Route::get('/projects/{project}/members', 'MembersController@members');
Route::get('/profile', 'ProfileController@resources');

Route::get('/tasks', 'TasksController@myTaskCollection');
Route::put('/tasks/{task}/complete', 'TasksController@completeTask');
Route::get('/tasks/{task}/edit-resource', 'TasksController@editResource');
Route::get('/tasks/{task}', 'TasksController@taskResource');
Route::put('/tasks/{task}', 'TasksController@update');
Route::delete('/tasks/{task}', 'TasksController@destroy');
Route::post('/tasks/{task}/sub-task', 'SubTaskController@store');
Route::post('/tasks/{task}/activities', 'TaskActivitiesController@store');

Route::get('/todos', 'TodosController@myTodoCollection');
Route::get('/todos/{todo}/edit-resource', 'TodosController@editResource');
Route::put('/todos/{todo}/change-color', 'TodosController@changeColor');
Route::put('/todos/{todo}/finished', 'TodosController@updateToFinished');
Route::put('/todos/{todo}', 'TodosController@update');
Route::delete('/todos/{todo}', 'TodosController@destroy');

Route::get('wikis/{wiki}', 'WikisController@show');
Route::put('wikis/{wiki}', 'WikisController@update');

Route::prefix('/settings')->group(function () {
    Route::get('/locale', 'SettingsController@locale');
    Route::put('/locale', 'SettingsController@updateLocale');
    Route::put('/password', 'SettingsController@resetPassword');
    Route::get('/notification', 'SettingsController@notification');
    Route::put('/notification', 'SettingsController@updateNotification');
    Route::put('/profile', 'SettingsController@updateProfile');
});

Route::put('/sub-tasks/{subTask}', 'SubTaskController@update');
Route::delete('/sub-tasks/{subTask}', 'SubTaskController@destroy');


