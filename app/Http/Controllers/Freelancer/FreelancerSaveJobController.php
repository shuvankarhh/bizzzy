<?php

namespace App\Http\Controllers\Freelancer;

use App\Models\Job;
use App\Models\SavedJob;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\Builder;

class FreelancerSaveJobController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('contents.jobs.saved-jobs')->with([
            'jobs' => Job::with('tags.tag', 'recruiter', 'categories.category')
            ->withCount('savedJob')
            ->whereHas('savedJob', function (Builder $query){
                $query->where('user_id', auth()->id());
            })
            ->where('job_visibility', '2')->latest()->paginate(10)
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
        $saved_job = SavedJob::create([
            'user_id' => auth()->id(),
            'job_id' => decrypt($request->job)
        ]);
        return response()->json($saved_job);
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
    public function destroy($savedJob)
    {
        SavedJob::where('user_id', auth()->id())->where('job_id', decrypt($savedJob))->delete();
    }
}
