<?php

namespace App\Http\Controllers;

use App\Http\Requests\FreelancerProfileCategoryRequest;
use App\Models\Category;
use App\Models\FreelancerProfile;
use App\Models\FreelancerProfileCategory;
use Illuminate\Http\Request;

class FreelancerProfileCategoryController extends Controller
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
        $categories = auth()->user()->freelance_profile->categories;
        if($categories->isEmpty()){
            $category_id = NULL;
            $parent_id = NULL;
        }else{
            $category_id = $categories[0]->id;
            $parent_id = $categories[0]->parent_category_id;
        }

        $sub_categories = NULL;
        $sub_category_id = NULL;
        if($parent_id != 0){
            $sub_categories = Category::where('parent_category_id', $parent_id)->get();
            $sub_category_id = $category_id;
            $category_id = $parent_id;
        }
        return view('get_started.add_category')->with([
            'categories' => Category::where('parent_category_id', 0)->get(),
            'selected_category' => $category_id,
            'sub_categories' => $sub_categories,
            'sub_category_id' => $sub_category_id
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(FreelancerProfileCategoryRequest $request)
    {
        if(empty($request->sub_category)){
            $category = $request->category;
        }else{
            $category = $request->sub_category;
        }

        FreelancerProfileCategory::updateOrCreate(
            [ 'profile_id' => auth()->user()->freelance_profile->id ],
            [ 'category_id' => $category ]
        );

        return route('question.twelve');
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
