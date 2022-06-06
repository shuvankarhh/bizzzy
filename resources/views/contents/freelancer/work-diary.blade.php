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
        <div class="row">
            <div class="col-4">
                <select name="contarct" id="contract" class="form-control">
                    @foreach ($contracts as $item)
                    <option value="{{ encrypt($item->id) }}">{{ $item->job->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-8"></div>
            <div class="col-12 mt-4">
                <div class="row justify-content-between">
                    <div class="col-auto"">
                        <h4>History for:</h4>
                        <input class="form-control" type="date" name="history_of" id="history_of" value="{{date('Y-m-d')}}">
                    </div>
                    <div class="col-8 align-self-end text-end">
                        <button class="btn btn-primary border-zero" id="delete_screenshot">Delete</button>
                    </div>
                </div>
            </div>
            <div class="col-12 mt-5">
                <form action="#" id="work_history_form">
                    <div class="card">
                        <div class="card-body row" id="history_body">
                            <div>
                                <div class="fa-3x">
                                    <i class="fa-solid fa-circle-notch fa-spin"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    @endif
</div>
@endsection

@push('script')
    <script>
        let history_of = document.getElementById('history_of');
        history_of.addEventListener('change', getWorkHistory);

        window.onload = getWorkHistory;
        document.getElementById('delete_screenshot').addEventListener('click', deleteScreenshot);
        
    </script>
@endpush