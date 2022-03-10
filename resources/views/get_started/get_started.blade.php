@extends('layouts.app')

@section('navbar')
<x-navbar links="false"/>
@endsection

@section('content')

<section style="height: 100vh">
    <div class="container py-3">
        <div class="row">
            <div class="col-lg-7 col-md-12 col-sm-12 d-none d-sm-none d-md-block">
                <!-- Carousel wrapper -->
                <div id="carouselBasicExample" class="carousel slide carousel-fade getting-started" data-mdb-ride="carousel" style="position: relative;">
                    <!-- Indicators -->
                    <div class="carousel-indicators">
                        <button type="button" data-mdb-target="#carouselBasicExample" data-mdb-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                        <button type="button" data-mdb-target="#carouselBasicExample" data-mdb-slide-to="1" aria-label="Slide 2"></button>
                        <button type="button" data-mdb-target="#carouselBasicExample" data-mdb-slide-to="2" aria-label="Slide 3"></button>
                    </div>

                    <!-- Inner -->
                    <div class="carousel-inner">
                        <!-- Single item -->
                        <div class="carousel-item active">
                            <img src="/images/slider/slider1.png" class="d-block w-100" alt="Sunset Over the City" />
                        </div>

                        <!-- Single item -->
                        <div class="carousel-item">
                            <img src="/images/slider/slider2.png" class="d-block w-100" alt="Canyon at Nigh" />

                        </div>

                        <!-- Single item -->
                        <div class="carousel-item">
                            <img src="/images/slider/slider1.png" class="d-block w-100" alt="Cliff Above a Stormy Sea" />

                        </div>
                        <div class="carousel-inner-box" >
                            <div class="card shadow-2-strong" style="">
                                <div>
                                    <p class="left-text">Christine</p>
                                    <p class="right-text">$65/hr</p>
                                </div>
    
                                <p class="description">Customer Experience Consultant, USA.<br> Developed customer service systems<br> for 20 years</p>
                                <div class="top-rated">
                                    <p >TOP RATED</p> <img src="{{asset('/images/icons/Vector.png')}}" alt="">    
                                </div>
                                <p class="comment">“Bizzzy has enabled me to increase my rates. I know what I'm bringing to the table and love the feeling of being able to help a variety of clients.”</p>
                            </div>
                        </div>
                    </div>
                    <!-- Inner -->

                    <!-- Controls -->
                    <button class="carousel-control-prev" type="button" data-mdb-target="#carouselBasicExample" data-mdb-slide="prev">
                        <span>Prev</span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-mdb-target="#carouselBasicExample" data-mdb-slide="next">
                        <span>Next</span>
                        <span class="visually-hidden">Next</span>
                    </button>

                    
                </div>
                <!-- Carousel wrapper -->



            </div>
            <div class="col-lg-5 col-md-12 col-sm-12 align-self-center">
                <div class="card getting-started-card">
                    <div class="card-body p-5 text-center">
                        <img src="/images/general/avatar.png" alt="">

                        <h1 class="mb-5">Hey {{ $name }}. Ready for your next big opportunity?</h1>

                        <h2 class="mb-5" style="">Answer a few questions and start building your profile</h2>


                        <a href="{{ route('question.one') }}" role="button" class="btn btn-primary btn-lg btn-block" style="  background-color: #14A800;" type="submit">Get Started</a>


                    </div>
                </div>
            </div>
        </div>


    </div>
</section>
    
@endsection