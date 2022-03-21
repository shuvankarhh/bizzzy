@extends('layouts.app')
@section('navbar')
    <x-navbar links="true" />
@endsection
@section('content')
<section class="container body">
    <section class="job-body">
        <x-job-component applied="0" connect="2" />
    </section>
</section>
@endsection
