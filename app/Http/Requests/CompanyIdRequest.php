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
                'company_id' => 'required|string',
                'tds_in_percentage' => 'required|string',
                'commission_type' => 'required|numeric',
            ];
        }else{
            $rule = [
                'insurance_company_id' => 'required|numeric',
                'company_id' => 'required|string',
                'tds_in_percentage' => 'required|string',
                'commission_type' => 'required|numeric',
            ];
        }
        return $rule;
    }

    public function messages()
    {
        return [
            'insurance_company_id.required' => 'Please Select Company Name.',
            'company_id.required' => 'Company ID is required.',
            'company_id.string' => 'Company ID must be a string.',
            'tds_in_percentage.required' => 'TDS is required.',
            'tds_in_percentage.string' => 'TDS must be a string.',
            'commission_type.required' => 'Commission Type is required.',
        ];
    }
}
