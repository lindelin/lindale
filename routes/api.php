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
Route::get('/profile', 'ProfileController@resources');
Route::get('/lang', 'ServiceController@langSync');
Route::post('/logout', 'ServiceController@logout');

// Projects
Route::prefix('/projects')->group(function () {
    Route::get('/', 'ProjectsController@resources');
    Route::get('favorites', 'ProjectsController@favorites');
    Route::get('{project}/top', 'ProjectsController@topResources');
    Route::get('{project}/tasks/groups', 'ProjectsController@taskGroups');
    Route::post('{project}/tasks/groups', 'TasksController@storeGroup');
    Route::get('{project}/tasks/edit-resource', 'TasksController@editResource');
    Route::get('{project}/tasks/groups/edit-resource', 'TasksController@groupEditResource');
    Route::post('{project}/tasks', 'TasksController@store');
    Route::get('{project}/todos/', 'ProjectsController@todos');
    Route::post('{project}/todos/', 'TodosController@store');
    Route::post('{project}/wikis', 'WikisController@store');
    Route::get('{project}/wikis/types', 'WikisController@wikiTypes');
    Route::post('{project}/wikis/types', 'WikisController@storeType');
    Route::get('{project}/wikis/types/{wikiType}', 'WikisController@wikisByType');
    Route::get('{project}/members', 'MembersController@members');
    Route::post('{project}/todo-list', 'TodosController@storeList');
});

// Tasks
Route::prefix('/tasks')->group(function () {
    Route::get('/', 'TasksController@myTaskCollection');
    Route::get('group/{taskGroup}', 'TasksController@groupTaskCollection');
    Route::put('group/{taskGroup}', 'TasksController@updateGroup');
    Route::put('{task}/complete', 'TasksController@completeTask');
    Route::get('{task}', 'TasksController@taskResource');
    Route::put('{task}', 'TasksController@update');
    Route::delete('{task}', 'TasksController@destroy');
    Route::post('{task}/sub-task', 'SubTaskController@store');
    Route::post('{task}/activities', 'TaskActivitiesController@store');
});

// To-dos
Route::prefix('/todos')->group(function () {
    Route::get('/', 'TodosController@myTodoCollection');
    Route::get('{todo}/edit-resource', 'TodosController@editResource');
    Route::put('{todo}/change-color', 'TodosController@changeColor');
    Route::put('{todo}/finished', 'TodosController@updateToFinished');
    Route::put('{todo}', 'TodosController@update');
    Route::delete('{todo}', 'TodosController@destroy');
});

// Settings
Route::prefix('/settings')->group(function () {
    Route::get('/locale', 'SettingsController@locale');
    Route::put('/locale', 'SettingsController@updateLocale');
    Route::put('/password', 'SettingsController@resetPassword');
    Route::get('/notification', 'SettingsController@notification');
    Route::put('/notification', 'SettingsController@updateNotification');
    Route::put('/profile', 'SettingsController@updateProfile');
    Route::post('/profile/upload', 'SettingsController@uploadProfilePhoto');
});

Route::get('wikis/{wiki}', 'WikisController@show');
Route::put('wikis/{wiki}', 'WikisController@update');

Route::put('/sub-tasks/{subTask}', 'SubTaskController@update');
Route::delete('/sub-tasks/{subTask}', 'SubTaskController@destroy');
