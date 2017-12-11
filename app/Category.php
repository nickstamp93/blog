<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    // we should do this declaration because the convention
    // assumes if we have model Post then table name is posts
    // if we have model User then table name is users
    // so now it assumes that the table name is categorys (which is not the case)
    // so we point to the correct table name manually
    protected $table = 'categories';

    // declare the one-to-many relationship between categories and posts
    public function posts(){
        return $this->hasMany('App\Post');
    }
}
