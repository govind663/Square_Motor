<?php

namespace App\Http\Controllers;

use App\Models\Agent;
use App\Models\AgentDebitCreditLog;
use Illuminate\Http\Request;

class AgentToCompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $agentDebitCreditLog = AgentDebitCreditLog::orderBy("tranx_dt","asc")->whereNull('deleted_at')->get();
        $agent = Agent::orderBy("id","desc")->whereNull('deleted_at')->get();
        // dd($agent);

        // ==== total balance agentDebitCreditLog
        $total_balance = 0;
        foreach ($agentDebitCreditLog as $key => $value) {
            $total_balance += $value->balance;
        }
        // dd($total_balance);
        return view('finance.agent-to-company.index', ['total_balance' => $total_balance, 'agentDebitCreditLog' => $agentDebitCreditLog, 'agent' => $agent]);
    }

}
