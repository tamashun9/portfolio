<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    // 配列内の要素を書き込み可能にする
    protected $fillable = [
        'post_id',
        'user_id'
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
}
