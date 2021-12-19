<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('/posts/toppage');
});
Route::get('/posts/apex', 'PostController@apex');
Route::get('/posts/apex/{post}', 'PostController@show');