<?php

namespace App\Http\Controllers;

use App\Chat;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class ChatController extends Controller
{
    public function __construct(){
        return $this->middleware('auth')->except('index');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $chats = Chat::with('user')->orderBy('created_at', 'asc')->get();
        $chatUser = [];
        foreach($chats as $chat){
            $chatCol = ['user'=>$chat->user->name, 'chat' => $chat->body];
            $chatUser[] = $chatCol;
        }
        //$chats = $chats;//Try to get a collection of [[user_name=>wieo, comment_body=>eowpoie], [...], ...]
        return response()->json($chatUser);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('test.chat_form');
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
        $chat = new Chat;
        $validated = $request->validate([
            'chat' => 'required|string|max:250'
        ]);
        $chat->body = $validated['chat'];
        $chat = auth()->user()->chats()->save($chat);
        $col = $chat::with('user')->first();
        $chatObj = ['user'=> $col->user->name, 'chat'=> $chat->body];
        return response()->json($chatObj);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Chat  $chat
     * @return \Illuminate\Http\Response
     */
    public function show(Chat $chat)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Chat  $chat
     * @return \Illuminate\Http\Response
     */
    public function edit(Chat $chat)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Chat  $chat
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Chat $chat)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Chat  $chat
     * @return \Illuminate\Http\Response
     */
    public function destroy(Chat $chat)
    {
        //
    }
}
