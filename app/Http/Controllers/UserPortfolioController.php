<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserPortfolioRequest;
use App\Http\Resources\UserPortfolioResource;
use App\Models\UserPortfolio;
use Illuminate\Http\Request;

class UserPortfolioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('profile.portfolio.add_portfolio');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserPortfolioRequest $request)
    {
        $path = null;
        if($request->hasFile('project_thumbnail')){
            $path = $request->file('project_thumbnail')->store('freelancer/portfolio', ['disk' => 'public']);
        }

        $user_profile = UserPortfolio::create([
            'user_id' => auth()->id(),
            'title' => $request->title,
            'description' => $request->description,
            'completion_date' => $request->completion_date,
            'project_url' => $request->project_url,
            'thumbnail' => $path,
        ]);

        return route('freelancer.profile.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\UserPortfolio  $userPortfolio
     * @return \Illuminate\Http\Response
     */
    public function show(UserPortfolio $userPortfolio)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\UserPortfolio  $userPortfolio
     * @return \Illuminate\Http\Response
     */
    public function edit($portfolio)
    {
        $portfolio = UserPortfolio::find(decrypt($portfolio));
        if($portfolio->user_id != auth()->id()){
            abort(403);
        }
        return response()->json($portfolio);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\UserPortfolio  $userPortfolio
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, UserPortfolio $userPortfolio)
    {
        $request->validate([
            'portfolio_title' => 'required',
            'portfolio_description' => 'required',
            'completion_date' => 'required',
            'project_url' => 'required',
        ]);

        if($userPortfolio->user_id != auth()->id()){
            abort(403);
        }

        $userPortfolio->title = $request->portfolio_title;
        $userPortfolio->description = $request->portfolio_description;
        $userPortfolio->completion_date = $request->completion_date;
        $userPortfolio->project_url = $request->project_url;

        if($request->hasFile('project_thumbnail')){
            $path = $request->file('project_thumbnail')->store('freelancer/portfolio', ['disk' => 'public']);
            $userPortfolio->thumbnail = $path;
        }
        $userPortfolio->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\UserPortfolio  $userPortfolio
     * @return \Illuminate\Http\Response
     */
    public function destroy(UserPortfolio $userPortfolio)
    {
        //
    }
}
