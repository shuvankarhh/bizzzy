@extends('layouts.app')

@section('navbar')
    <x-navbar />
@endsection

@section('content')
    <section>
        <div class="container py-3 h-100">


            {{-- <li class="nav-item"> --}}
            <form action="{{ route('admin.logout') }}" method="post">
                @csrf
                <button class="btn btn-primary" type="submit">Logout</button>
            </form>
            {{-- </li> --}}


        </div>
    </section>
@endsection
