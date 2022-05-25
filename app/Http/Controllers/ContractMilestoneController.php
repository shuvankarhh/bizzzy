<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ContractMilestone;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\ContractMilestoneRequest;
use App\Models\Account;
use App\Models\Transaction;
use Illuminate\Validation\ValidationException;

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
            auth()->user()->user_pending_balance()->create([
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
