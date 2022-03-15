<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\FreelancerProfile;

class FreelancerProfileController extends Controller
{
    public function bio_store(Request $request)
    {
        $request->validate([
            'bio' => 'required|min:100'
        ]);

        auth()->user()->freelance_profile()->update(['description' => $request->bio]);

        return route('category.create');
        
    }

    public function hourly_rate_store(Request $request)
    {
        $request->validate([
            'hourly_rate' => 'required|numeric|min:20'
        ]);

        auth()->user()->freelance_profile()->update(['price_per_hour' => $request->hourly_rate]);

        return route('question.thirteen');
        
    }

    public function image_store(Request $request)
    {
        $extension = explode('/', mime_content_type($request->image))[1];
        $fileName = time().'.'.$extension; 
        $data = base64_decode(preg_replace('#^data:image/\w+;base64,#i', '', $request->image));
        file_put_contents(storage_path("app/public/freelancer/profile_photo/$fileName"), $data);

        $user = User::find(auth()->id());
        $user->photo = "freelancer/profile_photo/$fileName";
        $user->save();
        // return response()->json($request->all());
    }
}
