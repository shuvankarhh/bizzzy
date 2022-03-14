@extends('layouts.app')

@section('navbar')
<x-navbar links="false"/>
@endsection

@section('content')
<section class=" question">
    <div class="container py-3 mt-5 h-100">
        <div class="row">
            <div class=" col-md-1 col-lg-1 col-xl-1 col-sm-3 d-none d-sm-none d-md-block">
                {{-- <a>Prev</a> --}}
            </div>
            <div class=" col-md-6 col-lg-6 col-xl-6 col-sm-12 col-xs-12">   
                <p class="main-question" >A few quick questions: first, have you freelanced before?</p>
                <p class="main-question-desc" >This lets us know how much help to give you along the way. (We won’t share your answer with anyone else, including potential clients.)</p>
                                        
                <div class="form-check custom mb-3">
                    <input onclick="questionSelect(this.value, '{{ route('question.two') }}')" class="question-radio" type="radio" id="new" name="freelancer_or_recuriter" value="new"/>
                    <label for="new">Nope: it’s new to me</label>
                </div>
                <div class="form-check custom mb-3">
                    <input onclick="questionSelect(this.value, '{{ route('question.two') }}')" class="question-radio" type="radio" id="beginner" name="freelancer_or_recuriter" value="beginner"/>
                    <label for="beginner">I’ve tried it but still might need tips</label>
                </div>
                <div class="form-check custom mb-3">
                    <input onclick="questionSelect(this.value, '{{ route('question.two') }}')" class="question-radio" type="radio" id="experienced" name="freelancer_or_recuriter" value="experienced"/>
                    <label for="experienced">Yep, I’ve freelanced for years</label>
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
        <x-question-footer percentage=10/>
        <div class="row justify-content-end">
            <div class="col-md-3 text-end">
                {{-- <button class="btn btn-bizzzy-success text-nowrap me-3">Next, Languages </button> --}}
            </div>
        </div>
    </div>
</section>
@endsection