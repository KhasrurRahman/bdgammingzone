<?php

namespace App\Http\Controllers\Admin;

use App\contact;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashbordController extends Controller
{
        public function index(){
                    return view('admin.dashboard');
        }

        public function contact(){
                    $contact = contact::paginate(20);
                    return view('admin.contact.index',compact('contact'));
        }

        public function contact_delete($id){
                    $contact = contact::find($id);
                    $contact->delete();

                    return redirect()->back();
        }
}
