@extends('layouts.app')

@section('navbar')
    <x-navbar />
@endsection

@section('content')
<div class="container">
    <h2>Roles</h2>
    <div class="row justify-content-center mb-3">
        <div class="col-6">
            <form action="{{ route('role.store') }}" method="POST">
                @csrf
                <div class="card">
                    <h5 class="pt-2 ps-2">Add Role</h5>
                    <div class="card-body row jus">
                        <div class="col">
                            <input type="text" name="role_name" id="role_name" class="form-control" placeholder="Role Name">
                        </div>
                        <div class="col">
                            <select class="form-control" name="guard" id="guard">
                                <option value="admin">Admin</option>
                                <option value="staff">Staff</option>
                            </select>
                        </div>
                        <div class="col-auto">
                            <button class="btn btn-success">Submit</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <table class="table align-middle mb-0 bg-white">
        <thead class="bg-light">
            <tr>
                <th>Name</th>
                <th>Guard</th>
                <th>Addded On</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($roles as $item)
                <tr>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->guard_name }}</td>
                    <td>{{ $item->created_at->format('M d, Y') }}</td>
                    <td>
                        <span class="badge badge-primary">Active</span>
                    </td>
                    <td>
                        {{-- <form action="{{ route('staff.edit', ['id' => $item->id]) }}">
                            <button type="submit" class="btn btn-link btn-sm btn-rounded">
                                Edit
                            </button>
                        </form> --}}
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection