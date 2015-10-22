<?php

Route::get('/', function () { return view('welcome'); });

Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', 'Auth\AuthController@getLogout');
Route::get('auth/register', 'Auth\AuthController@getRegister');
Route::post('auth/register', 'Auth\AuthController@postRegister');

Route::get('admin', function() { return view('admin'); });
Route::resource('admin/soal', 'SoalController');
Route::resource('admin/matpel', 'MatapelajaranController');
