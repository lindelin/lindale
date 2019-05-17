<?php

// Welcome Routes
Route::get('/', 'WelcomeController@index')->name('root');
Route::get('/lang/{lang}', 'WelcomeController@lang')->name('lang');

// Logging In/Out Routes
Route::group(['namespace' => 'Auth'], function () {
    Route::get('login', 'LoginController@showLoginForm')->name('login');
    Route::post('login', 'LoginController@login');
    Route::get('logout', 'LoginController@logout');
    Route::get('auth/token/{token}', 'SetPasswordController@showSetForm')->name('password.set');
});

// Password Routes
Route::group(['prefix' => 'password', 'namespace' => 'Auth'], function () {
    Route::get('reset', 'ForgotPasswordController@showLinkRequestForm');
    Route::post('email', 'ForgotPasswordController@sendResetLinkEmail');
    Route::get('reset/{token}', 'ResetPasswordController@showResetForm');
    Route::post('set', 'SetPasswordController@setPassword')->name('password.update');
    Route::post('reset', 'ResetPasswordController@reset');
});

// Auth Routes
Route::group(['middleware' => 'auth', 'namespace' => 'Web'], function () {
    // Home Routes
    Route::get('home', 'HomeController@index')->name('home');
    Route::get('projects', 'HomeController@projects')->name('projects');
    Route::get('tasks', 'HomeController@tasks')->name('tasks');
    Route::get('todos', 'HomeController@todos')->name('todos');
    Route::get('settings/{section?}', 'HomeController@settings')->name('settings');
    // Project Routes
    Route::get('projects/{project}/{section?}', 'ProjectController@index')->name('project');
});

