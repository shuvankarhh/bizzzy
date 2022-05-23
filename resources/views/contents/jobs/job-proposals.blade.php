@extends('layouts.app')
@section('navbar')
<x-navbar links="true" />
@endsection
@section('content')
<section class="container body">
    <!-- Tabs navs -->


    <div class="row justify-content-between">

        <div class="col-auto">
            {{-- {{$job->name}}
            {{$item->pivot->price}} --}}
            <h4 class="card-title" style="color: green"><i class="fa-solid fa-gem"></i> {{ $job->name }}</h4>
        </div>

    </div>
    <section class="job-body">
        <div class="card" style="width: 100%;">
            <div class="card-body">
                <ul class="nav flex-column flex-sm-column flex-md-row flex-lg-row flex-xl-row flex-xxl-row text-center text-xs-center text-md-start nav-tabs mb-3"
                    id="ex1" role="tablist">
                    <li class="nav-item" role="presentation">
                        <a class="nav-link active" id="all_proposal" data-mdb-toggle="tab" href="#all_proposal"
                            role="tab" aria-controls="all_proposal" aria-selected="true">
                            <span class="icon">

                                <span class="text">All Proposal ({{$job->proposals->count()}})</span>
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
                    <div class="tab-pane fade show active" id="all_proposal" role="tabpanel"
                        aria-labelledby="all_proposal">
                        <div class="row mt-4">
                            @foreach ($job->proposals as $item)
                            <div class="col-2">
                                <img class="proposal-img" src="{{ asset('storage/' . $item->photo   ) }}" alt="">
                            </div>
                            <div class="col-10">
                                <div style="display: flex">
                                    <div>
                                        <p style="color: green;margin: 0px">{{$item->name}}</p>
                                        <p style="margin: 0px">{{$item->freelance_profile->professional_title}}</p>
                                        <p style="margin: 0px">{{$item->address->city}}</p>
                                    </div>
                                    <div style="margin-left:450px">
                                       <button type="button" id=""  class="circular-button"><i class="fa-solid fa-thumbs-down"></i></button>
                                       <button type="button" id=""  style="margin-left: 10px" class="circular-button"><i class="fa-solid fa-thumbs-up"></i></button>
                                       <a type="submit" href="" class="btn " style="border-radius: 50px; width:120px; margin-left:30px;color: green;" type="submit">Message</a>
                                        <a type="submit" href="" class="btn btn-success" style="border-radius: 50px;width:120px;margin-left:30px" type="submit">Hire</a>
                                         
                                    </div>
                                   
                                </div>

                                <div class="c-flex f-justify-between pe-4 " style="margin-top: 10px">
                                    <p>{{$item->pivot->price}}</p>
                                    <p>$100</p>
                                    <p>99% success rate</p>
                                    <p>Top Rated</p>
                                </div>
                                <p><i class="fa-solid fa-star"></i> Specializes in Back-End Development</p>
                                <p><strong>Cover letter</strong>- Lorem Ipsum is simply dummy text of the printing and
                                    typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever
                                    since the 1500s, when an unknown printer took a galley of type and scrambled it to
                                    make a type specimen book. </p>
                                <p><strong>Matched because they worked on</strong> 7 jobs similar to this one.</p>
                                <div class="job-tag">
                                    @foreach ($item->skills as $skill)
                                    <div>
                                        {{ $skill->name }}
                                    </div>
                                    @endforeach
                                </div>
                            </div>

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
