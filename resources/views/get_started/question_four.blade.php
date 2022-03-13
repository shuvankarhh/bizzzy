@extends('layouts.app')

@section('navbar')
<x-navbar links="false"/>
@endsection

@section('content')
<section class="question">
    <div class="container py-3 h-100">
        <div class="row d-flex justify-content-center mt-5 h-100">
            <div class="col-md-12 col-lg-12 col-xl-12 col-sm-12">
                <div class="row justify-content-center battery-question">
                    <div class=" col-md-1 col-lg-1 col-xl-1 col-sm-3">
                        <a>Prev</a>
                    </div>
                    <div class=" col-md-6 col-lg-6 col-xl-6 col-sm-">   
                        <p class="main-question" >How would you like to tell us about 
                            yourself?</p>
                        <p class="main-question-desc" >We need to get a sense of your education, experience and skills. It’s quickest to import your information — you can edit it before your profile goes live.</p>
                                             
                        <button class="btn btn-primary btn-ls " style="width:250px;  background-color: #14A800;margin-top: 20px;" type="submit">Import From Linkedin</button><br>
                        <button class="btn btn-primary btn-ls " style="width:250px; background-color: #ffff; color:#14A800;border: 1px solid #14A800; margin-top: 20px;" type="submit">Upload Your Resume</button><br>
                        <button class="btn btn-primary btn-ls " style=" width:250px; background-color: #ffff;color:#14A800; border: 1px solid #14A800; margin-top: 20px;" type="submit">Fill Out Manually (15 min)</button>


                    </div>
                    <div class="col-md-2 col-lg-3 col-xl-3 col-sm-3 d-none d-sm-none d-md-block"></div>
                    <div class="col-md-3 col-lg-2 col-xl-2 col-sm-3 d-none d-sm-none d-md-block">
                        <div class="card" style="margin-top: 190px">
                            <img src="{{asset('/images/card/card1.png')}}" class="card-img-top" alt="..." style="background-image: linear-gradient(0deg, #FFAB00 0%, #FF991F 99.49%);">
                            <img class="battery" style="left: 45%" src="{{asset('/images/card/single-battary.png')}}" alt="">        
                            <div class="card-body" style="margin-top: 0px">
                                <p class="card-text" style="">Bizzzy Tip</p>
                                <p class="card-text sm" style="">“Your Bizzzy profile is how you stand out from the crowd. It’s what you use to win work, so let’s make it a good one.”</p>
                            </div>
                            
                        </div>
                    
                    </div>
                    <div>
                        <button class="btn btn-primary btn-ls " style=" background-color: #14A800;margin-top: 20px; float:right " type="submit">Make Your Profile</button><br>
                         </div>
                </div>
            </div>
        </div>

    </div>
</section>
@endsection