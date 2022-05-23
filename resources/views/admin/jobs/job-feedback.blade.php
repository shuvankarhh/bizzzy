<h3>{{ $contract->job->name }}</h3>
<hr>
@if (is_null($contract->client_private_feedback_rating))
    <p>No Feedback Given</p>
@else
    <p class="mb-0" style="font-size: 1.2rem">Client Feedback:</p>
    <div class="flex-center" style="justify-content: start">
        <div class="outer-star">
            <i class="fas fa-star" aria-hidden="true"></i>
            <i class="fas fa-star" aria-hidden="true"></i>
            <i class="fas fa-star" aria-hidden="true"></i>
            <i class="fas fa-star" aria-hidden="true"></i>
            <i class="fas fa-star" aria-hidden="true"></i>
            <span class="inner-star" style="width: {{ $contract->client_public_feedback_rating * 20 }}%">
                {{-- <img src="{{ asset('images/general/full-star.svg') }}" alt="">
                <img src="{{ asset('images/general/full-star.svg') }}" alt="">
                <img src="{{ asset('images/general/full-star.svg') }}" alt="">
                <img src="{{ asset('images/general/full-star.svg') }}" alt="">
                <img src="{{ asset('images/general/full-star.svg') }}" alt=""> --}}
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
            </span>
        </div>
        <div class="flex-center">
            <p class="m-0 p-0 font-weight-bold">{{ number_format($contract->client_public_feedback_rating, 2) }}</p>
            {{-- <p class="m-0 p-0">Jan 25, 2022 - Feb 1, 2022</p> --}}
        </div>
    </div>
    <p class="mb-0">Comment: "{{ $contract->client_public_feedback_comment }}"</p>
    <hr>
    <p class="mb-0" style="font-size: 1.2rem">Overall Feedback:</p>
    @foreach ($contract->feedback as $item)
        @if ($item->user_id == $contract->created_by_user)
            <div class="grid-center">
                <p class="m-0 font-weight-bold">Skills</p>
                <div class="outer-star">
                    <i class="fas fa-star" aria-hidden="true"></i>
                    <i class="fas fa-star" aria-hidden="true"></i>
                    <i class="fas fa-star" aria-hidden="true"></i>
                    <i class="fas fa-star" aria-hidden="true"></i>
                    <i class="fas fa-star" aria-hidden="true"></i>
                    <span class="inner-star" style="width: {{ $item->feedback_one * 20 }}%">
                        {{-- <img src="{{ asset('images/general/full-star.svg') }}" alt="">
                        <img src="{{ asset('images/general/full-star.svg') }}" alt="">
                        <img src="{{ asset('images/general/full-star.svg') }}" alt="">
                        <img src="{{ asset('images/general/full-star.svg') }}" alt="">
                        <img src="{{ asset('images/general/full-star.svg') }}" alt=""> --}}
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </span>
                </div>
                <div class="flex-center">
                    <p class="m-0 p-0 font-weight-bold">{{ number_format($item->feedback_one, 2) }}</p>
                    {{-- <p class="m-0 p-0">Jan 25, 2022 - Feb 1, 2022</p> --}}
                </div>
            </div>
            <div class="grid-center">
                <p class="m-0 font-weight-bold">Quality of Work</p>
                <div class="outer-star">
                    <i class="fas fa-star" aria-hidden="true"></i>
                    <i class="fas fa-star" aria-hidden="true"></i>
                    <i class="fas fa-star" aria-hidden="true"></i>
                    <i class="fas fa-star" aria-hidden="true"></i>
                    <i class="fas fa-star" aria-hidden="true"></i>
                    <span class="inner-star" style="width: {{ $item->feedback_two * 20 }}%">
                        {{-- <img src="{{ asset('images/general/full-star.svg') }}" alt="">
                        <img src="{{ asset('images/general/full-star.svg') }}" alt="">
                        <img src="{{ asset('images/general/full-star.svg') }}" alt="">
                        <img src="{{ asset('images/general/full-star.svg') }}" alt="">
                        <img src="{{ asset('images/general/full-star.svg') }}" alt=""> --}}
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </span>
                </div>
                <div class="flex-center">
                    <p class="m-0 p-0 font-weight-bold">{{ number_format($item->feedback_two, 2) }}</p>
                    {{-- <p class="m-0 p-0">Jan 25, 2022 - Feb 1, 2022</p> --}}
                </div>
            </div>
            <div class="grid-center">
                <p class="m-0 font-weight-bold">Availability</p>
                <div class="outer-star">
                    <i class="fas fa-star" aria-hidden="true"></i>
                    <i class="fas fa-star" aria-hidden="true"></i>
                    <i class="fas fa-star" aria-hidden="true"></i>
                    <i class="fas fa-star" aria-hidden="true"></i>
                    <i class="fas fa-star" aria-hidden="true"></i>
                    <span class="inner-star" style="width: {{ $item->feedback_three * 20 }}%">
                        {{-- <img src="{{ asset('images/general/full-star.svg') }}" alt="">
                        <img src="{{ asset('images/general/full-star.svg') }}" alt="">
                        <img src="{{ asset('images/general/full-star.svg') }}" alt="">
                        <img src="{{ asset('images/general/full-star.svg') }}" alt="">
                        <img src="{{ asset('images/general/full-star.svg') }}" alt=""> --}}
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </span>
                </div>
                <div class="flex-center">
                    <p class="m-0 p-0 font-weight-bold">{{ number_format($item->feedback_three, 2) }}</p>
                    {{-- <p class="m-0 p-0">Jan 25, 2022 - Feb 1, 2022</p> --}}
                </div>
            </div>
            <div class="grid-center">
                <p class="m-0 font-weight-bold">Adherence to schedule</p>
                <div class="outer-star">
                    <i class="fas fa-star" aria-hidden="true"></i>
                    <i class="fas fa-star" aria-hidden="true"></i>
                    <i class="fas fa-star" aria-hidden="true"></i>
                    <i class="fas fa-star" aria-hidden="true"></i>
                    <i class="fas fa-star" aria-hidden="true"></i>
                    <span class="inner-star" style="width: {{ $item->feedback_four * 20 }}%">
                        {{-- <img src="{{ asset('images/general/full-star.svg') }}" alt="">
                        <img src="{{ asset('images/general/full-star.svg') }}" alt="">
                        <img src="{{ asset('images/general/full-star.svg') }}" alt="">
                        <img src="{{ asset('images/general/full-star.svg') }}" alt="">
                        <img src="{{ asset('images/general/full-star.svg') }}" alt=""> --}}
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </span>
                </div>
                <div class="flex-center">
                    <p class="m-0 p-0 font-weight-bold">{{ number_format($item->feedback_four, 2) }}</p>
                    {{-- <p class="m-0 p-0">Jan 25, 2022 - Feb 1, 2022</p> --}}
                </div>
            </div>
            <div class="grid-center">
                <p class="m-0 font-weight-bold">Communication</p>
                <div class="outer-star">
                    <i class="fas fa-star" aria-hidden="true"></i>
                    <i class="fas fa-star" aria-hidden="true"></i>
                    <i class="fas fa-star" aria-hidden="true"></i>
                    <i class="fas fa-star" aria-hidden="true"></i>
                    <i class="fas fa-star" aria-hidden="true"></i>
                    <span class="inner-star" style="width: {{ $item->feedback_five * 20 }}%">
                        {{-- <img src="{{ asset('images/general/full-star.svg') }}" alt="">
                        <img src="{{ asset('images/general/full-star.svg') }}" alt="">
                        <img src="{{ asset('images/general/full-star.svg') }}" alt="">
                        <img src="{{ asset('images/general/full-star.svg') }}" alt="">
                        <img src="{{ asset('images/general/full-star.svg') }}" alt=""> --}}
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </span>
                </div>
                <div class="flex-center">
                    <p class="m-0 p-0 font-weight-bold">{{ number_format($item->feedback_five, 2) }}</p>
                    {{-- <p class="m-0 p-0">Jan 25, 2022 - Feb 1, 2022</p> --}}
                </div>
            </div>
            <div class="grid-center">
                <p class="m-0 font-weight-bold">Cooperation</p>
                <div class="outer-star">
                    <i class="fas fa-star" aria-hidden="true"></i>
                    <i class="fas fa-star" aria-hidden="true"></i>
                    <i class="fas fa-star" aria-hidden="true"></i>
                    <i class="fas fa-star" aria-hidden="true"></i>
                    <i class="fas fa-star" aria-hidden="true"></i>
                    <span class="inner-star" style="width: {{ $item->feedback_six * 20 }}%">
                        {{-- <img src="{{ asset('images/general/full-star.svg') }}" alt="">
                        <img src="{{ asset('images/general/full-star.svg') }}" alt="">
                        <img src="{{ asset('images/general/full-star.svg') }}" alt="">
                        <img src="{{ asset('images/general/full-star.svg') }}" alt="">
                        <img src="{{ asset('images/general/full-star.svg') }}" alt=""> --}}
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </span>
                </div>
                <div class="flex-center">
                    <p class="m-0 p-0 font-weight-bold">{{ number_format($item->feedback_six, 2) }}</p>
                    {{-- <p class="m-0 p-0">Jan 25, 2022 - Feb 1, 2022</p> --}}
                </div>
            </div>
        @endif
    @endforeach
