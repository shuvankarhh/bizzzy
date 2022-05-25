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
    <p style="font-size: 1.5rem; font-weight: 400">User Setting</p>
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
                <a class="nav-link" id="expertise-tab" data-mdb-toggle="tab" href="#expertise" role="tab"
                    aria-controls="expertise" aria-selected="false"><i class="fa-solid fa-mug-hot"
                        style="margin-right: 10px"></i>expertise</a>
                <a class="nav-link" id="visibility-tab" data-mdb-toggle="tab" href="#visibility" role="tab"
                    aria-controls="visibility" aria-selected="false"><i class="fa-solid fa-user-clock"
                        style="margin-right: 10px"></i>Visibility</a>
                <a class="nav-link" id="budget-tab" data-mdb-toggle="tab" href="#budget" role="tab"
                    aria-controls="budget" aria-selected="false"><i class="fa-solid fa-dollar-sign"
                        style="margin-right: 10px"></i>Budget</a>
                <a class="nav-link" id="review-tab" data-mdb-toggle="tab" href="#review" role="tab"
                    aria-controls="review" aria-selected="false"><i class="fa-solid fa-check-double"
                        style="margin-right: 10px"></i>Review</a>

            </div>
            <!-- Tab navs -->
        </div>

        <div class="col-9">
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
                                    <input class="form-check-input" type="radio" name="flexRadioDefault"
                                        style="position: absolute; right: 0px;top:5px;" id="flexRadioDefault1" />
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
                                        style="position: absolute; right: 5px; top:5px;" id="flexRadioDefault1" />
                                    <label class="form-check-label" for="flexRadioDefault1" style="text-align: center;
                                            margin-top: 30px;"><i class="fa-solid fa-clipboard-list"
                                            style="text-align: center; margin-bottom:10px;"></i><br><strong>Ongoing
                                            Project</strong>
                                        <p class="m-3">Find a skilled resource for an extended engagement.</p>
                                    </label>
                                </div>
                                <div class="form-check"
                                    style="border: 2px  solid #afafaf; border-radius: 4px; width:300px; position: relative;">
                                    <input class="form-check-input" type="radio" name="flexRadioDefault"
                                        style="position: absolute; right: 0px; top:5px;" id="flexRadioDefault1" />
                                    <label class="form-check-label" for="flexRadioDefault1" style="text-align: center;
                                            margin-top: 30px;"><i class="fa-solid fa-arrow-up-right-dots"
                                            style="text-align: center; margin-bottom:10px;"></i><br><strong>Complex
                                            Project</strong>
                                        <p class="m-3">Find specialized experts and agencies for large projects.</p>
                                    </label>
                                </div>

                            </div>
                            <hr>
                            <a type="submit" href="" class="btn "
                                style="border-radius: 50px; width:120px; margin-left:30px;color: green;"
                                onclick="back_details_tab()">Back</a>
                            <a class="btn btn-success" style="border-radius: 50px; width:120px; margin-left:30px;"
                                onclick="expertise_tab()">Next</a>

                        </div>

                    </div>

                </div>
                <div class="tab-pane fade" id="expertise" role="tabpanel" aria-labelledby="expertise-tab">
                    expertise
                </div>
                <div class="tab-pane fade" id="visibility" role="tabpanel" aria-labelledby="visibility-tab">
                    Get Paid
                </div>
                <div class="tab-pane fade" id="budget" role="tabpanel" aria-labelledby="budget-tab">
                    Teams
                </div>
                <div class="tab-pane fade" id="review" role="tabpanel" aria-labelledby="review-tab">
                    Connected Services
                </div>

            </div>
            <!-- Tab content -->
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
    // let languages_select = new TomSelect("#languages",{
    //     plugins: ['remove_button'],
    //     create: false,
    // });


    // let select_div = document.querySelectorAll('.tom_select_div');
    // [].forEach.call(select_div,(element) => {
    //     element.classList.remove('d-none');
    // });

    // let price_type = document.getElementById('price_type');
    // price_type.addEventListener('change', (elem) => {
    //     let hour_per_week = document.getElementById('hours_per_week');
    //     if(price_type.value == 'hourly'){
    //         hour_per_week.classList.remove("d-none");
    //     }else{
    //         hour_per_week.classList.add("d-none");
    //     }
    // });

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
    let expertise_tab = () => {
        var triggerEl = document.querySelector('#expertise-tab')
        let tab_instance = new bootstrap.Tab(triggerEl);
        tab_instance.show();
    }
    let back_details_tab = () => {
        var triggerEl = document.querySelector('#details-tab')
        let tab_instance = new bootstrap.Tab(triggerEl);
        tab_instance.show();
    }
</script>
@endpush
