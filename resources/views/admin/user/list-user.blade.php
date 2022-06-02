@extends('admin.layouts.app')

@section('admin-content')
    <div class="col-md-12 col-sm-12 ">
        <div class="x_panel">
            <div class="x_title">
                <h2>All Users</h2>
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
            <div class="x_content">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="card-box table-responsive">
                            <table id="datatable-buttons" class="table table-striped table-bordered" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>User Name</th>
                                        <th>Email</th>
                                        <th>Active Status</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>


                                <tbody>
                                    @foreach ($users as $item)
                                        <tr>
                                            <td>{{ $item->name }}</td>
                                            <td>{{ $item->user_name }}</td>
                                            <td>{{ is_null($item->email) ? 'Not Verifired' : $item->email->email }}</td>
                                            <td>
                                                @php
                                                    if ($item->acting_status == '1') {
                                                        echo 'Yes';
                                                    } else {
                                                        echo 'No';
                                                    }
                                                @endphp
                                            </td>

                                            <td>
                                                @php
                                                    if (!$item->userAccount->isEmpty() && $item->userAccount[0]->client_or_freelancer == 1) {
                                                        echo "<button data-toggle='modal' data-target='.bs-example-modal-lg-profile' class='btn btn-primary btn-xs'
                                                                                                                                                                                                                                                                                        onclick='loadprofile($item->id)'><i
                                                                                                                                                                                                                                                                                        class='fa fa-folder'></i> Recruiter </button>";
                                                    } elseif (!$item->userAccount->isEmpty() && $item->userAccount[0]->client_or_freelancer == 2) {
                                                        echo "<button data-toggle='modal' data-target='.bs-example-modal-lg-profile'class='btn btn-primary btn-xs' onclick='loadprofile( $item->id )'><i class='fa fa-folder'></i> Freelancer </button>";
                                                    } elseif (!$item->userAccount->isEmpty() && $item->userAccount[1]->client_or_freelancer == 1) {
                                                        echo "<button data-toggle='modal' data-target='.bs-example-modal-lg-profile' class='btn btn-primary btn-xs'
                                                                                                                                                                                                                                                                                        onclick='loadprofile($item->id)'><i
                                                                                                                                                                                                                                                                                        class='fa fa-folder'></i> Recruiter </button>";
                                                    } elseif (!$item->userAccount->isEmpty() && $item->userAccount[1]->client_or_freelancer == 2) {
                                                        echo "<button data-toggle='modal' data-target='.bs-example-modal-lg-profile'class='btn btn-primary btn-xs' onclick='loadprofile($item->id)'><i class='fa fa-folder'></i> Freelancer </button>";
                                                    }
                                                    
                                                @endphp
                                                <button data-toggle="modal" data-target=".bs-example-modal-lg"
                                                    class="btn btn-info btn-xs"
                                                    onclick="loadsingleuser({{ $item->id }})"><i
                                                        class="fa fa-pencil"></i> Edit
                                                </button>
                                                <button id="delete_button" class="btn btn-danger btn-xs"
                                                    onclick="userdelete({{ $item->id }})">
                                                    <i class="fa fa-trash-o"></i>
                                                    Delete
                                                </button>

                                                {{-- <form action="{{ route('user.delete', ['id' => $item->id]) }}">
                                                    <button type="submit" class="btn btn-link btn-sm btn-rounded"
                                                        onclick="return confirm('Are you sure?')">
                                                        Delete
                                                    </button>
                                                </form> --}}
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
                            <h4 class="modal-title" id="myModalLabel">Edit User</h4>
                            <button type="button" class="close" data-dismiss="modal"><span
                                    aria-hidden="true">×</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="x_content">

                                <form id="user_update_form" data-parsley-validate class="form-horizontal form-label-left">
                                    <input type="hidden" name="user_id" id="user_id">
                                    <div class="item form-group">
                                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">
                                            Name <span class="required">*</span>
                                        </label>
                                        <div class="col-md-6 col-sm-6 ">
                                            <input type="text" name="name" id="name" required="required"
                                                class="form-control ">
                                        </div>
                                    </div>
                                    <div class="item form-group">
                                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">User
                                            Name <span class="required">*</span>
                                        </label>
                                        <div class="col-md-6 col-sm-6 ">
                                            <input type="text" id="user_name" name="user_name" required="required"
                                                class="form-control">
                                        </div>
                                    </div>
                                    <div class="item form-group">
                                        <label for="middle-name" class="col-form-label col-md-3 col-sm-3 label-align">Active
                                            Status
                                        </label>
                                        <div class="col-md-6 col-sm-6 ">
                                            <input id="acting_status" class="form-control" type="text"
                                                name="acting_status">
                                        </div>
                                    </div>
                                    <div class="item form-group">
                                        <label for="middle-name" class="col-form-label col-md-3 col-sm-3 label-align">Photo

                                        </label>
                                        <div class="col-md-6 col-sm-6 ">
                                            <img class="photo" alt="" srcset="" style="height: 150px; width:150px">
                                        </div>
                                    </div>
                                    <div class="item form-group">
                                        <label for="middle-name" class="col-form-label col-md-3 col-sm-3 label-align">Select
                                            New Photo

                                        </label>
                                        <div class="col-md-6 col-sm-6 ">
                                            <input class="form-control" name="photo" type="file" id="photo">
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
            <!-- profile modal -->
            <div class="modal fade bs-example-modal-lg-profile" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">

                        <div class="modal-header">
                            <h4 class="modal-title" id="myModalLabel">Profile</h4>
                            <button type="button" class="close" data-dismiss="modal"><span
                                    aria-hidden="true">×</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="x_content">

                                <form id="" data-parsley-validate class="form-horizontal form-label-left">
                                    <input type="hidden" name="user_id" id="user_id">
                                    <div class="item form-group">
                                        <label class="col-form-label col-md-3 col-sm-3 label-align"
                                            for="last-name">Professional Title
                                            <span class="required"></span>
                                        </label>
                                        <div class="col-md-6 col-sm-6 ">
                                            <input type="text" id="professional_title" name="professional_title" readonly
                                                required="required" class="form-control">
                                        </div>
                                    </div>
                                    <div class="item form-group">
                                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="description">
                                            Description <span class="required"></span>
                                        </label>
                                        <div class="col-md-6 col-sm-6 ">
                                            <textarea type="text" name="description" id="description" required="required" readonly
                                                class="form-control "></textarea>
                                        </div>
                                    </div>
                                    <div class="item form-group">
                                        <label class="col-form-label col-md-3 col-sm-3 label-align"
                                            for="last-name">Availability Badge
                                            <span class="required"></span>
                                        </label>
                                        <div class="col-md-6 col-sm-6 ">
                                            <input type="text" id="availability_badge" name="availability_badge" readonly
                                                required="required" class="form-control">
                                        </div>
                                    </div>
                                    <div class="item form-group">
                                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Average
                                            Rating
                                            <span class="required"></span>
                                        </label>
                                        <div class="col-md-6 col-sm-6 ">
                                            <input type="text" id="average_rating" name="average_rating" required="required"
                                                readonly class="form-control">
                                        </div>
                                    </div>
                                    <div class="item form-group">
                                        <label class="col-form-label col-md-3 col-sm-3 label-align"
                                            for="last-name">Experience Level

                                            <span class="required"></span>
                                        </label>
                                        <div class="col-md-6 col-sm-6 ">
                                            <input type="text" id="experience_level" name="experience_level" readonly
                                                required="required" class="form-control">
                                        </div>
                                    </div>
                                    <div class="item form-group">
                                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Hours
                                            Per Week
                                            <span class="required"></span>
                                        </label>
                                        <div class="col-md-6 col-sm-6 ">
                                            <input type="text" id="hours_per_week" name="hours_per_week" required="required"
                                                readonly class="form-control">
                                        </div>
                                    </div>
                                    <div class="item form-group">
                                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Price
                                            Per Hour
                                            <span class="required"></span>
                                        </label>
                                        <div class="col-md-6 col-sm-6 ">
                                            <input type="text" id="price_per_hour" name="price_per_hour" required="required"
                                                readonly class="form-control">
                                        </div>
                                    </div>
                                    <div class="item form-group">
                                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Profile
                                            Completion Percentage

                                            <span class="required"></span>
                                        </label>
                                        <div class="col-md-6 col-sm-6 ">
                                            <input type="text" id="profile_completion_percentage"
                                                name="profile_completion_percentage" required="required" readonly
                                                class="form-control">
                                        </div>
                                    </div>
                                    <div class="item form-group">
                                        <label class="col-form-label col-md-3 col-sm-3 label-align"
                                            for="profile_visibility">Profile Visibility
                                            <span class="required"></span>
                                        </label>
                                        <div class="col-md-6 col-sm-6 ">
                                            <input type="text" id="profile_visibility" name="profile_visibility" readonly
                                                required="required" class="form-control">
                                        </div>
                                    </div>
                                    <div class="item form-group">
                                        <label class="col-form-label col-md-3 col-sm-3 label-align"
                                            for="project_time_preference">Project Time Preference
                                            <span class="required"></span>
                                        </label>
                                        <div class="col-md-6 col-sm-6 ">
                                            <input type="text" id="project_time_preference" name="project_time_preference"
                                                readonly required="required" class="form-control">
                                        </div>
                                    </div>
                                    <div class="item form-group">
                                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="total_hours">Total
                                            Hours
                                            <span class="required"></span>
                                        </label>
                                        <div class="col-md-6 col-sm-6 ">
                                            <input type="text" id="total_hours" name="total_hours" required="required"
                                                readonly class="form-control">
                                        </div>
                                    </div>
                                    <div class="item form-group">
                                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="total_jobs">Total
                                            Jobs
                                            <span class="required"></span>
                                        </label>
                                        <div class="col-md-6 col-sm-6 ">
                                            <input type="text" id="total_jobs" name="total_jobs" required="required"
                                                readonly class="form-control">
                                        </div>
                                    </div>
                                    <div class="item form-group">
                                        <label class="col-form-label col-md-3 col-sm-3 label-align"
                                            for="total_earnings">Total Earnings
                                            <span class="required"></span>
                                        </label>
                                        <div class="col-md-6 col-sm-6 ">
                                            <input type="text" id="total_earnings" name="total_earnings" required="required"
                                                readonly class="form-control">
                                        </div>
                                    </div>




                                    <div class="ln_solid"></div>
                                    {{-- <div class="item form-group">
                                        <div class="col-md-6 col-sm-6 offset-md-3">
                                            <button type="submit" class="btn btn-success">Update</button>
                                            <button class="btn btn-primary" type="reset">Reset</button>
                                            <button type="button" class="btn btn-secondary"
                                                data-dismiss="modal">Cancel</button>
                                        </div>
                                    </div> --}}

                                </form>
                            </div>
                        </div>
                        {{-- <div class="modal-footer">

                            <button type="button" class="btn btn-primary">Save changes</button>
                        </div> --}}

                    </div>
                </div>
            </div>

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
        let userdelete = (id) => {
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
                        .post(APP_URL + `/admin/user/${id}`, {
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
