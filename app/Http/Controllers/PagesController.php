<?php

namespace App\Http\Controllers;

use App\Post;

class PagesController extends Controller
{

    public function getIndex()
    {
        # process variable data or params
        # talk to the model
        # receive info from the model
        # compile or process data from the model if needed
        # pass data to the correct view

//        $posts = Post::orderBy('created_at','desc')->limit(5)->get();
        $posts = Post::paginate(5);

        return view('pages.welcome')->withPosts($posts);
    }

    public function getAbout()
    {

        $firstName = "Nick";
        $lastName = "Stamp";

        $fullName = $firstName . " " . $lastName;

        $email = "nickstamp93@gmail.com";

        $data = [];
        $data['email'] = $email;
        $data['fullName'] = $fullName;

        return view('pages.about')
            ->withData($data);

//        return view('pages.about')
//            ->withFullName($fullName)
//            ->withEmail($email);
    }

    public function getContact()
    {
        return view('pages.contact');
    }

}