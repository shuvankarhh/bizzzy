@extends('layouts.app')
@section('navbar')
    <x-navbar links="true" />
@endsection
@section('content')
<div class="container">
    <h1>Stripe Payment Page</h1>
    <div class="row justify-content-center m-0 p-0">
        <div class="col-xl-7 col-xxl-5 col-lg-8 col-md-10 col-sm-12 col-12 m-0 p-0">
            <form role="form" action="{{ route('stripe.store') }}" method="post" class="require-validation" data-cc-on-file="false" data-stripe-publishable-key="{{ config('stripe.stripe_key') }}" id="payment_form">
                <div class="card">
                    <div class="card-header">
                        <h3 class="panel-title display-td" >Payment Details</h3>
                    </div>
                    <div class="card-body">
                        @if (Session::has('success'))
                        <div class="alert alert-success text-center">
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
                            <p>{{ Session::get('success') }}</p>
                        </div>
                        @endif
                        <div class='form-row row'>
                            <div class='col-xs-12 form-group required'>
                                <label class='control-label'>Name on Card</label>
                                <input class='form-control' name="card_holder_name" id="card_holder_name" size='4' type='text' placeholder="ex. Alex Jones">
                            </div>
                        </div>
                        <div class='form-row row mt-2'>
                            <div class='col-xs-12 form-group required'>
                                <label class='control-label'>Card Number</label>
                                <input autocomplete='off' name="card_number" id="card_number" class='form-control' size='20' type='text'>
                            </div>
                        </div>
                        <div class='form-row row mt-2'>
                            <div class='col-xs-12 col-md-4 form-group cvc required'>
                                <label class='control-label'>CVC <i class="fa-solid fa-circle-exclamation" data-mdb-delay=500 data-mdb-toggle="tooltip" title="A 3/4 digit number behind your card."></i> </label>
                                <input autocomplete='off'  name="card_cvc" id="card_cvc" class='form-control' placeholder='ex. 311' size='4' type='text'>
                            </div>
                            <div class='col-xs-12 col-md-4 form-group expiration required'>
                                <label class='control-label'>Expiration Month</label>
                                <input name="card_expiry_month" id="card_expiry_month" class='form-control' placeholder='MM' size='2' type='text'>
                            </div>
                            <div class='col-xs-12 col-md-4 form-group expiration required'>
                                <label class='control-label'>Expiration Year</label>
                                <input name="card_expiry_year" id="card_expiry_year" class='form-control' placeholder='YYYY' size='4' type='text'>
                            </div>
                        </div>
                        <div  class='form-row row mt-3'>
                            <div id="alert_div" class='col-md-12 form-group error hidden'>
                                <div id="alert" class='alert-danger alert'>Please correct the errors and try again. </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer text-center">
                        <button style="transition: 100ms" id="pay_button" class="btn btn-primary" type="submit">Pay Now</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
@push('script')
<script type="text/javascript" src="https://js.stripe.com/v2/"></script>

<script>   
    let pay_button = document.getElementById('pay_button');
    let payment_form = document.getElementById('payment_form');
    let alert_div = document.getElementById('alert_div');

    let stripeResponseHandler = (status, response) => {
        if(response.error){
            alert_div.classList.remove('hidden');
            if(response.error.code == 'missing_payment_information'){
                document.getElementById('alert').innerHTML = 'Please fillup all information correctly!';
                pay_button.disabled = false;
                pay_button.innerHTML = 'Pay Now';
                return;
            }else{
                document.getElementById('alert').innerHTML = response.error.message;
                pay_button.disabled = false;
                pay_button.innerHTML = 'Pay Now';
                return;
            }
        }      

        alert_div.classList.add('hidden');
        pay_button.innerHTML = 'Processing <i class="fa-solid fa-circle-notch fa-spin"></i>';

        axios
        .post(APP_URL + `/stripe`, {
            'stripeToken': response.id
        })
        .then(function(response) {
            location.href = response.data
        })
        .catch(function(error) {
            alert_div.classList.remove('hidden');
            document.getElementById('alert').innerHTML = error.response.data;
            pay_button.disabled = false;
            pay_button.innerHTML = 'Pay Now';
        });
    }

    payment_form.addEventListener('submit', (e) => {
        e.preventDefault();

        pay_button.disabled = true;
        pay_button.innerHTML = '<i class="fa-solid fa-circle-notch fa-spin"></i>';

        let formData = new FormData(payment_form);

        Stripe.setPublishableKey("{{ config('stripe.stripe_key') }}");
        Stripe.createToken({
            number: formData.get('card_number'),
            cvc: formData.get('card_cvc'),
            exp_month: formData.get('card_expiry_month'),
            exp_year: formData.get('card_expiry_year')
        }, stripeResponseHandler);
    });
</script>
@endpush