<?php

namespace App\Http\Requests;

use Carbon\Carbon;
use Illuminate\Foundation\Http\FormRequest;

class PaymentRequest extends FormRequest
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
                'agent_id' => 'required|max:255',
                'amount'=>'required|max:255',
                'payment_type'=>'required|max:255',
                'payment_mode'=>'required|max:255',
                'notes'=>'required|max:255',
                'payment_dt'=>'required|max:255'
            ];
        }else{
            $rule = [
                'agent_id' => 'required|max:255',
                'amount'=>'required|max:255',
                'payment_type'=>'required|max:255',
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
            'agent_id.required' => __('Please Select Agent Nmae'),
            'agent_id.max' => __('The length of Agent Name should not exceed 255 characters'),
            'amount.required' => __('Please Select Amount'),
            'amount.max' => __('The length of Amount should not exceed 255 characters'),
            'payment_type.required'=> __('Please Select Payment Type'),
            'payment_mode.required'=> __('Please Select Payment Mode'),
            'notes.required'=> __('Notes is required'),
            'payment_dt.required'=> __('Date is required')

        ];
    }

    protected function prepareForValidation()
    {
        if ($this->has('payment_dt')) {
            $this->merge([
                'payment_dt' => Carbon::createFromFormat('d-m-Y', $this->payment_dt)->format('Y-m-d'),
            ]);
        }
    }
}
