@extends('layouts.app')
@section('navbar')
<x-navbar links="false" />
@endsection 
@section('content') 
<section class="question">
    <div class="container py-3 h-100">
        <div class="row justify-content-center battery-question">
            <div class=" col-md-1 col-lg-1 col-xl-1 col-sm-3"><a>Prev</a></div>
            <div class="col-md-11 col-lg-11 col-xl-11 col-sm-12">
                <form action="#" id="skill_form">
                    <div class="row">
                        <div class="col-md-6 col-lg-6 col-xl-6 col-sm-12 col-xs-12">
                            <p class="main-question">Nearly there ! What work are you here to do?</p>
                            <p class="main-question-desc">Your skills show clients what you can offer, and help us choose which jobs to recommend to you. Add or remove the ones we’ve suggested, or start typing to pick more. It’s up to you.</p>
                        </div>
                        <div class="col-sm-12 col-xs-12 col-md-7 col-lg-7 col-xl-7">
                            <p style="font-weight: 500;">Skills</p>
                            {{--  <p class="text-danger" id="error"></p>  --}}
                            {{--  <div class="added-skill" style="">
                                <span class="added-skill">
                                    <p class="text"> Website Design <i role="button" style="color:red" class="fas fa-trash"></i></p>
                                    <p class="text"> Website Design <i style="color:red" class="fas fa-trash"></i></p>    
                                </span>                        
                                <div role="button" class="add-skill"><i class="fas fa-plus"></i></div>
                            </div>  --}}
                            <div class="p-4">
                                <select id="skills" name="skills[]" multiple placeholder="Select skill">
                                    @foreach ($skills as $item)
                                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                                    @endforeach
                                </select>
                                <div id="error" class="invalid-feedback js"></div>
                            </div>
                        </div>
                    </div>
                </form>
                <div class="row justify-content-end">
                    <div class="col-md-3 col-lg-3 col-xl-3 col-sm-3 d-none d-sm-none d-md-block align-self-end">
                        <div class="card" style="min-width: 200px"><img src="{{asset('/images/card/card1.png')}}"
                                class="card-img-top" alt="..."
                                style="background-image: linear-gradient(0deg, #FFAB00 0%, #FF991F 99.49%);"><img
                                class="battery" style="left: 45%" src="{{asset('/images/card/single-battary.png')}}"
                                alt="">
                            <div class="card-body" style="margin-top: 0px">
                                <p class="card-text" style="">Bizzzy Tip</p>
                                <p class="card-text sm" style="">“Bizzzy’s algorithm will recommend specific job posts to you based on your skills. So choose them carefully to get the best Match!”</p>
                            </div>
                        </div>
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
                <button onclick="add_skill()" class="btn btn-bizzzy-success text-nowrap me-3"> Now Write Your Bio </button>
            </div>
        </div>
    </div>
</section>
@endsection

@push('script')
    <script>
        let skill_select = new TomSelect("#skills",{
            plugins: ['remove_button'],
            create: false,
        });

        skill_select.setValue({{ $user_skills }});

        // Inserting Skills

        add_skill = () => {
            document.getElementById('error').innerHTML = '';
            let form = document.getElementById('skill_form');
            let formData = new FormData(form);

            axios.post(APP_URL + '/user/create/skill', formData)
            .then(function (response) {
                location.href = response.data;
            })
            .catch(function (error) {
                if(typeof error.response !== 'undefined'){ // This is for error from laravel
                    skill_select.wrapper.classList.toggle('is-invalid',!this.isValid);
                    document.getElementById('error').innerHTML = error.response.data.errors.skills[0];
                }else{ // Other JS related error
                    console.log(error);
                }
            });
        }
    </script>
@endpush
