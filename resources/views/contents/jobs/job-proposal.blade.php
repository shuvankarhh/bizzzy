@extends('layouts.app')
@section('navbar')
    <x-navbar links="true" />
@endsection
@section('content')
<div class="container">
    <x-job-component :applied="false" :job="$job_proposal" :idx="0" />
    <div class="card m-2">
        <div class="card-body">
            <div class="row">
                <div class="col-6">
                    <h3>Proposed Offer</h3>
                    <p class="m-0 p-0"> {{ $job_proposal->proposals[0]->name }} </p>
                    <p class="m-0 p-0"> ${{ (int)$job_proposal->proposals[0]->pivot->price }} </p>
                    <p class="m-0 p-0"> {{ $job_proposal->proposals[0]->pivot->description }} </p>
                </div>
                {{-- <div class="col-6 text-end align-self-center">
                    <a role="button" href="{{ route('job.proposal.show', [encrypt($job_proposal->proposals[0]->pivot->user_id), encrypt($job_proposal->proposals[0]->pivot->job_id)]) }}" class="btn btn-primary">Accept Proposal</a>
                </div> --}}
                <form action="#" id="hire_freelancer">
                    <input type="hidden" name="freelancer" value="{{ encrypt($job_proposal->proposals[0]->pivot->user_id) }}">
                    <input type="hidden" name="job_id" value="{{ encrypt($job_proposal->id) }}">
                    <input type="hidden" id="payment_type" name="payment_type" value="{{ strtolower($job_proposal->price_type) }}">
                    <div class="col-12 mt-3">
                        <hr>
                        <h3>Given Offer</h3>
                        <div id="hourly" class="{{ ($job_proposal->price_type == 'Hourly') ? '' : 'd-none' }}">
                            <div class="hourly row">
                                <b>Hourly</b>
                                <div class="col-auto">
                                    <label for="hourly_rate">Rate</label>
                                    <input type="text" name="hourly_rate" id="hourly_rate" class="form-control mb-3" value="{{ (int)$job_proposal->price }}">
                    
                                    <label for="hour_per_week">Max Hours Per Week</label>
                                    <input type="text" name="hour_per_week" id="hour_per_week" class="form-control" value="{{ (int)$job_proposal->hours_per_week }}">
                                    <!-- Default checkbox -->
                                    <div class="form-check mb-3">
                                        <input class="form-check-input" type="checkbox" value="" id="manual_tracking" />
                                        <label class="form-check-label" for="manual_tracking">Manual Tracking</label>
                                    </div>
                                </div>
                            </div>
                            <button type="button" id="switch_to_fixed" class="btn btn-primary">Switch To Fixed Price</button>
                        </div>
                        <div id="fixed" class="{{ ($job_proposal->price_type == 'Hourly') ? 'd-none' : '' }}">
                            <div class="fixed row">
                                <b>Fixed</b>
                                <div class="col-auto">
                                    <label for="price">Estimate</label>
                                    <input type="text" name="price" id="price" class="form-control mb-3" value="{{ (int)$job_proposal->price }}">
                    
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
                        <!-- Default checkbox -->
                        <div class="form-check mt-3">
                            <input class="form-check-input" type="checkbox" value="aggree" id="terms" name="terms"/>
                            <label class="form-check-label" for="terms">I agree to terms and condition</label>
                            <div id="terms_invalid" class="-reponse"></div>
                        </div>
                        <button id="hire_button" class="btn mt-3" disabled>Hire, {{ $job_proposal->proposals[0]->name }}</button>
                    </div>
                </form>
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
            console.log(response);
            // e.reset();
            // tags_select.clear();
            // categories_select.clear();
            // languages_select.clear();
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
    const hire_button = document.getElementById('hire_button');    

    terms.addEventListener('click', () => {
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
        fixed_div.classList.toggle('d-none');
        hourly_div.classList.toggle('d-none');
        document.getElementById('payment_type').value = 'hourly';
    })

    fixed.addEventListener('click', () => {
        fixed_div.classList.toggle('d-none');
        hourly_div.classList.toggle('d-none');
        document.getElementById('payment_type').value = 'fixed';
    })
</script>
    
@endpush