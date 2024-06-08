<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MovieListController;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('addition' , MovieListController::class);