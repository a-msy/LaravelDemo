<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;
    protected $table = "books";

    /* ここに，Tableが持つカラムを書いていく
    id, updated_at, created_at はデフォルトで認識してくれるので書く必要はない

    https://readouble.com/laravel/8.x/ja/eloquent.html

    */
    protected $fillable = [
       'title'
    ];
}
