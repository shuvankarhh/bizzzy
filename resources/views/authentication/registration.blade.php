@extends('layouts.app')

@section('navbar')
<x-navbar/>
@endsection

@section('content')
    
<section>
    <div class="container py-3 h-100">

        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-md-8 col-lg-6 col-xl-5 col-sm-10">
                <div class="card shadow-2-strong" style="border-radius: 1rem;">
                    <div class="card-body text-center">
                        <form action="{{ route('user.register') }}" method="post">
                            @csrf
                            <input type="hidden" name="email" value="{{ $email }}">
                            <h3 class="mb-5" style="font-size: 16px;">Sign Up Your Account</h3>

                            <div class="form-outline mb-4">
                                <div class="row">
                                    <div class="col-md-6 mb-4 form-group">
                                        <div class="input-group form-outline">
                                            <span class="input-group-text" id="inputGroupPrepend"><i class="fas fa-user fa-2xs "></i></span>
                                            <input name="first_name" type="text" id="first_name" class="form-control @error('first_name') is-invalid @enderror" value="{{ old('first_name') }}"/>
                                            <label class="form-label" for="first_name">First Name</label>
                                            <div class="invalid-feedback">@error('first_name') {{ $message }} @enderror</div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-4">
                                        <div class="input-group form-outline">
                                            <span class="input-group-text" id="inputGroupPrepend"><i class="fas fa-user fa-2xs "></i></span>
                                            <input name="last_name" type="text" id="last_name" class="form-control @error('last_name') is-invalid @enderror" value="{{ old('last_name') }}"/>
                                            <label class="form-label" for="last_name">Last Name</label>
                                            <div class="invalid-feedback">@error('last_name') {{ $message }} @enderror</div>
                                        </div>
                                    </div>
                                    <div class="col-md-12 mb-4">
                                        <div class="input-group form-outline">
                                            <span class="input-group-text" id="inputGroupPrepend"><i class="fas fa-lock fa-2xs "></i></span>
                                            <input name="password" type="password" id="form3Example4c" class="form-control @error('password') is-invalid @enderror" />
                                            <label class="form-label" for="form3Example4c">Password</label>
                                            <div class="invalid-feedback">@error('password') {{ $message }} @enderror</div>
                                        </div>
                                    </div>
                                    <div class="col-md-12 mb-4">
                                        <div class="input-group form-outline">
                                            <span class="input-group-text" id="inputGroupPrepend"><i class="fas fa-lock fa-2xs "></i></span>
                                            <input name="password_confirmation" type="password" id="form3Example4c" class="form-control" />
                                            <label class="form-label" for="form3Example4c">Confirm Password</label>
                                        </div>
                                    </div> 
                                </div>
                                <div class="mb-4">
                                    <select name="country" class="form-select @error('country') is-invalid @enderror" aria-label="Default select example">
                                        <option value="" selected>Open this select Country</option>
                                        <option>Bangladesh</option>
                                        <option>US</option>
                                        <option>UK</option>
                                    </select>
                                </div>
                                <p style="text-align: center;">I want to become:</p>
                                <div class="form-check">
                                    <input class="register-radio left" type="radio" id="freelancer" name="freelancer_or_recuriter" value="freelancer" checked/>
                                    <label for="freelancer">Freelancer</label>
                                    <input class="register-radio right" type="radio" id="recruiter" name="freelancer_or_recuriter" value="recruiter" />
                                    <label for="recruiter">Recruiter</label>
                                </div>
                            </div>

                            <!-- Checkbox -->
                            <div class="form-check justify-content-start mb-4">
                                <input style="margin-right: 0px" class="form-check-input" type="checkbox" value="yes" id="" name="subscription" />
                                <label class="form-check-label" for="" style="text-align: left; font-style: normal;
                                font-weight: normal;
                                font-size: 14px;
                                line-height: 20px;
                                color: rgba(0, 0, 0, 0.856)"> Send me useful emails every now and then to help me get the most out ofBizzzy.</label>
                            </div>
                            <div class="form-check justify-content-start mb-4">
                                <input style="margin-right: 0px" class="form-check-input @error('aggrement') is-invalid @enderror" type="checkbox" value="yes" id="aggrement" name="aggrement" value="{{ old('aggrement') }}"/>
                                <label class="form-check-label" for="" style="text-align: left; font-style: normal;
                                font-weight: normal;
                                font-size: 14px;
                                line-height: 20px;
                                color: rgba(0, 0, 0, 0.856)">Yes, I understand and agree to the <a style="color: #14A800;" >Bizzzy Terms of Service</a>, including the 
                                <a style="color: #14A800;">User Agreement</a>  and <a style="color: #14A800;" > Privacy Policy</a>. </label>
                                <div class="invalid-feedback">@error('aggrement') {{ $message }} @enderror</div>
                            </div>

                            <button class="btn btn-primary btn-lg btn-block" style="  background-color: #14A800;" type="submit">Create My Account</button>

                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
</section>

@endsection