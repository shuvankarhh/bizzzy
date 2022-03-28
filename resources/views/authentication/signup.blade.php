@extends('layouts.app')

@section('navbar')
<x-navbar/>
@endsection

@section('content')
    
<section>
    <div class="container h-100">
        <div class="row justify-content-center align-items-center h-100">
            <div class="col-lg-4 col-md-6 col-sm-8 col-xs-12">
                <form action="{{ route('user.register.email') }}">
                    <div class="card shadow-2-strong" style="border-radius: 1rem;">
                        <div class="card-body text-center">

                            <h3 class="mb-5" style="font-size: 16px;">Sign Up Your Account</h3>

                            <div class="form-outline mb-4">
                                <input type="email" name="email" id="typeEmailX-2" class="form-control form-control-lg" />
                                <label class="form-label" for="typeEmailX-2">Email</label>
                            </div>

                            <!-- Checkbox -->
                            <!-- <div class="form-check d-flex justify-content-start mb-4">
                                <input class="form-check-input" type="checkbox" value="" id="form1Example3" />
                                <label class="form-check-label" for="form1Example3"> Remember password </label>
                            </div> -->

                            <button class="btn btn-primary btn-lg btn-block" style="  background-color: #0086FF;" type="submit">Sign Up</button>

                            <p style="font-family: Nunito Sans; margin-top: 30px; margin-bottom: 30px;
                            font-style: normal;font-weight: normal;font-size: 14px;line-height: 20px;">By signing up, I accept the BIZZZY <a href="" style="color: #0086FF;">Terms of Service</a> and acknowledge the <a href="" style="color: #0086FF;">Privacy Policy.</a></p>

                            <hr class="my-4">

                            <button class="btn btn-lg btn-block btn-primary" style="background-color: #FFFFFF; color: #1C1C1C;" type="button"><i class="fab fa-google me-2"></i> Continue with Google</button>
                            <button class="btn btn-lg btn-block btn-primary mb-2" style="background-color: #FFFFFF; color: #1C1C1C;" type="button"><i class="fab fa-apple me-2"></i>Continue with Apple</button>
                            <p style="margin-top: 30px; margin-bottom: 10px;"><a href="" style="color: #0086FF;">Already have an Atlassian account? </a><a href="" style="color: #0086FF;"> Log in</a> </p>
                        </div>

                    </div>
                </form>
                <div>
                    <p style="text-align: center; font-family: Nunito Sans; margin-top: 30px;
                    font-style: normal;
                    font-weight: normal;
                    font-size: 12px;
                    line-height: 20px;">This page is protected by reCAPTCHA and the Google <br> <a style="color: #0086FF;">Privacy Policy</a> and <a style="color: #0086FF;"> Terms and Conditon</a> apply</p>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection