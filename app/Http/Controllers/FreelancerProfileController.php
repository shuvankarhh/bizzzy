<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\UserAddress;
use Illuminate\Http\Request;
use App\Models\FreelancerProfile;

class FreelancerProfileController extends Controller
{
    public function index()
    {
        return view('profile.freelancer_profile')->with([
            'profile_photo' => auth()->user()->photo,
            'address' => auth()->user()->address,
            'education' => auth()->user()->educations()->orderBy('start_date', 'desc')->first(),
            'profile' => auth()->user()->freelance_profile,
            'languages' => auth()->user()->languages,
            'service' => auth()->user()->service_categories()->with('parent')->first(),
            'current' => auth()->user()->work_experiences()->where('currently_working', 1)->get(),
            'past' => auth()->user()->work_experiences()->whereNull('currently_working')->get(),
            'portfolios' => auth()->user()->portfolios()->limit(4)->latest()->get(),
            'portfolios_total' => auth()->user()->portfolios()->count('*'),
            'skills' => auth()->user()->skills,
        ]);
    }

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
        $fileName = time() . '.' . $extension;
        $data = base64_decode(preg_replace('#^data:image/\w+;base64,#i', '', $request->image));
        file_put_contents(storage_path("app/public/freelancer/profile_photo/$fileName"), $data);

        $user = User::find(auth()->id());
        $user->photo = "freelancer/profile_photo/$fileName";
        $user->save();
        // return response()->json($request->all());
    }

    public function profile_store(Request $request)
    {
        $request->validate([
            'country' => 'required',
            'street_address' => 'required',
            'city' => 'required',
            'phone' => 'required',
            'zip_postal' => 'string'
        ]);

        UserAddress::updateOrCreate(
            [
                'address_line1' => $request->street_address,
                'country' => $request->country,
                'state_or_province' => 'None',
                'city' => $request->city,
                'postal_code' => $request->zip_postal,
            ],
            ['user_id' => auth()->id(),]
        );

        return route('profile');
    }

    public function title_store(Request $request)
    {
        $request->validate([
            'title' => 'required'
        ]);
        auth()->user()->freelance_profile()->update(['professional_title' => $request->title]);

        return route('work.experience.index');
    }
}