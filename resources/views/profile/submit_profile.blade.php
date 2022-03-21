@extends('layouts.app')

@section('navbar')
    <x-navbar links="false" />
@endsection

@section('content')
<div class="row submit-top-header">
    <div class="col-md-8 col-lg-8 col-xl-8 col-xxl-8 col-sm-12 col-12 first">
        <img width="25px" height="25px" src="{{ asset('/images/icons/tick-mark.png') }}" alt="">
        <p class="m-0">Make any edits you want, then submit your profile. You can make more changes after it’s live.</p>
    </div>
    <div class="col-md-3 col-lg-3 col-xl-3 col-xxl-3 col-sm-12 col-12 second">
        <a href="{{ route('freelancer.index') }}" role="button" class="btn submit-profile-btn">Submit Profile</a>
    </div>
</div>
<div class="container py-3">
    <div class="row submit-profile">
        <div class="col-md-12 col-lg-12 col-xl-12 col-sm-12 mb-3">
            <button class="btn edit-profile-btn" type="submit">Edit Profile</button>
        </div>

        <div class="col-md-12 col-lg-12 col-xl-12 col-sm-12">
            <div class="profile">
                <div class="profile-info row ">
                    <div class="col-md-4 col-lg-4 col-xl-2 col-sm-6 m-0 p-0">
                        <img class="profile-photo" src="{{ asset('storage/' . $profile_photo) }}" alt="">
                    </div>
                    <div class="col-md-8 col-lg-8 col-xl-8 col-sm-6 align-self-center mt-3">
                        <p class="profile-name">{{ auth()->user()->name }}</p>
                        <div class="profile-location">
                            <img class="me-2" src="{{ asset('/images/icons/location.svg') }}"
                                alt="">
                            <p class="m-0">{{ $address->city }}, {{ $address->country }}</p>
                        </div>
                        <div class="profile-details mt-2">
                            <p>{{ $profile->description }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-12 col-lg-12 col-xl-12 col-sm-12">
            <div class="profile mt-4">
                <div class="profile-content">
                    <div class="submit-profile-title">
                        <p class="content-title"> {{ $profile->professional_title }} </p>
                        <p class="rate mb-3">${{ $profile->price_per_hour }}/hr</p>
                    </div>

                    <p id="show_text">{{ \Illuminate\Support\Str::limit($profile->description, 350, $end='....') }}</p>
                    <u onclick="show_full_text(this)" role="button" class="m-0">more</u>
                    <p class="d-none" id="full_text"> {{ $profile->description }} </p>

                </div>
            </div>
        </div>
        <div class="col-md-12 col-lg-12 col-xl-12 col-sm-12">
            <div class="profile mt-4">
                <div class="profile-content">
                    <p class="content-title">Skills</p>
                    <div>
                        <p class="content-subtitle">UX/UI Design</p>
                        <div class="job-tag">
                            @foreach ($skills as $item)
                                <div>
                                    {{ $item->name }}
                                </div>                                
                            @endforeach
                        </div>
                    </div>

                    <div class="mt-3">
                        <p class="content-subtitle">Web Development</p>
                        <div class="job-tag">
                            @foreach ($skills as $item)
                                <div>
                                    {{ $item->name }}
                                </div>                                
                            @endforeach
                        </div>
                    </div>
                </div>
                <hr>
                <div class="text-center pb-3">
                    <a class="show-all" href="#">Show all Skills <i class="fas fa-chevron-down"></i></a>
                </div>
            </div>
        </div>
        <div class="col-md-12 col-lg-12 col-xl-12 col-sm-12">
            <div class="profile mt-4">
                <div class="profile-content">
                    <p class="content-title">Experience</p>
                    <div class="job-body">
                        <ul class="nav nav-tabs mb-3" id="ex1" role="tablist">
                            <li class="nav-item" role="presentation">
                                <a class="nav-link active" id="current" data-mdb-toggle="tab" href="#current_tab" role="tab" aria-controls="current" aria-selected="true">
                                    <span class="icon">
                                        <img src="{{ asset('images\icons\job\all.svg') }}" alt="Briefcase">                           
                                        <span class="text">Current</span>
                                    </span>
                                </a>
                            </li>
                            <li class="nav-item" role="presentation">
                                <a class="nav-link" id="past" data-mdb-toggle="tab" href="#past_tab" role="tab" aria-controls="past" aria-selected="false">
                                    <span class="icon">
                                        <img src="{{ asset('images\icons\job\hourly.svg') }}" alt="Briefcase">
                                        <span class="text"> Past </span>
                                    </span>                    
                                </a>
                            </li>
                        </ul>
                        <!-- Tabs content -->
                        <div class="tab-content" id="ex1-content">
                            <div class="tab-pane fade show active" id="current_tab" role="tabpanel" aria-labelledby="current">
                                @foreach ($current as $idx=>$item)
                                    @if ($idx != 0)
                                        <hr>
                                    @endif
                                    <h4 class="m-0 text-black">{{ $item->title }}</h4>
                                    <p class="mt-2 mb-2">{{ $item->description }}</p>
                                    <p class="m-0"><b class="text-black">From:</b> {{ (is_null($item->start_date)) ? '-' : $item->start_date->format('M d, Y') }}</p>
                                    <p class="m-0"><b class="text-black">To:</b> {{ (is_null($item->end_date)) ? '-' : $item->end_date->format('M d, Y') }}</p>
                                @endforeach
                                <hr>
                                <div class="text-center">
                                    <a class="show-all" href="#">Show all Experiences <i class="fas fa-chevron-down"></i></a>
                                </div>
                            </div>
                            <div class="tab-pane fade show" id="past_tab" role="tabpanel" aria-labelledby="past">
                                @foreach ($past as $idx=>$item)
                                    @if ($idx != 0)
                                        <hr>
                                    @endif
                                    <h4 class="m-0 text-black">{{ $item->title }}</h4>
                                    <p class="mt-2 mb-2">{{ $item->description }}</p>
                                    <p class="m-0"><b class="text-black">From:</b> {{ (is_null($item->start_date)) ? '-' : $item->start_date->format('M d, Y') }}</p>
                                    <p class="m-0"><b class="text-black">To:</b> {{ (is_null($item->end_date)) ? '-' : $item->end_date->format('M d, Y') }}</p>
                                @endforeach
                                <hr>
                                <div class="text-center">
                                    <a class="show-all" href="#">Show all Experiences <i class="fas fa-chevron-down"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <div class="col-md-12 col-lg-12 col-xl-12 col-sm-12">
            <div class="profile mt-4">
                <div class="profile-content">
                    <p class="content-title">Language</p>
                    <div class="submit-profile-language" style="">
                            @foreach ($languages as $idx=>$item)
                            <p class="me-2"> <span class="font-weight-bold">{{ locale_get_display_language($item->language_code) }}:</span> Conversational</p>
                        @endforeach
                    </div>                        
                    @foreach ($languages as $item)
                            <p></p>
                    @endforeach

                </div>
            </div>
        </div>
    </div>
    <div class="row mt-5 ">
        <div class="text-center col-12 mt-5"><a href="{{ route('freelancer.index') }}" role="button" class="btn submit-profile-btn">Submit Profile</a></div>
    </div>
</div>
@endsection
