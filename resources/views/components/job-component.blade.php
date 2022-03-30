<div class="job-card mb-4">
    <section class="upper-content @if ($applied) applied-div @endif pe-0">
        <div class="row pe-0 ">
            @if ($applied) 
                {{--  This section is for mobile view. Will be hidden in large screens.  --}}
                <div class="col-md-1 col-lg-1 col-xl-1 col-xxl-1 col-sm-8 col-8 p-0 d-md-none d-lg-none d-xl-none d-xxl-none"></div>
                <div class="col-md-1 col-lg-1 col-xl-1 col-xxl-1 col-sm-4 col-4 p-0 d-md-none d-lg-none d-xl-none d-xxl-none">
                    <div class="applied text-center">fgfgsdfg
                        <img src="{{ asset('images\icons\job\applied.svg') }}" alt="">
                        Applied
                    </div>                            
                </div>
            @endif
            {{--  This section if also for mobile view. Will be hidden in large screens.  --}}
            <div class="col-md-1 col-lg-1 col-xl-1 col-xxl-1 col-sm-1 col-1 p-0 d-md-none d-lg-none d-xl-none d-xxl-none"></div>
            <div class="col-md-1 col-lg-1 col-xl-1 col-xxl-1 col-sm-11 col-11 p-0 d-md-none d-lg-none d-xl-none d-xxl-none">
                <p class="m-0" style="font-weight: bold">
                    {{--  Tags for Mobile  --}}
                </p>
            </div>

            <div class="col-auto pb-3 pt-3 fit-content">
                <span class="job-avater-span">
                    <img class="job-avater" src="{{ asset('storage/freelancer/profile_photo/1647342535.png') }}" alt="">
                    <img class="job-avater-icon" src="{{ asset('images\icons\job\plus.svg') }}" alt="">
                </span>
            </div>

            <div class="col-md-10 col-lg-10 col-xl-10 col-xxl-10 col-sm-9 col-9 pb-3 pt-3">
                <p class="m-0" style="font-weight: bold">
                    {{ $job->name }}
                    @foreach ($job->tags as $item)
                        <x-dynamic-component :component="'tags.' . $item->tag->name" class="mt-4" />
                    @endforeach
                </p>
                <p class="m-0">{{ $job->recruiter->name }}</p>
            </div>

            @if ($applied)
                {{--  This section is for larger screens. Will be hidden for small display.  --}}
                <div class="ms-lg-auto ms-xl-auto ms-xxl-auto ms-md-none col-md-1 col-lg-auto col-xl-1 col-xxl-1 col-sm-4 col-xs-4 p-0 d-none d-sm-none d-md-block d-lg-block d-xl-block d-xxl-block">
                    <div class="applied text-center">
                        <img src="{{ asset('images\icons\job\applied.svg') }}" alt="">
                        Applied
                    </div>                            
                </div>                
            @endif
        </div>
        <div class="row">
            <div class="col-11">
                <p id="show_text{{ $idx }}" class="m-0">{!! \Illuminate\Support\Str::limit($job->description, 350, $end='....<u onclick="show_full_text(this, '.$idx.')" role="button" class="m-0 job-more-button">more</u>') !!}</p>
                <span class="d-none" id="full_text{{ $idx }}">{{ $job->description }}</span>
            </div>
            <div class="col-11 mt-3">
                <div class="job-tag">
                    @foreach ($job->categories as $item)
                        <div>
                            {{ $item->category->name }}
                        </div>                        
                    @endforeach
                </div>
            </div>
            <div class="col-11 mt-3">
                <div class="flex-text">
                    <div>
                        <img src="{{ asset('images\icons\job\verified-payment.svg') }}" alt="">
                        <p class="ms-2 m-0 bizzzy-color">Payment verified</p>
                    </div>
                    <div>
                        <img src="{{ asset('images\icons\job\full-star.svg') }}" alt="">
                        <img src="{{ asset('images\icons\job\full-star.svg') }}" alt="">
                        <img src="{{ asset('images\icons\job\full-star.svg') }}" alt="">
                        <img src="{{ asset('images\icons\job\full-star.svg') }}" alt="">
                        <img src="{{ asset('images\icons\job\full-star.svg') }}" alt="">
                        <p class="ms-2 m-0 money">$100k+ spent </p>
                    </div>
                    <div>
                        <img src="{{ asset('images\icons\job\location.svg') }}" alt="">
                        <p class="ms-2 m-0">United States </p>
                    </div>
                    <div>
                        <img src="{{ asset('images\icons\job\time.svg') }}" alt="">
                        <p class="ms-2 m-0"> {{ $job->created_at }} </p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="lower-text pt-3 pb-3">                        
        <div class="row justify-content-between">
            <div class="col-md-3 col-lg-3 col-xl-3 col-xxl-3 col-sm-6 col-6 align-self-center">
                @if (!$connect)
                    <div class="flex-text ms-3">
                        <div class="relative">
                            <span class="stack-image">
                                <img class="image-1" src="{{ asset('images\icons\job\temp\one.png') }}" alt="">
                                <img class="image-2" src="{{ asset('images\icons\job\temp\two.png') }}" alt="">
                                <img class="image-3" src="{{ asset('images\icons\job\temp\two.png') }}" alt="">
                            </span>
                        </div>
                        <div>
                            <p class="m-0 bottom-text bizzzy-color">Applied</p>
                        </div>
                    </div>    
                @else
                    <div class="connect-required text-nowrap ">
                        2 connects required
                    </div>
                @endif
            </div>
            <div class="col-6 d-none d-sm-none d-md-block d-lg-block d-xl-block d-xxl-block">
                <div class="row justify-content-center">
                    <div class="col-3 text-center">
                        <p class="m-0 top-text">Budget</p>
                        <p class="m-0 bottom-text">${{ ($job->price_type == '1') ? $job->price : $job->price . '/hr' }}</p>
                    </div>
                    <div class="col-1 align-self-center">
                        <span class="divider"></span>
                    </div>
                    <div class="col-3 text-center">
                        <p class="m-0 top-text">Time</p>
                        <p class="m-0 bottom-text">{{ $job->project_time }}</p>
                    </div>
                    <div class="col-1 align-self-center">
                        <span class="divider"></span>
                    </div>
                    <div class="col-4 text-center">
                        <p class="m-0 top-text text-nowrap">Experience Level</p>
                        <p class="m-0 bottom-text">{{ $job->experience_level }}</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-lg-3 col-xl-3 col-xxl-3 col-sm-6 col-6 align-self-center text-end">
                @if (!$applied AND !$connect AND $job->user_id != auth()->id())
                    <a href="{{ route('job.apply.create', $job->id) }}" role="button" class="btn btn-primary bizzzy-background apply-button">Apply to Job</a>
                @endif
            </div>
        </div>
    </section>
</div>