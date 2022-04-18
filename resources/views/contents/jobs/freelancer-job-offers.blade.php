@extends('layouts.app')
@section('navbar')
    <x-navbar links="true" />
@endsection
@section('content')
<div class="container" style="min-height: 75vh">
    <header><h3>Offers ({{ $offers->count() }})</h3></header>
    @foreach ($offers as $item)
        <div class="card m-3 {{ ($item->contract_status == 'Active') ? 'bg-success' : '' }}" style="color: white">
            <div class="card-body">
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
            </div>
        </div>        
    @endforeach
    {{ $offers->links() }}
</div>
@endsection