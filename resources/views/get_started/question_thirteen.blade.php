@extends('layouts.app')

@push('css')
    <link href="{{ asset('/css/pidie/pidie.css') }}" rel="stylesheet">
@endpush
@section('navbar')
    <x-navbar links="false" />
    @endsection @section('content')
    <section class="question">
        <div class="container py-3 h-100">
            <div class="row d-flex justify-content-center mt-5 h-100">
                <div class="col-md-12 col-lg-12 col-xl-12 col-sm-12">
                    <div class="row justify-content-center battery-question">
                        <div class=" col-md-1 col-lg-1 col-xl-1 col-sm-3"><a>Prev</a></div>
                        <div class=" col-md-4 col-lg-4 col-xl-4 col-sm-3">
                            <p class="main-question">A few last details - then you can check and publish your profile.</p>
                            <p class="main-question-desc">A professional photo helps you build trust with your clients. To
                                keep things safe and simple, they’ll pay you through us - which is why we need your personal
                                information.</p>
                            <div>
                                <img style="height: 80px;width:80px;" src="{{ asset('/images/general/avatar.png') }}"
                                    alt="">

                            </div>
                            <div>
                                <button class="btn btn-primary btn-ls " data-mdb-toggle="modal"
                                    data-mdb-target="#exampleModal"
                                    style=" background-color:white;margin-top: 20px; color:#14A800; border: 1px solid #14A800;"
                                    type="submit">Upload
                                    Photo</button><br>
                            </div>

                            <div style="margin-top: 30px;">
                                <label class="custom-label" for="end_date_div">Country*</label>
                                <select name="month_end" id="month_end" class="form-select"
                                    aria-label="Default select example">
                                    <option selected>Country</option>
                                    <option value="1">01</option>
                                    <option value="2">02</option>
                                    <option value="3">03</option>
                                    <option value="4">04</option>
                                    <option value="5">05</option>
                                    <option value="6">06</option>
                                    <option value="7">07</option>
                                    <option value="8">08</option>
                                    <option value="9">09</option>
                                    <option value="10">10</option>
                                    <option value="11">11</option>
                                    <option value="12">12</option>
                                </select>
                            </div>


                            <div class="input-group mt-3">
                                <label class="custom-label">Street Address * (won’t show on profile)</label>
                            </div>
                            <div>
                                <input type="text" class="form-control" placeholder="Username" aria-label="Username"
                                    aria-describedby="basic-addon1">
                            </div>
                            <div class="row">
                                <div class="col-md-6 col-lg-6 col-xl-6 col-sm-3">
                                    <div class="input-group mt-3">
                                        <label class="custom-label">City *</label>
                                    </div>
                                    <div>
                                        <input type="text" class="form-control" placeholder="Boston"
                                            aria-describedby="basic-addon1">
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-6 col-xl-6 col-sm-3">
                                    <div class="input-group mt-3">
                                        <label class="custom-label">ZIP/Postal code</label>
                                    </div>
                                    <div>
                                        <input type="text" class="form-control" placeholder="Apt/Suite (Optional)"
                                            aria-describedby="basic-addon1">
                                    </div>
                                </div>
                            </div>
                            <div class="input-group mt-3">
                                <label class="custom-label">Phone</label>
                            </div>

                            <div>
                                <div class="pd-telephone-input">
                                    <input type="tel" class="form-control" />
                                </div>

                            </div>

                        </div>
                        <div class="col-md-4 col-lg-4 col-xl-4 col-sm-3 d-none d-sm-none d-md-block"></div>
                        <div class="col-md-3 col-lg-2 col-xl-2 col-sm-3 d-none d-sm-none d-md-block">
                            <div class="card" style=""><img src="{{ asset('/images/card/card1.png') }}"
                                    class="card-img-top" alt="..."
                                    style="background-image: linear-gradient(0deg, #FFAB00 0%, #FF991F 99.49%);"><img
                                    class="battery" style="left: 45%;top: 8%;"
                                    src="{{ asset('/images/card/single-battary.png') }}" alt="">
                                <div class="card-body" style="margin-top: 0px">
                                    <p class="card-text" style="">Bizzzy Tip</p>
                                    <p class="card-text sm" style="text-align: left;">“I’m a developer with experience in
                                        building websites for small and medium sized businesses. Whether you’re trying to
                                        win work, list your services or even create a whole online store – I can help!
                                    <ul style="font-size: 14px">
                                        <li> I’m experienced in HTML and CSS 3, PHP, jQuery, WordpPess and SEO</li>
                                        <li>I’ll fully project manage your brief from start to finish</li>
                                        <li>Regular communication is really important to me, so let’s keep in touch!”
                                        </li>
                                    </ul>


                                    </p>
                                </div>
                            </div>
                        </div>
                        <div>
                            <button class="btn btn-primary btn-ls "
                                style=" background-color: #14A800;margin-top: 20px; float:right " type="submit">Choose Your
                                Area of Work</button><br>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Add Profile Image</h5>
                    </div>
                    <div class="modal-body">
                        <div style="height:200px; width:100%; background-color:#CCCCCC;">
                            <div>
                                <img src="{{ asset('/images/general/profile.png') }}" alt="" class="">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-mdb-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Save changes</button>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script src="{{ asset('/js/pidie/pidie.js') }}"></script>
    <script>
        new Pidie();
    </script>
@endsection

{{-- @push('js')
    <script src="{{ asset('/js/pidie/pidie.js') }}"></script>
@endpush --}}
