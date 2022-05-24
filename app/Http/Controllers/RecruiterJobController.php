<?php

namespace App\Http\Controllers;

use App\Models\Job;
use App\Models\JobProposal;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;

class RecruiterJobController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return view('contents.jobs.recruiter-jobs')->with([
            'jobs' => auth()->user()->jobs()->with('proposals', 'tags.tag', 'categories.category', 'contracts')->latest()->paginate(2)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function proposal($id)
    {
        // dd(JobProposal::with(['user' => function($q){
        //     $q->with('freelance_profile', 'address', 'skills');
        // }])->with('job')->where('job_id', $id)->latest()->get());
        return view('contents.jobs.job-proposals')->with([
            'job_proposals'=> JobProposal::with(['user' => function($q){
                $q->with('freelance_profile', 'address', 'skills');
            }])->with('job')->where('job_id', $id)->latest()->get()
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
    public function destroy($job)
    {
        $job = Job::withCount('contracts')->find(decrypt($job));

        if($job->user_id != auth()->id()){
            abort(403);
        }

        if($job->total_proposals > 0){
            abort(403);
        }

        $job->delete();
    }
}
