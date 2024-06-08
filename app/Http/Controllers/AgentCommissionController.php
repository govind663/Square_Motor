<?php

namespace App\Http\Controllers;

use App\Http\Requests\AgentCommissionRequest;
use App\Models\Agent;
use App\Models\AgentCommission;
use App\Models\CompanyId;
use App\Models\InsuranceCompany;
use App\Models\InsuranceCompanyID;
use App\Models\RTO;
use App\Models\Vehicle;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AgentCommissionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $agentCommission = AgentCommission::with('agent', 'insuranceCompany', 'companyIds', 'vehicle')->orderBy("id","desc")->whereNull('deleted_at')->get();
        return view('master.agentCommission.index', ['agentCommission' => $agentCommission]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $agents = Agent::orderBy("id","desc")->whereNull('deleted_at')->get();
        $insuranceCompany = InsuranceCompany::orderBy("id","desc")->whereNull('deleted_at')->get();
        $insuranceCompanyID = InsuranceCompanyID::orderBy("id","desc")->whereNull('deleted_at')->get();
        $vehicles = Vehicle::orderBy("id","desc")->whereNull('deleted_at')->get();
        $rtos = RTO::orderBy("id","desc")->whereNull('deleted_at')->get();
        return view('master.agentCommission.create', ['agents' => $agents, 'insuranceCompany' => $insuranceCompany, 'insuranceCompanyID' => $insuranceCompanyID,'vehicles' => $vehicles, 'rtos'=>$rtos]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AgentCommissionRequest $request)
    {
        $data = $request->validated();
        try {
            // cheack data is exist or not in (company_id_id, vehicle_id, r_t_o_id)
            $checkData = AgentCommission::where('company_id_id', $request->company_id_id)->where('vehicle_id', $request->vehicle_id)->where('r_t_o_id', $request->r_t_o_id)->whereNull('deleted_at')->first();
            if($checkData){
                return redirect()->route('agent_commission.index')->with('info','Data Already Exist');
            } else {
                $agentCommission = new AgentCommission();
                $agentCommission->agent_id = $request->agent_id;
                $agentCommission->insurance_company_id = $request->insurance_company_id;
                $agentCommission->company_id_id = $request->company_id_id;
                $agentCommission->r_t_o_id = $request->r_t_o_id;
                $agentCommission->vehicle_id = $request->vehicle_id;
                $agentCommission->comission_type = $request->comission_type;
                $agentCommission->percentage_amt = $request->percentage_amt;
                $agentCommission->fixed_amt = $request->fixed_amt;
                $agentCommission->inserted_at = Carbon::now();
                $agentCommission->inserted_by = Auth::user()->id;
                $agentCommission->save();

                return redirect()->route('agent_commission.index')->with('message','Agent Commission created successfully');
            }

        } catch(\Exception $ex){

            return redirect()->back()->with('error','Something Went Wrong  - '.$ex->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $agentCommission = AgentCommission::with('agents', 'insuranceCompany', 'insuranceCompanyID', 'vehicle')->where('id', $id)->whereNull('deleted_at')->first();
        return view('master.agentCommission.show', ['agentCommission' => $agentCommission]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $agentCommission = AgentCommission::findOrFail($id);
        $agents = Agent::orderBy("id","desc")->whereNull('deleted_at')->get();
        $insuranceCompany = InsuranceCompany::orderBy("id","desc")->whereNull('deleted_at')->get();
        $companyId = CompanyId::orderBy("id","desc")->whereNull('deleted_at')->get();
        $insuranceCompanyID = InsuranceCompanyID::orderBy("id","desc")->whereNull('deleted_at')->get();
        $vehicles = Vehicle::orderBy("id","desc")->whereNull('deleted_at')->get();
        $rtos = RTO::orderBy("id","desc")->whereNull('deleted_at')->get();

        return view('master.agentCommission.edit', ['agents' => $agents, 'insuranceCompany' => $insuranceCompany, 'companyId' => $companyId, 'insuranceCompanyID' => $insuranceCompanyID,'vehicles' => $vehicles, 'agentCommission' => $agentCommission, 'rtos'=>$rtos]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AgentCommissionRequest $request, string $id)
    {
        $data = $request->validated();
        try {
            $agentCommission = AgentCommission::findOrFail($id);
            $agentCommission->agent_id = $request->agent_id;
            $agentCommission->insurance_company_id = $request->insurance_company_id;
            $agentCommission->company_id_id = $request->company_id_id;
            $agentCommission->r_t_o_id = $request->r_t_o_id;
            $agentCommission->vehicle_id = $request->vehicle_id;
            $agentCommission->comission_type = $request->comission_type;
            $agentCommission->percentage_amt = $request->percentage_amt;
            $agentCommission->fixed_amt = $request->fixed_amt;
            $agentCommission->modified_at = Carbon::now();
            $agentCommission->modified_by = Auth::user()->id;
            $agentCommission->save();

            return redirect()->route('agent_commission.index')->with('message','Agent Commission updated successfully');

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
            $agentCommission = AgentCommission::findOrFail($id);
            $agentCommission->update($data);

            return redirect()->route('agent_commission.index')->with('message','Agent Commission Deleted Succeessfully');
        } catch(\Exception $ex){

            return redirect()->back()->with('error','Something Went Wrong - '.$ex->getMessage());
        }
    }

    // ==== Fetch Company Name
    public function fetch_insurance_company(Request $request){
        $data['insuranceCompany'] = AgentCommission::with('insuranceCompany')->where('agent_id', $request->agentID)->whereNull('deleted_at')->get(['insurance_company_id', 'id']);
        return response()->json($data);
    }

    // ==== Fetch Insurance Company Id
    public function fetch_insurance_company_id(Request $request){
        $data['insuranceCompanyID'] = InsuranceCompanyID::with('companyIds')->where('insurance_company_id', $request->insuranceCompanyID)->whereNull('deleted_at')->get(['company_id_id', 'id']);
        return response()->json($data);
    }

    // ==== Fetch RTO
    public function fetch_rto(Request $request){
        $data['rtoData'] = InsuranceCompanyID::with('rto')->where('company_id_id', $request->agentCompanyIDs)->whereNull('deleted_at')->get(['r_t_o_id', 'id']);
        return response()->json($data);
    }

    // ==== Fetch Vehicle Type
    public function fetch_vehicle_type(Request $request){
        $data['vehicleType'] = InsuranceCompanyID::with('vehicle')->where('r_t_o_id', $request->agentRtoID)->whereNull('deleted_at')->get(['vehicle_id', 'id']);

        return response()->json($data);
    }
}
