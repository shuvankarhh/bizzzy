@extends('layouts.app')

@section('navbar')
    <x-navbar />
@endsection

@section('content')
    <section>
        <div class="container py-3 h-100">
            <h3>Staffs</h3>
            <table class="table align-middle mb-0 bg-white">
                <thead class="bg-light">
                    <tr>
                        <th>Name</th>
                        <th>User Name</th>
                        <th>Status</th>
                        <th>Role</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($lists as $item)
                        <tr>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->user_name }}</td>
                            <td>{{ $item->acting_status }}</td>
                            <td>
                                @foreach ($item->roles as $item)
                                    <span class="badge badge-primary">{{ $item->name }}</span>
                                @endforeach
                            </td>
                            <td>
                                <form action="{{ route('staff.edit', ['id' => $item->id]) }}">
                                    <button type="submit" class="btn btn-link btn-sm btn-rounded">
                                        Edit
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach


                </tbody>
            </table>
        </div>
    </section>
@endsection
