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
