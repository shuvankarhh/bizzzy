@extends('layouts.app')
@section('navbar')
    <x-navbar links="true" />
@endsection
@section('content')
<section class="container body text-center">
    <h4>Hire <span class="font-italic">"{{ $freelancer->user->name }}"</span>  </h4>
    <form action="#" id="add_job_form" onsubmit="add_direct_job(this)">
        <input type="hidden" name="freelancer" value="{{ encrypt($freelancer->id) }}">
        <div class="row justify-content-center">
            <div class="col-6">
                <div class="form-group">
                    <input class="form-control" type="text" name="name" id="name" placeholder="Job Title">
                    <div class="invalid-reposne" id="name_invalid"></div>
                </div>
                <div class="form-group mt-2">
                    <textarea class="form-control" name="description" id="description" cols="30" rows="3" placeholder="Description"></textarea>
                    <div class="invalid-reposne" id="description_invalid"></div>
                </div>  
                <div class="form-group mt-2">
                    <select class="form-control" name="project_time" id="project_time">
                        <option value="">Select Project Time</option>
                        <option value="1">Less than 1 month</option>
                        <option value="2">1 to 3 months</option>
                        <option value="3">3 to 6 months</option>
                        <option value="4">More than 6 months</option>
                    </select>
                    <div class="invalid-reposne" id="project_time_invalid"></div>
                </div>
                <div class="form-group mt-2">
                    <select class="form-control" name="project_type" id="project_type">
                        <option value="">Select Project Type</option>
                        <option value="1">One-time project</option>
                        <option value="2">Ongoing project</option>
                    </select>
                    <div class="invalid-reposne" id="project_type_invalid"></div>
                </div>
                <div class="form-group mt-2">
                    <select class="form-control" name="experience_level" id="experience_level">
                        <option value="">Select Freelancer Experience Level</option>
                        <option value="1">Entry</option>
                        <option value="2">Intermediate</option>
                        <option value="3">Expert</option>
                    </select>
                    <div class="invalid-reposne" id="experience_level_invalid"></div>
                </div>
                <div class="form-group mt-2">
                    <select class="form-control" name="job_visibility" id="job_visibility">
                        <option value="">Select Job Visibility</option>
                        <option value="1">Private</option>
                        <option value="2">Public</option>
                        <option value="3">This App Users Only</option>
                    </select>
                    <div class="invalid-reposne" id="job_visibility_invalid"></div>
                </div>
                <div class="form-group mt-2">
                    <select class="form-control" name="price_type" id="price_type">
                        <option value="">Select Payment Type</option>
                        <option>Fixed</option>
                        <option>Hourly</option>
                    </select>
                    <div class="invalid-reposne" id="price_type_invalid"></div>
                </div>
                <div class="form-group mt-2">
                    <input class="form-control d-none" type="number" name="hours_per_week" id="hours_per_week" placeholder="Hours Per Week">
                </div>                
                <div class="form-group mt-2">
                    <input class="form-control" type="number" name="price" id="price" placeholder="Price (in $)">
                </div>
                <div class="fixed row d-none" id="milestone">
                    <div class="col-auto">
        
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
                <div class="form-group mt-2 d-none tom_select_div">
                    <select id="tags" name="tags[]" multiple placeholder="Select tags">
                        @foreach ($tags as $item)
                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group mt-2 d-none tom_select_div">
                    <select id="categories" name="categories[]" multiple placeholder="Select categories">
                        <option value=""></option>
                        @foreach ($categories as $item)
                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group mt-2 d-none tom_select_div">
                    <select id="languages" name="languages[]" multiple placeholder="Select perferred language">
                        <option value=""></option>
                        <x-languages />
                    </select>
                </div>
                
                <div class="form-group mt-2">
                    <input class="form-control-file" type="file" name="optional_files[]" id="optional_files" multiple>
                    <div class="invalid-reposne" id="optional_files_invalid"></div>
                </div>
                <button class="btn btn-success mt-2 mb-2">Submit</button>
            </div>
        </div>
    </form>
</section>
@endsection

@push('script')
<script>
    let tags_select = new TomSelect("#tags",{
        plugins: ['remove_button'],
        create: false,
    });
    let categories_select = new TomSelect("#categories",{
        plugins: ['remove_button'],
        create: false,
    });
    let languages_select = new TomSelect("#languages",{
        plugins: ['remove_button'],
        create: false,
    });
    

    let select_div = document.querySelectorAll('.tom_select_div');
    [].forEach.call(select_div,(element) => {
        element.classList.remove('d-none');
    });

    let price_type = document.getElementById('price_type');
    price_type.addEventListener('change', (elem) => {
        let hour_per_week = document.getElementById('hours_per_week');
        let milestone = document.getElementById('milestone');
        if(price_type.value == 'Hourly'){ // Hourly
            hour_per_week.classList.remove("d-none");
            milestone.classList.add("d-none");
        }else if(price_type.value == 'Fixed'){
            hour_per_week.classList.add("d-none");
            milestone.classList.remove("d-none");
        }else{
            hour_per_week.classList.add("d-none");
            milestone.classList.add("d-none");
        }
    });


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
</script>
@endpush