<!DOCTYPE HTML>
<html lang="{{ str_replace("_", "-", app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>脱FPS初心者するための掲示板</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link rel="stylesheet" href="/css/app.css">
    </head>
    <body>
        @extends('layouts.app')　　　　　　　　　　　　　　　　　　

        @section('content')
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header"><h1 class="card-title">脱FPS初心者するための掲示板</h3></div>          
                            <div class="card-body">
                                    <div class="card">
                                        <div class="card-header"><h5 class="card-title">投稿者:{{ $post->user->name }}</h6></div>
                                        <div class="card-body">
                                            <h5 class="card-title">{{ $post->title }}</h5>
                                            <h5 class="card-title">{{ $post->game }}</h5>
                                            <p class='card-text'>{{ $post->body }}</p>
                                            
                                                
                                            {{ $post->likes->count() }}
                                            <div>
                                                @if($post->is_liked_by_auth_user())
                                                    <a href="{{ route('post.unlike', ['id' => $post->id]) }}" class="btn btn-success btn-sm">いいね<span class="badge">{{ $post->likes->count() }}</span></a>
                                                @else
                                                    <a href="{{ route('post.like', ['id' => $post->id]) }}" class="btn btn-secondary btn-sm">いいね<span class="badge">{{ $post->likes->count() }}</span></a>
                                                @endif
                                            </div>
                                                
                                            <p class="edit">[<a href="/posts/{{ $post->id }}/edit">編集</a>]</p>
                                            <form action="/posts/{{ $post->id }}" id="form_{{ $post->id }}"method="post" style="display:inline">
                                                {{ csrf_field() }}
                                                {{ method_field('DELETE') }}
                                                <input type="submit" style="display:none"> 
                                                <p class="delete">[<span onclick="return deletePost(this);">削除</span>]</p>
                                            </form>
                                        </div>    
                                    </div>    
                                        
                                      
                                
                                    <div class="p-3">
                                        
                                        <div class="card">
                                            <div class="card-header"><h3 class="card-title">アドバイス一覧</h5></div>
                                                <div class="card-body">
                                                    @forelse ($post->comments as $comment)
                                                    <p class="card-text">{{ $comment->body }}</p>
                                                    <p class="card-text">投稿者:{{ $comment->user->name }}</p>
                                                    @empty
                                                    <p class="card-text">まだアドバイスはありません</p>
                                                    @endforelse
                                                </div>    
                                        </div>
                                    </div>    
                                    
                                   
                                    <form action="{{ action('CommentController@store', $post->id) }}" method="POST">
                                        <div class="card">
                                            <div class="card-header"><h3 class="card-title">アドバイスする</h5></div>
                                                <div class="card-body">        
                                                    @csrf
                                                    <input class="form-control" type="text" name="body" placeholder="アドバイス" value="{{ old('body') }}">
                                                    <p>
                                                        @if ($errors->has('body'))
                                                        <span class="error" style="color:red">{{ $errors->first('body') }}</span>
                                                        @endif
                                                    </p>
                                                    <button type="submit" class="btn btn-primary">送信</button>
                                                </div>
                                        </div>        
                                    </form>
                                    <p><a href="/">戻る</a></p>
                            </div>
                    </div>
                </div>
            </div>    
        </div>    
                
        @endsection
    </body>
    <script>
        function deletePost(e) {
            'use strict';
            if(confirm('本当に削除しますか？')) {
                document.getElementById("form_{{ $post->id }}").submit();
            }
        }
    </script>   
    
</html>