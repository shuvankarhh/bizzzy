@extends('layouts.app')

@section('navbar')
<x-navbar links="false"/>
@endsection

@section('content')
<section class="question">
    <div class="container py-3">
        <div class="row d-flex justify-content-center mt-3 align-items-center">
            <div class="col-md-1 align-self-start">
                <a>Prev</a>
            </div>
            <div class="col-md-11">
                <div class="row">
                    <div class="col-md-6">
                        <p class="main-question">Got it: so what’s your biggest goal for freelancing?</p>
                        <p class="main-question-desc" >Different people come to Bizzzy for different reasons. We want to highlight the opportunities that fit your goals best – while still showing you all the possibilities. Which of these feels most right for you?</p>
                    </div>
                    <div class="col-md-12">
                        <div class="row battery-question justify-content-md-center justify-content-sm-center justify-content-xs-center justify-content-lg-left justify-content-xl-left">
                            <div class="col-md-3 col-lg-3 col-xl-3 col-sm-12">
                                <div class="card">
                                    <img src="{{asset('/images/card/card1.png')}}" class="card-img-top" alt="..." style="background-image: linear-gradient(0deg, #FFAB00 0%, #FF991F 99.49%);">
                                    <img class="battery" src="{{asset('/images/card/batteries.svg')}}" alt="">
                                    <div class="checkbox">
                                        <input type="checkbox" id="checkbox1" name="checkbox1" style="background-image: url('/images/card/plus.png');" />
                                        <label class="checkmark" for="checkbox1"></label>
                                    </div>        
                                    <div class="card-body" style="">
                                        <p class="card-text" style="">I’d like to find opportunities myself</p>
                                        <p class="card-text sm" style="">Clients post jobs on our Talent Marketplace™: you can browse and bid for them, or get invited by a client.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 col-lg-3 col-xl-3 col-sm-12">
                                <div class="card">
                                    <img src="/images/card/card2.svg" class="card-img-top" alt="..." style="background-image: linear-gradient(0deg, #FFAB00 0%, #FF991F 99.49%);">
                                    <img class="battery" src="{{asset('/images/card/batteries.svg')}}" alt="">
                                    <div class="checkbox">
                                        <input type="checkbox" id="checkbox2" name="checkbox2" style="background-image: url('/images/card/plus.png');" />
                                        <label class="checkmark" for="checkbox2"></label>
                                    </div>        
                                    <div class="card-body" style="">
                                        <p class="card-text" style="">I’d like to package up my work for clients to buy</p>
                                        <p class="card-text sm" style="">Define your service with prices and timelines: we’ll list it in our Project Catalog™ for clients to buy right away.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 col-lg-3 col-xl-3 col-sm-12">
                                <div class="card">
                                    <img src="{{asset('/images/card/card1.png')}}" class="card-img-top" alt="..." style="background-image: linear-gradient(0deg, #FFAB00 0%, #FF991F 99.49%);">
                                    <img class="battery" src="{{asset('/images/card/batteries.svg')}}" alt="">
                                    <div class="checkbox">
                                        <input type="checkbox" id="checkbox3" name="checkbox3" style="background-image: url('/images/card/plus.png');" />
                                        <label class="checkmark" for="checkbox3"></label>
                                    </div>        
                                    <div class="card-body" style="">
                                        <p class="card-text" style="">I’d like Upwork to act as a recruiter</p>
                                        <p class="card-text sm" style="">Once you’ve been here for a while, our Talent Scout™ service might recruit you directly for a client.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 col-lg-3 col-xl-3 col-sm-12"></div>
                            {{-- <div class="col-md-2 col-lg-2 col-xl-2 col-sm-3"></div> --}}
                        </div>
                    </div>
                    <div class="col-md-12 align-self-center mt-3">
                        <div class="row justify-content-end text-lg-end text-xl-end text-md-end text-sm-start text-xs-start">
                            <div class="col-md-3 col-lg-3 col-xl-3 col-sm-12 col-xs-12 ">
                                <a class="skip" href="#">Skip for now ></a>
                            </div>
                            <div class="col-md-3 col-lg-3 col-xl-3 col-sm-12 col-xs-12">
                                {{--  <button onclick="first_working_experience('{{ route('question.five') }}')" class="btn btn-primary btn-ls text-nowrap " style="background-color: #14A800;" type="submit">Next, Create a Profile ></button>  --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="question-footer-height"></div>
    <div class="question-footer">
        <x-question-footer percentage=65/>
        <div class="row justify-content-end">
            <div class="col-md-3 text-end">
                <button onclick="first_working_experience('{{ route('question.five') }}')" class="btn btn-bizzzy-success text-nowrap me-3">Next, Create a Profile </button>
            </div>
        </div>
    </div>
</section>
@endsection