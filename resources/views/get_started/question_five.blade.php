@extends('layouts.app')

@section('navbar')
<x-navbar links="false"/>
@endsection

@section('content')
<section class="question">
    <div class="container pt-5 pb-3" style="min-height: 75vh">
        <form action="#" id="title_form" onsubmit="add_title()">
            <div class="row">
                <div class=" col-md-1 col-lg-1 col-xl-1 col-sm-3 d-none d-sm-none d-md-block">
                    <a role="button" class="btn prev-button" href="{{ route('question.three') }}">Prev</a>
                </div>
                <div class=" col-md-6 col-lg-6 col-xl-6 col-sm-12 col-xs-12">   
                    <p class="main-question" >Got it. Now, add a title to tell the world what you do.</p>
                    <p class="main-question-desc" >It’s the very first thing clients see, so make it count. Stand out by describing your expertise in your own words.</p>
                                        
                    <div class="form-group">
                        <input value="{{ $title }}" type="text" name="title" id="title" class="form-control" placeholder="Example: Full Stack Developer | Web &  Mobile">
                        <div id="title_invalid" class="invalid-feedback js"></div>
                    </div>

                    {{-- <a class="skip" href="#">Skip for now ></a> --}}

                </div>
            </div>
        </form>
    </div>
    <div class="question-footer-height"></div>
    <div class="question-footer">
        <x-question-footer percentage=65/>
        <x-question-footer-content href="{{ route('question.three') }}" on-click="add_title()" button-text="Next, Add Your Experience" />
    </div>
</section>
@endsection