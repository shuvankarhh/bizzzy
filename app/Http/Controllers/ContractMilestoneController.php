<?php

namespace App\Http\Controllers;

use App\Models\Account;
use App\Models\Contract;
use Stripe\StripeClient;
use App\Models\Transaction;
use Illuminate\Http\Request;
use App\Models\ContractMilestone;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;
use App\Http\Requests\ContractMilestoneRequest;
use App\Models\UserPendingBalance;

class ContractMilestoneController extends Controller
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
    public function create($contract_milestone)
    {
        $contract_milestone = ContractMilestone::with('contract')->find(decrypt($contract_milestone));
        $max_id = ContractMilestone::select(DB::raw('MAX(id) as max_id'))->where('contract_id', $contract_milestone->contract->id)->first();
        return view('components.milestone-details')->with([
            'contract_milestone' => $contract_milestone,
            'max_id' => $max_id->max_id
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
        $request->validate([
            'add_milestone_to' => 'required',
            'milestone_name' => 'required|array|min:1',
            'milestone_name.*' => 'required',
            'deposit_amount' => 'required|array|min:1',
            'deposit_amount.*' => 'required',
            'due_date' => 'required|array|min:1',
            'due_date.*' => 'required',
        ]);

        $contract = Contract::find(decrypt($request->add_milestone_to));

        if($contract->created_by_user != auth()->id()){
            abort(403);
        }

        $any_active_milestone = ContractMilestone::where('contract_id', $contract->id)->where('is_complete', 0)->count();

        if($any_active_milestone == 0 AND $contract->milestone_security_balance < $request->deposit_amount[0]){
            $request->validate([
                'payment_method' => 'required',
            ]);
            
            $stripe = new StripeClient(config('stripe.stripe_secret'));
            $stripe_detail = auth()->user()->stripe_detail;
            $payment_methods = $stripe->paymentMethods->all(
                ['customer' => $stripe_detail->customer_id, 'type' => 'card']
            );
            $amount = ($request->deposit_amount[0] - $contract->milestone_security_balance);
            try {
                $stripe->paymentIntents->create([
                    'amount' => $amount * 100,
                    'currency' => 'usd',
                    'customer' => $stripe_detail->customer_id,
                    'payment_method' => $payment_methods->data[0]->id,
                    'off_session' => true,
                    'confirm' => true,
                ]);
                $contract->milestone_security_balance += $amount;
                $contract->save();
            } catch (\Stripe\Exception\CardException $e) {
                // Error code will be authentication_required if authentication is needed
                echo 'Error code is:' . $e->getError()->code;
                $payment_intent_id = $e->getError()->payment_intent->id;
                $payment_intent = \Stripe\PaymentIntent::retrieve($payment_intent_id);
            }
        }

        foreach($request->milestone_name as $idx=>$milestone){
            ContractMilestone::create([
                'contract_id' => $contract->id,
                'name' => $milestone,
                'deposit_amount' => $request->deposit_amount[$idx],
                'end_date' => $request->due_date[$idx],
                'is_complete' => 0
            ]);
        }
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
        $request->validate([
            'bonus' => 'required_if:bonus_pay,yes'
        ]);

        return DB::transaction(function() use ($request, $id){
            $milestone = ContractMilestone::with('contract')->find(decrypt($id));
            $max_id = ContractMilestone::select(DB::raw('MAX(id) as max_id'))->where('contract_id', $milestone->contract->id)->first();
    
            if($request->pay_amount > $milestone->deposit_amount){
                throw ValidationException::withMessages(['pay_amount' => 'Paid amount cannot be more than deposited amount!']);
            }
    
            if($max_id->max_id == $milestone->id){
                $request->validate([
                    'contract_status' => 'required'
                ]);
            }
    
            if($milestone->contract->created_by_user != auth()->id()){
                abort(403);
            }
    
            $milestone->is_complete = 1;
            $milestone->paid_amount = $request->pay_amount;
            $milestone->contract->milestone_security_balance -= $request->pay_amount;
            $milestone->contract->save();
            $milestone->save();
    
            Transaction::create([
                'user_id' => auth()->id(),
                'credit_account' => '5',
                'debit_account' => '1',
                'amount' => $request->pay_amount
            ]);
            
            $paid_amount_after_charge = ($request->pay_amount - $request->pay_amount * 0.2);
            UserPendingBalance::create([
                'contract_id' => $milestone->contract->id,
                'contract_milestone_id' => $milestone->id,
                'user_id' => $milestone->contract->freelancer_id,
                'status' => 1,
                'amount' => $paid_amount_after_charge
            ]);

            Transaction::create([
                'user_id' => auth()->id(),
                'credit_account' => '3',
                'debit_account' => '1',
                'amount' => ($request->pay_amount - $paid_amount_after_charge)
            ]);
    
            if($request->contract_status == 'end'){
                return route('recruiter.end.contract.create', encrypt($milestone->contract->id));
            }else{
                return route('recruiter.contract.index');
            }

        });
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
