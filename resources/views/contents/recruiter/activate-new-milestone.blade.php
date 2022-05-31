<div class="modal-body p-4" >
    <input type="hidden" id="activate_contract" value="{{ encrypt($contract->id) }}">
    @if ($contract->milestones->isEmpty())
        <p class="text-danger">No Pending Contract</p>
    @else
        <h5>Activate milestone: <i>"{{ $contract->milestones[0]->name }}"</i> </h5>
        <h5>JOB <i>"{{ $contract->job->name }}"</i></h5>
        <h6>Milestone for: </h6>
        <p>
            <img style="border-radius: 50%" width="80px" src="{{ asset("storage/".$contract->freelancer->photo) }}" alt="">
            <span style="font-size: 1.2rem">{{ $contract->freelancer->name }} </span>
        </p>
        <hr>
        @if ($contract->milestone_security_balance > $contract->milestones[0]->deposit_amount)
            <p class="text-black">You have ${{ $contract->milestone_security_balance }} in escrow and next milestone amount is ${{ $contract->milestones[0]->deposit_amount }}</p>
            <p class="text-black">You will not be charged! Your escrow balance will be used for this milestone!</p>
        @elseif($contract->milestone_security_balance > 0)
            <p class="text-black">You have ${{ $contract->milestone_security_balance }} in escrow and next milestone amount is ${{ $contract->milestones[0]->deposit_amount }}</p>
            <x-payment-methods :payment-methods="$payment_methods" :amount="($contract->milestones[0]->deposit_amount - $contract->milestone_security_balance)" />
        @else
            <x-payment-methods :payment-methods="$payment_methods" :amount="$contract->milestones[0]->deposit_amount" />
        @endif
    @endif    
</div>
<div class="modal-footer">
    @if ($contract->milestone_security_balance > $contract->milestones[0]->deposit_amount)
    <button id="activate_milestone_btn" class="btn btn-success">Activate</button>
    @else
    <button id="activate_milestone_btn" class="btn btn-success">Fund & Activate</button>
    @endif
</div>