@extends('layouts.app')
@section('navbar')
    <x-navbar links="true" />
@endsection
@section('content')
<section class="container body text-center">
    <h4>Post Job</h4>
    <form action="#" id="add_job_form" onsubmit="add_job(this)">
        <div class="row justify-content-center">
            <div class="col-6">
                <div class="form-group">
                    <input class="form-control" type="text" name="name" id="name" placeholder="Name">
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
                        <option value="1">Fixed</option>
                        <option value="2">Hourly</option>
                    </select>
                    <div class="invalid-reposne" id="price_type_invalid"></div>
                </div>
                <div class="form-group mt-2">
                    <input class="form-control d-none" type="number" name="hours_per_week" id="hours_per_week" placeholder="Hours Per Week">
                </div>
                <div class="form-group mt-2">
                    <input class="form-control" type="number" name="price" id="price" placeholder="Price (in $)">
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
        if(price_type.value == '2'){
            hour_per_week.classList.remove("d-none");
        }else{
            hour_per_week.classList.add("d-none");
        }
    });
</script>
@endpush