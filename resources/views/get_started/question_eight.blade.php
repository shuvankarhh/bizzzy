@extends('layouts.app')

@section('navbar')
<x-navbar links="false"/>
@endsection

@section('content')
<section class="question">
    <div class="container py-3 mt-3 h-100">
        <div class="row">
            <div class=" col-md-1 col-lg-1 col-xl-1 col-sm-3 d-none d-sm-none d-md-block">
                <a>Prev</a>
            </div>
            <div class=" col-md-6 col-lg-6 col-xl-6 col-sm-12 col-xs-12">    
                <p class="main-question" >Looking good. Next, tell us which languages you speak.</p>
                <p class="main-question-desc" >Bizzzy is global, so clients are often interested to know what languages you speak. English is a must, but do you speak any other languages?</p>

                {{-- <a class="skip" href="#">Skip for now ></a> --}}
                <div class="row">
                    <div class="col-md-6">
                        <select id="language" name="language" placeholder="English" autocomplete="off">
                            <option value=""></option>
                            <x-languages/>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <select id="proficiency" name="proficiency" placeholder="Select a person..." autocomplete="off"></select>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <div class="question-footer-height"></div>
    <div class="question-footer">
        <x-question-footer percentage=65/>
        <div class="row justify-content-end">
            <div class="col-md-3 text-end">
                <button onclick="first_working_experience('{{ route('question.eleven') }}')" class="btn btn-bizzzy-success text-nowrap me-3">Next, Languages </button>
            </div>
        </div>
    </div>
</section>


<div class="modal fade" id="education_modal" tabindex="-1" aria-labelledby="education_modal_label" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="education_modal_label">Add Education History</h5>
                <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body p-4">
                <form onsubmit="add_education()" id="education_form">
                    <!-- 2 column grid layout with text inputs for the first and last names -->
                    <div class="form-outline mb-4">
                        <input type="text" id="institute_name" name="institute_name" class="form-control" />
                        <label class="form-label" for="institute_name">School *</label>
                    </div>

                    <!-- Text input -->
                    <div class="form-outline mb-4">
                        <input type="text" id="degree" name="degree" class="form-control" />
                        <label class="form-label" for="degree">Degree</label>
                    </div>

                    <!-- Text input -->
                    <div class="form-outline mb-4">
                        <input type="text" id="area_of_study" name="area_of_study" class="form-control" />
                        <label class="form-label" for="area_of_study">Field of Study</label>
                    </div>

                    <div class="row mb-4">
                        <div class="col-md-6 col-lg-6 col-xl-6 col-sm-12 col-xs-12">
                            <label class="custom-label" for="start_date_div">From</label>                            
                            <select name="year_start" id="year_start" class="form-select" aria-label="Default select example">
                                <option value="" selected>From</option>
                                <option value="1">One</option>
                                <option value="2">Two</option>
                                <option value="3">Three</option>
                            </select>
                        </div>
                        <div class="col-md-6 col-lg-6 col-xl-6 col-sm-12 col-xs-12">
                            <label class="custom-label" for="start_date_div">To</label>                            
                            <select name="year_start" id="year_start" class="form-select" aria-label="Default select example">
                                <option value="" selected>To</option>
                                <option value="1">One</option>
                                <option value="2">Two</option>
                                <option value="3">Three</option>
                            </select>
                        </div>
                    </div>

                    <!-- Checkbox -->
                    <div class="form-check d-flex mb-4">
                        <input class="form-check-input me-2" type="checkbox" value="yes" id="currently_studying" name="currently_studying"/>
                        <label class="form-check-label" for="currently_studying"> I am currently Studying </label>
                    </div>                    

                    <!-- Message input -->
                    <div class="form-outline mb-4">
                        <textarea class="form-control" id="description" name="description" rows="4"></textarea>
                        <label class="form-label" for="description">Description</label>
                    </div>

                    <!-- Submit button -->
                    <div class="row justify-content-end">
                        <div class="col-3 text-end">
                            <button id="education_modal_close_button" type="button" class="btn btn-link custom-close" data-mdb-dismiss="modal" style="">Close</button>
                        </div>
                        <div class="col-3">
                            <button type="submit" class="btn btn-bizzzy-success btn-block">Save</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection