<!DOCTYPE HTML>
<html lang="{{ str_replace("_", "-", app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>FPS初心者を応援する掲示板</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link rel="stylesheet" href="/css/app.css">
    </head>
    <body>
        @extends('layouts.app')　　　　　　　　　　　　　　　　　　

        @section('content')
            <h1 class="title">
                {{ $post->title }}
            </h1>
            
            <p>{{ $post->game }}</p>
            <div class="content">
                <div class="content__post">
                    <h3>本文</h3>
                    <p>{{ $post->body }}</p>    
                </div>
            </div>
            <p class="edit">[<a href="/posts/{{ $post->id }}/edit">編集</a>]</p>
            
          
    
            <h2>コメント一覧</h2>
            
              @forelse ($post->comments as $comment)
              <p>{{ $comment->body }}</p>
              <p>投稿者:{{ $comment->user->name }}</p>
                           
              @empty
              <p>まだコメントはありません</p>
              @endforelse
            
            
            
            <h2>コメントする</h2>
            <form method="POST" action="{{ action('CommentController@store', $post->id) }}">
                @csrf
                <div>
                    
                    <input class="form-control" type="text" name="body" placeholder="body" value="{{ old('body') }}">
                
                </div>
                
                    
                <p>
                    @if ($errors->has('body'))
                    <span class="error" style="color:red">{{ $errors->first('body') }}</span>
                    @endif
                </p>
              
                
                <button type="submit" class="btn btn-primary">送信</button>
                
            </form>
            <p><a href="/posts/index">戻る</a></p>
        @endsection
    </body>
</html>