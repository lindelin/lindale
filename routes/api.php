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

Route::get('/projects', 'ProjectsController@resources')->middleware('auth:api');
Route::get('/profile', 'ProfileController@resources')->middleware('auth:api');
Route::get('/tasks', 'TasksController@myTaskCollection')->middleware('auth:api');
