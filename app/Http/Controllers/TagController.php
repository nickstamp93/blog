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
        // display a view of all of our categories
        // along with a form to create a new category
        $tags = Tag::orderBy('name', 'asc')->paginate(10);

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
        //
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
    }
}
