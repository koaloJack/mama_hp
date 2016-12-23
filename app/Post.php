<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //
    public function photos(){

    return $this->hasMany('App\Image');

    }
    public function grids(){

    return $this->hasMany('App\Grid');

    }
}
