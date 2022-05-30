<div>
    <button type="button" id="payment_previous_step_button" class="btn btn-link"><i class="fas fa-arrow-left"></i> Return to previous step</button>
    <p>You will be charged $<span id="charged_amount"></span> amount!</p>
    <h3>Payment methods</h3>
    <p id="stripe_payment_error" class="text-danger d-none"></p>
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