<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Contract;
use App\Models\Job;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Yajra\DataTables\Facades\DataTables;

class AdminJobController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.jobs.list-job')->with([
            'jobs' => Job::get()
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
    public function edit(Job $id)
    {
        return $id->toJson();
        // $data = Job::find($id);
        // return view('admin.jobs.edit-job', ['job' => $data]);
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
        $job = Job::find($id);

        $job->name = $request->name;
        $job->description = $request->description;
        $job->job_visibility = $request->get('job_visibility');
        $job->project_time = $request->get('project_time');
        $job->project_type = $request->get('project_type');
        $job->experience_level = $request->get('experience_level');
        $job->price_type = $request->get('price_type');
        $job->price = $request->price;
        $job->save();
        Session::flash('message', 'job successfully updated!');
        // return redirect()->route('job.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Job::where('id', $id)->delete();
        return redirect()->route('job.index');
    }

    public function showcontract($id)
    {
        return view('admin.jobs.list-jobcontract')->with('id', $id);
    }

    public function getData(Request $request)
    {
        $contracts = Contract::with('freelancer')->select(['contracts.*'])->where('job_id', $request->id);

        return DataTables::of($contracts)
            ->editColumn('freelancer.name', function ($t) {
                return $t->freelancer->name;
            })
            ->editColumn('freelancer.user_name', function ($t) {
                return $t->freelancer->user_name;
            })
            ->toJson();
    }
}