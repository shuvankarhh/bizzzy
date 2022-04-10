@extends('layouts.app')
@section('navbar')
    <x-navbar links="true" />
@endsection
@section('content')
<div class="container">
    <h2>Recruiter Posted Jobs</h2>
    @foreach ($jobs as $idx=>$item)
        <x-job-component :applied="false" :job="$item" :idx="$idx" />
        @foreach ($item->proposals as $proposal_item)
            <div class="card m-2">
                <div class="card-body">
                    <div class="row">
                        <div class="col-6">
                            <p class="m-0 p-0"> {{ $proposal_item->name }} </p>
                            <p class="m-0 p-0"> ${{ (int)$proposal_item->pivot->price }} </p>
                            <p class="m-0 p-0"> {{ $proposal_item->pivot->description }} </p>
                        </div>
                        <div class="col-6 text-end align-self-center">
                            @if (is_null($proposal_item->pivot->contract_id))
                                <a role="button" href="{{ route('job.proposal.show', [encrypt($proposal_item->pivot->user_id), encrypt($proposal_item->pivot->job_id)]) }}" class="btn btn-primary">Accept Proposal</a>
                            @else
                                <span class="badge badge-success">Offer Sent</span>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    @endforeach
</div>
@endsection