<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Message;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $messages = collect();
        $contacts = auth()->user()->contacts()->with('user')->get();
        if(!$contacts->isEmpty()){
            $messages = $this->getMessages($contacts[0]->user->id);
        }
        return view('contents.messages.message_contacts')->with([
            'contacts' => auth()->user()->contacts()->with('user')->get(),
            'messages' => $messages
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
    public function show($from)
    {
        return response()->json($this->getMessages($from));
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
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
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

    protected function getMessages($from, $limit = 10)
    {
        Message::where(function($query) use ($from){
            $query->where('from', auth()->id())->where('to', $from);
        })->orWhere(function($query) use ($from){
            $query->where('to', auth()->id())->where('from', $from);
        })->update(['status' => 2]);
        
        return Message::where(function($query) use ($from){
            $query->where('from', auth()->id())->where('to', $from);
        })->orWhere(function($query) use ($from){
            $query->where('to', auth()->id())->where('from', $from);
        })
        ->limit($limit)
        ->latest()
        ->get();
    }
}
