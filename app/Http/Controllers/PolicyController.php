<?php

namespace App\Http\Controllers;

use App\Http\Requests\PolicyRequest;
use App\Models\Agent;
use App\Models\InsuranceCompany;
use App\Models\Policy;
use App\Models\RTO;
use App\Models\Vehicle;
use App\Models\Retailer;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PolicyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $policy = Policy::with('agents')->orderBy("id","desc")->whereNull('deleted_at')->get();

        return view('master.policies.index', ['policy'=> $policy]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $agents = Agent::orderBy("id","desc")->whereNull('deleted_at')->get();
        $vehicles = Vehicle::orderBy("id","desc")->whereNull('deleted_at')->get();
        $Rto = RTO::orderBy("id","desc")->whereNull('deleted_at')->get();
        $insuranceCompany = InsuranceCompany::orderBy("id","desc")->whereNull('deleted_at')->get();
        $retailerUser = Retailer::orderBy("id","desc")->whereNull('deleted_at')->get();

        return view('master.policies.create', ['agents'=> $agents, 'vehicles'=>$vehicles, 'Rto'=>$Rto, 'insuranceCompany'=>$insuranceCompany, 'retailerUser'=>$retailerUser]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PolicyRequest $request)
    {
        $data = $request->validated();
        try {
            $policy = Policy::create() ;

            // ==== Upload (policy_doc)
            if (!empty($request->hasFile('policy_doc'))) {
                $image = $request->file('policy_doc');
                $image_name = $image->getClientOriginalName();
                $extension = $image->getClientOriginalExtension();
                $new_name = time() . rand(10, 999) . '.' . $extension;
                $image->move(public_path('/company_policy/policy_doc'), $new_name);

                $image_path = "/company_policy/policy_doc" . $image_name;
                $policy->policy_doc = $new_name;
            }

            $policy->policy_type = $request->policy_type ? $request->policy_type : null;
            $policy->agent_id = $request->agent_id ? $request->agent_id : null;
            $policy->retailer_id = $request->retailer_id ? $request->retailer_id : null;
            $policy->customer_name = $request->customer_name? $request->customer_name : null;
            $policy->vehicle_reg_no = $request->vehicle_reg_no ? $request->vehicle_reg_no : null;
            $policy->r_t_o_id = $request->r_t_o_id ? $request->r_t_o_id : null;
            $policy->vehicle_id = $request->vehicle_id ? $request->vehicle_id : null;
            $policy->vehicle_config = $request->vehicle_config ? $request->vehicle_config : null;
            $policy->insurance_type = $request->insurance_type ? $request->insurance_type : null;
            $policy->insurance_company_id = $request->insurance_company_id ? $request->insurance_company_id : null;
            $policy->main_price = $request->main_price ? $request->main_price : null;
            $policy->company_commission_percentage = $request->company_commission_percentage ? $request->company_commission_percentage : null;
            $policy->profit_amt = $request->profit_amt ? $request->profit_amt : null;
            $policy->tds_deduction = $request->tds_deduction ? $request->tds_deduction : null;
            $policy->actual_profit_amt = $request->actual_profit_amt ? $request->actual_profit_amt : null;
            $policy->commission_percentage = $request->commission_percentage ? $request->commission_percentage : null;
            $policy->comission_rupees = $request->comission_rupees ? $request->comission_rupees : null;
            $policy->payable_amount = $request->payable_amount ? $request->payable_amount : null;
            $policy->from_dt = date("Y-m-d", strtotime($request->from_dt));
            $policy->to_dt = date("Y-m-d", strtotime($request->to_dt));
            $policy->issue_dt = date("Y-m-d", strtotime($request->issue_dt));
            $policy->payment_by = $request->payment_by ? $request->payment_by : null;
            $policy->payment_through = $request->payment_through ? $request->payment_through : null;

            $policy->inserted_at = Carbon::now();
            $policy->inserted_by = Auth::user()->id;
            $policy->save();

            // ==== Generate Policy Number ====
            $policyNumber = "PN". "/" . sprintf("%06d", abs((int) $policy->id + 1))  . "/" . date("Y");
            $update = [
                'policy_no' => $policyNumber,
            ];
            Policy::where('id', $policy->id)->update($update);

            return redirect()->route('policy.index')->with('message', 'Policy Created Successfully');

        } catch(\Exception $ex){

            return redirect()->back()->with('error','Something Went Wrong  - '.$ex->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $policy = Policy::find($id);
        return view('master.policies.show', ['policy'=> $policy]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $policy = Policy::find($id);
        $agents = Agent::orderBy("id","desc")->whereNull('deleted_at')->get();
        $vehicles = Vehicle::orderBy("id","desc")->whereNull('deleted_at')->get();
        $Rto = RTO::orderBy("id","desc")->whereNull('deleted_at')->get();
        $insuranceCompany = InsuranceCompany::orderBy("id","desc")->whereNull('deleted_at')->get();
        $retailerUser = Retailer::orderBy("id","desc")->whereNull('deleted_at')->get();

        // $policyType = Policy::orderBy("id","desc")->whereNull('deleted_at')->pluck('policy_type')->toArray();
        $filledTabs = [];

        // Check which tabs are filled and which are not
        if ($policy->policy_type == '1') {
            $filledTabs[] = 'tab1';
        }
        if ($policy->policy_type == '2') {
            $filledTabs[] = 'tab2';
        }
        return view('master.policies.edit', ['policy'=> $policy, 'agents'=> $agents, 'vehicles'=>$vehicles, 'Rto'=>$Rto, 'insuranceCompany'=>$insuranceCompany, 'filledTabs'=>$filledTabs, 'retailerUser'=>$retailerUser]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // $data = $request->validated();
        try {
            $policy = Policy::find($id);

            // ==== Upload (policy_doc)
            if (!empty($request->hasFile('policy_doc'))) {
                $image = $request->file('policy_doc');
                $image_name = $image->getClientOriginalName();
                $extension = $image->getClientOriginalExtension();
                $new_name = time() . rand(10, 999) . '.' . $extension;
                $image->move(public_path('/company_policy/policy_doc'), $new_name);

                $image_path = "/company_policy/policy_doc" . $image_name;
                $policy->policy_doc = $new_name;
            }

            $policy->policy_type = $request->policy_type ? $request->policy_type : null;
            $policy->agent_id = $request->agent_id ? $request->agent_id : null;
            $policy->retailer_id = $request->retailer_id ? $request->retailer_id : null;
            $policy->customer_name = $request->customer_name? $request->customer_name : null;
            $policy->vehicle_reg_no = $request->vehicle_reg_no ? $request->vehicle_reg_no : null;
            $policy->r_t_o_id = $request->r_t_o_id ? $request->r_t_o_id : null;
            $policy->vehicle_id = $request->vehicle_id ? $request->vehicle_id : null;
            $policy->vehicle_config = $request->vehicle_config ? $request->vehicle_config : null;
            $policy->insurance_type = $request->insurance_type ? $request->insurance_type : null;
            $policy->insurance_company_id = $request->insurance_company_id ? $request->insurance_company_id : null;
            $policy->main_price = $request->main_price ? $request->main_price : null;
            $policy->company_commission_percentage = $request->company_commission_percentage ? $request->company_commission_percentage : null;
            $policy->profit_amt = $request->profit_amt ? $request->profit_amt : null;
            $policy->tds_deduction = $request->tds_deduction ? $request->tds_deduction : null;
            $policy->actual_profit_amt = $request->actual_profit_amt ? $request->actual_profit_amt : null;
            $policy->commission_percentage = $request->commission_percentage ? $request->commission_percentage : null;
            $policy->comission_rupees = $request->comission_rupees ? $request->comission_rupees : null;
            $policy->payable_amount = $request->payable_amount ? $request->payable_amount : null;
            $policy->from_dt = date("Y-m-d", strtotime($request->from_dt));
            $policy->to_dt = date("Y-m-d", strtotime($request->to_dt));
            $policy->issue_dt = date("Y-m-d", strtotime($request->issue_dt));
            $policy->payment_by = $request->payment_by ? $request->payment_by : null;
            $policy->payment_through = $request->payment_through ? $request->payment_through : null;

            $policy->modified_at = Carbon::now();
            $policy->modified_by = Auth::user()->id;
            $policy->save();

            return redirect()->route('policy.index')->with('message','Insurance Company Updated Successfully');

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
            $policy = Policy::findOrFail($id);
            $policy->update($data);

            return redirect()->route('policy.index')->with('message','Policy Deleted Succeessfully');
        } catch(\Exception $ex){

            return redirect()->back()->with('error','Something Went Wrong - '.$ex->getMessage());
        }
    }
}
