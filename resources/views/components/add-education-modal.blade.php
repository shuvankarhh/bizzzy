<div class="modal fade" id="education_modal" tabindex="-1" aria-labelledby="education_modal_label" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="education_modal_label">Add Education History</h5>
                <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body p-4">
                <form onsubmit="add_education()" id="education_form">
                    <!-- 2 column grid layout with text inputs for the first and last names -->
                    <div class="form-outline mb-4">
                        <input type="text" id="institute_name" name="institute_name" class="form-control" />
                        <label class="form-label" for="institute_name">School *</label>
                    </div>

                    <!-- Text input -->
                    <div class="form-outline mb-4">
                        <input type="text" id="degree" name="degree" class="form-control" />
                        <label class="form-label" for="degree">Degree</label>
                    </div>

                    <!-- Text input -->
                    <div class="form-outline mb-4">
                        <input type="text" id="area_of_study" name="area_of_study" class="form-control" />
                        <label class="form-label" for="area_of_study">Field of Study</label>
                    </div>

                    <div class="row mb-4">
                        <div class="col-md-6 col-lg-6 col-xl-6 col-sm-12 col-xs-12">
                            <label class="custom-label" for="year_start">From</label>                            
                            <select name="year_start" id="year_start" aria-label="Default select example">
                                <option value="" selected>From</option>
                                @for ($i = date('Y'); $i > (date('Y') - 80); $i--)
                                    <option>{{ $i }}</option>
                                @endfor
                            </select>
                        </div>
                        <div class="col-md-6 col-lg-6 col-xl-6 col-sm-12 col-xs-12">
                            <label class="custom-label" for="year_end">To</label>                            
                            <select name="year_end" id="year_end" aria-label="Default select example">
                                <option value="" selected>To</option>
                                @for ($i = date('Y'); $i > (date('Y') - 80); $i--)
                                    <option>{{ $i }}</option>
                                @endfor
                            </select>
                        </div>
                    </div>

                    <!-- Checkbox -->
                    <div class="form-check d-flex mb-4">
                        <input class="form-check-input me-2" type="checkbox" value="yes" id="currently_studying" name="currently_studying"/>
                        <label class="form-check-label" for="currently_studying"> I am currently Studying </label>
                    </div>                    

                    <!-- Message input -->
                    <div class="form-outline mb-4">
                        <textarea class="form-control" id="description" name="description" rows="4"></textarea>
                        <label class="form-label" for="description">Description</label>
                    </div>

                    <!-- Submit button -->
                    <div class="row justify-content-end">
                        <div class="col-3 text-end">
                            <button id="education_modal_close_button" type="button" class="btn btn-link custom-close" data-mdb-dismiss="modal" style="">Close</button>
                        </div>
                        <div class="col-3">
                            <button type="submit" class="btn btn-bizzzy-success btn-block">Save</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@push('script')
    <script>        
        new TomSelect("#year_start", { create: false }); 
        new TomSelect("#year_end", { create: false }); 
    </script>
@endpush