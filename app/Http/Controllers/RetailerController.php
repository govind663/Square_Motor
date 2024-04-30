<?php

namespace App\Http\Controllers;

use App\Http\Requests\RetailerRequest;
use App\Models\Retailer;
use App\Models\Vehicle;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RetailerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $retailers = Retailer::with('Vehicle')->orderBy("id","desc")->whereNull('deleted_at')->get();
        return view('master.retailers.index', ['retailers'=> $retailers]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $vehicles = Vehicle::whereNull('deleted_at')->get();
        return view('master.retailers.create', ['vehicles'=>$vehicles]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(RetailerRequest $request)
    {
        $data = $request->validated();
        try {
            $retailer = Retailer::create($data);
            $retailer->name = $request->name;
            $retailer->mobile = $request->mobile;
            $retailer->email = $request->email;
            $retailer->vehicle_id = $request->vehicle_id;
            $retailer->address = $request->address;
            $retailer->pincode = $request->pincode;
            $retailer->city = $request->city;
            $retailer->state = $request->state;
            $retailer->discount_type = $request->discount_type;
            $retailer->percentage_amt = $request->percentage_amt ? $request->percentage_amt : null;
            $retailer->fixed_amt = $request->fixed_amt ? $request->fixed_amt : null;
            $retailer->inserted_at = Carbon::now();
            $retailer->inserted_by = Auth::user()->id;
            $retailer->save();

            return redirect()->route('retailer.index')->with('message', 'Retailer Created Successfully');

        } catch(\Exception $ex){

            return redirect()->back()->with('error','Something Went Wrong  - '.$ex->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $retailer = Retailer::findOrFail($id)->with('Vehicle');
        $vehicles = Vehicle::whereNull('deleted_at')->get();
        return view('master.retailers.show', ['retailer'=> $retailer, 'vehicles'=> $vehicles]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $retailer = Retailer::findOrFail($id);
        $vehicles = Vehicle::whereNull('deleted_at')->get();
        return view('master.retailers.edit', ['retailer'=> $retailer,  'vehicles'=> $vehicles]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(RetailerRequest $request, string $id)
    {
        $data = $request->validated();
        try {
            $retailer = Retailer::findOrFail($id);
            $retailer->name = $request->name;
            $retailer->mobile = $request->mobile;
            $retailer->email = $request->email;
            $retailer->vehicle_id = $request->vehicle_id;
            $retailer->address = $request->address;
            $retailer->pincode = $request->pincode;
            $retailer->city = $request->city;
            $retailer->state = $request->state;
            $retailer->discount_type = $request->discount_type;
            $retailer->percentage_amt = $request->percentage_amt;
            $retailer->fixed_amt = $request->fixed_amt;
            $retailer->modified_at = Carbon::now();
            $retailer->modified_by = Auth::user()->id;
            $retailer->save();

            return redirect()->route('retailer.index')->with('message','Retailer Updated Successfully');

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
            $retailer = Retailer::findOrFail($id);
            $retailer->update($data);

            return redirect()->route('retailer.index')->with('message','Retailer Deleted Succeessfully');
        } catch(\Exception $ex){

            return redirect()->back()->with('error','Something Went Wrong - '.$ex->getMessage());
        }
    }
}
