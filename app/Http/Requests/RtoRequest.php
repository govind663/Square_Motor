<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RtoRequest extends FormRequest
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
                'city' => 'required|max:255',
                'pincode'=> 'required|max:255',
                'state'=> 'nullable|max:255',
            ];
        }else{
            $rule = [
                'city' => 'required|max:255',
                'pincode'=> 'required|max:255',
                'state'=> 'nullable|max:255',
            ];
        }
        return $rule;
    }

    public function messages()
    {
        return [
            'city.required' => __('Region is required'),
            'city.max' => __('The length of city should not exceed 255 characters'),
            'pincode.required' => __('RTO Code is required'),
            'pincode.max' => __('The length of RTO Code should not exceed 255 characters'),
        ];
    }
}
