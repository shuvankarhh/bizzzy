@extends('layouts.app')
@section('navbar')
    <x-navbar links="true" />
@endsection
@push('css')
    <style>
        .nav-fill .nav-item, .nav-fill>.nav-link {
            text-align: start;
        }
    </style>
@endpush
@section('content')
<div class="container">
    <ul class="nav-fill w-100 nav flex-column flex-sm-column flex-md-row flex-lg-row flex-xl-row flex-xxl-row text-center text-xs-center text-md-start text-lg-start text-xl-start text-xxl-start nav-tabs mb-3" id="ex1" role="tablist">
        <li class="nav-item" role="presentation">
            <a class="nav-link pe-5" id="work_in_progress" data-mdb-toggle="tab" href="#work_in_progress_tab" role="tab" aria-controls="work_in_progress" aria-selected="true">
                <span style="font-size: 1rem">Work in progress <i class="fas fa-circle-exclamation"></i></span>
                <p class="mt-2" style="color: black; font-size: 1.4rem">${{ number_format($in_progress->sum('deposit_amount'),2) }}</p>
            </a>
        </li>
        <li class="nav-item" role="presentation">
            <a class="nav-link pe-5" id="in_review" data-mdb-toggle="tab" href="#in_review_tab" role="tab" aria-controls="in_review" aria-selected="false">
                <span style="font-size: 1rem">In Review <i class="fas fa-circle-exclamation"></i></span>
                <p class="mt-2" style="color: black; font-size: 1.4rem">$0.00</p>
            </a>
        </li>
        <li class="nav-item" role="presentation">
            <a class="nav-link pe-5" id="pending" data-mdb-toggle="tab" href="#pending_tab" role="tab" aria-controls="pending" aria-selected="false">
                <span style="font-size: 1rem">Pending <i class="fas fa-circle-exclamation"></i></span>
                <p class="mt-2" style="color: black; font-size: 1.4rem">${{ number_format($pending,2) }}</p>                    
            </a>
        </li>
        <li class="nav-item" role="presentation">
            <a class="nav-link active  pe-5" id="available" data-mdb-toggle="tab" href="#available_tab" role="tab" aria-controls="available" aria-selected="false">
                <span style="font-size: 1rem">Available <i class="fas fa-circle-exclamation"></i></span>
                <p class="mt-2" style="color: black; font-size: 1.4rem">${{ number_format($balance->balance,2) }}</p>                    
            </a>
        </li>
    </ul>
    <div class="tab-content" id="ex1-content">
        <div class="tab-pane fade" id="work_in_progress_tab" role="tabpanel" aria-labelledby="work_in_progress_tab">
            @foreach ($contracts as $item)
                <p>{{ $item->job->name }}</p>
            @endforeach
        </div>
        <div class="tab-pane fade" id="in_review_tab" role="tabpanel" aria-labelledby="in_review_tab">
        </div>
        <div class="tab-pane fade" id="pending_tab" role="tabpanel" aria-labelledby="pending_tab">
        </div>
        <div class="tab-pane fade show active" id="available_tab" role="tabpanel" aria-labelledby="available_tab">            
            <div class="row justify-content-between">
                <div class="col-12 col-sm-12 col-md-8 col-lg-8 col-xl-4">
                    <form action="#" id="withdraw_balance_form">
                        <div class="card">
                            <div class="card-header">
                                <h5>Get paid now</h5>
                            </div>
                            <div class="card-body" style="display: inline !important;">
                                @if ($balance->balance == 0)
                                    <p>No balance to withdraw!</p>
                                @else
                                    <!-- Default radio -->
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="withdraw_type" id="withdraw_type" value="full" checked/>
                                        <label class="form-check-label" for="withdraw_type"> Withdraw full ${{ number_format($balance->balance) }} amount </label>
                                        <div id="withdraw_type_invalid" class="invalid-response"></div>
                                    </div>
                                    
                                    <!-- Default checked radio -->
                                    <div class="form-check mt-2">
                                        <input class="form-check-input" type="radio" name="withdraw_type" id="withdraw_type2" value="other"/>
                                        <label class="form-check-label" for="withdraw_type2"> Other amount </label>
                                    </div>
                                    <div class="form-outline d-none mt-3" id="other_amount_div">
                                        <input type="text" id="other_amount" name="other_amount" class="form-control" />
                                        <label class="form-label" for="other_amount">Withdraw amount</label>
                                        <div id="other_amount_invalid" class="invalid-feedback js"></div>
                                    </div>
                                @endif                                
                            </div>
                            @if ($balance->balance > 0)
                            <div class="card-footer text-end">
                                <button class="btn btn-success">Get paid</button>
                            </div>
                            @endif
                        </div>
                    </form>
                </div>
                <div class="col-xl-7">
                    <div class="card">
                        <div class="card-header">
                            Recent activity
                        </div>
                        <div class="card-body">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Request amount</th>
                                        <th>Requested at</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($recent_activity as $item)
                                        <tr>
                                            <td>{{ number_format($item->amount, 2) }}</td>
                                            <td>{{ $item->created_at->format('d F, Y') }}</td>
                                            <td>
                                                @if ($item->status == 0)
                                                    <span class="badge badge-secondary">Pending</span>
                                                @elseif($item->status == 1)
                                                    <span class="badge badge-success">Appored</span>
                                                @else
                                                    <span class="badge badge-danger">Rejected</span>
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
    </div>
</div>
@endsection

@push('script')
    <script>
        let toggle_other_amount = (e) => {
            if(e.target.value == 'full'){
                document.getElementById('other_amount_div').classList.add('d-none');
            }else{
                document.getElementById('other_amount_div').classList.remove('d-none');
            }
        }
        let withdraw_type = document.querySelectorAll("input[name=withdraw_type]");
        withdraw_type.forEach(element => {
            element.addEventListener('click', toggle_other_amount);
        });

        document.getElementById('withdraw_balance_form').addEventListener('submit', withdraw_balance_form_handeler);
    </script>
@endpush