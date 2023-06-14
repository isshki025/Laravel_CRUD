<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Author;

class AuthorsController extends Controller
{
    //authorCreateメソッドです。
    public function authorCreate(Request $request)
    {
        // バリデーションチェック required=必須 | unique:authors,name = 同じ著者名・作品名はダメ | max:10 = 10文字以内
        $request->validate([
            'authorName' => 'required|unique:authors,name|max:10',
        ]);

        $name = $request->input('authorName'); //requestで送られた値をauthorNameに格納するという処理に"name"という名前を付けた
        Author::create(['name' => $name]);// authorテーブルのnameカラムに"name"を登録させる
        return back();// 元いたページ(/create-formページ)に戻る
    }
}
