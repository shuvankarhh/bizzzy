<?php

namespace App\Http\Controllers\Jobs\Freelancer;

use App\Models\Contract;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class FreelancerActiveJobController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        /**
         * contract_status 2 = active contract
         */
        $counts_db = Contract::select(DB::raw("count(*) as contract_count, payment_type"))->where('contract_status', 2)->where('freelancer_id', auth()->id())->groupBy('payment_type')->get();
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

        /**
         * |---- IMPORTANT ----|
         * In strict mode group by clause must contain every column in select statement!
         * Here only the first, not complete milestone is required for each contract. So here milestone relationship is being gropped by using contract id!
         * Disabling strict mode only for this query as it interfears with the group by claus!
         */
        config()->set('database.connections.mysql.strict', false);
        DB::reconnect();

        return view('contents.jobs.freelancer-active-contracts')->with([
            'offers' => Contract::with('job')
            ->with([
                'milestones' => function ($query) {
                    $query->where('is_complete', 0)->oldest()->groupBy('contract_id');
                }
            ])
            ->where('freelancer_id', auth()->id())
            ->where('contract_status', '2')
            ->get(),
            'in_review' => Contract::whereNull('freelancer_private_feedback_rating')
            ->where('contract_status', '5')
            ->where('freelancer_id', auth()->id())
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
