@extends('layouts.app')
@section('navbar')
    <x-navbar links="true" />
@endsection
@section('content')
<div class="container">
    <x-job-component :applied="false" :job="$job_proposal->job" :idx="0" />
    <div class="card m-2">
        <div class="card-body">
            <div class="row">
                <form action="#" id="hire_freelancer">
                    <div id="job_details_div">
                        <div class="col-12">
                            <h3>Proposed Offer</h3>
                            <div class="row">
                                <div class="col-auto">
                                    <p class="m-0 p-0" style="font-size: 1.2rem"> {{ $job_proposal->user->name }} </p>
                                    <p class="m-0 p-0"> ${{ (int)$job_proposal->price }} </p>
                                    <p class="m-0 p-0"> {{ $job_proposal->description }} </p>
                                </div>
                                <div class="col-auto ms-md-4">
                                    <div class="attachment-grid">
                                        @foreach ($job_proposal->proposal_files as $idx=>$item)
                                            <a href="{{ asset("/storage/$item->file_name") }}">Attachment #{{ $idx+1 }}</a>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                        <input type="hidden" name="freelancer" value="{{ encrypt($job_proposal->user_id) }}">
                        <input type="hidden" name="job_id" value="{{ encrypt($job_proposal->job_id) }}">
                        <input type="hidden" id="payment_type" name="payment_type" value="{{ strtolower($job_proposal->job->price_type) }}">
                        <div class="col-12 mt-3">
                            <hr>
                            <h3>Given Offer</h3>
                            <div id="hourly" class="{{ ($job_proposal->job->price_type == 'Hourly') ? '' : 'd-none' }}">
                                <div class="hourly row">
                                    <b>Hourly</b>
                                    <div class="col-auto">
                                        <label for="hourly_rate">Rate</label>
                                        <input type="text" name="hourly_rate" id="hourly_rate" class="form-control mb-3" value="{{ (int)$job_proposal->job->price }}">
                        
                                        <label for="hour_per_week">Max Hours Per Week</label>
                                        <input type="text" name="hour_per_week" id="hour_per_week" class="form-control" value="{{ (int)$job_proposal->job->hours_per_week }}">
                                        <!-- Default checkbox -->
                                        <div class="form-check mb-3">
                                            <input class="form-check-input" type="checkbox" value="" id="manual_tracking" />
                                            <label class="form-check-label" for="manual_tracking">Manual Tracking</label>
                                        </div>
                                    </div>
                                </div>
                                <button type="button" id="switch_to_fixed" class="btn btn-primary">Switch To Fixed Price</button>
                            </div>
                            <div id="fixed" class="{{ ($job_proposal->job->price_type == 'Hourly') ? 'd-none' : '' }}">
                                <div class="fixed row">
                                    <b>Fixed</b>
                                    <div class="col-auto">
                                        <label for="price">Estimate</label>
                                        <input type="text" name="price" id="price" class="form-control mb-3" value="{{ (int)$job_proposal->job->price }}">
                        
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="deposit_type" id="deposit_type1" value="full" checked/>
                                            <label class="form-check-label" for="deposit_type1"> Deposit Full Amount </label>
                                        </div>
                        
                                        <div class="form-check mb-3">
                                            <input class="form-check-input" type="radio" name="deposit_type" id="deposit_type2" value="less"/>
                                            <label class="form-check-label" for="deposit_type2"> Deposit Less for a single milestone </label>
                                        </div>
                                    </div>
                                    <div class="col-12 d-none" id="addtional_milstone_div">
                                        <div class="row">
                                            <div class="col-4">Name Of Milestone</div>
                                            <div class="col-4">Deposit Amount</div>
                                            <div class="col-4">Due Date (optional)</div>
                                        </div>
                                        <div class="row">
                                            <ol id="ordered">
                                                <li>
                                                    <div class="row">
                                                        <div class="col">
                                                            <input type="text" name="milestone_name[]" id="milestone_name.0" class="form-control mb-3" placeholder="Milestone Name">
                                                            <div class="invalid-response 0_invalid" id="milestone_name.0_invalid"></div>
                                                        </div>
                                                        <div class="col">
                                                            <input type="text" name="deposit_amount[]" id="deposit_amount.0" class="form-control mb-3" placeholder="Desposit Amount">
                                                            <div class="invalid-response" id="deposit_amount.0_invalid"></div>
                                                        </div>
                                                        <div class="col">
                                                            <input type="date" name="due_date[]" id="due_date.0" class="form-control mb-3">
                                                            <div class="invalid-response" id="due_date.0_invalid"></div>
                                                        </div>
                                                    </div>
                                                </li>
                                            </ol>
                                        </div>
                                        <div class="mb-3">
                                            <button type="button" id="additional_milestone" class="btn btn-link"><i class="fas fa-plus"></i> Create Additional Milestones</button>
                                        </div>
                                        <template id="additional_milestone_contente">
                                            <li>
                                                <div class="row">
                                                    <div class="col">
                                                        <input type="text" name="milestone_name[]" id="" class="form-control mb-3" placeholder="Milestone Name">
                                                    </div>
                                                    <div class="col">
                                                        <input type="text" name="deposit_amount[]" id="" class="form-control mb-3" placeholder="Desposit Amount">
                                                    </div>
                                                    <div class="col">
                                                        <input type="date" name="due_date[]" id="" class="form-control mb-3">
                                                    </div>
                                                </div>
                                            </li>
                                        </template>
                                    </div>
                                </div>
                                <button type="button" id="switch_to_hourly" class="btn btn-primary">Switch To Hourly</button>
                            </div>
                            <div class="mt-3">
                                <textarea name="additional_message" id="additional_message" cols="30" rows="3" class="form-control" placeholder="Additional Information"></textarea>
                                <input type="file" name="attachment" id="attachment" class="form-control mt-1">
                            </div>
                        </div>
                        
                        <!-- Default checkbox -->
                        <div class="form-check mt-3">
                            <input class="form-check-input" type="checkbox" value="aggree" id="terms" name="terms"/>
                            <label class="form-check-label" for="terms">I agree to terms and condition</label>
                            <div id="terms_invalid" class="-reponse"></div>
                        </div>
                        <button id="hire_button" class="btn mt-3" disabled>Hire, {{ $job_proposal->user->name }}</button>
                        {{-- <button type="button" id="proceed_to_payment" class="btn mt-3 d-none" disabled>Proceed to payment</button> --}}
                    </div>

                    <div id="payment_div" class="d-none">
                        <div class="row justify-content-center m-0 p-0">
                            <div class="col-12">
                                <h3> Hire {{ $job_proposal->user->name }} </h3>
                                <button id="back_to_offer_button" type="button" class="btn btn-link"><i class="fa-solid fa-arrow-left"></i> Back to Offer Details</button>
                            </div>
                            <div class="col-xl-7 col-xxl-7 col-lg-7 col-md-10 col-sm-12 col-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h4 class="panel-title display-td">Payment Methods</h4>
                                    </div>
                                    <div class="card-body">
                                        @forelse ($stripe_details as $idx=>$item)
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="payment_method" id="payment_method.{{$idx}}"/>
                                                <label class="form-check-label" for="payment_method.{{$idx}}"> <div class="c-flex f-align-center f-gap-1"><img class="credit-card-logo" src="{{ asset("images/billings/".strtolower($item->card_name).".png") }}" alt=""> <span>{{$item->card_name}} ending with {{ $item->last4 }}</span></div> </label>
                                            </div>
                                        @empty
                                            <p>No payment method added!</p>
                                        @endforelse
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-5 col-xxl-5 col-lg-5 col-md-10 col-sm-12 col-12 mt-xl-0 mt-lg-0 mt-xxl-0 mt-md-4 mt-sm-4 mt-4">
                                <div class="card">
                                    <div class="card-body">
                                        <p>Purpose</p>
                                        <hr>
                                        <p style="font-size: 1.234rem">Estimate amount: $<span id="estimate_amount"></span></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <button class="btn btn-primary">Fund and Hire {{ $job_proposal->user->name }} </button>
                    </div>
                </form>
                <template id="additional_milestone_contente">
                    <li>
                        <div class="row">
                            <div class="col">
                                <input type="text" name="milestone_name[]" id="" class="form-control mb-3" placeholder="Milestone Name">
                            </div>
                            <div class="col">
                                <input type="text" name="deposit_amount[]" id="" class="form-control mb-3" placeholder="Desposit Amount">
                            </div>
                            <div class="col">
                                <input type="date" name="due_date[]" id="" class="form-control mb-3">
                            </div>
                        </div>
                    </li>
                </template>
            </div>
        </div>
    </div>
    
