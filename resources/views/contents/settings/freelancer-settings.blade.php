@extends('layouts.app')
@section('navbar')
    <x-navbar links="true" />
@endsection
@push('css')
    <style>
        .nav-tabs .nav-link {
            border-width: 0px 0px 0px 3px;
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
                <a class="nav-link" id="profile-tab" data-mdb-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">My Profile</a>
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
                <div class="tab-pane fade" id="membership" role="tabpanel" aria-labelledby="membership-tab">
                    Membership
                </div>
                <div class="tab-pane fade show active" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                    <h3>Contact Info</h3>
                    <div class="card mb-3">                            
                        <div class="card-header"><h4 class="card-title">Account</h4></div>
                        <div class="card-body">
                            <p class="m-0 p-0"><strong>Name</strong></p>
                            <p>{{ auth()->user()->name }}</p>
                            <p class="m-0 p-0"><strong>Email</strong></p>
                            <p>{{ auth()->user()->email->email }}</p>
                        </div>
                    </div>
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
                </div>
                <div class="tab-pane fade" id="tax" role="tabpanel" aria-labelledby="tax-tab">
                    Tax
                </div>
                <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                    Profile
                </div>
                <div class="tab-pane fade" id="profile-setting" role="tabpanel" aria-labelledby="profile-setting-tab">
                    Profile setting
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
                    Security
                </div>
                <div class="tab-pane fade" id="indentity" role="tabpanel" aria-labelledby="indentity-tab">
                    Indentity
                </div>
                <div class="tab-pane fade" id="notification" role="tabpanel" aria-labelledby="notification-tab">
                    Notification
                </div>
            </div>
            <!-- Tab content -->
        </div>
    </div>
</div>
@endsection