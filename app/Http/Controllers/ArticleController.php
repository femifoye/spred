<?php

namespace App\Http\Controllers;

use App\Article;
use App\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ArticleController extends Controller
{
    public function __construct(){
        return $this->middleware('auth')->except(['index','show','single', 'search', 'sort']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $articles = Article::latest()->paginate(5);
        return view('articles_page')->with(['articles' => $articles]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('article_create_form');
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
            'title' => 'required|string|unique:articles|max:150',
            'content' => 'required|string|unique:articles',
            'category_id' => 'required|numeric',
            'featured_image' => 'nullable|mimes:jpg,png,svg,gif,jpeg|max:5000'
        ]);
        $article = new Article;
        $article->title = $validated['title'];
        $article->content = $validated['content'];
        $article->category_id = $validated['category_id'];
        if($request['featured_image']){
            Auth::user()->creator()->save($article);
            $image = $validated['featured_image'];
            $image_url = $image->store('public/images');
            $article->featured_image = $image_url;
            $article->save();
        }else{
            Auth::user()->creator()->save($article);
        }

        return redirect()->route('single.article', [str_slug($article->title), $article->id])->with(['article' => $article, 'message' => 'article was uploaded successfully']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function show(Article $article)
    {
        //
        $related = Article::where('category_id', '=', $article->category_id)
                            ->whereNotIn('id', [$article->id])->paginate(10);
        return view('article_page')->with(['article' => $article, 'related' => $related]);
    }
    public function single(Article $article, $slug='', $id)
    {
        //
        //$str_unslug = str_replace('-', ' ', $slug);
        //$str_unslug = str_replace("'", "/'", $str_unslug);
        $article = Article::find($id);
        $related = Article::where('category_id', '=', $article->category_id)
                        ->whereNotIn('id', [$article->id])->paginate(10);
        return view('article_page')->with(['article' => $article, 'related' => $related]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function edit(Article $article)
    {
        //
        return view('article_create_form')->with(['article'=>$article, 'edit'=>true]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Article $article)
    {
        //
        $articleID = $article->id;
        $validated = $request->validate([
            'title' => 'required|string|unique:articles,title,'.$articleID.',id|max:150',
            'content' => 'required|string|unique:articles,content,'.$articleID.',id',
            'category_id' => 'required|numeric|min:1',
            'featured_image' => 'nullable|mimes:jpg,png,svg,gif,jpeg|max:5000'
        ]);

        $article->title = $validated['title'];
        $article->content = $validated['content'];
        $article->category_id = $validated['category_id'];
        //Delete the old image
        if($request->hasFile('featured_image')){
            if(Storage::exists($article->featured_image)){
                Storage::delete($article->featured_image);
            }
            $image = $validated['featured_image'];
            $image_url = $image->store('public/images');
            $article->featured_image = $image_url;
        }
        $article->save();
        return redirect()->route('single.article', [str_slug($article->title), $article->id])->with(['article' => $article, 'message' => 'article was updated successfully']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function destroy(Article $article)
    {
        //
        Storage::delete($article->featured_image);
        $article->delete();
        $articles = Article::paginate(20);
        return redirect()->route('articles.index')->with(['articles' => $articles]);
    }

    //Search for part of title string or part of content string
    public function search(Request $request, $param=null){
        if($validated = $request->validate(['seek'=>'required|string'])){
            $string = $validated['seek'];
        }elseif($param){
            $string = $param;
        }
        $articles = Article::join('categories', 'articles.category_id', 'categories.id')
                        ->where('title', 'like', "%{$string}%")
                        ->orWhere('content', 'like', "%{$string}%")
                        ->orWhere('categories.name', $string)->get();
        if($articles->isEmpty()){
            $message = 'No result was found for that search query';
        }else{
            $message = null;
        }
        return view('articles_page')->with(['articles' => $articles, 'message'=>$message]);
    }

    //Search for part of title string or part of content string
    public function sort($param){
        $string = str_replace('-', ' ',$param);
        $articles = Article::join('categories', 'articles.category_id', '=', 'categories.id')->where('categories.name', $string)->get();
        if($articles->isEmpty()){
            $message = 'No result was found for that search query';
        }else{
            $message = null;
        }
        return view('articles_page')->with(['articles' => $articles, 'message'=>$message]);
    }

}
