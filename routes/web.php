<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'HomeController@index')->name('home');

Route::get('/nhomtin/{id}', 'HomeController@renderNhomTin')->name('user.nhomtin');

Route::get('/loaitin/{id}', 'HomeController@renderLoaiTin')->name('user.loaitin');

Route::get('/tin/{id}', 'HomeController@renderTin')->name('user.tin');
