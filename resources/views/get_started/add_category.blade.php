@extends('layouts.app')

@section('navbar')
<x-navbar links="false"/>
@endsection

@section('content')
<section class="question">
    <div class="container mt-5 py-3 h-100">
        <div class="row">
            <div class="col-md-1 col-lg-1 col-xl-1 col-sm-3 d-none d-sm-none d-md-block">
                <a>Prev</a>
            </div>
            <div class=" col-md-6 col-lg-6 col-xl-6 col-sm-12 col-xs-12">   
                <form action="#" id="category_form">
                    <p class="main-question" >Tell us about the work you do. What is the main service you offer?</p>
                    <p class="main-question-desc" >Relevant experience can help your profile stand out. Choose the categories that best describe the type of work you do so we can show you to the right type of clients in search results.</p>
                                            
                    <label class="custom-label mb-2" for="end_date_div">Service</label>
                    <select name="category" id="category" class="form-select" aria-label="Default select example">
                        <option selected value="">Select a category</option>
                        @foreach ($categories as $item)
                            @if ($item->id == $selected_category)                            
                                <option value="{{ $item->id }}" selected>{{ $item->name }}</option>
                            @else
                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                            @endif
                        @endforeach
                    </select>
                    <div id="category_invalid" class="invalid-feedback"></div>

                    <select name="sub_category" id="sub_category" class="form-select mt-4" aria-label="Default select example">
                        @if (is_null($sub_categories))
                            <option selected>Select a category first</option>
                        @else
                            @foreach ($sub_categories as $item)
                                @if ($item->id == $selected_category)                            
                                    <option value="{{ $item->id }}" selected>{{ $item->name }}</option>
                                @else
                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                @endif
                            @endforeach
                        @endif
                    </select>

                    {{-- <a class="skip" href="#">Skip for now ></a> --}}

                </form>
            </div>
        </div>

    </div>
    <div class="question-footer">
        <x-question-footer percentage=25/>
        <div class="row justify-content-end">
            <div class="col-md-3 text-end">
                <button onclick="add_category()" class="btn btn-bizzzy-success text-nowrap me-3">Next, set your rate </button>
            </div>
        </div>
    </div>
</section>
@endsection

@push('script')
<script>
    const category = document.getElementById('category');
    category.addEventListener('change', () => {
        axios.get(APP_URL + `/category/sub-category/${category.value}`)
        .then(function (response) {
            document.getElementById('sub_category').innerHTML = response.data;
        })
        .catch(function (error) {
            console.log(error);
        })
    })
</script>
@endpush