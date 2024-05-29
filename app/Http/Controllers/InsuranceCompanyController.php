<?php

namespace App\Http\Controllers;

use App\Http\Requests\InsuranceCompanyRequest;
use App\Models\InsuranceCompany;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class InsuranceCompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $insuranceCompanies = InsuranceCompany::orderBy("id","desc")->whereNull('deleted_at')->get();
        return view('master.insurance_companies.index', ['insuranceCompanies'=> $insuranceCompanies]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('master.insurance_companies.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(InsuranceCompanyRequest $request)
    {
        $data = $request->validated();
        try {
            $insuranceCompany = InsuranceCompany::create($data);

            // ==== Upload (logo_doc)
            if (!empty($request->hasFile('logo_doc'))) {
                $image = $request->file('logo_doc');
                $image_name = $image->getClientOriginalName();
                $extension = $image->getClientOriginalExtension();
                $new_name = time() . rand(10, 999) . '.' . $extension;
                $image->move(public_path('/company_policy/logo_doc'), $new_name);

                $image_path = "/company_policy/logo_doc" . $image_name;
                $insuranceCompany->logo_doc = $new_name;
            }

            $insuranceCompany->company_name = $request->company_name;
            $insuranceCompany->description = $request->description;
            $insuranceCompany->inserted_at = Carbon::now();
            $insuranceCompany->inserted_by = Auth::user()->id;
            $insuranceCompany->save();

            return redirect()->route('insurance_company.index')->with('message', 'Insurance Company Created Successfully');

        } catch(\Exception $ex){

            return redirect()->back()->with('error','Something Went Wrong  - '.$ex->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $insuranceCompany = InsuranceCompany::find($id);

        return view('master.insurance_companies.show', ['insuranceCompany'=>$insuranceCompany]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $insuranceCompany = InsuranceCompany::find($id);

        return view('master.insurance_companies.edit', ['insuranceCompany'=>$insuranceCompany]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(InsuranceCompanyRequest $request, string $id)
    {
        $data = $request->validated();
        try {

            $insuranceCompany = InsuranceCompany::findOrFail($id);

            // ==== Upload (logo_doc)
            if (!empty($request->hasFile('logo_doc'))) {
                $image = $request->file('logo_doc');
                $image_name = $image->getClientOriginalName();
                $extension = $image->getClientOriginalExtension();
                $new_name = time() . rand(10, 999) . '.' . $extension;
                $image->move(public_path('/company_policy/logo_doc'), $new_name);

                $image_path = "/company_policy/logo_doc" . $image_name;
                $insuranceCompany->logo_doc = $new_name;
            }

            $insuranceCompany->company_name = $request->company_name;
            $insuranceCompany->description = $request->description;
            $insuranceCompany->modified_at = Carbon::now();
            $insuranceCompany->modified_by = Auth::user()->id;
            $insuranceCompany->save();

            return redirect()->route('insurance_company.index')->with('message','Insurance Company Updated Successfully');

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
            $insuranceCompany = InsuranceCompany::findOrFail($id);
            $insuranceCompany->update($data);

            return redirect()->route('insurance_company.index')->with('message','Insurance Company Deleted Succeessfully');
        } catch(\Exception $ex){

            return redirect()->back()->with('error','Something Went Wrong - '.$ex->getMessage());
        }
    }
}
