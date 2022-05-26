<?php

namespace App\Http\Controllers\Recruiter;

use App\Models\Contract;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Validation\ValidationException;

class NewMilestonePayment extends Controller
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
    public function create(Request $request, $contract)
    {
        $request->validate([
            'add_milestone_to' => 'required',
            'milestone_name' => 'required|array|min:1',
            'milestone_name.*' => 'required',
            'deposit_amount' => 'required|array|min:1',
            'deposit_amount.*' => 'required',
            'due_date' => 'required|array|min:1',
            'due_date.*' => 'required',
        ]);
        
        $contract = Contract::find(decrypt($contract));

        if($contract->milestone_security_balance > $request->deposit_amount[0]){
            throw ValidationException::withMessages(['amount' => 'You already have sufficient amount in your escrow! No need to pay! Your Milestone will be created with amounts from escrow!']);
        }

        if($contract->created_by_user != auth()->id()){
            abort(403);
        }

        return view('components.new-milestone-payment')->with([
            'milestone_amount' => $request->deposit_amount[0],
            'contract' => $contract,
            'payment_methods' => auth()->user()->stripe_details
        ]);
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
    public function show($id)
    {
        //
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
}
