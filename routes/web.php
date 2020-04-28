<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

Route::get('/search', 'HomeController@search')->name('user.search');

Route::get('/nhomtin/{id}', 'HomeController@renderNhomTin')->name('user.nhomtin');

Route::get('/loaitin/{id}', 'HomeController@renderLoaiTin')->name('user.loaitin');

Route::get('/tin/{id}', 'HomeController@renderTin')->name('user.tin');

Route::get('/about', 'HomeController@renderAbout');

/* Admin Routes */

Auth::routes();

Route::get('/admin/home', 'Admin\HomeController@index')->name('admin.home');

Route::group(['prefix' => 'admin'], function () {
    Route::get('home', 'Admin\HomeController@index')->name('admin.home');
    Route::get('logout', 'Auth\LoginController@logout')->name('logout');
    Route::get('reset','Auth\ResetPasswordController@resetpassword');
    Route::post('newpassword','Auth\ResetPasswordController@newpassword');
    //nhom tin
    Route::group(['prefix' => 'nhomtin'], function () {
        Route::get('dsnhomtin', 'Admin\nhomtinController@dsnhomtin');
        Route::get('suanhomtin/{id}', 'Admin\nhomtinController@suanhomtin');
        Route::post('laydulieusua/{id}', 'Admin\nhomtinController@laydulieusua');
        Route::get('xoanhomtin/{id}', 'Admin\nhomtinController@xoanhomtin');
        Route::get('themnhomtin', 'Admin\nhomtinController@themnhomtin');
        Route::post('laydulieuthem', 'Admin\nhomtinController@laydulieuthem');
        Route::post('ketquatimkiem', 'Admin\nhomtinController@ketquatimkiem');
    });
    //loaitin
    Route::group(['prefix' => 'loaitin'], function () {
        Route::get('dsloaitin', 'Admin\loaitinController@dsloaitin');
        Route::get('sualoaitin/{id}', 'Admin\loaitinController@sualoaitin');
        Route::post('laydulieusua/{id}', 'Admin\loaitinController@laydulieusua');
        Route::get('xoaloaitin/{id}', 'Admin\loaitinController@xoaloaitin');
        Route::get('themloaitin', 'Admin\loaitinController@themloaitin');
        Route::post('laydulieuthem', 'Admin\loaitinController@laydulieuthem');
        Route::post('ketquatimkiem', 'Admin\loaitinController@ketquatimkiem');
    });
    //tin
    Route::group(['prefix' => 'tin'], function () {
        Route::get('dstin', 'Admin\tinController@dstin');
        Route::get('themtin', 'Admin\tinController@themtin');
        Route::post('laydulieuthem', 'Admin\tinController@laydulieuthem');
        Route::get('chitiettin/{id}', 'Admin\tinController@chitiettin');
        Route::get('ketquatimkiem', 'Admin\tinController@ketquatimkiem')->name('search');
        Route::get('xoatin/{id}/{idl}', 'Admin\tinController@xoatin');
        Route::get('suatin/{id}', 'Admin\tinController@suatin');
        Route::post('laydulieusua/{id}', 'Admin\tinController@laydulieusua');
        Route::get('phantrang', 'Admin\tinController@phantrang');
    });
    //binhluan
    Route::group(['prefix' => 'binhluan'], function () {
        Route::get('binhluan', 'Admin\binhluanController@binhluan');
        Route::get('duyetbinhluan/{id}', 'Admin\binhluanController@duyetbinhluan');
        Route::get('xoabinhluan/{id}', 'Admin\binhluanController@xoabinhluan');
    });
    //quantri
    Route::group(['prefix' => 'quantri', 'middleware' => ['check']], function () {
        Route::get('quantri', 'Admin\quantriController@dsquantri');
        Route::get('xoaquantri/{id}', 'Admin\quantriController@xoaquantri');
    });
});
