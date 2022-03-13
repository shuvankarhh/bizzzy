@extends('layouts.app')

@section('navbar')
<x-navbar links="false"/>
@endsection

@section('content')
<section class="question">
    <div class="container mt-5 py-3 h-100">
        <div class="row">
            <div class="col-md-1 col-lg-1 col-xl-1 col-sm-3 d-none d-sm-none d-md-block">
                <a>Prev</a>
            </div>
            <div class=" col-md-6 col-lg-6 col-xl-6 col-sm-12 col-xs-12">   
                <p class="main-question" >Now, let’s set your hourly rate.</p>
                <p class="main-question-desc" >Clients will see this rate on your profile and in search results once you publish your profile. You can adjust your rate every time you submit a proposal.</p>
                                        
                <div class="row">
                    <div class="col-7">
                        <p class="rate-text mb-0">Hourly Rate</p>
                        <p class="rate-desc">Total amount the client will see</p>
                    </div>
                    <div class="col-5 align-self-center">
                        <div class="input-group mb-3">
                            <span class="input-group-text rate-input-group"> <span class="font-weight-bold">$</span>/hr</span>
                            <input
                              type="text"
                              class="form-control"
                              aria-label="Amount (to the nearest dollar)"
                            />
                        </div>
                    </div>                    
                    <div class="col-12">
                        <hr class="mt-0">
                    </div>
                </div>

                <div class="row">
                    <div class="col-7">
                        <p class="rate-text mb-0">Bizzzy Service Fee <span role="button"><i class="ms-1 fas fa-question-circle bizzzy-color"></i></span></p>
                        <p class="rate-desc">The Bizzzy Service Fee is 20% </p>
                    </div>
                    <div class="col-5 align-self-center">
                        <div class="input-group mb-3">
                            <span class="input-group-text rate-input-group"> <span class="font-weight-bold">$</span>/hr</span>
                            <input
                              type="text"
                              class="form-control"
                              aria-label="Amount (to the nearest dollar)"
                            />
                        </div>
                    </div>                    
                    <div class="col-12">
                        <hr class="mt-0">
                    </div>
                </div>

                <div class="row">
                    <div class="col-7">
                        <p class="rate-text mb-0">You'll receive</p>
                        <p class="rate-desc">The estimated amount you'll receive after service fees</p>
                    </div>
                    <div class="col-5 align-self-center">
                        <div class="input-group mb-3">
                            <span class="input-group-text rate-input-group"> <span class="font-weight-bold">$</span>/hr</span>
                            <input
                              type="text"
                              class="form-control"
                              aria-label="Amount (to the nearest dollar)"
                            />
                        </div>
                    </div>                    
                    <div class="col-12">
                        <hr class="mt-0">
                    </div>
                </div>

                {{-- <a class="skip" href="#">Skip for now ></a> --}}

            </div>
        </div>

    </div>
    <div class="question-footer">
        <x-question-footer percentage=25/>
        <div class="row justify-content-end">
            <div class="col-md-3 text-end">
                <button onclick="first_working_experience('{{ route('work.experience.index') }}')" class="btn btn-bizzzy-success text-nowrap me-3">Next, set your rate </button>
            </div>
        </div>
    </div>
</section>
@endsection