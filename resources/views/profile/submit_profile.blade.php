@extends('layouts.app')

@section('navbar')
    <x-navbar links="false" />
@endsection

@section('content')
    <section class="">
        <div class="container py-3">
            <div class="row" style="background: #EFF3FE;">
                <div class="col-md-12 col-lg-12 col-xl-12 col-sm-12 align-items-center text-center mb-5">
                    <div style="display: flex; justify-content: center; ">
                        <img width="25px" height="25px" src="{{ asset('/images/icons/tick-mark.png') }}" alt="">
                        <p style="margin-left:10px; ">Make any edits you want, then submit your profile. You can
                            make more
                            changes after it’s live.</p>

                        <button class="btn btn-primary submit-profile-btn" style=" " type="submit">Submit
                            Profile</button>
                    </div>

                </div>
            </div>
            <div class="row">
                <div class="col-md-7 col-lg-7 col-xl-7 col-sm-3">
                    <div class="profile" style="padding-top: 40px;padding-left: 40px;">
                        <div class="profile-info row ">
                            <div class="col-md-2 col-lg- col-xl-2 col-sm-12 col-xs-12">
                                <img style="height: 100px; width: 100px;" src="{{ asset('/images/general/profile.png') }}"
                                    alt="">
                            </div>
                            <div class="col-md-9 col-lg-9 col-xl-9 col-sm-12 col-xs-12">
                                <div style="position: relative">
                                    <p class="profile-name">Abdul Wahab</p>
                                    <div style="display: flex;">
                                        <img class="me-2" src="{{ asset('/images/icons/location.svg') }}"
                                            alt="">
                                        <p class="profile-location m-0">Lahore, PB</p>
                                    </div>
                                    <p>1:18 am local time</p>
                                    <button class="btn edit-profile-btn" style=" " type="submit"><i
                                            class="fas fa-pen me-2"></i>Edit Profile</button>
                                </div>

                            </div>

                        </div>
                        <div class="row " style="padding-left: 40px;">
                            <div class="col-md-12 col-lg-12 col-xl-12 col-sm-3">
                                <p class="designation">full stack developer <i
                                        class="fas fa-pen edit-icon rounded-circle"></i></p>
                            </div>
                            <div class="col-md-10 col-lg-10 col-xl-10 col-sm-3">
                                <div style="position: relative">
                                    <p>I’m a developer with experience in building websites for small and medium sized
                                        businesses. Whether you’re trying to win work, list your services or even create a
                                        whole
                                        online store – I can help! I’m experienced in HTML and CSS 3, PHP, jQuery, WordpPess
                                        and
                                        SEO I’ll fully project manage your brief from start to finish Regular communication
                                        is
                                        really important to me, so let’s keep in touch!”</p>
                                    <i style="position: absolute; top: 0px;right: -40px;"
                                        class="fas fa-pen edit-icon rounded-circle"></i>
                                </div>

                            </div>
                            <div class="col-md-12 col-lg-12 col-xl-12 col-sm-3">
                                <div style="display: flex;">
                                    <img src="{{ asset('/images/icons/dollar.svg') }}" alt="">
                                    <p class="m-0 rate">100 <i class="fas fa-pen edit-icon rounded-circle"></i></p>
                                </div>
                                <p>Hourly rate</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class=" col-md-1 col-lg-1 col-xl-1 col-sm-3">


                </div>
                <div class=" col-md-2 col-lg-2 col-xl-2 col-sm-3">
                    <div class="profile p-3">
                        <div class="row " style="position: relative">
                            <div class=" col-md-12 col-lg-12 col-xl-12 col-sm-12">
                                <p class="location">Location</p>
                            </div>
                            <div class=" col-md-1 col-lg-1 col-xl-1 col-sm-12">
                                <p class="sub-location">City:</p>
                            </div>
                            <div class=" col-md-10 col-lg-10 col-xl-10 col-sm-12">
                                <p class="sub-location-val ">Lahore</p>
                            </div>
                            <div class=" col-md-2 col-lg-2 col-xl-2 col-sm-12">
                                <p class="sub-location">State:</p>
                            </div>
                            <div class=" col-md-10 col-lg-10 col-xl-10 col-sm-12">
                                <p class="sub-location-val ">Punjab</p>
                            </div>
                            <div class=" col-md-3 col-lg-3 col-xl-3 col-sm-12">
                                <p class="sub-location">Country:</p>
                            </div>
                            <div class=" col-md-9 col-lg-9 col-xl-9 col-sm-12">
                                <p class="sub-location-val ">Pakistan</p>
                            </div>
                            <div style="position: absolute;"><i style="float: right"
                                    class="fas fa-pen edit-icon rounded-circle"></i>
                            </div>
                        </div>
                        <div class="row mt-3 " style="position: relative">
                            <div class=" col-md-12 col-lg-12 col-xl-12 col-sm-12">
                                <p class="location">Languages</p>
                            </div>
                            <div class=" col-md-3 col-lg-3 col-xl-3 col-sm-12">
                                <p class="sub-location">English:</p>
                            </div>
                            <div class=" col-md-9 col-lg-9 col-xl-9 col-sm-12">
                                <p class="sub-location-val ">Conversational</p>
                            </div>
                            <div style="position: absolute;"><i style="float: right"
                                    class="fas fa-pen edit-icon rounded-circle"></i>
                            </div>
                        </div>
                    </div>

                </div>
            </div>


            <div class="row mt-5 ">
                <div class="col-md-7 col-lg-7 col-xl-7 col-sm-3">
                    <div class="profile ">
                        <div class="row"
                            style="padding-top: 10px;padding-left: 30px; border-radius: 3px 0px 0px 3px; margin-left: -3px; border-left: 3px solid #14A800;">
                            <div class="col-md-12 col-lg-12 col-xl-12 col-sm-3">
                                <p class="header">Skills</p>
                            </div>

                        </div>
                        <div class="row" style="padding-top: 10px;padding-left: 40px; ">
                            <div class="col-md-12 col-lg-12 col-xl-12 col-sm-3 mb-5">
                                <div class="consultant_sub_section_content">
                                    <p>Website Design</p>
                                </div>
                                <div class="consultant_sub_section_content">
                                    <p>Web Browser</p>
                                </div>
                                <div class="consultant_sub_section_content">
                                    <p>Usability Testing</p>
                                </div>
                                <div class="consultant_sub_section_content">
                                    <p>ASA Development Contego</p>
                                </div>
                                <div class="consultant_sub_section_content">
                                    <p>SaaS</p>
                                </div>
                                <div class="consultant_sub_section_content">
                                    <p>DSE Group Big Boss</p>

                                </div>

                            </div>

                        </div>

                    </div>
                </div>
            </div>
            <div class="row mt-5 ">
                <div class="col-md-7 col-lg-7 col-xl-7 col-sm-3">
                    <div class="profile ">
                        <div class="row"
                            style="padding-top: 10px;padding-left: 30px; border-radius: 3px 0px 0px 3px; margin-left: -3px; border-left: 3px solid #14A800;">
                            <div class="col-md-12 col-lg-12 col-xl-12 col-sm-3">
                                <p class="header">Work Experience</p>
                            </div>

                        </div>
                        <div class="row" style="padding-top: 10px;padding-left: 40px; ">
                            <div class="col-md-12 col-lg-12 col-xl-12 col-sm-3 mb-5">

                                <div class="row">
                                    <div class="col-md-12 col-lg-12 col-xl-12 col-sm-3">
                                        <div>
                                            <p class="sub-header">Graphic Designer | V353</p>
                                        </div>
                                    </div>
                                    <div class="col-md-12 col-lg-12 col-xl-12 col-sm-3">
                                        <div>
                                            <p class="experience">January 2021 - February 2022</p>
                                        </div>
                                    </div>
                                    <div class="col-md-10 col-lg-10 col-xl-10 col-sm-3">
                                        <div>
                                            <p class="experience-details">I’m a developer with experience in building
                                                websites for small and medium sized businesses. Whether you’re trying to win
                                                work, list your services or even create a whole online store – I can help!
                                                I’m experienced in HTML and CSS 3, PHP, jQuery, WordpPess and SEO I’ll fully
                                                project manage your brief from start to finish Regular communication is
                                                really important to me, so let’s keep in touch!”</p>
                                        </div>
                                    </div>
                                </div>


                            </div>

                        </div>

                    </div>
                </div>
            </div>
            <div class="row mt-5 ">
                <div class="col-md-7 col-lg-7 col-xl-7 col-sm-3">
                    <div class="profile ">
                        <div class="row"
                            style="padding-top: 10px;padding-left: 30px; border-radius: 3px 0px 0px 3px; margin-left: -3px; border-left: 3px solid #14A800;">
                            <div class="col-md-12 col-lg-12 col-xl-12 col-sm-3">
                                <p class="header">Education History</p>
                            </div>

                        </div>
                        <div class="row" style="padding-top: 10px;padding-left: 40px; ">
                            <div class="col-md-12 col-lg-12 col-xl-12 col-sm-3 mb-5">

                                <div class="row">
                                    <div class="col-md-12 col-lg-12 col-xl-12 col-sm-3">
                                        <div>
                                            <p class="sub-header">v353 University</p>
                                        </div>

                                    </div>
                                    <div class="col-md-12 col-lg-12 col-xl-12 col-sm-3">
                                        <div>
                                            <p class="experience" style="font-weight: 600;">Bachelor of Accountancy
                                                (BAcc) of Computer science</p>
                                        </div>
                                        <div>
                                            <p class="experience">2015 - 2019</p>
                                        </div>
                                    </div>
                                    <div class="col-md-10 col-lg-10 col-xl-10 col-sm-3">
                                        <div>
                                            <p class="experience-details">I’m a developer with experience in building
                                                websites for small and medium sized businesses. Whether you’re trying to win
                                                work, list your services or even create a whole online store – I can help!
                                                I’m experienced in HTML and CSS 3, PHP, jQuery, WordpPess and SEO I’ll fully
                                                project manage your brief from start to finish Regular communication is
                                                really important to me, so let’s keep in touch!”</p>
                                        </div>
                                    </div>
                                </div>


                            </div>

                        </div>

                    </div>
                </div>
                <div class="text-center col-7 mt-5"><button class="btn"
                        style="background-color: #14A800;color: #FFF; " type="submit">Submit
                        Profile</button></div>
            </div>



        </div>
    </section>
@endsection
