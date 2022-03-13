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
                <p class="main-question" >Tell us about the work you do. What is the main service you offer?</p>
                <p class="main-question-desc" >Relevant experience can help your profile stand out. Choose the categories that best describe the type of work you do so we can show you to the right type of clients in search results.</p>
                                        
                <label class="custom-label mb-2" for="end_date_div">Service</label>
                <select name="category" id="category" class="form-select mb-4" aria-label="Default select example">
                    <option selected>Select a category</option>
                    <option value="1">01</option>
                    <option value="2">02</option>
                    <option value="3">03</option>
                    <option value="4">04</option>
                    <option value="5">05</option>
                    <option value="6">06</option>
                    <option value="7">07</option>
                    <option value="8">08</option>
                    <option value="9">09</option>
                    <option value="10">10</option>
                    <option value="11">11</option>
                    <option value="12">12</option>
                </select>

                <select name="sub_category" id="sub_category" class="form-select" aria-label="Default select example">
                    <option selected>Select a sub category</option>
                    <option value="1">01</option>
                    <option value="2">02</option>
                    <option value="3">03</option>
                    <option value="4">04</option>
                    <option value="5">05</option>
                    <option value="6">06</option>
                    <option value="7">07</option>
                    <option value="8">08</option>
                    <option value="9">09</option>
                    <option value="10">10</option>
                    <option value="11">11</option>
                    <option value="12">12</option>
                </select>

                {{-- <a class="skip" href="#">Skip for now ></a> --}}

            </div>
        </div>

    </div>
    <div class="question-footer">
        <x-question-footer percentage=25/>
        <div class="row justify-content-end">
            <div class="col-md-3 text-end">
                <button onclick="first_working_experience('{{ route('question.twelve') }}')" class="btn btn-bizzzy-success text-nowrap me-3">Next, set your rate </button>
            </div>
        </div>
    </div>
</section>
@endsection