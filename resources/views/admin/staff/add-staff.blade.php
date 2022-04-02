@extends('layouts.app')

@section('navbar')
    <x-navbar />
@endsection

@section('content')
    <section>
        <div class="container py-3 h-100">
            <form action="{{ route('staff.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="col-4">
                    <div class="mb-3">
                        <label for="formGroupExampleInput" class="form-label" required>Full Name</label>
                        <input type="text" name="name" class="form-control" id="formGroupExampleInput"
                            placeholder="Example input placeholder">
                    </div>
                    <div class="mb-3">
                        <label for="formGroupExampleInput2" class="form-label">User Name</label>
                        <input type="text" name="user_name" class="form-control" id="formGroupExampleInput2"
                            placeholder="Another input placeholder">
                    </div>
                    <div class="mb-3">
                        <label for="formGroupExampleInput2" class="form-label">Email</label>
                        <input type="text" name="email" class="form-control" id="formGroupExampleInput2"
                            placeholder="Another input placeholder">
                    </div>
                    <div class="mb-3">
                        <label for="formGroupExampleInput2" class="form-label">Password</label>
                        <input type="password" name="password" class="form-control" id="formGroupExampleInput2"
                            placeholder="Another input placeholder">
                    </div>
                    <div class="mb-3">
                        <label for="formGroupExampleInput2" class="form-label">Role</label>
                        <input type="text" name="role" class="form-control" id="formGroupExampleInput2"
                            placeholder="Another input placeholder">
                    </div>
                    <div class="mb-3">
                        <label for="formFile" class="form-label">Photo</label>
                        <input class="form-control" name="photo" type="file" id="formFile">
                    </div>
                    <button class="btn btn-primary btn-lg btn-block" style="  background-color: #0086FF;"
                        type="submit">Create Staff</button>
                </div>


            </form>
        </div>
    </section>
@endsection
