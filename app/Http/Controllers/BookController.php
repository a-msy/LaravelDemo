<?php

/*
 * Controller を作る時は，コマンドラインで，php artisan make:controller HogeControllerとすると適当なものを作ってくれる．
 * */

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index()
    {

        /*　DBからのデータの取得　
        https://readouble.com/laravel/8.x/ja/eloquent.html
        */
        $books = Book::select('id', 'title')->orderBy('id', 'desc')->get();
        // dd($books); っていう関数を書くと，書いた部分よりしたが実行されずに変数の中身を見ることができる
        return view('books.index')
            ->with([
                'books' => $books,
            ]);
        /*
         * viewは点でファイルを指定する．たとえば，上記は，views/book/index.blade.phpを指定している
         *
         * withで，フロントに返す値を指定する．'hoge'=>$HogeHoge とすると，viewの中で$hogeという変数で扱える．
         * */
    }

    public function store(Request $request)
    {
        /*
         * $request っていう変数に，HTMLから受け取った値が入っている．
         * */
        $new_title = $request->input('input_title', "");

        $new_book = new Book();
        $new_book->title = $new_title;
        $new_book->save();

        return redirect(route('books.index'));
    }

    /*
     * 削除できるのはユーザを限るほうがセキュリティ的には安全
     * https://qiita.com/daisu_yamazaki/items/b946594896179abcd203
     * */
    public function delete(Request $request)
    {
        $book_id = $request->input('book_id', 0);
        Book::destroy($book_id);// 主キーのIDで削除をする
        return redirect(route('books.index'));
    }
}
