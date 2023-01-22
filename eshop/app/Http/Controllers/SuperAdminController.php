<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Redirect;
use Session;
Session::start();

class SuperAdminController extends Controller
{
    public function dashboard(){
        // $this->admin_auth();
        return view('admin.admin_dashboard');
    }
    public function logout(){

        Session::flash('admin_id');
        return Redirect::to('/admins');
    }
    public function admin_auth(){
        $admin_id = Session::get('admin_id');
        if($admin_id){
            return;
        }
        else{
            return Redirect::to('/admins')->send();
        }
    }

}
