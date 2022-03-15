<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Homepage - Bizzzy</title>

    <!-- Bootstrap -->
    <link href="{{ asset('/css/vendor/bootstrap_v5-0-2/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" rel="stylesheet" />
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet" />
    <!-- MDB -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.10.2/mdb.min.css" rel="stylesheet" />
    <!-- Tom Select -->
    <link href="https://cdn.jsdelivr.net/npm/tom-select@2.0.1/dist/css/tom-select.css" rel="stylesheet">

    <!-- Bizzzy -->
    <link href="{{ asset('/css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('/css/common.css') }}" rel="stylesheet">
    <link href="{{ asset('/css/homepage.css') }}" rel="stylesheet">
    <script>
        const APP_URL = '{{ url('/') }}'
    </script>

    @stack('css')
</head>

<body>
    {{-- <img src="{{asset('/images/extra_fillers/hero-green-background.svg')}}" style="position: absolute;top: 0;left: 0;z-index: -1;height: 140vh;"> --}}

    @yield('navbar')

    @yield('content')

    <footer class="footer bg-primary text-white text-center text-lg-start">
        <!-- Grid container -->
        <div class="container p-4">

            <div class="row mt-5 d-flex d-sm-flex d-md-none d-lg-none sm-footer">
                <!-- Buttons trigger collapse -->
                <a class="footer-button pb-1" data-mdb-toggle="collapse" href="#collapseExample" role="button"
                    aria-expanded="false" aria-controls="collapseExample" onclick="toggleFoooterIcon(this)">
                    Product <i class="fas fa-chevron-down"></i>
                </a>

                <!-- Collapsed content -->
                <div class="collapse mt-3" id="collapseExample">
                    <ul class="footer-list list-unstyled mb-0">
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

                <!-- Buttons trigger collapse -->
                <a class="footer-button mt-5 pb-1" data-mdb-toggle="collapse" href="#informationToggle" role="button"
                    aria-expanded="false" aria-controls="informationToggle" onclick="toggleFoooterIcon(this)">
                    Information <i class="fas fa-chevron-down"></i>
                </a>

                <!-- Collapsed content -->
                <div class="collapse mt-3" id="informationToggle">
                    <ul class="footer-list list-unstyled mb-0">
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


                <!-- Buttons trigger collapse -->
                <a class="footer-button mt-5 pb-1" data-mdb-toggle="collapse" href="#companyToggle" role="button"
                    aria-expanded="false" aria-controls="companyToggle" onclick="toggleFoooterIcon(this)">
                    Company <i class="fas fa-chevron-down"></i>
                </a>

                <!-- Collapsed content -->
                <div class="collapse mt-3" id="companyToggle">
                    <ul class="footer-list list-unstyled mb-0">
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
                <div class="col-lg-4 col-md-3 col-sm-12 mb-4 mb-md-0 mt-5 text-footer">
                    <p class="footer-agency">Agency</p>

                    <p class="footer-agency-note">
                        There are many variations of passages of lorem lpsum available, but the majority have suffered
                        alteraction
                    </p>
                    <section class="mb-4">
                        <!-- Linkedin -->
                        <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"><i
                                class="fab fa-linkedin-in"></i></a>

                        <!-- Facebook -->
                        <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"><i
                                class="fab fa-facebook-f"></i></a>

                        <!-- Twitter -->
                        <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"><i
                                class="fab fa-twitter"></i></a>
                    </section>
                </div>
            </div>
            <!--Grid row-->
            <div class="row mt-5 d-none d-sm-none d-md-flex d-lg-flex">
                <!--Grid column-->
                <div class="col-lg-4 col-md-3 col-sm-12 mb-4 mb-md-0 mt-1 p-5">
                    <p class="footer-agency">Agency</p>

                    <p class="footer-agency-note">
                        There are many variations of passages of lorem lpsum available, but the majority have suffered
                        alteraction
                    </p>
                    <section class="mb-4">
                        <!-- Linkedin -->
                        <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"><i
                                class="fab fa-linkedin-in"></i></a>

                        <!-- Facebook -->
                        <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"><i
                                class="fab fa-facebook-f"></i></a>

                        <!-- Twitter -->
                        <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"><i
                                class="fab fa-twitter"></i></a>
                    </section>
                </div>
                <!--Grid column-->

                <!--Grid column-->
                <div class="col-lg-3 col-md-3 col-sm-12 mb-4 mb-md-0 mt-1 p-5">
                    <h5 class="text-uppercase mb-3">Product</h5>

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
                <div class="col-lg-3 col-md-3 col-sm-12 mb-4 mb-md-0 mt-1 p-5">
                    <h5 class="text-uppercase mb-3">Information</h5>

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
                <div class="col-lg-2 col-md-3 col-sm-12 mb-4 mb-md-0 mt-1 p-5">
                    <h5 class="text-uppercase mb-3">Company</h5>

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

                <div class="col-12 mb-4 mb-md-0 text-center">
                    <p class="footer-note">© 2021 Agency - All Rights Reserved.</p>
                </div>

            </div>
            <!--Grid row-->
        </div>
        <!-- Grid container -->
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
    <<<<<<< Updated upstream <script src="{{ asset('/js/vendor/bootstrap_v5-0-2/bootstrap.bundle.min.js') }}"></script>
    =======
    <script src="{{ asset('/js/vendor/bootstrap_v5-0-2/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('/js/app.js') }}"></script>

    >>>>>>> Stashed changes
    <!-- MDB -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.10.2/mdb.min.js"></script>
    <!-- Tom Select -->
    <script src="https://cdn.jsdelivr.net/npm/tom-select@2.0.1/dist/js/tom-select.complete.min.js"></script>
    <!-- Bizzzy -->
    <script src="{{ asset('/js/app.js') }}"></script>
    @stack('script')
</body>

</html>
