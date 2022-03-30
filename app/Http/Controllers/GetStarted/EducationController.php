<?php

namespace App\Http\Controllers\GetStarted;

use App\Http\Controllers\Controller;
use App\Http\Requests\EducationRequest;
use Illuminate\Http\Request;

class EducationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('get_started.add_education')->with([
            'name' => auth()->user()->name,
            'educations' => auth()->user()->educations,
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
    public function store(EducationRequest $request)
    {
        $education = auth()->user()->educations()->create([
            'institute_name' => $request->institute_name,
            'degree' => $request->degree,
            'area_of_study' => $request->area_of_study,
            'currently_studying' => $request->currently_studying,
            'start_date' => (!empty($request->year_start)) ? $request->year_start . '-01-' . '01' : NULL,
            'end_date' => (!empty($request->year_end)) ? $request->year_end . '-01-' . '01' : NULL,
            'description' => $request->description,
        ]);

        return response()->json($education);
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
