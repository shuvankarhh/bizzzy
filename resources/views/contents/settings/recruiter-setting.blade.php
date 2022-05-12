@extends('layouts.app')
@section('navbar')
    <x-navbar links="true" />
@endsection
@push('css')
    <style>
        .nav-tabs .nav-link {
            border-width: 0px 0px 0px 3px;
        }
        .experience{
            display: flex;
            justify-content: space-between;
        }
        .experience div{
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
                <a class="nav-link" id="membership-tab" data-mdb-toggle="tab" href="#v-tabs-home" role="tab" aria-controls="membership" aria-selected="true">Membership & Connects</a>
                <a class="nav-link active" id="contact-tab" data-mdb-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">Contact Info</a>
                <a class="nav-link" id="tax-tab" data-mdb-toggle="tab" href="#tax" role="tab" aria-controls="tax" aria-selected="false">Tax Information</a>
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
                <div class="tab-pane fade" id="membership" role="tabpanel" aria-labelledby="membership-tab">
                    Membership
                </div>
                <div class="tab-pane fade show active" id="contact" role="tabpanel" aria-labelledby="contact-tab">
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
                                    <input type="text" name="name" id="name" class="form-control w-50" value="{{ auth()->user()->name }}">
                                    <div id="name_invalid" class="invalid-feedback js"></div>
                                    <button class="btn btn-primary mt-4">Save</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    @if (session('user_type') == '2')
                        <div class="card">                            
                            <div class="card-header"><h4 class="card-title">Additional Account</h4></div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-6">
                                        <p><strong>Client Account</strong></p>
                                        <p>Hire, manage and pay as a different company. Each client company has its own freelancers, payment methods and reports.</p>
                                    </div>
                                    <div class="col-6 align-self-center text-center">
                                        <a href="{{ route('client.account.create') }}" role="button" class="btn">New Client Account</a>
                                    </div>
                                </div>
                            </div>
                        </div>                        
                    @endif
                </div>
                <div class="tab-pane fade" id="tax" role="tabpanel" aria-labelledby="tax-tab">
                    Tax
                </div>
                <div class="tab-pane fade" id="get-paid" role="tabpanel" aria-labelledby="get-paid-tab">
                    Get Paid
                </div>
                <div class="tab-pane fade" id="my-team" role="tabpanel" aria-labelledby="my-team-tab">
                    Teams
                </div>
                <div class="tab-pane fade" id="connected-service" role="tabpanel" aria-labelledby="connected-service-tab">
                    Connected Services
                </div>
                <div class="tab-pane fade" id="security" role="tabpanel" aria-labelledby="security-tab">
                    <h1>Password & Security</h1>
                    <div class="card">
                        <div class="card-header">
                            <p class="m-0 p-0" style="font-size: 1.3rem">Password</p>
                        </div>
                        <div class="card-body">
                            <button class="btn" data-mdb-toggle="modal" data-mdb-target="#change_password_modal"><i class="fas fa-edit"></i> Change Password</button>
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
                                    <p class="text-success font-weight-bold"><i class="fa-solid fa-circle-check"></i> Profile Verified</p>
                                </div>
                            @elseif (is_null($verification))
                                <div class="card-body">
                                    <h5>Give your ID</h5>
                                    <p><i class="fa-solid fa-circle-exclamation"></i> Provide an official government id to verify your account.</p>
                                    <input type="file" name="verification_id" id="verification_id" class="form-control">
                                </div>
                                <div class="card-footer text-end">
                                    <button class="btn btn-info">Submit</button>
                                </div>
                            @elseif ($verification->status == '0')
                                <div class="card-body">
                                    <p class="text-warning font-weight-bold"><i class="fa-solid fa-circle-notch fa-spin"></i> Pending Requset</p>
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
                    <hr style="margin-top: 2rem; margin-bottom: 2rem">
                    <div class="form-outline">
                        <input type="password" id="new_password" name="new_password" class="form-control" />
                        <label class="form-label" for="new_password">New Password</label>
                        <div id="new_password_invalid" class="invalid-feedback js"></div>
                    </div>
                    <div style="display: flex; gap: 20px;justify-content: end">
                        <div id="number_check" class="not-met" style="display: flex; align-items: center; gap: 5px"><i class="fa-solid fa-check"></i> number</div>
                        <div id="special_check" class="not-met" style="display: flex; align-items: center; gap: 5px"><i class="fa-solid fa-check"></i> special character</div>
                    </div>
                    <div class="form-outline mt-4">
                        <input type="password" id="new_password_confirmation" name="new_password_confirmation" class="form-control" />
                        <label class="form-label" for="new_password_confirmation">Confirm Password</label>
                        <div id="new_password_confirmation_invalid" class="invalid-feedback js"></div>
                    </div>
                    <div style="display: flex; gap: 20px">
                        <div id="confirm_message" class="not-met" style="display: flex; align-items: center; gap: 5px"><i class="fa-solid fa-check"></i> Password Match</div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-primary">Change Password</button>
                    <butto type="button" class="btn btn-link custom-close" data-mdb-dismiss="modal" style="">Close</butto>
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

        @if (!is_null($freelancer))
            (function() {
                document.getElementById('visibility').value = document.getElementById('visibility').dataset.selected;
                document.getElementById('preference').value = document.getElementById('preference').dataset.selected;
                document.getElementById('{{ strtolower($freelancer->experience_level) }}').checked = true;
            })();
        @endif
    </script>
@endpush