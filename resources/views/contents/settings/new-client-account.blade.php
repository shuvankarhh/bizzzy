@extends('layouts.app')
@section('navbar')
    <x-navbar links="true" />
@endsection
@section('content')
<div class="container" style="display: flex; justify-content: center;">
    <div class="card w-75">
        <form action="{{ route('client.account.store') }} " method="post">
            @csrf
            <div class="card-header">
                <h3 class="card-title">Create a client account</h3>
            </div>
            <div class="card-body">
                <p>Setup a client account if you want to post jobs and hire talents.</p>
                <p style="font-size: 1.5rem">Company Name</p>
                <input type="text" name="company_name" id="company_name" class="form-control w-50 @error('company_name') is-invalid @enderror">
                <div class="invalid-response">@error('company_name') {{$message}} @enderror</div>
            </div>
            <div class="card-footer text-end">
                <button class="btn btn-link">Cancel</button>
                <button class="btn">Create Client Account</button>
            </div>
        </form>
    </div>
</div>
@endsection