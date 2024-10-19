<?php

use App\Http\Controllers\SharkController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('shark', SharkController::class);