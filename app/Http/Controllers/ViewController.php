<?php

namespace App\Http\Controllers;

use App\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class ViewController extends Controller
{
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\View  $view
     * @return \Illuminate\Http\Response
     */
    public function show(View $view)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\View  $view
     * @return \Illuminate\Http\Response
     */
    public function edit(View $view)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\View  $view
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, View $view)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\View  $view
     * @return \Illuminate\Http\Response
     */
    public function destroy(View $view)
    {
        //
    }

    protected function makeViewerID(){
        if(auth::check()){
            return Auth::id();
        }else{
            return Str::random(100);
        }
    }

    public function updateLoginViewerID(){
        $visitID = $this->getViewerIDFromCurrentDevice();
        if($visitID && View::where('viewer_id', $visitID)->update(['viewer_id' => auth::id()])){
            $this->deleteViewerIDOnCurrentDevice();
        }
    }

    protected function getViewerIDFromCurrentDevice(){
        //
        return (isset($_COOKIE['viewer_id']))?$_COOKIE['viewer_id']:NULL;
    }

    protected function saveViewerIDOnCurrentDevice($id){
        //
        if(auth::check()){
            $sentid = auth::id();
            return $sentid;
        }else{
            $sentid = $id;
            setcookie('viewer_id', $id, time()+60*60*24*120, '/');
            return $sentid;
        }
    }

    protected function deleteViewerIDOnCurrentDevice(){
        //
        if(auth::check()){
            setcookie('viewer_id', '', time() - 60*60*24*120, '/');
        }
    }

    public function incrementViews($post){
        //If this is the viewer's first time of using this site (not logged in), make viewer id;
        //and store viewer id on database and on device (browser).
        if($this->getViewerIDFromCurrentDevice() == NULL){
            $viewer_id = $this->saveViewerIDOnCurrentDevice($this->makeViewerID());
            if(($this->getViewerIDFromCurrentDevice()
                && ($post->views()->where('viewer_id', $this->getViewerIDFromCurrentDevice())->get())->isEmpty())
                || (auth::check() && ($post->views()->where('viewer_id', auth::id())->get())->isEmpty())
                || ($post->views()->where('viewer_id', $viewer_id)->get())->isEmpty()
            ){
                $view = new View;
                $view->viewer_id = $viewer_id;
                $view->count = 1;
                $post->views()->save($view);
            }
        }else{
            $viewer_id = $this->saveViewerIDOnCurrentDevice($this->getViewerIDFromCurrentDevice());
            if(($this->getViewerIDFromCurrentDevice()
                && ($post->views()->where('viewer_id', $this->getViewerIDFromCurrentDevice())->get())->isEmpty())
                || (auth::check() && ($post->views()->where('viewer_id', auth::id())->get())->isEmpty())
            ){
                $view = new View;
                $view->viewer_id = $viewer_id;
                $view->count = 1;
                $post->views()->save($view);
            }
        }
    }
}
