<?php

namespace App\Http\Controllers;

use App\Http\Requests\RtoRequest;
use App\Models\RTO;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RtoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $Rto = Rto::orderBy("id","desc")->whereNull('deleted_at')->get();
        return view('master.rto.index', ['Rto'=> $Rto]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('master.rto.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(RtoRequest $request)
    {
        $data = $request->validated();
        try {

            $Rto = RTO::create($data);
            $Rto->city = $request->city;
            $Rto->pincode = $request->pincode;
            $Rto->state = $request->state;
            $Rto->inserted_at = Carbon::now();
            $Rto->inserted_by = Auth::user()->id;
            $Rto->save();

            return redirect()->route('rto.index')->with('message','RTO Created Successfully');

        } catch(\Exception $ex){

            return redirect()->back()->with('error','Something Went Wrong  - '.$ex->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $Rto = Rto::findOrFail($id);
        return view('master.rto.show', ['Rto'=> $Rto]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $Rto = Rto::findOrFail($id);
        return view('master.rto.edit', ['Rto'=> $Rto]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(RtoRequest $request, string $id)
    {
        $data = $request->validated();
        try {
            $Rto = Rto::findOrFail($id);
            $Rto->city = $request->city;
            $Rto->pincode = $request->pincode;
            $Rto->state = $request->state;
            $Rto->modified_at = Carbon::now();
            $Rto->modified_by = Auth::user()->id;
            $Rto->save();

            return redirect()->route('rto.index')->with('message','Rto Updated Successfully');

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

            $Rto = RTO::findOrFail($id);
            $Rto->update($data);

            return redirect()->route('rto.index')->with('message','RTO Deleted Succeessfully');
        } catch(\Exception $ex){

            return redirect()->back()->with('error','Something Went Wrong - '.$ex->getMessage());
        }
    }
}
