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
                'mobile'=> 'required|max:255',
                'email'=> 'nullable|unique:retailers|max:255',
                'vehicle_id'=> 'nullable|max:255',
                'address'=> 'nullable|max:255',
                'pincode'=> 'nullable|max:255',
                'city'=> 'nullable|max:255',
                'state'=> 'nullable|max:255',
                'discount_type'=>'required|max:255',
                'percentage_amt'=>'nullable|max:255',
                'fixed_amt'=>'nullable|max:255'
            ];
        }else{
            $rule = [
                'name' => 'required|max:255',
                'mobile'=> 'required|max:255',
                'email'=> 'nullable|unique:retailers|max:255',
                'vehicle_id'=> 'nullable|max:255',
                'address'=> 'nullable|max:255',
                'pincode'=> 'nullable|max:255',
                'city'=> 'nullable|max:255',
                'state'=> 'nullable|max:255',
                'discount_type'=>'required|max:255',
                'percentage_amt'=>'nullable|max:255',
                'fixed_amt'=>'nullable|max:255'
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
