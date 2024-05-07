<?php

namespace App\Http\Controllers;

use App\Http\Requests\AgentToCompanyRequest;
use App\Models\Agent;
use App\Models\AgentToCompany;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AgentToCompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $agentToCompanys = AgentToCompany::orderBy("id","desc")->whereNull('deleted_at')->get();
        $agent = Agent::orderBy("id","desc")->whereNull('deleted_at')->get();

        return view('finance.agent-to-company.index', ['agent' => $agent]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('finance.agent-to-company.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AgentToCompanyRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $agentToCompany = AgentToCompany::find($id);
        return view('finance.agent-to-company.edit');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AgentToCompanyRequest $request, string $id)
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
