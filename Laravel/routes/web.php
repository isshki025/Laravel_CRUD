<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

// 『"Hello World !"と表示されるだけのページ』を作成
// Route::get('/hello', function(){
//     echo 'Hello World !';
// });

Route::get('/hello', 'BooksController@hello');

// カリキュラムではこの記述だが、本来は下の記述が理想。
Route::get('/index', 'BooksController@index');
// Route::get('/books', 'BooksController@index');

// 著者や本を登録するページを表示する
Route::get('/create-form', 'BooksController@createForm');

// 著者を登録する処理を実行する
Route::post('/author/create', 'AuthorsController@authorCreate');

// 本を登録する処理を実行する
Route::post('/book/create', 'BooksController@bookCreate');

//本の情報を更新(修正・編集)する
Route::get('/book/{id}/update-form', 'BooksController@updateForm');

//本の情報を削除する
Route::get('/book/{id}/delete', 'BooksController@delete');

Route::post('/search', 'BooksCOntroller@search');
