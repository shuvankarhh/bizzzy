@extends('layouts.app')

@section('content')
    
<section class="container top_hero_section">
    <div class="row">
        <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
            <div class="col-lg-12 col-md-6 col-sm-12 col-xs-12">
                <h1 class="hero_header">Build Your Awesome Career</h1>
            </div>
            <div class="col-lg-12 col-md-6 col-sm-12 col-xs-12">
                <h5 class="sub_hero_header">It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution</h5>
            </div>
            <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
                <div class="row responsive-jutify">
                    <div class="col-md-2 col-4">
                        <button class="btn btn-success top_hero_left_cta" type="submit">BTN</button>
                    </div>
                    <div class="col-md-8 col-6">
                        <a class="top_hero_right_cta" href=""><img src="{{asset('/images/buttons/button1.svg')}}">How its work</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12 ">
            <div>
                <img class="top_hero_main_img img-fluid" src="{{asset('/images/general/hero-img.png')}}" alt="">
            </div>
            <div>
                <img class="top_hero_main_img" style=" height: 30px;width: 90px;position: absolute;top: 25vh;right: 45vw; z-index: -1" src="/images/extra_fillers/zigzag-green.png" alt="">
            </div>
            <div>
                <img class="sub_img" src="{{asset('/images/extra_fillers/circles-green.png')}}" style="position: absolute;top: 15vh;right: 10vw; z-index: -1" alt="">
            </div>
            <div>
                <img class="sub_img" src="{{asset('/images/extra_fillers/triangles-green.png')}}" style="position: absolute;left: 45vw;top: 100vh; z-index: -1;" alt="">
            </div>
            <div>
                <img class="sub_img" src="{{asset('/images/extra_fillers/cross-green.png')}}" style="position: absolute;top: 16vw; right: 8vw; z-index: -1;" alt="">
            </div>
        </div>
    </div>
</section>
<section class="container service_section">
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 " style="position: relative;">
            <h1 class="hero_header">The Service We Provide <br>For You</h1>
            <div>
                <img class="sub_img" src="{{asset('/images/extra_fillers/triangles-blue.png')}}" style="position: absolute;left: 90px;top: 90px; z-index: -1;" alt="">
            </div>
            <div>
                <img class="sub_img" src="{{asset('/images/extra_fillers/cross-blue.png')}}" style="position: absolute;right: 180px; z-index: -1;" alt="">
            </div>

        </div>

        <div class="row service_content">
            <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12">
                <img src="{{asset('/images/icons/icon-code.svg')}}" alt="">
                <p>Development</p>
                <p class="sub_content">Create a platform with the best and coolest quality from us.</p>
            </div>
            <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12">
                <img src="{{asset('/images/icons/icon-stack.svg')}}" alt="">
                <p>UI/UX Designer</p>
                <p class="sub_content">We provide UI/UX Design services, and of course with the best quality</p>
            </div>
            <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12">
                <img src="{{asset('/images/icons/icon-code.svg')}}" alt="">
                <p>Graphics Designer</p>
                <p class="sub_content">We provide Graphic Design services, with the best designers</p>
            </div>
            <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12">
                <img src="{{asset('/images/icons/icon-align-vertical.svg')}}" alt="">
                <p>Motion Graphics</p>
                <p class="sub_content">Create a platform with the best and coolest quality from us.</p>
            </div>
            <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12">
                <img src="{{asset('/images/icons/icon-camera.svg')}}" alt="">
                <p>Photography</p>
                <p class="sub_content">We provide Photography services, and of course with the best quality</p>
            </div>
            <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12">
                <img src="{{asset('/images/icons/icon-video-play.svg')}}" alt="">
                <p>Videography</p>
                <p class="sub_content">Create a platform with the best and coolest quality from us.</p>
            </div>
        </div>
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 " style="position: relative;">
            <div>
                <img class="sub_img" src="{{asset('/images/extra_fillers/cross-blue.png')}}" style="position: absolute;top: 45px;left: 120px; z-index: -1;" alt="">
            </div>
            <div>
                <img class="sub_img" src="{{asset('/images/extra_fillers/circles-blue.png')}}" style="position: absolute;right: 150px;top: 20px; z-index: -1;" alt="">
            </div>
        </div>
    </div>

</section>

<section class="container consultant_section">
    <div class="row">
        <div class="col-lg-1 col-md-12 col-sm-12 col-xs-12">

        </div>

        <div class="col-lg-5 col-md-12 col-sm-12 col-xs-12 d-none d-md-block">
            <div style="position: relative;">
                <img class="consultant_img" src="{{asset('/images/general/casual-hologram-job-consultant-standing.png')}}" alt="">

                <img class="consultant_img" src="{{asset('/images/extra_fillers/dots.svg')}}" style="position: absolute;left: -32px;top: -41px;z-index: -1;" alt="">
            </div>

        </div>

        <div class="col-lg-6 col-md-8 col-sm-8 col-xs-12">
            <h3 class="consultant_header">What is Lorem Ipsum?</h3>
            <p class="consultant_details">It is a long established fact that a reader will be distracted by the readable content of a page when looking.</p>
            <p class="consultant_details">It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.</p>
            <button class="btn btn-success consultant_cta" type="submit">BTN</button>
        </div>
        <!-- <div class="col-lg-1 col-md-12 col-sm-12 col-xs-12">

        </div> -->
    </div>
