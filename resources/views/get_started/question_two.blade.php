@extends('layouts.app')

@section('navbar')
<x-navbar links="false"/>
@endsection

@section('content')
<section class="vh-100" style="background-color: #FFFFFF;">
    <div class="container py-3">
        <!-- Navbar -->
        <nav class="navbar navbar-expand-lg navbar-light bg-light h-100">
            <!-- Container wrapper -->
            <div class="container-fluid">
                <!-- Toggle button -->
                <button class="navbar-toggler" type="button" data-mdb-toggle="collapse" data-mdb-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fas fa-bars"></i>
                </button>

                <!-- Collapsible wrapper -->
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Navbar brand -->
                    <a class="navbar-brand mt-2 mt-lg-0" href="#">
                        <p style="text-align: center;font-size: 24px;color: #0086FF; font-style: italic;line-height: 32px">
                            Bizzzy</p>
                    </a>
                    <!-- Left links -->
                    <!-- <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link" href="#">Dashboard</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Team</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Projects</a>
                        </li>
                    </ul> -->
                    <!-- Left links -->
                </div>
                <!-- Collapsible wrapper -->

                <!-- Right elements -->
                <div class="d-flex align-items-center">
                    <!-- Icon -->
                    <!-- <a class="text-reset me-3" href="#">
                        <i class="fas fa-shopping-cart"></i>
                    </a> -->

                    <!-- Notifications -->
                    <!-- <div class="dropdown">
                        <a class="text-reset me-3 dropdown-toggle hidden-arrow" href="#" id="navbarDropdownMenuLink" role="button" data-mdb-toggle="dropdown" aria-expanded="false">
                            <i class="fas fa-bell"></i>
                            <span class="badge rounded-pill badge-notification bg-danger">1</span>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdownMenuLink">
                            <li>
                                <a class="dropdown-item" href="#">Some news</a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="#">Another news</a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="#">Something else here</a>
                            </li>
                        </ul>
                    </div> -->
                    <!-- Avatar -->
                    <div class="dropdown">
                        <a class="dropdown-toggle d-flex align-items-center hidden-arrow" href="#" id="navbarDropdownMenuAvatar" role="button" data-mdb-toggle="dropdown" aria-expanded="false">
                            <img src="/images/general/avatar.png" class="rounded-circle" height="25" alt="Black and White Portrait of a Man" loading="lazy" />
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdownMenuAvatar">
                            <li>
                                <a class="dropdown-item" href="#">My profile</a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="#">Settings</a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="#">Logout</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <!-- Right elements -->
            </div>
            <!-- Container wrapper -->
        </nav>
        <!-- Navbar -->
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class=" col-md-12 col-lg-12 col-xl-12 col-sm-3">
                <div class="" style=" margin-top: 130px">
                    <div class="row">
                        <div class=" col-md-1 col-lg-1 col-xl-1 col-sm-3">
                            <a>Prev</a>
                        </div>
                        <div class=" col-md-4 col-lg-4 col-xl-4 col-sm-3">
                            <p style="font-style: normal;
                            font-weight: bold;
                            font-size: 28px;
                            line-height: 28px;
                            color: #1C1C1C;">Got it: so what’s your biggest goal for freelancing?</p>
                            <p style="font-family: Nunito Sans;
                            font-style: normal;
                            font-weight: normal;
                            font-size: 14px;
                            line-height: 20px;
                            color: #006644;">Different people come to Bizzzy for different reasons. We want to highlight the opportunities that fit your goals best – while still showing you all the possibilities. Which of these feels most right for you?</p>
                            <p style="margin-top:20px">
                                <a style="font-family: Nunito Sans;
                                font-style: normal; margin-top: 20px;
                                font-weight: normal;
                                font-size: 14px;
                                line-height: 20px;
                                color: #006644;">To earn my main income</a>
                            </p>
                            <p style="margin-top:20px">
                                <a style="font-family: Nunito Sans;
                                font-style: normal;
                                font-weight: normal;
                                font-size: 14px;
                                line-height: 20px;
                                color: #006644;">To make money on the side</a>
                            </p>
                            <p style="margin-top:20px">
                                <a style="font-family: Nunito Sans;
                                font-style: normal;
                                font-weight: normal;
                                font-size: 14px;
                                line-height: 20px;
                                color: #006644;">To get experience so I can find a full-time job</a>
                            </p>
                            <p style="margin-top:20px">
                                <a style="font-family: Nunito Sans;
                                font-style: normal;
                                font-weight: normal;
                                font-size: 14px;
                                line-height: 20px;
                                color: #006644;">I don't have a goal yet: I'm exploring</a>
                            </p>

                            <p style="margin-top: 30px;"><a style="font-family: Nunito Sans;
                                font-style: normal;
                                font-weight: 600;
                                font-size: 14px;
                                line-height: 20px;
                                color: #14A800;">Skip for now ></a></p>

                        </div>
                        <div class=" col-md-7 col-lg-7 col-xl-7 col-sm-3">
                            <img style="float: right; margin-top: 400px;" src="/images/icons/qus.png" alt="">
                        </div>

                    </div>


                </div>
            </div>


        </div>

    </div>
</section>
@endsection