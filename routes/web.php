<?php

use App\Http\Controllers\{DataController};
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/phpinfo', function () {
    return phpinfo();
});

Route::controller(DataController::class)
    ->prefix('data')
    ->name('data.')
    ->group(function () {
        Route::get('/', 'index')->name('index');
    });
