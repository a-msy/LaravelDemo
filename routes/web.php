<?php

use App\Http\Controllers\BookController;
use Illuminate\Support\Facades\Route;

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

/* https://readouble.com/laravel/8.x/ja/routing.html
 * ルートに関する記載
 * /books/index　などとしてアクセスできるページでどんな処理を行わせるのかということを書いていく
 * ここで指定したControllerは，app/Http/Controllers の中にある．
 *
 * 基本的にはこのprefix以下でControllerを分ける
 *  */
Route::prefix('books')->name('books.')->group(function () {
    /* name をつけておくと，route()関数を使って，viewやControllerで名前で指定ができる
    　ex) route('books.index')のような感じ
     */
    Route::get('index',[ BookController::class, 'index' ])->name('index');
    Route::post('store',[ BookController::class, 'store' ])->name('store');
    Route::post('delete',[ BookController::class, 'delete' ])->name('delete');
});
