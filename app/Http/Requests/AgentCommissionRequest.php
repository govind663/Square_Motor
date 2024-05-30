<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AgentCommissionRequest extends FormRequest
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
                'agent_id' => 'required|numeric',
                'insurance_company_id' => 'required|numeric',
                'insurance_company_i_d_id' => 'required|numeric',
                'vehicle_id' => 'required|numeric',
                'comission_type' => 'required|numeric',
                'percentage_amt' => 'nullable|string',
                'fixed_amt' => 'nullable|string',
            ];
        }else{
            $rule = [
                'agent_id' => 'required|numeric',
                'insurance_company_id' => 'required|numeric',
                'insurance_company_i_d_id' => 'required|numeric',
                'vehicle_id' => 'required|numeric',
                'comission_type' => 'required|numeric',
                'percentage_amt' => 'nullable|string',
                'fixed_amt' => 'nullable|string',
            ];
        }
        return $rule;
    }

    public function messages()
    {
        return [
            'agent_id.required' => 'Please Select Agent Name.',
            'insurance_company_id.required' => 'Please Select Insurance Company Name.',
            'insurance_company_i_d_id.required' => 'Please Select Insurance Company ID.',
            'vehicle_id.required' => 'Please Select Vehicle Name.',
            'comission_type.required' => 'Please Select Commission Type.',
        ];
    }
}
