<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Homepage - Bizzzy</title>

    <!-- Bootstrap -->
    <link href="{{asset('/css/vendor/bootstrap_v5-0-2/bootstrap.min.css')}}" rel="stylesheet">

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" rel="stylesheet" />
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet" />
    <!-- MDB -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.10.2/mdb.min.css" rel="stylesheet" />

    <!-- Bizzzy -->
    <link href="{{asset('/css/app.css')}}" rel="stylesheet">
    <link href="{{asset('/css/common.css')}}" rel="stylesheet">
    <link href="{{asset('/css/homepage.css')}}" rel="stylesheet">
</head>

<body>
    {{-- <img src="{{asset('/images/extra_fillers/hero-green-background.svg')}}" style="position: absolute;top: 0;left: 0;z-index: -1;height: 140vh;"> --}}

    <section class="container navbar_section text-center">
        <nav class="navbar navbar-expand-lg navbar-light">
            <div class="container-fluid">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
                <a class="nav-brand" href="{{ url('/') }}">Bizzzy</a>
                <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="#">Link 1</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Link 2</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Link 3</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Link 4</a>
                        </li>
                    </ul>
                    {{-- <form class="d-flex"> --}}
                        <div class="search_input_group">
                            <img src="{{asset('/images/icons/search-green.png')}}" class="search_icon_input">
                            <input class="form-control me-2" type="text" placeholder="Search" aria-label="Search">
                        </div>

                        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                            @auth
                                <li class="nav-item">
                                    <form action="{{ route('user.logout') }}" method="post">
                                        @csrf
                                        <button class="btn btn-danger" type="submit">Logout</button>
                                    </form>
                                </li>                                
                            @endauth
                            @guest
                                <li class="nav-item">
                                    <a class="nav-link login" aria-current="page" href="{{ route('user.login') }}">Sign In</a>
                                </li>
                                <li class="nav-item">
                                    <a class="btn btn-outline-success" role="button" href="{{ route('user.register') }}">Sign Up</a>
                                </li>
                            @endguest
                        </ul>
                    {{-- </form> --}}
                </div>
            </div>
        </nav>
    </section>

    @yield('content')

    <footer class="bg-primary text-white text-center text-lg-start">
        <!-- Grid container -->
        <div class="container p-4">
            <!--Grid row-->
            <div class="row">
            <!--Grid column-->
            <div class="col-lg-6 col-md-12 mb-4 mb-md-0">
                <h5 class="text-uppercase">Agency</h5>

                <p>
                Lorem ipsum dolor sit amet consectetur, adipisicing elit. Iste atque ea quis
                molestias. Fugiat pariatur maxime quis culpa corporis vitae repudiandae aliquam
                voluptatem veniam, est atque cumque eum delectus sint!
                </p>
            </div>
            <!--Grid column-->

            <!--Grid column-->
            <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
                <h5 class="text-uppercase">Links</h5>

                <ul class="list-unstyled mb-0">
                <li>
                    <a href="#!" class="text-white">Link 1</a>
                </li>
                <li>
                    <a href="#!" class="text-white">Link 2</a>
                </li>
                <li>
                    <a href="#!" class="text-white">Link 3</a>
                </li>
                <li>
                    <a href="#!" class="text-white">Link 4</a>
                </li>
                </ul>
            </div>
            <!--Grid column-->

            <!--Grid column-->
            <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
                <h5 class="text-uppercase mb-0">Links</h5>

                <ul class="list-unstyled">
                <li>
                    <a href="#!" class="text-white">Link 1</a>
                </li>
                <li>
                    <a href="#!" class="text-white">Link 2</a>
                </li>
                <li>
                    <a href="#!" class="text-white">Link 3</a>
                </li>
                <li>
                    <a href="#!" class="text-white">Link 4</a>
                </li>
                </ul>
            </div>
            <!--Grid column-->
            </div>
            <!--Grid row-->
        </div>
        <!-- Grid container -->

        <!-- Copyright -->
        <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
            © 2020 Copyright:
            <a class="text-white" href="https://mdbootstrap.com/">MDBootstrap.com</a>
        </div>
        <!-- Copyright -->
    </footer>

    {{-- <section class="container footer">
        <!-- Remove the container if you want to extend the Footer to full width. -->
        <div class="">

            <!-- Footer -->
            <footer class="text-center text-lg-start text-white" style="background-color:#0086FF;">
                <!-- Section: Social media -->
                <section class="d-flex justify-content-between p-4">



                </section>
                <!-- Section: Social media -->

                <!-- Section: Links  -->
                <section class="my-0">
                    <div class="container text-center text-md-start mt-5">
                        <!-- Grid row -->
                        <div class="row mt-3">
                            <!-- Grid column -->
                            <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4">
                                <!-- Content -->
                                <h6 class="text-uppercase fw-bold footer_company">Agency</h6>
                                <p>
                                    There are many variations of passages of lorem lpsum available, but the majority have suffered alteraction
                                </p>
                                <!-- Right -->
                                <div>
                                    <a href="" class="text-white me-4">
                                        <img src="{{asset('/images/socal_icons/linkedin_white.png')}}" alt="">
                                    </a>
                                    <a href="" class="text-white me-4">
                                        <img src="{{asset('/images/socal_icons/facebook_white.png')}}" alt="">
                                    </a>
                                    <a href="" class="text-white me-4">
                                        <img src="{{asset('/images/socal_icons/twitter_white.png')}}" alt="">
                                    </a>
                                </div>
                                <!-- Right -->
                            </div>
                            <!-- Grid column -->

                            <!-- Grid column -->
                            <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-4 footer_item">
                                <!-- Links -->
                                <h6 class=" footer_header">Products</h6>
                                <p>
                                    <a href="#!" class="text-white footer_link">Link 1</a>
                                </p>
                                <p>
                                    <a href="#!" class="text-white footer_link">Link 2</a>
                                </p>
                                <p>
                                    <a href="#!" class="text-white footer_link">Link 3</a>
                                </p>
                                <p>
                                    <a href="#!" class="text-white footer_link">Link 4</a>
                                </p>
                            </div>
                            <!-- Grid column -->

                            <!-- Grid column -->
                            <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-4 footer_item">
                                <!-- Links -->
                                <h6 class=" footer_header">Information</h6>
                                <p>
                                    <a href="#!" class="text-white footer_link">Link 1</a>
                                </p>
                                <p>
                                    <a href="#!" class="text-white footer_link">Link 2</a>
                                </p>
                                <p>
                                    <a href="#!" class="text-white footer_link">Link 3</a>
                                </p>
                                <p>
                                    <a href="#!" class="text-white footer_link">Link 4</a>
                                </p>
                            </div>
                            <!-- Grid column -->

                            <!-- Grid column -->
                            <div class="col-md-4 col-lg-3 col-xl-3 mx-auto  mb-4 footer_item">
                                <!-- Links -->
                                <h6 class=" footer_header">Company</h6>

                                <p>
                                    <a href="#!" class="text-white footer_link">Link 1</a>
                                </p>
                                <p>
                                    <a href="#!" class="text-white footer_link">careers</a>
                                </p>
                                <p>
                                    <a href="#!" class="text-white footer_link">Contact Us</a>
                                </p>
                            </div>
                            <!-- Grid column -->
                        </div>
                        <!-- Grid row -->
                    </div>
                </section>
                <!-- Section: Links  -->

                <!-- Copyright -->
                <div class="text-center p-3" style="margin-top: 80px;">
                    © 2021 Agency - All Rights Reserved.
                    <!-- <a class="text-white" href=""></a -->

                </div>
                <!-- Copyright -->
            </footer>
            <!-- Footer -->

        </div>
        <!-- End of .container -->

    </section> --}}


    <!-- Bootstrap Bundle with Popper -->
    <script src="{{asset('/js/vendor/bootstrap_v5-0-2/bootstrap.bundle.min.js')}}"></script>

    <!-- MDB -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.10.2/mdb.min.js"></script>
</body>

</html>