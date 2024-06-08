<?php

namespace App\Http\Controllers;

use App\Http\Requests\PaymentToCompanyRequest;
use App\logs\companyDebitCreditLogs;
use App\Models\CompanyDebitCreditLog;
use App\Models\InsuranceCompany;
use App\Models\Payment;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class PaymentToCompanyController extends Controller
{
    protected $companyDebitCreditLogs;

    public function __construct(companyDebitCreditLogs $companyDebitCreditLogs)
    {
        $this->companyDebitCreditLogs = $companyDebitCreditLogs;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $payments = Payment::with('insurance_companies')->where('payment_by', 2)->orderBy("id","desc")->whereNull('deleted_at')->get();
        return view('finance.payments.company.index',['payments' => $payments]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $insuranceCompany = InsuranceCompany::orderBy("id","desc")->whereNull('deleted_at')->get();
        return view('finance.payments.company.create',['insuranceCompany'=>$insuranceCompany]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PaymentToCompanyRequest $request)
    {
        $data = $request->validated();
        try {
            $payment = Payment::create($data);
            $payment->insurance_company_id = $request->insurance_company_id;
            $payment->amount = $request->amount;
            $payment->payment_mode = $request->payment_mode;
            $payment->notes = $request->notes;
            $payment->payment_dt = Carbon::createFromFormat('Y-m-d', $request['payment_dt'])->format('Y-m-d');
            $payment->payment_status = 1;
            $payment->payment_by = 1;
            $payment->inserted_at = Carbon::now();
            $payment->inserted_by = Auth::user()->id;
            $payment->save();

            // ==== Calulate the total Credit Tranx based on Agent_Type
            $currentOpeningBalance = CompanyDebitCreditLog::where('insurance_company_id', $request->insurance_company_id)
                                                            ->pluck('balance')
                                                            ->whereNull('deleted_at')
                                                            ->first();

            // ==== create agentDebitCreditLogs
            $companyTranxDate = Carbon::now()->format('Y-m-d');
            $companyInsuranceCompanyId = $request->insurance_company_id;
            $companyPolicyId = $request->payment_mode;
            $companyTranxDebit = $request->amount;
            $companyTranxCredit = 0;
            $companyBalance = $currentOpeningBalance - $companyTranxDebit;
            $companyTranx_type = '2';
            $companyPolicyType = '2';
            $companyInsertedBy = Auth::user()->id;
            $companyInsertedAt = Carbon::now();

            $this->companyDebitCreditLogs->companyDebitCreditActivity(
                $companyTranxDate,
                $companyInsuranceCompanyId,
                $companyPolicyId,
                $companyTranxDebit,
                $companyTranxCredit,
                $companyBalance,
                $companyTranx_type,
                $companyInsertedBy,
                $companyInsertedAt,
                $companyPolicyType
            );
            return redirect()->route('payment_to_company.index')->with('message','Company Payment created successfully');

        } catch(\Exception $ex){

            return redirect()->back()->with('error','Something Went Wrong  - '.$ex->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $payment = Payment::find($id);
        return view('finance.payments.company.show',['payment' => $payment]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $payment = Payment::find($id);
        $insuranceCompany = InsuranceCompany::orderBy("id","desc")->whereNull('deleted_at')->get();
        return view('finance.payments.company.edit',['payment' => $payment, 'insuranceCompany' => $insuranceCompany]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PaymentToCompanyRequest $request, string $id)
    {
        try {
            $payment = Payment::find($id);
            $payment->agent_id = $request->agent_id;
            $payment->amount = $request->amount;
            $payment->payment_mode = $request->payment_mode;
            $payment->notes = $request->notes;
            $payment->payment_dt = Carbon::createFromFormat('Y-m-d', $request['payment_dt'])->format('Y-m-d');
            $payment->payment_status = 1;
            $payment->payment_by = 1;
            $payment->modified_at = Carbon::now();
            $payment->modified_by = Auth::user()->id;
            $payment->save();

            return redirect()->route('payment_to_company.index')->with('message','Company Payment Updated Successfully');

        } catch(\Exception $ex){

            return redirect()->back()->with('error','Something Went Wrong - '.$ex->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data['deleted_by'] =  Auth::user()->id;
        $data['deleted_at'] =  Carbon::now();
        try {
            $payment = Payment::findOrFail($id);
            $payment->update($data);

            return redirect()->route('payment_to_company.index')->with('message','Company Payment Deleted Succeessfully');
        } catch(\Exception $ex){

            return redirect()->back()->with('error','Something Went Wrong - '.$ex->getMessage());
        }
    }
}
