<?php

namespace App\Http\Controllers\Recruiter;

use Carbon\Carbon;
use App\Models\Contract;
use App\Models\Screenshot;
use App\Models\TimeTracker;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RecruiterHourlyContractController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
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
    public function show($contract)
    {
        $contract = Contract::with('job', 'freelancer')->find($contract);
        if($contract->created_by_user != auth()->id()){
            abort(403);
        }

        $searchDay = 'Monday';
        $searchDate = new Carbon(); //or whatever Carbon instance you're using
        $searchDate = Carbon::createFromTimeStamp(strtotime("last $searchDay", $searchDate->timestamp));
        $lastMonday = Carbon::createFromTimeStamp(strtotime("last $searchDay", $searchDate->timestamp));

        $total_time = Screenshot::whereHas('time_tracker', function($q) use ($contract){
            $q->where('contract_id', $contract->id);
        })->whereDate('created_at', '>=', $lastMonday)->sum('screenshot_duration');

        return view('contents.recruiter.recruiter-hourly-contract')->with([
            'contract' => $contract,
            'total_time' => $total_time,
            'lastMonday' => $lastMonday
        ]);
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
