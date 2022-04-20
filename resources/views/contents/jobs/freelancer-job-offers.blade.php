@extends('layouts.app')
@section('navbar')
    <x-navbar links="true" />
@endsection
@section('content')
<div class="container" style="min-height: 75vh;font-family: 'Uber Move Text';font-style: normal;">
    <header><h3>Offers ({{ $offers->total() }})</h3></header>
    <ul class="list-group list-group-flush mb-2">
    @foreach ($offers as $item)
        <li class="list-group-item" style="background: #FFFFFF">
            <div class="row">
                <div class="col-auto">
                    <p class="m-0 {{ ($item->contract_status == 'Active') ? 'text-white' : '' }}">Received: {{ $item->created_at->format('M d, Y') }}</p>
                    <p class="m-0 {{ ($item->contract_status == 'Active') ? 'text-white' : '' }}">{{ $item->created_at->diffForHumans() }}</p>
                </div>
                <div class="col">
                    <a href="{{ route('job.offer.show', [encrypt($item->id)]) }}">{{ $item->job->name }}</a>
                    <p class=" {{ ($item->contract_status == 'Active') ? 'text-white' : '' }}">{{ $item->job->description }}</p>
                </div>
            </div>
        </li>      
    @endforeach
    </ul>
    {{ $offers->links() }}
    <hr class="mt-5 mb-5">
    <header><h3>Sent Proposals ({{ $proposals->total() }})</h3></header>
    <ul class="list-group list-group-flush mb-2">
    @foreach ($proposals as $item)
        <li class="list-group-item" style="background: #FFFFFF">
            <div class="row">
                <div class="col-2">
                    <p class="m-0">Proposal Sent: <p>{{ $item->created_at }}</p></p>
                </div>
                <div class="col">
                    <a href="#">{{ $item->name }}</a>
                    <p class="">{{ $item->description }}</p>
                </div>
            </div>
        </li>      
    @endforeach
    </ul>
    {{ $proposals->links() }}
</div>
@endsection