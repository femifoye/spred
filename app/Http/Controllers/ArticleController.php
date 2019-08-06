<?php

namespace App\Http\Controllers;

use App\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\CommentController;

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
            'forum_id' => 'required|numeric|min:1',
            'featured_image' => 'nullable|mimes:jpg,png,svg,gif,jpeg|max:5000'
        ]);
        $article = new Article;
        $article->title = $validated['title'];
        $article->content = $validated['content'];
        $article->category_id = $validated['category_id'];
        $article->forum_id = $validated['forum_id'];
        Auth::user()->articleCreator()->save($article);
        if($request['featured_image']){
            $image = $validated['featured_image'];
            $image_url = $image->store('public/images');
            $article->featured_image = $image_url;
            $article->save();
        }

        return redirect()->route('single.article', [strtolower(str_replace([' ', '?'], ['-', '::'], $article->title)), $article->id])->with(['success' => 'Article was uploaded successfully']);
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
        return $article;
        $related = Article::where('category_id', '=', $article->category_id)
                            ->whereNotIn('id', [$article->id])->paginate(10);
        return view('article_page')->with(['article' => $article, 'related' => $related]);
    }
    public function single(Article $article, $slug='', $id)
    {
        //
        //return
        $str_unslug = str_replace(['-', '::', ':.', '.:'], [' ', '?', '/', '\\'], $slug);
        $article = Article::where('title', '=', "{$str_unslug}")->first();
        $related = Article::where('category_id', '=', "{$article->category_id}")
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
            'forum_id' => 'required|numeric|min:1',
            'featured_image' => 'nullable|mimes:jpg,png,svg,gif,jpeg|max:5000'
        ]);

        $article->title = $validated['title'];
        $article->content = $validated['content'];
        $article->category_id = $validated['category_id'];
        $article->forum_id = $validated['forum_id'];
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
        return redirect()->route('single.article', [strtolower(str_replace([' ', '?'], ['-', '::'], $article->title)), $article->id])->with(['success' => 'Article was updated successfully']);
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
                        ->join('forums', 'articles.forum_id', 'forums.id')
                        ->where('title', 'like', "%{$string}%")
                        ->orWhere('content', 'like', "%{$string}%")
                        ->orWhere('categories.name', 'like', "%{$string}%")
                        ->orWhere('forums.name', 'like', "%{$string}%")
                        ->select('articles.*')
                        ->get();
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
        //return
        $articles = Article::join('categories', 'categories.id', 'articles.category_id')
                            ->join('forums', 'forums.id', 'articles.forum_id')
                            ->where('categories.name', $string)
                            ->orWhere('forums.name', $string)
                            ->select('articles.*' )
                            ->get();
        if($articles->isEmpty()){
            $message = 'No result was found for that search query';
        }else{
            $message = null;
        }
        return view('articles_page')->with(['articles' => $articles, 'message'=>$message]);
    }

    public function comment(Request $request, Article $article){
        $commentController = new CommentController;
        $commentController->store($request, $article);
        return redirect()->route('articles.show', $article);
    }

}
