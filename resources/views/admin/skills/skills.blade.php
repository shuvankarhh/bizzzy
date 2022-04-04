@extends('layouts.app')

@section('navbar')
    <x-navbar />
@endsection

@section('content')
<div class="container pt-3">
    <div class="row justify-content-center mb-3">
        <div class="col-auto">
            <form action="{{ route('user.skill.store') }}" method="POST">
                @csrf
                <div class="card">
                    <h5 class="pt-2 ps-2">Add Skill</h5>
                    <div class="card-body row">
                        <div class="col-8">
                            <input type="text" name="skill" id="skill" class="form-control" placeholder="Skill">
                        </div>
                        <div class="col">
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
                <th>Addded On</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($skills as $item)
                <tr>
                    <td>
                        <form action="{{ route('skill.update', $item->id) }}" method="post">
                            @csrf
                            <input type="hidden" name="_method" value="patch">
                            <input style="border: 0" class="form-control" type="text" name="updated_name" id="updated_name" value="{{ $item->name }}">
                        </form>
                    </td>
                    <td>{{ $item->created_at->format('M d, Y') }}</td>
                    <td>
                        <span class="badge badge-primary">Active</span>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <div class="row justify-content-end mt-1">
        <div class="col-auto">
            {{ $skills->links() }}
        </div>
    </div>
</div>
@endsection