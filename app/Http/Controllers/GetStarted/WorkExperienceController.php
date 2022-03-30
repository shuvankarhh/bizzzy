<?php

namespace App\Http\Controllers\GetStarted;

use App\Http\Controllers\Controller;
use App\Http\Requests\WorkExperienceRequest;
use Illuminate\Http\Request;

class WorkExperienceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('get_started.add_work_experience')->with([
            'name' => auth()->user()->name,
            'experiences' => auth()->user()->work_experiences
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('templates.work-experience');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(WorkExperienceRequest $request)
    {
        $work = auth()->user()->work_experiences()->create([
            'title' => $request->title,
            'company' => $request->company,
            'location' => $request->location,
            'currently_working' => $request->currently_working,
            'start_date' => (!empty($request->year_start)) ? $request->year_start . '-' . $request->month_start . '-' . '01' : NULL,
            'end_date' => (!empty($request->year_end)) ? $request->year_end . '-' . $request->month_end . '-' . '01' : NULL,
            'description' => $request->description,
        ]);

        return response()->json($work);
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
