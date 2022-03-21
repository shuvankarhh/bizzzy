@extends('layouts.app')
@section('navbar')
    <x-navbar links="true" />
@endsection
@section('content')
<div class="row d-sm-flex d-flex d-md-none d-lg-none d-xl-none d-xxl-none m-0">   
    <div class="col-12 m-0 p-0">
        <img class="freelance-profile-cover-image" src="{{ asset('images\general\profile-cover.png') }}" alt="">
    </div>
</div>
<section class="container body freelancer-profile">
    <section class="personal-information">
        <div class="card-border">
            <div class="row d-sm-none d-none d-md-flex d-lg-flex d-xl-flex d-xxl-flex">   
                <div class="col-12">
                    <img class="freelance-profile-cover-image" src="{{ asset('images\general\profile-cover.png') }}" alt="">
                </div>
            </div>
            <div class="row ps-3">
                <div class="col-md-2 col-lg-2 col-xl-2 col-xxl-2 col-sm-12 col-xs-12">
                    <div class="row justify-content-between">
                        <div class="profile-image-div col-md-12 col-lg-12 col-xl-12 col-xxl-12 col-sm-6 col-6">
                            <img class="profile-image" src="{{ asset('storage/' . $profile_photo) }}" alt="">
                        </div>
                        <div class="col-md-12 col-lg-12 col-xl-12 col-xxl-12 col-sm-5 col-5 mt-sm-2 mt-2 mb-md-2">
                            <h5 class="text-black">90%</h5>
                            <div class="progress-bar">
                                <div class="progress"></div>
                            </div>
                            <p class="m-0 text-secondary">Job Success</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-10 col-lg-10 col-xl-10 col-xxl-10 col-sm-12 col-xs-12 mt-md-2 mt-lg-2 mt-xl-2 mt-xxl-2">
                    <div class="row justify-content-between">
                        <div class="col-md-4 col-lg-4 col-xl-4 col-xxl-4 col-sm-12 col-xs-12">
                            <h4 class="text-black">{{ auth()->user()->name }}</h4>
                            <p class="text-black"><i class="fas fa-map-marker-alt"></i>  {{ $address->city . ', ' . $address->country }}  <span class="text-secondary">{{ now()->format('h:i a') . ' local time' }}</span></p>
                        </div>
                        <div class="col-md-4 col-lg-4 col-xl-4 col-xxl-4 col-sm-12 col-xs-12">
                            <p class="m-0 mb-sm-2 mb-2 text-black">{{ $education->institute_name }}</p>
                            <!-- Dribbble -->
                            <p class="m-0  mb-sm-2 mb-2 profile-social-icon">
                                <i class="fab fa-dribbble"></i>
                                <i class="fab fa-google"></i>
                                <i class="fab fa-linkedin-in"></i>
                                <i class="fab fa-dribbble"></i>
                            </p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-7 col-lg-7 col-xl-7 col-xxl-7 col-sm-12 col-xs-12">
                            Designed over 1000+ websites || I help startups businesses in User Experience || Web Design Expert || Front-end Developer & UI Design Expert || Redesign Expert || Freelancer
                        </div>
                    </div>
                    <div class="row d-sm-none d-none d-md-flex d-lg-flex d-xl-flex d-xxl-flex justify-content-end">
                        <div class="col-md-4 col-lg-4 col-xl-4 col-xxl-4 col-sm-12 col-xs-12 align-self-end text-end available-badge">
                            <img src="{{ asset('images\icons\job\availability.svg') }}" alt=""> <span class="ms-1"> Available Now </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row justify-content-center lower-text ms-1 me-1">
            <div class="col-md-3 text-center">
                <p class="m-0 top-text">Hours per week</p>
                <p class="m-0 bottom-text">{{ (is_null($profile->hours_per_week)) ? 'Not Set' : $profile->hours_per_week }}</p>
            </div>
            <div class="col-1 align-self-center">
                <span class="divider"></span>
            </div>

            <div class="col-md-3 text-center">
                <p class="m-0 top-text">Language</p>
                <p class="m-0 bottom-text">
                    @foreach ($languages as $idx=>$item)
                        @if ($idx == 0)
                            {{ locale_get_display_language($item->language_code) }}
                        @else
                            {{ ", " . locale_get_display_language($item->language_code) }}
                        @endif
                    @endforeach
                </p>
            </div>
            <div class="col-1 align-self-center">
                <span class="divider"></span>
            </div>

            <div class="col-md-3 text-center">
                <p class="m-0 top-text">Services as </p>
                <p class="m-0 bottom-text">{{ $service->parent->name }}</p>
            </div>
            <div class="col-1 align-self-center d-md-none d-lg-none d-xl-none d-xxl-none d-sm-inline d-inline">
                <span class="divider"></span>
            </div>

            <div class="col-md-3 text-center">
                <p class="m-0 top-text">Total Earnings</p>
                <p class="m-0 bottom-text">{{ (is_null($profile->total_earnings)) ? '-' : $profile->total_earnings }}</p>
            </div>
            <div class="col-1 align-self-center">
                <span class="divider"></span>
            </div>

            <div class="col-md-3 text-center">
                <p class="m-0 top-text">Total Jobs</p>
                <p class="m-0 bottom-text">{{ $profile->total_jobs }}</p>
            </div>
            <div class="col-1 align-self-center">
                <span class="divider"></span>
            </div>
            
            <div class="col-md-3 text-center">
                <p class="m-0 top-text">Total Hours</p>
                <p class="m-0 bottom-text">{{ $profile->total_hours }}</p>
            </div>
        </div>
    </section>
    <section class="bio card-border mt-4">
        <div class="row justify-content-between">
            <div class="col-md-8 col-lg-8 col-xl-8 col-xxl-8 col-sm-12 col-xs-12 mt-3 ms-3">
                <h3>{{ $profile->professional_title }}</h3>
            </div>
            <div class="col-md-4 col-lg-4 col-xl-4 col-xxl-4 col-sm-12 col-xs-12 align-self-end hourly-rate me-3">
               <p class="m-0">${{ (int)$profile->price_per_hour }}/hr</p class="m-0">
            </div>
            <div class="col-10 mt-3 ms-3 mb-3">
                <p id="show_text">{{ \Illuminate\Support\Str::limit($profile->description, 350, $end='....') }}</p>
                <u onclick="show_full_text(this)" role="button" class="m-0">more</u>
                <p class="d-none" id="full_text"> {{ $profile->description }} </p>
            </div>
        </div>
    </section>
    <section class="experience card-border mt-4">
        <div class="row m-0 p-0">
            <div class="col-12 card-header-profile">
                <h3 class="pt-4 ps-4">Experience</h3>
                <div class="card-header-button">
                    <i role="button" class="fas fa-pen first"></i>
                    <i role="button" class="fas fa-plus second"></i>
                </div>
            </div>
            <div class="col-12 ps-5 pe-5 pb-3">
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
                    </div>
                </div>
            </div>
        </div>
    </section>
</section>
@endsection

@push('script')
    <script>
        let progress = document.querySelector(".progress");
        progress.style.width = '90%';

        let show_full_text  = (e) => {
            document.getElementById('show_text').innerHTML = document.getElementById('full_text').innerHTML
            e.style.display = "none";
        }
    </script>
@endpush
