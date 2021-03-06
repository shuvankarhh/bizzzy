@extends('layouts.app')

@section('navbar')
<x-navbar links="false"/>
@endsection

@section('content')
<section class="question">
    <div class="container pt-3" style="min-height: 75vh">
        <div class="row">
            <div class="col-1 d-none d-sm-none d-md-block d-lg-block d-xl-block d-xxl-block">
                <a class="btn prev-button" href="{{ route('question.one') }}">Prev</a>
            </div>
            <div class=" col-md-6 col-lg-6 col-xl-6 col-sm-12 col-xs-12">   
                <p class="main-question" >Got it: so what’s your biggest goal for freelancing?</p>
                <p class="main-question-desc" >Different people come to Bizzzy for different reasons. We want to highlight the opportunities that fit your goals best – while still showing you all the possibilities. Which of these feels most right for you?</p>
                                        
                <div class="form-check custom mb-3">
                    <input onclick="questionSelect(this.value, '{{ route('question.three') }}')" class="question-radio" type="radio" id="main" name="goal" value="main"/>
                    <label for="main">To earn my main income</label>
                </div>
                <div class="form-check custom mb-3">
                    <input onclick="questionSelect(this.value, '{{ route('question.three') }}')" class="question-radio" type="radio" id="side" name="goal" value="side"/>
                    <label for="side">To make money on the side</label>
                </div>
                <div class="form-check custom mb-3">
                    <input onclick="questionSelect(this.value, '{{ route('question.three') }}')" class="question-radio" type="radio" id="experience" name="goal" value="experience"/>
                    <label for="experience">To get experience so I can find a full-time job</label>
                </div>
                <div class="form-check custom mb-3">
                    <input onclick="questionSelect(this.value, '{{ route('question.three') }}')" class="question-radio" type="radio" id="explore" name="goal" value="explore"/>
                    <label for="explore">I don't have a goal yet: I'm exploring</label>
                </div>

                <a class="skip" href="#">Skip for now ></a>

            </div>
            <div class="col-12 text-end">
                <img src="/images/icons/qus.png" alt="">
            </div>
        </div>

    </div>
    <div class="question-footer-height"></div>
    <div class="question-footer">
        <x-question-footer percentage=25/>
        <x-question-footer-content href="{{ route('question.one') }}" />
    </div>
</section>
@endsection