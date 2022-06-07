@extends('layouts.app')
@section('navbar')
    <x-navbar links="true" />
@endsection
@section('content')
<input type="hidden" name="contarct" id="contract" value="{{encrypt($contract->id)}}">
<div class="container">
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div style="display: grid;grid-template-columns: auto 1fr; gap: 1rem;align-items: center">
                        <img style="border-radius: 50%" width="120px" src="{{ asset("storage/".$contract->freelancer->photo) }}" alt="">
                        <div>
                            <p style="font-size: 2rem">{{ $contract->freelancer->name }}</p>
                            <p style="font-size: 1.2rem">
                                <span>Hired: <strong>${{ number_format($contract->price,2) }}/hr</strong></span>
                                <span class="ms-5">Weekly limit: <strong>{{ $contract->hours_per_week }}:00 hrs/week</strong></span>
                            </p>
                            <p>Total time tracked science ({{ $lastMonday->format('d M, Y: l') }}): <strong>{{ sprintf("%02d", intdiv($total_time, 60)).':'. sprintf("%02d",($total_time % 60)) }}</strong></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row mt-3">
        <div class="col-auto">
            <label for="history_of">Select Date</label>
            <input type="date" name="history_of" id="history_of" class="form-control" value="{{date('Y-m-d')}}">
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
</div>
@endsection

@push('script')
    <script>
        let history_of = document.getElementById('history_of');
        history_of.addEventListener('change', getWorkHistory);

        window.onload = getWorkHistory;
    </script>
@endpush
