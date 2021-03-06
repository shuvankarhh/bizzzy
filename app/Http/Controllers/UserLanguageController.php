<?php

namespace App\Http\Controllers;

use App\Models\UserLanguage;
use Dotenv\Exception\ValidationException;
use Illuminate\Http\Request;

class UserLanguageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('get_started.language')->with([
            'english' => auth()->user()->languages()->where('language_code', 'en')->first(),
            'languages' => auth()->user()->languages()->where('language_code', '!=', 'en')->get()
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
        $request->validate([
            "proficiency"    => "required|array|min:1",
            "proficiency.*"  => "required",
        ]);

        UserLanguage::where('user_id', auth()->id())->delete();

        foreach($request->language as $idx=>$item){
            UserLanguage::updateOrCreate(
                [
                    'user_id' => auth()->id(),
                    'language_code' => $item,
                ],
                [
                    'proficiency_level' => $request->proficiency[$idx],
                ]
            );
        }

        return route('user.skill.index');
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
    public function destroy(UserLanguage $language)
    {
        if($language->user_id != auth()->id()){
            return response()->json(['error' => 'Unauthenticated.'], 401);
        }

        $language->delete();
    }
}
