# Laravel Learning Demo Repository
- This repository you can learn the minimum CRUD in the Laravel 8 environment.
- Accept pull requests etc.
- Please feel free to fork.

# Install Guide

## I recommend XAMPP on Windows. Sorry I don't have Mac...

1. Before clone this repository, You should install `composer` and `Node.js`
2. Clone this repository where you like place. And move to laraveldemo folder.
3. Run command `composer install`
4. Setting the .env
5. Run command `npm install`
6. Key gen `php artisan key:generate`
7. clear config cache `php artisan config:clear`
8. Migration `php artisan migrate --seed`
   - when you reset DB `php artisan migrate:refresh`
9. Serve `php artisan serve`

## 作業の流れ

- DBテーブルを作る　`php artisan make:migration create_hoges_table`
    - 作成後は都度，`php artisan migrate`を実行
    - 失敗して戻したいときは `php artisan migrate:rollback`
- テーブルと紐づくModelの作成　`php artisan make:model Hoge`
    - ルール：　テーブル名はなるべく複数形で，Model名は先頭大文字でそのテーブルの単数形
- Controllerの作成　`php artisan make:controller HogeController`
- routeの作成  
    - routes/web.php に追記をしていく
- Viewを作成
