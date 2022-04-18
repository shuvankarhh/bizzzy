@extends('layouts.app')
@section('navbar')
    <x-navbar links="false" />
@endsection
@section('content')
    <section class="question">
        <div class="container pt-5 pb-3" style="min-height: 75vh">
            <div class="row justify-content-center battery-question">
                <div class="col-1 d-none d-sm-none d-md-block d-lg-block d-xl-block d-xxl-block">
                    <a class="btn prev-button" href="{{ route('user.skill.index') }}">Prev</a>
                </div>
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
                    <div class="card bizzy-tip-bio" style="">
                        <img src="{{ asset('/images/card/battery-single-yellow.svg') }}" class="card-img-top" alt="...">
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
            <x-question-footer-content href="{{ route('user.skill.index') }}" on-click="add_bio()" button-text="Choose Your Area of Work" />
        </div>
    </section>
@endsection
