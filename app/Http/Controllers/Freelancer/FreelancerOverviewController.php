<?php

namespace App\Http\Controllers\Freelancer;

use App\Models\Contract;
use Illuminate\Http\Request;
use App\Models\ContractMilestone;
use App\Models\UserPendingBalance;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class FreelancerOverviewController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        config()->set('database.connections.mysql.strict', false);
        DB::reconnect();
        $contracts = Contract::with('job')->whereHas('milestones', function($q){
            $q->where('is_complete', 0);
        })->where('freelancer_id', auth()->id())->get();
        dd($contracts);
        $in_progress = ContractMilestone::with(['contract.job'])->groupBy('id')->orderBy('id')->whereIn('contract_id', $contracts->pluck('id')->toArray())->where('is_complete', 0)->get();
        $pending = UserPendingBalance::where('user_id', auth()->id())->where('status', 1)->sum('amount');
        $balance = auth()->user()->user_balance;
        return view('contents.freelancer.freelancer-overview')->with([
            'contracts' => $contracts,
            'in_progress' => $in_progress,
            'pending' => $pending,
            'balance' => $balance,
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
