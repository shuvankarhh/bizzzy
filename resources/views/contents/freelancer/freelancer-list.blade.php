@extends('layouts.app')
@section('navbar')
    <x-navbar links="true" />
@endsection
@section('content')
{{-- @dd($searchParam) --}}
<div class="container pt-3 pb-3" style="display: flex; justify-content: center; align-items: center; flex-direction: column">
    <form action="{{ route('freelancer.index') }}" class="w-100" >
        <div style="display: flex; gap: 1rem; justify-content: center">
            <input style="border-radius: 0" type="search" name="search" id="search" class="form-control w-75" placeholder="Search" value="{{ (empty($searchParam)) ? '' : $searchParam['search'] }}">
            <button class="btn"><i class="fas fa-search"></i></button>
        </div>
        <div class="mt-2" id="filters" style="display: flex; justify-content: center; align-items: center; gap: 1rem; ">        
            <select id="category" name="category" onchange="this.form.submit()">
                <option value="">Any Category</option>
                @foreach ($categories as $item)
                    @if ($item->children->isEmpty())
                        @if (!empty($searchParam) AND $item->id == $searchParam['category'])                            
                            <option value="{{ $item->id }}" selected>{{ $item->name }}</option>
                        @else
                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                        @endif
                    @else
                        <optgroup label="{{ $item->name }}">
                            @foreach ($item->children as $child_item)
                                @if (!empty($searchParam) AND $child_item->id == $searchParam['category'])                            
                                    <option value="{{ $child_item->id }}" selected>{{ $child_item->name }}</option>
                                @else
                                    <option value="{{ $child_item->id }}">{{ $child_item->name }}</option>
                                @endif
                            @endforeach
                        </optgroup>
                    @endif
                @endforeach                
            </select>
            <select id="feedback" name="feedback" class="form-control" style="flex: 0 0 250px;" onchange="this.form.submit()">
                <option value="">Any Feedback</option>
                <option value="4.5" {{ (empty($searchParam)) ? '' : ( ($searchParam['feedback'] == '4.5') ? 'selected' : '' ) }}>4.5 & up starts</option>
                <option value="4" {{ (empty($searchParam)) ? '' : ( ($searchParam['feedback'] == '4') ? 'selected' : '' ) }}>4 & up starts</option>
                <option value="3" {{ (empty($searchParam)) ? '' : ( ($searchParam['feedback'] == '3') ? 'selected' : '' ) }}>3 & up starts</option>
                <option value="2" {{ (empty($searchParam)) ? '' : ( ($searchParam['feedback'] == '2') ? 'selected' : '' ) }}>2 & up starts</option>
                <option value="1" {{ (empty($searchParam)) ? '' : ( ($searchParam['feedback'] == '1') ? 'selected' : '' ) }}>1 & up starts</option>
            </select>
            <select id="experience" name="experience" class="form-control" style="flex: 0 0 250px;" onchange="this.form.submit()">
                <option value="">Any Experience</option>
                <option value="1" {{ (empty($searchParam)) ? '' : ( ($searchParam['experience'] == '1') ? 'selected' : '' ) }}>Entry</option>
                <option value="2" {{ (empty($searchParam)) ? '' : ( ($searchParam['experience'] == '2') ? 'selected' : '' ) }}>Intermidiate</option>
                <option value="3" {{ (empty($searchParam)) ? '' : ( ($searchParam['experience'] == '3') ? 'selected' : '' ) }}>Expert</option>
            </select>
            <select id="location" name="location" style="flex: 0 0 250px;">
                <option value="">Any Location</option>
                <x-countries />
            </select>
        </div>
    </form>
    @foreach ($freelancers as $item)
    <div class="card m-3 w-75" onclick="location.href='{{ route('freelancer.show', $item->user->id) }}'" style="cursor: pointer">
        <div class="card-body">
            <div style="display: flex; gap: 1rem">
                <div>
                    <img class="dp-image" src="{{ asset('storage/' . $item->user->photo) }}" alt="">
                    <button class="btn btn-secondary mt-3 ps-2 pe-2" style="font-size: 0.7rem; border-radius: 0"> <i class="fas fa-heart"></i> Save</button>
                </div>
                <div>
                    <p class="m-0">{{ $item->user->name }} ({{ $item->service_categories[0]->name }})</p>
                    <p class="m-0" style="font-size: 1.23rem;">{{ $item->professional_title }} <span style="font-size: 1rem">({{ $item->average_rating }}) ({{ $item->experience_level }})</span> </p>
                    <strong style="font-size: 1rem">{{ is_null($item->user->address) ? '' : $item->user->address->country }}</strong>
                    <p>
                        @foreach ($item->user->skills as $skill)
                            <span class="badge badge-primary">{{ $skill->name }}</span>
                        @endforeach
                    </p>
                    <p class="mt-3">{{ $item->description }}</p>
                </div>
            </div>
        </div>
    </div>
    @endforeach
</div>
@endsection

@push('script')
    <script>
        let skill_select = new TomSelect("#category",{
            create: false,
            allowEmptyOption: true,
        });
        
        let location_select = new TomSelect("#location",{
            create: false,
            allowEmptyOption: true,
        });
        location_select.setValue("{{ (empty($searchParam)) ? '' : $searchParam['location'] }}");
        let search = document.getElementById('search');
        search.addEventListener('search', function (e) {
            if(e.target.value == ''){
                this.form.submit()
            }
            console.log(e.target.value);
        });
    </script>
@endpush