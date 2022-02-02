<?php

namespace App\Http\Controllers;


use App\Post;
use App\Like;
use App\Http\Requests\PostRequest;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function index(Post $post)
    {
       return view('posts/index')->with(['posts' => $post->getPaginateByLimit(10)]);
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
    
    public function edit(Post $post)
    {
        return view('posts/edit')->with(['post' => $post]);
    }
    
    public function update(PostRequest $request, Post $post)
    {
        $input_post = $request['post'];
        $input_post += ['user_id' => $request->user()->id];
        $post->fill($input_post)->save();
        return redirect('/posts/' . $post->id);
    }
    
    
    
    public function store(Post $post, PostRequest $request) 
    {
        $input = $request['post'];
        $input += ['user_id' => $request->user()->id];
        $post->fill($input)->save();
        return redirect('/posts/' . $post->id);
    }
    
    public function like($id)
    { 
        Like::create([
          'post_id' => $id,
          'user_id' => Auth::id(),
        ]);

        session()->flash('success', 'You Liked the Reply.');

        return redirect()->back();
    }
    
    public function unlike($id)
    {
        $like = Like::where('post_id', $id)->where('user_id', Auth::id())->first();
        $like->delete();
    
        session()->flash('success', 'You Unliked the Reply.');
    
        return redirect()->back();
    }
    
    public function delete(Post $post)
    {   
        $post->delete();
        return redirect('/');
    }    
   
}

