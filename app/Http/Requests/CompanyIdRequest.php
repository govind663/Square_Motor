<?php

namespace App\Http\Requests;

use App\Models\InsuranceCompany;
use App\Models\InsuranceCompanyID;
use Illuminate\Foundation\Http\FormRequest;

class CompanyIdRequest extends FormRequest
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
                'insurance_company_id' => 'required|numeric',
                'insurance_company_i_d_id' => 'required|numeric',
                'tds_in_percentage' => 'required|string',
            ];
        }else{
            $rule = [
                'insurance_company_id' => 'required|numeric',
                'insurance_company_i_d_id' => 'required|numeric',
                'tds_in_percentage' => 'required|string',
            ];
        }
        return $rule;
    }

    public function messages()
    {
        return [
            'insurance_company_id.required' => 'Please Select Insurance Company Name.',
            'insurance_company_i_d_id.required' => 'Please Select Insurance Company ID.',
            'tds_in_percentage.required' => 'TDS is required.',
            'tds_in_percentage.string' => 'TDS must be a string.',
        ];
    }
}
