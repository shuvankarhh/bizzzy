<div class="freelancer-job row">
    <div class="col-sm-5 col-5 col-md-auto">
        {{-- <div>
            <img class="job-thumbnail" src="{{ asset('images/general/porfolio-1.png') }}" alt="">
        </div> --}}
        <div class="d-sm-inline d-inline d-md-none">
            <b>{{$contract->recruiter->name}}</b>
            <p>Netherlands</p>
        </div>
        <div class="d-sm-inline d-inline d-md-none">
            <p><span class="text-black">$30</span> <span>Fixed Price</span></p>
        </div>
    </div>
    <div class="col-sm-7 col-7 col-md">
        <div class="row">
            <div class="col-12">
                <div class="row">
                    <div class="col-auto">
                        <h3>{{$contract->job->name}}</h3>
                    </div>
                    <div class="col align-self-center d-sm-none d-none d-md-inline">
                        @if ($contract->payment_type === 1)                            
                            <p class="m-0"><span class="text-black">${{$contract->price}}</span> <span>Fixed Price</span></p>
                        @else
                            <p class="m-0"><span class="text-black">${{$contract->price}}/hr</span></p>
                        @endif
                    </div>
                </div>
            </div>
            <div class="col-12">
                <p>"{{$contract->job->description}}"</p>
            </div>
            <div class="col-12">
                <div class="row">
                    <div class="col-auto d-sm-none d-none d-md-inline">
                        <img class="job-poster" src="{{ asset('storage/' . $contract->recruiter->photo) }}" alt="">
                    </div>
                    <div class="col-auto d-sm-none d-none d-md-inline">
                        <b>{{$contract->recruiter->name}}</b>
                        <p>Netherlands</p>
                    </div>
                    <div class="col-auto">
                        @if ($contract->contract_status == '7')
                            <div class="row">
                                <div class="col-auto">
                                    <span>
                                        <img src="{{ asset('images/general/full-star.svg') }}" alt="">
                                        <img src="{{ asset('images/general/full-star.svg') }}" alt="">
                                        <img src="{{ asset('images/general/full-star.svg') }}" alt="">
                                        <img src="{{ asset('images/general/full-star.svg') }}" alt="">
                                        <img src="{{ asset('images/general/full-star.svg') }}" alt="">
                                    </span>
                                </div>
                                <div class="col-auto">
                                    <p>5.00</p>
                                </div>
                                <div class="col-auto">
                                    <p>Jan 25, 2022 - Feb 1, 2022</p>
                                </div>
                            </div>
                        @endif                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>