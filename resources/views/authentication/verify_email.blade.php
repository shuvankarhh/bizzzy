@extends('layouts.app')

@section('navbar')
<x-navbar/>
@endsection

@section('content')
    
<section class="vh-100" style="margin-top: 80px">

    <div class="row d-flex justify-content-center align-items-center h-50 p5">
        <div class="col-12 col-md-8 col-lg-6 col-xl-5 col-sm-3">
            <div class="card shadow-2-strong" style="border-radius: 1rem;">
                <div class="card-body p-5 text-center">

                    <h3 class="mb-5" style="font-size: 16px;">Verify your email to proceed</h3>

                    <div class="form-outline mb-4">
                        <p style="text-align: center; font-style: normal;
                        font-weight: 500;
                        font-size: 14px;
                        line-height: 24px">We just sent an email to the address: {{ $email }} <br>Please check your email and click on the link provided to verify your addresss</p>

                    </div>
                    <a style="font-style: normal; color: #14A800;margin-top: 20px; margin-bottom: 20px;
                    font-weight: 500;
                    font-size: 14px;
                    line-height: 20px;"> Change email</a><br>
                    <a style="font-style: normal; color: #14A800;margin-top: 20px; margin-bottom: 50px;
                    font-weight: 500;
                    font-size: 14px;
                    line-height: 20px;">I need help verifying my email</a>

                    <button class="btn btn-primary btn-lg btn-block" style="  background-color: #14A800; margin-top: 50px;" type="submit">Resend Verification Email</button>

                </div>

            </div>
        </div>
    </div>
</section>

@endsection