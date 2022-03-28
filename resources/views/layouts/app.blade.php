<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Homepage - Bizzzy</title>

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" rel="stylesheet" />
    <!-- Bootstrap -->
    <link href="{{ asset('/css/vendor/bootstrap_v5-0-2/bootstrap.min.css') }}" rel="stylesheet">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet" />
    <!-- MDB -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.10.2/mdb.min.css" rel="stylesheet" />
    <!-- Tom Select -->
    <link href="https://cdn.jsdelivr.net/npm/tom-select@2.0.1/dist/css/tom-select.css" rel="stylesheet">

    <!-- Bizzzy -->
    <link href="{{ asset('/css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('/css/common.css') }}" rel="stylesheet">

    <script>
        const APP_URL = '{{ url('/') }}'
    </script>

    @stack('css')
    @stack('js')
</head>

<body>
    {{--  <img src="{{asset('/images/extra_fillers/hero-green-background.svg')}}" style="position: absolute;top: 0;left: 0;z-index: -1;height: 140vh;">  --}}

    @yield('navbar')

    @yield('content')

    @include('layouts.footer')

    <!-- Bizzzy -->
    <script src="{{ asset('/js/app.js') }}"></script>
    <!-- MDB -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.10.2/mdb.min.js"></script>
    <!-- Tom Select -->
    <script src="https://cdn.jsdelivr.net/npm/tom-select@2.0.1/dist/js/tom-select.complete.min.js"></script>
    @stack('script')
</body>

</html>
