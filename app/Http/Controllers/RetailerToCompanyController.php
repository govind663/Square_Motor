<?php

namespace App\Http\Controllers;

use App\Models\Retailer;
use App\Models\RetailerDebitCreditLog;
use Illuminate\Http\Request;

class RetailerToCompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $retailer = Retailer::orderBy("id","desc")->whereNull('deleted_at')->get();
        // dd($retailer);

        $retailerID = Retailer::orderBy("id","desc")->whereNull('deleted_at')->get()->pluck('id')->toArray();
        // dd($retailerID);

        $retailerDebitCreditLog = RetailerDebitCreditLog::with('retailers')
                                    ->orderBy("tranx_dt","asc")
                                    ->whereIn('retailer_id', $retailerID)
                                    ->where('policy_type', '2')
                                    ->whereNull('deleted_at')
                                    ->get();
        $debitTranxTotal = 0;
        $creditTranxTotal = 0;
        $balance = 0;

        return view('finance.retailer-to-company.index',
        [
            'retailerDebitCreditLog' => $retailerDebitCreditLog,
            'retailer' => $retailer,
            'creditTranxTotal'=> $creditTranxTotal,
            'debitTranxTotal'=> $debitTranxTotal,
            'balance'=> $balance
        ]);
    }

    public function search_retailer_wise_tranx(Request $request)
    {
        $retailer = Retailer::orderBy("id","desc")->whereNull('deleted_at')->get();
        // dd($retailer);

        // ==== Validation
        $this->validate($request, [
            'from_date' => 'required',
            'to_date' => 'required',
            'retailer_id' => 'required',
           ],[
            'from_date.required' => 'From Date of Transaction is required.',
            'to_date.required' => 'To Date of Transaction is required.',
            'retailer_id' => 'Retailer Name is required.',
            ]);

        $fromDate = date("Y-m-d", strtotime($request['from_date']) );
        $toDate = date("Y-m-d", strtotime($request['to_date']) );

        $retailerDebitCreditLog = RetailerDebitCreditLog::with('retailers')
                          ->orderBy("tranx_dt","asc")
                          ->whereBetween('tranx_dt', [$fromDate, $toDate])
                          ->where('retailer_id', $request->retailer_id)
                          ->where('policy_type', '2')
                          ->whereNull('deleted_at')
                          ->get();

        // dd($retailerDebitCreditLog);

        // ==== Calulate the total Credit Tranx based on Retailer Type
        $creditTranxTotal = RetailerDebitCreditLog::whereBetween('tranx_dt', [$fromDate, $toDate])
                                                ->where('retailer_id', $request->retailer_id)
                                                ->where('tranx_type', '1')
                                                ->whereNull('deleted_at')
                                                ->sum('credit_tranx');

        // ==== Calulate the total Debit Tranx based on Retailer Type
        $debitTranxTotal = RetailerDebitCreditLog::whereBetween('tranx_dt', [$fromDate, $toDate])
                                                ->where('retailer_id', $request->retailer_id)
                                                ->where('tranx_type', '2')
                                                ->whereNull('deleted_at')
                                                ->sum('debit_tranx');

        // Calculate balance
        $balance = $creditTranxTotal - $debitTranxTotal;

       return view('finance.retailer-to-company.index',
       [ 'retailer' => $retailer,
         'retailerDebitCreditLog'=> $retailerDebitCreditLog,
         'creditTranxTotal'=> $creditTranxTotal,
         'debitTranxTotal'=> $debitTranxTotal,
         'balance'=> $balance
       ]);

    }
}
