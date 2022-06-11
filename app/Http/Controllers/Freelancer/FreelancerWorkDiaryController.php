<?php

namespace App\Http\Controllers\Freelancer;

use Carbon\Carbon;
use App\Models\Contract;
use Illuminate\View\View;
use App\Models\Screenshot;
use App\Models\TimeTracker;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\Transaction;
use App\Schedules\HourlyBill;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Validation\ValidationException;

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
        $contract = Contract::find(decrypt($contract));

        if($contract->created_by_user != auth()->id() AND $contract->freelancer_id != auth()->id()){
            abort(403);
        }

        $screenshots = Screenshot::whereHas('time_tracker', function($q) use($contract, $date){
            $q->where('contract_id', $contract->id)->whereDate('start', $date);
        })->with('time_tracker')->get();
        /**
         * This view render the work history component for a specific contract on a specific day.
         * 
         * For each hour a there is a new col-12 row. In that row we have each image in a div with the work title and time.
         * These divs are flex box and will overflow-x:scroll. We have two flags. $prev and $start_hour.
         * Initially they both are null.
         * 
         * @return View
         */
        return view('components.work-diary-component')->with([
            'screenshots' => $screenshots,
            'freelancer' => $contract->freelancer_id == auth()->id()
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
    public function destroy(Request $request)
    {
        $request->validate([
            'screenshot' => 'required|array'
        ]);

        $screenshots = Screenshot::with('time_tracker')->whereIn('id', $request->screenshot)->get();
        // return response()->json($screenshots);
        DB::transaction(function () use ($request, $screenshots) {
            foreach($screenshots as $idx=>$item){
                if($item->time_tracker->user_id != auth()->id()){
                    abort(403);
                }
                $item->delete();
            }
        });
    }
}
