<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CommentRequest;

use App\Http\Controllers\Controller;
use App\Comment;
use App\Post;


class CommentController extends Controller
{
    
    
    
    public function store(CommentRequest $request, $postId)
    {
        $comment = new Comment(['body' => $request->body, 'user_id' => $request->user()->id]);
        $post = Post::findOrFail($postId);
        $post->comments()->save($comment);
        
        return redirect()
            ->action('PostController@show', $post->id);
    }
    


}
?>
