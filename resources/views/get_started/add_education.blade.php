@extends('layouts.app')

@section('navbar')
<x-navbar links="false"/>
@endsection

@section('content')
<section class="question">
    <div class="container pt-5 pb-3" style="min-height: 75vh">
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


<x-add-education-modal />
@endsection
@push('script')
    <script>        
        new TomSelect("#year_start", { create: false }); 
        new TomSelect("#year_end", { create: false }); 
    </script>
@endpush