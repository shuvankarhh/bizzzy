<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Message;
use Illuminate\Http\Request;
use App\Models\MessageContact;

class MessageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contacts = auth()->user()->contacts()->with('user')->orderBy('last_interaction', 'desc')->get();
        return view('contents.messages.message_contacts')->with([
            'contacts' => $contacts,
        ]);
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $from)
    {
        // echo gettype($request->firstLoad)."\n";
        // echo $request->firstLoad;
        // exit();
        /*
         * $firstLoad variable is set to true when a user first loads the message page. When first loading the page not message will be marker read.
         * If he click any message box then the firstLoad variable will be set to false and messages will be marked read from then on.
         */
        if($request->firstLoad != 'true'){
            $this->updateMessageSeen($from);
        }
        return response()->json(["message" => $this->getMessages($from), "unseen_messages" => $this->getUnseenMessageCount()]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update received message as read.
     * When a receiver receives a message and has that sender's message opened only then this route will be called! So this message will always
     * be to the current authenticated user from another.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Message  $message
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Message $message)
    {
        if($message->to != auth()->id()){
            abort(403);
        }
        // $message->status = 2;
        // $message->save();
        
        MessageContact::where('contact_id', $message->from)->where('user_id', auth()->id())->update(['unseen' => 2]);
        
        return response()->json(["unseen_messages" => $this->getUnseenMessageCount(), "message_to" => $message->from, "auth" => auth()->id()]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    /**
     * Update the contact to seen
     * @param int $from id of users table
     */
    public function updateMessageSeen($from)
    {
        // Message::where(function($query) use ($from){
        //     $query->where('from', auth()->id())->where('to', $from);
        // })->orWhere(function($query) use ($from){
        //     $query->where('to', auth()->id())->where('from', $from);
        // })->update(['status' => 2]);

        MessageContact::where('contact_id', $from)->where('user_id', auth()->id())->update(['unseen' => 2]);
    }

    /**
     * Lisiting of messages.
     * @param int $from id of users table.
     * @param int $limit limit of messages.
     * @return Collection Eloquent collection of Message model.
     */
    protected function getMessages($from, $limit = 10)
    {
        return Message::where(function($query) use ($from){
            $query->where('from', auth()->id())->where('to', $from);
        })->orWhere(function($query) use ($from){
            $query->where('to', auth()->id())->where('from', $from);
        })
        ->limit($limit)
        ->latest()
        ->get();
    }

    /**
     * Get number of unseen contacts for currently authenticated user!
     * @return int Count of unseen contact!
     */
    public function getUnseenMessageCount()
    {
        return MessageContact::where('user_id', auth()->id())->where('unseen', 1)->count();
    }
}
