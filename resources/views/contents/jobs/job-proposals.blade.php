@extends('layouts.app')
@section('navbar')
<x-navbar links="true" />
@endsection
@section('content')
<section class="container body">
        <div class="card" style="width: 100%;">
            <div class="card-header">
                <h4 class="card-title" style="color: green"><i class="fa-solid fa-gem"></i> {{ $job->name }}</h4>
            </div>
            <div class="card-body">
                <ul class="nav flex-column flex-sm-column flex-md-row flex-lg-row flex-xl-row flex-xxl-row text-center text-xs-center text-md-start nav-tabs mb-3" id="ex1" role="tablist">
                    <li class="nav-item" role="presentation">
                        <a class="nav-link active" id="all_proposal_tab" data-mdb-toggle="tab" href="#all_proposal"
                            role="tab" aria-controls="all_proposal" aria-selected="true">
                            <span class="icon">
                                <span class="text">All Proposal ({{$job->job_proposals->count()}})</span>
                            </span>
                        </a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a class="nav-link" id="best_match" data-mdb-toggle="tab" href="#best_match_tab" role="tab"
                            aria-controls="best_match" aria-selected="false">
                            <span class="icon">
                                <span class="text"> Shortlisted </span>
                            </span>
                        </a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a class="nav-link" id="hourly" data-mdb-toggle="tab" href="#hourly_tab" role="tab"
                            aria-controls="hourly" aria-selected="false">
                            <span class="icon">

                                <span class="text"> Messaged</span>
                            </span>
                        </a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a class="nav-link" id="fixed_rate" data-mdb-toggle="tab" href="#fixed_rate_tab" role="tab"
                            aria-controls="fixed_rate" aria-selected="false">
                            <span class="icon">
                                <span class="text"> Archived </span>
                            </span>
                        </a>
                    </li>
                </ul>

                <!-- Tabs navs -->

                <!-- Tabs content -->
                <div class="tab-content" id="ex1-content">
                    <div class="tab-pane fade show active" id="all_proposal" role="tabpanel" aria-labelledby="all_proposal">
                        <div class="row mt-4">
                            @foreach ($job->job_proposals as $item)
                                <div class="col-2">
                                    <img class="proposal-img" src="{{ asset('storage/' . $item->user->photo   ) }}" alt="">
                                </div>
                                <div class="col-10">
                                    <div style="display: flex">
                                        <div>
                                            <p style="color: green;margin: 0px">{{$item->user->name}}</p>
                                            <p style="margin: 0px">{{$item->user->freelance_profile->professional_title}}</p>
                                            <p style="margin: 0px">{{$item->user->address->city}}</p>
                                        </div>
                                        <div style="margin-left:450px">
                                            <button type="button" id=""  class="circular-button"><i class="fa-solid fa-thumbs-down"></i></button>
                                            <button type="button" id=""  style="margin-left: 10px" class="circular-button"><i class="fa-solid fa-thumbs-up"></i></button>
                                            <a type="submit" href="" class="btn " style="border-radius: 50px; width:120px; margin-left:30px;color: green;" type="submit">Message</a>
                                            @if (is_null($item->contract_id))
                                                <a type="submit" href="{{ route('job.proposal.show', [encrypt($item->user_id), encrypt($item->job_id)]) }}" class="btn btn-success" style="border-radius: 50px;width:120px;margin-left:30px" type="submit">Hire</a>
                                            @else
                                                <span class="btn" style="border-radius: 50px;width:120px;margin-left:30px">Offer Sent</span>
                                            @endif                                         
                                        </div>
                                    
                                    </div>

                                    <div class="c-flex f-justify-between pe-4 w-75" style="margin-top: 10px">
                                        <p>${{number_format($item->price, 2)}}</p>
                                        <p>$100+ Earned</p>
                                        <p>99% success rate</p>
                                        <p>Top Rated</p>
                                    </div>
                                    <div class="flex-center mt-0" style="justify-content: start">
                                        <div class="outer-star">
                                            <i class="fas fa-star" aria-hidden="true"></i>
                                            <i class="fas fa-star" aria-hidden="true"></i>
                                            <i class="fas fa-star" aria-hidden="true"></i>
                                            <i class="fas fa-star" aria-hidden="true"></i>
                                            <i class="fas fa-star" aria-hidden="true"></i>
                                            <span class="inner-star" style="width: {{ $item->user->freelance_profile->average_rating * 20 }}%">
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                            </span>
                                        </div>
                                        <div>
                                            <p class="m-0 p-0">Specializes in Back-End Development</p>
                                        </div>
                                    </div> 
                                    <p><strong>Cover letter</strong> {{ \Illuminate\Support\Str::limit($item->user->freelance_profile->description, 350, $end='....') }}</p>
                                    <p><strong>Matched because they worked on</strong> 7 jobs similar to this one.</p>
                                    <div class="job-tag">
                                        @foreach ($item->user->skills as $skill)
                                        <div>
                                            {{ $skill->name }}
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                                <hr class="mt-4 mb-4">

                            @endforeach
                        </div>
                    </div>
                    <div class="tab-pane fade" id="best_match_tab" role="tabpanel" aria-labelledby="best_match">

                    </div>
                    <div class="tab-pane fade" id="hourly_tab" role="tabpanel" aria-labelledby="hourly">

                    </div>
                    <div class="tab-pane fade" id="fixed_rate_tab" role="tabpanel" aria-labelledby="fixed_rate">

                    </div>
                </div>

            </div>
        </div>
        <!-- Tabs content -->

</section>


@endsection

@push('script')
<script>
    let saves = document.querySelectorAll(".save");
    saves.forEach(element => {
        element.addEventListener("click", saveJob);
    });

</script>
@endpush
