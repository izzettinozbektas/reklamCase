<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdvertisingController;
use App\Http\Controllers\PlatformController;
use App\Http\Controllers\ReportController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/



Route::group(['middleware' => ['data_control']], function () {
    Route::resource('/advertisements', AdvertisingController::class);
    Route::resource('/platforms', PlatformController::class);
});

Route::get('/getPlatformProfit/{id}', [ReportController::class, 'getPlatformProfit']);
Route::get('/getAllAdvertisingProfit', [ReportController::class, 'getAllAdvertisingProfit']);



