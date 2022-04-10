@extends('layouts.app')

@section('navbar')
    <x-navbar />
@endsection

@section('content')
    <div class="container pt-3">        
        <div class="row justify-content-center mb-3">
            <div class="col-8">
                <form action="{{ route('category.store') }}" method="POST">
                    @csrf
                    <div class="card">
                        <h5 class="pt-2 ps-2">Add Category</h5>
                        <div class="card-body row">
                            <div class="col-4">
                                <select name="parent" id="parent" class="form-control">
                                    <option value="">None</option>
                                    @foreach ($categories as $item)
                                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-4">
                                <input type="text" name="category" id="category" class="form-control" placeholder="Category Name">
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
                @foreach ($categories as $item)
                    @if ($item->parent_category_id != '0')
                        @continue
                    @endif
                    <tr>
                        <td> 
                            <form action="{{ route('category.update', $item->id) }}" method="post">
                                @csrf
                                <input type="hidden" name="_method" value="patch">
                                <input style="border: 0" class="form-control" type="text" name="updated_name" id="updated_name" value="{{ $item->name }}">
                            </form>
                        </td>
                        <td>{{ $item->created_at->format('M d, Y') }}</td>
                        <td>
                            <span class="badge badge-primary">Active</span>
                        </td>
                        @if (!$item->children->isEmpty())
                            {{-- <table class="table align-middle mb-0 bg-white">
                                <thead class="bg-light">
                                    <tr>
                                        <th>Name</th>
                                        <th>Addded On</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody> --}}
                                    @foreach ($item->children as $child_item)
                                        <tr style="background-color: #fceecf;">
                                            <td class="ps-5 w-50">
                                                <form action="{{ route('category.update', $child_item->id) }}" method="post">
                                                    @csrf
                                                    <input type="hidden" name="_method" value="patch">
                                                    <input style="border: 0" class="form-control" type="text" name="updated_name" id="updated_name" value="{{ $child_item->name }}">
                                                </form>
                                             </td>
                                            <td>{{ $child_item->created_at->format('M d, Y') }}</td>
                                            <td>
                                                <span class="badge badge-primary">Active</span>
                                            </td>
                                        </tr>
                                    @endforeach
                                {{-- </tbody>
                            </table> --}}
                        @endif
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="row justify-content-end mt-1">
            <div class="col-auto">
                {{ $categories->links() }}
            </div>
        </div>
    </div>
@endsection