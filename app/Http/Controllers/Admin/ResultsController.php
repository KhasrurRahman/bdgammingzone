<?php

namespace App\Http\Controllers\Admin;

use App\Account;
use App\result;
use App\User;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ResultsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

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
        echo 'asdasd';
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $posts= \App\Match_shedule::find($id)->Participants;
        $match = \App\Match_shedule::find($id);
        return view('admin.result.result',compact('posts','match'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $player = \App\Participants::find($id);
        $result = $player->results->first();
        $match = $player->match;
        return view('admin.result.result_edit',compact('player','result','match'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {


        $per_kill = \App\Participants::find($id)->match->per_kill;
        $winner = \App\Participants::find($id)->match->winner;
        $matchId = \App\Participants::find($id)->match->id;
        $userId = \App\Participants::find($id)->user_id;
        $accountId = User::find($userId)->account->id;
        $resultid = \App\Participants::find($id)->results->first()->id;




        //result save
        $result = result::find($resultid);
        $result->k1 = $request->k1;
        $result->k2 = $request->k2;
        $result->k3 = $request->k3;
        $result->k4 = $request->k4;
        $result->w1 = $request->k1 * $per_kill;
        $result->w2 = $request->k2 * $per_kill;
        $result->w3 = $request->k3 * $per_kill;
        $result->w4 = $request->k4 * $per_kill;
        $result->edited = true;
        $result->total_kill = $result->k1+$result->k2+$result->k3+$result->k4;
        if (!empty($request->win)){
            $result->total_win = $result->w1+$result->w2+$result->w3+$result->w4+$winner;
        }else{
            $result->total_win = $result->w1+$result->w2+$result->w3+$result->w4;
        }
        $result->update();


        //account balance add
        $user = Account::find($accountId);
        $user->win_amount = $user->win_amount + $result->total_win;
        $user->earn = $user->earn + $result->total_win;
        $user->update();

        Toastr::success('Result Update Successfully','Success');
        return redirect()->route('admin.result.show',$matchId);

    }



    public function result_update2(Request $request,$id){
        $per_kill = \App\Participants::find($id)->match->per_kill;
        $winner = \App\Participants::find($id)->match->winner;
        $matchId = \App\Participants::find($id)->match->id;
        $userId = \App\Participants::find($id)->user_id;
        $accountId = User::find($userId)->account->id;
        $resultid = \App\Participants::find($id)->results->first()->id;
        $old_win_amount = result::find($resultid)->total_win;




            //result save
        $result = result::find($resultid);
        $result->k1 = $request->k1;
        $result->k2 = $request->k2;
        $result->k3 = $request->k3;
        $result->k4 = $request->k4;
        $result->w1 = $request->k1 * $per_kill;
        $result->w2 = $request->k2 * $per_kill;
        $result->w3 = $request->k3 * $per_kill;
        $result->w4 = $request->k4 * $per_kill;
        $result->edited = true;
        $result->total_kill = $result->k1+$result->k2+$result->k3+$result->k4;
        if (!empty($request->win)){
            $result->total_win = $result->w1+$result->w2+$result->w3+$result->w4+$winner;
        }else{
            $result->total_win = $result->w1+$result->w2+$result->w3+$result->w4;
        }
        $result->update();


        //account balance add
        $balance = Account::find($accountId);
        $balance->earn = $balance->earn - $old_win_amount;
        $balance->earn = $balance->earn + $result->total_win;
        $balance->win_amount = $balance->win_amount - $old_win_amount;
        $balance->win_amount = $balance->win_amount + $result->total_win;
        $balance->update();


        Toastr::success('Result and account balance Successfully','Success');
        return redirect()->route('admin.result.show',$matchId);
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
}
