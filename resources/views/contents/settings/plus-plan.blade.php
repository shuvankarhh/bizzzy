@extends('layouts.app')
@section('navbar')
    <x-navbar links="true" />
@endsection
@section('content')
    <div class="container c-flex f-justify-center f-align-center">
        <div class="card" style="width: 60%;">
            <div class="card-body">
                <h4 class="card-title">Review upgrade </h4>
                <hr>
                <h5 class="card-subtitle mb-5">Membership plan </h5>
                <div class="row">
                    <div class="col-3">
                        <p style="font-weight: 500">Current Plan</p>
                        <p>Freelancer Basic </p>
                        <p>Free</p>
                    </div>
                    <div class="col-3">
                        <p style="font-weight: 500">New Plan</p>
                        <p>Freelancer Plus</p>
                        <p>$14.99/month + Tax </p>
                    </div>
                </div>
                <hr>
                <p>If you have sufficient funds, the monthly membership fee will be deducted from your
                    Upwork account balance. </p>
                <p>If your balance is not sufficient, the full amount of the fee will be charged to
                    your primary billing method. Learn more </p>
                <p class="mt-3">You're authorizing Upwork to charge $14.99 + Tax to your account at the beginning
                    of each billing cycle. </p>
                <hr>
                <div style="display: flex; justify-content: end;">
                    <a style="margin-right: 10px;margin-top: 10px;  color:green" href="">Cancel</a>
                    <form method="POST" action="{{ route('setting.planUpdate') }}">
                        @csrf
                        <button type="submit" class="btn btn-success" style="border-radius: 50px;" type="submit">
                            Activate Freelancer Plus</button>
                    </form>


                </div>

            </div>
        </div>
    </div>
@endsection

@push('script')
@endpush
