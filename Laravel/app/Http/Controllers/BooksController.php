<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Author;
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

    // createFormメソッドです。著者の登録ができます。
    public function createForm()
    {
        $authors = Author::get(); //Authorモデル（authorsテーブル）からレコード情報を取得
        return view('books.createForm',['authors'=>$authors]);
    }

    // bookCreateメソッドです。本の登録ができます。
    public function bookCreate(Request $request)
    {
        $author_id = $request->input('author_id');
        $title = $request->input('title');
        $price = $request->input('price');

        Book::create([
            'author_id' => $author_id,
            'title' => $title,
            'price' => $price,
        ]);
        return redirect('/index');
    }
}
