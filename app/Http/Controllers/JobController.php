<?php

namespace App\Http\Controllers;

use App\Models\Job;
use App\Models\Tag;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Requests\JobRequset;
use App\Models\JobCategory;
use App\Models\JobFile;
use App\Models\JobPreferredLanguage;
use App\Models\JobTag;
use Illuminate\Support\Facades\DB;

class JobController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('contents.jobs.job')->with([
            'jobs' => Job::with('tags.tag', 'recruiter', 'categories.category')->withCount('proposals')->where('job_visibility', '2')->latest()->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('contents.jobs.create-job')->with([
            'tags' => Tag::get(),
            'categories' => Category::get(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(JobRequset $request)
    {
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

            if($request->file('optional_files')){
                foreach($request->file('optional_files') as $item){
                    $path = $item->store('job', ['disk' => 'public']);
                    JobFile::create([
                        'job_id' => $job->id,
                        'file_name' => $path,
                        'file_location_type' => 1,
                    ]);
                }
            }

            if($request->languages){
                foreach($request->languages as $item){
                    JobPreferredLanguage::create([                
                        'job_id' => $job->id,
                        'language_code' => $item,
                        'proficiency_level' => 0,
                    ]);
                }
            }

            if($request->tags){
                foreach($request->tags as $item){
                    JobTag::create([                
                        'job_id' => $job->id,
                        'tag_id' => $item,
                    ]);
                }
            }

            if($request->categories){
                foreach($request->categories as $item){
                    JobCategory::create([                
                        'job_id' => $job->id,
                        'category_id' => $item,
                    ]);
                }
            }
        });
        return route('job.index');
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
