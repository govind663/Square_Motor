<?php

namespace App\Http\Controllers;

use App\Models\Policy;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function index(){
        $policy = Policy::with('agents')->orderBy("id","desc")->whereNull('deleted_at')->get();
        $totalEarning = 0000.00;
        return view("report.index", ['policy'=> $policy, 'totalEarning'=> $totalEarning,]);
    }

    public function search_policy_result(Request $request)
    {
        // ==== Validation
        $this->validate($request, [
            'from_date' => 'required',
            'to_date' => 'required',
            'policy_type' => 'required',
           ],[
            'from_date.required' => 'From Date of Transaction is required for filter',
            'to_date.required' => 'To Date of Transaction is required for filter',
            'policy_type' => 'Policy Type is required',
            ]);

        $fromDate = date("Y-m-d", strtotime($request['from_date']) );
        $toDate = date("Y-m-d", strtotime($request['to_date']) );

        $policy = Policy::with('agents')
                          ->orderBy("inserted_at","desc")
                          ->whereBetween('issue_dt', [$fromDate, $toDate])
                          ->orwhere('policy_type', $request->policy_type)
                          ->whereNull('deleted_at')
                          ->get();


       // ==== Calulate the total earning based on policy type
       $totalEarning = 0;
       foreach($policy as $value){
            $totalEarning += $value->total_earning;

            if($value->policy_type == '1'){
                $totalEarning += $value->comission_rupees;
            }elseif($value->policy_type == '2'){
                $totalEarning += $value->payable_amount;
            }
        }
        $totalEarning = number_format($totalEarning, 0);

       return view('report.index', [ 'policy'=> $policy, 'totalEarning'=> $totalEarning ]);

    }
}
