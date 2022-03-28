@extends('layouts.app')
@section('navbar')
    <x-navbar links="true" />
@endsection
@section('content')
<div class="content mt-5 text-center">
    <h4>Add Portfolio</h4>
    <form action="#" id="add_protfolio_form">
        <div class="row justify-content-center">
            <div class="col-5">
                <div class="form-group">
                    <input class="form-control" type="text" name="title" id="title" placeholder="Title">
                    <div class="invalid-reposne" id="title_invalid"></div>
                </div>
                <div class="form-group mt-2">
                    <textarea class="form-control" name="description" id="description" cols="30" rows="3" placeholder="Description"></textarea>
                    <div class="invalid-reposne" id="description_invalid"></div>
                </div>
                <div class="form-group mt-2">
                    <input type="date" name="completion_date" id="completion_date" class="form-control">
                </div>
                <div class="form-group mt-2">
                    <input class="form-control" type="text" name="project_url" id="project_url" placeholder="Project URl">
                </div>
                <div class="form-group mt-2">
                    <input class="form-control-file" type="file" name="project_thumbnail" id="project_thumbnail">
                    <div class="invalid-reposne" id="project_thumbnail_invalid"></div>
                </div>
                <button class="btn btn-success mt-2 mb-2">Submit</button>
            </div>
        </div>
    </form>
</div>
@endsection