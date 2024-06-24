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
        $Lists=movieList::where('status' , true)->get();
        return view('movieList.list' , compact('Lists'));
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
        //モデルをインスタンス化
        $List= new movieList;

        $List->movie_name = $request->input('movie_name');
        $List->how_to_watch = $request->input('how_to_watch');
        $List->comments = $request->input('comments');
        $List->evaluations = $request->input('evaluations');

        //データベースに保存
        $List->save();

        //リダイレクト
        return redirect('/movieList');
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
        //モデル名::find(整数)
        $List=movieList::find($id);
        return view('movieList.edit' , compact('List'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //「編集する」ボタンを押した時
        $rules=[
            'movie_name' => 'required|max1:50',
            "comments" => "max2:100",
        ];
        $messages=['required' => '必須項目です' , 'max1' => '50文字以下にしてください' , 'max2' => '100文字以下にしてください'];

        Validator::make($request->all(), $rules,$messages)->validate();

        //該当作品を検索
        $List = movieList::find($id);

        $List->movie_name = $request->input('movie_name');
        $how_to_watch = $request->input('how_to_watch');
        $List->how_to_watch = $request->input('how_to_watch',$how_to_watch)->first();
        $List->comments = $request->input('comments');
        $List->evaluations = $request->input('evaluations');


        //データベースに保存
        $List->save();

        //リダイレクト
        return redirect('/movieList');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        movieList::find($id)->delete();

        return redirect('/movieList');
    }
}
