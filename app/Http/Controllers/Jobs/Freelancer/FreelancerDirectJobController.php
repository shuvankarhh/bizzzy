<?php

namespace App\Http\Controllers\Jobs\Freelancer;

use App\Models\Job;
use App\Models\Tag;
use App\Models\JobTag;
use App\Models\JobFile;
use App\Models\Category;
use App\Models\Contract;
use App\Models\JobCategory;
use Illuminate\Http\Request;
use App\Http\Requests\JobRequset;
use App\Models\ContractMilestone;
use App\Models\FreelancerProfile;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\JobPreferredLanguage;

class FreelancerDirectJobController extends Controller
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
    public function create($freelancer)
    {
        return view('contents.jobs.create-direct-job')->with([
            'tags' => Tag::get(),
            'categories' => Category::get(),
            'freelancer' => FreelancerProfile::with('user')->findOrFail($freelancer)
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
        // return response()->json($request->all());

        DB::transaction(function () use ($request) {
            $job = Job::create([
                'user_id' => auth()->id(),
                'job_visibility' => $request->job_visibility,
                'name' => $request->name,
                'description' => $request->description,
                'project_time' => $request->project_time,
                'project_type' => $request->project_type,
                'experience_level' => $request->experience_level,
                'price_type' => $request->price_type,
                'price' => $request->price,
                'hours_per_week' => $request->hours_per_week,
                'total_proposals' => 0,
                'total_invitation_sent' => 0,
                'average_rating' => 0,
                'money_spent' => 0,
            ]);

            if ($request->file('optional_files')) {
                foreach ($request->file('optional_files') as $item) {
                    $path = $item->store('job', ['disk' => 'public']);
                    JobFile::create([
                        'job_id' => $job->id,
                        'file_name' => $path,
                        'file_location_type' => 1,
                    ]);
                }
            }

            if ($request->languages) {
                foreach ($request->languages as $item) {
                    JobPreferredLanguage::create([
                        'job_id' => $job->id,
                        'language_code' => $item,
                        'proficiency_level' => 0,
                    ]);
                }
            }

            if ($request->tags) {
                foreach ($request->tags as $item) {
                    JobTag::create([
                        'job_id' => $job->id,
                        'tag_id' => $item,
                    ]);
                }
            }

            if ($request->categories) {
                foreach ($request->categories as $item) {
                    JobCategory::create([
                        'job_id' => $job->id,
                        'category_id' => $item,
                    ]);
                }
            }

            $contract = Contract::create([
                'payment_type' => $request->price_type,
                'price' => $request->price,
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
                'job_id' => $job->id,
                'freelancer_id' => decrypt($request->freelancer),
                'additional_message' => $request->additional_message,
                'hours_per_week' => $request->hours_per_week,
            ]);

            if (strtolower($request->price_type) == 'fixed') {
                if($request->deposit_type == 'less'){
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
                }else{
                    ContractMilestone::create([
                        'contract_id' => $contract->id,
                        'name' => $job->name,
                        'deposit_amount' => $request->price,
                        'end_date' => NULL,
                        'is_complete' => 0,
                    ]);
                }
            }
        });
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
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
