<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    //Postに対するリレーション
    public function posts()   
    {
        return $this->hasMany('App\Post');  
    }
}
