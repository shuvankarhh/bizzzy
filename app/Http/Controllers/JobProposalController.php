<?php

namespace App\Http\Controllers;

use App\Models\Job;
use App\Models\User;
use App\Models\Contract;
use App\Models\JobProposal;
use Illuminate\Http\Request;
use App\Models\ContractMilestone;
use App\Models\FreelancerProfile;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\JobProposalRequest;

class JobProposalController extends Controller
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
    public function create()
    {
        //
    }

    /**
     * Make Contract!
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(JobProposalRequest $request)
    {
        $job_id = decrypt($request->job_id);
        $freelancer_id = decrypt($request->freelancer);

        $freelancer_gave_job_proposal = JobProposal::where('job_id', $job_id)->where('user_id', $freelancer_id)->first();
        if (is_null($freelancer_gave_job_proposal)) {
            abort(403);
        }

        $job_belongs_to_user = Job::where('id', $job_id)->where('user_id', auth()->id())->first();
        if (is_null($job_belongs_to_user)) {
            abort(403);
        }

        $transaction = DB::transaction(function () use ($request, $freelancer_id, $job_id, $freelancer_gave_job_proposal, $job_belongs_to_user) {
            if ($request->payment_type == 'hourly') {
                $price = $request->hourly_rate;
            } else {
                $price = $request->price;
            }
            $contract = Contract::create([
                'payment_type' => $request->payment_type,
                'price' => $price,
                'service_charge_type' => 1,
                'service_charge' => 20,
                'paid_amount' => 0,
                'is_fully_paid' => 0,
                'end_date' => null,
                'contract_status' => 1,
                'contract_confirmation_date' => now(),
                'created_by_user' => auth()->id(),
                'is_confirmed_by_client' => 1,
                'is_confirmed_by_freelancer' => 0,
                'job_id' => $job_id,
                'freelancer_id' => $freelancer_id,
                'additional_message' => $request->additional_message,
                'hours_per_week' => $request->hour_per_week
            ]);

            FreelancerProfile::where('user_id', $freelancer_id)->update([
                'total_jobs' => DB::raw('total_jobs + 1')
            ]);

            if ($request->payment_type == 'fixed') {
                if (!empty($request->milestone_name[0])) {
                    foreach ($request->milestone_name as $idx => $item) {
                        $mile_stones[] = [
                            'contract_id' => $contract->id,
                            'name' => $item,
                            'deposit_amount' => $request->deposit_amount[$idx],
                            'end_date' => $request->due_date[$idx],
                            'is_complete' => 0,
                            'created_at' => now(),
                            'updated_at' => now(),
                        ];
                    }
                    ContractMilestone::insert($mile_stones);
                } else {
                    ContractMilestone::create([
                        'contract_id' => $contract->id,
                        'name' => $job_belongs_to_user->name,
                        'deposit_amount' => $request->price,
                        'end_date' => NULL,
                        'is_complete' => 0,
                    ]);
                }
            }

            $freelancer_gave_job_proposal->contract_id = $contract->id;
            $freelancer_gave_job_proposal->save();
        });

        return route('recruiter.job.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($freelancer, $job_id)
    {
        // $job_proposal = auth()->user()->with(['jobs' => function ($query) use ($freelancer, $job_id) {
        //     return $query->with(['proposals' => function ($query) use ($freelancer) {
        //         $query->where('user_id', decrypt($freelancer));
        //     }])->with('tags.tag', 'categories.category')->where('id', decrypt($job_id));
        // }])->get();
        $job_proposal = Job::with(['proposals' => function ($query) use ($freelancer) {
            $query->where('user_id', decrypt($freelancer));
        }])->with('tags.tag', 'categories.category')->where('id', decrypt($job_id))->first();

        // Job::where('user_id', auth()->id())->with(['proposals' => function ($query) use ($freelancer) {
        //     $query->where('user_id', $freelancer);
        // }])->with('tags.tag', 'categories.category')->where('id', decrypt($job_id))->first();

        // $this->authorize('view', $job_proposal);

        // dd($job_proposal);

        return view('contents.jobs.job-proposal')->with([
            'job_proposal' => $job_proposal
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
