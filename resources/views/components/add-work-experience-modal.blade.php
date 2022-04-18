<div class="modal fade" id="work_modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Work Experience</h5>
                <button
                    type="button"
                    class="btn-close"
                    data-mdb-dismiss="modal"
                    aria-label="Close"
                ></button>
            </div>
            <div class="modal-body p-4">
                <form onsubmit="add_work_experience()" id="work_experience_form" action="#">
                    <!-- 2 column grid layout with text inputs for the first and last names -->
                    <div class="form-outline mb-4">
                        <input type="text" name="title" id="title" class="form-control" />
                        <label class="form-label" for="title">Title*</label>
                        <div id="title_invalid" class="invalid-feedback js"></div>
                    </div>

                    <!-- Text input -->
                    <div class="form-outline mb-4">
                        <input type="text" name="company" id="company" class="form-control" />
                        <label class="form-label" for="company">Company</label>
                    </div>

                    <!-- Text input -->
                    <div class="form-outline mb-4">
                        <input type="text" name="location" id="location" class="form-control" />
                        <label class="form-label" for="location">Location</label>
                    </div>

                    <!-- Checkbox -->
                    <div class="form-check d-flex mb-4">
                        <input class="form-check-input me-2" type="checkbox" value="1" id="currently_working" name="currently_working"/>
                        <label class="form-check-label" for="currently_working"> I am currently working in this role </label>
                    </div>

                    <div class="row">
                        <div class="col-md-6 col-lg-6 col-xl-6 col-sm-12 col-xs-12 mb-sm-2 mb-xs-2">
                            <label class="custom-label" for="start_date_div">Start Date</label>
                            <div class="row" id="start_date_div">                                
                                <div class="col-6">
                                    <select name="month_start" id="month_start" class="form-select" aria-label="Default select example">
                                        <option value="" selected>Month</option>
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
                                <div class="col-6">
                                    <select name="year_start" id="year_start" class="form-select" aria-label="Default select example">
                                        <option value="" selected>Year</option>
                                        <option>2020</option>
                                        <option>2021</option>
                                        <option>2022</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-6 col-xl-6 col-sm-12 col-xs-12 mb-4">
                            <label class="custom-label" for="end_date_div">End Date</label>
                            <div class="row" id="end_date_div">                                
                                <div class="col-6">
                                    <select name="month_end" id="month_end" class="form-select" aria-label="Default select example">
                                        <option value="" selected>Month</option>
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
                                <div class="col-6">
                                    <select name="year_end" id="year_end" class="form-select" aria-label="Default select example">
                                        <option value="" selected>Year</option>
                                        <option >2020</option>
                                        <option >2021</option>
                                        <option >2022</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Message input -->
                    <div class="form-outline mb-4">
                        <textarea class="form-control" id="description" name="description"  rows="4"></textarea>
                        <label class="form-label" for="description">Description</label>
                    </div>

                    <!-- Submit button -->
                    <div class="row justify-content-end">
                        <div class="col-3 text-end">
                            <button id="work_modal_close_button" type="button" class="btn btn-link custom-close" data-mdb-dismiss="modal" style="">Close</button>
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