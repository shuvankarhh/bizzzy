@extends('admin.layouts.app')

@section('admin-content')
    <div class="col-md-12 col-sm-12 ">
        <div class="x_panel">
            <div class="x_title">
                <h2>All Jobs</h2>
                {{-- <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i
                                class="fa fa-wrench"></i></a>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item" href="#">Settings 1</a>
                            <a class="dropdown-item" href="#">Settings 2</a>
                        </div>
                    </li>
                    <li><a class="close-link"><i class="fa fa-close"></i></a>
                    </li>
                </ul> --}}
                <div class="clearfix"></div>
            </div>
            <div>
                {{-- <button class="btn btn-round btn-success" data-toggle="modal" data-target=".bs-example-modal-lg-staff"
                    style="float: right; margin-right:25px;" type="button" onclick="loadroles()">Add New
                    Staff</button> --}}
            </div>
            <div class="x_content">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="card-box table-responsive">

                            <table id="datatable-buttons" class="table table-striped table-bordered" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Description</th>
                                        <th>Job Visibility</th>
                                        <th>Project Time</th>
                                        <th>Project Type</th>
                                        <th>Experience Level</th>
                                        <th>Price Type</th>
                                        <th>Price</th>
                                        <th>Total Proposal</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>


                                <tbody>
                                    @foreach ($jobs as $item)
                                        <tr>
                                            <td>{{ $item->name }}</td>
                                            <td>{{ $item->description }}</td>
                                            <td>{{ $item->job_visibility }}</td>
                                            <td>{{ $item->project_time }}</td>
                                            <td>
                                                {{ $item->project_type }}
                                            </td>
                                            <td>
                                                {{ $item->experience_level }}
                                            </td>
                                            <td>
                                                {{ $item->price_type }}
                                            </td>
                                            <td>{{ $item->price }} </td>
                                            <td>{{ $item->total_proposals }} </td>

                                            <td>

                                                <button data-toggle="modal" data-target=".bs-example-modal-lg"
                                                    class="btn btn-info btn-xs"
                                                    onclick="loadsinglejob({{ $item->id }})"><i
                                                        class="fa fa-pencil"></i> Edit
                                                </button>
                                                <button id="delete_button" class="btn btn-danger btn-xs"
                                                    onclick="jobdelete({{ $item->id }})">
                                                    <i class="fa fa-trash-o"></i>
                                                    Delete
                                                </button>


                                            </td>
                                        </tr>
                                    @endforeach


                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Edit modal -->
            <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">

                        <div class="modal-header">
                            <h4 class="modal-title" id="myModalLabel">Edit Job</h4>
                            <button type="button" class="close" data-dismiss="modal"><span
                                    aria-hidden="true">×</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="x_content">

                                <form id="job_update_form" data-parsley-validate class="form-horizontal form-label-left">
                                    <input type="hidden" name="job_id" id="job_id">
                                    <div class="item form-group">
                                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">
                                            Job Name <span class="required">*</span>
                                        </label>
                                        <div class="col-md-6 col-sm-6 ">
                                            <input type="text" name="name" id="name" required="required"
                                                class="form-control ">
                                        </div>
                                    </div>
                                    <div class="item form-group">
                                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Job
                                            Description
                                            <span class="required">*</span>
                                        </label>
                                        <div class="col-md-6 col-sm-6 ">
                                            <textarea type="text" id="description" name="description" required="required" class="form-control"></textarea>
                                        </div>
                                    </div>
                                    <div class="item form-group">
                                        <label for="middle-name" class="col-form-label col-md-3 col-sm-3 label-align">Job
                                            Visibility
                                        </label>
                                        <div class="col-md-6 col-sm-6 ">
                                            <select name="job_visibility" id="job_visibility" class="form-control">
                                                <option value="1">Private</option>
                                                <option value="2">Public</option>
                                                <option value="3">This App Users Only</option>

                                            </select>
                                        </div>
                                    </div>
                                    <div class="item form-group">
                                        <label for="middle-name"
                                            class="col-form-label col-md-3 col-sm-3 label-align">Project Time
                                        </label>
                                        <div class="col-md-6 col-sm-6 ">
                                            <select name="project_time" id="project_time" class="form-control">
                                                <option value="1">
                                                    Less than
                                                    1 Month
                                                </option>
                                                <option value="2">1 to 3
                                                    Months
                                                </option>
                                                <option value="3">3 to 6 Months
                                                </option>
                                                <option value="4">
                                                    More
                                                    than 6 Months
                                                </option>

                                            </select>
                                        </div>
                                    </div>
                                    <div class="item form-group">
                                        <label for="middle-name" class="col-form-label col-md-3 col-sm-3 label-align">Project Type</label>
                                        <div class="col-md-6 col-sm-6 ">
                                            <select name="project_type" id="project_type" class="form-control">
                                                <option value="1">One-time project</option>
                                                <option value="2">Ongoing project</option>

                                            </select>
                                        </div>
                                    </div>
                                    <div class="item form-group">
                                        <label for="middle-name" class="col-form-label col-md-3 col-sm-3 label-align">Experience Level</label>
                                        <div class="col-md-6 col-sm-6 ">
                                            <select name="experience_level" id="experience_level" class="form-control">
                                                <option value="1">Entry</option>
                                                <option value="2">Intermediate</option>
                                                <option value="3">Expert</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="item form-group">
                                        <label for="middle-name" class="col-form-label col-md-3 col-sm-3 label-align">Project Type</label>
                                        <div class="col-md-6 col-sm-6 ">
                                            <select name="price_type" id="price_type" class="form-control">
                                                <option >Fixed</option>
                                                <option >Hourly</option>

                                            </select>
                                        </div>
                                    </div>
                                    <div class="item form-group">
                                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="price">
                                            Price <span class="required"></span>
                                        </label>
                                        <div class="col-md-6 col-sm-6 ">
                                            <input type="text" name="price" id="price" required="required"
                                                class="form-control ">
                                        </div>
                                    </div>


                                    <div class="ln_solid"></div>
                                    <div class="item form-group">
                                        <div class="col-md-6 col-sm-6 offset-md-3">
                                            <button type="submit" class="btn btn-success">Update</button>
                                            <button class="btn btn-primary" type="reset">Reset</button>
                                            <button type="button" class="btn btn-secondary"
                                                data-dismiss="modal">Cancel</button>
                                        </div>
                                    </div>

                                </form>
                            </div>
                        </div>
                        {{-- <div class="modal-footer">

                            <button type="button" class="btn btn-primary">Save changes</button>
                        </div> --}}

                    </div>
                </div>
            </div>
            {{-- Edit modal end --}}

        </div>
    </div>


@endsection



@push('js')
    <script>
        @if (Session::has('message'))
            new PNotify({
            text: "{{ Session::get('message') }}",
            type: 'success',
            styling: 'bootstrap3'
            });
        @endif

        // job delete
        let jobdelete = (id) => {
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    axios
                        .post(APP_URL + `/admin/job/${id}`, {
                            _method: 'DELETE'
                        })
                        .then(function(response) {
                            //console.log(response);
                            location.reload();



                        })
                        .catch(function(error) {

                        });
                }
            })
        }
    </script>
@endpush
