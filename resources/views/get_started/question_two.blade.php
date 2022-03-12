@extends('layouts.app')

@section('navbar')
<x-navbar links="false"/>
@endsection

@section('content')
<section class="vh-100 question">
    <div class="container py-3 h-100">
        <div class="row d-flex justify-content-center mt-5 h-100">
            <div class="col-md-12 col-lg-12 col-xl-12 col-sm-3">
                <div class="row justify-content-center">
                    <div class=" col-md-1 col-lg-1 col-xl-1 col-sm-3">
                        <a>Prev</a>
                    </div>
                    <div class=" col-md-6 col-lg-6 col-xl-6 col-sm-3">   
                        <p class="main-question" >Got it: so what’s your biggest goal for freelancing?</p>
                        <p class="main-question-desc" >Different people come to Bizzzy for different reasons. We want to highlight the opportunities that fit your goals best – while still showing you all the possibilities. Which of these feels most right for you?</p>
                                             
                        <div class="form-check mb-3">
                            <input onclick="questionSelect(this.value, '{{ route('question.three') }}')" class="question-radio" type="radio" id="main" name="goal" value="main"/>
                            <label for="main">To earn my main income</label>
                        </div>
                        <div class="form-check mb-3">
                            <input onclick="questionSelect(this.value, '{{ route('question.three') }}')" class="question-radio" type="radio" id="side" name="goal" value="side"/>
                            <label for="side">To make money on the side</label>
                        </div>
                        <div class="form-check mb-3">
                            <input onclick="questionSelect(this.value, '{{ route('question.three') }}')" class="question-radio" type="radio" id="experience" name="goal" value="experience"/>
                            <label for="experience">To get experience so I can find a full-time job</label>
                        </div>
                        <div class="form-check mb-3">
                            <input onclick="questionSelect(this.value, '{{ route('question.three') }}')" class="question-radio" type="radio" id="explore" name="goal" value="explore"/>
                            <label for="explore">I don't have a goal yet: I'm exploring</label>
                        </div>

                        <a class="skip" href="#">Skip for now ></a>

                    </div>
                    <div class=" col-md-5 col-lg-5 col-xl-5 col-sm-3">
                        <img style="float: right; margin-top: 400px;" src="/images/icons/qus.png" alt="">
                    </div>
                </div>
            </div>
        </div>

    </div>
</section>
@endsection