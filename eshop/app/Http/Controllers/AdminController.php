<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Admin;
use Illuminate\Support\Facades\Redirect;
use Session;
Session::start();
class AdminController extends Controller
{
    public function index(){
        return view('admin.admin_login');
    }
    
    public function show_dashboard(Request $request){
        $admin_email = $request->email;
        // $admin_password = $request->password;
        $admin_password = md5($request->password);
        $result = Admin::where('admin_email', $admin_email)->where('admin_password', $admin_password)->first();
      if($result){
            Session::put('admin_id', $request->admin_id);
            Session::put('admin_name', $request->admin_name);

            return Redirect::to('/dashboard');
      }
      else{
            Session::put('message', 'email and password are invalid');
            return Redirect::to('/admins');
      }

   
    }
}
