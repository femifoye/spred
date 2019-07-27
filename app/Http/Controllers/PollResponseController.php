<?php

namespace App\Http\Controllers;

use App\PollResponse;
use Illuminate\Validation\Rule;
use App\Admin\Poll;
use Illuminate\Http\Request;
use Symfony\Component\Console\DependencyInjection\AddConsoleCommandPass;

class PollResponseController extends Controller
{
    public function __construct(){
        return $this->middleware('auth')->except(['index', 'show']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('polls_page')->with(['polls' => Poll::latest()->paginate(20)]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($question)
    {
        
    }

    public function takePoll($question = null){
        if($question){
            $question = str_replace(['-', '):'], [' ', '?'], $question);
            $poll = Poll::where('question', "{$question}")->first();
        }else{
            $poll = Poll::latest()->paginate(1);
        }
        return view('poll_page')->with(['poll' =>$poll, 'computed' => $this->computedResponse($poll[0])]);
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
        $user = auth()->user();
        $response = new PollResponse;
        $validated = $request->validate([
            'poll_id' => Rule::unique('poll_responses')->where(function ($query) {
                return $query->where('user_id', auth()->user()->id);
            }),
            'response_id' => 'required|numeric',
        ]);
        $response->poll_id = $validated['poll_id'];
        $response->response_key = $validated['response_id'];
        $user->pollResponses()->save($response);
        return redirect('polls');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\PollResponse  $pollResponse
     * @return \Illuminate\Http\Response
     */
    public function show(PollResponse $response)
    {
        //
        return $response;
        //return view('poll_page');
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

    protected function pollResponseTotal($pollID){
        return PollResponse::where('poll_id', "{$pollID}")->count();
    }
    protected function findKeyByValue($array, $value){
        $result = [];
        foreach($array as $key => $val){
            if($val == $value){
                $result[] = $key;
            }
        }
        return $result;
    }
    protected function computedResponse($poll){
        $pollOptionsArray = collect(json_decode($poll->options));
        $responsesPercentage = collect();
        $total = $this->pollResponseTotal($poll->id);
        if($total){
            foreach($pollOptionsArray as $key => $value){
                $responsesPercentage[$pollOptionsArray[$key]] = round((PollResponse::whereRaw('response_key = ? AND poll_id = ?', ["{$key}", "{$poll->id}"])->count() / $total)*100);
            }
        }
        $lead = $this->findKeyByValue($responsesPercentage, $responsesPercentage->max());
        return
        [
            'result' => $responsesPercentage,
            'total' => $total,
            'lead' => $lead,
        ];

    }
}
