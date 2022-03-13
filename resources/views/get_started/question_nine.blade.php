@extends('layouts.app') @section('navbar')
<x-navbar links="false" />@endsection @section('content') <section class="question">
    <div class="container py-3 h-100">
        <div class="row d-flex justify-content-center mt-5 h-100">
            <div class="col-md-12 col-lg-12 col-xl-12 col-sm-12">
                <div class="row justify-content-center battery-question">
                    <div class=" col-md-1 col-lg-1 col-xl-1 col-sm-3"><a>Prev</a></div>
                    <div class=" col-md-6 col-lg-6 col-xl-6 col-sm-">
                        <p class="main-question">Nearly there ! What work are you here to do?</p>
                        <p class="main-question-desc">Your skills show clients what you can offer,
                            and help us choose which jobs to recommend to you. Add or remove the ones we’ve suggested,
                            or start typing to pick more. It’s up to you.</p>
                        <p style="font-weight: 500;">Skills</p>
                        <div style="display:inline-flex">
                            <p
                                style="border: 2px solid #14A800; border-radius: 50px; padding: 8px 17px;width: fit-content;">
                                Website Design <i style="color:red" class="fas fa-trash"></i></p>
                            <p
                                style="border: 2px solid #14A800; border-radius: 50px; padding: 8px 17px;width: fit-content; ">
                                Website Design <i style="color:red" class="fas fa-trash"></i></p>

                                <p style="border: 1px solid #626468; border-radius: 50px; margin-top: 10px; margin-left:10px;height: fit-content;"><i class="fas fa-plus"></i></p>
                        </div>
                    </div>
                    <div class="col-md-2 col-lg-3 col-xl-3 col-sm-3 d-none d-sm-none d-md-block"></div>
                    <div class="col-md-3 col-lg-2 col-xl-2 col-sm-3 d-none d-sm-none d-md-block">
                        <div class="card" style="margin-top: 190px"><img src="{{asset('/images/card/card1.png')}}"
                                class="card-img-top" alt="..."
                                style="background-image: linear-gradient(0deg, #FFAB00 0%, #FF991F 99.49%);"><img
                                class="battery" style="left: 45%" src="{{asset('/images/card/single-battary.png')}}"
                                alt="">
                            <div class="card-body" style="margin-top: 0px">
                                <p class="card-text" style="">Bizzzy Tip</p>
                                <p class="card-text sm" style="">“Bizzzy’s algorithm will recommend specific job posts
                                    to you based on your skills. So choose them carefully to get the best match !”</p>
                            </div>
                        </div>
                    </div>
                    <div><button class="btn btn-primary btn-ls "
                            style=" background-color: #14A800;margin-top: 20px; float:right " type="submit">Now Write
                            Your Bio</button><br></div>
                </div>
            </div>
        </div>
    </div>
</section>@endsection
