<div>
    <p class="text-black"><strong>Release from escrow</strong></p>
    <p id="pay_amount_first_show" style="font-weight: 500">${{number_format($contract_milestone->deposit_amount,2)}} <i id="toggle_pay_amount" class="ms-3 fas fa-pen pointer"></i></p>
    <input value="{{$contract_milestone->deposit_amount}}" name="pay_amount" id="pay_amount" class="form-control d-none w-50">
    <div id="pay_amount_invalid" class="invalid-feedback js"></div>
    <!-- Default checkbox -->
    <div class="form-check mt-3">
        <input class="form-check-input" type="checkbox" value="yes" name="bonus_pay" id="bonus_pay" />
        <label class="form-check-label" for="bonus_pay">Add Bonus (optional)</label>
    </div>
    <div class="form-group mt-2 d-none" id="bonus_input">
        <label for="bonus">Provide bonus amount</label>
        <input type="number" name="bonus" id="bonus" class="form-control w-50" step="any">
        <div id="bonus_invalid" class="invalid-feedback js"></div>
    </div>

    @if ($max_id == $contract_milestone->id)        
        <p class="mt-5 text-black"><strong>Contract status</strong></p>
        <!-- Default radio -->
        <div class="form-check">
            <input class="form-check-input" type="radio" name="contract_status" id="contract_status" value="end" required />
            <label class="form-check-label" for="contract_status"> End Contract - Work is complete </label>
            <div id="contract_status_invalid" class="invalid-feedback"></div>
        </div>
        
        <!-- Default checked radio -->
        <div class="form-check">
            <input class="form-check-input" type="radio" name="contract_status" id="contract_status.1" value="continue" required />
            <label class="form-check-label" for="contract_status.1"> Keep the contract open - I have more work for NAME </label>
        </div>
    @endif
</div>