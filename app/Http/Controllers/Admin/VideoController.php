<?php

namespace App\Http\Controllers\Admin;

use App\Video;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Validation\Rule;

use Illuminate\Support\Facades\Auth;

class VideoController extends Controller
{
    public function __construct(){
        $this->authorizeResource(Video::class, 'video');
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admins.admin_view_videos')->with('videos', Video::latest()->paginate(10));
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
        // return $request->is_featured;
        $validated = $request->validate([
            'video_title' => 'required|string|max:100',
            'video_body' => 'required|string',
            'featured_video' => 'nullable|boolean',
            'video_embed_link' => [
                'required',
                'url',
                Rule::unique('videos','url')->where(function($query){
                    return $query->where('user_id', auth()->user()->id);
                }),
            ],
        ]);
        $video = new Video;
        $prev_featured_video = Video::where('is_featured', true)->first();
        if($prev_featured_video && $validated['featured_video']){
            $prev_featured_video->is_featured = false;
            $prev_featured_video->save();
            $video->is_featured = $validated['featured_video'];
        }
        $video->title = $validated['video_title'];
        $video->url = $validated['video_embed_link'];
        $video->body = $validated['video_body'];
        auth()->user()->videos()->save($video);
        return redirect()->route('admin.videos.show', $video);
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
        return view('video_create_form')->with('video', $video);
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
        $validated = $request->validate([
            'video_title' => 'required|string|max:100',
            'video_body' => 'required|string',
            'featured_video' => 'nullable|boolean',
            'video_embed_link' => 'required|url',
        ]);
        $prev_featured_video = Video::where('is_featured', true)->first();
        if($prev_featured_video && $validated['featured_video']){
            $prev_featured_video->is_featured = false;
            $prev_featured_video->save();
            $video->is_featured = $validated['featured_video'];
        }
        $video->title = $validated['video_title'];
        $video->url = $validated['video_embed_link'];
        $video->body = $validated['video_body'];
        $video->save();
        return redirect()->route('admin.videos.show', $video);
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
        if($video->is_featured){
            $new_featured_video = Video::where('is_featured', false)->first();
            $new_featured_video->is_featured = true;
            $new_featured_video->save();
        }
        $video->delete();
        return redirect('/admin/dashboard');
    }

    public function single(Video $video){
        return view('video_single')->with('video', $video);
    }

    public function featureVideo(Video $video){
        $prev_featured_video = Video::where('is_featured', true)->first();
        if($prev_featured_video){
            $prev_featured_video->is_featured = false;
            $prev_featured_video->save();
        }
        $video->is_featured = true;
        $video->save();
        return redirect()->route('admin.videos.index');
    }
}
