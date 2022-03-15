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
        <div class="row battery-question">
            <div class=" col-md-1 col-lg-1 col-xl-1 col-sm-3"><a>Prev</a></div>
            <div class=" col-md-6 col-lg-6 col-xl-6 col-sm-12 col-xs-12">    
                <p class="main-question">A few last details - then you can check and publish your profile.</p>
                <p class="main-question-desc">A professional photo helps you build trust with your clients. To
                    keep things safe and simple, they’ll pay you through us - which is why we need your personal
                    information.</p>
                <div>
                    <img id="imagePreview" class="photo-priview"
                        style="height: 160px;width:160px; background:no-repeat; background-image: url({{ (is_null($photo)) ? asset('/images/general/avatar.png') : asset('storage/' . $photo) }});background-position: center;
                        background-size: 160px 160px;"
                        alt="">

                </div>
                <div class="photo-upload">
                    <input type="file" id="imageUpload" accept=".png, .jpg, .jpeg" name="imageUpload"
                        class=" imageUpload" />
                    <input type="hidden" name="base64image" name="base64image" id="base64image">
                    <label for="imageUpload" class="btn upload-button">Upload photo</label>
                </div>

                <div style="margin-top: 30px;">
                    <label for="country" class="custom-label">Country *</label>
                    <select id="country" name="country" autocomplete="off">
                        <option selected value="">Select Country</option>
                        <x-countries/>
                    </select>
                </div>


                <div class="input-group mt-3">
                    <label class="custom-label">Street Address * (won’t show on profile)</label>
                </div>
                <div>
                    <input type="text" class="form-control" placeholder="Street Address" aria-label="Street Address" aria-describedby="basic-addon1">
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
        </div>
    </div>
    <div class="question-footer-height"></div>
    <div class="question-footer">
        <x-question-footer percentage=65/>
        <div class="row justify-content-end">
            <div class="col-md-3 text-end">
                <button onclick="add_language()" class="btn btn-bizzzy-success text-nowrap me-3"> Now Share Your Skills </button>
            </div>
        </div>
    </div>    
</section>

<!-- Modal -->
<div class="modal fade imagecrop" id="imagecrop_modal" tabindex="-1" aria-labelledby="exampleModalLabel"
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
<script src="{{ asset('/js/pidie/pidie.js') }}"></script>
<script>
    new Pidie();
</script>

    
@endsection

@push('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.6/cropper.js"></script>
@endpush

@push('script')
        
    <script>
        new TomSelect("#country", { create: false });


        const modal_element = document.getElementById('imagecrop_modal');
        var modal_toggle = new bootstrap.Modal(modal_element);
        var image = document.getElementById('image');
        var cropper;
        let imageUpload = document.getElementById('imageUpload');
        imageUpload.addEventListener("change", function(e) {
            var files = e.target.files;
            var done = function(url) {
                image.src = url;
                modal_toggle.toggle();
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
        modal_element.addEventListener('shown.bs.modal', function() {
            cropper = new Cropper(image, {
                aspectRatio: 1,
                viewMode: 1,
                cropBoxResizable: false,
            });
        });
        modal_element.addEventListener('hidden.bs.modal', function() {
            cropper.destroy();
            cropper = null;
        });
        let crop_element = document.getElementById('crop');
        crop_element.addEventListener("click", function() {
            canvas = cropper.getCroppedCanvas();
            canvas.toBlob(function(blob) {
                url = URL.createObjectURL(blob);
                var reader = new FileReader();
                reader.readAsDataURL(blob);
                reader.onloadend = function() {
                    var base64data = reader.result;
                    let input = document.getElementById("base64image");
                    input.value = base64data;
                    upload_profile_image(base64data);
                    document.getElementById('imagePreview').style.backgroundImage = `url(${base64data})`;
                    modal_toggle.toggle();
                }
            });
        })
    </script>

@endpush
