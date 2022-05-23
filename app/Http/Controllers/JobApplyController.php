<?php

namespace App\Http\Controllers;

use App\Models\Job;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\JobApplyRequest;
use App\Models\JobProposal;
use App\Models\JobProposalFile;
use Illuminate\Validation\ValidationException;

class JobApplyController extends Controller
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
    public function create($id)
    {        
        return view('contents.jobs.apply-to-job')->with([
            'job' => Job::with('tags.tag', 'recruiter', 'categories.category')->where('job_visibility', '2')->where('id', $id)->first(),
            'applied' => JobProposal::where('user_id', auth()->id())->where('job_id', $id)->count()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(JobApplyRequest $request)
    {

        $check_already_applied = JobProposal::where('job_id', $request->job_id)->where('user_id', auth()->id())->first();

        if(is_null($check_already_applied)){
            DB::transaction(function () use ($request){
                $job_proposal = JobProposal ::create([
                    'job_id' => $request->job_id,
                    'price_type' => 1,
                    'user_id' => auth()->id(),
                    'price' => $request->price,
                    'description' => $request->description,
                    'project_time' => $request->project_time,
                ]);
                Job::find($request->job_id)->increment('total_proposals');
                if($request->hasFile('proposal_files')){
                    $filesArr = array();
                    foreach($request->proposal_files as $item){
                        $filesArr[] = [
                            'file_name' => $item->store('freelancer/proposal_files', ['disk' => 'public']),
                            'job_proposal_id' => $job_proposal->id,
                            'file_location_type' => 1,
                        ];
                    }
                    JobProposalFile::insert($filesArr);
                }
            });
            return route('job.index');
        }

        throw ValidationException::withMessages(['message' => 'You already applied!']);
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
