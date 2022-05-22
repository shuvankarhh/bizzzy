@extends('layouts.app')
@section('navbar')
    <x-navbar links="true" />
@endsection
@push('css')
    <style>
        .nav-tabs .nav-link {
            border-width: 0px 0px 0px 3px;
        }

        .experience {
            display: flex;
            justify-content: space-between;
        }

        .experience div {
            padding: 40px;
        }

    </style>
@endpush
@section('content')
<div class="container">
    <p style="font-size: 1.5rem; font-weight: 400">User Setting</p>
    <div class="row">
        <div class="col-3 setting-links">
        <!-- Tab navs -->
            <div class="nav flex-column nav-tabs text-center" id="v-tabs-tab" role="tablist" aria-orientation="vertical">
                <a class="nav-link active" id="billing-tab" data-mdb-toggle="tab" href="#billing" role="tab" aria-controls="billing" aria-selected="true">Billing Methods</a>
                <a class="nav-link" id="membership-tab" data-mdb-toggle="tab" href="#v-tabs-home" role="tab" aria-controls="membership" aria-selected="true">Membership & Connects</a>
                <a class="nav-link" id="contact-tab" data-mdb-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">Contact Info</a>
                <a class="nav-link" id="tax-tab" data-mdb-toggle="tab" href="#tax" role="tab" aria-controls="tax" aria-selected="false">Tax Information</a>
                <a class="nav-link" id="profile-tab" href="{{ route('freelancer.profile.index') }}"  aria-controls="profile" aria-selected="false">My Profile</a>
                <a class="nav-link" id="profile-setting-tab" data-mdb-toggle="tab" href="#profile-setting" role="tab" aria-controls="profile-setting" aria-selected="false">Profile Setting</a>
                <a class="nav-link" id="get-paid-tab" data-mdb-toggle="tab" href="#get-paid" role="tab" aria-controls="get-paid" aria-selected="false">Get Paid</a>
                <a class="nav-link" id="my-team-tab" data-mdb-toggle="tab" href="#my-team" role="tab" aria-controls="my-team" aria-selected="false">My Teams</a>
                <a class="nav-link" id="connected-service-tab" data-mdb-toggle="tab" href="#connected-service" role="tab" aria-controls="connected-service" aria-selected="false">Connected Services</a>
                <a class="nav-link" id="security-tab" data-mdb-toggle="tab" href="#security" role="tab" aria-controls="security" aria-selected="false">Password & Security</a>
                <a class="nav-link" id="indentity-tab" data-mdb-toggle="tab" href="#indentity" role="tab" aria-controls="indentity" aria-selected="false">Indentity Verification</a>
                <a class="nav-link" id="notification-tab" data-mdb-toggle="tab" href="#notification" role="tab" aria-controls="notification" aria-selected="false">Notification Setting</a>
            </div>
        <!-- Tab navs -->
        </div>
    
        <div class="col-9">
            <!-- Tab content -->
            <div class="tab-content" id="v-tabs-tabContent">
                <div class="tab-pane fade show active" id="billing" role="tabpanel" aria-labelledby="billing-tab">
                    <div class="card w-75">
                        <div class="card-header c-flex f-justify-between"><h5>Saved Billing Methods</h5>@if (is_null($stripe_detail)) <button type="button" id="add_payment_method_btn" class="btn btn-success"> <i class="fas fa-plus"></i> Add Payment Method</button> @endif</div>
                        <div class="card-body">
                            @if (!is_null($stripe_detail))
                                @if ($stripe_detail->status == '3')                                    
                                    <div>
                                        <p><i class="fa-solid fa-circle-exclamation"></i> A small amount of money has been credited from your account. Please provide the exact amount to activate your card.</p>
                                        <p>You have added card ending with "<strong>....{{$stripe_detail->last4}}</st>" </p>
                                        <form action="#" id="confirm_credit_card">
                                            <input type="text" name="credited_amount" id="credited_amount" class="form-control" placeholder="Credited Amount">
                                            <button class="btn btn-success mt-3">Confirm</button>
                                        </form>
                                    </div>
                                @elseif ($stripe_detail->status == '1')
                                    <p class="text-success"><i class="fa-solid fa-circle-check"></i> Your card is verified.</p>
                                    <p>You have added card ending with "<strong>....{{$stripe_detail->last4}}</strong>" </p>
                                @endif
                            @else
                                <div id="not_added_text">
                                    <p style="font-weight: 500">You have not set up any billing methods yet.</p>
                                    <p>Your billing method will be charged only when your available balance from Upwork earnings is not sufficient to pay for your monthly membership and/or Connects.</p>
                                </div>
                                <div id="card_add" class="d-none">
                                    <form action="#" id="payment-form">
                                        <div id="payment-element">
                                            <!-- Elements will create form elements here -->
                                            <p class="text-center">
                                                <i class="fa-solid fa-circle-notch fa-spin"></i>
                                                Loading payment method
                                            </p>
                                        </div>
                                        <div  class='form-row row mt-1 mb-2'>
                                            <div id="alert_div" class='form-group error hidden mt-3'>
                                                <div id="alert" class='alert-danger alert'>Please correct the errors and try again. </div>
                                            </div>
                                        </div>
                                        <button class="btn mt-2 text-center" id="submit">
                                            <div class="spinner hidden" id="spinner"></div>
                                            <span id="button-text">Submit</span>
                                        </button>
                                    </form>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="membership" role="tabpanel" aria-labelledby="membership-tab">
                    Membership
                </div>
                <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                    <h3>Contact Info</h3>
                    <div class="card mb-3">                            
                        <form action="#" id="update_contact_info">
                            <div class="card-header" style="display: flex; justify-content: space-between"><h4 class="card-title">Account</h4><button type="button" id="edit_contact" class="circular-button"><i class="fas fa-pen"></i></button></div>
                            <div class="card-body">
                                <button class="btn" data-mdb-toggle="modal"
                                    data-mdb-target="#change_password_modal"><i class="fas fa-edit"></i> Change
                                    Password</button>
                            </div>
                        </div>
                        <div class="card mt-4">
                            <div class="card-header">
                                <p class="m-0 p-0" style="font-size: 1.3rem">Two factor authentication</p>
                            </div>
                            <div class="card-body">
                                {{-- <button class="btn" data-mdb-toggle="modal" data-mdb-target="#change_password_modal"><i class="fas fa-edit"></i> Change Password</button> --}}
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="indentity" role="tabpanel" aria-labelledby="indentity-tab">
                        <form action="#" id="verification_form">
                            <div class="card">
                                @if (auth()->user()->account_verified)
                                    <div class="card-body">
                                        <p class="text-success font-weight-bold"><i class="fa-solid fa-circle-check"></i>
                                            Profile Verified</p>
                                    </div>
                                @elseif (is_null($verification))
                                    <div class="card-body">
                                        <h5>Give your ID</h5>
                                        <p><i class="fa-solid fa-circle-exclamation"></i> Provide an official government id
                                            to verify your account.</p>
                                        <input type="file" name="verification_id" id="verification_id"
                                            class="form-control">
                                    </div>
                                    <div class="card-footer text-end">
                                        <button class="btn btn-info">Submit</button>
                                    </div>
                                @elseif ($verification->status == '0')
                                    <div class="card-body">
                                        <p class="text-warning font-weight-bold"><i
                                                class="fa-solid fa-circle-notch fa-spin"></i> Pending Requset</p>
                                    </div>
                                @endif
                            </div>
                        </form>
                    </div>
                    <div class="tab-pane fade" id="notification" role="tabpanel" aria-labelledby="notification-tab">
                        Notification
                    </div>
                </div>
                <!-- Tab content -->
            </div>
        </div>
    </div>
