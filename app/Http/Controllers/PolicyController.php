<?php

namespace App\Http\Controllers;

use App\Http\Requests\PolicyRequest;
use App\Models\Agent;
use App\Models\InsuranceCompany;
use App\Models\Policy;
use App\Models\RTO;
use App\Models\Vehicle;
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
        // $policy = Policy::orderBy("id","desc")->whereNull('deleted_at')->get();
        $policy =null;
        return view('master.policies.index', ['policy'=> $policy]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $agents = Agent::whereNull('deleted_at')->get();
        $vehicles = Vehicle::whereNull('deleted_at')->get();
        $Rto = RTO::whereNull('deleted_at')->get();
        $insuranceCompany = InsuranceCompany::whereNull('deleted_at')->get();
        return view('master.policies.create', ['agents'=> $agents, 'vehicles'=>$vehicles, 'Rto'=>$Rto, 'insuranceCompany'=>$insuranceCompany]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
        return view('master.policies.edit', ['policy'=> $policy]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
