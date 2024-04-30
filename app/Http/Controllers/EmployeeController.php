<?php

namespace App\Http\Controllers;

use App\Http\Requests\EmployeeRequest;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $employees = User::where('user_type', 2 )->whereNull('deleted_at')->get();

        return view('master.employees.index', ['employees'=> $employees]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('master.employees.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(EmployeeRequest $request)
    {
        $data = $request->validated();
        try {
            $employee = User::create($data);
            $employee->name = $request->name;
            $employee->mobile_no = $request->mobile_no;
            $employee->email = $request->email;
            $employee->password = Hash::make($request->password);
            $employee->user_type = 2;
            $employee->created_at = Carbon::now();
            $employee->created_by = Auth::user()->id;
            $employee->save();

            return redirect()->route('employee.index')->with('message','Employee Created Successfully');

        } catch(\Exception $ex){

            return redirect()->back()->with('error','Something Went Wrong  - '.$ex->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $employee = User::find($id);
        return view('master.employees.show', ['employee'=> $employee]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $employee = User::find($id);
        return view('master.employees.edit', ['employee'=> $employee]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // $data = $request->validated();
        try {
            $employee = User::findOrFail($id);
            $employee->name = $request->name;
            $employee->mobile_no = $request->mobile_no;
            $employee->email = $request->email;
            $employee->updated_at = Carbon::now();
            $employee->updated_by = Auth::user()->id;
            $employee->save();

            return redirect()->route('employee.index')->with('message','Employee Updated Successfully');

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
            $employee = User::findOrFail($id);
            $employee->update($data);

            return redirect()->route('employee.index')->with('message','Employee Deleted Succeessfully');
        } catch(\Exception $ex){

            return redirect()->back()->with('error','Something Went Wrong - '.$ex->getMessage());
        }
    }
}
