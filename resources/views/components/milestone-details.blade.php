<div>
    <p class="text-black"><strong>Release from escrow</strong></p>
    <p style="font-weight: 500">${{number_format($contract_milestone->deposit_amount,2)}} <i class="ms-3 fas fa-pen pointer"></i></p>
    <!-- Default checkbox -->
    <div class="form-check">
        <input class="form-check-input" type="checkbox" value="" name="bonus_pay" id="bonus_pay" />
        <label class="form-check-label" for="bonus_pay">Add Bonus (optional)</label>
    </div>

    @if ($max_id == $contract_milestone->id)        
        <p class="mt-5 text-black"><strong>Contract status</strong></p>
        <!-- Default radio -->
        <div class="form-check">
            <input class="form-check-input" type="radio" name="contract_status" id="contract_status1" value="end"/>
            <label class="form-check-label" for="contract_status1"> End Contract - Work is complete </label>
        </div>
        
        <!-- Default checked radio -->
        <div class="form-check">
            <input class="form-check-input" type="radio" name="contract_status" id="contract_status2" value="continue"/>
            <label class="form-check-label" for="contract_status2"> Keep the contract open - I have more work for NAME </label>
        </div>
    @endif
</div>