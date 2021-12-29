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
        <h1 class="title">FPSを始めたい人のための掲示板</h2>
            <div class="game_title">
                <a href="posts/index">脱初心者するための初心者</a>
            </div>
 
        @endsection               
    </body>
</html>