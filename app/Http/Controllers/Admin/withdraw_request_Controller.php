<?php

namespace App\Http\Controllers\Admin;

use App\Account;
use App\User;
use App\withdraw_request;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class withdraw_request_Controller extends Controller
{
    public function index(){
        $withdraw = withdraw_request::orderBy('id', 'desc')->paginate(20);
        $payable = withdraw_request::where('status',false)->get();
        return view('admin.withdraw_request.index',compact('withdraw','payable'));
    }

    public function delete($id){
        $withdraw = withdraw_request::find($id);
        $withdraw->delete();

        Toastr::success('User Deleted Successfuly','Success');
        return redirect()->back();
    }


    public function paid($id){
        $withdraw = withdraw_request::find($id);
        $requested_amount = $withdraw->amount;
        $user = User::find($withdraw->user_id);

        //payment
        $account = Account::where('user_id',$withdraw->user_id)->first();
        $account->win_amount = $account->win_amount - $requested_amount;
        $account->update();
      //payment status
        $withdraw->status = true;
        $withdraw->update();

        Toastr::success('User Requested amount paid','Success');
        return redirect()->back();
    }
}
