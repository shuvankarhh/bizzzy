@extends('layouts.app')
@section('navbar')
    <x-navbar links="true" />
@endsection
@section('content')
<div class="container">
    @forelse ($jobs as $idx=>$item)
        <x-job-component remove="1" :applied="$item->proposals_count" :job="$item" :idx="$idx" />
    @empty
        <div style="display: flex;justify-content: center; align-items: center; flex-direction: column">
            <img width="350px" src="{{ asset('images/icons/empty.svg') }}" alt="">
            <p>No Saved Jobs</p>
        </div>
    @endforelse
</div>
@endsection

@push('script')
    <script>
        let saves = document.querySelectorAll(".remove");
        saves.forEach(element => {
            element.addEventListener("click", removeSavedJobs);
        });
    </script>
@endpush