<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class InsuranceCompanyIDRequest extends FormRequest
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
                'company_id'=> 'required|numeric|unique:insurance_company_i_d_s,company_id',
                'commision_percentage'=>'required|string',
            ];
        }else{
            $rule = [
                'insurance_company_id' => 'required|numeric',
                'company_id'=> 'required|numeric|unique:insurance_company_i_d_s,company_id',
                'commision_percentage'=>'required|string',
            ];
        }
        return $rule;
    }

    public function messages()
    {
        return [
            'insurance_company_id.required' => 'Please select Insurance Company Name',
            'company_id.required' => 'Company Id is required.',
            'commision_percentage.required' => 'Commision Percentage is required.',
        ];
    }
}
