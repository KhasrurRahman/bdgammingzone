<?php

namespace App\Http\Controllers\Author;

use App\Account;
use App\BlockUser;
use App\Match_shedule;
use App\Match_user;
use App\Participants;
use App\profile;
use App\result;
use App\User;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DashbordController extends Controller
{
    public function index(){
        return view('author.dashbord');
    }



    public function confirm_join($id){
        $user = Auth::user()->id;
        $match = Match_shedule::where('id',$id)->first();
        $match_amount = Match_shedule::find($id)->entry_fee;
        $account = Auth::user()->account;
        $matching = Match_user::where('User_id',$user)->where('Match_shedule_id',$id)->count();

        $profile = Auth::user()->profile;

        if ($account->balance < $match_amount)
        {
            Toastr::error('Your account has not enough money','Error');
            return redirect('author/wallet');
        }else{
            if($matching > 0){
                Toastr::error('You Have already Entry This Match','Error');
                return redirect()->back();
            }elseif($matching == 0){

                return view('author.join_confirm',compact('match','profile'));
            }
        }
            return redirect()->back();
    }






    public function entry(Request $request,$id)
    {


        $user = Auth::user()->id;
        $profileID = Auth::user()->profile->id;
        $match_type = Match_shedule::find($id)->type;
        $match_join = Match_shedule::find($id)->join;
        $match_amount = Match_shedule::find($id)->entry_fee;
        $account = Auth::user()->account;
        $accountid = Auth::user()->account->id;
        $matching = Match_user::where('User_id',$user)->where('Match_shedule_id',$id)->count();



        $block_user = BlockUser::where('username','like',$request->p1_name)->first();
        $block_user2 = BlockUser::where('username','like',$request->p2_name)->first();
        $block_user3 = BlockUser::where('username','like',$request->p3_name)->first();
        $block_user4 = BlockUser::where('username','like',$request->p4_name)->first();
        if (($block_user or $block_user4 or $block_user2 or $block_user3) == 0){
            if ($account->balance < $match_amount)
            {
                Toastr::error('Your account has not enough money','Error');
                return redirect('author.wallet');
            }else{
                if($matching > 0){
                    Toastr::error('You Have already Entry This Match','Error');
                    return redirect()->route('shedule.index');
                }elseif($matching == 0){


                    if ($match_type == 1){
                        $matchType = Match_shedule::find($id);
                        $matchType->join = $match_join +1;
                        $matchType->update();
                    }elseif ($match_type == 2){
                        $matchType = Match_shedule::find($id);
                        $matchType->join = $match_join +2;
                        $matchType->update();
                    }elseif ($match_type == 3){
                        $matchType = Match_shedule::find($id);
                        $matchType->join = $match_join +4;
                        $matchType->update();
                    }

//match user add
                    $match = new Match_user();
                    $match->Match_shedule_id = $id;
                    $match->User_id = $user;
                    $match->save();


//update balance
                    $account_update = Account::find($accountid);
                    $account_update->balance = $account->balance - $match_amount;
                    $account_update->update();

//add aprticipant
                    $Participant = new Participants();
                    $Participant->match_id = $id;
                    $Participant->user_id = $user;
                    $Participant->p1_name = $request->p1_name;
                    $Participant->p2_name = $request->p2_name;
                    $Participant->p3_name = $request->p3_name;
                    $Participant->p4_name = $request->p4_name;
                    $Participant->save();

//result table create
                    $result = new result();
                    $result->participants_id = $Participant->id;
                    $result->match_id = $id;
                    $result->save();

//match counter add
                    $match_count = profile::find($profileID);
                    $match_count->match_count = $match_count->match_count + 1;
                    $match_count->save();

                    Toastr::success('You Have Entry a Match','Success');
                    return redirect()->route('shedule.index');
                }
            }
        }else{
            Toastr::success('one of a user has blocked from this website','Success');
            return redirect()->route('shedule.index');
        }






    }




    public function profile(){
        $user = Auth::user();
        $userid = Auth::user()->id;
        $acconts = User::find($userid)->account;
        $current_exp = Account::where('user_id', $userid)->value('earn');
        $current_rank = Account::where('user_id', '!=', $userid)->where('earn', '>=' ,$current_exp)->count() + 1;
        $profile = User::find($userid)->profile;


        return view('author.profile',compact('acconts','profile','user','current_rank'));
    }



    public function profile_save(Request $request){
        $userid = Auth::user();
        $profileid = $userid->profile->id;

        $profile =  profile::find($profileid);
        $profile->mobile = $request->mobile;
        $profile->pubg_id = $request->pubgid;
        $profile->pubg_name = $request->pubgname;
        $profile->update();
        Toastr::success('Your Profile Update Successfully','Success');
        return redirect()->back();
    }




    public function password_update(Request $request){
        $this->validate($request,[
            'old_password'=>'required',
            'password'=>'required|confirmed',
        ]);

        $hashedpassword = Auth::user()->password;

        if (Hash::check($request->old_password,$hashedpassword))
        {
            if(!Hash::check($request->password,$hashedpassword))
            {
                $user = User::find(Auth::id());
                $user->password = Hash::make($request->password);
                $user->save();

                Toastr::success('Password successfully updated','Success');
                Auth::logout();
                return redirect()->back();
            }else{
                Toastr::error('New Password cant be same with old password','Error');
                return redirect()->back();
            }
        }else{
            Toastr::error('old password not match','Error');
            return redirect()->back();
        }
    }
}
