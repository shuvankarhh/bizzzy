@extends('layouts.app') @section('navbar')
<x-navbar links="false" />@endsection @section('content') <section class="question">
    <div class="container py-3 h-100">
        <div class="row d-flex justify-content-center mt-5 h-100">
            <div class="col-md-12 col-lg-12 col-xl-12 col-sm-12">
                <div class="row justify-content-center battery-question">
                    <div class=" col-md-1 col-lg-1 col-xl-1 col-sm-3"><a>Prev</a></div>
                    <div class=" col-md-6 col-lg-6 col-xl-6 col-sm-">
                        <p class="main-question">Great! Now write a bio to tell the world about yourself.</p>
                        <p class="main-question-desc">Help people get to know you at a glance. What work are you best at? Tell them clearly, using paragraphs or bullet points. You can always edit later - just make sure you proofread now!</p>
                        <p style="font-weight: 500;">Bio</p>
                        <div>
                            <div class="form-outline">
                                <textarea class="form-control" id="textAreaExample" rows="6" placeholder="Describe your top skills, experiences, and interests. This is one of the first things clients will see on your profile." ></textarea>
                                <label class="form-label" for="textAreaExample" >Bio</label>
                              </div>
                        </div>
                        <p style="float: right">At least 100 characters</p>
                    </div>
                    <div class="col-md-2 col-lg-3 col-xl-3 col-sm-3 d-none d-sm-none d-md-block"></div>
                    <div class="col-md-3 col-lg-2 col-xl-2 col-sm-3 d-none d-sm-none d-md-block">
                        <div class="card" style=""><img src="{{asset('/images/card/card1.png')}}"
                                class="card-img-top" alt="..."
                                style="background-image: linear-gradient(0deg, #FFAB00 0%, #FF991F 99.49%);"><img
                                class="battery" style="left: 45%" src="{{asset('/images/card/single-battary.png')}}"
                                alt="">
                            <div class="card-body" style="margin-top: 0px">
                                <p class="card-text" style="">Bizzzy Tip</p>
                                <p class="card-text sm" style="">“I’m a developer with experience in building websites for small and medium sized businesses. Whether you’re trying to win work, list your services or even create a whole online store – I can help!
                                    <ul>
                                        <li> I’m experienced in HTML and CSS 3, PHP, jQuery, WordpPess and SEO</li>
                                        <li>I’ll fully project manage your brief from start to finish</li>
                                        <li>Regular communication is really important to me, so let’s keep in touch!”</li>
                                    </ul>
                                   
                                    
                                    </p>
                            </div>
                        </div>
                    </div>
                    <div><button class="btn btn-primary btn-ls "
                            style=" background-color: #14A800;margin-top: 20px; float:right " type="submit">Now Write
                            Your Bio</button><br></div>
                </div>
            </div>
        </div>
    </div>
</section>@endsection
