<?php

namespace App\Http\Controllers\Admin;

use App\old_match;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class oldMatchController extends Controller
{
        public function old_match(){
            $time=Carbon::now();
            $posts = old_match::paginate(20);
            return view('admin.old_match.index',compact('posts','time'));
        }
}
