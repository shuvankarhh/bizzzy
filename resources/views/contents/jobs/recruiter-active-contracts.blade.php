@extends('layouts.app')
@section('navbar')
    <x-navbar links="true" />
@endsection
@section('content')
<div class="container pt-3 pb-3">
    <h2>My Jobs</h2>
    <ul class="nav nav-tabs mb-3" id="ex1" role="tablist">
        <li class="nav-item" role="presentation">
            <a class="nav-link active" id="all" data-mdb-toggle="tab" href="#all_tab" role="tab" aria-controls="all" aria-selected="true">
                <span class="icon">
                    <span class="text">All</span>
                </span>
            </a>
        </li>
        <li class="nav-item" role="presentation">
            <a class="nav-link" id="hourly" data-mdb-toggle="tab" href="#hourly_tab" role="tab" aria-controls="hourly" aria-selected="false">
                <span class="icon">
                    <span class="text"> Hourly {!! ($counts['hourly'] > 0) ? "<strong>({$counts['hourly']})</strong>" : '' !!} </span>
                </span>
            </a>
        </li>
        <li class="nav-item" role="presentation">
            <a class="nav-link" id="active_milestone" data-mdb-toggle="tab" href="#active_milestone_tab" role="tab" aria-controls="active_milestone" aria-selected="false">
                <span class="icon">
                    <span class="text"> Active Milestones {!! ($counts['fixed'] > 0) ? "<strong>({$counts['fixed']})</strong>" : '' !!} </span>
                </span>                    
            </a>
        </li>
        <li class="nav-item" role="presentation">
            <a class="nav-link" id="awaiting_milestone" data-mdb-toggle="tab" href="#awaiting_milestone_tab" role="tab" aria-controls="awaiting_milestone" aria-selected="false">
                <span class="icon">
                    <span class="text"> Awaiting Milestones </span>
                </span>                    
            </a>
        </li>
        <li class="nav-item" role="presentation">
            <a class="nav-link" id="payment_request" data-mdb-toggle="tab" href="#payment_request_tab" role="tab" aria-controls="payment_request" aria-selected="false">
                <span class="icon">
                    <span class="text"> Payment Requests </span>
                </span>                    
            </a>
        </li>
    </ul>
    <!-- Tabs content -->
    <div class="tab-content" id="ex1-content">
        <div class="tab-pane fade show active" id="all_tab" role="tabpanel" aria-labelledby="all_job">
            @forelse ($offers as $item)
                <div class="card m-3">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-auto">
                                <p class="m-0">Received: {{ $item->created_at->format('M d, Y') }}</p>
                                <p class="m-0">{{ $item->created_at->diffForHumans() }}</p>
                            </div>
                            <div class="col">
                                <a href="{{ route('job.offer.show', [encrypt($item->id)]) }}">{{ $item->job->name }}</a>
                                <p class="">{{ $item->job->description }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <div style="display: flex;align-items: center; flex-direction: column">
                    <img width="350px" src="{{ asset('images/icons/empty.svg') }}" alt="">
                    <p>No Active Contract!</p>
                </div>    
            @endforelse
        </div>
        <div class="tab-pane fade show" id="hourly_tab" role="tabpanel" aria-labelledby="hourly_tab">
            @forelse ($offers as $item)
                @if ($item->payment_type == '1')
                    @continue
                @endif
                <div class="card m-3">
                    <div class="card-body job-dropdown-parent" onclick="location.href='{{ route('recruiter.hourly.contract.index', $item->id) }}'">
                        <div class="row">
                            <div class="col-auto">
                                <p class="m-0">Received: {{ $item->created_at->format('M d, Y') }}</p>
                                <p class="m-0">{{ $item->created_at->diffForHumans() }}</p>
                            </div>
                            <div class="col">
                                <a href="{{ route('job.offer.show', [encrypt($item->id)]) }}">{{ $item->job->name }}</a>
                                <p class="">{{ $item->job->description }}</p>
                            </div>
                        </div>                        
                        <div class="dropdown job-dropdown">
                            <a class="nav-link text-reset me-2 dropdown-toggle hidden-arrow" href="#" id="findWorkDropdown" role="button" data-mdb-toggle="dropdown" aria-expanded="false" > <i class="fa-solid fa-ellipsis"></i> </a>
                            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton">
                                <li><button class="dropdown-item btn-link" href="#"><i class="fa-solid fa-newspaper me-2"></i>Work Diary</button></li>
                                <li><button class="dropdown-item btn-link" href="#"><i class="fa-solid fa-money-bill-transfer me-2"></i>Refund Contract</button></li>
                                <li><hr class="dropdown-divider" /></li>
                                <li><a class="dropdown-item" href="{{ route('recruiter.end.contract.create', encrypt($item->id)) }}"> <i class="fa-solid fa-check me-2"></i> End Contract</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            @empty
                <div style="display: flex;align-items: center; flex-direction: column">
                    <img width="350px" src="{{ asset('images/icons/empty.svg') }}" alt="">
                    <p>No Active Contract!</p>
                </div>
            @endforelse
        </div>
        <div class="tab-pane fade show" id="active_milestone_tab" role="tabpanel" aria-labelledby="active_milestone_tab">
            @forelse ($offers as $item)
                @if ($item->payment_type == '2')
                    @continue
                @endif
                @php
                    $id = encrypt($item->id)
                @endphp
                <div class="card m-3" style="cursor: pointer" onclick="location.href='{{ route('recruiter.contract.show', [$id]) }}'">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-auto">
                                <p class="m-0">Received: {{ $item->created_at->format('M d, Y') }}</p>
                                <p class="m-0">{{ $item->created_at->diffForHumans() }}</p>
                            </div>
                            <div class="col">
                                <a href="{{ route('job.offer.show', [$id]) }}">{{ $item->job->name }}</a>
                                <p class="">{{ $item->job->description }}</p>
                            </div>
                            <div class="col">
                                Milestone:
                                <p>{{ $item->milestones[0]->name }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <div style="display: flex;align-items: center; flex-direction: column">
                    <img width="350px" src="{{ asset('images/icons/empty.svg') }}" alt="">
                    <p>No Active Contract!</p>
                </div>
            @endforelse
        </div>
        <div class="tab-pane fade show" id="awaiting_milestone_tab" role="tabpanel" aria-labelledby="awaiting_milestone_tab">
        </div>
        <div class="tab-pane fade show" id="payment_request_tab" role="tabpanel" aria-labelledby="payment_request_tab">
        </div>
    </div>
    @if (!$in_review->isEmpty())
        <div class="mt-5">
            <h2>Ended contract feedback</h2>
            <div class="card">
                <div class="card-body">
                    <ul class="list-group list-group-light">
                        @foreach ($in_review as $item)
                            <li class="list-group-item">
                                <div class="row">
                                    <div class="col-9">
                                        <p style="font-size: 1.225rem">{{ $item->job->name }}</p>
                                        <p>{{ 'test' }}</p>
                                    </div>
                                    <div class="col-3 align-self-center text-center">
                                        <a role="button" href="{{ route('recruiter.end.contract.create', encrypt($item->id)) }}" class="btn btn-primary" style="border-radius: 0">Give Feedback</a>
                                    </div>
                                </div>
                            </li>
                        @endforeach
                    </ul>                      
                </div>
            </div>
        </div>
    @endif
</div>
@endsection