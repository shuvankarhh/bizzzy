<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class JobRequset extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        // True temporarily. Jobs can only be posted by recruiter!
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
            'job_visibility' => 'required',
            'name' => 'required',
            'description' => 'required',
            'project_time' => 'required',
            'project_type' => 'required',
            'experience_level' => 'required',
            'price_type' => 'required',
            'hours_per_week' => 'required_if:price_type,Hourly',
        ];
    }
}
