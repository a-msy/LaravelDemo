<?php

namespace Database\Seeders;

use App\Models\Book;
use Illuminate\Database\Seeder;

class BookTableSeeder extends Seeder
{
    /*
     * https://readouble.com/laravel/8.x/ja/seeding.html
     * */
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Book::factory()
            ->times(20)
            ->create();
    }
}
