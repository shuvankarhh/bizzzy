@extends('layouts.app')
@section('navbar')
    <x-navbar links="true" />
@endsection
@section('content')
<section class="container body">
<!-- Tabs navs -->
    <section class="job-body">
        <ul class="nav nav-tabs mb-3" id="ex1" role="tablist">
            <li class="nav-item" role="presentation">
                <a class="nav-link active" id="all_job" data-mdb-toggle="tab" href="#all_job_tab" role="tab" aria-controls="all_job" aria-selected="true">
                    <span class="icon">
                        <img src="{{ asset('images\icons\job\all.svg') }}" alt="Briefcase">                           
                        <span class="text">All Jobs</span>
                    </span>
                </a>
            </li>
            <li class="nav-item" role="presentation">
                <a class="nav-link" id="best_match" data-mdb-toggle="tab" href="#best_match_tab" role="tab" aria-controls="best_match" aria-selected="false">
                    <span class="icon">
                        <img src="{{ asset('images\icons\job\best.svg') }}" alt="Briefcase">
                        <span class="text"> Best Matches </span>
                    </span>
                </a>
            </li>
            <li class="nav-item" role="presentation">
                <a class="nav-link" id="hourly" data-mdb-toggle="tab" href="#hourly_tab" role="tab" aria-controls="hourly" aria-selected="false">
                    <span class="icon">
                        <img src="{{ asset('images\icons\job\hourly.svg') }}" alt="Briefcase">
                        <span class="text"> Hourly </span>
                    </span>                    
                </a>
            </li>
            <li class="nav-item" role="presentation">
                <a class="nav-link" id="fixed_rate" data-mdb-toggle="tab" href="#fixed_rate_tab" role="tab" aria-controls="fixed_rate" aria-selected="false">
                    <span class="icon">
                        <img src="{{ asset('images\icons\job\fixed.svg') }}" alt="Briefcase">
                        <span class="text"> Fixed Rate </span>
                    </span>                    
                </a>
            </li>
            <li class="nav-item" role="presentation">
                <a class="nav-link" id="saved_jobs" data-mdb-toggle="tab" href="#saved_jobs_tab" role="tab" aria-controls="saved_jobs" aria-selected="false">
                    <span class="icon">
                        <img src="{{ asset('images\icons\job\saved.svg') }}" alt="Briefcase">
                        <span class="text"> Saved Jobs </span>
                    </span>                    
                </a>
            </li>
        </ul>
        <!-- Tabs navs -->

        <!-- Tabs content -->
        <div class="tab-content" id="ex1-content">
            <div class="tab-pane fade show active" id="all_job_tab" role="tabpanel" aria-labelledby="all_job">
                <x-job-component applied="1" />
                <x-job-component applied="0" />
                <x-job-component applied="0" />
                <x-job-component applied="0" />
                <x-job-component applied="1" />
                <x-job-component applied="0" />
            </div>
            <div class="tab-pane fade" id="best_match_tab" role="tabpanel" aria-labelledby="best_match">
                
            </div>
            <div class="tab-pane fade" id="hourly_tab" role="tabpanel" aria-labelledby="hourly">
                Hourly
            </div>
            <div class="tab-pane fade" id="fixed_rate_tab" role="tabpanel" aria-labelledby="fixed_rate">
                
            </div>
            <div class="tab-pane fade" id="saved_jobs_tab" role="tabpanel" aria-labelledby="saved_jobs">
                Tab Saved content
            </div>
        </div>
        <!-- Tabs content -->
    </section>
</section>

@endsection