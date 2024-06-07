<?php

namespace App\Http\Controllers;

use App\Http\Requests\InsuranceCompanyIDRequest;
use App\Models\CompanyId;
use App\Models\InsuranceCompany;
use App\Models\InsuranceCompanyID;
use App\Models\RTO;
use App\Models\Vehicle;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class InsuranceCompanyIDController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $InsuranceCompanyID = InsuranceCompanyID::with('insuranceCompany', 'companyIds')->orderBy("id","desc")->whereNull('deleted_at')->get();
        return view('master.insurance_company_ids.index', ['InsuranceCompanyID' => $InsuranceCompanyID]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $insuranceCompany = InsuranceCompany::orderBy("id","desc")->whereNull('deleted_at')->get();
        $vehicles = Vehicle::orderBy("id","desc")->whereNull('deleted_at')->get();
        $rtos = RTO::orderBy("id","desc")->whereNull('deleted_at')->get();
        return view('master.insurance_company_ids.create', ['insuranceCompany' => $insuranceCompany, 'vehicles' => $vehicles, 'rtos'=>$rtos]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(InsuranceCompanyIDRequest $request)
    {
        $data = $request->validated();
        try {

            // cheack data is exist or not in (company_id_id, vehicle_id, r_t_o_id)
            $checkData = InsuranceCompanyID::where('company_id_id', $request->company_id_id)->where('vehicle_id', $request->vehicle_id)->where('r_t_o_id', $request->r_t_o_id)->whereNull('deleted_at')->first();
            if($checkData){
                return redirect()->route('insurance_company_id.index')->with('info', 'Data Already Exist');
            }else{
                $InsuranceCompanyID = new InsuranceCompanyID();
                $InsuranceCompanyID->insurance_company_id = $request->insurance_company_id;
                $InsuranceCompanyID->company_id_id = $request->company_id_id;
                $InsuranceCompanyID->vehicle_id = $request->vehicle_id;
                $InsuranceCompanyID->r_t_o_id = $request->r_t_o_id;
                $InsuranceCompanyID->comission_type = $request->comission_type;
                $InsuranceCompanyID->commision_percentage = $request->commision_percentage;
                $InsuranceCompanyID->comission_fixed = $request->commision_fixed;
                $InsuranceCompanyID->inserted_at = Carbon::now();
                $InsuranceCompanyID->inserted_by = Auth::user()->id;
                $InsuranceCompanyID->save();

                return redirect()->route('insurance_company_id.index')->with('message', 'Insurance Company ID Created Successfully');
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
        $InsuranceCompanyID = InsuranceCompanyID::with('insuranceCompany')->where('insurance_company_id', $id)->whereNull('deleted_at')->get();
        return view('master.insurance_company_ids.show', ['InsuranceCompanyID' => $InsuranceCompanyID]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $InsuranceCompanyID = InsuranceCompanyID::find($id);
        $insuranceCompany = InsuranceCompany::orderBy("id","desc")->whereNull('deleted_at')->get();
        $vehicles = Vehicle::orderBy("id","desc")->whereNull('deleted_at')->get();
        $rtos = RTO::orderBy("id","desc")->whereNull('deleted_at')->get();
        return view('master.insurance_company_ids.edit', ['insuranceCompany' => $insuranceCompany, 'InsuranceCompanyID' => $InsuranceCompanyID, 'vehicles' => $vehicles, 'rtos'=>$rtos]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(InsuranceCompanyIDRequest $request, string $id)
    {
        $data = $request->validated();
        try {

            $InsuranceCompanyID = InsuranceCompanyID::findOrFail($id);
            $InsuranceCompanyID->insurance_company_id = $request->insurance_company_id;
            $InsuranceCompanyID->company_id_id = $request->company_id_id;
            $InsuranceCompanyID->vehicle_id = $request->vehicle_id;
            $InsuranceCompanyID->r_t_o_id = $request->r_t_o_id;
            $InsuranceCompanyID->comission_type = $request->comission_type;
            $InsuranceCompanyID->commision_percentage = $request->commision_percentage;
            $InsuranceCompanyID->commision_fixed = $request->commision_fixed;
            $InsuranceCompanyID->modified_at = Carbon::now();
            $InsuranceCompanyID->modified_by = Auth::user()->id;
            $InsuranceCompanyID->save();

            return redirect()->route('insurance_company_id.index')->with('message','Insurance Company ID Updated Successfully');

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
            $InsuranceCompanyID = InsuranceCompanyID::findOrFail($id);
            $InsuranceCompanyID->update($data);

            return redirect()->route('insurance_company_id.index')->with('message','Insurance Company ID Deleted Succeessfully');
        } catch(\Exception $ex){

            return redirect()->back()->with('error','Something Went Wrong - '.$ex->getMessage());
        }

    }

    // === fetch_company_ids
    public function fetch_company_ids (Request $request){
        $data['companyIds'] = CompanyID::where('insurance_company_id', $request->insuranceCompanyID)->whereNull('deleted_at')->get(['company_id', 'id']);
        return response()->json($data);
    }

    // === fetch_company_commission
    public function fetch_company_commission (Request $request){
        $data['companyCommission'] = CompanyID::where('id', $request->companyID)->whereNull('deleted_at')->get(['commission_type']);
        return response()->json($data);
    }
}
