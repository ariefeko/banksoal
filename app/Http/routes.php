<?php

Route::get('/', function () { return view('welcome'); });

Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', 'Auth\AuthController@getLogout');
Route::get('auth/register', 'Auth\AuthController@getRegister');
Route::post('auth/register', 'Auth\AuthController@postRegister');

Route::get('admin', function() { return view('admin'); });
Route::get('home', function() { return view('admin'); });
Route::resource('admin/soal', 'SoalController');
Route::resource('admin/matpel', 'MatapelajaranController');

//--tambahan di input data soal, mohon dibuatkan pilihan combobox pada bagian mata pelajaran
//--(bukan diisi id-nya lewat text-box)

// API mata pelajaran
Route::get('api/matpel/getall','MatapelajaranController@getAll');
Route::get('api/matpel/getbyid/{id}','MatapelajaranController@getId');
Route::get('api/matpel/getbyjenjang/{jenjang}','MatapelajaranController@getJenjang');
Route::get('api/matpel/getbypelajaran/{pelajaran}','MatapelajaranController@getPelajaran');
Route::get('api/matpel/getbytahunajaran/{thnajaran}','MatapelajaranController@getTahunAjaran');

// API soal
Route::get('api/soal/getbyid/{id}','SoalController@getId');
Route::get('api/soal/getbymatpelid/{matpelid}','SoalController@getMatpelId');
Route::get('api/soal/getbyjenjang/{jenjang}','SoalController@getJenjang');
Route::get('api/soal/getbypelajaran/{pelajaran}','SoalController@getPelajaran');

// API CRUD mata pelajaran
Route::get('api/matpel/create','MatapelajaranController@tambah');
Route::get('api/matpel/read/{id}','MatapelajaranController@baca');
Route::get('api/matpel/update/{id}','MatapelajaranController@ubah');
Route::get('api/matpel/delete/{id}','MatapelajaranController@hapus');

// API CRUP soal
Route::get('api/soal/create','SoalController@tambah');
Route::get('api/soal/read/{id}','SoalController@baca');
Route::get('api/soal/update/{id}','SoalController@ubah');
Route::get('api/soal/delete/{id}','SoalController@hapus');