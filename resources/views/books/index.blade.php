{{-- views/layouts/app.blade.phpを継承させる．
これを書いておくと，デフォルトのHTML要素などを共通化させておける
--}}
@extends('layouts.app')
@section('addstyle')
{{--    mix関数は，webpack.mix.jsを一緒に使う--}}
    <link rel="stylesheet" href="{{mix('css/book.css')}}">
{{--

public/css以下に直接ファイルを作成して，読み込む方法もあるが画像とかだけにとどめておくのがおすすめ．
面倒だけど，公式の手法としてはmixを使うことになっているので，今回はmixを使う方法を書いておく

<link rel="stylesheet" href="{{  asset('css/hoge.css')}}">
--}}
@endsection
@section('content')
{{--    bladeのルールとして，
phpを実行したいところは，@から始める

--}}
<form action="{{ route('books.store') }}" method="POST">
{{--    name っていう属性に値が入っていて，この名前でバックエンドに渡せる--}}
    @csrf
{{--    @csrfはCSRF対策用のトークン　--}}
    <input type="text" name="input_title">
    <button type="submit">
        追加
    </button>
</form>
    @foreach($books as $book)
        <div>
            <p>ID:{{ $book->id }}</p>
            <p>TITLE:{{ $book->title }}</p>
            <form action="{{ route('books.delete') }}" method="POST">
                @csrf
                <input type="hidden" name="book_id" value="{{ $book->id }}">
                <button type="submit">
                    削除
                </button>
            </form>
        </div>
    @endforeach
@endsection
