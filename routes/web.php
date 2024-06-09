<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MovieListController;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('additions' , MovieListController::class);