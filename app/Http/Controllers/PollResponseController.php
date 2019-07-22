<?php

namespace App\Http\Controllers;

use App\PollResponse;
use App\User;
use App\Admin\Poll;
use Illuminate\Http\Request;
use Illuminat;
use Symfony\Component\Console\DependencyInjection\AddConsoleCommandPass;

class PollResponseController extends Controller
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
        return view('poll_respond_form')->with(['polls' => Poll::all()]);
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
        $response = new PollResponse;
        $validated = $request->validate([
            'poll_id' => 'required|numeric',
            'response_id' => 'required|numeric',
        ]);
        $response->poll_id = $validated['poll_id'];
        $response->response_key = $validated['response_id'];
        $user = auth()->user();
        $user->pollResponses()->save($response);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\PollResponse  $pollResponse
     * @return \Illuminate\Http\Response
     */
    public function show(PollResponse $pollResponse)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\PollResponse  $pollResponse
     * @return \Illuminate\Http\Response
     */
    public function edit(PollResponse $pollResponse)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\PollResponse  $pollResponse
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PollResponse $pollResponse)
    {
        //
        $validated = $request->validate([
            'response_id' => 'required|numeric',
        ]);
        $pollResponse->response_key = $validated['response_id'];
        $user = auth()->user();
        $user->pollResponses()->save($pollResponse);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\PollResponse  $pollResponse
     * @return \Illuminate\Http\Response
     */
    public function destroy(PollResponse $pollResponse)
    {
        //
    }

    public function computePollPercentages($pollID){
        $pollOptionsArray = collect(json_decode(Poll::find($pollID)->options));
        $responsesPercentage = collect();
        $countTotal = PollResponse::count();
        foreach($pollOptionsArray as $key => $value){
            $responsesPercentage[$key] = (PollResponse::where('response_key', "{$key}")->count() / $countTotal)*100;
        }
        return $responsesPercentage;

    }
}
