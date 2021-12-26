<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
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
