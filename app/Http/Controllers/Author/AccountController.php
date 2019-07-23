<?php

namespace App\Http\Controllers\Author;

use App\Account;
use App\deposit;
use App\payment_number;
use App\withdraw_request;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AccountController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function deposit_confirm(Request $request)
    {
        $userId = Auth::id();

        $account = new deposit();
        $account->user_id = $userId;
        $account->amount = $request->amount;
        $account->mobile = $request->mobile;
        $account->method = $request->methoddd;
        $account->save();

        Toastr::success('Your Requested has been sent,Within 1 hours your money will be added','Success');
        return redirect()->route('author.profile');
    }

    public function withdraw_confirm(Request $request)
    {
        $user = Auth::user();
        $userid = Auth::user()->id;
        $win_balance = $user->account->win_amount;

        if ($request->amount > $win_balance){
            Toastr::error('You dont have enough WINING BALANCE','error');
            return redirect()->back();
        }else{
            $account = new withdraw_request();
            $account->user_id = $userid;
            $account->amount = $request->amount;
            $account->mobile = $request->mobile;
            $account->method = $request->methoddd;
            $account->save();

            Toastr::success('withdraw request successfully. You will get your requested money within 6 hours','Success');
            return redirect()->route('author.profile');
        }


    }

    public function wallet(){
        $payment_number = payment_number::find(1);
        return view('author.account.wallet',compact('payment_number'));
    }



    public function convert_win_to_balance(Request $request){
       $user = Auth::user();
       $userId = Auth::id();
       $current_Win_balance = $user->account->win_amount;
       if ($current_Win_balance < $request->amount ){
           Toastr::error('you dont have enough WINING BALANCE','error');
           return redirect()->back();
       }else{
           $balance = Account::where('user_id',$userId)->first();
           $balance->win_amount = $balance->win_amount - $request->amount;
           $balance->balance = $balance->balance + $request->amount;
           $balance->update();

           Toastr::success('Convert Successful','success');
           return redirect()->back();
       }
    }




}
