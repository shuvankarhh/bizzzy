@extends('layouts.app')

@section('navbar')
<x-navbar links="false"/>
@endsection

@section('content')
<section class="question">
    <div class="container pt-5 pb-3" style="min-height: 75vh">
        <div class="row">          
            <div class="col-1 d-none d-sm-none d-md-block d-lg-block d-xl-block d-xxl-block">
                <a class="btn prev-button" href="{{ route('question.five') }}">Prev</a>
            </div>
            <div class=" col-md-6 col-lg-6 col-xl-6 col-sm-12 col-xs-12">   
                <p class="main-question" >If you have relevant work experience, add it here.</p>
                <p class="main-question-desc" >Freelancers who add their experience are twice as likely to win work. But if you’re just starting out, you can still create a great profile. Just head on to the next page.</p>
                <div class="row" id="added_exp">
                    @foreach ($experiences as $item)
                        <div class="col-md-6 mb-2">
                            <div class="added-exp">
                                <p class="m-0 font-weight-bold">{{ $item->title }}</p>
                                <p class="m-0">{{ $item->company }}</p>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="row">                    
                    <div class="col-md-12">
                        <div class="add-exp" data-mdb-target="#work_modal" data-mdb-toggle="modal">
                            <div class="add-exp-button">
                                <i class="fas fa-plus"></i>
                            </div>
                            <p style="display: block">Add Experience</p>
                        </div>
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
        <x-question-footer-content href="{{ route('question.five') }}" on-click="first_working_experience('{{ route('education.index') }}')" button-text="Now, Add your Education" />
    </div>
</section>


<x-add-work-experience-modal />
@endsection