<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\movieList;
use Illuminate\Support\Facades\Validator;

class additionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //変数名＝モデル名::処理
        // $movieLists = movieList::all(); 全て表示
        //first()は最初のレコードだけ
        $Lists=movieList::where('status' , false)->get(); //複数のレコードを取得するとき　
        //return view('[~/resources/views/]フォルダ名.ファイル名' , compact('変数名'))
        return view('addition.index' , compact('Lists'));
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
        $List= new movieList;

        //モデル->カラム名　＝　値　で、データを割り当てる
        $List->movie_name = $request->input('movie_name');

        //データベースに保存
        $List->save();

        //リダイレクト
        return redirect('/addition');


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
        //モデル名::find(整数)
        $List = movieList::find($id);
        return view('addition.edit' , compact('List'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //dd($request->status);

        //「編集する」ボタンを押した時
        if($request->status === null){
            $rules = [
                'movie_name' => 'required|max:50',
            ];
            $messages = ['required' => '必須項目です' , 'max' => '50文字以下にしてください。'];

            Validator::make($request->all(), $rules,$messages)->validate();

            //該当のタスクを検索
            $List = movieList::find($id);

            //モデル->カラム名 = 値　で、データを割り当てる
            $List->movie_name = $request->input('movie_name');

            //データベースに保存
            $List->save();
        }else{
            //「完了」ボタンを押した時

            //該当のタスクを検索
            $List = movieList::find($id);

            //モデル->カラム名 = 値　で、データを割り当てる
            $List->status=true; //true:完了,false:未完了

            //データベースに保存
            $List->save();

        }


        //リダイレクト
        return redirect('/addition');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        movieList::find($id)->delete();

        return redirect('/addition');
    }
}
