<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RetailerRequest extends FormRequest
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
                'name' => 'required|max:255',
                'mobile' => 'required'.$this->id,
                'discount_type'=>'required',
                'percentage_amt'=> 'nullable',
            ];
        }else{
            $rule = [
                'name' => 'required|max:255',
                'mobile'=> 'required',
                'discount_type'=>'required',
            ];
        }
        return $rule;
    }

    public function messages()
    {
        return [
            'name.required' => __('The name is required.'),
            'name.max' => __('The length of name should not exceed 255 characters'),
            'mobile.required'=> __(' The mobile number is required.'),
            'mobile.mobile'=> __('The mobile number is invalid.'),
            'mobile.unique'=>  __('The mobile number is already taken.'),
            'discount_type'=> __('Please Select Discount Type'),
        ];
    }
}
