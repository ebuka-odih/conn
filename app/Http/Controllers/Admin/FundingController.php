<?php

namespace App\Http\Controllers\Admin;

use App\Funding;
use App\Http\Controllers\Controller;
use App\Mail\FundingMail;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Throwable;

class FundingController extends Controller
{
    public function fund()
    {
        $users = User::where('admin', 0)->get();
        $funds = Funding::latest()->get();
        return view('admin.user.add-fund', compact('users', 'funds'));
    }
    public function sendFund(Request $request)
    {
        $payload = $this->getData($request);
        $payload['status'] = 1;

        $funding = Funding::create($payload);
        $user = User::findOrFail($funding->user_id);

        if ($funding->type === 'Bonus') {
            $user->ref_bonus += $funding->amount;
        } elseif ($funding->type === 'Profit') {
            $user->profit += $funding->amount;
        } elseif ($funding->type === 'Balance') {
            $user->balance += $funding->amount;
        } elseif ($funding->type === 'Invested') {
            $user->invested += $funding->amount;
        } else {
            return redirect()->back()->with('error', "Fund Not Sent");
        }

        $user->save();

        $mailError = $this->sendFundingMail($funding);

        if ($mailError !== null) {
            return redirect()->back()->with('success', "Fund sent successfully")->with('error', $mailError);
        }

        return redirect()->back()->with('success', "Fund sent successfully");
    }

    protected function getData(Request $request)
    {
        $rules = [
            'user_id' => 'required|exists:users,id',
            'type' => 'required|in:Balance,Invested,Bonus,Profit',
            'amount' => 'required|numeric|min:0.01',
        ];
        return $request->validate($rules);
    }

    protected function sendFundingMail(Funding $funding)
    {
        $email = optional($funding->user)->email;

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return 'Account funded, but the user email address is missing or invalid so the notification email was not sent.';
        }

        try {
            Mail::to($email)->send(new FundingMail($funding));
        } catch (Throwable $exception) {
            report($exception);

            return 'Account funded, but the notification email could not be sent. Check the mail sender configuration.';
        }

        return null;
    }


    public function deleteFund($id)
    {
        $fund = Funding::findOrFail($id);
        $fund->delete();
        return redirect()->back()->with('success', 'deleted successfully');
    }


}
