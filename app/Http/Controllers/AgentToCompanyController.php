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
        $agent = Agent::orderBy("id","desc")->whereNull('deleted_at')->get();
        // dd($agent);

        $agentID = Agent::orderBy("id","desc")->whereNull('deleted_at')->get()->pluck('id')->toArray();
        // dd($agentID);

        $agentDebitCreditLog = AgentDebitCreditLog::with('agents')
                                ->orderBy("tranx_dt","asc")
                                ->whereIn('agent_id',$agentID)
                                ->where('policy_type', '1')
                                ->whereNull('deleted_at')
                                ->get();
        // dd($agentDebitCreditLog);

        $debitTranxTotal = 0;
        $creditTranxTotal = 0;
        $balance = 0;

        return view('finance.agent-to-company.index',
        [
            'agentDebitCreditLog' => $agentDebitCreditLog,
            'agent' => $agent,
            'creditTranxTotal'=> $creditTranxTotal,
            'debitTranxTotal'=> $debitTranxTotal,
            'balance'=> $balance
        ]);
    }

    public function search_agent_wise_tranx(Request $request)
    {
        $agent = Agent::orderBy("id","desc")->whereNull('deleted_at')->get();
        // dd($agent);

        // ==== Validation
        $this->validate($request, [
            'from_date' => 'required',
            'to_date' => 'required',
            'agent_id' => 'required',
           ],[
            'from_date.required' => 'From Date of Transaction is required.',
            'to_date.required' => 'To Date of Transaction is required.',
            'agent_id' => 'Agent Name is required.',
            ]);

        $fromDate = date("Y-m-d", strtotime($request['from_date']) );
        $toDate = date("Y-m-d", strtotime($request['to_date']) );

        $agentDebitCreditLog = AgentDebitCreditLog::with('agents')
                                ->orderBy("tranx_dt","asc")
                                ->whereBetween('tranx_dt', [$fromDate, $toDate])
                                ->where('agent_id', $request->agent_id)
                                ->where('policy_type', '1')
                                ->whereNull('deleted_at')
                                ->get();

        // dd($agentDebitCreditLog);

        // ==== Calulate the total Credit Tranx based on Agent_Type
        $creditTranxTotal = AgentDebitCreditLog::whereBetween('tranx_dt', [$fromDate, $toDate])
                                                ->where('agent_id', $request->agent_id)
                                                ->where('tranx_type', '1')
                                                ->whereNull('deleted_at')
                                                ->sum('credit_tranx');

        // ==== Calulate the total Debit Tranx based on Agent_Type
        $debitTranxTotal = AgentDebitCreditLog::whereBetween('tranx_dt', [$fromDate, $toDate])
                                                ->where('agent_id', $request->agent_id)
                                                ->where('tranx_type', '2')
                                                ->whereNull('deleted_at')
                                                ->sum('debit_tranx');

        // Calculate balance
        $balance = $creditTranxTotal - $debitTranxTotal;

       return view('finance.agent-to-company.index',
       [ 'agent' => $agent,
         'agentDebitCreditLog'=> $agentDebitCreditLog,
         'creditTranxTotal'=> $creditTranxTotal,
         'debitTranxTotal'=> $debitTranxTotal,
         'balance'=> $balance
       ]);

    }

}
