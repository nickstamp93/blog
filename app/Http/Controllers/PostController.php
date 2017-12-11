<?php

namespace App\Http\Controllers;

use App\Category;
use App\Post;
use App\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class PostController extends Controller
{

    public function __construct()
    {
        // if a user is not logged in, should not be able to access this controller
        // so the middleware protects it
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // create a variable and store all blog posts in it
        $posts = Post::orderBy('id', 'desc')->paginate(5);

        // return a view and pass in the created variable
        return view('posts.index')->withPosts($posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $categories = Category::all();

        $tags = Tag::all();

        return view('posts.create')->withCategories($categories)->withTags($tags);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        // validate data (is all data acceptable???)
        $this->validate($request, array(
            'title' => 'required|max:180',
            'category_id' => 'required|integer',
            'slug' => 'required|alpha_dash|min:5|max:180|unique:posts,slug',
            'body' => 'required'
        ));

        // store into database
        $post = new Post;
        $post->title = $request->title;
        $post->slug = $request->slug;
        $post->category_id = $request->category_id;
        $post->body = $request->body;

        $post->save();

        // this is the way to add all post-tag pairs in the intermediary table post_tag
        // we pass true because on update we want to keep the previous associations (which are empty anyway)
        $post->tags()->sync($request->tags, false);

        Session::flash('success', 'Blog post created successfully');

        // redirect to another page
        return redirect()->route('posts.show', $post->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::find($id);
        return view('posts.show')->withPost($post);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // find the post in the db and save it in a variable
        $post = Post::find($id);

        $categories = Category::all();

        $tags = Tag::all();

        // return an edit view and pass the post variable
        return view('posts.edit')->withPost($post)->withCategories($categories)->withTags($tags);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        // when updating a row and validating, when checking for unique slug, we should ignore the update row!!!
        $this->validate($request, array(
            'title' => 'required|max:180',
            'category_id' => 'required|integer',
            'slug' => 'required|alpha_dash|min:5|max:180|unique:posts,slug,' . $id,
            'body' => 'required'
        ));

        // save new data to the database
        $post = Post::find($id);
        $post->title = $request->input('title');
        $post->slug = $request->input('slug');
        $post->category_id = $request->input('category_id');
        $post->body = $request->input('body');

        $post->save();

        // this is the way to add all post-tag pairs in the intermediary table post_tag
        // we pass true because on update we want to delete the previous associations
        $post->tags()->sync($request->tags, true);

        // set flash data with success message
        Session::flash('success', 'Blog post changes saved');

        // redirect with flash data to  posts.show
        return redirect()->route('posts.show', $post->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $post = Post::find($id);

        $post->delete();

        Session::flash('success', 'The post was deleted!');

        return redirect()->route('posts.index');
    }
}
