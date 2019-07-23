<?php

namespace App\Http\Controllers;

use App\Account;
use App\Match_shedule;
use App\old_match;
use App\Participants;
use App\result;
use App\stream;
use Illuminate\Http\Request;

class HomeController2 extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $matchs = Match_shedule::where('status','=',false)->where('end','=',false)->orderBy('id', 'DESC')->paginate(10);
        return view('layouts.fontend.match_shedule',compact('matchs'));
    }

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
        $match = Match_shedule::find($id);
        $time = $match->t;
        $time3= $match->time;
        $player = $match->Participants;



        return view('layouts.fontend.match_details',compact('time','match','time3','player'));
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

    }

    public function running()
    {
        $matchs = Match_shedule::where('status','=',true)->where('end','=',false)->orderBy('id', 'DESC')->paginate(10);
        return view('layouts.fontend.running_match',compact('matchs'));
    }

    public function previous()
    {
        $matchs = Match_shedule::where('end','=',true)->orderBy('id', 'DESC')->paginate(10);
        return view('layouts.fontend.previous',compact('matchs'));
    }


    public function single_mathc_result($id){
        $match = Match_shedule::find($id);
        $top_4_palyer = result::where('match_id',$id)->orderBy('total_win', 'desc')->take(4)->get();
        $top_player = result::where('match_id',$id)->orderBy('total_win', 'desc')->first();
        $userId = $top_player->Participants->user->id;
        $result = result::where('match_id',$id)->orderBy('total_win', 'desc')->get();
        $current_exp = Account::where('user_id', $userId)->value('earn');
        $current_rank = Account::where('user_id', '!=', $userId)->where('earn', '>=' ,$current_exp)->count() + 1;
        $match_type = $match->type;
        $key=1;

        return view('layouts.fontend.single_match_result',compact('top_4_palyer','result','key','top_player','userId','current_rank','match_type','match'));
    }


    public function stream($id){


        if ($id == 0){
            $link = null;
            if (!empty($match = Match_shedule::where('status',false)->orderBy('created_at', 'desc')->first())){
                $match = Match_shedule::where('status',false)->orderBy('created_at', 'desc')->first();
                $time = $match->t;
                $time3= $match->time;

            }else{
                $match = old_match::orderBy('created_at', 'DESC')->first();
                $time = $match->t;
                $time3= $match->time;
            }



        }else{
            $streamId= stream::find($id);
            $link = $streamId->link;
            $matchid = $streamId->match_id;
            $match = Match_shedule::find($matchid);
            $time = $match->t;
            $time3= $match->time;
        }
        $old_match = old_match::paginate(4);
        return view('layouts.fontend.stream',compact('link','old_match','match','time','time3'));
    }
}
