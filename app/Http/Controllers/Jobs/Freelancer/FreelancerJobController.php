<?php

namespace App\Http\Controllers\Jobs\Freelancer;

use App\Models\Job;
use App\Models\Contract;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;
use App\Http\Requests\FreelancerJobContractRequest;

class FreelancerJobController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('contents.jobs.freelancer-job-offers')->with([
            'offers' => Contract::with('job')->where('freelancer_id', auth()->id())->where('contract_status', '1')->latest()->paginate(5),
            'proposals' => Job::with('proposals')
                ->whereHas('proposals', function ($q) {
                    $q->where('user_id', auth()->id());
                })
                ->whereDoesntHave('contracts', function ($q){
                    $q->where('freelancer_id', auth()->id());
                })
                ->paginate(5)
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
    public function store(FreelancerJobContractRequest $request, $contract_id)
    {
        $contract_id = decrypt($contract_id);
        $contract = Contract::with('freelancer')->find($contract_id);

        // Gate::forUser($contract->freelancer)->authorize('freelancerUpdate', $contract);

        if ($request->type == 'decline') {
            $contract->is_confirmed_by_freelancer = 0;
            $contract->contract_status = 6;
            $contract->save();
        }

        if ($request->type == 'accept') {
            $contract->is_confirmed_by_freelancer = 1;
            $contract->contract_status = 2;
            $contract->contract_confirmation_date = now();
            $contract->save();
        }

        return route('job.offer.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $id = decrypt($id);
        $contract = Contract::with('job.categories.category', 'milestones', 'recruiter.freelance_profile', 'freelancer.freelance_profile')->find($id);

        // $this->authorize('view', $contract);
        if($contract->freelancer_id != auth()->id()){
            abort(403);
        }

        return view('contents.jobs.job-offer')->with([
            'contract' => $contract,
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
