<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class VehicleRequest extends FormRequest
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
                'vehicle_type' => 'required|max:255',
            ];
        }else{
            $rule = [
                'vehicle_type' => 'required|max:255',
            ];
        }
        return $rule;
    }

    public function messages()
    {
        return [
            'vehicle_type.required' => __('Vehicle type is required'),
            'vehicle_type.max' => __('The length of vehicle type should not exceed 255 characters'),

        ];
    }
}
