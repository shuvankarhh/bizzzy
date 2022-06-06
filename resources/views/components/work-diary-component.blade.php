@if ($screenshots->isEmpty())
    <h3>No Work Recorded Today</h3>
@else
@php
    $prev = NULL;
    $start_hour = NULL;
    $start_hour_counter = NULL;
    $minutes = $screenshots->sum('screenshot_duration');
@endphp
    <h3>Total time tracked: {{ sprintf("%02d", intdiv($minutes, 60)).':'. ($minutes % 60) }}</h3>
    @foreach ($screenshots as $idx=>$item)
        {{-- This is the col-12 for each hour! --}}
        @if ($start_hour != $item->created_at->hour)            
            {{-- null start_hour means this is the first iteration. So only a div is created. For consecutive iterations first div and closed and new col-12 is created. --}}
            {{-- $start_hour_counter will be incremented every iteration to see if any consecutive hour is missing! When start_hour is null start_hour_counter is initialized and for other iterations it is only increamented if hour changes!  --}}
            @if (is_null($start_hour))
                <div class="col-12 c-flex work-div" data-time="{{ $item->created_at->format('h a') }}">
                @php
                    $start_hour_counter = $item->created_at;
                @endphp
            @else            
                @php
                    $start_hour_counter->addHour();
                    if($start_hour_counter->hour < $item->created_at->hour){
                        echo '</div> <div class="col-12 c-flex work-div" data-time="'.$start_hour_counter->format('h a').'">';
                    }
                @endphp
                </div>
                <div class="col-12 c-flex work-div" data-time="{{ $item->created_at->format('h a') }}">
            @endif
            @php
                $start_hour = $item->created_at->hour;
            @endphp
        @endif
        <div class="work-history">            
            @if(is_null($prev) OR $prev != $item->time_tracker->id)
                <p class="work-history-memo start m-0 p-0 ps-2"> {{ $item->time_tracker->task_title }} </p>
                <a href="{{ asset("storage/" . $item->image) }}"><img class="work-history-img start" src="{{ asset("storage/" . $item->image) }}" alt=""></a>
                @php
                    $prev = $item->time_tracker->id;
                @endphp
            @elseif(isset($screenshots[$idx+1]) AND $prev != $screenshots[$idx+1]->time_tracker->id)
                <p class="work-history-memo end m-0 p-0"></p>
                <a href="{{ asset("storage/" . $item->image) }}"><img class="work-history-img end" src="{{ asset("storage/" . $item->image) }}" alt=""></a>
            @else
                <p class="work-history-memo continue m-0 p-0"></p>
                <a href="{{ asset("storage/" . $item->image) }}"><img class="work-history-img continue" src="{{ asset("storage/" . $item->image) }}" alt=""></a>
            @endif
            <div class="form-check mt-1">
                <input class="form-check-input" type="checkbox" value="{{ $item->id }}" id="screenshot.{{ $idx }}" name="screenshot[]" />
                <label class="form-check-label" for="screenshot.{{ $idx }}">{{ $item->created_at->format("h:i a") }}</label>
            </div>
        </div>
    @endforeach
    </div>
@endif