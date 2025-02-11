<?php

use App\Http\Controllers\{ScheduleController};
use Illuminate\Support\Facades\Route;

//Route::get('/', function () {
//    return view('welcome');
//});
//
//Route::get('/phpinfo', function () {
//    return phpinfo();
//});

Route::controller(ScheduleController::class)
    ->group(function () {
        Route::get('/', 'index')->name('index');
    });
