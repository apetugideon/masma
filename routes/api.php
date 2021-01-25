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

Route::post('devices', 'App\Http\Controllers\DeviceController@store');
Route::post('purchases', 'App\Http\Controllers\PurchaseController@store')->middleware('check.device');

Route::get('purchases', 'App\Http\Controllers\PurchaseController@store')->middleware('check.device');

Route::get('purchases/{id}', 'App\Http\Controllers\PurchaseController@show');

Route::post('verify_google', 'App\Http\Controllers\PurchaseController@verify_google');

Route::get('verify_google', 'App\Http\Controllers\PurchaseController@verify_google');

