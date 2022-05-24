@extends('layouts.app')
@section('navbar')
    <x-navbar links="true" />
@endsection
@section('content')
<div class="container">
    <h2>Recruiter Posted Jobs</h2>
    <div class="card" style="width: 100%;">
        @foreach ($jobs as $item)
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
            @if (!$loop->last)
            <hr>
            @endif
        @endforeach
        <div class="c-flex f-justify-end mt-3">{{$jobs->links()}}</div>
    </div>
</div>
@endsection