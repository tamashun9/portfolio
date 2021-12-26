<?php

namespace App\Http\Controllers;

use App\Post;
use App\Http\Requests\PostRequest;

class PostController extends Controller
{
    public function index(Post $post)
    {
        return $post->get();
    }
    
    public function apex(Post $post)
    {
       return view('posts/index')->with(['posts' => $post->getPaginateByLimit()]);
       return view('posts/index');
    }
    
    /**
     * 特定IDのpostを表示する
    *
    * @params Object Post // 引数の$postはid=1のPostインスタンス
    * @return Reposnse post view
    */
    public function show(Post $post)
    {
        return view('posts/show')->with(['post' => $post]);
    }
    
    
    public function store(Post $post, PostRequest $request) 
    {
        $input = $request['post'];
        $input += ['user_id' => $request->user()->id];
        $post->fill($input)->save();
        return redirect('/posts/' . $post->id);
    }
    
        
    

}