@endif
<hr>
<p class="mb-0" style="font-size: 1.2rem">Freelancer feedback to client</p>
@if (!is_null($contract->freelancer_private_feedback_rating))
    <div class="flex-center" style="justify-content: start">
        <p class="m-0 font-weight-bold">Cooperation</p>
        <div class="outer-star">
            <i class="fas fa-star" aria-hidden="true"></i>
            <i class="fas fa-star" aria-hidden="true"></i>
            <i class="fas fa-star" aria-hidden="true"></i>
            <i class="fas fa-star" aria-hidden="true"></i>
            <i class="fas fa-star" aria-hidden="true"></i>
            <span class="inner-star" style="width: {{ $contract->freelancer_public_feedback_rating * 20 }}%">
                {{-- <img src="{{ asset('images/general/full-star.svg') }}" alt="">
                <img src="{{ asset('images/general/full-star.svg') }}" alt="">
                <img src="{{ asset('images/general/full-star.svg') }}" alt="">
                <img src="{{ asset('images/general/full-star.svg') }}" alt="">
                <img src="{{ asset('images/general/full-star.svg') }}" alt=""> --}}
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
            </span>
        </div>
        <div class="flex-center">
            <p class="m-0 p-0 font-weight-bold">{{ number_format($contract->freelancer_public_feedback_rating, 2) }}
            </p>
            {{-- <p class="m-0 p-0">Jan 25, 2022 - Feb 1, 2022</p> --}}
        </div>
    </div>
    <p>Comment: "{{ $contract->freelancer_public_feedback_comment }}"</p>
