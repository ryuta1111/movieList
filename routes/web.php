<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MovieListController;

Route::get('/', function () {
    return view('welcome');
});

// localhost:8000/movieLists にアクセスしたらMovieListControllerを呼び出す
Route::resource('movieLists' , MovieListController::class);