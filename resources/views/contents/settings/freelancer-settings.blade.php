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
                <a class="nav-link" id="membership-tab" data-mdb-toggle="tab" href="#membership" role="tab" aria-controls="membership" aria-selected="true">Membership & Connects</a>
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
                                        <p>You have added card ending with "<strong>....{{$stripe_detail->last4}}</strong>" </p>
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
                    <p class="membership">Membership plans</p>
                    <div class="row">
                        <div class="col-6">
                            <div class="card" style="width: 35rem;">
                                <div class="card-body">
                                    <h5 class="card-title plan-title">Basic</h5>
                                    <h5 class="card-subtitle mb-2 plan-subtitle">Free</h5>
                                    <h6 class="card-subtitle mb-2 plan-subtitle">This is your current plan </h6>
                                    <p style="text-align: center;margin-bottom:30px;margin-top:60px">Includes: </p>
                                    <p class="card-text"><i class="fa-solid fa-check"
                                            style="color: green; margin-right:10px"></i>
                                        <strong>10</strong> Connects/month
                                    </p>
                                    <p class="card-text"><i class="fa-solid fa-check"
                                            style="color: green; margin-right:10px"></i>
                                        Buy Connects as you need them for $0.15 + Tax each*
                                    </p>
                                    <p class="card-text"><i class="fa-solid fa-check"
                                            style="color: green; margin-right:10px"></i>
                                        Unused Connects rollover up to 200
                                    </p>
                                    <p class="card-text"><i class="fa-solid fa-check"
                                            style="color: green; margin-right:10px"></i>

                                        Hourly protection to ensure you're paid for each hour worked
                                    </p>
                                    <p class="card-text"><i class="fa-solid fa-check"
                                            style="color: green; margin-right:10px"></i>

                                        Fixed-price payments are secured through milestones
                                    </p>
                                    <p class="card-text"><i class="fa-solid fa-check"
                                            style="color: green; margin-right:10px"></i>
                                        Limited reports and functionality
                                    </p>

                                    <p style="text-align: center;margin-top:40px">*Connects expire one year after
                                        purchase date </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="card" style="width: 35rem;">
                                <div class="card-body">
                                    <h5 class="card-title plan-title">Plus </h5>
                                    <h5 class="card-subtitle mb-2 plan-subtitle"> $14.99 /month * </h5>
                                    <div style="text-align: center;"><a href="{{ route('setting.membership') }}"
                                            class="btn btn-success" style="width: 80%;border-radius: 50px;"
                                            type="submit">
                                            Upgrade to
                                            Plus</a></div>

                                    <p style="text-align: center;margin-bottom:30px;margin-top:40px">Includes
                                        everything in Basic and
                                        also:</p>
                                    <p class="card-text"><i class="fa-solid fa-check"
                                            style="color: green; margin-right:10px"></i>
                                        <strong>80</strong>
                                        Connects/month
                                    </p>
                                    <p class="card-text"><i class="fa-solid fa-check"
                                            style="color: green; margin-right:10px"></i>
                                        Your profile will never be set to hidden due to inactivity
                                    </p>
                                    <p class="card-text"><i class="fa-solid fa-check"
                                            style="color: green; margin-right:10px"></i>
                                        Setting to keep your earnings confidential
                                    </p>
                                    <p class="card-text"><i class="fa-solid fa-check"
                                            style="color: green; margin-right:10px"></i>
                                        View competitor bids for any job
                                    </p>
                                    <p class="card-text"><i class="fa-solid fa-check"
                                            style="color: green; margin-right:10px"></i>
                                        Customize your profile URL
                                    </p>
                                    <p class="card-text"><i class="fa-solid fa-check"
                                            style="color: green; margin-right:10px"></i>
                                        Extended reports and functionality, including grouping and sorting
                                    </p>

                                    <p style="text-align: center;margin-top:40px">*Sales tax may apply
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                    <h3>Contact Info</h3>
                    <div class="card mb-3">                            
                        <form action="#" id="update_contact_info">
                            <div class="card-header" style="display: flex; justify-content: space-between"><h4 class="card-title">Account</h4><button type="button" id="edit_contact" class="circular-button"><i class="fas fa-pen"></i></button></div>
                                <div class="card-body">
                                    <div id="show_div">
                                        <p class="m-0 p-0"><strong>Name</strong></p>
                                        <p>{{ auth()->user()->name }}</p>
                                        <p class="m-0 p-0"><strong>Email</strong></p>
                                        <p>{{ auth()->user()->email->email }}</p>
                                    </div>
                                    <div id="edit_div" class="d-none">
                                        <label for="name">Name</label>
                                        <input type="text" name="name" id="name" class="form-control w-50"
                                            value="{{ auth()->user()->name }}">
                                        <div id="name_invalid" class="invalid-feedback js"></div>
                                        <button class="btn btn-primary mt-4">Save</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        @if (session('user_type') == '2')
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Additional Account</h4>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-6">
                                            <p><strong>Client Account</strong></p>
                                            <p>Hire, manage and pay as a different company. Each client company has its own
                                                freelancers, payment methods and reports.</p>
                                        </div>
                                        <div class="col-6 align-self-center text-center">
                                            <a href="{{ route('client.account.create') }}" role="button"
                                                class="btn">New Client Account</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                    </div>
                    <div class="tab-pane fade" id="tax" role="tabpanel" aria-labelledby="tax-tab">
                        Tax
                    </div>
                    <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                        Profile
                    </div>
                    <div class="tab-pane fade" id="profile-setting" role="tabpanel" aria-labelledby="profile-setting-tab">
                        @if (!is_null($freelancer))
                            <div class="card">
                                <div class="card-header">My Profile</div>
                                <div class="card-body">
                                    <label class="form-label" for="visibility">Visibility</label>
                                    <select name="visibility" id="visibility" class="form-control w-50"
                                        data-selected="{{ is_null($freelancer->profile_visibility) ? '' : $freelancer->profile_visibility }}">
                                        @if (is_null($freelancer->profile_visibility))
                                            <option value="">Visibility</option>
                                        @endif
                                        <option value="2">Public</option>
                                        <option value="1">Private</option>
                                        <option value="3">This app user only</option>
                                    </select>
                                    <label class="form-label mt-3" for="preference">Profile preference <i
                                            class="fa-solid fa-circle-question" data-mdb-toggle="tooltip"
                                            title="This will not affect the jobs we show to client!"></i></label>
                                    <select name="preference" id="preference" class="form-control w-50"
                                        data-selected="{{ $freelancer->project_time_preference }}">
                                        @if (is_null($freelancer->project_time_preference))
                                            <option value="">Project Preference</option>
                                        @endif
                                        <option value="2"> Both short-term and long-term projects </option>
                                        <option value="1"> Long-term projects (3+ months) </option>
                                        <option value="3"> Short-term projects (less than 3 months) </option>
                                    </select>
                                </div>
                            </div>
                            <div class="card mt-5">
                                <div class="card-header"><span class="experience_text"> Experience level <span
                                            class="icons"><i id="loader"
                                                class="fa-solid fa-circle-notch fa-spin loader loader-hidden"></i><i
                                                id="success" class="fa-solid fa-circle-check loader-hidden loader"
                                                style="--fa-animation-iteration-count: 1"></i> </span></span></div>
                                <div class="card-body experience" style="">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="experience_level" id="entry"
                                            value="1" />
                                        <label class="form-check-label" for="entry">Entry Level</label>
                                    </div>

                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="experience_level"
                                            id="intermediate" value="2" />
                                        <label class="form-check-label" for="intermediate">Intermediate</label>
                                    </div>

                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="experience_level" id="expert"
                                            value="3" />
                                        <label class="form-check-label" for="expert">Expert</label>
                                    </div>
                                </div>
                            </div>
                        @endif
                    </div>
                    <div class="tab-pane fade" id="get-paid" role="tabpanel" aria-labelledby="get-paid-tab">
                        Get Paid
                    </div>
                    <div class="tab-pane fade" id="my-team" role="tabpanel" aria-labelledby="my-team-tab">
                        Teams
                    </div>
                    <div class="tab-pane fade" id="connected-service" role="tabpanel"
                        aria-labelledby="connected-service-tab">
                        Connected Services
                    </div>
                    <div class="tab-pane fade" id="security" role="tabpanel" aria-labelledby="security-tab">
                        <h1>Password & Security</h1>
                        <div class="card">
                            <div class="card-header">
                                <p class="m-0 p-0" style="font-size: 1.3rem">Password</p>
                            </div>
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
    <div class="modal fade" id="change_password_modal" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
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

    <script>
        // function containsNumber(str) {
        //     return /\d/.test(str);
        // }

        // const stripe = Stripe("{{ env('STRIPE_KEY') }}");

        // let elements;
        // let alert_div = document.getElementById('alert_div');

        // let initialize = () => {
        //     axios
        //     .post(APP_URL + `/stripe/card/create`)
        //     .then(function(response) {
        //         const clientSecret = response.data.clientSecret;
        //         elements = stripe.elements({clientSecret});
        //         // Create and mount the Payment Element
        //         const paymentElement = elements.create('payment');
        //         paymentElement.mount('#payment-element');
        //     })
        //     .catch(function(error) {
                
        //     });
        // }

        // let confirmCardHandler = (e) => {
        //     e.preventDefault();
        //     let credited_amount = document.getElementById('credited_amount').value;
        //     axios
        //     .post(APP_URL + `/stripe/card/update`, {
        //         'credited_amount': credited_amount
        //     })
        //     .then(function(response) {
        //         location.reload();
        //     })
        //     .catch(function(error) {
                
        //     });
        // }

        // let addPaymentToggle = (e) => {
        //     const not_added_text = document.getElementById('not_added_text');
        //     if(typeof elements === 'undefined'){
        //         initialize();
        //     }
        //     const card_add = document.getElementById('card_add');
        //     not_added_text.classList.toggle('d-none');
        //     card_add.classList.toggle('d-none');
        // }

        // let add_payment_btn = document.getElementById("add_payment_method_btn")
        // if(add_payment_btn){
        //     add_payment_btn.addEventListener("click", addPaymentToggle);
        // }
        

        // let payment_form = document.getElementById("payment-form")
        // if(payment_form){
        //     payment_form.addEventListener("submit", handleSubmit);
        // }

        // let confirm_credit_card = document.getElementById("confirm_credit_card")
        // if(confirm_credit_card){
        //     confirm_credit_card.addEventListener("submit", confirmCardHandler);
        // }

        // async function handleSubmit(e) {
        //     e.preventDefault();
        //     alert_div.classList.add('hidden');
        //     const { error } = await stripe.confirmPayment({
        //         elements,
        //         confirmParams: {
        //             // Make sure to change this to your payment completion page
        //             return_url: '{{ route('setting.index') }}',
        //         },
        //     });

        //     // This point will only be reached if there is an immediate error when
        //     // confirming the payment. Otherwise, your customer will be redirected to
        //     // your `return_url`. For some payment methods like iDEAL, your customer will
        //     // be redirected to an intermediate site first to authorize the payment, then
        //     // redirected to the `return_url`.
        //     if (error.type === "card_error" || error.type === "validation_error") {
        //         showMessage(error.message);
        //     } else {
        //         showMessage("An unexpected error occured.");
        //     }

        // }

        // function showMessage(messageText) {

        //     alert_div.classList.remove('hidden');
        //     document.getElementById('alert').innerHTML = messageText;

        // }

        @if (!is_null($freelancer))
            (function() {
                document.getElementById('visibility').value = document.getElementById('visibility').dataset.selected;
                document.getElementById('preference').value = document.getElementById('preference').dataset.selected;
                document.getElementById('{{ strtolower($freelancer->experience_level) }}').checked = true;
            })();
        @endif
    </script>
@endpush
