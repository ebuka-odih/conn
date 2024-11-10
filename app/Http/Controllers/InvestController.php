<?php

namespace App\Http\Controllers;

use App\Invest;
use App\Package;
use App\Subscribe;
use App\Subscription;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class InvestController extends Controller
{
    public function plans()
    {
        $plans = Package::all();
        return view('dashboard.investment.plans', compact('plans'));
    }
    public function invest(Request $request)
    {
        $request->validate([
            'amount' => 'required'
        ]);
        $sub_id = $request->package_id;
        $plan_id = Package::findOrFail($sub_id);
        $sub = new Invest();
        if ($request->amount < \auth()->user()->balance){
            if ($request->get('amount') < $plan_id->min_deposit || $request->get('amount') > $plan_id->max_deposit)
            {
                return redirect()->back()->with('declined', "Please enter the amount between min/max deposit");
            }else{
                $sub->package_id = $request->package_id;
                $sub->user_id = Auth::id();
                $sub->amount = $request->amount;
                $sub->status = 1;
                $sub->save();
                $user = User::findOrFail($sub->user_id);
                $user->balance -= $sub->amount;
                $user->invested += $sub->amount;
                $user->save();
                return redirect()->route('user.investDetail', $sub->id);
            }
        }
        return redirect()->back()->with('insufficient', "Sorry! You do not have upto that amount in your balance");

    }

    public function investDetail($id)
    {
        return view('dashboard.investment.investment');
    }
}
