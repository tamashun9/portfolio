<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>FPS初心者を応援する掲示板</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    <body>
        @extends('layouts.app')　　　　　　　　　　　　　　　　　　

        @section('content')
            <h1>脱FPS初心者するための掲示板</h1>
            <div class='posts'>
                @foreach ($posts as $post)
                    <div class='post'>
                        <h2 class='title'>
                            <a href="/posts/{{ $post->id }}">{{ $post->title }}</a>
                        </h2>
                        <small>{{ $post->user->name }}</small>
                        <p class='game_name'>{{ $post->game }}</p>
                        <p class='body'>{{ $post->body }}</p>
                    </div>
                @endforeach
            </div>
            
            <div class='paginate'>
                {{ $posts->links() }}
            </div>
            <div class=posts>
                <form action="/posts" method="POST">
                    @csrf
                    <div class="title">
                        <h2>タイトル</h2>
                        <input type="text" name="post[title]" placeholder="タイトル" value="{{ old('post.title') }}"/>
                        <p class="title__error" style="color:red">{{ $errors->first('post.title') }}</p>
                    </div>
                    <div class="game_name">
                        <h2>ゲームタイトル</h2>
                        <input type="text" name="post[game]" placeholder="ゲーム名" value="{{ old('post.game') }}"/>
                        <p class="title__error" style="color:red">{{ $errors->first('post.game') }}</p>
                    </div>
                    <div class="body">
                        <h2>本文</h2>
                        <textarea name="post[body]" placeholder="本文">{{ old('post.body') }}</textarea>
                        <p class="body__error" style="color:red">{{ $errors->first('post.body') }}</p>
                    </div>
                    <input type="submit" value="保存"/>
                </form>
            </div>
        
        @endsection
    </body>
</hyml>    