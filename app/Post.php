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
        return $this->hasMany('App/Comment');
    }
    
    //Likeに対するリレーション
    public function Likes()
    {
        return $this->hasMany('App/Like');
    }
}
