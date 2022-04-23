@extends('layouts.app')

@section('navbar')
    <x-navbar />
@endsection

@section('content')
    <section>
        <div class="container py-3 h-100">
            <h3>Users</h3>
            <table class="table align-middle mb-0 bg-white">
                <thead class="bg-light">
                    <tr>
                        <th>Name</th>
                        <th>User Name</th>
                        <th>Email</th>
                        <th>Active Status</th>
                        <th>Photo</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $item)
                        <tr>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->user_name }}</td>
                            <td>{{ is_null($item->email) ? 'Not Verifired' : $item->email->email }}</td>
                            <td><?php
                            if ($item->acting_status == '1') {
                                echo 'Yes';
                            } else {
                                echo 'No';
                            }
                            ?></td>
                            <td>
                                <img style="" src="{{ asset('storage/' . $item->photo) }}" alt="" srcset="">
                            </td>
                            <td>
                                <form action="{{ route('user.edit', ['id' => $item->id]) }}">
                                    <button type="submit" class="btn btn-link btn-sm btn-rounded">
                                        Edit
                                    </button>
                                </form>
                                <form action="{{ route('user.delete', ['id' => $item->id]) }}">
                                    <button type="submit" class="btn btn-link btn-sm btn-rounded"
                                        onclick="return confirm('Are you sure?')">
                                        Delete
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
