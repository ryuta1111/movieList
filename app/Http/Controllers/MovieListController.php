<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\movieList;
use Illuminate\Support\Facades\Validator;

class MovieListController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $movieLists = movieList::all();
        return view('additions.index' , compact('movieLists'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //[フォームの項目名=>バリデーションルール]
        $rules = [
            "movie_name" => "required|max:50",
        ];

        //[バリデーションの名前=>エラーメッセージ]
        $messages = ['required' => '必須項目です' , 'max' => '50文字以下にしてください。'];

        //Validator::make($request->all(),バリデーションルール,エラーメッセージ);
        Validator::make($request->all(), $rules, $messages)->validate();


        //モデルをインスタンス化
        $movieList= new movieList;

        //モデル->カラム名　＝　値　で、データを割り当てる
        $movieList->movie_name = $request->input('movie_name');

        //データベースに保存
        $movieList->save();

        //リダイレクト
        return redirect('/additions');


        // dd($movie_name);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
