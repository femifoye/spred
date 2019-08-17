<?php

namespace App\Http\Controllers;

use App\Article;
use App\Video;
use App\Admin\Poll;



use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth')->except('landing');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function landing() {
        function ranL($max, $minTake=5, $maxTake = 10){
            return $length = ($max < $minTake) ? $max :( ($max >= $minTake ) ? $minTake:(($max >= $maxTake) ? $maxTake:$max));
        };
        $artMax =  Article::count();
        $vidMax = Video::count();
        $pollMax = Poll::count();
        $Articlelength = ranL($artMax);
        $vidLen = ranL($vidMax,3,3);
        $pollLen = ranL($pollMax, 4, 4);
        $articles = Article::latest()->get()->random($Articlelength)->all();
        $videos = Video::latest()->get()->random($vidLen)->all();
        $polls = Poll::latest()->get()->random($pollLen)->all();
        
        return view('landing_page', compact('user'))->with(['articles' => $articles, 'videos'=>$videos, 'polls'=>$polls]);
    }
}
