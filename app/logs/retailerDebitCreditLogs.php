<?php

namespace App\logs;

use App\Models\RetailerDebitCreditLog;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\URL;

class retailerDebitCreditLogs{

    public function retailerDebitCreditActivity($tranxDate, $retailerId, $policyId, $tranxDebit, $tranxCredit, $balance, $tranx_type, $insertedBy, $insertedAt){
        $retailerDebitCreditLog = new RetailerDebitCreditLog();
        $retailerDebitCreditLog->tranx_dt = $tranxDate;
        $retailerDebitCreditLog->retailer_id = $retailerId;
        $retailerDebitCreditLog->policy_id = $policyId;
        $retailerDebitCreditLog->debit_tranx = $tranxDebit;
        $retailerDebitCreditLog->credit_tranx = $tranxCredit;
        $retailerDebitCreditLog->balance = $balance;
        $retailerDebitCreditLog->tranx_type = $tranx_type;
        $retailerDebitCreditLog->inserted_by = $insertedBy;
        $retailerDebitCreditLog->inserted_at = $insertedAt;
        $retailerDebitCreditLog->save();
        return $retailerDebitCreditLog;
    }

}
