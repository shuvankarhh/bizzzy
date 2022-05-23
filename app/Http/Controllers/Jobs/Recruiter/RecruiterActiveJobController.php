<?php

namespace App\Http\Controllers\Jobs\Recruiter;

use App\Models\Contract;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class RecruiterActiveJobController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $counts_db = Contract::select(DB::raw("count(*) as contract_count, payment_type"))->where('contract_status', 2)->where('created_by_user', auth()->id())->groupBy('payment_type')->get();
        $counts = array(
            'fixed' => 0,
            'hourly' => 0,
        );
        foreach ($counts_db as $item) {
            if ($item->payment_type === 1) {
                $counts['fixed'] = $item->contract_count;
            } else {
                $counts['hourly'] = $item->contract_count;
            }
        }
        return view('contents.jobs.recruiter-active-contracts')->with([
            'offers' => Contract::with('job', 'milestones')
            ->where('created_by_user', auth()->id())
            ->where('contract_status', '2')
            ->get(),
            'in_review' => Contract::with('job')->whereNull('client_private_feedback_rating')
            ->where('contract_status', '5')
            ->where('created_by_user', auth()->id())
            ->get(),
            'counts' => $counts
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
        return view('contents.jobs.recruiter-active-contract')->with([
            'contract' => Contract::with('freelancer', 'job', 'milestones')->find(decrypt($id))
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
