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
                <p class="main-question" >Clients like to know what you know - add your education here.</p>
                <p class="main-question-desc" >You don’t have to have a degree. Adding any relevant education helps make your profile more visible.</p>
                                        
                <div class="add-exp" data-mdb-target="#education_modal" data-mdb-toggle="modal">
                    <div class="add-exp-button">
                        <i class="fas fa-plus"></i>
                    </div>
                    <p style="display: block">Add Education</p>
                </div>

                <div class="form-check mt-3">
                    <input class="form-check-input" type="checkbox" value="" id="no_exp" />
                    <label class="form-check-label" for="no_exp">Nothing to add? Check the box and keep going</label>
                </div>

                {{-- <a class="skip" href="#">Skip for now ></a> --}}

            </div>
        </div>
    </div>
    <div class="question-footer">
        <x-question-footer percentage=65/>
        <div class="row justify-content-end">
            <div class="col-md-3 text-end">
                <button onclick="first_working_experience('{{ route('question.eleven') }}')" class="btn btn-bizzzy-success text-nowrap me-3">Next, Languages </button>
            </div>
        </div>
    </div>
</section>


<div
    class="modal fade"
    id="education_modal"
    tabindex="-1"
    aria-labelledby="education_modal_label"
    aria-hidden="true"
>
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="education_modal_label">Add Education History</h5>
                <button
                    type="button"
                    class="btn-close"
                    data-mdb-dismiss="modal"
                    aria-label="Close"
                ></button>
            </div>
            <div class="modal-body p-4">
                <form>
                    <!-- 2 column grid layout with text inputs for the first and last names -->
                    <div class="form-outline mb-4">
                        <input type="text" id="school" class="form-control" />
                        <label class="form-label" for="school">School *</label>
                    </div>

                    <!-- Text input -->
                    <div class="form-outline mb-4">
                        <input type="text" id="degree" class="form-control" />
                        <label class="form-label" for="degree">Degree</label>
                    </div>

                    <!-- Text input -->
                    <div class="form-outline mb-4">
                        <input type="text" id="study_field" class="form-control" />
                        <label class="form-label" for="study_field">Field of Study</label>
                    </div>

                    <div class="row mb-4">
                        <div class="col-md-6 col-lg-6 col-xl-6 col-sm-12 col-xs-12">
                            <label class="custom-label" for="start_date_div">From</label>                            
                            <select name="year_start" id="year_start" class="form-select" aria-label="Default select example">
                                <option selected>From</option>
                                <option value="1">One</option>
                                <option value="2">Two</option>
                                <option value="3">Three</option>
                            </select>
                        </div>
                        <div class="col-md-6 col-lg-6 col-xl-6 col-sm-12 col-xs-12">
                            <label class="custom-label" for="start_date_div">To</label>                            
                            <select name="year_start" id="year_start" class="form-select" aria-label="Default select example">
                                <option selected>To</option>
                                <option value="1">One</option>
                                <option value="2">Two</option>
                                <option value="3">Three</option>
                            </select>
                        </div>
                    </div>

                    <!-- Checkbox -->
                    <div class="form-check d-flex mb-4">
                        <input
                            class="form-check-input me-2"
                            type="checkbox"
                            value="yes"
                            id="currently_working"
                            checked
                        />
                        <label class="form-check-label" for="currently_working"> I am currently Studying </label>
                    </div>                    

                    <!-- Message input -->
                    <div class="form-outline mb-4">
                        <textarea class="form-control" id="description" rows="4"></textarea>
                        <label class="form-label" for="description">Description</label>
                    </div>

                    <!-- Submit button -->
                    <div class="row justify-content-end">
                        <div class="col-3 text-end">
                            <button type="button" class="btn btn-link custom-close" data-mdb-dismiss="modal" style="">Close</button>
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