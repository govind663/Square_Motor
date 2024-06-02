<?php

namespace App\Http\Controllers;

use App\Http\Requests\ExpensesRequest;
use App\Models\Expenses;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class ExpensesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $expenses = Expenses::orderBy("id","desc")->orderBy("id","desc")->whereNull('deleted_at')->paginate(10);
        return view('master.expenses.index', ['expenses'=> $expenses]);
        // Encoding the URL


    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('master.expenses.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ExpensesRequest $request)
    {
        $data = $request->validated();
        try {
            $expenses = Expenses::create($data);
            $expenses->title = $request->title;
            $expenses->amount = $request->amount;
            $expenses->payment_mode = $request->payment_mode;
            $expenses->notes = $request->notes;
            $expenses->inserted_at = Carbon::now();
            $expenses->inserted_by = Auth::user()->id;
            $expenses->save();

            return redirect()->route('expenses.index')->with('message','Expenses created successfully');

        } catch(\Exception $ex){

            return redirect()->back()->with('error','Something Went Wrong  - '.$ex->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $expenses = Expenses::find($id);

        return view('master.expenses.show', ['expenses'=> $expenses]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $expenses = Expenses::find($id);
        return view('master.expenses.edit', ['expenses'=> $expenses]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ExpensesRequest $request, string $id)
    {
        $data = $request->validated();
        try {
            $expenses = Expenses::find($id);
            $expenses->title = $request->title;
            $expenses->amount = $request->amount;
            $expenses->payment_mode = $request->payment_mode;
            $expenses->notes = $request->notes;
            $expenses->modified_at = Carbon::now();
            $expenses->modified_by = Auth::user()->id;
            $expenses->save();

            return redirect()->route('expenses.index')->with('message','Expenses Updated Successfully');

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
            $expenses = Expenses::find($id);
            $expenses->update($data);

            return redirect()->route('expenses.index')->with('message','Expenses Deleted Succeessfully');
        } catch(\Exception $ex){

            return redirect()->back()->with('error','Something Went Wrong - '.$ex->getMessage());
        }
    }

    // ==== serch expenses by from - To date
    public function search(Request $request){
        // ==== Validation
        $this->validate($request, [
            'from_date' => 'required',
            'to_date' => 'required',
           ],[
            'from_date.required' => 'From Date is required.',
            'to_date.required' => 'To Date is required.',
            ]);

        $fromDate = date("Y-m-d", strtotime($request['from_date']) );
        $toDate = date("Y-m-d", strtotime($request['to_date']) );

        $expenses = Expenses::whereBetween('inserted_at', [$fromDate, $toDate])->orderBy("id","desc")->whereNull('deleted_at')->paginate(10);
        return view('master.expenses.index', ['expenses' => $expenses]);
    }
}
