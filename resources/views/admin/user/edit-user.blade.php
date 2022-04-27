@extends('layouts.app')

@section('navbar')
    <x-navbar />
@endsection

@section('content')
    <section>
        <div class="container py-3 h-100">
            <form action="{{ route('user.update', $user->id) }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="col-4">
                    <div class="mb-3">
                        <label for="formGroupExampleInput" class="form-label" required>Full Name</label>
                        <input type="text" name="name" value="{{ $user->name }}" class="form-control"
                            id="formGroupExampleInput" placeholder="">
                    </div>
                    <div class="mb-3">
                        <label for="formGroupExampleInput2" class="form-label">User Name</label>
                        <input type="text" name="user_name" value="{{ $user->user_name }}" class="form-control"
                            id="formGroupExampleInput2" placeholder="Another input placeholder">
                    </div>
                    <div class="mb-3">
                        <label for="formGroupExampleInput2" class="form-label">Status</label>
                        <input type="text" name="role" value="{{ $user->acting_status }}" class="form-control"
                            id="formGroupExampleInput2" placeholder="Another input placeholder">
                    </div>
                    <div class="mb-3">
                        <label for="formFile" class="form-label">Photo</label>
                        <input class="form-control" name="photo" type="file" id="formFile">
                    </div>
                    <button class="btn btn-primary btn-lg btn-block" style="  background-color: #0086FF;"
                        type="submit">Update
                        User</button>
                </div>


            </form>
        </div>
    </section>
@endsection
