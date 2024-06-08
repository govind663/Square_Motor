<?php

namespace App\Http\Controllers;

use App\Models\CompanyDebitCreditLog;
use App\Models\InsuranceCompany;
use Illuminate\Http\Request;

class CompanyToCompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $insuraanceCompany = InsuranceCompany::orderBy("id","desc")->whereNull('deleted_at')->get();
        // dd($insuraanceCompany);

        $insuraanceCompanyID = InsuranceCompany::orderBy("id","desc")->whereNull('deleted_at')->get()->pluck('id')->toArray();
        // dd($insuraanceCompanyID);

        $companyDebitCreditLog = CompanyDebitCreditLog::with('insuranceCompany')
                                ->orderBy("tranx_dt","asc")
                                ->whereIn('insurance_company_id', $insuraanceCompanyID)
                                ->where('policy_type', '3')
                                ->whereNull('deleted_at')
                                ->get();
        // dd($companyDebitCreditLog);

        $debitTranxTotal = 0;
        $creditTranxTotal = 0;
        $balance = 0;

        return view('finance.company-to-company.index',
        [
            'insuraanceCompany' => $insuraanceCompany,
            'companyDebitCreditLog' => $companyDebitCreditLog,
            'creditTranxTotal'=> $creditTranxTotal,
            'debitTranxTotal'=> $debitTranxTotal,
            'balance'=> $balance
        ]);
    }

    public function search_agent_wise_tranx(Request $request)
    {
        $insuraanceCompany = InsuranceCompany::orderBy("id","desc")->whereNull('deleted_at')->get();
        // dd($insuraanceCompany);

        // ==== Validation
        $this->validate($request, [
            'from_date' => 'required',
            'to_date' => 'required',
            'insurance_company_id' => 'required',
           ],[
            'from_date.required' => 'From Date of Transaction is required.',
            'to_date.required' => 'To Date of Transaction is required.',
            'insurance_company_id.required' => 'Insurance Company Name is required.',
            ]);

        $fromDate = date("Y-m-d", strtotime($request['from_date']) );
        $toDate = date("Y-m-d", strtotime($request['to_date']) );

        $companyDebitCreditLog = CompanyDebitCreditLog::with('agents')
                                ->orderBy("tranx_dt","asc")
                                ->whereBetween('tranx_dt', [$fromDate, $toDate])
                                ->where('insurance_company_id', $request->insurance_company_id)
                                ->where('policy_type', '3')
                                ->whereNull('deleted_at')
                                ->get();
        // dd($companyDebitCreditLog);

        // ==== Calulate the total Credit Tranx based on Agent_Type
        $creditTranxTotal = CompanyDebitCreditLog::whereBetween('tranx_dt', [$fromDate, $toDate])
                                                ->where('insurance_company_id', $request->insurance_company_id)
                                                ->where('tranx_type', '1')
                                                ->whereNull('deleted_at')
                                                ->sum('credit_tranx');

        // ==== Calulate the total Debit Tranx based on Agent_Type
        $debitTranxTotal = CompanyDebitCreditLog::whereBetween('tranx_dt', [$fromDate, $toDate])
                                                ->where('insurance_company_id', $request->insurance_company_id)
                                                ->where('tranx_type', '2')
                                                ->whereNull('deleted_at')
                                                ->sum('debit_tranx');

        // Calculate balance
        $balance = $creditTranxTotal - $debitTranxTotal;

       return view('finance.company-to-company.index',
       [
         'insuraanceCompany' => $insuraanceCompany,
         'companyDebitCreditLog' => $companyDebitCreditLog,
         'creditTranxTotal'=> $creditTranxTotal,
         'debitTranxTotal'=> $debitTranxTotal,
         'balance'=> $balance,
         'fromDate'=> $fromDate,
         'toDate'=> $toDate
       ]);

    }
}
