<?php

Route::get('/', 'HomeController@index')->name('index');

Auth::routes();

Route::get('/home', 'HomeController@show')->name('home');
