<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\additionController;
use App\Http\Controllers\movieListController;

Route::get('/', function () {
    return view('welcome');
});


//見たい映画を登録するページ
// localhost:8000/movieLists にアクセスしたらMovieListControllerを呼び出す
Route::resource('addition' , additionController::class);

Route::resource('movieList' , movieListController::class);