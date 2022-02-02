<!DOCTYPE HTML>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>脱FPS初心者するため掲示板</title>
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
                                <form action="/posts/{{ $post->id }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <div class='card-body'>
                                        <h5 class="card-title">タイトル</h5>
                                        <input　class="form-control"  type='text' name='post[title]' value="{{ $post->title }}">
                                    </div>
                                    <div class='card-body'>
                                        <h5 class="card-title">ゲームタイトル</h5>
                                        <input　class="form-control"  type='text' name='post[game]' value="{{ $post->game }}">
                                    </div>
                                    <div class='card-body'>
                                        <h5 class="card-title">本文</h5>
                                        <input　class="form-control"  type='text' name='post[body]' value="{{ $post->body }}">
                                    </div>
                                    <input type="submit" value="保存">
                                </form>
                                <div class="back">[<a href="/">戻る</a>]</div>
                            </div>
                        </div>
                    </div>    
                </div>        
            </div>
        </div>    
        @endsection
    </body>
   
   
</html>