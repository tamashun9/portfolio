<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Post extends Model
{
    
    
    //Userに対するリレーション
    public function user()
    {   
        return $this->belongsTo('App\User');
    }
    
    //Commentに対するリレーション
    public function Comments()
    {
        return $this->hasMany('App\Comment');
    }
    
    //Likeに対するリレーション
    public function Likes()
    {
        return $this->hasMany('App\Like');
    }
    
    //Paginationインスタンスが返却される
    public function getPaginateByLimit(int $limit_count = 10)
    {
        // updated_atで降順に並べたあと、limitで件数制限をかける
        return $this::with('user')->orderBy('updated_at', 'DESC')->paginate($limit_count);
    }
    
    
    
    // 配列内の要素を書き込み可能にする
    protected $fillable = [
        'title',
        'body',
        'game',
        'user_id'
    ];
    
    public function is_liked_by_auth_user()
    {
        $id = Auth::id();
    
        $likers = array();
        foreach($this->likes as $like) {
          array_push($likers, $like->user_id);
        }
    
        if (in_array($id, $likers)) {
          return true;
        } else {
          return false;
        }
    }
    
    
}
