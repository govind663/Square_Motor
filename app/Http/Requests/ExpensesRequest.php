<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ExpensesRequest extends FormRequest
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
                'title' => 'required|max:255',
                'amount'=>'required|max:255',
                'payment_mode'=>'required|max:255',
                'notes'=>'required|max:255',
            ];
        }else{
            $rule = [
                'title' => 'required|max:255',
                'amount'=>'required|max:255',
                'payment_mode'=>'required|max:255',
                'notes'=>'required|max:255',
            ];
        }
        return $rule;
    }

    public function messages()
    {
        return [
            'title.required' => __('Title is required.'),
            'title.max' => __('The length of title should not exceed 255 characters.'),
            'amount.required' => __('Amount is required.'),
            'amount.max' => __('The length of Amount should not exceed 255 characters.'),
            'payment_mode.required'=> __('Payment Mode is required.'),
            'notes.required'=> __('Notes is required'),
            'notes.max' => __('The length of notes should not exceed 255 characters.'),
        ];
    }
}
