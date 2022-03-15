@extends('layouts.app')
@section('navbar')
    <x-navbar links="false" />
@endsection
@section('content')
    <section class="question">
        <div class="container py-3 h-100">
            <div class="row justify-content-center battery-question">
                <div class=" col-md-1 col-lg-1 col-xl-1 col-sm-3"><a>Prev</a></div>
                <div class=" col-md-6 col-lg-6 col-xl-6 col-sm-12 col-xs-12">
                    <p class="main-question">Great! Now write a bio to tell the world about yourself.</p>
                    <p class="main-question-desc">Help people get to know you at a glance. What work are you best at? Tell
                        them clearly, using paragraphs or bullet points. You can always edit later - just make sure you
                        proofread now!</p>
                    <p style="font-weight: 500;">Bio</p>
                    <div>
                        <form action="#" id="bio_form">
                            <div class="form-outline">
                                <textarea class="form-control" id="bio" name="bio" rows="6" placeholder="Describe your top skills, experiences, and interests. This is one of the first things clients will see on your profile.">{{ $bio }}</textarea>
                                <label class="form-label" for="textAreaExample">Bio</label>
                                <div id="bio_invalid" class="invalid-feedback js"></div>
                            </div>
                        </form>
                    </div>
                    <p style="float: right">At least 100 characters</p>
                </div>
                <div class="col-md-5 col-lg-5 col-xl-5 d-none d-sm-none d-md-block align-items-end">
                    <div class="card bizzy-tip-bio" style=""><img src="{{ asset('/images/card/card1.png') }}"
                            class="card-img-top" alt="..."
                            style="background-image: linear-gradient(0deg, #FFAB00 0%, #FF991F 99.49%);"><img
                            class="battery" style="left: 45%" src="{{ asset('/images/card/single-battary.png') }}"
                            alt="">
                        <div class="card-body text-start" style="margin-top: 0px">
                            <p class="card-text text-start" style="">Bizzzy Tip</p>
                            <p class="card-text sm text-start" style="">“I’m a developer with experience in building
                                websites for small and medium sized businesses. Whether you’re trying to win work, list your
                                services or even create a whole online store – I can help!
                            <ul>
                                <li> I’m experienced in HTML and CSS 3, PHP, jQuery, WordpPess and SEO</li>
                                <li> I’ll fully project manage your brief from start to finish</li>
                                <li> Regular communication is really important to me, so let’s keep in touch!”</li>
                            </ul>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="question-footer-height"></div>
        <div class="question-footer">
            <x-question-footer percentage=65 />
            <div class="row justify-content-end">
                <div class="col-md-3 text-end">
                    <button onclick="add_bio('{{ route('question.eleven') }}')" class="btn btn-bizzzy-success text-nowrap me-3"> Choose Your Area of Work </button>
                </div>
            </div>
        </div>
    </section>
@endsection
