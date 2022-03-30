@extends('layouts.app')

@section('navbar')
<x-navbar links="false"/>
@endsection

@section('content')
<section class="question">
    <div class="container py-3 mt-5">
        <div class="row">
            <div class="col-1 d-none d-sm-none d-md-block d-lg-block d-xl-block d-xxl-block">
                <a class="btn prev-button" href="{{ route('question.two') }}">Prev</a>
            </div>
            <div class="col-md-11">
                <div class="row">
                    <div class="col-md-6">
                        <p class="main-question">Got it: so what’s your biggest goal for freelancing?</p>
                        <p class="main-question-desc" >Different people come to Bizzzy for different reasons. We want to highlight the opportunities that fit your goals best – while still showing you all the possibilities. Which of these feels most right for you?</p>
                    </div>
                    <div class="col-md-12">
                        <div class=" battery-question grid">
                            <div class="card">
                                <img src="{{asset('/images/card/battery-yellow.svg')}}" class="card-img-top" alt="...">
                                <div class="checkbox">
                                    <input type="checkbox" id="checkbox1" name="checkbox1" style="background-image: url('/images/card/plus.png');" />
                                    <label class="checkmark" for="checkbox1"></label>
                                </div>        
                                <div class="card-body">
                                    <p class="card-text">I’d like to find opportunities myself</p>
                                    <p class="card-text sm">Clients post jobs on our Talent Marketplace™: you can browse and bid for them, or get invited by a client.</p>
                                </div>
                            </div>
                            <div class="card">
                                <img src="{{asset('/images/card/battery-blue.svg')}}" class="card-img-top" alt="...">
                                <div class="checkbox">
                                    <input type="checkbox" id="checkbox2" name="checkbox2" style="background-image: url('/images/card/plus.png');" />
                                    <label class="checkmark" for="checkbox2"></label>
                                </div>        
                                <div class="card-body">
                                    <p class="card-text">I’d like to package up my work for clients to buy</p>
                                    <p class="card-text sm">Define your service with prices and timelines: we’ll list it in our Project Catalog™ for clients to buy right away.</p>
                                </div>
                            </div>
                            <div class="card">
                                <img src="{{asset('/images/card/battery-yellow.svg')}}" class="card-img-top" alt="...">
                                <div class="checkbox">
                                    <input type="checkbox" id="checkbox3" name="checkbox3" style="background-image: url('/images/card/plus.png');" />
                                    <label class="checkmark" for="checkbox3"></label>
                                </div>        
                                <div class="card-body">
                                    <p class="card-text">I’d like Upwork to act as a recruiter</p>
                                    <p class="card-text sm">Once you’ve been here for a while, our Talent Scout™ service might recruit you directly for a client.</p>
                                </div>
                            </div>
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
        <x-question-footer-content href="{{ route('question.two') }}" on-click="first_working_experience('{{ route('question.five') }}')" button-text="Next, Create a Profile" />
    </div>
</section>
@endsection