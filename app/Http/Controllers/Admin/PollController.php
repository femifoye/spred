<?php

namespace App\Http\Controllers\Admin;

use App\Admin\Poll;
use App\Admin\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PollController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        return view('poll_create_form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Save new poll to db
        //$user = auth()->user();
        $validated = $request->validate([
            'poll_title' => 'required|string|max:30|unique:polls,question',
            'poll_options' => 'required|array',
        ]);
        $poll = [
            'question'=> $validated['poll_title'],
            'options' => json_encode($validated['poll_options'])
        ];
        $poll = Poll::create($poll);
        return redirect('polls')->with(['polls' => Poll::latest()->paginate(20)]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Admin\Poll  $poll
     * @return \Illuminate\Http\Response
     */
    public function show(Poll $poll)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Admin\Poll  $poll
     * @return \Illuminate\Http\Response
     */
    public function edit(Poll $poll)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Admin\Poll  $poll
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Poll $poll)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Admin\Poll  $poll
     * @return \Illuminate\Http\Response
     */
    public function destroy(Poll $poll)
    {
        //
    }
}
