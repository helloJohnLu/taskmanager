<?php

Auth::routes();

Route::get('/', 'HomeController@show')->name('home');

Route::resource('projects', 'ProjectsController');