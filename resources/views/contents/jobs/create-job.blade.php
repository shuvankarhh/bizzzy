@extends('layouts.app')
@section('navbar')
<x-navbar links="true" />
@endsection
@push('css')
<style>
    .nav-tabs .nav-link {
        border-width: 0px 0px 0px 3px;
    }

    .experience {
        display: flex;
        justify-content: space-between;
    }

    .experience div {
        padding: 40px;
    }
</style>
@endpush
@section('content')
<div class="container">
    <p style="font-size: 1.5rem; font-weight: 400">Post a Job</p>
    <div class="row">
        <div class="col-3 setting-links">
            <!-- Tab navs -->
            <div class="nav flex-column nav-tabs text-center" id="v-tabs-tab" role="tablist"
                aria-orientation="vertical">
                <a class="nav-link active" id="title-tab" data-mdb-toggle="tab" href="#title" role="tab"
                    aria-controls="title" aria-selected="true"><i class="fa fa-pen"
                        style="margin-right: 10px"></i>Title</a>
                <a class="nav-link" id="description-tab" data-mdb-toggle="tab" href="#description" role="tab"
                    aria-controls="description" aria-selected="true"><i class="fa-solid fa-pen-to-square"
                        style="margin-right: 10px"></i>description</a>
                <a class="nav-link" id="details-tab" data-mdb-toggle="tab" href="#details" role="tab"
                    aria-controls="details" aria-selected="false"><i class="fa-solid fa-file-lines"
                        style="margin-right: 10px"></i>Details</a>
                {{-- <a class="nav-link" id="expertise-tab" data-mdb-toggle="tab" href="#expertise" role="tab"
                    aria-controls="expertise" aria-selected="false"><i class="fa-solid fa-mug-hot"
                        style="margin-right: 10px"></i>expertise</a> --}}
                <a class="nav-link" id="visibility-tab" data-mdb-toggle="tab" href="#visibility" role="tab"
                    aria-controls="visibility" aria-selected="false"><i class="fa-solid fa-user-clock"
                        style="margin-right: 10px"></i>Visibility</a>
                <a class="nav-link" id="budget-tab" data-mdb-toggle="tab" href="#budget" role="tab"
                    aria-controls="budget" aria-selected="false"><i class="fa-solid fa-dollar-sign"
                        style="margin-right: 10px"></i>Budget</a>
                {{-- <a class="nav-link" id="review-tab" data-mdb-toggle="tab" href="#review" role="tab"
                    aria-controls="review" aria-selected="false"><i class="fa-solid fa-check-double"
                        style="margin-right: 10px"></i>Review</a> --}}

            </div>
            <!-- Tab navs -->
        </div>

        <div class="col-9">
            <form action="#" id="add_job_form" >
                @csrf
            <!-- Tab content -->

            <div class="tab-content" id="v-tabs-tabContent">
                <div class="tab-pane fade show active" id="title" role="tabpanel" aria-labelledby="title-tab">
                    <div class="card w-75">
                        <div class="card-header c-flex f-justify-between">
                            <h5>Title</h5>
                        </div>
                        <div class="card-body">
                            <h6 class="card-title text-start">Enter the name of your job post <img width="15px"
                                    src="{{ asset('images/icons/question.svg') }}" alt="" style="cursor: pointer"
                                    data-mdb-toggle="tooltip"
                                    title="Adding a proper description will get you better proposals!"></h6>
                            <div class="form-group">
                                <input class="form-control" type="text" name="name" id="name" placeholder="Name">
                                <div class="invalid-reposne" id="name_invalid"></div>
                            </div>
                            <div style="margin-top: 20px;">
                                <p>Here are some good examples:</p>
                                <ul>
                                    <li>Developer needed for creating a responsive Wrodpress Theme</li>
                                    <li>CAD designer to create a 3D model of a residential building</li>
                                    <li>Need a design for a company logo</li>
                                </ul>
                            </div>
                            <hr>
                            <div>
                                <h6 class="card-title text-start">Job Category</h6>
                                <p>Let's Catogorize your job, Which helps us personalize your jod details and match your
                                    job to relaant freelancers and agencies.</p>
                                <div class="form-group mt-2 tom_select_div">
                                    <select id="categories" name="categories[]" multiple
                                        placeholder="Select categories">
                                        <option value=""></option>
                                        @foreach ($categories as $item)
                                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <hr>
                            {{-- <a type="submit" href="" class="btn "
                                style="border-radius: 50px; width:120px; margin-left:30px;color: green;"
                                onclick="back_title_tab()">Back</a> --}}
                            <a class="btn btn-success" style="border-radius: 50px; width:120px; margin-left:30px;"
                                onclick="description_tab()">Next</a>

                        </div>
                    </div>

                </div>
                <div class="tab-pane fade" id="description" role="tabpanel" aria-labelledby="description-tab">
                    <div class="card w-75">
                        <div class="card-header c-flex f-justify-between">
                            <h5>Description</h5>
                        </div>
                        <div class="card-body">
                            <h6 class="card-title text-start">A good description includes:</h6>
                            <ul>
                                <li>What the deliverable is</li>
                                <li>Type of freelancer or agency you'r looking for</li>
                                <li>Anything unique about this project</li>
                            </ul>
                            <div class="form-group mt-2">
                                <textarea class="form-control" name="description" id="description" cols="30" rows="4"
                                    placeholder="Description"></textarea>
                                <div class="invalid-reposne" id="description_invalid"></div>
                                <p style="text-align: right;font-size: 13px;">0/5000 characters (minimum 50)</p>
                            </div>
                            <div>
                                <h6 class="card-title text-start">Additional project files (optional)</h6>
                                <div class="form-group mt-2 text-start">
                                    <input class="form-control-file" type="file" name="optional_files[]"
                                        id="optional_files" multiple>
                                    <div class="invalid-reposne" id="optional_files_invalid"></div>
                                </div>
                            </div>
                            <hr>
                            <a type="submit" href="" class="btn "
                                style="border-radius: 50px; width:120px; margin-left:30px;color: green;"
                                onclick="back_title_tab()">Back</a>
                            <a class="btn btn-success" style="border-radius: 50px; width:120px; margin-left:30px;"
                                onclick="details_tab()">Next</a>

                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="details" role="tabpanel" aria-labelledby="details-tab">
                    <div class="card mb-3">
                        <div class="card-header" style="display: flex; justify-content: space-between">
                            <h5>Details</h5>
                        </div>
                        <div class="card-body">
                            <h6 class="card-title text-start mb-4">What type of project do you have?</h6>
                            <div class="c-flex f-gap-3">
                                <div class="form-check"
                                    style="border: 2px  solid #afafaf; border-radius: 4px; width:300px; position: relative;">
                                    <input class="form-check-input" type="radio" name="project_type" value="1" id="project_type_1"
                                        style="position: absolute; right: 0px;top:5px;" />
                                    <label class="form-check-label" for="project_type_1" style="text-align: center;
                                            margin-top: 30px;"><i class="fa-solid fa-user-clock"
                                            style="text-align: center; margin-bottom:10px;"></i><br><strong>One-time
                                            Project</strong>
                                        <p class="m-3">Find the right skills for a short term need.</p>
                                    </label>
                                </div>
                                <div class="form-check"
                                    style="border: 2px  solid #afafaf; border-radius: 4px; width:300px; position: relative;">
                                    <input class="form-check-input" type="radio" name="project_type"
                                        style="position: absolute; right: 5px; top:5px;" id="project_type_2" value="2"/>
                                    <label class="form-check-label" for="project_type_2" style="text-align: center;
                                            margin-top: 30px;"><i class="fa-solid fa-clipboard-list"
                                            style="text-align: center; margin-bottom:10px;"></i><br><strong>Ongoing
                                            Project</strong>
                                        <p class="m-3">Find a skilled resource for an extended engagement.</p>
                                    </label>
                                </div>
                                <div class="form-check"
                                    style="border: 2px  solid #afafaf; border-radius: 4px; width:300px; position: relative;">
                                    <input class="form-check-input" type="radio" name="project_type"
                                        style="position: absolute; right: 0px; top:5px;" id="project_type_3" value="3" />
                                    <label class="form-check-label" for="project_type_3" style="text-align: center;
                                            margin-top: 30px;"><i class="fa-solid fa-arrow-up-right-dots"
                                            style="text-align: center; margin-bottom:10px;"></i><br><strong>Complex
                                            Project</strong>
                                        <p class="m-3">Find specialized experts and agencies for large projects.</p>
                                    </label>
                                </div>
                                

                            </div>
                            <div class="mt-3">
                                <h6 class="card-title text-start">Job Type & Duration </h6>
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
                            </div>
                            <div class="mt-3">
                                 <h6 class="card-title text-start">Job Type & Duration </h6>
                                 <div class="form-group mt-2">
                            <select class="form-control" name="experience_level" id="experience_level">
                                <option value="">Select Freelancer Experience Level</option>
                                <option value="1">Entry</option>
                                <option value="2">Intermediate</option>
                                <option value="3">Expert</option>
                            </select>
                            <div class="invalid-reposne" id="experience_level_invalid"></div>
                        </div>
                            </div>
                            
                            <hr>
                            <a type="submit" href="" class="btn "
                                style="border-radius: 50px; width:120px; margin-left:30px;color: green;"
                                onclick="back_details_tab()">Back</a>
                            <a class="btn btn-success" style="border-radius: 50px; width:120px; margin-left:30px;"
                                onclick="visibility_tab()">Next</a>

                        </div>

                    </div>

                </div>
                {{-- <div class="tab-pane fade" id="expertise" role="tabpanel" aria-labelledby="expertise-tab">
                    <div class="card w-75">
                        <div class="card-header c-flex f-justify-between">
                            <h5>Expertise</h5>
                        </div>
                        <div class="card-body">
                            <h6 class="card-title text-start">What skills and expertise are most important to you in Development?</h6>
                           
                            
                            
                            <hr>
                            <a type="submit" href="" class="btn "
                                style="border-radius: 50px; width:120px; margin-left:30px;color: green;"
                                onclick="back_title_tab()">Back</a>
                            <a class="btn btn-success" style="border-radius: 50px; width:120px; margin-left:30px;"
                                onclick="details_tab()">Next</a>

                        </div>
                    </div>
                </div> --}}
                <div class="tab-pane fade" id="visibility" role="tabpanel" aria-labelledby="visibility-tab">
                    <div class="card w-75">
                        <div class="card-header c-flex f-justify-between">
                            <h5>Job Visibility</h5>
                        </div>
                        <div class="card-body">
                            <h6 class="card-title text-start mb-4">Who can see your job?</h6>
                            <div class="">
                                <div class="row">
                                    <div class="col-12 c-flex f-gap-3">
                                        <div class="form-check"
                                            style="border: 2px  solid #afafaf; border-radius: 4px; width:300px; position: relative;">
                                            <input class="form-check-input" type="radio" name="job_visibility" style="position: absolute; right: 0px;top:5px;" value="2" id="job_visibility_1" />
                                            <label class="form-check-label" for="job_visibility_1" style="text-align: center; margin-top: 30px;"><i class="fa-solid fa-chalkboard-user"
                                                    style="text-align: center; margin-bottom:10px;"></i><br><strong>Anyone
                                                </strong>
                                                <p class="m-3">Freelancers and Agencies using bizzzy and public search
                                                    engines can find this job.</p>
                                            </label>
                                        </div>
                                        <div class="form-check"
                                            style="border: 2px  solid #afafaf; border-radius: 4px; width:300px; position: relative;">
                                            <input class="form-check-input" type="radio" name="job_visibility"
                                                style="position: absolute; right: 5px; top:5px;"
                                                id="job_visibility_2"  value="3"/>
                                            <label class="form-check-label" for="job_visibility_2" style="text-align: center;
                                            margin-top: 30px;"><i class="fa-solid fa-users-rectangle"
                                                    style="text-align: center; margin-bottom:10px;"></i><br><strong>Only
                                                    Bizzzy Talent
                                                </strong>
                                                <p class="m-3">Only Bizzzy users can find this job.</p>
                                            </label>
                                        </div>
                                        <div class="form-check"
                                            style="border: 2px  solid #afafaf; border-radius: 4px; width:300px; position: relative;">
                                            <input class="form-check-input" type="radio" name="job_visibility"
                                                style="position: absolute; right: 0px; top:5px;"
                                                id="job_visibility_3"  value="1"/>
                                            <label class="form-check-label" for="job_visibility_3" style="text-align: center;
                                            margin-top: 30px;"><i class="fa-solid fa-lock"
                                                    style="text-align: center; margin-bottom:10px;"></i><br><strong>Invite-Only
                                                </strong>
                                                <p class="m-3">Only Freelancers and Agencies you have invited can find
                                                    this job.
                                                </p>
                                            </label>
                                        </div>
                                    </div>
                                    {{-- <div class="col-12 c-flex f-gap-3 mt-5">
                                        <div class="form-check"
                                            style="border: 2px  solid #afafaf; border-radius: 4px; width:300px; position: relative;">
                                            <input class="form-check-input" type="radio" name="flexRadioDefault"
                                                style="position: absolute; right: 0px;top:5px;"
                                                id="flexRadioDefault1" />
                                            <label class="form-check-label" for="flexRadioDefault1" style="text-align: center;
                                            margin-top: 30px;"><i class="fa-solid fa-user-clock"
                                                    style="text-align: center; margin-bottom:10px;"></i><br><strong>One-time
                                                    Project</strong>
                                                <p class="m-3">Find the right skills for a short term need.</p>
                                            </label>
                                        </div>
                                        <div class="form-check"
                                            style="border: 2px  solid #afafaf; border-radius: 4px; width:300px; position: relative;">
                                            <input class="form-check-input" type="radio" name="flexRadioDefault"
                                                style="position: absolute; right: 5px; top:5px;"
                                                id="flexRadioDefault1" />
                                            <label class="form-check-label" for="flexRadioDefault1" style="text-align: center;
                                            margin-top: 30px;"><i class="fa-solid fa-clipboard-list"
                                                    style="text-align: center; margin-bottom:10px;"></i><br><strong>Ongoing
                                                    Project</strong>
                                                <p class="m-3">Find a skilled resource for an extended engagement.</p>
                                            </label>
                                        </div>
                                        <div class="form-check">

                                        </div>
                                        
                                    </div> --}}
                                </div>



                            </div>



                            <hr>
                            <a type="submit" href="" class="btn "
                                style="border-radius: 50px; width:120px; margin-left:30px;color: green;"
                                onclick="back_title_tab()">Back</a>
                            <a class="btn btn-success" style="border-radius: 50px; width:120px; margin-left:30px;"
                                onclick="budget_tab()">Next</a>

                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="budget" role="tabpanel" aria-labelledby="budget-tab">
                    <div class="card w-75">
                        <div class="card-header c-flex f-justify-between">
                            <h5>Budget</h5>
                        </div>
                        <div class="card-body">
                            <h6 class="card-title text-start mb-4">How would you like to pay your freelancer or agency?
                            </h6>
                            <div class="c-flex f-gap-3 " name="price_type" id="price_type">
                                <div class="form-check"
                                    style="border: 2px  solid #afafaf; border-radius: 4px; width:300px; position: relative;">
                                    <input class="form-check-input price-type-input" type="radio" name="price_type" value="hourly"
                                        style="position: absolute; right: 0px;top:5px;" id="price_type_1" />
                                    <label class="form-check-label" for="price_type_1" style="text-align: center;
                                            margin-top: 30px;"><i class="fa-solid fa-clock"
                                            style="text-align: center; margin-bottom:10px;"></i><br><strong>Pay by the
                                            hour
                                        </strong>
                                        <p class="m-3">Pay hourly to easily scale up and down. </p>
                                        <p class="m-3" style="border: 2px  solid #4710df; border-radius: 4px;width: fit-content;position: absolute;
                                                top: 0px;
                                                left: 0px;
                                                font-size: 14px;
                                                color: #4710df;
                                                padding: 1px 3px 1px 3px;">Popular</p>
                                    </label>
                                </div>
                                <div class="form-check"
                                    style="border: 2px  solid #afafaf; border-radius: 4px; width:300px; position: relative;">
                                    <input class="form-check-input price-type-input" type="radio" name="price_type" value="fixed"
                                        style="position: absolute; right: 5px; top:5px;" id="price_type_2" />
                                    <label class="form-check-label" for="price_type_2" style="text-align: center;
                                            margin-top: 30px;"><i class="fa-solid fa-circle-dollar-to-slot"
                                            style="text-align: center; margin-bottom:10px;"></i><br><strong>Pay a fixed
                                            price
                                        </strong>
                                        <p class="m-3">Define payment before work begins and pay only when work id
                                            deliverd.</p>
                                    </label>
                                </div>


                            </div>
                            <div>
                                <h6 class="card-title text-start mb-4 mt-4">How would you like to pay your freelancer or
                                    agency?</h6>
                                <div class="form-group mt-2">
                                    <input class="form-control d-none" type="number" name="hours_per_week"
                                        id="hours_per_week" placeholder="Hours Per Week">
                                </div>
                                <div class="form-group mt-2">
                                    <input class="form-control" type="number" name="price" id="price"
                                        placeholder="Price (in $)">
                                </div>
                            </div>
                            <h6 class="card-title text-start mt-4">Languages</h6>
                             <div class="form-group mt-2 tom_select_div">
                            <select id="languages" name="languages[]" multiple placeholder="Select perferred language">
                                <option value=""></option>
                                <x-languages />
                            </select>
                        </div>
                            <hr>
                            <a type="submit" href="" class="btn "
                                style="border-radius: 50px; width:120px; margin-left:30px;color: green;"
                                onclick="back_details_tab()">Back</a>
                            <a class="btn btn-success" style="border-radius: 50px; width:fit-content; margin-left:30px;"
                                onclick="add_job()">Post the Job</a>

                        </div>
                    </div>
                </div>

            </div>
            <!-- Tab content -->
            </form>
        
        </div>
    </div>