</section>
<section class="container consultant_sub_section">
    <div class="row">
        <div class="col-lg-2 col-md-12 col-sm-12 col-xs-12">

        </div>
        <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12">
            <h3 class="consultant_header">What is Lorem Ipsum?</h3>
            <p class="consultant_sub_details">It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.</p>
            <button class="btn btn-success consultant_cta" type="submit">BTN</button>
        </div>
        <div class="col-lg-1 col-md-12 col-sm-12 col-xs-12">

        </div>
        <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12">
            <div class="consultant_sub_section_content">
                <img src="{{asset('/images/icons/top-categories.svg')}}" alt="">
                <p>Website Design</p>
                <div style="clear: both;"></div>
            </div>

            <div class="consultant_sub_section_content">
                <img src="{{asset('/images/icons/top-categories.svg')}}" alt="">
                <p>Improve UI Design</p>
                <div style="clear: both;"></div>
            </div>

            <div class="consultant_sub_section_content">
                <img src="{{asset('/images/icons/top-categories.svg')}}" alt="">
                <p>CSS</p>
                <div style="clear: both;"></div>
            </div>

            <div class="consultant_sub_section_content">
                <img src="{{asset('/images/icons/top-categories.svg')}}" alt="">
                <p>Python</p>
                <div style="clear: both;"></div>
            </div>

            <div class="consultant_sub_section_content">
                <img src="{{asset('/images/icons/top-categories.svg')}}" alt="">
                <p>Web Programming</p>
                <div style="clear: both;"></div>
            </div>

            <div class="consultant_sub_section_content">
                <img src="{{asset('/images/icons/top-categories.svg')}}" alt="">
                <p>Wordpress</p>
                <div style="clear: both;"></div>
            </div>
            <div class="consultant_sub_section_content">
                <img src="{{asset('/images/icons/top-categories.svg')}}" alt="">
                <p>Social Media Manager</p>
                <div style="clear: both;"></div>
            </div>
            <div class="consultant_sub_section_content">
                <img src="{{asset('/images/icons/top-categories.svg')}}" alt="">
                <p>Agile Development</p>
                <div style="clear: both;"></div>
            </div>
            <div class="consultant_sub_section_content">
                <img src="{{asset('/images/icons/top-categories.svg')}}" alt="">
                <p>Website Design</p>
                <div style="clear: both;"></div>
            </div>
            <div class="consultant_sub_section_content">
                <img src="{{asset('/images/icons/top-categories.svg')}}" alt="">
                <p>Improve UI Design</p>
                <div style="clear: both;"></div>
            </div>
            <div class="consultant_sub_section_content">
                <img src="{{asset('/images/icons/top-categories.svg')}}" alt="">
                <p>CSS</p>
                <div style="clear: both;"></div>
            </div>

        </div>
        <div class="col-lg-1 col-md-12 col-sm-12 col-xs-12">

        </div>
    </div>
</section>
<section class="container about_us">
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <h1 class="hero_header" style="text-align: center;">What The People Thinks<br> About Us</h1>
        </div>
    </div>
    <div class="row" style="margin-top: 85px;">
        <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12">
            <div class="people_comments border-less">
                <img src="{{asset('/images/general/reviews-img.png')}}" alt="">
                <div class="people_comments_user">
                    <p class="people_comments_username">Jack Williamson</p>
                    <p class="people_comments_duration">One Year With Us</p>
                </div>
                <div style="clear: both;"></div>
                <p class="people_comments_des">Lorem ipsum dolor sit amet, consec adipis.<br> Cursus ultricies sit sit</p>
            </div>
        </div>
        <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12">
            <div class="people_comments">
                <img src="{{asset('/images/general/reviews-img.png')}}" alt="">
                <div class="people_comments_user">
                    <p class="people_comments_username">Jack Williamson</p>
                    <p class="people_comments_duration">One Year With Us</p>
                </div>
                <div style="clear: both;"></div>
                <p class="people_comments_des">Lorem ipsum dolor sit amet, consec adipis. <br>Cursus ultricies sit sit</p>
            </div>
        </div>
        <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12">
            <div class="people_comments border-less">
                <img src="{{asset('/images/general/reviews-img.png')}}" alt="">
                <div class="people_comments_user">
                    <p class="people_comments_username">Jack Williamson</p>
                    <p class="people_comments_duration">One Year With Us</p>
                </div>
                <div style="clear: both;"></div>
                <p class="people_comments_des">Lorem ipsum dolor sit amet, consec adipis.<br> Cursus ultricies sit sit</p>
            </div>
        </div>
    </div>
</section>

<section class="container newsletter mb-5">
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <h1 class="hero_header" style="text-align: center;">Subscribe To Our Newsletter</h1>
        </div>
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <p>There are many variations of passages of lorem lpsum available, but the<br> majority have suffered alteraction</p>
        </div>
        <div class="row">
            <div class="col-lg-3 col-md-12 col-sm-12 col-xs-12">

            </div>
            <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12 newsletter_box">
                <form action="" style="position: relative;">
                    <input class="form-control" type="email" name="" id="" placeholder="Enter your email...">
                    <button class="btn btn-success newsletter_cta" type="submit">BTN</button>
                </form>
            </div>
        </div>
    </div>
</section>

@endsection
