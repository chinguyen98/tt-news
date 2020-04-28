<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::apiResource('/binhluan', 'Api\BinhluanController')->only(['store', 'index']);
Route::apiResource('/binhluancon', 'Api\BinhluanConController')->only(['show']);
Route::apiResource('/tinCuaNhomTin', 'Api\TinController')->only(['show']);

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