</div>
{{-- <div class="modal fade" id="add_card_modal" tabindex="-1" aria-labelledby="add-card" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <form action="#" id="payment-form">
            <div class="modal-content">
                <div id="payment-element">
                    <!-- Elements will create form elements here -->
                </div>
                <div id="alert_div" class='form-group error hidden mt-3'>
                    <div id="alert" class='alert-danger alert'>Please correct the errors and try again. </div>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn mt-2 text-center" id="submit">
                    <div class="spinner hidden" id="spinner"></div>
                    <span id="button-text">Create</span>
                </button>
            </div>
        </form>
    </div>
</div> --}}
<div class="modal fade" id="change_password_modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <form action="#" id="change_password_form">
            <div class="modal-content">
                <div class="modal-header">
                    Change Password
                </div>
                <div class="modal-body">
                    <div class="form-outline">
                        <input type="password" id="old_password" name="old_password" class="form-control" />
                        <label class="form-label" for="old_password">Old Password</label>
                        <div id="old_password_invalid" class="invalid-feedback js"></div>
                    </div>
                    <div class="modal-body">
                        <div class="form-outline">
                            <input type="password" id="old_password" name="old_password" class="form-control" />
                            <label class="form-label" for="old_password">Old Password</label>
                            <div id="old_password_invalid" class="invalid-feedback js"></div>
                        </div>
                        <hr style="margin-top: 2rem; margin-bottom: 2rem">
                        <div class="form-outline">
                            <input type="password" id="new_password" name="new_password" class="form-control" />
                            <label class="form-label" for="new_password">New Password</label>
                            <div id="new_password_invalid" class="invalid-feedback js"></div>
                        </div>
                        <div style="display: flex; gap: 20px;justify-content: end">
                            <div id="number_check" class="not-met"
                                style="display: flex; align-items: center; gap: 5px"><i class="fa-solid fa-check"></i>
                                number</div>
                            <div id="special_check" class="not-met"
                                style="display: flex; align-items: center; gap: 5px"><i class="fa-solid fa-check"></i>
                                special character</div>
                        </div>
                        <div class="form-outline mt-4">
                            <input type="password" id="new_password_confirmation" name="new_password_confirmation"
                                class="form-control" />
                            <label class="form-label" for="new_password_confirmation">Confirm Password</label>
                            <div id="new_password_confirmation_invalid" class="invalid-feedback js"></div>
                        </div>
                        <div style="display: flex; gap: 20px">
                            <div id="confirm_message" class="not-met"
                                style="display: flex; align-items: center; gap: 5px"><i class="fa-solid fa-check"></i>
                                Password Match</div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-primary">Change Password</button>
                        <butto type="button" class="btn btn-link custom-close" data-mdb-dismiss="modal" style="">Close
                        </butto>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection

