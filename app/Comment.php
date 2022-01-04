<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = [
        'user_id',
        'post_id',
        'body'
    ];
    
    //Postに対するリレーション
    public function post()
    {
        return $this->belongsTo('App\Post');
    }
    
    //Userに対するリレーション
    public function user()
    {   
        return $this->belongsTo('App\User');
    }
    
    public function getByLimit(int $limit_count = 10)
    {
    
    return $this::with('user')->orderBy('updated_at', 'DESC')->limit($limit_count)->get();
    }
}
