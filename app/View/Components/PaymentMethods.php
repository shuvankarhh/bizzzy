<?php

namespace App\View\Components;

use Illuminate\View\Component;

class PaymentMethods extends Component
{
    public $paymentMethods;
    public $amount;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($paymentMethods, $amount)
    {
        $this->paymentMethods = $paymentMethods;
        $this->amount = $amount;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.payment-methods');
    }
}
