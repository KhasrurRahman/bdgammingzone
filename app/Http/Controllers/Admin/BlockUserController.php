<?php

namespace App\Http\Controllers\Admin;

use App\BlockUser;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BlockUserController extends Controller
{
    public function index(){
        $user = BlockUser::all();
        return view('admin.block_user.index',compact('user'));
    }

    public function block_user_create(Request $request){
            $user = new BlockUser();
            $user->username = $request->username;
            $user->save();

        Toastr::success('user add in the block list','Success');
        return redirect()->back();


    }

    public function block_user_delete($id){
            $user = BlockUser::find($id);
            $user->delete();

        Toastr::success('user removed from the block list','Success');
        return redirect()->back();


    }
}
