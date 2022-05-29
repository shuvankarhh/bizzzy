@extends('layouts.app')
@section('navbar')
    <x-navbar links="true" />
@endsection
@push('css')
    <style>
        .nav-fill .nav-item, .nav-fill>.nav-link {
            text-align: start;
        }
    </style>
@endpush
@section('content')
<div class="container">
    <ul class="nav-fill w-100 nav flex-column flex-sm-column flex-md-row flex-lg-row flex-xl-row flex-xxl-row text-center text-xs-center text-md-start text-lg-start text-xl-start text-xxl-start nav-tabs mb-3" id="ex1" role="tablist">
        <li class="nav-item" role="presentation">
            <a class="nav-link active pe-5" id="work_in_progress" data-mdb-toggle="tab" href="#work_in_progress_tab" role="tab" aria-controls="work_in_progress" aria-selected="true">
                <span style="font-size: 1rem">Work in progress <i class="fas fa-circle-exclamation"></i></span>
                <p class="mt-2" style="color: black; font-size: 1.4rem">${{ number_format($in_progress->sum('deposit_amount'),2) }}</p>
            </a>
        </li>
        <li class="nav-item" role="presentation">
            <a class="nav-link pe-5" id="in_review" data-mdb-toggle="tab" href="#in_review_tab" role="tab" aria-controls="in_review" aria-selected="false">
                <span style="font-size: 1rem">In Review <i class="fas fa-circle-exclamation"></i></span>
                <p class="mt-2" style="color: black; font-size: 1.4rem">$0.00</p>
            </a>
        </li>
        <li class="nav-item" role="presentation">
            <a class="nav-link pe-5" id="pending" data-mdb-toggle="tab" href="#pending_tab" role="tab" aria-controls="pending" aria-selected="false">
                <span style="font-size: 1rem">Pending <i class="fas fa-circle-exclamation"></i></span>
                <p class="mt-2" style="color: black; font-size: 1.4rem">${{ number_format($pending,2) }}</p>                    
            </a>
        </li>
        <li class="nav-item" role="presentation">
            <a class="nav-link pe-5" id="available" data-mdb-toggle="tab" href="#available_tab" role="tab" aria-controls="available" aria-selected="false">
                <span style="font-size: 1rem">Available <i class="fas fa-circle-exclamation"></i></span>
                <p class="mt-2" style="color: black; font-size: 1.4rem">${{ number_format($balance->balance,2) }}</p>                    
            </a>
        </li>
    </ul>
    <div class="tab-content" id="ex1-content">
        <div class="tab-pane fade show active" id="work_in_progress_tab" role="tabpanel" aria-labelledby="work_in_progress_tab">
            @foreach ($contracts as $item)
                <p>{{ $item->job->name }}</p>
            @endforeach
        </div>
        <div class="tab-pane fade" id="in_review_tab" role="tabpanel" aria-labelledby="in_review_tab">
        </div>
        <div class="tab-pane fade" id="pending_tab" role="tabpanel" aria-labelledby="pending_tab">
        </div>
        <div class="tab-pane fade" id="available_tab" role="tabpanel" aria-labelledby="available_tab">
        </div>
        
    </div>
</div>
@endsection