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
//ミドルウェアを指定
Route::group(['middleware' => 'auth'], function(){
    Route::get('/', 'PostController@index');
    Route::get('/posts/{post}/edit', 'PostController@edit');
    Route::put('/posts/{post}', 'PostController@update');
    Route::delete('/posts/{post}', 'PostController@delete');
    Route::get('/posts/{post}', 'PostController@show');
    Route::post('/posts', 'PostController@store');
    Route::get('/posts/like/{id}', 'PostController@like')->name('post.like');
    Route::get('/posts/unlike/{id}', 'PostController@unlike')->name('post.unlike');
    Route::post('/posts/{post}/comments', 'CommentController@store');
    
});


Auth::routes(); 


Route::get('/home', 'HomeController@index')->name('home');
