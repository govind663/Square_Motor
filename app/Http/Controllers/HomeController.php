<?php

namespace App\Http\Controllers;

use App\Models\Agent;
use App\Models\AgentDebitCreditLog;
use App\Models\Policy;
use App\Models\Retailer;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        // ==== Calulate the total Credit Tranx based on Agent_Type
        $creditTranxTotal = AgentDebitCreditLog::where('tranx_type', '1')->whereNull('deleted_at')->sum('credit_tranx');

        // ==== Calulate the total Debit Tranx based on Agent_Type
        $debitTranxTotal = AgentDebitCreditLog::where('tranx_type', '2')->whereNull('deleted_at')->sum('debit_tranx');

        // Calculate totalEarningBalance
        $totalEarningBalance = $creditTranxTotal - $debitTranxTotal;

        // ==== Total Agents Count
        $totalAgents = Agent::whereNull('deleted_at')->count('id');

        // ==== Total Retailer Count
        $totalRetailer = Retailer::whereNull('deleted_at')->count('id');

        // ==== Total Policy Count
        $totalPolicy = Policy::whereNull('deleted_at')->count('id');
        // dd($totalPolicy);

        return view('home',[
            'totalEarningBalance' => $totalEarningBalance,
            'totalAgents'=> $totalAgents,
            'totalRetailer'=> $totalRetailer,
            'totalPolicy'=> $totalPolicy
        ]);
    }

    public function changePassword(Request $request)
    {
        return view('auth.change_password');
    }

    public function updatePassword(Request $request)
    {
            # Validation
            $request->validate([
                'current_password' => 'required',
                'password' => 'required|string|min:8|confirmed',
                'password_confirmation' => 'required',
            ],[
                'current_password.required' => 'Current Password is required',
                'password.required' => 'New Password is required',
                'password_confirmation.required' => 'Confirm Password is required',
            ]);


            #Match The Old Password
            if(!Hash::check($request->current_password, auth()->user()->password)){
                return back()->with("error", "Old Password Doesn't match!");
            }


            #Update the new Password
            User::whereId(auth()->user()->id)->update([
                'password' => Hash::make($request->password)
            ]);

            return back()->with("message", "Password changed successfully!");
    }


}
