<?php

//Route::get('/profile', 'ProfileController@resources');

// Projects
Route::prefix('/projects')->group(function () {
    Route::get('/managed', 'ProjectController@managedResources');
    Route::get('/joined', 'ProjectController@joinedResources');
});
