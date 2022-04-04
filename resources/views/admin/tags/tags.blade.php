@extends('layouts.app')

@section('navbar')
    <x-navbar />
@endsection

@section('content')
<div class="container">
    <table class="table align-middle mb-0 bg-white">
        <thead class="bg-light">
            <tr>
                <th>Name</th>
                <th>Addded On</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($tags as $item)
                <tr>
                    <td>{{ $item->name }}</td>
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