</div>
@endsection

@push('script')

<script>
    const hire_form = document.getElementById('hire_freelancer');
    hire_form.addEventListener('submit', (e) => {
        e.preventDefault();
        removeValidation();

        let formData = new FormData(e.target);

        axios
        .post('{{ route('job.proposal.store') }}', formData)
        .then(function (response) {
            location.href = response.data;
        })
        .catch(function (error) {
            if (typeof error.response !== "undefined") {
                //  This is for error from laravel
                console.log(error.response.data);
                showValidation(error.response.data);
            } else {
                // Other JS related error
                console.log(error);
            }
        });
    });


    const terms = document.getElementById('terms');
    // const proceed_to_payment = document.getElementById('proceed_to_payment');
    const hire_button = document.getElementById('hire_button');    
    const job_details_div = document.getElementById('job_details_div');    
    const payment_div = document.getElementById('payment_div');
    const back_to_offer_button = document.getElementById('back_to_offer_button');

    let toggle_payment_div = () => {
        let formData = new FormData(hire_form);
        axios
        .post("{{ route('job.proposal.validate') }}", formData)
        .then(function (response) {            
            let deposit_type = document.querySelector('input[name="deposit_type"]:checked').value;
            if(deposit_type == 'full'){
                document.getElementById('estimate_amount').innerHTML = document.getElementById('price').value;
            }else{
                document.getElementById('estimate_amount').innerHTML = document.getElementById('deposit_amount.0').value;
            }
            job_details_div.classList.toggle('d-none');
            payment_div.classList.toggle('d-none');
        })
        .catch(function (error) {
            if (typeof error.response !== "undefined") {
                //  This is for error from laravel
                console.log(error.response.data);
                showValidation(error.response.data);
            } else {
                // Other JS related error
                console.log(error);
            }
        });
    }
    
    // proceed_to_payment.addEventListener('click', toggle_payment_div);
    back_to_offer_button.addEventListener('click', toggle_payment_div);

    terms.addEventListener('click', () => {
        // proceed_to_payment.disabled = !terms.checked;
        // proceed_to_payment.classList.toggle('btn-primary', terms.checked);
        hire_button.disabled = !terms.checked;
        hire_button.classList.toggle('btn-primary', terms.checked);
    })

    const deposit_full = document.querySelector("#deposit_type1");
    const deposit_less = document.querySelector("#deposit_type2");
    const addtional_milstone = document.querySelector("#addtional_milstone_div");

    deposit_full.addEventListener('click', () => {
        addtional_milstone.classList.add('d-none');
    })

    deposit_less.addEventListener('click', () => {
        addtional_milstone.classList.remove('d-none');
    })

    const additonal = document.getElementById('additional_milestone');
    additonal.addEventListener('click', () => {
        var ol = document.getElementById('ordered');

        // select the list items
        var lists = ol.getElementsByTagName('li');
        
        var template = document.querySelector('#additional_milestone_contente');

        var clone = template.content.cloneNode(true);
        let inputs = clone.querySelectorAll('input');
        inputs[0].setAttribute('id', `milestone_name.${lists.length}`);
        inputs[1].setAttribute('id', `deposit_amount.${lists.length}`);
        inputs[2].setAttribute('id', `due_date.${lists.length}`);

        ol.appendChild(clone);
    });

    let hourly = document.getElementById('switch_to_hourly');
    let fixed = document.getElementById('switch_to_fixed');

    let hourly_div = document.getElementById('hourly');
    let fixed_div = document.getElementById('fixed');

    hourly.addEventListener('click', () => {
        // hire_button.classList.remove('d-none');
        // proceed_to_payment.classList.add('d-none');
        fixed_div.classList.toggle('d-none');
        hourly_div.classList.toggle('d-none');
        document.getElementById('payment_type').value = 'hourly';
    })

    fixed.addEventListener('click', () => {
        // hire_button.classList.add('d-none');
        // proceed_to_payment.classList.remove('d-none');
        fixed_div.classList.toggle('d-none');
        hourly_div.classList.toggle('d-none');
        document.getElementById('payment_type').value = 'fixed';
    })
</script>
    
@endpush