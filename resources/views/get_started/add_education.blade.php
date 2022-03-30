@extends('layouts.app')

@section('navbar')
<x-navbar links="false"/>
@endsection

@section('content')
<section class="question">
    <div class="container py-3 mt-5 h-100">
        <div class="row">
            <div class="col-1 d-none d-sm-none d-md-block d-lg-block d-xl-block d-xxl-block">
                <a class="btn prev-button" href="{{ route('work.experience.index') }}">Prev</a>
            </div>
            <div class=" col-md-6 col-lg-6 col-xl-6 col-sm-12 col-xs-12">    
                <p class="main-question" >Clients like to know what you know - add your education here.</p>
                <p class="main-question-desc" >You don’t have to have a degree. Adding any relevant education helps make your profile more visible.</p>
                     
                <div class="row" id="added_exp">
                    @foreach ($educations as $item)
                        <div class="col-md-6 mb-2">
                            <div class="added-exp">
                                <p class="m-0 font-weight-bold">{{ $item->institute_name }}</p>
                                <p class="m-0">{{ $item->degree }}</p>
                            </div>
                        </div>
                    @endforeach
                </div>

                <div class="row ms-0">
                    <div class="add-exp" data-mdb-target="#education_modal" data-mdb-toggle="modal">
                        <div class="add-exp-button">
                            <i class="fas fa-plus"></i>
                        </div>
                        <p style="display: block">Add Education</p>
                    </div>
                </div>
                <div class="form-check mt-3 d-inline-flex">
                    <input class="form-check-input" type="checkbox" value="" id="no_exp" />
                    <label class="form-check-label" for="no_exp">Nothing to add? Check the box and keep going</label>
                </div>

                {{-- <a class="skip" href="#">Skip for now ></a> --}}

            </div>
        </div>
    </div>
    <div class="question-footer-height"></div>
    <div class="question-footer">
        <x-question-footer percentage=65/>
        <x-question-footer-content href="{{ route('work.experience.index') }}" on-click="first_working_experience('{{ route('language.index') }}')" button-text="Next, Languages" />
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
                                <option >2022</option>
                                <option >2021</option>
                                <option >2020</option>
                                <option >2019</option>
                                <option >2018</option>
                                <option >2017</option>
                                <option >2016</option>
                            </select>
                        </div>
                        <div class="col-md-6 col-lg-6 col-xl-6 col-sm-12 col-xs-12">
                            <label class="custom-label" for="start_date_div">To</label>                            
                            <select name="year_start" id="year_start" class="form-select" aria-label="Default select example">
                                <option value="" selected>To</option>
                                <option >2022</option>
                                <option >2021</option>
                                <option >2020</option>
                                <option >2019</option>
                                <option >2018</option>
                                <option >2017</option>
                                <option >2016</option>
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