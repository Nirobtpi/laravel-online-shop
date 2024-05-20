<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function dashboard(){
        
        return view('admin.dashboard');
    }
    public function login(){
        return view('admin.login');
    }
    public function adminLogin(Request $request){

        $request->validate([
            'email'=>['required'],
            'password'=>['required']
        ]);

        if(Auth::guard('admin')->attempt(['email' =>$request->email, 'password'=>$request->password])){
            return redirect ('admin/dashboard');
        }else{
            return back()->with('error','Invalid Email Or Password');
        }
    }
    public function logout(){
        Auth::guard('admin')->logout();
        return redirect('admin/login');
    }
    public function update(){
        return view('admin.update_password');
    }
}
