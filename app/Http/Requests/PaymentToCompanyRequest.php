<?php

namespace App\Http\Requests;

use Carbon\Carbon;
use Illuminate\Foundation\Http\FormRequest;

class PaymentToCompanyRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        if ($this->id){
            $rule = [
                'insurance_company_id' => 'required|max:255',
                'amount'=>'required|max:255',
                'payment_mode'=>'required|max:255',
                'notes'=>'required|max:255',
                'payment_dt'=>'required|max:255'
            ];
        }else{
            $rule = [
                'insurance_company_id' => 'required|max:255',
                'amount'=>'required|max:255',
                'payment_mode'=>'required|max:255',
                'notes'=>'required|max:255',
                'payment_dt'=>'required|max:255'
            ];
        }
        return $rule;
    }

    public function messages()
    {
        return [
            'insurance_company_id.required' => __('Please Select Insurance Company Name'),
            'insurance_company_id.max' => __('The length of Insurance Company Name should not exceed 255 characters'),
            'amount.required' => __('Please Select Amount'),
            'amount.max' => __('The length of Amount should not exceed 255 characters'),
            'payment_mode.required'=> __('Please Select Payment Mode'),
            'notes.required'=> __('Notes is required'),
            'c.required'=> __('Date is required'),
        ];
    }

    protected function prepareForValidation()
    {
        $this->merge([
            'payment_dt' => Carbon::parse($this->payment_dt)->format('Y-m-d'),
        ]);
    }
}
