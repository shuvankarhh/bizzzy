<?php

namespace App\Http\Controllers\Freelancer;

use App\Http\Controllers\Controller;
use App\Models\Screenshot;
use App\Models\TimeTracker;
use Illuminate\Http\Request;
use Illuminate\View\View;

class FreelancerWorkDiaryController extends Controller
{
    /**
     * Return Work Diary for Freelancer.
     * 
     * Work diary of freelancer that is comming from destop applicatin!
     *
     * @return View
     */
    public function index():View
    {
        $hourly_contracts = auth()->user()->freelancerContracts()->with('job:id,name')->with(['time_trackers' => function($q){
            $q->with(['screenshots' => function($q){
                $q->whereDate('created_at', date('Y-m-d'));
            }]);
        }])->where('payment_type', 2)->get();
        return view('contents.freelancer.work-diary')->with([
            'contracts' => $hourly_contracts
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
     * Display screentshot for project for a perticular data and contract.
     *
     * @param  int  $id
     * @return View
     */
    public function show($contract, $date)
    {
        $trackers = TimeTracker::with(['screenshots' => function($q) use ($date){
            $q->whereDate('created_at', $date);
        }])->where('contract_id', decrypt($contract))->whereDate('start', $date);

        
        $screenshots = Screenshot::whereHas('time_tracker', function($q) use($contract, $date){
            $q->where('contract_id', decrypt($contract))->whereDate('start', $date);
        })->with('time_tracker')->get();
        return view('components.work-diary-component')->with([
            'screenshots' => $screenshots
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
