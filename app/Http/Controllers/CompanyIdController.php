<?php

namespace App\Http\Controllers;

use App\Http\Requests\CompanyIdRequest;
use App\Models\CompanyId;
use App\Models\InsuranceCompany;
use App\Models\InsuranceCompanyID;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class CompanyIdController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $companiesTDS = CompanyId::with('insuranceCompanies', 'insuranceCompanyIdies')->orderBy("id","desc")->whereNull('deleted_at')->get();
        // dd($companiesTDS);
        return view('master.company_ids.index', ['companiesTDS' => $companiesTDS]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $insuranceCompanies = InsuranceCompany::whereNull('deleted_at')->get();
        return view('master.company_ids.create', ['insuranceCompanies' => $insuranceCompanies]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CompanyIdRequest $request)
    {
        $data = $request->validated();
        try {
            $companyId = new CompanyId();
            $companyId->insurance_company_id = $request->insurance_company_id;
            $companyId->insurance_company_i_d_id = $request->insurance_company_i_d_id;
            $companyId->tds_in_percentage = $request->tds_in_percentage;
            $companyId->inserted_at = Carbon::now();
            $companyId->inserted_by = Auth::user()->id;
            $companyId->save();

            return redirect()->route('company_id.index')->with('message','Company Id created successfully');

        } catch(\Exception $ex){

            return redirect()->back()->with('error','Something Went Wrong  - '.$ex->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(CompanyId $companyId)
    {
        $companiesTDS = CompanyId::with('insuranceCompany, insuranceCompanyID')->where('id', $companyId)->whereNull('deleted_at')->first();
        return view('master.company_ids.show', ['companiesTDS' => $companiesTDS]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $companiesTDS = CompanyId::findOrFail($id);
        $insuranceCompanies = InsuranceCompany::whereNull('deleted_at')->get();
        $insuranceCompanyIDs = InsuranceCompanyID::whereNull('deleted_at')->get();

        return view('master.company_ids.edit', ['companiesTDS' => $companiesTDS, 'insuranceCompanies' => $insuranceCompanies, 'insuranceCompanyIDs' => $insuranceCompanyIDs]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CompanyIdRequest $request, string $id)
    {
        $data = $request->validated();
        try {
            $companyId = CompanyId::findOrFail($id);
            $companyId->insurance_company_id = $request->insurance_company_id;
            $companyId->insurance_company_i_d_id = $request->insurance_company_i_d_id;
            $companyId->tds_in_percentage = $request->tds_in_percentage;
            $companyId->modified_at = Carbon::now();
            $companyId->modified_by = Auth::user()->id;
            $companyId->save();

            return redirect()->route('company_id.index')->with('message','Company Id updated successfully');

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
            $companiesTDS = CompanyId::findOrFail($id);
            $companiesTDS->update($data);

            return redirect()->route('company_id.index')->with('message','Company Id Deleted Succeessfully');
        } catch(\Exception $ex){

            return redirect()->back()->with('error','Something Went Wrong - '.$ex->getMessage());
        }
    }

    // fetch_insurance_company_name
    public function fetch_insurance_company_name(Request $request){
        $data['companyIds'] = InsuranceCompanyID::where('insurance_company_id', $request->insuranceCompanyID)->whereNull('deleted_at')->get(['company_id', 'id']);
        return response()->json($data);
    }
}
