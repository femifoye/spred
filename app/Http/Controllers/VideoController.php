<?php

namespace App\Http\Controllers;

use App\Video;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
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
        $featured_video = Video::where('is_featured', true)->first();
        return view('videos_page')->with(['videos' => Video::latest()->paginate(10), 'featured'=>$featured_video]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Video  $video
     * @return \Illuminate\Http\Response
     */
    public function show(Video $video)
    {
        //Views incrementor
        $viewController = new ViewController;
        $viewController->incrementViews($video);

        return view('video_single')->with('video',$video);
    }

    public function single(Video $video){
        //Views Incrementor
        $viewController = new ViewController;
        $viewController->incrementViews($video);

        return view('video_single')->with('video', $video);
    }
}
