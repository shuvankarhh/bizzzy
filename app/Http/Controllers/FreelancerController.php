<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\FreelancerProfile;

class FreelancerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return view('contents.freelancer.freelancer-list')->with([
            'freelancers' => FreelancerProfile::with(['user' => function($q){
                                $q->with('address', 'skills');
                            }])
                            ->with('service_categories')
                            ->whereHas('user', function($q) use($request){
                                $q->whereHas('skills', function($q) use($request){
                                    if($request->search){
                                        $q->where("name", "like", "%{$request->search}%");
                                    }
                                })
                                ->whereHas('address', function($q) use($request){
                                    if($request->location){
                                        $q->where("country", "$request->location");
                                    }
                                });
                            })                            
                            ->whereHas('service_categories', function($q2) use($request){
                                if($request->category){
                                    $q2->where('freelancer_profile_categories.category_id', $request->category);
                                }
                            })
                            ->when($request->feedback, function ($query) use($request) {
                                return $query->where('average_rating', '>=', $request->feedback);
                            })
                            ->when($request->experience, function ($query) use($request) {
                                return $query->where('experience_level', '=', $request->experience);
                            })
                            ->paginate(2),
            'categories' => Category::with('children')->where('parent_category_id', 0)->get(),
            'searchParam' => $request->all()
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
    public function show(User $freelancer)
    {
        return view('contents.freelancer.freelancer-show')->with([
            'profile_photo' => $freelancer->photo,
            'name' => $freelancer->name,
            'address' => $freelancer->address,
            'education' => $freelancer->educations()->orderBy('start_date', 'desc')->first(),
            'profile' => $freelancer->freelance_profile::with('service_categories.parent')->first(),
            'languages' => $freelancer->languages,
            'service' => NULL,
            'current' => $freelancer->work_experiences()->where('currently_working', 1)->get(),
            'past' => $freelancer->work_experiences()->whereNull('currently_working')->get(),
            'portfolios' => $freelancer->portfolios()->limit(4)->latest()->get(),
            'portfolios_total' => $freelancer->portfolios()->count('*'),
            'skills' => $freelancer->skills,
            'contracts' => $freelancer->freelancerContracts()
            ->with(['job' => function ($query) {
                $query->select('id', 'name', 'description');
            }])->with( ['recruiter' => function ($query){
                $query->select('id', 'name', 'photo');
            }])->get(),
            'self' => false
        ]);
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
