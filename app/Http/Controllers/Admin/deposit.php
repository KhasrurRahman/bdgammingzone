<?php

namespace App\Http\Controllers\Admin;

use App\Account;
use App\payment_number;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class deposit extends Controller
{
    public function deposit(){
        $deposit = \App\deposit::orderBy('id', 'desc')->paginate(20);
        $payable = \App\deposit::where('status',false)->get();
        $payment_number = payment_number::find(1);
        return view('admin.deposit.index',compact('deposit','payable','payment_number'));
    }

    public function deposi_confirm($id){
        $user = \App\deposit::find($id)->user;
        $accountId = $user->account->id;
        $requested_balance = \App\deposit::find($id)->amount;
        //balance add
        $account = Account::find($accountId);
        $account->balance = $account->balance + $requested_balance;
        $account->update();
        //status update
        $status = \App\deposit::find($id);
        $status->status = true;
        $status->update();

        Toastr::success('user has been paid successfully','Success');
        return redirect()->back();

    }

}
