<?php

namespace App\Http\Controllers;

use App\Http\Requests\AgentRequest;
use App\Models\Agent;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AgentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $agents = Agent::orderBy("id","desc")->whereNull('deleted_at')->get();

        return view('master.agents.index')->with('agent', $agents);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('master.agents.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AgentRequest $request)
    {
        $data = $request->validated();
        try {

            $agent = Agent::create($data);
            $agent->name = $request->name;
            $agent->email = $request->email;
            $agent->phone_no = $request->phone_no;
            $agent->address = $request->address;
            $agent->pincode = $request->pincode;
            $agent->city = $request->city;
            $agent->state = $request->state;
            $agent->comission_type = $request->comission_type;
            $agent->percentage_amt = $request->percentage_amt;
            $agent->fixed_amt = $request->fixed_amt;
            $agent->inserted_at = Carbon::now();
            $agent->inserted_by = Auth::user()->id;
            $agent->save();

            // ==== Generate Agent Code
            $agentCode = "AGT". "/" . sprintf("%06d", abs((int) $agent->id + 1))  . "/" . date("Y");
            $update = [
                'agent_code' => $agentCode,
            ];
            Agent::where('id', $agent->id)->update($update);

            return redirect()->route('agent.index')->with('message','Agent created successfully');

        } catch(\Exception $ex){

            return redirect()->back()->with('error','Something Went Wrong  - '.$ex->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $agents = Agent::find($id);

        return view('master.agents.show')->with('agent', $agents);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $agents = Agent::find($id);

        return view('master.agents.edit')->with('agent', $agents);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AgentRequest $request, string $id)
    {
        $data = $request->validated();
        try {

            $agent = Agent::findOrFail($id);
            $agent->name = $request->name;
            $agent->email = $request->email;
            $agent->phone_no = $request->phone_no;
            $agent->address = $request->address;
            $agent->pincode = $request->pincode;
            $agent->city = $request->city;
            $agent->state = $request->state;
            $agent->comission_type = $request->comission_type;
            $agent->percentage_amt = $request->percentage_amt;
            $agent->fixed_amt = $request->fixed_amt;
            $agent->modified_at = Carbon::now();
            $agent->modified_by = Auth::user()->id;
            $agent->save();

            return redirect()->route('agent.index')->with('message','Agent updated successfully');

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
            $agents = Agent::findOrFail($id);
            $agents->update($data);

            return redirect()->route('agent.index')->with('message','Agent Deleted Succeessfully');
        } catch(\Exception $ex){

            return redirect()->back()->with('error','Something Went Wrong - '.$ex->getMessage());
        }
    }
}
