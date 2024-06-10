<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MovieListController;

Route::get('/', function () {
    return view('welcome');
});

// localhost:8000/additions にアクセスしたらMovieListControllerを呼び出す
Route::resource('additions' , MovieListController::class);