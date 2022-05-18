@extends('admin.layouts.app')

@section('admin-content')
    <div class="col-md-12 col-sm-12 ">
        <div class="x_panel">
            <div class="x_title">
                <h2>Users</h2>
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
                        {{-- <div class="card-box table-responsive"> --}}
                        <table id="verification_user_datatable" class="table table-striped table-bordered"
                            style="width:100%">
                            <thead>
                                <tr>
                                    <th>Freelancer Name</th>
                                    <th>Freelancer UserName</th>
                                    <th>Status</th>
                                    <th>Note</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                        {{-- </div> --}}
                    </div>
                </div>
            </div>

            <!-- Edit modal -->
            <div class="modal fade bs-example-modal-lg-milestone" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">

                        <div class="modal-header">
                            <h4 class="modal-title" id="myModalLabel">Milestones</h4>
                            <button type="button" class="close" data-dismiss="modal"><span
                                    aria-hidden="true">×</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="x_content">

                                <table id="milestone_datatable" class="table table-striped table-bordered"
                                    style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>Milestone</th>
                                            <th>Deposite Amount</th>
                                            <th>Start Date</th>
                                            <th>End Date</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                </table>



                                {{-- <div class="ln_solid"></div>
                                <div class="item form-group">
                                    <div class="col-md-6 col-sm-6 offset-md-3">
                                        <button type="submit" class="btn btn-success">Update</button>
                                        <button class="btn btn-primary" type="reset">Reset</button>
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                    </div>
                                </div> --}}


                            </div>
                        </div>


                    </div>
                </div>
            </div>
            {{-- Edit modal end --}}

        </div>
    </div>
@endsection



@push('js')
    <script>
        $(function() {
            refreshTable();
            $('#verification_user_datatable').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('user.get.data') }}",
                columns: [{
                        data: 'user.name',
                        name: 'user.name'
                    },
                    {
                        data: 'user.user_name',
                        name: 'user.user_name'
                    },
                    {
                        data: 'status',
                        name: 'status'
                    },
                    {
                        data: 'note',
                        name: 'note'
                    },
                    {
                        data: 'action',
                        name: 'action'
                    },

                ],
                rowCallback: function(row, data, index) {
                    if (data.status == 0) {
                        $("td:eq(2)", row).html("Pending");
                    } else if (data.status == 1) {
                        $("td:eq(2)", row).html("Approved");
                    } else if (data.status == 2) {
                        $("td:eq(2)", row).html("Rejected");
                    }

                    // if (data.service_charge_type == 1) {
                    //     $("td:eq(5)", row).html("Fixed");
                    // } else if (data.service_charge_type == 2) {
                    //     $("td:eq(5)", row).html("Percentage");
                    // }

                }

            });
        });

        loadmilestone = (id) => {
            refreshTable();
            $('#milestone_datatable').DataTable({
                processing: true,
                serverSide: true,
                ajax: `{{ route('job.get.milestone') }}?id=${id}`,
                columns: [{
                        data: 'name',
                        name: 'name'
                    },
                    {
                        data: 'deposit_amount',
                        name: 'deposit_amount'
                    },
                    {
                        data: 'start_date',
                        name: 'start_date'
                    },
                    {
                        data: 'end_date',
                        name: 'end_date'
                    },
                    {
                        data: 'is_complete',
                        name: 'is_complete'
                    },


                ],
                rowCallback: function(row, data, index) {
                    //console.log(data.is_complete);
                    if (data.is_complete == 0) {
                        $("td:eq(4)", row).html("Pending");
                    } else if (data.is_complete == 1) {
                        $("td:eq(4)", row).html("Complete");
                    }


                }


            });

            //$('#milestone_datatable').DataTable().ajax.reload();
        };

        function refreshTable() {
            //$('#milestone_datatable').DataTable().clear();
            $('#milestone_datatable').DataTable().destroy();
            // $('#milestone_datatable').DataTable().ajax.reload();
        }







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