</div>

@endsection

@push('script')
<script>
    // let tags_select = new TomSelect("#tags",{
    //     plugins: ['remove_button'],
    //     create: false,
    // });
    let categories_select = new TomSelect("#categories", {
        plugins: ['remove_button'],
        create: false,
    });
    let languages_select = new TomSelect("#languages",{
        plugins: ['remove_button'],
        create: false,
    });


    // let select_div = document.querySelectorAll('.tom_select_div');
    // [].forEach.call(select_div,(element) => {
    //     element.classList.remove('d-none');
    // });
    let price_type_change_handler = (e) => {
        let hour_per_week = document.getElementById('hours_per_week');
        if (e.target.value == 'hourly') {
            hour_per_week.classList.remove("d-none");
        } else {
            hour_per_week.classList.add("d-none");
        }
    };

    let price_type = document.querySelectorAll('.price-type-input');
    price_type.forEach(element => {
        element.addEventListener('change', price_type_change_handler);
    });

    let description_tab = () => {
        var triggerEl = document.querySelector('#description-tab')
        let tab_instance = new bootstrap.Tab(triggerEl);
        tab_instance.show();
    }
    let back_title_tab = () => {
        var triggerEl = document.querySelector('#title-tab')
        let tab_instance = new bootstrap.Tab(triggerEl);
        tab_instance.show();
    }
    let details_tab = () => {
        var triggerEl = document.querySelector('#details-tab')
        let tab_instance = new bootstrap.Tab(triggerEl);
        tab_instance.show();
    }
    let back_details_tab = () => {
        var triggerEl = document.querySelector('#details-tab')
        let tab_instance = new bootstrap.Tab(triggerEl);
        tab_instance.show();
    }
    let expertise_tab = () => {
        var triggerEl = document.querySelector('#expertise-tab')
        let tab_instance = new bootstrap.Tab(triggerEl);
        tab_instance.show();
    }
    let visibility_tab = () => {
        var triggerEl = document.querySelector('#visibility-tab')
        let tab_instance = new bootstrap.Tab(triggerEl);
        tab_instance.show();
    }
    let back_visibility_tab = () => {
        var triggerEl = document.querySelector('#visibility-tab')
        let tab_instance = new bootstrap.Tab(triggerEl);
        tab_instance.show();
    }
    let budget_tab = () => {
        var triggerEl = document.querySelector('#budget-tab')
        let tab_instance = new bootstrap.Tab(triggerEl);
        tab_instance.show();
    }
</script>
@endpush
