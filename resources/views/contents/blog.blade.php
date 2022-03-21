@extends('layouts.app')

@section('navbar')
    <x-navbar links="false" />
@endsection

@section('content')
    <section class="">
        <div class="container py-3">
            <div class="row" style="background: #EFF3FE;">
                <div class="col-md-12 col-lg-12 col-xl-12 col-sm-12 mb-2 mt-2">
                    <p class="blog-title">Build Your Awesome Career</p>

                </div>
                <div class="col-md-12 col-lg-12 col-xl-12 col-sm-12">

                    <div class="job-body">
                        <ul class="nav nav-tabs mb-3" id="ex1" role="tablist">
                            <li class="nav-item" role="presentation">
                                <a class="nav-link active" id="all" data-mdb-toggle="tab" href="#all_tab" role="tab"
                                    aria-controls="all" aria-selected="true">
                                    <span class="icon">
                                        <img src="{{ asset('images\icons\job\all.svg') }}" alt="Briefcase">
                                        <span class="text">All</span>
                                    </span>
                                </a>
                            </li>
                            <li class="nav-item" role="presentation">
                                <a class="nav-link" id="product" data-mdb-toggle="tab" href="#product_tab" role="tab"
                                    aria-controls="product" aria-selected="false">
                                    <span class="icon">
                                        <img src="{{ asset('images\icons\briefcase_dollar.svg') }}" alt="Briefcase">
                                        <span class="text"> Product & Feature Updates </span>
                                    </span>
                                </a>
                            </li>
                            <li class="nav-item" role="presentation">
                                <a class="nav-link" id="corporate" data-mdb-toggle="tab" href="#corporate_tab"
                                    role="tab" aria-controls="corporate" aria-selected="false">
                                    <span class="icon">
                                        <img src="{{ asset('images\icons\blog\corporate.svg') }}" alt="Briefcase">
                                        <span class="text"> Corporate Initiatives </span>
                                    </span>
                                </a>
                            </li>
                            <li class="nav-item" role="presentation">
                                <a class="nav-link" id="partnerships" data-mdb-toggle="tab" href="#partnerships_tab"
                                    role="tab" aria-controls="partnerships" aria-selected="false">
                                    <span class="icon">
                                        <img src="{{ asset('images\icons\blog\corporate.svg') }}" alt="Briefcase">
                                        <span class="text"> Partnerships </span>
                                    </span>
                                </a>
                            </li>


                        </ul>
                        <!-- Tabs content -->
                        <div class="tab-content" id="ex1-content">
                            <div class="tab-pane fade show active" id="all_tab" role="tabpanel" aria-labelledby="all_tab">
                                <div class="tab-border">
                                    <div class="row">
                                        <div class="col-md-5 col-lg-5 col-xl-5 col-sm-12">
                                            <img style="height: 300px; width:500px;"
                                                src="{{ asset('images\blog\blog1.png') }}" alt="">
                                        </div>
                                        <div class="col-md-7 col-lg-7 col-xl-7 col-sm-12">
                                            <div style="margin: 50px;">
                                                <p class="massage">Message</p>
                                                <p class="letter">A Letter From Our CEO</p>
                                                <p class="letter-desc">Are you tired of working on MVPs and on boring
                                                    design projects? Are you
                                                    an experienced designer looking to work on tough design problems and
                                                    create astonishing designs ? Helpjuice (a fast-growing b2b software) is
                                                    hiring for a designer. What is Helpjuice? Helpjuice is a SaaS
                                                    application that empowers thousands of large and small companies (such
                                                    as...</p>
                                                <p class="duration">March 7, 2022</p>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4 col-lg-4 col-xl-4 col-sm-12">
                                            <div class="card" style="width: 18rem;">
                                                <img src="https://mdbcdn.b-cdn.net/img/new/standard/nature/182.webp"
                                                    class="card-img-top" alt="Sunset Over the Sea" />
                                                <div class="card-body">
                                                    <p class="card-text">Some quick example text to build on the card
                                                        title and make up the bulk of the card's content.</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-lg-4 col-xl-4 col-sm-12">
                                            <div class="card" style="width: 18rem;">
                                                <img src="https://mdbcdn.b-cdn.net/img/new/standard/nature/182.webp"
                                                    class="card-img-top" alt="Sunset Over the Sea" />
                                                <div class="card-body">
                                                    <p class="card-text">Some quick example text to build on the card
                                                        title and make up the bulk of the card's content.</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-lg-4 col-xl-4 col-sm-12">
                                            <div class="card" style="width: 18rem;">
                                                <img src="https://mdbcdn.b-cdn.net/img/new/standard/nature/182.webp"
                                                    class="card-img-top" alt="Sunset Over the Sea" />
                                                <div class="card-body">
                                                    <p class="card-text">Some quick example text to build on the card
                                                        title and make up the bulk of the card's content.</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>



                            </div>
                            <div class="tab-pane fade show " id="product_tab" role="tabpanel" aria-labelledby="product_tab">
                                <div class="tab-border">

                                </div>
                            </div>
                            <div class="tab-pane fade show " id="corporate_tab" role="tabpanel"
                                aria-labelledby="corporate_tab">
                                <div class="tab-border">

                                </div>
                            </div>
                            <div class="tab-pane fade show " id="partnerships_tab" role="tabpanel"
                                aria-labelledby="partnerships_tab">
                                <div class="tab-border">

                                </div>
                            </div>


                            <div class="mt-5">
                                <a style="display: flex;" class="justify-content-center">
                                    <p class="show-all">Show all Experiences</p>
                                    <img src="{{ asset('/images/icons/down.svg') }}" alt=""
                                        style="  margin-bottom: 12px; margin-left: 10px;">
                                </a>
                            </div>
                        </div>
                    </div>


                </div>
            </div>
        </div>
    </section>
@endsection
