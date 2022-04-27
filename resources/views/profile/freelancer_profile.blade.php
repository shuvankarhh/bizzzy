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
    <section class="personal-information card-border">
        <div class="row d-sm-none d-none d-md-flex d-lg-flex d-xl-flex d-xxl-flex">   
            <div class="col-12">
                <img class="freelance-profile-cover-image" src="{{ asset('images\general\profile-cover.png') }}" alt="">
            </div>
        </div>
        <div class="row ps-3">
            <div class="col-md-2 col-lg-2 col-xl-2 col-xxl-2 col-sm-12 col-xs-12">
                <div class="row justify-content-between">
                    <div class="profile-image-div col-md-12 col-lg-12 col-xl-12 col-xxl-12 col-sm-6 col-6">
                        <img class="profile-image" src="{{ asset('storage/' . $profile_photo) }}" alt="None">
                    </div>
                    <div class="col-md-12 col-lg-12 col-xl-12 col-xxl-12 col-sm-5 col-5 mt-sm-2 mt-2 mb-md-2">
                        <h5 class="text-black">90%</h5>
                        <div class="progress-bar">
                            <div class="progress"></div>
                        </div>
                        <p class="m-0 text-gray">Job Success</p>
                    </div>
                </div>
            </div>
            <div class="col-md-10 col-lg-10 col-xl-10 col-xxl-10 col-sm-12 col-xs-12 mt-md-2 mt-lg-2 mt-xl-2 mt-xxl-2">
                <div class="row justify-content-between">
                    <div class="col-md-4 col-lg-4 col-xl-4 col-xxl-4 col-sm-12 col-xs-12">
                        <h4 class="text-black">{{ auth()->user()->name }}</h4>
                        <p class="text-black">
                            @if (!is_null($address))
                                <i class="fas fa-map-marker-alt"></i> {{ $address->city . ', ' . $address->country }} 
                            @endif
                            <span class="text-gray">{{ now()->format('h:i a') . ' local time' }}</span>
                        </p>
                    </div>
                    <div class="col-md-4 col-lg-3 col-xl-3 col-xxl-3 col-sm-12 col-xs-12">
                        <p class="m-0 mb-sm-2 mb-2 text-black">{{ (is_null($education)) ? '' : $education->institute_name }}</p>
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
                <div class="row d-sm-none d-none d-md-flex d-lg-flex d-xl-flex d-xxl-flex justify-content-end pb-2">
                    <div class="col-md-4 col-lg-4 col-xl-4 col-xxl-4 col-sm-12 col-xs-12 align-self-end text-end available-badge">
                        <img src="{{ asset('images\icons\job\availability.svg') }}" alt=""> <span class="ms-1"> Available Now </span>
                    </div>
                </div>
            </div>
        </div>
        <hr>
        <div class="lower-text ms-1 me-1">
            <div>
                <p class="m-0 top-text">Hours per week</p>
                <p class="m-0 bottom-text">{{ (is_null($profile->hours_per_week)) ? 'Not Set' : $profile->hours_per_week }}</p>
            </div>
            {{-- <div class="col-1 align-self-center">
                <span class="divider"></span>
            </div> --}}

            <div>
                <p class="m-0 top-text">Language</p>
                <p class="m-0 bottom-text">
                    @forelse ($languages as $idx=>$item)
                        @if ($idx == 0)
                            {{ locale_get_display_language($item->language_code) }}
                        @else
                            {{ ", " . locale_get_display_language($item->language_code) }}
                        @endif
                    @empty
                        No Language Selected!
                    @endforelse
                </p>
            </div>
            {{-- <div class="col-1 align-self-center">
                <span class="divider"></span>
            </div> --}}

            <div class="lower-text-line-break-div">
                <p class="m-0 top-text">Services as </p>
                <p class="m-0 bottom-text">
                    {{ (is_null($profile->service_categories[0])) 
                        ? 'Not Set' 
                        : 
                        ( 
                            ($profile->service_categories[0]->parent_category_id == '0') 
                            ? $profile->service_categories[0]->name
                            : "{$profile->service_categories[0]->parent->name}: {$profile->service_categories[0]->name}"
                        ) 
                    }}
                </p>
            </div>
            {{-- <div class="col-1 align-self-center d-md-none d-lg-none d-xl-none d-xxl-none d-sm-inline d-inline">
                <span class="divider"></span>
            </div> --}}

            <div>
                <p class="m-0 top-text">Total Earnings</p>
                <p class="m-0 bottom-text">{{ (is_null($profile->total_earnings)) ? '-' : $profile->total_earnings }}</p>
            </div>
            {{-- <div class="col-1 align-self-center">
                <span class="divider"></span>
            </div> --}}

            <div>
                <p class="m-0 top-text">Total Jobs</p>
                <p class="m-0 bottom-text">{{ $profile->total_jobs }}</p>
            </div>
            {{-- <div class="col-1 align-self-center">
                <span class="divider"></span>
            </div> --}}
            
            <div>
                <p class="m-0 top-text">Total Hours</p>
                <p class="m-0 bottom-text">{{ $profile->total_hours }}</p>
            </div>
        </div>
    </section>
    <section class="bio card-border card-padding mt-4">
        <div class="row justify-content-between">
            <div class="col-md-8 col-lg-8 col-xl-8 col-xxl-8 col-sm-12 col-xs-12">
                <h2>{{ $profile->professional_title }}</h2>
            </div>
            <div class="col-md-4 col-lg-4 col-xl-4 col-xxl-4 col-sm-12 col-xs-12 align-self-end hourly-rate ms-sm-4 ms-4 me-3 mt-lg-2 mt-xl-2 mt-xxl-2">
               <p class="m-0">${{ (int)$profile->price_per_hour }}/hr</p>
            </div>
            <div class="col-10">
                <p id="show_text">{{ \Illuminate\Support\Str::limit($profile->description, 350, $end='....') }}</p>
                @if (strlen($profile->description) > 350)
                    <u onclick="show_full_text(this)" role="button" class="m-0">more</u>
                @endif
                <p class="d-none" id="full_text"> {{ $profile->description }} </p>
            </div>
        </div>
    </section>
    <section class="bio card-border card-padding mt-4">
        <div class="row justify-content-between m-0 p-0">
            <div class="col-12 card-header-profile m-0 p-0">
                <h2>Jobs History</h2>
                <div class="card-header-button">
                    {{-- <i role="button" class="fas fa-pen first"></i>
                    <a style="color: unset" role="button" href="{{ route('portfolio.create') }}"><i class="fas fa-plus second"></i></a> --}}
                </div>
            </div>
            <div class="col-12 m-0 p-0">
                <ul class="nav nav-tabs mb-3" id="ex1" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="current" data-mdb-toggle="tab" href="#completeted_jobs" role="tab" aria-controls="current" aria-selected="true">
                            <span class="icon">
                                <img src="{{ asset('images\icons\job\all.svg') }}" alt="Briefcase">                           
                                <span class="text">Completed Jobs</span>
                            </span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="past" data-mdb-toggle="tab" href="#in_progress_jobs" role="tab" aria-controls="past" aria-selected="false">
                            <span class="icon">
                                <img src="{{ asset('images\icons\job\hourly.svg') }}" alt="Briefcase">
                                <span class="text"> Inprogress </span>
                            </span>                    
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="past" data-mdb-toggle="tab" href="#canceled_jobs" role="tab" aria-controls="past" aria-selected="false">
                            <span class="icon">
                                <img src="{{ asset('images\icons\job\hourly.svg') }}" alt="Briefcase">
                                <span class="text"> Cancled </span>
                            </span>                    
                        </a>
                    </li>
                </ul>
                <!-- Tabs content -->
                <div class="tab-content" id="ex1-content">
                    <div class="tab-pane fade show active" id="completeted_jobs" role="tabpanel" aria-labelledby="current">
                        @forelse ($completed_contracts as $item)
                            <x-profile-job-component :contract="$item"/>
                        @empty
                            <p class="text-center">No Jobs!</p>
                        @endforelse                        
                    </div>
                    <div class="tab-pane fade" id="in_progress_jobs" role="tabpanel" aria-labelledby="current">
                        @forelse ($active_contracts as $item)
                            <x-profile-job-component :contract="$item"/>
                        @empty
                            <p class="text-center">No Jobs!</p>
                        @endforelse
                    </div>
                    <div class="tab-pane fade" id="canceled_jobs" role="tabpanel" aria-labelledby="current">
                        @forelse ($canceled_contracts as $item)
                            <x-profile-job-component :contract="$item"/>
                        @empty
                            <p class="text-center">No Jobs!</p>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="portfolio card-border card-padding mt-4">
        <div class="row m-0 p-0">
            <div class="col-12 card-header-profile m-0 p-0">
                <h2>Portfolio</h2>
                @if ($self)
                    <div class="card-header-button">
                        <i role="button" class="fas fa-pen first"></i>
                        <a style="color: unset" role="button" href="{{ route('portfolio.create') }}"><i class="fas fa-plus second"></i></a>
                    </div>                    
                @endif
            </div>
            @forelse ($portfolios as $idx=>$item)
            @if ($idx != 3)
                <div class="col-md-4 col-lg-3 col-xl-3 col-xxl-3 col-sm-6 col-6 m-2 p-0">
            @else
                <div class="col-md-4 col-lg-3 col-xl-3 col-xxl-3 col-sm-6 col-6 d-inline d-sm-inline d-md-none m-2 p-0">
            @endif
                    <div class="row h-100 pb-3 pb-sm-3">
                        @if (!is_null($item->thumbnail))                                
                            <div class="col-12 text-center">
                                @if (!empty($item->thumbnail) AND file_exists(public_path('storage/' . $item->thumbnail)))
                                    <img class="portfolio-image" src="{{ asset('storage/' . $item->thumbnail) }}" alt="">
                                @endif
                            </div>
                        @endif
                        <div class="col-12 portfolio-text">
                            @if (empty($item->project_url))
                                <p class="m-0 mt-1 portfolio-title">{{ $item->title }}</p>
                            @else
                                <a href="{{ $item->project_url }}" target="_blank"><p class="m-0 mt-1 portfolio-title">{{ $item->title }}</p></a>
                            @endif
                            <p id="show_text{{ $idx }}" class="m-0 d-none d-sm-none d-md-block">{!! \Illuminate\Support\Str::limit($item->description, 100, $end='....<u onclick="show_full_text(this, '.$idx.')" role="button" class="m-0 job-more-button">more</u>') !!}</p>
                            <span class="d-none" id="full_text{{ $idx }}">{{ $item->description }}</span>
                        </div>
                    </div>
                </div>
            @empty
                <p class="text-center">No Portfolio Added!</p>
            @endforelse
            @if ($portfolios_total > 3)               
                <div class="col-12">  
                    <hr>
                    <div class="text-center pb-3">
                        <a class="show-all" href="#">Show all Experiences <i class="fas fa-chevron-down"></i></a>
                    </div>
                </div>   
            @endif
        </div>
    </section>
    <section class="portfolio card-border card-padding mt-4">
        <div class="row m-0 p-0">
            <div class="col-12 card-header-profile m-0 p-0">
                <h2 class="content-title">Skills</h2>
                @if ($self)
                    <div class="card-header-button">
                        <i role="button" class="fas fa-pen first"></i>
                        <button id="profile_skill_modal" data-mdb-toggle="modal" data-mdb-target="#skill_modal"><i class="fas fa-plus second"></i></button>
                    </div>
                @endif
            </div>
            <div class="col-12 m-0 p-0">
                <div>
                    {{-- <p class="content-subtitle">UX/UI Design</p> --}}
                    <div class="job-tag">
                        @foreach ($skills as $item)
                            <div>
                                {{ $item->name }}
                            </div>                                
                        @endforeach
                    </div>
                </div>

                {{-- <div class="mt-3">
                    <p class="content-subtitle">Web Development</p>
                    <div class="job-tag">
                        @foreach ($skills as $item)
                            <div>
                                {{ $item->name }}
                            </div>                                
                        @endforeach
                    </div>
                </div> --}}
                <hr>
                <div class="text-center">
                    <a class="show-all" href="#">Show all Skills <i class="fas fa-chevron-down"></i></a>
                </div>
            </div>
        </div>
        {{-- <div class="profile">
            <div class="profile-content">
            </div>
            <hr>
            <div class="text-center pb-3">
                <a class="show-all" href="#">Show all Skills <i class="fas fa-chevron-down"></i></a>
            </div>
        </div> --}}
    </section>
    <section class="experience card-border card-padding mt-4">
        <div class="row m-0 p-0">
            <div class="col-12 card-header-profile m-0 p-0">
                <h2 class="">Experience</h2>
                @if ($self)
                    <div class="card-header-button">
                        <i role="button" class="fas fa-pen first"></i>
                        <i role="button" data-mdb-target="#work_modal" data-mdb-toggle="modal" class="fas fa-plus second"></i>
                    </div>
                @endif
            </div>
            <div class="col-12 m-0 p-0">
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
                        @forelse ($current as $idx=>$item)
                            @if ($idx != 0)
                                <hr>
                            @endif
                            <h4 class="m-0 text-black">{{ $item->title }}</h4>
                            <p class="mt-2 mb-2">{{ $item->description }}</p>
                            <p class="m-0"><b class="text-black">From:</b> {{ (is_null($item->start_date)) ? '-' : $item->start_date->format('M d, Y') }}</p>
                            <p class="m-0"><b class="text-black">To:</b> {{ (is_null($item->end_date)) ? '-' : $item->end_date->format('M d, Y') }}</p>
                        @empty
                            <p>No Current jobs.</p>
                        @endforelse
                        <hr>
                        <div class="text-center">
                            <a class="show-all" href="#">Show all Experiences <i class="fas fa-chevron-down"></i></a>
                        </div>
                    </div>
                    <div class="tab-pane fade show" id="past_tab" role="tabpanel" aria-labelledby="past">
                        @forelse ($past as $idx=>$item)
                            @if ($idx != 0)
                                <hr>
                            @endif
                            <h4 class="m-0 text-black">{{ $item->title }}</h4>
                            <p class="mt-2 mb-2">{{ $item->description }}</p>
                            <p class="m-0"><b class="text-black">From:</b> {{ (is_null($item->start_date)) ? '-' : $item->start_date->format('M d, Y') }}</p>
                            <p class="m-0"><b class="text-black">To:</b> {{ (is_null($item->end_date)) ? '-' : $item->end_date->format('M d, Y') }}</p>
                        @empty
                            <p>No Past jobs.</p>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </section>
</section>

<div class="modal fade" id="skill_modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <form action="#" id="profile_skill_form">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Skill</h5>
                </div>
                <div class="modal-body p-4">
                    <select id="skills" name="name[]" multiple placeholder="Select skill">
                    </select>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Update</button>
                    <button id="skill_modal_close_button" type="button" class="btn btn-link custom-close" data-mdb-dismiss="modal" style="">Close</button>
                </div>
            </form>
        </div>
    </div>
</div>

<x-add-work-experience-modal />
@endsection

@push('css')
<style>
    body{
        background: #f9fafc;
    }
</style>
    
@endpush

@push('script')
    <script>
        let progress = document.querySelector(".progress");
        progress.style.width = '90%';
    </script>
@endpush