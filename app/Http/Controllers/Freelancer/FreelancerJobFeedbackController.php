<?php

namespace App\Http\Controllers\Freelancer;

use App\Models\Contract;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FreelancerJobFeedbackController extends Controller
{
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('components.job-feedback')->with([
            'contract' => Contract::with('job', 'feedback')->find(decrypt($id))
        ]);
    }
}
