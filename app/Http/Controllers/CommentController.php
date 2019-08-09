<?php

namespace App\Http\Controllers;

use App\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use App\Article;
use App\Forum;
use App\Video;

class CommentController extends Controller
{
    public function __construct(){
        return $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $commentable)
    {
        //
        if ($request->is('comment/article*')) {
            $commentable = Article::find($commentable);
        }elseif ($request->is('comment/forum*')) {
            $commentable = Forum::find($commentable);
        }elseif ($request->is('comment/video*')) {
            $commentable = Video::find($commentable);
        }
        $comment = new Comment;
        $validated = $request->validate([
            'comment' => [
                'required',
                Rule::unique('comments', 'body')->where(function ($query) {
                    return $query->where('commenter_id', auth()->user()->id);
                }),
            ]
        ]);
        $comment->body = $validated['comment'];
        $comment->commenter_id = Auth::user()->id;
        $commentable->comments()->save($comment);
        if ($comment->commentable_type == 'App\Article') {
            return redirect()->route('single.article', [$commentable, str_slug($commentable->title)]);
        }elseif ($comment->commentable_type == 'App\Forum') {
            return redirect()->route('single.forum', [$commentable, $commentable->id]);;
        }elseif ($comment->commentable_type == 'App\Forum') {
            return redirect()->route('video_single', [$commentable, $commentable->id]);
        }
        return redirect()->route('home');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function show(Comment $comment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function edit(Comment $comment)
    {
        //
        $this->authorize('update', $comment);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Comment $comment)
    {
        //
        $this->authorize('update', $comment);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Comment $comment)
    {
        //
        $this->authorize('delete', $comment);
        $comment->delete();
    }
}
