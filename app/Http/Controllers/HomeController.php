<?php

namespace App\Http\Controllers;

use App\Article;

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
        $this->middleware('auth');
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
        $articles = Article::latest()->paginate(12);
        return view('landing_page')->with(['articles' => $articles]);
    }
}
