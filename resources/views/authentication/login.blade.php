@extends('layouts.app')

@section('navbar')
<x-navbar/>
@endsection

@section('content')
    
<section>
    <div class="container h-100">
        <div class="row d-flex justify-content-center mt-5 h-100">
            <div class="col-12 col-md-8 col-lg-5 col-xl-4">
                <form action="{{ route('user.login') }}" method="post">
                    @csrf
                    <div class="card shadow-2-strong" style="border-radius: 1rem;">
                        <div class="card-body text-center">

                            <h3 class="mb-4" style="font-size: 16px;">Enter Your Details</h3>

                            @if (session('message'))
                                <p class="ml-0 mr-0 mt-0">{{ session('message') }}</p>
                            @endif

                            @error('email')
                                <p class="ml-0 mr-0 mt-0 text-danger">{{ $message }}</p>
                            @enderror
                            <div class="form-outline mb-4">
                                <input type="email" name="email" id="typeEmailX-2" class="form-control form-control-lg" />
                                <label class="form-label" for="typeEmailX-2">Email</label>
                            </div>

                            <div class="form-outline mb-4">
                                <input type="password" name="password" id="typePasswordX-2" class="form-control form-control-lg"/>
                                <label class="form-label" for="typePasswordX-2">Password</label>
                            </div>

                            <!-- Checkbox -->
                            <!-- <div class="form-check d-flex justify-content-start mb-4">
                                <input class="form-check-input" type="checkbox" value="" id="form1Example3" />
                                <label class="form-check-label" for="form1Example3"> Remember password </label>
                            </div> -->

                            <button class="btn btn-primary btn-lg btn-block" style="  background-color: #14A800;" type="submit">Sign In</button>

                            <hr class="my-4">

                            <button class="btn btn-lg btn-block btn-primary" style="background-color: #FFFFFF; color: #1C1C1C;" type="submit"><i class="fab fa-google me-2"></i> Continue with google</button>
                            <button class="btn btn-lg btn-block btn-primary mb-2" style="background-color: #FFFFFF; color: #1C1C1C;" type="submit"><i class="fab fa-apple me-2"></i>Continue with facebook</button>

                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

@endsection