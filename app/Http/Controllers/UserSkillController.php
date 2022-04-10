<?php

namespace App\Http\Controllers;

use App\Http\Resources\SkillSelectionResource;
use App\Models\Skill;
use App\Models\UserSkill;
use Illuminate\Http\Request;

class UserSkillController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('get_started.add_skill')->with([
            'name' => auth()->user()->name,
            'skills' => Skill::get(),
            'user_skills' => json_encode(auth()->user()->skills()->pluck('skill_id')->toArray())
        ]);
    }

    /**
     * Creating this resource from profile.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return response()->json([
            'skills' => SkillSelectionResource::collection(Skill::get()),
            'user_skills' => json_encode(auth()->user()->skills()->pluck('skill_id')->toArray())
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
        UserSkill::where('user_id', auth()->id())->delete();

        $request->validate([
            "skills"    => "required|array|min:1",
            "skills.*"  => "required",
        ]);

        foreach($request->skills as $item){
            UserSkill::create([
                'user_id' => auth()->id(),
                'skill_id' => $item,
            ]);
        }

        return route('question.ten');
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
    public function update(Request $request)
    {
        $request->validate([
            'name' => 'required|array|min:1'
        ]);

        UserSkill::where('user_id', auth()->id())->delete();
        foreach($request->name as $item){
            $arr[] = [
                'skill_id' => $item,
                'user_id' => auth()->id()
            ];
        }
        UserSkill::insert($arr);
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
