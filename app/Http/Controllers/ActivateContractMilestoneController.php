<?php

namespace App\Http\Controllers;

use App\Models\Contract;
use App\Models\Transaction;
use App\Models\StripeDetail;
use Illuminate\Http\Request;
use App\Services\StripePaymentService;
use Stripe\Service\PaymentMethodService;

class ActivateContractMilestoneController extends Controller
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
    public function create(Request $request)
    {
        $contract = Contract::with('freelancer', 'job')->with(['milestones' => function($q){
            $q->where('is_complete', 0)->limit(1);
        }])->find(decrypt($request->contract));

        if($contract->created_by_user != auth()->id()){
            abort(403);
        }
        // return response()->json($contract);
        return view('contents.recruiter.activate-new-milestone')->with([
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
    public function store($contract, Request $request)
    {
        $contract = Contract::with('freelancer', 'job')->with(['milestones' => function($q){
            $q->where('is_complete', 0)->limit(1);
        }])->find(decrypt($request->contract));

        if($contract->created_by_user != auth()->id()){
            abort(403);
        }
        if($contract->milestone_security_balance < $contract->milestones[0]->deposit_amount){
            $amount = $contract->milestones[0]->deposit_amount - $contract->milestone_security_balance;
            $stripe_detail = StripeDetail::find($request->payment_method);
            $payment = new StripePaymentService($stripe_detail->customer_id);
            $payment_methods = $payment->getPaymentMethods();
            $payment->makeOffSessionPayment($payment_methods->data[0]->id, $amount);
            $contract->milestone_security_balance += $amount;
            $contract->save();
            Transaction::create([
                'user_id' => auth()->id(),
                'credit_account' => '5',
                'debit_account' => '1',
                'amount' => $amount
            ]);
        }
        $contract->milestones[0]->is_complete = 2;
        $contract->milestones[0]->save();
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
