<?php

namespace App\Http\Controllers;

use App\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class TagController extends Controller
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
        // display a view of all of our tags
        // along with a form to create a new tag
//        $tags = Tag::orderBy('name', 'asc')->paginate(10);
        $tags = Tag::all();

        return view('tags.index')->withTags($tags);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // validate data (is all data acceptable???)
        $this->validate($request, array(
            'name' => 'required|min:3|max:50'
        ));

        // store into database
        $tag = new Tag;
        $tag->name = $request->name;

        $tag->save();

        Session::flash('success', 'Tag created successfully');

        // redirect to another page
        return redirect()->route('tags.index', $tag->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // show all posts that are tagged with a specific tag
        $tag = Tag::find($id);

        return view('tags.show')->withTag($tag);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $tag = Tag::find($id);

        return view('tags.edit')->withTag($tag);
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
        //
        // validate data (is all data acceptable???)
        $this->validate($request, array(
            'name' => 'required|min:3|max:50'
        ));

        // store into database
        $tag = Tag::find($id);
        $tag->name = $request->name;

        $tag->save();

        Session::flash('success', 'Tag saved successfully');

        // redirect to another page
        return redirect()->route('tags.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tag = Tag::find($id);

        // delete every association of this tag with a post
        $tag->posts()->detach();

        $tag->delete();

        Session::flash('success', 'The tag was deleted!');

        return redirect()->route('tags.index');
    }
}
