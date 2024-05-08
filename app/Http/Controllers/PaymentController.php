<?php

namespace App\Http\Controllers;

use App\Http\Requests\PaymentRequest;
use App\Models\Agent;
use App\Models\Payment;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $payments = Payment::with('agents')->orderBy("id","desc")->whereNull('deleted_at')->get();
        return view('finance.payments.index',['payments' => $payments]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $agent = Agent::orderBy("id","desc")->whereNull('deleted_at')->get();
        return view('finance.payments.create', ['agent' => $agent]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PaymentRequest $request)
    {
        $data = $request->validated();
        try {
            $payment = Payment::create($data);
            $payment->agent_id = $request->agent_id;
            $payment->amount = $request->amount;
            $payment->payment_mode = $request->payment_mode;
            $payment->notes = $request->notes;
            $payment->payment_dt = date("Y-m-d", strtotime($request->payment_dt));
            $payment->payment_status = 1;
            $payment->inserted_at = Carbon::now();
            $payment->inserted_by = Auth::user()->id;
            $payment->save();

            return redirect()->route('payment.index')->with('message','Payment created successfully');

        } catch(\Exception $ex){

            return redirect()->back()->with('error','Something Went Wrong  - '.$ex->getMessage());
        }
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
        $payment = Payment::find($id);
        $agent = Agent::orderBy("id","desc")->whereNull('deleted_at')->get();
        return view('finance.payments.edit', ['payment'=> $payment, 'agent' => $agent]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PaymentRequest $request, string $id)
    {
        try {
            $payment = Payment::find($id);
            $payment->agent_id = $request->agent_id;
            $payment->amount = $request->amount;
            $payment->payment_mode = $request->payment_mode;
            $payment->notes = $request->notes;
            $payment->payment_dt = date("Y-m-d", strtotime($request->payment_dt));
            $payment->modified_at = Carbon::now();
            $payment->modified_by = Auth::user()->id;
            $payment->save();

            return redirect()->route('payment.index')->with('message','Payment Updated Successfully');

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

            $payment = Payment::findOrFail($id);
            $payment->update($data);

            return redirect()->route('payment.index')->with('message','Payment Deleted Succeessfully');
        } catch(\Exception $ex){

            return redirect()->back()->with('error','Something Went Wrong - '.$ex->getMessage());
        }
    }
}
