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
        return view('forum_page')->with(['forums'=>Forum::latest()->paginate(10)]);
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
            'forum_topic_title' => 'required|string|unique:forums,title',
            'forum_add_category' => 'required|string',
            'forum_add_tags' => 'required|string',
            'forum_add_body' => 'required|string'
            //'featured_image' => 'nullable|mimes:jpg,png,svg,gif,jpeg|max:5000'
        ]);
        $forum = new Forum;
        $forum->title = $validated['forum_topic_title'];
        $forum->category_id = $validated['forum_add_category'];
        $forum->tags = json_encode(explode(',', preg_replace(['/,\s+/','/\s+,/'], [',',','], $validated['forum_add_tags'])));
        $forum->body = $validated['forum_add_body'];
        Auth::user()->forumCreator()->save($forum);
        /*
        if($request['featured_image']){
            $image = $validated['featured_image'];
            $image_url = $image->store('public/images');
            $forum->featured_image = $image_url;
            $forum->save();
        }
        */
        return redirect()->route('forums.show', $forum);
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
        return view('forum_page_single')->with('forum', $forum);
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
        $this->authorize('update', $forum);
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
        $this->authorize('update', $forum);
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
        $this->authorize('delete', $forum);
        $forum->delete();
    }

    public function single(Forum $forum, $slug){
        //$forum = Forum::find($id);
        $forum->views = $forum->views + 1;
        $forum->save();
        return view('forum_page_single')->with('forum', $forum);
    }

    public function search(Request $request){
        $validated = $request->validate(['seek' => 'required|string']);
        $param = $validated['seek'];
        return $this->filter($param);
    }

    public function filter($param){
        $string = str_replace('-', ' ',$param);
        //return
        $forums = Forum::join('categories', 'forums.category_id', 'categories.id')
                            ->where('title', 'like', "%{$string}%")
                            ->orWhere('tags', 'like', "%{$string}%")
                            ->orWhere('body', 'like', "%{$string}%")
                            ->orWhere('categories.name', $string)
                            ->select('forums.*' )
                            ->latest()->paginate(10);
        if($forums->isEmpty()){
            $message = 'No result was found for that search query';
        }else{
            $message = null;
        }
        return view('forum_page')->with(['forums' => $forums, 'message'=>$message]);
    }
}
