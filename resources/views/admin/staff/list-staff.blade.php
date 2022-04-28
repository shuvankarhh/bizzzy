@extends('admin.layouts.app')

@section('admin-content')
    <div class="col-md-12 col-sm-12 ">
        <div class="x_panel">
            <div class="x_title">
                <h2>All Staffs</h2>
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
                <button class="btn btn-round btn-success" data-toggle="modal" data-target=".bs-example-modal-lg-staff"
                    style="float: right; margin-right:25px;" type="button" onclick="loadroles()">Add New
                    Staff</button>
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
                                    @foreach ($lists as $item)
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

                                                <button data-toggle="modal" data-target=".bs-example-modal-lg"
                                                    class="btn btn-info btn-xs"
                                                    onclick="loadsinglestaff({{ $item->id }})"><i
                                                        class="fa fa-pencil"></i> Edit
                                                </button>
                                                <button id="delete_button" class="btn btn-danger btn-xs"
                                                    onclick="staffdelete({{ $item->id }})">
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
                            <h4 class="modal-title" id="myModalLabel">Edit Staff</h4>
                            <button type="button" class="close" data-dismiss="modal"><span
                                    aria-hidden="true">×</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="x_content">

                                <form id="staff_update_form" data-parsley-validate class="form-horizontal form-label-left">
                                    <input type="hidden" name="user_id" id="user_id">
                                    <div class="item form-group">
                                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">
                                            Full Name <span class="required">*</span>
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
            {{-- Edit modal end --}}


            <!-- staff Add modal -->
            <div class="modal fade bs-example-modal-lg-staff" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">

                        <div class="modal-header">
                            <h4 class="modal-title" id="myModalLabel">Add New Staff</h4>
                            <button type="button" class="close" data-dismiss="modal"><span
                                    aria-hidden="true">×</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="x_content">

                                <form id="staff_add_form" data-parsley-validate class="form-horizontal form-label-left">
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
                                        <label for="middle-name" class="col-form-label col-md-3 col-sm-3 label-align">Email
                                            <span class="required">*</span>
                                        </label>
                                        <div class="col-md-6 col-sm-6 ">
                                            <input id="email" class="form-control" type="text" required="required"
                                                name="email">
                                        </div>
                                    </div>
                                    <div class="field item form-group">
                                        <label class="col-form-label col-md-3 col-sm-3  label-align">Password<span
                                                class="required">*</span></label>
                                        <div class="col-md-6 col-sm-6">
                                            <input class="form-control" type="password" id="password1" name="password"
                                                title="Minimum 8 Characters Including An Upper And Lower Case Letter, A Number And A Unique Character"
                                                required />
                                            {{-- pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[!@#$%^&*]).{8,}" --}}
                                            <span style="position: absolute;right:15px;top:7px;" onclick="hideshow()">
                                                <i id="slash" class="fa fa-eye-slash"></i>
                                                <i id="eye" class="fa fa-eye"></i>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="item form-group">
                                        <label class="col-form-label col-md-3 col-sm-3 label-align ">Role</label>
                                        <div class="col-md-6 col-sm-6 ">
                                            <select class="form-control" id="role" name="role">
                                                <option selected>Select Role</option>

                                            </select>
                                        </div>
                                    </div>
                                    {{-- <div class="item form-group">
                                        <label for="middle-name" class="col-form-label col-md-3 col-sm-3 label-align">Photo

                                        </label>
                                        <div class="col-md-6 col-sm-6 ">
                                            <img class="photo" alt="" srcset="" style="height: 150px; width:150px">
                                        </div>
                                    </div> --}}
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
                                            <button type="submit" class="btn btn-success">Create</button>
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
        </div>
    </div>


    <script>
        function hideshow() {
            var password = document.getElementById("password1");
            var slash = document.getElementById("slash");
            var eye = document.getElementById("eye");

            if (password.type === 'password') {
                password.type = "text";
                slash.style.display = "block";
                eye.style.display = "none";
            } else {
                password.type = "password";
                slash.style.display = "none";
                eye.style.display = "block";
            }

        }
    </script>
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

        // staff delete
        let staffdelete = (id) => {
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
                        .post(APP_URL + `/admin/staff/${id}`, {
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
