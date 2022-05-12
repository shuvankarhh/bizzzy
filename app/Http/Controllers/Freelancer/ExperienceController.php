<?php

namespace App\Http\Controllers\Freelancer;

use App\Http\Controllers\Controller;
use App\Models\UserWorkExperience;
use Illuminate\Http\Request;

class ExperienceController extends Controller
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
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'experience' => 'required|in:1,2,3'
        ]);
        auth()->user()->freelance_profile()->update([
            'experience_level' => $request->experience
        ]);
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
    public function edit($experience)
    {
        $experience = UserWorkExperience::find(decrypt($experience));
        if($experience->user_id != auth()->id()){
            abort(403);
        }

        return view('components.edit-work-experience')->with([
            'experience' => $experience
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $experience)
    {
        $request->validate([
            'edit_work_title' => 'required'
        ]);

        $experience = UserWorkExperience::find(decrypt($experience));
        if($experience->user_id != auth()->id()){
            abort(403);
        }
        if(is_null($request->edit_year_start)){
            $year_start = null;
        }else if(is_null($request->edit_experience_month_start)){
            $year_start = "$request->edit_year_start-01-01";
        }else{
            $year_start = "$request->edit_year_start-$request->edit_experience_month_start-01";
        }
        if(is_null($request->edit_year_end)){
            $year_end = null;
        }else if(is_null($request->edit_experience_month_end)){
            $year_end = "$request->edit_year_end-01-01";
        }else{
            $year_end = "$request->edit_year_end-$request->edit_experience_month_end-01";
        }
        $experience->title = $request->edit_work_title;
        $experience->company = $request->edit_company;
        $experience->location = $request->edit_location;
        $experience->currently_working = (isset($request->edit_currently_working)) ? 1 : null;
        $experience->start_date = $year_start;
        $experience->end_date = $year_end;
        $experience->description = $request->edit_description;
        $experience->save();
        return response()->json($request->all());
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