@push('script')
    <script type="text/javascript" src="https://js.stripe.com/v3/"></script>

    <script>
        // function containsNumber(str) {
        //     return /\d/.test(str);
        // }

        const stripe = Stripe("{{ env('STRIPE_KEY') }}");

        let elements;
        let alert_div = document.getElementById('alert_div');

        let initialize = () => {
            axios
            .post(APP_URL + `/stripe/card/create`)
            .then(function(response) {
                const clientSecret = response.data.clientSecret;
                elements = stripe.elements({clientSecret});
                // Create and mount the Payment Element
                const paymentElement = elements.create('payment');
                paymentElement.mount('#payment-element');
            })
            .catch(function(error) {
                
            });
        }

        let confirmCardHandler = (e) => {
            e.preventDefault();
            let credited_amount = document.getElementById('credited_amount').value;
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

        let addPaymentToggle = (e) => {
            const not_added_text = document.getElementById('not_added_text');
            if(typeof elements === 'undefined'){
                initialize();
            }
            const card_add = document.getElementById('card_add');
            not_added_text.classList.toggle('d-none');
            card_add.classList.toggle('d-none');
        }

        let add_payment_btn = document.getElementById("add_payment_method_btn")
        if(add_payment_btn){
            add_payment_btn.addEventListener("click", addPaymentToggle);
        }
        

        let payment_form = document.getElementById("payment-form")
        if(payment_form){
            payment_form.addEventListener("submit", handleSubmit);
        }

        let confirm_credit_card = document.getElementById("confirm_credit_card")
        if(confirm_credit_card){
            confirm_credit_card.addEventListener("submit", confirmCardHandler);
        }

        async function handleSubmit(e) {
            e.preventDefault();
            alert_div.classList.add('hidden');
            const { error } = await stripe.confirmPayment({
                elements,
                confirmParams: {
                    // Make sure to change this to your payment completion page
                    return_url: '{{ route('setting.index') }}',
                },
            });

            // This point will only be reached if there is an immediate error when
            // confirming the payment. Otherwise, your customer will be redirected to
            // your `return_url`. For some payment methods like iDEAL, your customer will
            // be redirected to an intermediate site first to authorize the payment, then
            // redirected to the `return_url`.
            if (error.type === "card_error" || error.type === "validation_error") {
                showMessage(error.message);
            } else {
                showMessage("An unexpected error occured.");
            }

        }

        function showMessage(messageText) {

            alert_div.classList.remove('hidden');
            document.getElementById('alert').innerHTML = messageText;

        }

        @if (!is_null($freelancer))
            (function() {
                document.getElementById('visibility').value = document.getElementById('visibility').dataset.selected;
                document.getElementById('preference').value = document.getElementById('preference').dataset.selected;
                document.getElementById('{{ strtolower($freelancer->experience_level) }}').checked = true;
            })();
        @endif
    </script>
@endpush
