<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //Gameに対するリレーション
    public function game()
    {
        return $this->belongsTo('App\Game');
    }
    
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
    
    //投稿作成用のモデル実装
    protected $fillable = [
        'title',
        'body',
        'game',
        'user_id'
    ];
    
}
