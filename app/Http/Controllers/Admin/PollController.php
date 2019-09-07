<?php

namespace App\Http\Controllers\Admin;

use App\Admin\Poll;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PollController extends Controller
{
    public function __construct(){
        //
        $this->authorizeResource(Poll::class, 'poll');
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('admins.admin_view_polls')->with('polls', Poll::latest()->paginate(10));
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
            'featured_image' => 'nullable|mimes:jpg,png,svg,gif,jpeg|max:5000'
        ]);
        $poll = [
            'question'=> $validated['poll_title'],
            'options' => json_encode($validated['poll_options'])
        ];
        $poll = Poll::create($poll);
        if($request['featured_image']){
            $image = $validated['featured_image'];
            $image_url = $image->store('public/images');
            $poll->featured_image = $image_url;
            $poll->save();
        }
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
        return view('poll_create_form')->with(['poll' => $poll, 'edite' => true]);
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
        $validated = $request->validate([
            'poll_title' => 'required|string|max:30|unique:polls,question,'.$poll->id.',id',
            'poll_options' => 'required|array',
            'featured_image' => 'nullable|mimes:jpg,png,svg,gif,jpeg|max:5000'
        ]);
        $poll->question = $validated['poll_title'];
        $poll->options = json_encode($validated['poll_options']);
        if($request['featured_image']){
            $image = $validated['featured_image'];
            $image_url = $image->store('public/images');
            $poll->featured_image = $image_url;
            $poll->save();
        }
        return redirect('polls')->with(['polls' => Poll::latest()->paginate(20)]);
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
        $poll->delete();
        return redirect()->route('admin.polls.index');
    }
}
