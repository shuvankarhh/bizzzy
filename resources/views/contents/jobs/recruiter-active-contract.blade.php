@extends('layouts.app')
@section('navbar')
    <x-navbar links="true" />
@endsection
@section('content')
    <div class="container pt-3 pb-3">
        <div class="row">
            <div class="col-2 text-center   ">
                <img class="dp-image" src="{{ asset('storage/' . $contract->freelancer->photo) }}" alt="">
            </div>
            <div class="col-10">
                <p><span style="font-size: 2rem">{{ $contract->freelancer->name }}</span> <span class="ms-4">{{ $contract->job->name }}</span></p>
                <strong class="m-0 p-0">Hired: {{ ($contract->pripayment_type == 1) ? 'fixed-price' : 'hourly' }}, ${{ $contract->price }}</strong>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-2">
                <a href="#">Overview</a>
            </div>
            <div class="col-10">
                <p style="font-size: 1.3rem">Payments</p>
                <hr>
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">Milestone</th>
                        <th scope="col">Amount</th>
                        <th scope="col">Due Date</th>
                        <th scope="col"></th>
                    </tr>
                    </thead>
                    <tbody>
                        @php
                            $relase_fund = false;
                        @endphp
                        @foreach ($contract->milestones as $item)
                            <tr>
                                <td scope="row">{{ $item->name }}</td>
                                <td>{{ $item->deposit_amount }}</td>
                                <td>{{ $item->end_date }}</td>
                                <td>
                                    @if ($item->is_complete == 0 AND !$relase_fund)
                                    <button class="btn btn-success">Release Fund</button>
                                        @php
                                            $relase_fund = true;
                                        @endphp
                                    @elseif ($item->is_complete == 1)
                                        <p>Review Approval</p>
                                    @else
                                        <button class="btn btn-secondary">Edit</button>
                                    @endif
                                </td>
                            </tr>                            
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection