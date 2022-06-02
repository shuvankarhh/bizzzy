@extends('layouts.app')
@section('navbar')
    <x-navbar links="true" />
@endsection
@section('content')
<div class="container">
    <h2>Work diary</h2>
    @if ($contracts->isEmpty())
        <div class="card">
            <div class="card-body c-flex f-justify-center">
                <h5>You have no active hourly contract!<h5/>
            </div>
        </div>
    @else
        <select name="contarct" id="contract" class="form-control">
            @foreach ($contracts as $item)
            <option value="{{ encrypt($item->id) }}">{{ $item->job->name }}</option>
            @endforeach
        </select>
    @endif
</div>
@endsection