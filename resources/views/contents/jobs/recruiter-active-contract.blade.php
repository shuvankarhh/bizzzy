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
                <p class="mb-0 pb-0"><span style="font-size: 2rem">{{ $contract->freelancer->name }}</span></p>
                <p>{{ $contract->job->name }}</p>
                <strong class="m-0 p-0">Hired: {{ ($contract->payment_type == 1) ? 'Fixed Price' : 'Hourly' }}, ${{ $contract->price }}</strong>
            </div>
        </div>
        <hr>
        <div style="display: grid; grid-template-columns: repeat(4, 1fr)">
            <div>
                <h5>Budget</h5>
                <p class="m-0 p-0" style="font-size: 1.234rem; color: black">${{ $contract->price }}</p>
            </div>
            <div>
                <h5>In Escrow</h5>
                <p class="m-0 p-0" style="font-size: 1.234rem; color: black">${{ $contract->milestone_security_balance }}</p>
            </div>
            <div>
                <h5>Milestone Paid</h5>
                <p class="m-0 p-0" style="font-size: 1.234rem; color: black">$0.00</p>
            </div>
            <div>
                <h5>Remaining</h5>
                <p class="m-0 p-0" style="font-size: 1.234rem; color: black">${{ $contract->price }}</p>
            </div>
            {{-- <div>
                <h5>Total Payments</h5>
                <p class="m-0 p-0" style="font-size: 1.234rem; color: black">${{ $contract->price }}</p>
            </div> --}}
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
                            $relase_fund_button = false;
                        @endphp
                        @foreach ($contract->milestones as $item)
                            <tr>
                                <td scope="row">{{ $item->name }}</td>
                                <td>${{ $item->deposit_amount }}</td>
                                <td>{{ $item->end_date }}</td>
                                <td>
                                    @if ($item->is_complete == 0 AND !$relase_fund_button)
                                        <button data-mdb-target="#pay_milestone" data-mdb-toggle="modal" data-milestone="{{ encrypt($item->id) }}" id="release_fund" class="btn btn-success">Release Fund</button>
                                        {{-- <form action="{{ route('contract.milestone.update', encrypt($item->id)) }}" method="post">
                                            @csrf
                                        </form> --}}
                                        @php
                                            $relase_fund_button = true;
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
                @if (!$relase_fund_button)
                    <a href="{{ route('recruiter.end.contract.create', encrypt($contract->id)) }}" class="btn btn-primary">End Contract</a> 
                @endif
                <button class="btn btn-success"><i class="fas fa-plus"></i> Add New Milestone</button>
            </div>
        </div>
    </div>
    
    <div class="modal fade" id="pay_milestone" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Approve & Pay</h5>
                    <button
                        type="button"
                        class="btn-close"
                        data-mdb-dismiss="modal"
                        aria-label="Close"
                    ></button>
                </div>
                <div class="modal-body p-4" id="pay_milestone_body">
                </div>
            </div>
        </div>
    </div>
@endsection