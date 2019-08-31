<?php

namespace App\Http\Controllers;

use App\Video;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

use Illuminate\Support\Facades\Auth;

class VideoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('videos_page')->with('videos', Video::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('video_create_form');
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
            'video_title' => 'required|string|max:100',
            'video_body' => 'required|string',
            'video_embed_link' => [
                'required',
                'url',
                Rule::unique('videos','url')->where(function($query){
                    return $query->where('user_id', auth()->user()->id);
                }),
            ],
        ]);
        $video = new Video;
        $video->title = $validated['video_title'];
        $video->url = $validated['video_embed_link'];
        $video->body = $validated['video_body'];
        auth()->user()->videos()->save($video);
        return redirect()->route('videos.show', $video);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Video  $video
     * @return \Illuminate\Http\Response
     */
    public function show(Video $video)
    {
        //
        return view('video_single')->with('video',$video);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Video  $video
     * @return \Illuminate\Http\Response
     */
    public function edit(Video $video)
    {
        //
        $this->authorize('update', $video);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Video  $video
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Video $video)
    {
        //
        $this->authorize('update', $video);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Video  $video
     * @return \Illuminate\Http\Response
     */
    public function destroy(Video $video)
    {
        //
        $this->authorize('delete', $video);
    }

    public function single(Video $video){
        return view('video_single')->with('video', $video);
    }
}
