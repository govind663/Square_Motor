<?php

namespace App\logs;

use App\Models\AgentDebitCreditLog;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\URL;

class agentDebitCreditLogs{

    public function agentDebitCreditActivity($tranxDate, $policyId, $tranxDebit, $tranxCredit, $balance, $insertedBy, $insertedAt){
        $agentDebitCreditLog = new AgentDebitCreditLog();
        $agentDebitCreditLog->tranx_dt = $tranxDate;
        $agentDebitCreditLog->policy_id = $policyId;
        $agentDebitCreditLog->debit_tranx = $tranxDebit;
        $agentDebitCreditLog->credit_tranx = $tranxCredit;
        $agentDebitCreditLog->balance = $balance;
        $agentDebitCreditLog->inserted_by = $insertedBy;
        $agentDebitCreditLog->inserted_at = $insertedAt;
        $agentDebitCreditLog->save();
        return $agentDebitCreditLog;
    }

}
