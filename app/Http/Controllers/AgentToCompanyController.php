<?php

namespace App\Http\Controllers;

use App\Http\Requests\AgentToCompanyRequest;
use App\Models\Agent;
use Illuminate\Http\Request;

class AgentToCompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $agent = Agent::orderBy("id","desc")->whereNull('deleted_at')->get();

        return view('finance.agent-to-company.index', ['agent' => $agent]);
    }
    
}
