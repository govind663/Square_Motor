<?php

namespace App\logs;

use App\Models\CompanyDebitCreditLog;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\URL;

class companyDebitCreditLogs{

    public function companyDebitCreditActivity($companyTranxDate, $companyInsuranceCompanyId, $companyPolicyId, $companyTranxDebit, $companyTranxCredit, $companyBalance, $companyTranx_type, $companyInsertedBy, $companyInsertedAt, $companyPolicyType){
        $companyDebitCreditLog = new CompanyDebitCreditLog();
        $companyDebitCreditLog->tranx_dt = $companyTranxDate;
        $companyDebitCreditLog->insurance_company_id = $companyInsuranceCompanyId;
        $companyDebitCreditLog->policy_id = $companyPolicyId;
        $companyDebitCreditLog->debit_tranx = $companyTranxDebit;
        $companyDebitCreditLog->credit_tranx = $companyTranxCredit;
        $companyDebitCreditLog->balance = $companyBalance;
        $companyDebitCreditLog->tranx_type = $companyTranx_type;
        $companyDebitCreditLog->policy_type = $companyInsertedBy;
        $companyDebitCreditLog->inserted_by = $companyInsertedAt;
        $companyDebitCreditLog->inserted_at = $companyPolicyType;
        $companyDebitCreditLog->save();
        return $companyDebitCreditLog;
    }

}
