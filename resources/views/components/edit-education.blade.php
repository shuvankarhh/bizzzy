<input type="hidden" id="edit_education" value="{{ encrypt($education->id) }}">
<!-- 2 column grid layout with text inputs for the first and last names -->
<div class=" mb-4">
    <label class="form-label" for="edit_institute_name">School *</label>
    <input type="text" id="edit_institute_name" name="edited_institute_name" class="form-control" value="{{ $education->institute_name }}"/>
    <div id="edited_institute_name_invalid" class="invalid-feedback"></div>
</div>

<!-- Text input -->
<div class=" mb-4">
    <label class="form-label" for="edit_degree">Degree</label>
    <input type="text" id="edit_degree" name="edited_degree" class="form-control" value="{{ $education->degree }}"/>
    <div id="edited_degree_invalid" class="invalid-feedback"></div>
</div>

<!-- Text input -->
<div class=" mb-4">
    <label class="form-label" for="edit_area_of_study">Field of Study</label>
    <input type="text" id="edit_area_of_study" name="edited_area_of_study" class="form-control" value="{{ $education->area_of_study }}"/>
</div>

<div class="row mb-4">
    <div class="col-md-6 col-lg-6 col-xl-6 col-sm-12 col-xs-12">
        <label class="custom-label" for="edit_year_start">From</label>                            
        <select name="edit_year_start" id="edit_year_start" aria-label="Default select example">
            <option value="" selected>From</option>
            @for ($i = date('Y'); $i > (date('Y') - 80); $i--)
                @if ($education->start_date->year == $i)                            
                    <option selected>{{ $i }}</option>
                @else
                    <option>{{ $i }}</option>                            
                @endif
            @endfor
        </select>
    </div>
    <div class="col-md-6 col-lg-6 col-xl-6 col-sm-12 col-xs-12">
        <label class="custom-label" for="edit_year_end">To</label>                            
        <select name="edit_year_end" id="edit_year_end" aria-label="Default select example">
            <option value="" selected>To</option>
            @for ($i = date('Y'); $i > (date('Y') - 80); $i--)
                @if ($education->end_date->year == $i)                            
                    <option selected>{{ $i }}</option>
                @else
                    <option>{{ $i }}</option>                            
                @endif
            @endfor
        </select>
    </div>
</div>

<!-- Checkbox -->
<div class="form-check d-flex mb-4">
    <input class="form-check-input me-2" type="checkbox" value="yes" id="edit_currently_studying" name="currently_studying" value="{{ $education }}"/>
    <label class="form-check-label" for="edit_currently_studying"> I am currently Studying </label>
</div>                    

<!-- Message input -->
<div class=" mb-4">
    <label class="form-label" for="edit_description">Description</label>
    <textarea class="form-control" id="edit_description" name="edited_description" rows="4">{{ $education->description }}</textarea>
</div>

<!-- Submit button -->
<div class="row justify-content-end">
    <div class="col-3 text-end">
        <button id="edit_education_modal_close_button" type="button" class="btn btn-link custom-close" data-mdb-dismiss="modal" style="">Close</button>
    </div>
    <div class="col-3">
        <button type="submit" class="btn btn-bizzzy-success btn-block">Update</button>
    </div>
</div>