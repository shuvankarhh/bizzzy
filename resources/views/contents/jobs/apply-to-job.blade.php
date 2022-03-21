@extends('layouts.app')
@section('navbar')
    <x-navbar links="true" />
@endsection
@section('content')
<section class="container body">
    <section class="job-body">
        <div class="space-between">
            <h2 class="mb-4">Submit your proposal</h2>
            <div class="connect-available"> 78 Available Connects </div>
        </div>
        <x-job-component applied="0" connect="2" />
        <div class="job-card mb-4 p-3">
            <h4>Payment Terms</h4>
            <div class="row">
                <div class="col-12 m-0 p-0">
                    <div class="row justify-content-between">
                        <div class="col-md-7 col-lg-7 col-xl-7 col-xxl-7 col-sm-12 col-12">
                            <p class="rate-text mb-0">Proposal amount</p>
                            <p class="rate-desc" >Total amount the client will see on your proposal</p>
                        </div>
                        <div class="col-md-2 col-lg-2 col-xl-2 col-xxl-2 col-sm-12 col-12 align-self-center">
                            <div class="input-group form-outline">
                                <span class="input-group-text rate-input-group" id="inputGroupPrepend"> <span class="font-weight-bold">$</span>/hr</span>
                                <input name="proposed" id="proposed" type="text" class="form-control" aria-describedby="inputGroupPrepend"/>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12"><hr></div>
                <div class="col-12 m-0 p-0">
                    <div class="row justify-content-between">
                        <div class="col-md-7 col-lg-7 col-xl-7 col-xxl-7 col-sm-12 col-12">
                            <p class="rate-text mb-0">Bizzzy Service Fee <span role="button"><i class="ms-1 fas fa-question-circle bizzzy-color"></i></span></p>
                            <p class="rate-desc">The Bizzzy Service Fee is 20% </p>
                        </div>
                        <div class="col-md-2 col-lg-2 col-xl-2 col-xxl-2 col-sm-12 col-12 align-self-center">
                            <div class="input-group form-outline">
                                <span class="input-group-text rate-input-group" id="inputGroupPrepend"> <span class="font-weight-bold">$</span>/hr</span>
                                <input  value="-20" type="text" class="form-control" aria-describedby="inputGroupPrepend"/>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12"><hr></div>
                <div class="col-12 m-0 p-0">
                    <div class="row justify-content-between">
                        <div class="col-md-7 col-lg-7 col-xl-7 col-xxl-7 col-sm-12 col-12">
                            <p class="rate-text mb-0">You'll receive</p>
                            <p class="rate-desc">The estimated amount you'll receive after service fees</p>
                        </div>
                        <div class="col-md-2 col-lg-2 col-xl-2 col-xxl-2 col-sm-12 col-12 align-self-center">
                            <div class="input-group form-outline">
                                <span class="input-group-text rate-input-group" id="inputGroupPrepend"> <span class="font-weight-bold">$</span>/hr</span>
                                <input id="will_get" name="will_get" type="text" class="form-control" aria-describedby="inputGroupPrepend"/>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12"><hr></div>
                <div class="col-md-5 col-lg-5 col-xl-5 col-xxl-5 col-sm-12 col-12 ">
                    <label for="duration" class="custom-label">How long will this project take?  *</label>
                    <select  id="duration" name="duration" autocomplete="off">
                        <option selected value="">Select a duration</option>
                        <option>More than 6 months</option>
                        <option>3 to 6 months</option>
                        <option>1 to 3 months</option>
                        <option>Less than 1 month</option>
                    </select>
                    <div id="duration_invalid" class="invalid-feedback js"></div>
                </div>
            </div>
        </div>
        <div class="job-card mb-4 p-3">
            <h4>Write your proposal</h4>
            <div class="col-12">
                <div class="form-outline">
                    <textarea class="form-control" id="textAreaExample" rows="4"></textarea>
                    <label class="form-label" for="textAreaExample">Describe your offer</label>
                </div>
                <div class="mt-4">
                    <input type="file" class="form-control" id="customFile" />
                    <label class="form-label" for="customFile">Max file size is 10MB</label>
                </div>
                <button class="btn submit-profile-btn mt-3">Submit Proposal</button>
            </div>
        </div>
    </section>
</section>
@endsection

@push('script')
<script>
    new TomSelect("#duration", { create: false });    

    const proposed_input = document.getElementById('proposed');

    proposed_input.addEventListener('keyup', () => {
        const will_get = document.getElementById('will_get');
        will_get.value = proposed_input.value - 20;
    });
</script>
@endpush