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
                        <input type="text" name="name" id="name" class="form-control" id="formGroupExampleInput"
                            placeholder="Example input placeholder">
                    </div>
                    <div class="mb-3">
                        <label for="formGroupExampleInput2" class="form-label">User Name</label>
                        <input type="text" name="user_name" id="user_name" class="form-control" id="formGroupExampleInput2"
                            placeholder="Another input placeholder">
                    </div>
                    <div class="mb-3">
                        <label for="formGroupExampleInput2" class="form-label">Email</label>
                        <input type="text" name="email" id="email" class="form-control" id="formGroupExampleInput2"
                            placeholder="Another input placeholder">
                    </div>
                    <div class="mb-3">
                        <label for="formGroupExampleInput2" class="form-label">Password</label>
                        <input type="password" id="password" name="password" class="form-control" id="formGroupExampleInput2"
                            placeholder="Another input placeholder">
                    </div>
                    <div class="mb-3">
                        <label for="formGroupExampleInput2" class="form-label">Role</label>
                        <select name="role" id="role" class="form-control">
                            <option value="">None</option>
                            @foreach ($roles as $item)
                                <option value="{{ $item->name }}">{{ $item->name }}</option>
                            @endforeach
                        </select>
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
