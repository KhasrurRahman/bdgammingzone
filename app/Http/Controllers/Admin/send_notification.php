<?php

namespace App\Http\Controllers\Admin;

use App\Notifications\roomId;
use App\payment_number;
use App\User;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Queue\Jobs\Job;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Notification;

class send_notification extends Controller
{
    public function send_notification($id){
        $match = \App\Match_shedule::find($id);

//        Artisan::queue('queue:work');
        foreach ($match->user as $users) {
            Notification::route('mail',$users->email)
                ->notify(new roomId($match));
        }


        Toastr::success('Notification successfully send','Success');
        return redirect()->back();
    }


    public function payment_number(Request $request){
        $payment_nuber = payment_number::find(1);
        $payment_nuber->bkash = $request->bkash;
        $payment_nuber->roket = $request->roket;
        $payment_nuber->update();

        Toastr::success('payment number set successfully','Success');
        return redirect()->back();
    }
}
