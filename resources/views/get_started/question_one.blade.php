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
                        {{-- <a>Prev</a> --}}
                    </div>
                    <div class=" col-md-6 col-lg-6 col-xl-6 col-sm-3">   
                        <p style="font-style: normal;
                        font-weight: bold;
                        font-size: 28px;
                        line-height: 28px;
                        color: #1C1C1C;">A few quick questions: first, have you freelanced before?</p>
                        <p style="font-family: Nunito Sans;
                        font-style: normal;
                        font-weight: normal;
                        font-size: 14px;
                        line-height: 20px;
                        color: #006644;">This lets us know how much help to give you along the way. (We won’t share your answer with anyone else, including potential clients.)</p>
                                             
                        <div class="form-check mb-3">
                            <input class="question-radio" type="radio" id="new" name="freelancer_or_recuriter" value="freelancer"/>
                            <label for="new">Nope: it’s new to me</label>
                        </div>
                        <div class="form-check mb-3">
                            <input class="question-radio" type="radio" id="beginner" name="freelancer_or_recuriter" value="freelancer"/>
                            <label for="beginner">I’ve tried it but still might need tips</label>
                        </div>
                        <div class="form-check mb-3">
                            <input class="question-radio" type="radio" id="experienced" name="freelancer_or_recuriter" value="freelancer"/>
                            <label for="experienced">Yep, I’ve freelanced for years</label>
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