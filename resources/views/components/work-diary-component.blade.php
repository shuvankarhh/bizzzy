@if ($screenshots->isEmpty())
    <h3>No Work Recorded Today</h3>
@else
@php
    $prev = NULL;
    $start_hour = NULL;
@endphp
    @foreach ($screenshots as $idx=>$item)
        @if ($start_hour != $item->created_at->hour)
            @php
                $start_hour = $item->created_at->hour;
            @endphp
            @if (is_null($start_hour))
                <div class="col-12 c-flex work-div" data-time="{{ $item->created_at->format('h a') }}">
            @else
                </div>
                <div class="col-12 c-flex work-div" data-time="{{ $item->created_at->format('h a') }}">
            @endif
        @endif
        <div class="work-history">            
            @if(is_null($prev) OR $prev != $item->time_tracker->id)
                <p class="work-history-memo start m-0 p-0 ps-2"> {{ $item->time_tracker->task_title }} </p>
                @php
                    $prev = $item->time_tracker->id;
                @endphp
            @elseif(isset($screenshots[$idx+1]) AND $prev != $screenshots[$idx+1]->time_tracker->id)
                <p class="work-history-memo end m-0 p-0"></p>
            @else
                <p class="work-history-memo continue m-0 p-0"></p>
            @endif
            <a href="{{ asset("storage/" . $item->image) }}"><img class="work-history-img" src="{{ asset("storage/" . $item->image) }}" alt=""></a>
            <p>{{ $item->created_at->format("h:i a") }}</p>
        </div>
    @endforeach
    </div>
@endif