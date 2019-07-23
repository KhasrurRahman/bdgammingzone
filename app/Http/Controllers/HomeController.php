<?php

namespace App\Http\Controllers;

use App\Account;
use App\contact;
use App\Match_shedule;
use App\old_match;
use App\result;
use Brian2694\Toastr\Facades\Toastr;
use DateTime;
use DateTimeZone;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        $match_shedule = Match_shedule::where('status','=',false)->orderBy('id', 'DESC')->take(4)->get();
        $running_match = Match_shedule::where('status','=',true)->orderBy('id', 'DESC')->take(2)->get();
        $top_palyer = Account::where('user_id', '!=' , 1)->orderBy('earn', 'desc')->take(10)->get();
        if (!empty($matchId = Match_shedule::where('end',1)->first())){
            $matchId = Match_shedule::where('end',1)->first()->id;
            $result = result::where('match_id',$matchId)->orderBy('total_win', 'desc')->take(20)->get();
        }else{
            $result = null;
        }

        if ($match_shedule->isEmpty()){
            $time= '3 31, 2012 14:12:00';
        }else
            $time = $match_shedule->first()->t;

        return view('welcome',compact('time','match_shedule','running_match','top_palyer','result'));
    }

    public function index2()
    {
        return view('home');
    }


    public function All_match_result(){
        $matchs = old_match::all();
        return view('layouts.fontend.all_match_result',compact('matchs'));
    }

    public function All_match_result_details($id){
        $match = old_match::find($id);
        $time = $match->t;
        $time3= $match->time;
        return view('layouts.fontend.all_match_result_details',compact('match','time3','time'));
    }

    public function contactUs(){
        return view('layouts.fontend.contact');
    }

    public function contactUs_save(Request $request){
        $contact = new contact();
        $contact->name = $request->name;
        $contact->email = $request->email;
        $contact->message = $request->message;
        $contact->save();

        Toastr::success('Your Message Send Successfully','Success');
        return redirect()->back();

    }


    public function rules(){
        return view('layouts.fontend.rules');
    }

    public function clan(){
        return view('layouts.fontend.clan');
    }


}
