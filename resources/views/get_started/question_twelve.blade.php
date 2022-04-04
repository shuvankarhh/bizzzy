@extends('layouts.app')

@section('navbar')
<x-navbar links="false"/>
@endsection

@section('content')
<section class="question">
    <div class="container mt-5 py-3 h-100">
        <div class="row">
            <div class="col-1 d-none d-sm-none d-md-block d-lg-block d-xl-block d-xxl-block">
                <a class="btn prev-button" href="{{ route('user.category.create') }}">Prev</a>
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
                        <form action="#" id="hourly_rate_form">
                            <div class="input-group form-outline">
                                <span class="input-group-text rate-input-group" id="inputGroupPrepend"> <span class="font-weight-bold">$</span>/hr</span>
                                <input value="{{ ($hourly_rate) ? $hourly_rate : '' }}" id="hourly_rate" name="hourly_rate" type="number" class="form-control" id="validationCustomUsername" aria-describedby="inputGroupPrepend" required />
                                <div id="hourly_rate_invalid" class="invalid-feedback"></div>
                            </div>
                        </form>
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
                        <div class="input-group form-outline">
                            <span class="input-group-text rate-input-group" id="inputGroupPrepend"> <span class="font-weight-bold">$</span>/hr</span>
                            <input  value="-20" type="text" class="form-control" aria-describedby="inputGroupPrepend"/>
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
                        <div class="input-group form-outline">
                            <span class="input-group-text rate-input-group" id="inputGroupPrepend"> <span class="font-weight-bold">$</span>/hr</span>
                            <input id="will_get" type="text" class="form-control" aria-describedby="inputGroupPrepend"/>
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
    <div class="question-footer-height"></div>
    <div class="question-footer">
        <x-question-footer percentage=25/>
        <x-question-footer-content href="{{ route('user.category.create') }}" on-click="add_hourly_rate()" button-text="Lastly: Photo and Locations" />
    </div>
</section>
@endsection

@push('script')
<script>
    const hourly_rate_input = document.getElementById('hourly_rate');

    hourly_rate_input.addEventListener('keyup', () => {
        const will_get = document.getElementById('will_get');
        will_get.value = hourly_rate_input.value - 20;
    });

    window.onload = function() {
        const will_get = document.getElementById('will_get');
        will_get.value = hourly_rate_input.value - 20;
    };
</script>
@endpush