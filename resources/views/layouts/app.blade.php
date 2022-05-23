<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Homepage - Bizzzy</title>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
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
        const STRIPE_KEY = "{{ env('STRIPE_KEY') }}"

    </script>

    @stack('css')
    @stack('js')
</head>

<body>
    {{--  <img src="{{asset('/images/extra_fillers/hero-green-background.svg')}}" style="position: absolute;top: 0;left: 0;z-index: -1;height: 140vh;">  --}}

    @yield('navbar')
    <div class="inner-content pb-5 pt-3">
        @yield('content')
    </div>
    @include('layouts.footer')

    <script type="text/javascript" src="https://js.stripe.com/v3/"></script>

    <script>
        async function handleSubmit(e) {
            e.preventDefault();
            console.log('test');
            alert_div.classList.add('hidden');
            const { error } = await stripe.confirmPayment({
                elements,
                confirmParams: {
                    // Make sure to change this to your payment completion page
                    return_url: `${APP_URL}/setting`,
                },
            });

            // This point will only be reached if there is an immediate error when
            // confirming the payment. Otherwise, your customer will be redirected to
            // your `return_url`. For some payment methods like iDEAL, your customer will
            // be redirected to an intermediate site first to authorize the payment, then
            // redirected to the `return_url`.
            if (error.type === "card_error" || error.type === "validation_error") {
                showMessage(error.message);
            } else {
                showMessage("An unexpected error occured.");
            }

        }
    </script>
    <!-- Bizzzy -->
    <script src="{{ asset('/js/app.js') }}"></script>
    <!-- MDB -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.10.2/mdb.min.js"></script>
    <!-- Tom Select -->
    <script src="https://cdn.jsdelivr.net/npm/tom-select@2.0.1/dist/js/tom-select.complete.min.js"></script>
    @stack('script')
</body>

</html>
