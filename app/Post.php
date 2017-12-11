<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    // declare the one-to-many relationship between categories and posts
    public function category(){
        return $this->belongsTo('App\Category');
    }
}
