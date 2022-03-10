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

                        </div>
                    </div>
                </div>
            </div>
            <div class=" col-md-12 col-lg-12 col-xl-12 col-sm-3" style="margin-top: 20px;">
                <div class="row">
                    <div class="col-md-1 col-lg-1 col-xl-1 col-sm-3">

                    </div>
                    <div class="col-md-3 col-lg-3 col-xl-3 col-sm-3">
                        <div class="card" style="width: 18rem; ">
                            <div style="position: relative;">
                                <img src="/images/card/card1.png" class="card-img-top" alt="..." style="background-image: linear-gradient(0deg, #FFAB00 0%, #FF991F 99.49%);">
                                <img style="position: absolute;left: 90px;
                                top: 35px;" src="/images/card/batteries.svg" alt="">
                                <div class="container">
                                    <div class="round">
                                        <input type="checkbox" id="checkbox" name="checkbox" style="background-image: url('/images/card/plus.png');" />
                                        <label for="checkbox"></label>
                                    </div>
                                </div>
                            </div>

                            <div class="card-body" style="margin-top: 50px;">
                                <p class="card-text" style="font-style: normal;
                                font-weight: 500;
                                font-size: 20px;
                                line-height: 24px; text-align: center;">I’d like to find opportunities myself</p>
                                <p class="card-text" style="font-family: Nunito Sans;
                                font-style: normal;
                                font-weight: normal;
                                font-size: 14px;
                                line-height: 20px;
                                /* or 143% */
                                
                                text-align: center;
                                
                                color: #1C1C1C;">Clients post jobs on our Talent Marketplace™: you can browse and bid for them, or get invited by a client.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-lg-3 col-xl-3 col-sm-3">
                        <div class="card" style="width: 18rem; ">
                            <div style="position: relative;">
                                <img src="/images/card/card2.svg" class="card-img-top" alt="..." style="background-image: linear-gradient(0deg, #FFAB00 0%, #FF991F 99.49%);">
                                <img style="position: absolute;left: 90px;
                                top: 35px;" src="/images/card/batteries.svg" alt="">
                                <div class="container">
                                    <div class="round">
                                        <input type="checkbox" id="checkbox1" name="checkbox1" style="background-image: url('/images/card/plus.png');" />
                                        <label for="checkbox"></label>
                                    </div>
                                </div>
                            </div>

                            <div class="card-body" style="margin-top: 50px;">
                                <p class="card-text" style="font-style: normal;
                                font-weight: 500;
                                font-size: 20px;
                                line-height: 24px; text-align: center;">I’d like Upwork to act as a recruiter</p>
                                <p class="card-text" style="font-family: Nunito Sans;
                                font-style: normal;
                                font-weight: normal;
                                font-size: 14px;
                                line-height: 20px;
                                /* or 143% */
                                
                                text-align: center;
                                
                                color: #1C1C1C;">Once you’ve been here for a while, our Talent Scout™ service might recruit you directly for a client.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-lg-3 col-xl-3 col-sm-3">
                        <div class="card" style="width: 18rem; ">
                            <div style="position: relative;">
                                <img src="/images/card/card1.png" class="card-img-top" alt="..." style="background-image: linear-gradient(0deg, #FFAB00 0%, #FF991F 99.49%);">
                                <img style="position: absolute;left: 90px;
                                top: 35px;" src="/images/card/batteries.svg" alt="">
                                <div class="container">
                                    <div class="round">
                                        <input type="checkbox" id="checkbox2" name="checkbox2" style="background-image: url('/images/card/plus.png');" />
                                        <label for="checkbox"></label>
                                    </div>
                                </div>
                            </div>

                            <div class="card-body" style="margin-top: 50px;">
                                <p class="card-text" style="font-style: normal;
                                font-weight: 500;
                                font-size: 20px;
                                line-height: 24px; text-align: center;">I’d like Upwork to act as a recruiter</p>
                                <p class="card-text" style="font-family: Nunito Sans;
                                font-style: normal;
                                font-weight: normal;
                                font-size: 14px;
                                line-height: 20px;
                                /* or 143% */
                                
                                text-align: center;
                                
                                color: #1C1C1C;">Once you’ve been here for a while, our Talent Scout™ service might recruit you directly for a client.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2 col-lg-2 col-xl-2 col-sm-3">

                    </div>

                </div>
            </div>

            <div class=" col-md-12 col-lg-12 col-xl-12 col-sm-3" style="margin-top: 10px;">
                <div class="row">
                    <div class="col-md-1 col-lg-1 col-xl-1 col-sm-3">

                    </div>
                    <div class="col-md-9 col-lg-9 col-xl-9 col-sm-3">
                        <button class="btn btn-primary btn-ls " style="  background-color: #14A800; float: right; margin-top: 20px;" type="submit">Next, Create a Profile ></button>
                        <p style="margin-top: 30px;"><a style="font-family: Nunito Sans;
                            font-style: normal; float: right;
                            font-weight: 600;
                            font-size: 14px;
                            line-height: 20px;margin-right: 10px;
                            color: #14A800;">Skip for now ></a></p>

                    </div>
                    <div class="col-md-2 col-lg-2 col-xl-2 col-sm-3">
                        <img style="float: right; margin-top: 80px;" src="/images/icons/qus.png" alt="">
                    </div>
                </div>

            </div>

        </div>

    </div>
</section>
@endsection