@else
    <p>No Feedback</p>
@endif
{{-- <p class="mb-0" style="font-size: 1.2rem">Job Description</p>
@if ($contract->job->job_visibility == '1')
    <p>Job Visibility Private</p>
@else
    
@endif --}}

<hr>
<p class="mb-0" style="font-size: 1.2rem">Freelancer private feedback to client</p>
@if (!is_null($contract->freelancer_private_feedback_rating))
    <div class="flex-center" style="justify-content: start">
        <p class="m-0 font-weight-bold">Cooperation</p>
        <div class="outer-star">
            <i class="fas fa-star" aria-hidden="true"></i>
            <i class="fas fa-star" aria-hidden="true"></i>
            <i class="fas fa-star" aria-hidden="true"></i>
            <i class="fas fa-star" aria-hidden="true"></i>
            <i class="fas fa-star" aria-hidden="true"></i>
            <span class="inner-star" style="width: {{ $contract->freelancer_private_feedback_rating * 20 }}%">
                {{-- <img src="{{ asset('images/general/full-star.svg') }}" alt="">
                <img src="{{ asset('images/general/full-star.svg') }}" alt="">
                <img src="{{ asset('images/general/full-star.svg') }}" alt="">
                <img src="{{ asset('images/general/full-star.svg') }}" alt="">
                <img src="{{ asset('images/general/full-star.svg') }}" alt=""> --}}
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
            </span>
        </div>
        <div class="flex-center">
            <p class="m-0 p-0 font-weight-bold">
                {{ number_format($contract->freelancer_private_feedback_rating, 2) }}
            </p>
            {{-- <p class="m-0 p-0">Jan 25, 2022 - Feb 1, 2022</p> --}}
        </div>
    </div>
@else
    <p>No Feedback</p>
@endif

<hr>
<p class="mb-0" style="font-size: 1.2rem">client private feedback to Freelancer</p>
@if (!is_null($contract->freelancer_private_feedback_rating))
    <div class="flex-center" style="justify-content: start">
        <p class="m-0 font-weight-bold">Cooperation</p>
        <div class="outer-star">
            <i class="fas fa-star" aria-hidden="true"></i>
            <i class="fas fa-star" aria-hidden="true"></i>
            <i class="fas fa-star" aria-hidden="true"></i>
            <i class="fas fa-star" aria-hidden="true"></i>
            <i class="fas fa-star" aria-hidden="true"></i>
            <span class="inner-star" style="width: {{ $contract->client_private_feedback_rating * 20 }}%">
                {{-- <img src="{{ asset('images/general/full-star.svg') }}" alt="">
                <img src="{{ asset('images/general/full-star.svg') }}" alt="">
                <img src="{{ asset('images/general/full-star.svg') }}" alt="">
                <img src="{{ asset('images/general/full-star.svg') }}" alt="">
                <img src="{{ asset('images/general/full-star.svg') }}" alt=""> --}}
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
            </span>
        </div>
        <div class="flex-center">
            <p class="m-0 p-0 font-weight-bold">{{ number_format($contract->client_private_feedback_rating, 2) }}
            </p>
            {{-- <p class="m-0 p-0">Jan 25, 2022 - Feb 1, 2022</p> --}}
        </div>
    </div>
@else
    <p>No Feedback</p>
@endif
