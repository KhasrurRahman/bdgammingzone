<?php

namespace App\Http\Controllers\Admin;

use App\Account;
use App\Endgame;
use App\Endmatch_participants;
use App\old_match;
use App\Participants;
use App\stream;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class match_shedule extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $time=Carbon::now();
        $posts=\App\Match_shedule::where('end','=',false)
            ->where('status','=',false)
            ->orderBy('created_at', 'ASC')->get();

        return view('admin.match_shedule.index',compact('posts','time'));
    }



    public function runningMatch(){
        $time=Carbon::now();
        $posts=\App\Match_shedule::where('end','=',false)
            ->where('status','=',true)
            ->orderBy('id', 'DESC')->get();

        return view('admin.match_shedule.runningMatch',compact('posts','time'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.match_shedule.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'title' => 'required',
        ]);
                $match_shedule = \App\Match_shedule::create([
			       'title' => $request->title,
			       'date' => $request->date,
			       'time' => $request->time,
			       'entry_fee' => $request->entry_fee,
			       'per_kill' => $request->per_kill,
			       'winner' => $request->winner,
			       'join' => $request->join,
			       'map' => $request->map,
			       'type' => $request->type,
			       'platform' => $request->platform,
			       'version' => $request->version,
			       'weapon' => $request->weapon,
			       'description' => $request->description,
			       't' => $request->t,
        ]);
 //add stream table
        $stream = new stream();
        $stream->match_id = $match_shedule->id;
        $stream->link = $request->link;
        $stream->save();



        Toastr::success('schedule successfully Created','Success');
        return redirect()->route('admin.match_shedule.index');
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
    public function edit( $id )
    {
        $map = \App\Match_shedule::all();
        $match = \App\Match_shedule::find($id);
        return view('admin.match_shedule.edit',compact('match','map'));
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

        $streamId = \App\Match_shedule::find($id)->stream->first()->id;


        $match= \App\Match_shedule::find($id);
        $match->title = $request->title;
        $match->date = $request->date;
        $match->time = $request->time;
        $match->entry_fee = $request->entry_fee;
        $match->per_kill = $request->per_kill;
        $match->winner = $request->winner;
        $match->join = $request->join;
        $match->map = $request->map;
        $match->type = $request->type;
        $match->platform = $request->platform;
        $match->version = $request->version;
        $match->description = $request->description;
        $match->t = $request->t;
        $match->update();



        //add stream table
        $stream = stream::find($streamId);
        $stream->link = $request->link;
        $stream->update();

        Toastr::success('post successfully updated','Success');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $match = \App\Match_shedule::find($id);
        $match->delete();

        Toastr::success('shedule delete successfully','Success');
        return redirect()->back();
    }

    public  function move($id)
    {
        $running = \App\Match_shedule::find($id);
        if($running->status == true)
            $running->status = false;
        else
            $running->status = true;
        $running->save();

        Toastr::success('Status has been changed','Success');
        return redirect()->back();
    }




    public  function move2($id)
    {
        $running = \App\Match_shedule::find($id);
        if($running->end == 0)
            $running->end = 1;
        else
            $running->end = 0;
        $running->save();

        Toastr::success('match has been moved to end ','Success');
        return redirect()->back();
    }


    public function previous()
    {
        $time=Carbon::now();
        $posts = \App\Match_shedule::where('end','=',1)->orderBy('id', 'DESC')->get();
        return view('admin.endMatch.index',compact('posts','time'));
    }


    public function moveTooldmatch($id){
        $stram_link = \App\Match_shedule::find($id)->stream->first()->link;


        $match = \App\Match_shedule::find($id);
        $title = $match->title;
        $date = $match->date;
        $time = $match->time;
        $entry_fee = $match->entry_fee;
        $per_kill = $match->per_kill;
        $winner = $match->winner;
        $join = $match->join;
        $map = $match->map;
        $type = $match->type;
        $platform = $match->platform;
        $version = $match->version;
        $weapon = $match->weapon;
        $description = $match->description;
        $t = $match->t;
        $match->delete();


        $old_match  = new old_match();
        $old_match->title = $title;
        $old_match->date = $date;
        $old_match->time = $time;
        $old_match->entry_fee = $entry_fee;
        $old_match->per_kill = $per_kill;
        $old_match->winner = $winner;
        $old_match->join = $join;
        $old_match->map = $map;
        $old_match->type = $type;
        $old_match->platform = $platform;
        $old_match->version = $version;
        $old_match->weapon = $weapon;
        $old_match->link = $stram_link;
        $old_match->description = $description;
        $old_match->t = $t;
        $old_match->save();

        Toastr::success('Match Deleted Successfuly','Success');
        return redirect()->back();

    }



    public function room($id){
        $match = \App\Match_shedule::find($id);
        return view('admin.match_shedule.room',compact('id','match'));
    }

    public function room_save(Request $request,$id){
        $match = \App\Match_shedule::find($id);
        $match->room_id = $request->room_id;
        $match->room_pass = $request->room_pass;
        $match->update();

        Toastr::success('room id and pass saved Successfuly','Success');
        return redirect()->route('admin.runningMatch');
    }


    public function cancel_match($id){
            $match  = \App\Match_shedule::find($id);
            $user = $match->user;
            $userId = array();

            foreach ($user as $users){
                $userId[''] = $users->id;
                $u_id = $userId[''];
                $account = Account::where('User_id', [$u_id])->get();

                foreach ($account as $ac){
                    $acc = Account::find($ac->id);
                    $acc->balance = $acc->balance - $match->entry_fee;
                    $acc->update();

                }
            }

            $match->end = true;
            $match->update();

        Toastr::success('The Match Has Been Cancel Successfuly','Success');
        return redirect()->back();

    }


}
