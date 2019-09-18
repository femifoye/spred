<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Forum;
use Illuminate\Support\Facades\Auth;

class ForumController extends Controller
{
    public function __construct(){
        $this->authorizeResource(Forum::class, 'forum');
        return $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admins.admin_view_forum')->with('forums', Forum::latest()->paginate(20));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admins.admin_create_forum');
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
            'forum_add_category' => 'required|integer',
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
        return redirect()->route('admin.forums.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Forum $forum)
    {
        //
        return view('admins.admin_create_forum')->with('forum', $forum);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Forum $forum)
    {
        //
        return view('admins.admin_create_forum')->with('forum', $forum);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Forum $forum)
    {
        //

        $validated = $request->validate([
            'forum_topic_title' => 'required|string|unique:forums,title,'.$forum->id.',id',
            'forum_add_category' => 'required|integer',
            'forum_add_tags' => 'required|string',
            'forum_add_body' => 'required|string'
            //'featured_image' => 'nullable|mimes:jpg,png,svg,gif,jpeg|max:5000'
        ]);
        $forum->title = $validated['forum_topic_title'];
        $forum->category_id = $validated['forum_add_category'];
        $forum->tags = json_encode(explode(',', preg_replace(['/,\s+/','/\s+,/'], [',',','], $validated['forum_add_tags'])));
        $forum->body = $validated['forum_add_body'];
        Auth::user()->forumCreator()->save($forum);
        return redirect()->route('admin.forums.index');
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
