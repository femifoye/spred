<?php

namespace App\Http\Controllers;

use App\Forum;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class ForumController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return Forum::where('approved', false)->get();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('create_forum');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $validated = $request->validate([
            'name' => 'required|string|unique:forums',
            'featured_image' => 'nullable|mimes:jpg,png,svg,gif,jpeg|max:5000'
        ]);
        $forum = new Forum;
        $forum->name = $validated['name'];
        Auth::user()->forumCreator()->save($forum);
        if($request['featured_image']){
            $image = $validated['featured_image'];
            $image_url = $image->store('public/images');
            $forum->featured_image = $image_url;
            $forum->save();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Forum  $forum
     * @return \Illuminate\Http\Response
     */
    public function show(Forum $forum)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Forum  $forum
     * @return \Illuminate\Http\Response
     */
    public function edit(Forum $forum)
    {
        //
        return view('create_forum')->with(['forum' => $forum, 'edit'=>true]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Forum  $forum
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Forum $forum)
    {
        //
        $validated = $request->validate([
            'name' => 'required|string|unique:forums',
            'featured_image' => 'nullable|mimes:jpg,png,svg,gif,jpeg|max:5000'
        ]);
        $forum->name = $validated['name'];
        Auth::user()->forumCreator()->save($forum);
        if($request['featured_image']){
            $image = $validated['featured_image'];
            $image_url = $image->store('public/images');
            $forum->featured_image = $image_url;
            $forum->save();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Forum  $forum
     * @return \Illuminate\Http\Response
     */
    public function destroy(Forum $forum)
    {
        //
        $forum->delete();
    }
}
