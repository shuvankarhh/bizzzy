@extends('admin.layouts.app')

@section('admin-content')

<div class="row">
    <div class="col-sm-12">
        {{-- <div class="card-box table-responsive"> --}}
        <table id="withdraw_requests" class="table table-striped table-bordered"
            style="width:100%">
            <thead>
                <tr>
                    <th>Requested by</th>
                    <th>Requested amount</th>
                    <th>Requested at</th>
                    <th>Status</th>
                    <th>Approval info</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
        {{-- </div> --}}
    </div>
</div>

@endsection

@push('js')
    <script>
        $(function() {
            $('#withdraw_requests').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('admin.withdraw.request.datatable') }}",
                columns: [{
                        data: 'user.name',
                        name: 'user.name'
                    },
                    {
                        data: 'amount',
                        name: 'amount'
                    },
                    {
                        data: 'created_at',
                        name: 'created_at'
                    },
                    {
                        data: 'status',
                        name: 'status'
                    },
                    {
                        data: 'approval',
                        name: 'approval'
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
    </script>
@endpush