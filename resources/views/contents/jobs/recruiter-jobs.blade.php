@extends('layouts.app')
@section('navbar')
    <x-navbar links="true" />
@endsection
@section('content')
<div class="container">
    <h2>Recruiter Posted Jobs</h2>
    @foreach ($jobs as $item)
    <div class="card" style="width: 100%;">
  <div class="card-body">
      <div class="row">
          <div class="col-5">
                <h6 class="card-title" style="color: green"><i class="fa-solid fa-gem"></i> {{ $item->name }}</h6>
                <p class="card-subtitle mb-2">Posted {{ $item->created_at }}</p>
                <p class="card-subtitle mb-2">Public - {{ $item->price_type }}</p>
                <p class="card-text" style="color: green">Chat with your Bizzzy Talent Specialist about this job</p>
          </div>
          <div class="col-1">
                <h6 style="margin: 0px">{{ $item->total_proposals  }}</h6>
                <p style="margin: 0px">Proposals</p>
          </div>
          <div class="col-1">
                <h6 style="margin: 0px">5</h6>
                <p style="margin: 0px">Messaged</p>
          </div>
           <div class="col-1">
                <h6 style="margin: 0px">{{$item->contracts->count()}}</h6>
                <p style="margin: 0px">Hired</p>
          </div>
          <div class="col-2" style="text-align: right">
                <a type="submit" href="{{route('recruiter.job.proposal',$item->id)}}" class="btn btn-success" style="border-radius: 50px;" type="submit">View Proposals</a>
          </div>
          <div class="col-1" style="display: flex; justify-content: space-between" >
            <button type="button" id=""  class="circular-button"><i class="fa-solid fa-ellipsis" ></i></button>
               
          </div>
      </div>
    
  </div>
<hr>
  @endforeach
<div style="display: flex;justify-content: end;">{{$jobs->links()}}</div>
</div>


    {{-- @foreach ($jobs as $idx=>$item)
        <x-job-component recruiter="true" :proposals="$item->proposals->count()" :applied="false" :job="$item" :idx="$idx" />
        @foreach ($item->proposals as $proposal_item)
            <div style="cursor: pointer" class="card m-2" onclick="{{ (is_null($proposal_item->pivot->contract_id)) ? '' : "location.href='".route('job.offer.show', [encrypt($proposal_item->pivot->contract_id)])."'"}}">
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
    @endforeach --}}
</div>
@endsection