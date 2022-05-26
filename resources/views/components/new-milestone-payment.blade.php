<div>
    <p id="milestone_payment_error_text" class="d-none text-danger"><i class="fa-solid fa-circle-exclamation"></i> <span id="milestone_payment_error_message"></span></p>
    <p>You will be charged ${{$milestone_amount - $contract->milestone_security_balance}}</p>
    <h3>Select Payment Method</h3>
    @forelse ($payment_methods as $idx=>$item)
        <div class="form-check">
            <input class="form-check-input" type="radio" name="payment_method" id="payment_method.{{$idx}}"/>
            <label class="form-check-label" for="payment_method.{{$idx}}"> <div class="c-flex f-align-center f-gap-1"><img class="credit-card-logo" src="{{ asset("images/billings/".strtolower($item->card_name).".png") }}" alt=""> <span>{{$item->card_name}} ending with {{ $item->last4 }}</span></div> </label>
            <div id="payment_method_invalid" class="invalid-feedback"></div>
        </div>
    @empty
        <p>No payment method added!</p>
    @endforelse
</div>