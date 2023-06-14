<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Book;

class BooksController extends Controller
{
    // これがhelloメソッドです。
    public function hello()
    {
        echo 'hello world!<br>';
        echo 'コントローラーを使ったルーティング成功です。';
    }

    //これがindexメソッドです。
    public function index()
    {
        $books = Book::get(); //Bookモデル（booksテーブル）からレコード情報を取得
        return view('books.index',['books'=>$books]);
    }
}
