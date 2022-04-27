@extends('layouts.app')

@section('navbar')
    <x-navbar />
@endsection

@section('content')
    <section>
        <div class="container py-3 h-100">
            <form action="{{ route('job.update', $job->id) }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="col-4">
                    <div class="mb-3">
                        <label for="formGroupExampleInput" class="form-label" required>Job Name</label>
                        <input type="text" name="name" value="{{ $job->name }}" class="form-control"
                            id="formGroupExampleInput" placeholder="">
                    </div>
                    <div class="mb-3">
                        <label for="formGroupExampleInput2" class="form-label">Job Description</label>
                        <input type="text" name="description" value="{{ $job->description }}" class="form-control"
                            id="formGroupExampleInput2" placeholder="Another input placeholder">
                    </div>
                    <div class="mb-3">
                        <label for="formGroupExampleInput2" class="form-label">Job Visibility</label>
                        <select class="form-select" name="job_visibility" aria-label="Default select example">
                            <option value="1" {{ $job->job_visibility == 'Private' ? 'selected' : '' }}>Private</option>
                            <option value="2" {{ $job->job_visibility == 'Public' ? 'selected' : '' }}>Public</option>
                            <option value="3" {{ $job->job_visibility == 'This App Users Only' ? 'selected' : '' }}>This
                                App Users Only
                            </option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="formGroupExampleInput2" class="form-label">Project Time</label>
                        <select class="form-select" name="project_time" aria-label="Default select example">
                            <option value="1" {{ $job->project_time == 'Less than 1 month' ? 'selected' : '' }}>Less than
                                1 Month
                            </option>
                            <option value="2" {{ $job->project_time == '1 to 3 months' ? 'selected' : '' }}>1 to 3 Months
                            </option>
                            <option value="3" {{ $job->project_time == '3 to 6 months' ? 'selected' : '' }}>3 to 6 Months
                            </option>
                            <option value="4" {{ $job->project_time == 'More than 6 months' ? 'selected' : '' }}>More
                                than 6 Months
                            </option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="formGroupExampleInput2" class="form-label">Project Type</label>
                        <select class="form-select" name="project_type" aria-label="Default select example">
                            <option value="1" {{ $job->project_type == 'One-time project' ? 'selected' : '' }}>One-time
                                project</option>
                            <option value="2" {{ $job->project_type == 'Ongoing project' ? 'selected' : '' }}>Ongoing
                                project</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="formGroupExampleInput2" class="form-label">Experience Level</label>
                        <select class="form-select" name="experience_level" aria-label="Default select example">
                            <option value="1" {{ $job->experience_level == 'Entry' ? 'selected' : '' }}>Entry</option>
                            <option value="2" {{ $job->experience_level == 'Intermediate' ? 'selected' : '' }}>
                                Intermediate
                            </option>
                            <option value="3" {{ $job->experience_level == 'Expert' ? 'selected' : '' }}>Expert</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="formGroupExampleInput2" class="form-label">Price Type</label>
                        <select class="form-select" name="price_type" aria-label="Default select example">
                            <option {{ $job->price_type == 'Fixed' ? 'selected' : '' }}>Fixed</option>
                            <option {{ $job->price_type == 'Hourly' ? 'selected' : '' }}>Hourly</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="formGroupExampleInput2" class="form-label">Price</label>
                        <input type="text" name="price" value="{{ $job->price }}" class="form-control"
                            id="formGroupExampleInput2" placeholder="Another input placeholder">
                    </div>
                    <button class="btn btn-primary btn-lg btn-block" style="  background-color: #0086FF;"
                        type="submit">Update
                        Job</button>
                </div>


            </form>
        </div>
    </section>
@endsection
