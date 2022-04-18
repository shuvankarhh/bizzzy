<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class JobProposalRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'terms' => 'required',
            'payment_type' => 'required|in:hourly,fixed',
            'hourly_rate' => 'required_if:proposal_type,hourly',
            'hour_per_week' => 'required_if:proposal_type,hourly',
            'price' => 'required_if:proposal_type,fixed',
            'deposit_type' => 'required_if:proposal_type,fixed',
            'milestone_name' => 'required_if:deposit_type,less|array|min:1',
            'milestone_name.*' => 'required_if:deposit_type,less',
            'deposit_amount' => 'required_if:deposit_type,less|array|min:1',
            'deposit_amount.*' => 'required_if:deposit_type,less',
            'due_date' => 'required_if:deposit_type,less|array|min:1',
            'due_date.*' => 'required_if:deposit_type,less',
        ];
    }
}
