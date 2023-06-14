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

    // updateFormメソッドです。
    public function updateForm($id)
    {
        $book = Book::where('id', $id)->first();
        return view('books.updateForm', ['book'=>$book]);
    }

    // updateメソッドです。本の情報の更新(編集・修正)処理をします
    public function update(Request $request)
    {
        // 1つ目の処理
        $id = $request->input('id');
        $up_title = $request->input('upTitle');
        $up_price = $request->input('upPrice');
        // 2つ目の処理
        Book::where('id', $id)->update([
            'title' => $up_title,
            'price' => $up_price
        ]);
        // 3つ目の処理
        return redirect('/index');
    }

    //deleteメソッドです。本の情報を削除します。
    public function delete($id)
    {
        Book::where('id', $id)->delete();
        return redirect('/index');
    }

    //searchメソッドです。
    public function search(Request $request)
    {
        $keyword = $request->input('keyword');

        if(!empty($keyword)){
            $books = Book::where('title','like', '%'.$keyword.'%')->get();
        }else{
            $books = Book::all();
        }

        return view('books.index',['books'=>$books]);
    }
}
