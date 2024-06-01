<?php

namespace App\Http\Controllers;

use App\Http\Requests\VehicleRequest;
use App\Models\Vehicle;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VehicleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $vehicles = Vehicle::orderBy("id","desc")->whereNull('deleted_at')->get();

        return view('master.vehicles.index', ['vehicles' => $vehicles]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('master.vehicles.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(VehicleRequest $request)
    {
        $data = $request->validated();
        try {
            $vehicle = Vehicle::create($data);
            $vehicle->vehicle_type = $request->vehicle_type;
            $vehicle->vehicle_name = $request->vehicle_name;
            $vehicle->description = $request->description;
            $vehicle->inserted_at = Carbon::now();
            $vehicle->inserted_by = Auth::user()->id;
            $vehicle->save();

            return redirect()->route('vehicle.index')->with('message','Vehicle Created Successfully');

        } catch(\Exception $ex){

            return redirect()->back()->with('error','Something Went Wrong  - '.$ex->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $vehicle = Vehicle::findOrFail($id);
        return view('master.vehicles.show', ['vehicles' => $vehicle]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $vehicle = Vehicle::findOrFail($id);
        return view('master.vehicles.edit', ['vehicles' => $vehicle]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(VehicleRequest $request, string $id)
    {
        $data = $request->validated();
        try {
            $vehicle = Vehicle::findOrFail($id);
            $vehicle->vehicle_type = $request->vehicle_type;
            $vehicle->vehicle_name = $request->vehicle_name;
            $vehicle->description = $request->description;
            $vehicle->modified_at = Carbon::now();
            $vehicle->modified_by = Auth::user()->id;
            $vehicle->save();

            return redirect()->route('vehicle.index')->with('message','Vehicle Updated Successfully');

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
            $vehicle = Vehicle::findOrFail($id);
            $vehicle->update($data);

            return redirect()->route('vehicle.index')->with('message','Vehicle Deleted Succeessfully');
        } catch(\Exception $ex){

            return redirect()->back()->with('error','Something Went Wrong - '.$ex->getMessage());
        }
    }

    // ==== fetch_current_vehicle_type

    public function fetch_current_vehicle_type(Request $request){

        $data['agentVehicleType'] = Vehicle::where('id',$request->agentVehicleID)->pluck('vehicle_type');
        return response()->json($data);
    }
}
