<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

class BlogController extends Controller
{

    public function getIndex(){
        $posts = Post::paginate(2);

        return view('./blog.index')->withPosts($posts);
    }

    //
    public function getSingle($slug)
    {
        // fetch from the db based on the slug provided
        $post = Post::where('slug', '=', $slug)->first();

        // return a view and pass the post object
        return view('blog.single')->withPost($post);
    }
}
