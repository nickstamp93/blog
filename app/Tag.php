<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    //
    public function tags(){
        // belongsToMany (
        //"Model to relate to" ,
        // "table name" ,
        // "key of the current model in the intermediary table" ,
        // "key of the join model in the intermediary table" ,)
        return $this->belongsToMany('App\Tag','post_tag','tag_id','post_id');
    }
}
