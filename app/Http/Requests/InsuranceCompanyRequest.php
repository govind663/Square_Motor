<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class InsuranceCompanyRequest extends FormRequest
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
                'company_name' => 'required|max:255',
                'logo_doc'=> 'nullable|mimes:jpeg,png,jpg,pdf|max:2048',
                'description'=>'nullable',
            ];
        }else{
            $rule = [
                'company_name' => 'required|max:255',
                'logo_doc'=> 'required|mimes:jpeg,png,jpg,pdf|max:2048',
                'description'=>'nullable',
            ];
        }
        return $rule;
    }

    public function messages()
    {
        return [
            'company_name.required' => __('Company Name is required'),
            'logo_doc.required' => 'Company Logo is required',
            'logo_doc.max' => 'The file size should be less than 2MB.',
            'logo_doc.mimes' => ' Only files in .jpg, .jpeg, .png, .pdf format can be uploaded .',
        ];
    }
}
