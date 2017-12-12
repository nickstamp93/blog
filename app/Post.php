<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    // declare the one-to-many relationship between categories and posts
    public function category(){
        return $this->belongsTo('App\Category');
    }

    public function tags(){
        // belongsToMany (
        //"Model to relate to" ,
        // "table name" ,
        // "key of the current model in the intermediary table" ,
        // "key of the join model in the intermediary table" ,)
        return $this->belongsToMany('App\Tag','post_tag','post_id','tag_id');
    }

    public function comments(){
        return $this->hasMany('App\Comment');
    }
}
