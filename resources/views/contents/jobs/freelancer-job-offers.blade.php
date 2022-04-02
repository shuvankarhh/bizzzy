@extends('layouts.app')
@section('navbar')
    <x-navbar links="true" />
@endsection
@section('content')
<div class="container">
    <header><h2>Offers ({{ $offers->count() }})</h2></header>
    @foreach ($offers as $item)
        <div class="card m-3">
            <div class="card-body">
                <div class="row">
                    <div class="col-auto">
                        <p class="m-0">Received: {{ $item->created_at->format('M d, Y') }}</p>
                        <p class="m-0">{{ $item->created_at->diffForHumans() }}</p>
                    </div>
                    <div class="col">
                        <a href="{{ route('job.offer.show', [encrypt($item->id)]) }}">{{ $item->job->name }}</a>
                        <p>{{ $item->job->description }}</p>
                    </div>
                </div>
            </div>
        </div>        
    @endforeach
</div>
@endsection