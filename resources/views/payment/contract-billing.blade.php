@extends('layouts.app')
@section('navbar')
    <x-navbar links="true" />
@endsection
@section('content')
<div class="container">
    <div class="row justify-content-center m-0 p-0">
        <div class="col-xl-6 col-xxl-5 col-lg-6 col-md-10 col-sm-12 col-12">
            {{-- <form role="form" action="{{ route('stripe.store') }}" method="post" class="require-validation" data-cc-on-file="false" data-stripe-publishable-key="{{ env('STRIPE_KEY') }}" id="payment_form"> --}}
            <div class="card">
                <div class="card-header">
                    <h3 class="panel-title display-td" >Payment Methods</h3>
                </div>
                <div class="card-body">
                    @foreach ($stripe_details as $item)                            
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1"/>
                            <label class="form-check-label" for="flexRadioDefault1"> <div class="c-flex f-align-center f-gap-1"><img class="credit-card-logo" src="{{ asset("images/billings/".strtolower($item->card_name).".png") }}" alt=""> <span>{{$item->card_name}} ending with {{ $item->last4 }}</span></div> </label>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="col-xl-6 col-xxl-4 col-lg-6 col-md-10 col-sm-12 col-12 mt-xl-0 mt-lg-0 mt-xxl-0 mt-md-4 mt-sm-4 mt-4">
            <div class="card">
                <div class="card-body">
                    <p>Purpose</p>
                    <hr>
                    <p style="font-size: 1.234rem">Estimate amount: ${{ $estimate_amount }}</p>
                </div>
                <div class="card-footer text-center">
                    <button id="confirm_button" class="btn btn-primary border-zero">Fund Contract and Hire</button>
                </div>
            </div>
            {{-- </form> --}}
        </div>
    </div>
</div>
@endsection
@push('script')
<script type="text/javascript" src="https://js.stripe.com/v2/"></script>

<script>
    let confirm_button = document.getElementById('confirm_button')

    let fundContractHandler = () => {
        confirm_button.disabled = true;
        confirm_button.innerHTML = '<i class="fa-solid fa-circle-notch fa-spin"></i> Processing';

        axios
        .post(APP_URL + `/stripe/card/update`, {
            'credited_amount': credited_amount
        })
        .then(function(response) {
            location.reload();
        })
        .catch(function(error) {
            
        });
    }

    confirm_button.addEventListener('click', fundContractHandler);
</script>
@endpush