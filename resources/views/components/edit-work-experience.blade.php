<form onsubmit="edit_work_experience(this, '{{ encrypt($experience->id) }}')" id="edit_work_experience_form" action="#">
    <!-- 2 column grid layout with text inputs for the first and last names -->
    <label class="form-label" for="edit_work_title">Title*</label>
    <input type="text" name="edit_work_title" id="edit_work_title" class="form-control" value="{{ $experience->title }}"/>
    <div class="invalid-feedback js" id="edit_work_title_invalid"></div>

    <!-- Text input -->
    <label class="form-label mt-3" for="edit_company">Company</label>
    <input type="text" name="edit_company" id="edit_company" class="form-control" value="{{ $experience->company }}" />

    <!-- Text input -->
    <label class="form-label mt-3" for="edit_location">Location</label>
    <input type="text" name="edit_location" id="edit_location" class="form-control" value="{{ $experience->location }}" />

    <!-- Checkbox -->
    <div class="form-check d-flex mb-4 mt-3">
        <input class="form-check-input me-2" type="checkbox" value="1" id="edit_currently_working" name="edit_currently_working" {{ (is_null($experience->currently_working)) ? "" : "checked" }} />
        <label class="form-check-label" for="edit_currently_working"> I am currently working in this role </label>
    </div>

    <div class="row">
        <div class="col-md-6 col-lg-6 col-xl-6 col-sm-12 col-xs-12 mb-sm-2 mb-xs-2">
            <label class="custom-label" for="edit_start_date_div">Start Date</label>
            <div class="row" id="edit_start_date_div">                                
                <div class="col-6">
                    <select name="edit_experience_month_start" id="edit_experience_month_start" aria-label="Default select example">
                        <option value="" selected>Month</option>
                        @for ($i = 1; $i < 13; $i++)
                            @if (!is_null($experience->start_date) AND $i == $experience->start_date->month)
                                <option value="{{ $i }}" selected> {{ sprintf("%02d", $i) }} </option>                            
                            @else
                                <option value="{{ $i }}"> {{ sprintf("%02d", $i) }} </option>                                
                            @endif
                        @endfor
                    </select>
                </div>
                <div class="col-6">
                    <select name="edit_year_start" id="edit_experience_year_start_exp" aria-label="Default select example">
                        <option value="" selected>Year</option>
                        @for ($i = date('Y'); $i > (date('Y') - 80); $i--)
                            @if (!is_null($experience->start_date) AND $i == $experience->start_date->year)
                                <option selected> {{ $i }} </option>                            
                            @else
                                <option> {{ $i }} </option>                                
                            @endif
                        @endfor
                    </select>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-6 col-xl-6 col-sm-12 col-xs-12 mb-4">
            <label class="custom-label" for="edit_end_date_div">End Date</label>
            <div class="row" id="edit_end_date_div">                                
                <div class="col-6">
                    <select name="edit_experience_month_end" id="edit_experience_month_end" aria-label="Default select example">
                        <option value="" selected>Month</option>
                        @for ($i = 1; $i < 13; $i++)
                            @if (!is_null($experience->end_date) AND $i == $experience->end_date->month)
                                <option value="{{ $i }}" selected> {{ sprintf("%02d", $i) }} </option>                            
                            @else
                                <option value="{{ $i }}"> {{ sprintf("%02d", $i) }} </option>                                
                            @endif
                        @endfor
                    </select>
                </div>
                <div class="col-6">
                    <select name="edit_year_end" id="edit_experience_year_end_exp" aria-label="Default select example">
                        <option value="" selected>Year</option>
                        @for ($i = date('Y'); $i > (date('Y') - 80); $i--)
                            @if (!is_null($experience->end_date) AND $i == $experience->end_date->year)
                                <option selected> {{ $i }} </option>                            
                            @else
                                <option> {{ $i }} </option>                                
                            @endif
                        @endfor
                    </select>
                </div>
            </div>
        </div>
    </div>

    <!-- Message input -->
        <label class="form-label" for="edit_description">Description</label>
        <textarea class="form-control" id="edit_description" name="edit_description"  rows="4"></textarea>

    <!-- Submit button -->
    <div class="row justify-content-end mt-3">
        <div class="col-3 text-end">
            <button id="edit_work_modal_close_button" type="button" class="btn btn-link custom-close" data-mdb-dismiss="modal" style="">Close</button>
        </div>
        <div class="col-3">
            <button type="submit" class="btn btn-bizzzy-success btn-block">Save</button>
        </div>
    </div>
</form>