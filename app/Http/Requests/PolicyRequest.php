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
                    'policy_type' => 'required|numeric',
                    'agent_id'=> 'required|numeric',
                    'customer_name'=> 'required|max:255',
                    'vehicle_reg_no'=> 'required|max:255',
                    'r_t_o_id'=> 'required|numeric',
                    'vehicle_id'=> 'required|numeric',
                    'vehicle_config'=> 'nullable|max:255',
                    'insurance_type'=> 'required|numeric',
                    'insurance_company_id'=> 'required|numeric',
                    'agent_company_id'=> 'required|numeric',

                    'main_price'=> 'required|numeric',
                    'agent_tp_premimum'=> 'required|numeric',
                    'agent_net_premimum'=> 'required|numeric',
                    'agent_gross'=> 'required|numeric',
                    'agent_gst'=> 'required|numeric',
                    'company_commission_percentage'=> 'required|numeric',
                    'profit_amt'=> 'required|numeric',
                    'tds_deduction'=> 'required|numeric',
                    'actual_profit_amt'=> 'required|numeric',
                    'commission_percentage'=> 'nullable|numeric',
                    'agent_comission_rupees'=> 'nullable|numeric',
                    'agent_actual_comission'=> 'required|numeric',
                    // 'comission_rupees'=> 'required|numeric',

                    // === policy date
                    'from_dt'=> 'required|max:255',
                    'to_dt'=> 'required|max:255',
                    'issue_dt'=> 'required|max:255',
                    'payment_by'=> 'required|numeric|max:3',
                    'payment_through'=> 'required|numeric|max:3',

                    // === Document
                    'policy_doc'=> 'nullable|mimes:jpeg,png,jpg,pdf|max:2048',
                ];
            }else{
                $rule = [
                    // === policy Validation
                    'policy_type' => 'required|numeric',
                    'agent_id'=> 'required|numeric',
                    'customer_name'=> 'required|max:255',
                    'vehicle_reg_no'=> 'required|max:255|alpha_num',
                    'r_t_o_id'=> 'required|numeric',
                    'vehicle_id'=> 'required|numeric',
                    'vehicle_config'=> 'nullable|max:255',
                    'insurance_type'=> 'required|numeric',
                    'insurance_company_id'=> 'required|numeric',
                    'agent_company_id'=> 'required|numeric',

                    // === Commercial Validation
                    'main_price'=> 'required|numeric',
                    'agent_tp_premimum'=> 'required|numeric',
                    'agent_net_premimum'=> 'required|numeric',
                    'agent_gross'=> 'required|numeric',
                    'agent_gst'=> 'required|numeric',
                    'company_commission_percentage'=> 'required|numeric',
                    'profit_amt'=> 'required|numeric',
                    'tds_deduction'=> 'required|numeric',
                    'actual_profit_amt'=> 'required|numeric',
                    'commission_percentage'=> 'nullable|numeric',
                    'agent_comission_rupees'=> 'nullable|numeric',
                    'agent_actual_comission'=> 'required|numeric',
                    // 'comission_rupees'=> 'required|numeric',

                    // === policy date Validation
                    'from_dt'=> 'required|max:255',
                    'to_dt'=> 'required|max:255',
                    'issue_dt'=> 'required|max:255',
                    'payment_by'=> 'required|numeric|max:3',
                    'payment_through'=> 'required|numeric|max:3',

                    // === Document Validation
                    'policy_doc'=> 'nullable|mimes:jpeg,png,jpg,pdf|max:2048',
                ];
            }
        } elseif ($policy_type == '2'){
            if ($this->id){
                $rule = [
                    'policy_type' => 'required|numeric',
                    'retailer_id'=> 'required|numeric',
                    'retailer_customer_name'=> 'required|max:255',
                    'retailer_vehicle_reg_no'=> 'required|max:255|alpha_num',
                    'retailer_r_t_o_id'=> 'required|numeric',
                    'retailer_vehicle_id'=> 'required|numeric',
                    'retailer_vehicle_config'=> 'required|max:255',
                    'retailer_insurance_type'=> 'required|numeric',
                    'retailer_insurance_company_id'=> 'required|numeric',

                    'retailer_main_price'=> 'required|numeric',
                    'retailer_company_commission_percentage'=> 'required|numeric',
                    'retailer_profit_amt'=> 'required|numeric',
                    'retailer_tds_deduction'=> 'required|numeric',
                    'retailer_actual_profit_amt'=> 'required|numeric',
                    'retailer_commission_percentage'=> 'required|numeric',
                    'retailer_comission_rupees'=> 'required|numeric',
                    'retailer_payable_amount'=> 'required|numeric',

                    // === policy date
                    'retailer_from_dt'=> 'required|max:255',
                    'retailer_to_dt'=> 'required|max:255',
                    'retailer_issue_dt'=> 'required|max:255',
                    'retailer_payment_by'=> 'required|numeric|max:3',
                    'retailer_payment_through'=> 'required|numeric|max:3',

                    // === Document
                    'retailer_policy_doc'=> 'nullable|mimes:jpeg,png,jpg,pdf|max:2048',
                ];
            }else{
                $rule = [
                    'policy_type' => 'required|numeric',
                    'retailer_id'=> 'required|numeric',
                    'retailer_customer_name'=> 'required|max:255',
                    'retailer_vehicle_reg_no'=> 'required|max:255',
                    'retailer_r_t_o_id'=> 'required|numeric',
                    'retailer_vehicle_id'=> 'required|numeric',
                    'retailer_vehicle_config'=> 'required|max:255',
                    'retailer_insurance_type'=> 'required|numeric',
                    'retailer_insurance_company_id'=> 'required|numeric',

                    'retailer_main_price'=> 'required|numeric',
                    'retailer_company_commission_percentage'=> 'required|numeric',
                    'retailer_profit_amt'=> 'required|numeric',
                    'retailer_tds_deduction'=> 'required|numeric',
                    'retailer_actual_profit_amt'=> 'required|numeric',
                    'retailer_commission_percentage'=> 'required|numeric',
                    'retailer_comission_rupees'=> 'required|numeric',
                    'retailer_payable_amount'=> 'required|numeric',

                    // === policy date
                    'retailer_from_dt'=> 'required|max:255',
                    'retailer_to_dt'=> 'required|max:255',
                    'retailer_issue_dt'=> 'required|max:255',
                    'retailer_payment_by'=> 'required|numeric|max:3',
                    'retailer_payment_through'=> 'required|numeric|max:3',

                    // === Document
                    'retailer_policy_doc'=> 'nullable|mimes:jpeg,png,jpg,pdf|max:2048',
                ];
            }
        }

        // dd($rule);
         return $rule;
    }


    public function messages()
    {
        return [

            // === Agent Details custom message
            'policy_type.required' => __('Policy Type is required'),
            'agent_id.required' => __('Please Select Agent Name'),
            'customer_name.required' => __('Customer name is required'),
            'vehicle_reg_no.required' => __('Vehicle Registration Number is required'),
            'r_t_o_id.required' => __('Please Select RTO'),
            'vehicle_id.required' => __('Please Select Vehicle Type'),
            'vehicle_config.required' => __('Vehicle Configuration is required'),
            'insurance_type.required' => __('Please Select Insurance Type'),
            'insurance_company_id.required' => __('Please Select Company Policy'),
            'agent_company_id.required' => __('Please Select Insurance Company ID'),

            // === Commercia Details custom message
            'main_price.required' => __('Main Price is required'),
            'agent_tp_premimum.required' => __('TP Premium is required'),
            'agent_net_premimum.required' => __('Net Premium is required'),
            'agent_gross.required' => __('Gross is required'),
            'agent_gst.required' => __('GST is required'),
            'company_commission_percentage.required' => __('Company Commission (%) is required'),
            'profit_amt.required' => __('Company Profit Amount is required'),
            'tds_deduction.required' => __('TDS Deduction (%) is required'),
            'actual_profit_amt.required' => __('Actual Profit (RS) is required'),
            'commission_percentage.required' => __('Agent Commission (%) is required'),
            'agent_actual_comission.required' => __('Actual Agent Commission is required'),
            'comission_rupees.required' => __('Agent Commission (RS) is required'),

            // === Policy Period custom message
            'from_dt.required' => __('From Date is required'),
            'to_dt.required' => __('To Date is required'),
            'issue_dt.required' => __('Issue Date is required'),

            // === Payment Through custom message
            'payment_by.required' => __('Payment By is required'),
            'payment_through.required' => __('Payment Through is required'),

            // === Document validation custom message
            // 'policy_doc.required' => __('Please Upload Policy Document.'),
            'policy_doc.max' => __('The file size should be less than 2MB.'),
            'policy_doc.mimes' => ('Only files in .jpg, .jpeg, .png, .pdf format can be uploaded .'),

            // === Retailer Details custom message
            'retailer_policy_type.required' => __('Policy Type is required'),
            'retailer_id.required' => __('Please Select Retailer Name'),
            'retailer_customer_name.required' => __('Customer name is required'),
            'retailer_vehicle_reg_no.required' => __('Vehicle Registration Number is required'),
            'retailer_r_t_o_id.required' => __('Please Select RTO'),
            'retailer_vehicle_id.required' => __('Please Select Vehicle Type'),
            'retailer_vehicle_config.required' => __('Vehicle Configuration is required'),
            'retailer_insurance_type.required' => __('Please Select Insurance Type'),
            'retailer_insurance_company_id.required' => __('Please Select Company Policy'),

            // === Retailer Commercia Details custom message
            'retailer_main_price.required' => __('Main Price is required'),
            'retailer_company_commission_percentage.required' => __('Company Commission (%) is required'),
            'retailer_profit_amt.required' => __('Company Profit is required'),
            'retailer_tds_deduction.required' => __('TDS Deduction (%) is required'),
            'retailer_actual_profit_amt.required' => __('Profit After TDS is required'),
            'retailer_commission_percentage.required' => __('Retailer Discount (%) is required'),
            'retailer_comission_rupees.required' => __('Retailer Discount Amount (in RS) is required'),
            'retailer_payable_amount.required' => __('Payable Amount is required'),

            // === Retailer Policy Period custom message
            'retailer_from_dt.required' => __('From Date is required'),
            'retailer_to_dt.required' => __('To Date is required'),
            'retailer_issue_dt.required' => __('Issue Date is required'),

            // === Retailer Payment Through custom message
            'retailer_payment_by.required' => __('Payment By is required'),
            'retailer_payment_through.required' => __('Payment Through is required'),

            // === Retailer Document custom message
            // 'retailer_policy_doc.required' => __('Please Upload Policy Document.'),
            'retailer_policy_doc.max' => __('The file size should be less than 2MB.'),
            'retailer_policy_doc.mimes' => ('Only files in .jpg, .jpeg, .png, .pdf format can be uploaded .'),
        ];
    }
}
