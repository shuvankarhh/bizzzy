@extends('layouts.app')

@section('navbar')
    <x-navbar />
@endsection

@section('content')
<div class="container">
    <h2>Permission to Roles</h2>
    <table class="table align-middle mb-0 bg-white">
        <thead class="bg-light">
            <tr>
                <th>Role Name</th>
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
                        <button onclick="get_permission(this)" data-guard="{{ $item->guard_name }}" data-id="{{ $item->id }}" id="permission_role" data-mdb-toggle="modal" data-mdb-target="#permissions" class="btn btn-primary btn-xs btn-rounded">Show Permissions</button>
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

<div class="modal fade" id="permissions" tabindex="-1" aria-labelledby="permissions_label" aria-hidden="true">
    <div class="modal-dialog">
        <form action="#" id="permission_role_form">
            <input type="hidden" name="role" id="role">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="permissions_label">Permissions</h5>
                    <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
                </div>
                <div id="permissions_body" class="modal-body p-4">
                </div>
                <button class="btn btn-success" style="border-radius: 0">Submit</button>
            </div>
        </form>
    </div>
</div>
@endsection