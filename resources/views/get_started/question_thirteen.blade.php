@extends('layouts.app')

@push('css')
    <link href="{{ asset('/css/pidie/pidie.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.6/cropper.css" />
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
                                <img id="imagePreview" class="photo-priview"
                                    style="height: 160px;width:160px; background:no-repeat; background-image: url({{ asset('/images/general/avatar.png') }});"
                                    alt="">

                            </div>
                            <div class="photo-upload">
                                <input type="file" id="imageUpload" accept=".png, .jpg, .jpeg" name="imageUpload"
                                    class=" imageUpload" />
                                <input type="hidden" name="base64image" name="base64image" id="base64image">
                                <label for="imageUpload" class="btn upload-button">Upload photo</label>
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
                        </div>
                        <div>
                            <button class="btn btn-primary btn-ls "
                                style=" background-color: #14A800;margin-top: 20px; float:right " type="submit">Check Your
                                Profile</button><br>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <!-- Modal -->
        <div class="modal fade imagecrop" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Add Profile Image</h5>
                    </div>
                    <div class="modal-body">
                        <div>
                            <div>
                                <img id="image" src="https://avatars0.githubusercontent.com/u/3456749">
                            </div>
                            {{-- <div class="photo-upload">
                                <input type="file" id="imageUpload" accept=".png, .jpg, .jpeg" name="imageUpload"
                                    class=" imageUpload">
                                <label for="file" class="btn upload-button change-image">Change photo</label>
                            
                            </div> --}}

                        </div>
                        <div>
                            <p class="details-title">Your photo should:</p>
                            <ul class="photo-details">
                                <li>Be a close-up of your face</li>
                                <li> Show your face clearly - no sunglasses!</li>
                                <li> Be clear and crisp</li>
                                <li> Have a neutral background</li>
                            </ul>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn"
                            style="background: #FFFFFF; border-radius: 3px; color: #42526E;"
                            data-mdb-dismiss="modal">Close</button>
                        <button type="button" class="btn crop" id="crop"
                            style="background: #14A800; border-radius: 3px; color:#FFFFFF">Save</button>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script src="{{ asset('/js/pidie/pidie.js') }}"></script>
    <script>
        new Pidie();
    </script>

    <script>
        var $modal = $('.imagecrop');
        var image = document.getElementById('image');
        var cropper;
        $("body").on("change", ".imageUpload", function(e) {
            var files = e.target.files;
            var done = function(url) {
                image.src = url;
                $modal.modal('show');
            };
            var reader;
            var file;
            var url;
            if (files && files.length > 0) {
                file = files[0];
                if (URL) {
                    done(URL.createObjectURL(file));
                } else if (FileReader) {
                    reader = new FileReader();
                    reader.onload = function(e) {
                        done(reader.result);
                    };
                    reader.readAsDataURL(file);
                }
            }
        });
        $modal.on('shown.bs.modal', function() {
            cropper = new Cropper(image, {
                aspectRatio: 1,
                viewMode: 1,
            });
        }).on('hidden.bs.modal', function() {
            cropper.destroy();
            cropper = null;
        });
        $("body").on("click", "#crop", function() {
            canvas = cropper.getCroppedCanvas({
                width: 160,
                height: 160,
            });
            canvas.toBlob(function(blob) {
                url = URL.createObjectURL(blob);
                var reader = new FileReader();
                reader.readAsDataURL(blob);
                reader.onloadend = function() {
                    var base64data = reader.result;
                    $('#base64image').val(base64data);
                    document.getElementById('imagePreview').style.backgroundImage = "url(" +
                        base64data + ")";
                    $modal.modal('hide');
                }
            });
        })
    </script>
@endsection

@push('js')
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js'></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.6/cropper.js"></script>
@endpush
