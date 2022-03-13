@extends('layouts.app')

@section('navbar')
<x-navbar links="false"/>
@endsection

@section('content')
<section class="question">
    <div class="container py-3 h-100">
        <div class="row">
            <div class=" col-md-1 col-lg-1 col-xl-1 col-sm-3 d-none d-sm-none d-md-block">
                <a>Prev</a>
            </div>
            <div class=" col-md-6 col-lg-6 col-xl-6 col-sm-12 col-xs-12">   
                <p class="main-question" >Got it. Now, add a title to tell the 
                    world what you do.</p>
                <p class="main-question-desc" >It’s the very first thing clients see, so make it count. Stand out by describing your expertise in your own words.</p>
                                        
                <div class="form-group">
                    <input type="text" name="designation" id="designation" class="form-control" placeholder="Example: Full Stack Developer | Web &  Mobile">
                </div>

                {{-- <a class="skip" href="#">Skip for now ></a> --}}

            </div>
        </div>
    </div>
    <div class="question-footer">
        <x-question-footer percentage=65/>
        <div class="row justify-content-end">
            <div class="col-md-3 text-end">
                <button onclick="first_working_experience('{{ route('work.experience.index') }}')" class="btn btn-bizzzy-success text-nowrap me-3">Next, Add your experience</button>
            </div>
        </div>
    </div>
</section>
@endsection