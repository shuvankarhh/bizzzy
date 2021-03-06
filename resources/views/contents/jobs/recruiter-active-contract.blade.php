@extends('layouts.app')
@section('navbar')
    <x-navbar links="true" />
@endsection
@section('content')
    <div class="container pt-3 pb-3">
        <div class="row">
            <div class="col-2 text-center   ">
                <img class="dp-image" src="{{ asset('storage/' . $contract->freelancer->photo) }}" alt="">
            </div>
            <div class="col-10">
                <p class="mb-0 pb-0"><span style="font-size: 2rem">{{ $contract->freelancer->name }}</span></p>
                <p>{{ $contract->job->name }}</p>
                <strong class="m-0 p-0">Hired: {{ ($contract->payment_type == 1) ? 'Fixed Price' : 'Hourly' }}, ${{ $contract->price }}</strong>
            </div>
        </div>
        <hr>
        <div style="display: grid; grid-template-columns: repeat(4, 1fr)">
            <div>
                <h5>Budget</h5>
                <p class="m-0 p-0" style="font-size: 1.234rem; color: black">${{ $contract->price }}</p>
                <input type="hidden" name="budget" id="budget" value="{{ $contract->milestone_security_balance }}">
            </div>
            <div>
                <h5>In Escrow</h5>
                <p class="m-0 p-0" style="font-size: 1.234rem; color: black">${{ $contract->milestone_security_balance }}</p>
                <input type="hidden" name="in_escrow" id="in_escrow" value="{{ $contract->milestone_security_balance }}">
            </div>
            <div>
                <h5>Milestone Paid</h5>
                <p class="m-0 p-0" style="font-size: 1.234rem; color: black">${{$contract->milestones->sum('paid_amount');}}</p>
                <input type="hidden" name="paid" id="paid" value="{{ $contract->milestone_security_balance }}">
            </div>
            <div>
                <h5>Remaining</h5>
                <p class="m-0 p-0" style="font-size: 1.234rem; color: black">${{ $contract->price - ($contract->milestone_security_balance + $contract->milestones->sum('paid_amount')) }}</p>
                <input type="hidden" name="remaining" id="remaining" value="{{ $contract->milestone_security_balance }}">
            </div>
            {{-- <div>
                <h5>Total Payments</h5>
                <p class="m-0 p-0" style="font-size: 1.234rem; color: black">${{ $contract->price }}</p>
            </div> --}}
        </div>
        <hr>
        <div class="row">
            <div class="col-2">
                <a href="#">Overview</a>
            </div>
            <div class="col-10">
                <p style="font-size: 1.3rem">Payments</p>
                <hr>
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">Milestone</th>
                        <th scope="col">Amount</th>
                        <th scope="col">Due Date</th>
                        <th scope="col"></th>
                    </tr>
                    </thead>
                    <tbody>
                        @php
                            $relase_fund_button = false;
                        @endphp
                        @foreach ($contract->milestones as $item)
                            <tr>
                                <td scope="row">{{ $item->name }}</td>
                                <td>${{ $item->deposit_amount }}</td>
                                <td>{{ $item->end_date }}</td>
                                <td>
                                    @if ($item->is_complete == 2 AND !$relase_fund_button)
                                        <button data-mdb-target="#pay_milestone" data-mdb-toggle="modal" data-milestone="{{ encrypt($item->id) }}" id="release_fund" class="btn btn-success">Release Fund</button>
                                        @php
                                            $relase_fund_button = true;
                                        @endphp
                                    @elseif ($item->is_complete == 1)
                                        <p>Completed!</p>
                                    @else
                                        <button data-milestone="{{ $item->id }}" data-mdb-target="#edit_milestone_modal" data-mdb-toggle="modal" data-name="{{ $item->name }}" data-deposit_amount="{{ $item->deposit_amount }}" data-end_date="{{ Str::substr($item->end_date, 0, 10); }}" class="btn btn-secondary contract-edit-button">Edit</button>
                                    @endif
                                </td>
                            </tr>                            
                        @endforeach
                    </tbody>
                </table>                
                @if (!$relase_fund_button)
                    <button data-contract="{{ $contract_id }}" data-mdb-target="#activate_milestone_modal" data-mdb-toggle="modal" id="activate_next_milestone" class="btn btn-primary"><i class="fa-solid fa-check-to-slot"></i> Activate Next Milestone</button>
                    <a href="{{ route('recruiter.end.contract.create', $contract_id) }}" class="btn btn-danger"><i class="fa-solid fa-xmark"></i> End Contract</a> 
                @endif
                <button class="btn btn-success" data-mdb-toggle="modal" data-mdb-target="#add_new_milestone"><i class="fas fa-plus"></i> Add New Milestone</button>
            </div>
        </div>
    </div>
    {{-- Add New Milestone modal --}}
    <div class="modal fade" id="add_new_milestone" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <form action="#" id="add_new_milestone_form">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Add New Milestone</h5>
                        <button
                            type="button"
                            class="btn-close"
                            data-mdb-dismiss="modal"
                            aria-label="Close"
                        ></button>
                    </div>
                    <div class="modal-body p-4" id="add_new_milestone_body">
                        <input type="hidden" name="add_milestone_to" id="add_milestone_to" value="{{$contract_id}}">
                        <div id="milestones">
                            <p id="new_milestone_pre_payment_error" class="text-danger d-none"><i class="fas fa-exclamation-circle"></i> Please fill all inputs!</p>
                            <p id="payment_info" class="d-none"><i class="fas fa-exclamation-circle"></i> <span id="new_milestone_error_message">You will be charded approxiamtely $<span id="payment_amount"></span> to fund your milestone!</span></p>
                            <div class="c-flex f-gap-3">
                                <div class="form-group">
                                    <label for="milestone_name" >Milestone Name</label>
                                    <input type="text" class="form-control" name="milestone_name[]" id="milestone_name.0" value="" required placeholder="Milestone Name"/>
                                    <div id="milestone_name_invalid" class="invalid-feedback js"></div>
                                </div>
                                <div class="form-group">
                                    <label for="deposit_amount" >Deposit Amount</label>
                                    <input type="text" class="form-control" name="deposit_amount[]" id="deposit_amount.0" value="" required placeholder="Deposit Amount"/>
                                    <div id="deposit_amount_invalid" class="invalid-feedback js"></div>
                                </div>
                                <div class="form-group">
                                    <label for="due_date" >Due Date</label>
                                    <input type="date" class="form-control" name="due_date[]" id="due_date.0" value="" required/>
                                    <div id="due_date_invalid" class="invalid-feedback js"></div>
                                </div>
                            </div>
                            <div id="add_more_milestones"></div>
                        </div>
                        <div class="d-none" id="payment_div">

                        </div>
                    </div>
                    <div class="modal-footer">
                        <span id="additional_milestone_buttons">
                            <button type="button" class="btn btn-danger" id="remove_last"><i class="fas fa-minus"></i> Remove Last</button>
                            <button type="button" class="btn btn-success" id="additional_milestone"><i class="fas fa-plus"></i> Add More Milestones</button>
                            <button id="add_button" class="btn btn-primary">Add</button>
                            <button id="payment_button" type="button" class="btn btn-primary d-none">Proceed to payment</button>
                        </span>
                        <span class="d-none" id="additional_milestone_payment_buttons">
                            <button id="payment_reverse_button" type="button" class="btn btn-info"><i class="fas fa-arrow-left"></i> Go to previous step</button>
                            <button id="fund_submit" class="btn btn-primary">Fund And Submit</button>
                        </span>
                    </div>
                </div>
            </form>
        </div>
    </div>
    {{-- Template for new milestone --}}
    <template id="additional_milestone_contente">
        <div class="c-flex f-gap-3 mt-3">
            <div class="form-group">
                <label for="milestone_name" >Milestone Name</label>
                <input type="text" class="form-control" name="milestone_name[]" value="" required placeholder="Milestone Name"/>
                <div id="milestone_name_invalid" class="invalid-feedback js"></div>
            </div>
            <div class="form-group">
                <label for="deposit_amount" >Deposit Amount</label>
                <input type="text" class="form-control" name="deposit_amount[]" value="" required placeholder="Deposit Amount"/>
                <div id="deposit_amount_invalid" class="invalid-feedback js"></div>
            </div>
            <div class="form-group">
                <label for="due_date" >Due Date</label>
                <input type="date" class="form-control" name="due_date[]" value="" required/>
                <div id="due_date_invalid" class="invalid-feedback js"></div>
            </div>
        </div>
    </template>
    {{-- Modal for Releasing mielstone --}}
    <div class="modal fade" id="pay_milestone" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <form action="#" id="release_payment_form" name="{{ Str::random(5) }}">
                
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Approve & Pay</h5>
                        <button
                            type="button"
                            class="btn-close"
                            data-mdb-dismiss="modal"
                            aria-label="Close"
                        ></button>
                    </div>
                    <div class="modal-body p-4" id="pay_milestone_body">
                    </div>
                    <div class="modal-footer">
                        <div id="proceed_buttons">
                            <button id="milestone_release_proceed_to_payment" type="button" class="btn btn-primary d-none">Proceed to payment</button>
                            <button id="milestone_release_send_payment" class="btn btn-success">Send Payment</button>
                        </div>
                        <div id="payment_button_div" class="d-none">
                            <button id="milestone_release_payment" class="btn btn-success">Pay & Submit</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    {{-- Activate next milestone --}}
    <div class="modal fade" id="activate_milestone_modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <form action="#" id="activate_milestone_form" name="{{ Str::random(5) }}">
                
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Activate next milestone</h5>
                        <button
                            type="button"
                            class="btn-close"
                            data-mdb-dismiss="modal"
                            aria-label="Close"
                        ></button>
                    </div>
                    <div id="activate_milestone_body">
                        
                    </div>
                </div>
            </form>
        </div>
    </div>
    {{-- Edit milestone --}}
    <div class="modal fade" id="edit_milestone_modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <form action="#" id="edit_milestone_form" name="{{ Str::random(5) }}">
                
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Edit milestone</h5>
                        <button
                            type="button"
                            class="btn-close"
                            data-mdb-dismiss="modal"
                            aria-label="Close"
                        ></button>
                    </div>
                    <div class="modal-body p-4" id="pay_milestone_body">
                        <input type="hidden" id="edit_milestone">
                        <label for="edit_name">Milestone name</label>
                        <input type="text" name="milestone_name_edit" id="milestone_name_edit" class="form-control">
                        <div id="milestone_name_edit_invalid" class="invalid-response"></div>
                        <label for="edit_amount">Deposit amount</label>
                        <input type="text" name="deposit_amount_edit" id="deposit_amount_edit" class="form-control">
                        <div id="deposit_amount_edit_invalid" class="invalid-response"></div>
                        <label for="edit_date">End date</label>
                        <input type="date" name="end_date_edit" id="end_date_edit" class="form-control">
                        <div id="end_date_edit_invalid" class="invalid-response"></div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-success">Save</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection

@push('script')
    <script>
        
        const remove_last = document.getElementById('remove_last');
        remove_last.addEventListener('click', () => {
            let add_more_milestones = document.getElementById('add_more_milestones');
            add_more_milestones.lastElementChild.remove();
        });
        const additonal = document.getElementById('additional_milestone');
        additonal.addEventListener('click', () => {
            let add_more_milestones = document.getElementById('add_more_milestones');
            
            var template = document.querySelector('#additional_milestone_contente');
            let length = add_more_milestones.childElementCount + 1;

            var clone = template.content.cloneNode(true);
            let inputs = clone.querySelectorAll('input');
            inputs[0].setAttribute('id', `milestone_name.${length}`);
            inputs[1].setAttribute('id', `deposit_amount.${length}`);
            inputs[2].setAttribute('id', `due_date.${length}`);

            add_more_milestones.appendChild(clone);
        });
        @if (!$relase_fund_button)
            deposit_amount.addEventListener('keyup', calculate_deposit_amount)
        @endif

        document.getElementById('add_new_milestone_form').addEventListener('submit', add_milestone_form_submit);
        document.getElementById('payment_button').addEventListener('click', add_milestone_payment);
        document.getElementById('payment_reverse_button').addEventListener('click', milestoen_payment_reverse);
        document.getElementById('release_payment_form').addEventListener('submit', release_payment_form_submit);
        let release_fund = document.getElementById('release_fund');
        if(release_fund){
            release_fund.addEventListener('click', release_fund_handeler);
        }
        document.getElementById('milestone_release_proceed_to_payment').addEventListener('click', proceed_to_payment);
        let activate_next_milestone = document.getElementById('activate_next_milestone');
        if(activate_next_milestone){
            activate_next_milestone.addEventListener('click', activate_next_milestone_handeler);
        }

        document.getElementById('activate_milestone_form').addEventListener('submit', activate_milestone_form_handler);
        
        let contract_edits = document.querySelectorAll('.contract-edit-button');
        contract_edits.forEach(element => {
            element.addEventListener('click', editMilestoneHandler);
        });

        document.getElementById('edit_milestone_form').addEventListener('submit', edit_milestone_form_handler);
        
        
    </script>
@endpush