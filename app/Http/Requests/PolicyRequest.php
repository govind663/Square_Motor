<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PolicyRequest extends FormRequest
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
        // === get policy_type
        $policy_type = $this->policy_type;

        if ($policy_type == '1'){
            if ($this->id){
                $rule = [
                    'policy_type' => 'required|numeric|max:4',
                    'agent_id'=> 'required|numeric|max:4',
                    'customer_name'=> 'required|alpha_dash|max:255',
                    'vehicle_reg_no'=> 'required|alpha_num|max:255',
                    'r_t_o_id'=> 'required|numeric|max:4',
                    'vehicle_id'=> 'required|numeric|max:4',
                    'vehicle_config'=> 'required|max:255',
                    'insurance_type'=> 'required|numeric|max:4',
                    'insurance_company_id'=> 'required|numeric|max:4',

                    'main_price'=> 'required|numeric|max:255',
                    'company_commission_percentage'=> 'required|numeric|max:255',
                    'mobile'=> 'required|numeric|max:255',
                    'profit_amt'=> 'required|numeric|max:255',
                    'tds_deduction'=> 'required|numeric|max:255',
                    'actual_profit_amt'=> 'required|numeric|max:255',
                    'commission_percentage'=> 'required|numeric|max:255',
                    'comission_rupees'=> 'required|numeric|max:255',

                    // === policy date
                    'from_dt'=> 'required|date_format:Y-m-d|max:255',
                    'to_dt'=> 'required|date_format:Y-m-d|max:255',
                    'issue_dt'=> 'required|date_format:Y-m-d|max:255',
                    'payment_by'=> 'required|numeric|max:3',
                    'payment_through'=> 'required|numeric|max:3',

                    // === Document
                    'policy_doc'=> 'nullable|mimes:jpeg,png,jpg,pdf|max:2048',
                ];
            }else{
                $rule = [
                    'policy_type' => 'required|numeric|max:4',
                    'agent_id'=> 'required|numeric|max:4',
                    'customer_name'=> 'required|alpha_dash|max:255',
                    'vehicle_reg_no'=> 'required|alpha_num|max:255',
                    'r_t_o_id'=> 'required|numeric|max:4',
                    'vehicle_id'=> 'required|numeric|max:4',
                    'vehicle_config'=> 'required|max:255',
                    'insurance_type'=> 'required|numeric|max:4',
                    'insurance_company_id'=> 'required|numeric|max:4',

                    'main_price'=> 'required|numeric|max:255',
                    'company_commission_percentage'=> 'required|numeric|max:255',
                    'mobile'=> 'required|numeric|max:255',
                    'profit_amt'=> 'required|numeric|max:255',
                    'tds_deduction'=> 'required|numeric|max:255',
                    'actual_profit_amt'=> 'required|numeric|max:255',
                    'commission_percentage'=> 'required|numeric|max:255',
                    'comission_rupees'=> 'required|numeric|max:255',

                    // === policy date
                    'from_dt'=> 'required|date_format:Y-m-d|max:255',
                    'to_dt'=> 'required|date_format:Y-m-d|max:255',
                    'issue_dt'=> 'required|date_format:Y-m-d|max:255',
                    'payment_by'=> 'required|numeric|max:3',
                    'payment_through'=> 'required|numeric|max:3',

                    // === Document
                    'policy_doc'=> 'required|mimes:jpeg,png,jpg,pdf|max:2048',
                ];
            }
        } elseif ($policy_type == '2'){
            if ($this->id){
                $rule = [
                    'policy_type' => 'required|numeric|max:4',
                    'retailer_id'=> 'required|numeric|max:4',
                    'customer_name'=> 'required|alpha_dash|max:255',
                    'vehicle_reg_no'=> 'required|alpha_num|max:255',
                    'r_t_o_id'=> 'required|numeric|max:4',
                    'vehicle_id'=> 'required|numeric|max:4',
                    'vehicle_config'=> 'required|max:255',
                    'insurance_type'=> 'required|numeric|max:4',
                    'insurance_company_id'=> 'required|numeric|max:4',

                    'main_price'=> 'required|numeric|max:255',
                    'company_commission_percentage'=> 'required|numeric|max:255',
                    'mobile'=> 'required|numeric|max:255',
                    'profit_amt'=> 'required|numeric|max:255',
                    'tds_deduction'=> 'required|numeric|max:255',
                    'actual_profit_amt'=> 'required|numeric|max:255',
                    'commission_percentage'=> 'required|numeric|max:255',
                    'comission_rupees'=> 'required|numeric|max:255',
                    'payable_amount'=> 'required|numeric|max:255',

                    // === policy date
                    'from_dt'=> 'required|date_format:Y-m-d|max:255',
                    'to_dt'=> 'required|date_format:Y-m-d|max:255',
                    'issue_dt'=> 'required|date_format:Y-m-d|max:255',
                    'payment_by'=> 'required|numeric|max:3',
                    'payment_through'=> 'required|numeric|max:3',

                    // === Document
                    'policy_doc'=> 'nullable|mimes:jpeg,png,jpg,pdf|max:2048',
                ];
            }else{
                $rule = [
                    'policy_type' => 'required|numeric|max:4',
                    'retailer_id'=> 'required|numeric|max:4',
                    'customer_name'=> 'required|alpha_dash|max:255',
                    'vehicle_reg_no'=> 'required|alpha_num|max:255',
                    'r_t_o_id'=> 'required|numeric|max:4',
                    'vehicle_id'=> 'required|numeric|max:4',
                    'vehicle_config'=> 'required|max:255',
                    'insurance_type'=> 'required|numeric|max:4',
                    'insurance_company_id'=> 'required|numeric|max:4',

                    'main_price'=> 'required|numeric|max:255',
                    'company_commission_percentage'=> 'required|numeric|max:255',
                    'mobile'=> 'required|numeric|max:255',
                    'profit_amt'=> 'required|numeric|max:255',
                    'tds_deduction'=> 'required|numeric|max:255',
                    'actual_profit_amt'=> 'required|numeric|max:255',
                    'commission_percentage'=> 'required|numeric|max:255',
                    'comission_rupees'=> 'required|numeric|max:255',
                    'payable_amount'=> 'required|numeric|max:255',

                    // === policy date
                    'from_dt'=> 'required|date_format:Y-m-d|max:255',
                    'to_dt'=> 'required|date_format:Y-m-d|max:255',
                    'issue_dt'=> 'required|date_format:Y-m-d|max:255',
                    'payment_by'=> 'required|numeric|max:3',
                    'payment_through'=> 'required|numeric|max:3',

                    // === Document
                    'policy_doc'=> 'required|mimes:jpeg,png,jpg,pdf|max:2048',
                ];
            }
        }


        return $rule;
    }


    public function messages()
    {
        return [
            'company_name.required' => __('Company Name is required'),

            // === Document validation custom message
            'policy_doc.required' => __('Please Upload Policy Document.'),
            'policy_doc.max' => __('The file size should be less than 2MB.'),
            'policy_doc.mimes' => ('Only files in .jpg, .jpeg, .png, .pdf format can be uploaded .'),
        ];
    }
}
