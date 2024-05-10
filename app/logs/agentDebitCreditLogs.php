<?php

namespace App\logs;

use App\Models\AgentDebitCreditLog;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\URL;

class agentDebitCreditLogs{

    public function agentDebitCreditActivity($tranxDate, $agentId, $policyId, $tranxDebit, $tranxCredit, $balance, $tranx_type, $insertedBy, $insertedAt){
        $agentDebitCreditLog = new AgentDebitCreditLog();
        $agentDebitCreditLog->tranx_dt = $tranxDate;
        $agentDebitCreditLog->agent_id = $agentId;
        $agentDebitCreditLog->policy_id = $policyId;
        $agentDebitCreditLog->debit_tranx = $tranxDebit;
        $agentDebitCreditLog->credit_tranx = $tranxCredit;
        $agentDebitCreditLog->balance = $balance;
        $agentDebitCreditLog->tranx_type = $tranx_type;
        $agentDebitCreditLog->inserted_by = $insertedBy;
        $agentDebitCreditLog->inserted_at = $insertedAt;
        $agentDebitCreditLog->save();
        return $agentDebitCreditLog;
    }

}
