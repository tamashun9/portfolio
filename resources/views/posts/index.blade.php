<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>脱FPS初心者するため掲示板</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    <body>
        @extends('layouts.app')　　　　　　　　　　　　　　　　　　

        @section('content')
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header"><h1 class="card-title">脱FPS初心者するため掲示板</h1></div>      
                        <div class="card-body">
                            @foreach ($posts as $post)
                                <div class="card">
                                    <div class="card-header"><h5 class="card-title">投稿者:{{ $post->user->name }}</h5></div>
                                    <div class="card-body">
                                        <h5 class="card-title">
                                            <a href="/posts/{{ $post->id }}">{{ $post->title }}</a>
                                        </h5>
                                        <h5 class='card-title'>{{ $post->game }}</h5>
                                        <p class='card-text'>{{ $post->body }}</p>
                                        <p class='card-text'>いいね{{ $post->likes->count() }}</p>
                                    </div>
                                </div>
                                <br>
                            @endforeach

                                <div class='paginate'>
                                    {{ $posts->links() }}
                                </div>
                                <br>
                                
                                <div class="card">
                                    <div class="card-header"><h3 class="card-title">投稿する</h5></div>
                                    <div class="card-body">
                                        <form action="/posts" method="POST">
                                            @csrf
                                            <div class="card-body">
                                               <h5 class="card-title">タイトル</h5>
                                                <input class="form-control"　type="text" name="post[title]" placeholder="タイトル" value="{{ old('post.title') }}"/>
                                                <p class="title__error" style="color:red">{{ $errors->first('post.title') }}</p>
                                            </div>
                                            <div class="card-body">
                                                <h5 class="card-title">ゲームタイトル</h5>
                                                <input　class="form-control" type="text" name="post[game]" placeholder="ゲーム名" value="{{ old('post.game') }}"/>
                                                <p class="title__error" style="color:red">{{ $errors->first('post.game') }}</p>
                                            </div>
                                            <div class="card-body">
                                                <h5 class="card-title">本文</h5>
                                                <textarea　class="form-control" type="form-control" name="post[body]" placeholder="本文">{{ old('post.body') }}</textarea>
                                                <p class="body__error" style="color:red">{{ $errors->first('post.body') }}</p>
                                            </div>
                                            <input type="submit" value="投稿"/>
                                        </form>
                                    </div>    
                                </div>
                            <br>
                            
                            <div class="card">
                                <div class="card-header"><h3 class="card-title">初心者におすすめなFPSゲーム紹介</h3></div>
                                <div class="card-body">
                                    <h5 class="card-title">Apex Legends</h5>
                                    <p class='card-text'>現在、日本で最も人気なるFPSゲームです。操作面でもルールでも比較的簡単で分かりやすいゲームなので初心者でも始めやすいゲーム。</p>
                                    <p class='card-text'>
                                        <iframe id="player" width="560" height="315" src="https://www.youtube.com/embed/1R559DWBYbU?enablejsapi=1" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                    </p>
                                </div>
                            </div>

                        </div>
                    </div> 
                </div>    
            </div>
        </div>    
        @endsection
    </body>
</hyml>    