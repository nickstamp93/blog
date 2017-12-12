<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class CommentsController extends Controller
{

    public function __construct()
    {
        // if a user is not logged in, should not be able to access this controller
        // so the middleware protects it
        $this->middleware('auth',['except' => 'store']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request , $post_id)
    {
        //

        // validate data (is all data acceptable???)
        $this->validate($request, array(
            'comment' => 'required|min:5|max:2000'
        ));

        $post = Post::find($post_id);

        $comment = new Comment;

        if (Auth::check()){
            $comment->name = Auth::user()->name;
            $comment->email = Auth::user()->email;
        }else{
            $comment->name = "anonymous";
            $comment->email = "anonymous@gmail.com";
        }
        $comment->comment = $request->comment;
        $comment->post()->associate($post);

        $comment->save();

        Session::flash('success', 'Comment added');

        // redirect to another page
        return redirect()->route('blog.single', $post->slug);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $comment = Comment::find($id);

        return view('comments.edit')->withComment($comment);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, array(
            'comment' => 'required|min:5|max:2000'
        ));

        $comment = Comment::find($id);

        $comment->comment = $request->comment;
        $comment->save();

        Session::flash('success', 'Comment updated');

        // redirect to another page
        return redirect()->route('posts.show', $comment->post->id);


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $comment = Comment::find($id);

        $post_id = $comment->post->id;

        $comment->delete();

        Session::flash('success', 'The comment was deleted!');

        // redirect to another page
        return redirect()->route('posts.show', $post_id);
    }
}
