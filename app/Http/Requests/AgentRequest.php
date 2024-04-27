<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AgentRequest extends FormRequest
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
            ];
        }else{
            $rule = [
                'name' => 'required|max:255',
            ];
        }
        return $rule;
    }

    public function messages()
    {
        return [
            'name.required' => __('Agent Name is required'),
            'name.max' => __('The length of Agent Name should not exceed 255 characters'),

        ];
    }
}
