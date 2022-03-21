@extends('layouts.app')

@section('navbar')
    <x-navbar links="false" />
@endsection

@section('content')
    <section class="">
        <div class="container py-3">
            <div class="row" style="background: #EFF3FE;">
                <div class="col-md-12 col-lg-12 col-xl-12 col-sm-12 align-items-right text-center mb-5">
                    <div class="row justify-content-center">
                        <div class="col-md-3 col-lg-3 col-xl-3 col-sm-12">

                        </div>

                        <div class="col-md-12 col-lg-6 col-xl-6 col-sm-12"
                            style="display: flex; justify-content: center; margin-top: 3px;">

                            <img width="25px" height="25px" src="{{ asset('/images/icons/tick-mark.png') }}" alt="">
                            <p style="margin-left:10px;">Make any edits you want, then submit your profile. You can
                                make more
                                changes after it’s live.</p>
                        </div>
                        <div class="col-md-12 col-lg-3 col-xl-3 col-sm-12 col-12"
                            style="display: flex; justify-content: center; align-items: center">
                            <button class="btn submit-profile-btn" type="submit">Submit
                                Profile</button>
                        </div>
                    </div>

                </div>

                <div class="col-md-12 col-lg-12 col-xl-12 col-sm-12 mb-3">
                    <button class="btn edit-profile-btn" type="submit">Edit
                        Profile</button>
                </div>

                <div class="col-md-12 col-lg-12 col-xl-12 col-sm-12">
                    <div class="profile">
                        <div class="profile-info row ">
                            <div class="col-md-4 col-lg-4 col-xl-2 col-sm-6">
                                <img class="profile-photo" src="{{ asset('/images/general/profile.png') }}" alt=""
                                    style="float: left">
                            </div>
                            <div class="col-md-8 col-lg-8 col-xl-8 col-sm-6">
                                <div style="float:left;margin-top: 30px;" class="">
                                    <p class="profile-name">Abdul W.</p>
                                    <div class="profile-location">
                                        <img class="me-2" src="{{ asset('/images/icons/location.svg') }}"
                                            alt="">
                                        <p class="m-0">Lahore, Pakistan</p>
                                    </div>
                                    <div class="profile-details mt-2">
                                        <p>Designed over 1000+ websites || I help startups businesses
                                            in User Experience
                                            ||
                                            Web Design Expert || Front-end Developer & UI Design Expert || Redesign
                                            Expert
                                            || Freelancer</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-12 col-lg-12 col-xl-12 col-sm-12">
                    <div class="profile mt-4">
                        <div class="profile-content">
                            <div style="display: flex;align-items: center;justify-content: space-between;">
                                <p class="content-title">Web Designer, UI, UX, Graphics </p>
                                <p class="rate mb-3">$100/hr</p>
                            </div>

                            <p style="width: 80%">Are you tired of working on MVPs and on boring design projects? Are you an
                                experienced
                                designer looking to work on tough design problems and create astonishing designs ? Helpjuice
                                (a fast-growing b2b software) is hiring for a designer. What is Helpjuice? Helpjuice is a
                                SaaS application that empowers thousands of large and small companies (such as...</p>
                            <a href="" class="more">more</a>

                        </div>
                    </div>
                </div>
                <div class="col-md-12 col-lg-12 col-xl-12 col-sm-12">
                    <div class="profile mt-4">
                        <div class="profile-content">
                            <p class="content-title">Skills</p>
                            <div>
                                <p class="content-subtitle">UX/UI Design</p>
                                <div class="job-tag" style="color: #1A3F61;">
                                    <div>
                                        Website Design
                                    </div>
                                    <div>
                                        DSE Group Big Boss
                                    </div>
                                    <div>
                                        DSE Group Big Boss
                                    </div>
                                    <div>
                                        DSE Group Big Boss
                                    </div>
                                    <div>
                                        DSE Group Big Boss
                                    </div>
                                    <div>
                                        DSE Group Big Boss
                                    </div>
                                    <div>
                                        DSE Group Big Boss
                                    </div>
                                </div>
                            </div>

                            <div class="mt-3">
                                <p class="content-subtitle">Web Development</p>
                                <div class="job-tag" style="color: #1A3F61;">
                                    <div>
                                        Website Design
                                    </div>
                                    <div>
                                        DSE Group Big Boss
                                    </div>
                                    <div>
                                        DSE Group Big Boss
                                    </div>
                                    <div>
                                        DSE Group Big Boss
                                    </div>
                                    <div>
                                        DSE Group Big Boss
                                    </div>
                                    <div>
                                        DSE Group Big Boss
                                    </div>
                                    <div>
                                        DSE Group Big Boss
                                    </div>
                                </div>
                            </div>

                            <div class="mt-5">
                                <a style="display: flex;" class="justify-content-center">
                                    <p class="show-all">Show all Skills</p>
                                    <img src="{{ asset('/images/icons/down.svg') }}" alt=""
                                        style="  margin-bottom: 12px; margin-left: 10px;">
                                </a>
                            </div>
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
                                        <a class="nav-link active" id="current" data-mdb-toggle="tab" href="#current_tab"
                                            role="tab" aria-controls="current" aria-selected="true">
                                            <span class="icon">
                                                <img src="{{ asset('images\icons\job\all.svg') }}" alt="Briefcase">
                                                <span class="text">Current</span>
                                            </span>
                                        </a>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <a class="nav-link" id="past" data-mdb-toggle="tab" href="#past_tab"
                                            role="tab" aria-controls="past" aria-selected="false">
                                            <span class="icon">
                                                <img src="{{ asset('images\icons\briefcase_dollar.svg') }}"
                                                    alt="Briefcase">
                                                <span class="text"> Past </span>
                                            </span>
                                        </a>
                                    </li>
                                </ul>
                                <!-- Tabs content -->
                                <div class="tab-content" id="ex1-content">
                                    <div class="tab-pane fade show active" id="current_tab" role="tabpanel"
                                        aria-labelledby="current_tab">
                                        <div class="tab-border">
                                            <div style="margin: 10px;">
                                                <p class="tab-title">Graphic Designer | V353</p>
                                                <p style="width: 60%">I’m a developer with experience in building websites
                                                    for
                                                    small
                                                    and medium sized businesses. Whether you’re trying to win work, list
                                                    your
                                                    services or even create a whole online store.</p>
                                                <div style="display:flex">
                                                    <p style="margin-right:5px; font-weight: bold;">From : </p>
                                                    <p>Jan 25, 2022 </p>
                                                </div>
                                                <div style="display:flex">
                                                    <p style="margin-right:23px; font-weight: bold;">To : </p>
                                                    <p>Feb 22, 2022 </p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-border">
                                            <div style="margin: 10px;">
                                                <p class="tab-title">Graphic Designer | V353</p>
                                                <p style="width: 60%">I’m a developer with experience in building websites
                                                    for
                                                    small
                                                    and medium sized businesses. Whether you’re trying to win work, list
                                                    your
                                                    services or even create a whole online store.</p>
                                                <div style="display:flex">
                                                    <p style="margin-right:5px; font-weight: bold;">From : </p>
                                                    <p>Jan 25, 2022 </p>
                                                </div>
                                                <div style="display:flex">
                                                    <p style="margin-right:23px; font-weight: bold;">To : </p>
                                                    <p>Feb 22, 2022 </p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-border">
                                            <div style="margin: 10px;">
                                                <p class="tab-title">Graphic Designer | V353</p>
                                                <p style="width: 60%">I’m a developer with experience in building websites
                                                    for
                                                    small
                                                    and medium sized businesses. Whether you’re trying to win work, list
                                                    your
                                                    services or even create a whole online store.</p>
                                                <div style="display:flex">
                                                    <p style="margin-right:5px; font-weight: bold;">From : </p>
                                                    <p>Jan 25, 2022 </p>
                                                </div>
                                                <div style="display:flex">
                                                    <p style="margin-right:23px; font-weight: bold;">To : </p>
                                                    <p>Feb 22, 2022 </p>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="tab-pane fade show " id="past_tab" role="tabpanel"
                                        aria-labelledby="past_tab">
                                        <div class="tab-border">
                                            <div style="margin: 10px;">
                                                <p class="tab-title">Graphic Designer | V353</p>
                                                <p style="width: 60%">I’m a developer with experience in building websites
                                                    for
                                                    small
                                                    and medium sized businesses. Whether you’re trying to win work, list
                                                    your
                                                    services or even create a whole online store.</p>
                                                <div style="display:flex">
                                                    <p style="margin-right:5px; font-weight: bold;">From : </p>
                                                    <p>Jan 25, 2022 </p>
                                                </div>
                                                <div style="display:flex">
                                                    <p style="margin-right:23px; font-weight: bold;">To : </p>
                                                    <p>Feb 22, 2022 </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="mt-5">
                                        <a style="display: flex;" class="justify-content-center">
                                            <p class="show-all">Show all Experiences</p>
                                            <img src="{{ asset('/images/icons/down.svg') }}" alt=""
                                                style="  margin-bottom: 12px; margin-left: 10px;">
                                        </a>
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
                            <div style="display: flex">
                                <p style="margin-right: 10px; font-weight: bold;">English :</p>
                                <p>Conversational</p>
                            </div>

                        </div>
                    </div>
                </div>


            </div>
            <div class="row mt-5 ">

                <div class="text-center col-12 mt-5"><button class="btn"
                        style="background-color: #0086FF;;color: #FFF; " type="submit">Submit
                        Profile</button></div>
            </div>



        </div>
    </section>
@endsection
