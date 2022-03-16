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
                <div class="job-card mb-4">
                    <section class="upper-content applied-div pe-0">
                        <div class="row pe-0">
                            <div class="col-md-1 col-lg-1 col-xl-1 col-xxl-1 col-sm-8 col-8 p-0 d-md-none d-lg-none d-xl-none d-xxl-none"></div>
                            <div class="col-md-1 col-lg-1 col-xl-1 col-xxl-1 col-sm-4 col-4 p-0 d-md-none d-lg-none d-xl-none d-xxl-none">
                                <div class="applied text-center">
                                    <img src="{{ asset('images\icons\job\applied.svg') }}" alt="">
                                    Applied
                                </div>                            
                            </div>
                            <div class="col-md-1 col-lg-1 col-xl-1 col-xxl-1 col-sm-1 col-1 p-0 d-md-none d-lg-none d-xl-none d-xxl-none"></div>
                            <div class="col-md-1 col-lg-1 col-xl-1 col-xxl-1 col-sm-11 col-11 p-0 d-md-none d-lg-none d-xl-none d-xxl-none">
                                <p class="m-0" style="font-weight: bold">
                                    <span class="badge badge-dark d-md-none d-lg-none d-xl-none d-xxl-none"> <img class="featured" src="{{ asset('images\icons\job\featured.svg') }}" alt=""> FEATURED JOB</span>
                                    <span class="badge badge-danger d-md-none d-lg-none d-xl-none d-xxl-none">URGENT</span>
                                    <span class="badge badge-success d-md-none d-lg-none d-xl-none d-xxl-none">OPPERTUNITY</span>
                                </p>
                            </div>
                            <div class="col-md-1 col-lg-1 col-xl-1 col-xxl-1 col-sm-2 col-2 pb-3 pt-3">
                                <span class="job-avater-span">
                                    <img class="job-avater" src="{{ asset('storage/freelancer/profile_photo/1647342535.png') }}" alt="">
                                    <img class="job-avater-icon" src="{{ asset('images\icons\job\plus.svg') }}" alt="">
                                </span>
                            </div>
                            <div class="col-md-10 col-lg-10 col-xl-10 col-xxl-10 col-sm-9 col-9 pb-3 pt-3">
                                <p class="m-0" style="font-weight: bold">
                                    Product UI Designer @ Fast-Growing SaaS
                                    <span class="badge badge-dark d-none d-sm-none d-md-inline d-lg-inline d-xl-inline d-xxl-inline"> <img class="featured" src="{{ asset('images\icons\job\featured.svg') }}" alt=""> FEATURED JOB</span>
                                    <span class="badge badge-danger d-none d-sm-none d-md-inline d-lg-inline d-xl-inline d-xxl-inline">URGENT</span>
                                    <span class="badge badge-success d-none d-sm-none d-md-inline d-lg-inline d-xl-inline d-xxl-inline">OPPERTUNITY</span>
                                </p>
                                <p class="m-0">Your Name</p>
                            </div>
                            <div class="col-md-1 col-lg-1 col-xl-1 col-xxl-1 col-sm-4 col-xs-4 p-0 d-none d-sm-none d-md-block d-lg-block d-xl-block d-xxl-block">
                                <div class="applied text-center">
                                    <img src="{{ asset('images\icons\job\applied.svg') }}" alt="">
                                    Applied
                                </div>                            
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-11">
                                <p class="m-0">Are you tired of working on MVPs and on boring design projects? Are you an experienced designer looking to work on tough design problems and create astonishing designs ? Helpjuice (a fast-growing b2b software) is hiring for a designer. What is Helpjuice? Helpjuice is a SaaS application that empowers thousands of large and small companies (such as...</p>
                                <a class="m-0 more-text" href="">more</a>
                            </div>
                            <div class="col-11 mt-3">
                                <div class="job-tag">
                                    <div>
                                        UI Design
                                    </div>
                                    <div>
                                        Adobe XD
                                    </div>
                                    <div>
                                        Website Design
                                    </div>
                                    <div>
                                        Product Design
                                    </div>
                                </div>
                            </div>
                            <div class="col-11 mt-3">
                                <div class="flex-text">
                                    <div>
                                        <img src="{{ asset('images\icons\job\verified-payment.svg') }}" alt="">
                                        <p class="ms-2 m-0 bizzzy-color">Payment verified</p>
                                    </div>
                                    <div>
                                        <img src="{{ asset('images\icons\job\full-star.svg') }}" alt="">
                                        <img src="{{ asset('images\icons\job\full-star.svg') }}" alt="">
                                        <img src="{{ asset('images\icons\job\full-star.svg') }}" alt="">
                                        <img src="{{ asset('images\icons\job\full-star.svg') }}" alt="">
                                        <img src="{{ asset('images\icons\job\full-star.svg') }}" alt="">
                                        <p class="ms-2 m-0 money">$100k+ spent </p>
                                    </div>
                                    <div>
                                        <img src="{{ asset('images\icons\job\location.svg') }}" alt="">
                                        <p class="ms-2 m-0">United States </p>
                                    </div>
                                    <div>
                                        <img src="{{ asset('images\icons\job\time.svg') }}" alt="">
                                        <p class="ms-2 m-0"> Yesterday </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                    <section class="lower-text pt-3 mb-3">                        
                        <div class="row justify-content-between">
                            <div class="col-md-3 col-lg-3 col-xl-3 col-xxl-3 col-sm-6 col-6 align-self-center">
                                <div class="flex-text ms-3">
                                    <div class="relative">
                                        <span class="stack-image">
                                            <img class="image-1" src="{{ asset('images\icons\job\temp\one.png') }}" alt="">
                                            <img class="image-2" src="{{ asset('images\icons\job\temp\two.png') }}" alt="">
                                            <img class="image-3" src="{{ asset('images\icons\job\temp\two.png') }}" alt="">
                                        </span>
                                    </div>
                                    <div>
                                        <p class="m-0 bottom-text bizzzy-color">Applied</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6 d-none d-sm-none d-md-block d-lg-block d-xl-block d-xxl-block">
                                <div class="row justify-content-center">
                                    <div class="col-3 text-center">
                                        <p class="m-0 top-text">Budget</p>
                                        <p class="m-0 bottom-text">$100</p>
                                    </div>
                                    <div class="col-1 align-self-center">
                                        <span class="divider"></span>
                                    </div>
                                    <div class="col-3 text-center">
                                        <p class="m-0 top-text">Time</p>
                                        <p class="m-0 bottom-text">6 months +</p>
                                    </div>
                                    <div class="col-1 align-self-center">
                                        <span class="divider"></span>
                                    </div>
                                    <div class="col-3 text-center">
                                        <p class="m-0 top-text">Looking for</p>
                                        <p class="m-0 bottom-text">Freelancer</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 col-lg-3 col-xl-3 col-xxl-3 col-sm-6 col-6 align-self-center text-end">
                                <button class="btn btn-primary bizzzy-background apply-button">Apply to Position</button>
                            </div>
                        </div>
                    </section>
                </div>
                <div class="job-card mb-4">
                    <section class="upper-content pe-0">
                        <div class="row pe-0">
                            <div class="col-1 pb-3 pt-3">
                                <span class="job-avater-span">
                                    <img class="job-avater" src="{{ asset('storage/freelancer/profile_photo/1647342535.png') }}" alt="">
                                    <img class="job-avater-icon" src="{{ asset('images\icons\job\plus.svg') }}" alt="">
                                </span>
                            </div>
                            <div class="col-10 pb-3 pt-3">
                                <p class="m-0" style="font-weight: bold">
                                    Product UI Designer @ Fast-Growing SaaS
                                    <span class="badge badge-dark"> <img class="featured" src="{{ asset('images\icons\job\featured.svg') }}" alt=""> FEATURED JOB</span>
                                    <span class="badge badge-danger">URGENT</span>
                                    <span class="badge badge-success">OPPERTUNITY</span>
                                </p>
                                <p class="m-0">Your Name</p>
                            </div>
                            <div class="col-1 p-0">
                                {{--  <div class="applied text-center">
                                    <img src="{{ asset('images\icons\job\applied.svg') }}" alt="">
                                    Applied
                                </div>                              --}}
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-11">
                                <p class="m-0">Are you tired of working on MVPs and on boring design projects? Are you an experienced designer looking to work on tough design problems and create astonishing designs ? Helpjuice (a fast-growing b2b software) is hiring for a designer. What is Helpjuice? Helpjuice is a SaaS application that empowers thousands of large and small companies (such as...</p>
                                <a class="m-0 more-text" href="">more</a>
                            </div>
                            <div class="col-11 mt-3">
                                <div class="job-tag">
                                    <div>
                                        UI Design
                                    </div>
                                    <div>
                                        Adobe XD
                                    </div>
                                    <div>
                                        Website Design
                                    </div>
                                    <div>
                                        Product Design
                                    </div>
                                </div>
                            </div>
                            <div class="col-11 mt-3">
                                <div class="flex-text">
                                    <div>
                                        <img src="{{ asset('images\icons\job\verified-payment.svg') }}" alt="">
                                        <p class="ms-2 m-0 bizzzy-color">Payment verified</p>
                                    </div>
                                    <div>
                                        <img src="{{ asset('images\icons\job\full-star.svg') }}" alt="">
                                        <img src="{{ asset('images\icons\job\full-star.svg') }}" alt="">
                                        <img src="{{ asset('images\icons\job\full-star.svg') }}" alt="">
                                        <img src="{{ asset('images\icons\job\full-star.svg') }}" alt="">
                                        <img src="{{ asset('images\icons\job\full-star.svg') }}" alt="">
                                        <p class="ms-2 m-0 money">$100k+ spent </p>
                                    </div>
                                    <div>
                                        <img src="{{ asset('images\icons\job\location.svg') }}" alt="">
                                        <p class="ms-2 m-0">United States </p>
                                    </div>
                                    <div>
                                        <img src="{{ asset('images\icons\job\time.svg') }}" alt="">
                                        <p class="ms-2 m-0"> Yesterday </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                    <section class="lower-text pt-3">                        
                        <div class="row justify-content-between">
                            <div class="col-3 align-self-center">
                                <div class="flex-text ms-3">
                                    <div class="relative">
                                        <span class="stack-image">
                                            <img class="image-1" src="{{ asset('images\icons\job\temp\one.png') }}" alt="">
                                            <img class="image-2" src="{{ asset('images\icons\job\temp\two.png') }}" alt="">
                                            <img class="image-3" src="{{ asset('images\icons\job\temp\two.png') }}" alt="">
                                        </span>
                                    </div>
                                    <div>
                                        <p class="m-0 bottom-text bizzzy-color">Applied</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="row justify-content-center">
                                    <div class="col-3 text-center">
                                        <p class="m-0 top-text">Budget</p>
                                        <p class="m-0 bottom-text">$100</p>
                                    </div>
                                    <div class="col-1 align-self-center">
                                        <span class="divider"></span>
                                    </div>
                                    <div class="col-3 text-center">
                                        <p class="m-0 top-text">Time</p>
                                        <p class="m-0 bottom-text">6 months +</p>
                                    </div>
                                    <div class="col-1 align-self-center">
                                        <span class="divider"></span>
                                    </div>
                                    <div class="col-3 text-center">
                                        <p class="m-0 top-text">Looking for</p>
                                        <p class="m-0 bottom-text">Freelancer</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-3 align-self-center text-end">
                                <button class="btn btn-primary bizzzy-background apply-button">Apply to Position</button>
                            </div>
                        </div>
                    </section>
                </div>
                <div class="job-card mb-4">
                    <section class="upper-content applied-div pe-0">
                        <div class="row pe-0">
                            <div class="col-1 pb-3 pt-3">
                                <span class="job-avater-span">
                                    <img class="job-avater" src="{{ asset('storage/freelancer/profile_photo/1647342535.png') }}" alt="">
                                    <img class="job-avater-icon" src="{{ asset('images\icons\job\plus.svg') }}" alt="">
                                </span>
                            </div>
                            <div class="col-10 pb-3 pt-3">
                                <p class="m-0" style="font-weight: bold">
                                    Product UI Designer @ Fast-Growing SaaS
                                    <span class="badge badge-dark"> <img class="featured" src="{{ asset('images\icons\job\featured.svg') }}" alt=""> FEATURED JOB</span>
                                    <span class="badge badge-danger">URGENT</span>
                                    <span class="badge badge-success">OPPERTUNITY</span>
                                </p>
                                <p class="m-0">Your Name</p>
                            </div>
                            <div class="col-1 p-0">
                                <div class="applied text-center">
                                    <img src="{{ asset('images\icons\job\applied.svg') }}" alt="">
                                    Applied
                                </div>                            
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-11">
                                <p class="m-0">Are you tired of working on MVPs and on boring design projects? Are you an experienced designer looking to work on tough design problems and create astonishing designs ? Helpjuice (a fast-growing b2b software) is hiring for a designer. What is Helpjuice? Helpjuice is a SaaS application that empowers thousands of large and small companies (such as...</p>
                                <a class="m-0 more-text" href="">more</a>
                            </div>
                            <div class="col-11 mt-3">
                                <div class="job-tag">
                                    <div>
                                        UI Design
                                    </div>
                                    <div>
                                        Adobe XD
                                    </div>
                                    <div>
                                        Website Design
                                    </div>
                                    <div>
                                        Product Design
                                    </div>
                                </div>
                            </div>
                            <div class="col-11 mt-3">
                                <div class="flex-text">
                                    <div>
                                        <img src="{{ asset('images\icons\job\verified-payment.svg') }}" alt="">
                                        <p class="ms-2 m-0 bizzzy-color">Payment verified</p>
                                    </div>
                                    <div>
                                        <img src="{{ asset('images\icons\job\full-star.svg') }}" alt="">
                                        <img src="{{ asset('images\icons\job\full-star.svg') }}" alt="">
                                        <img src="{{ asset('images\icons\job\full-star.svg') }}" alt="">
                                        <img src="{{ asset('images\icons\job\full-star.svg') }}" alt="">
                                        <img src="{{ asset('images\icons\job\full-star.svg') }}" alt="">
                                        <p class="ms-2 m-0 money">$100k+ spent </p>
                                    </div>
                                    <div>
                                        <img src="{{ asset('images\icons\job\location.svg') }}" alt="">
                                        <p class="ms-2 m-0">United States </p>
                                    </div>
                                    <div>
                                        <img src="{{ asset('images\icons\job\time.svg') }}" alt="">
                                        <p class="ms-2 m-0"> Yesterday </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                    <section class="lower-text pt-3">                        
                        <div class="row justify-content-between">
                            <div class="col-3 align-self-center">
                                <div class="flex-text ms-3">
                                    <div class="relative">
                                        <span class="stack-image">
                                            <img class="image-1" src="{{ asset('images\icons\job\temp\one.png') }}" alt="">
                                            <img class="image-2" src="{{ asset('images\icons\job\temp\two.png') }}" alt="">
                                            <img class="image-3" src="{{ asset('images\icons\job\temp\two.png') }}" alt="">
                                        </span>
                                    </div>
                                    <div>
                                        <p class="m-0 bottom-text bizzzy-color">Applied</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="row justify-content-center">
                                    <div class="col-3 text-center">
                                        <p class="m-0 top-text">Budget</p>
                                        <p class="m-0 bottom-text">$100</p>
                                    </div>
                                    <div class="col-1 align-self-center">
                                        <span class="divider"></span>
                                    </div>
                                    <div class="col-3 text-center">
                                        <p class="m-0 top-text">Time</p>
                                        <p class="m-0 bottom-text">6 months +</p>
                                    </div>
                                    <div class="col-1 align-self-center">
                                        <span class="divider"></span>
                                    </div>
                                    <div class="col-3 text-center">
                                        <p class="m-0 top-text">Looking for</p>
                                        <p class="m-0 bottom-text">Freelancer</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-3 align-self-center text-end">
                                <button class="btn btn-primary bizzzy-background apply-button">Apply to Position</button>
                            </div>
                        </div>
                    </section>
                </div>
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