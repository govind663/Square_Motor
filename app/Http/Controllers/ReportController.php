<?php

namespace App\Http\Controllers;

use App\Models\Policy;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function index(){
        $policy = Policy::with('agents')->orderBy("id","desc")->whereNull('deleted_at')->get();
        return view("report.index", ['policy'=> $policy]);
    }

    public function search_policy_result(Request $request){

        $this->validate($request, [
            'from_date' => 'required',
            'to_date' => 'required',
            'policy_type' => 'required',
           ],[
            'from_date.required' => 'From Date of Transaction is required for filter',
            'to_date.required' => 'To Date of Transaction is required for filter',
            'policy_type' => 'Policy Type is required',
            ]);

        $policy = Policy::with('agents')
                          ->orderBy("inserted_at","desc")
                          ->whereNull('deleted_at')
                          ->where('inserted_at','>=', date("Y-m-d", strtotime($request->from_date) ))
                          ->where('inserted_at','<=', date("Y-m-d", strtotime($request->to_date) ))
                          ->where('policy_type','LIKE', '%'. $request->research_type .'%')
                          ->get();

       return view('report.index', ['policy'=> $policy]);

    }
}
