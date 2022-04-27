@extends('layouts.app')
@section('navbar')
    <x-navbar links="true" />
@endsection
@section('content')
<div class="container">
    <div style="padding-top: 2rem"></div>
    <div class="card">
        <div class="card-body">            
            <div class="row">
                <div class="col-6">
                    <h3>{{ $contract->job->name }}</h3>
                    <p class="m-0">Offer Date: {{ $contract->created_at->format('M d, Y') }}</p>
                    <p class="m-0">Status: <strong>{{ $contract->contract_status }}</strong></p>
                    <hr>
                    <p class="m-0">
                        Job Categories:
                        <span>
                            @foreach ($contract->job->categories as $item)
                                <span class="badge badge-primary">{{ $item->category->name }}</span>
                            @endforeach
                        </span>
                    </p>
                    <hr>
                    <p class="m-0">
                        Budget:
                        <span>
                            @if ($contract->payment_type === 1)
                                <strong>${{$contract->price}}</strong>
                            @else
                                <strong>${{ $contract->price }}/hr</strong>
                            @endif
                        </span>
                    </p>
                    @if (!$contract->milestones->isEmpty())
                        <hr>
                        <h4>Milestones</h4>
                        <ul class="list-group">
                            @foreach ($contract->milestones as $item)
                                <li class="list-group-item" style="display: grid; grid-template-columns: repeat(auto-fill, minmax(150px, 1fr));">
                                    <p class="m-0">Title: <strong>{{$item->name}}</strong></p>
                                    <p class="m-0">Amount: <strong>{{(int)$item->deposit_amount}}</strong></p>
                                    <p class="m-0">End Date: <strong>@php $date = new DateTime($item->end_date); echo $date->format('M d, Y'); @endphp</strong></p>
                                </li>
                            @endforeach
                        </ul>
                    @endif
                    @if ($contract->payment_type === 2)
                        <hr>
                        <p class="m-0">Maximum Hours Per Week: <strong>{{ $contract->hours_per_week }}</strong></p>
                    @endif
                    @if ($contract->additional_message)
                        <hr>
                        <p class="m-0"><strong>Client Message:</strong> {{ $contract->additional_message }}</p>
                    @endif
                    @if ($contract->contract_status === 'Active')
                        <div class="col-12 text-end mt-4">
                            <span class="badge badge-success">Offer Accepted</span>
                        </div>                        
                    @else
                        @if ($contract->freelancer_id == auth()->id())
                            <input type="hidden" id="contract" value="{{ encrypt($contract->id) }}">
                            <div class="col-12 text-end mt-4">
                                <button class="btn btn-primary" id="offer_accept_button">Accept Offer</button>
                                <button class="btn btn-succes" id="offer_decile_button">Decline Offer</button>
                            </div>                        
                        @endif
                    @endif
                </div>
                <div class="col-auto ms-5">
                    <h3>Parties</h3>
                    <h5>Offer Made By:</h5>
                    <div style="display: flex; gap: 1rem">
                        <div>                            
                            <img style="border-radius: 50%" width="70px" src="@if (file_exists(public_path('storage/' . $contract->recruiter->photo)))
                            {{ asset('storage/' . $contract->recruiter->photo) }}
                        @else
                            {{ asset('images\general\avatar.png') }}
                        @endif" alt="This is image">
                        </div>
                        <div>
                            <p class="m-0"><strong>{{ $contract->recruiter->name }}</strong></p>
                            {{-- <p class="m-0">{{ $contract->recruiter->freelance_profile->professional_title }}</p> --}}
                        </div>
                    </div>
                    <h5 class="mt-4">Offer Made To:</h5>
                    <div style="display: flex; gap: 1rem">
                        <div>
                            <img style="border-radius: 50%" width="70px" src="{{ asset('storage/' . $contract->freelancer->photo) }}" alt="This is image">
                        </div>
                        <div>
                            <p class="m-0"><strong>{{ $contract->freelancer->name }}</strong></p>
                            <p class="m-0">{{ $contract->freelancer->freelance_profile->professional_title }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div style="padding-bottom: 2rem"></div>
</div>
@endsection

@push('script')
    <script>
        
    </script>
@endpush