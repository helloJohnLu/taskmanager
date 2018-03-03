<?php

Auth::routes();

Route::get('/', 'HomeController@show')->name('home');

// 项目控制器
Route::resource('projects', 'ProjectsController');

// 任务控制器
Route::resource('tasks', 'TasksController');
Route::put('/tasks/{task}/complete', 'TasksController@change_completed')->name('tasks.change');
