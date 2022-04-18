@extends('layouts.app')

@section('navbar')
    <x-navbar />
@endsection

@section('content')
<div class="container pt-3 pb-3 h-100">
    <div class="row d-flex justify-content-center mt-3 mb-3 h-100">
        <div class="col-12 col-md-8 col-lg-5 col-xl-4">
            <form action="{{ route('admin.login') }}" method="post">
                @csrf
                <div class="card shadow-2-strong" style="border-radius: 1rem;">
                    <div class="card-body text-center">

                        <h3 class="mb-4" style="font-size: 16px;">Admin Login</h3>

                        @if (session('message'))
                            <p class="ml-0 mr-0 mt-0">{{ session('message') }}</p>
                        @endif

                        @error('email')
                            <p class="ml-0 mr-0 mt-0 text-danger">{{ $message }}</p>
                        @enderror

                        @error('password')
                            <p class="ml-0 mr-0 mt-0 text-danger">{{ $message }}</p>
                        @enderror
                        <div class="form-outline mb-4">
                            <input type="email" name="email" id="typeEmailX-2" class="form-control form-control-lg" />
                            <label class="form-label" for="typeEmailX-2">Email</label>
                        </div>

                        <div class="form-outline mb-4">
                            <input type="password" name="password" id="typePasswordX-2" class="form-control form-control-lg" />
                            <label class="form-label" for="typePasswordX-2">Password</label>
                        </div>

                        <button class="btn btn-primary btn-lg btn-block" style="background-color: #0086FF;" type="submit">Sign In</button>

                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
