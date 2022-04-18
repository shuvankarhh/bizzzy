<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function submitProfile()
    {
        return view('profile.submit_profile')->with([
            'profile_photo' => auth()->user()->photo,
            'address' => auth()->user()->address,
            'education' => auth()->user()->educations()->orderBy('start_date', 'desc')->first(),
            'profile' => auth()->user()->freelance_profile::with('service_categories.parent')->first(),
            'languages' => auth()->user()->languages,
            // 'service' => auth()->user()->service_categories()->with('parent')->first(),
            'current' => auth()->user()->work_experiences()->where('currently_working', 1)->get(),
            'past' => auth()->user()->work_experiences()->whereNull('currently_working')->get(),
            'skills' => auth()->user()->skills,
        ]);
    }
}