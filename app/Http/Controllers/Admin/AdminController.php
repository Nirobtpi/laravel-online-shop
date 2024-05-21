<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\Admin;
use App\Models\Photo;
use Illuminate\Support\Facades\Storage;

use function Laravel\Prompts\password;

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
    public function updatePassword(Request $request, $id){
        $admin=Admin::findOrFail($id);
        // return $admin->password;
        // $password=Hash::make($request->old_password);
        if(Hash::check($request->old_password,$admin->password)){
            // return 'okk';
            $request->validate([
                'password' => ['required', 'confirmed', 'min:8']
            ]);
            $admin->update([
                'password'=>Hash::make($request->password),
            ]);
            return back()->with('success','Password Updated Successfully');
        }else{
           return back()->with('error','Old Password is Wrong');
        }
    }

    public function updateAdminDetails(){
        // $data=Admin::findOrFail($id);
        return view('admin.update_admin_details');
    }
    public function updateAdminData(Request $request, $id){

        $adminData=Admin::findOrFail($id);
        $photo=$request->photo;

        if($request->hasFile('photo')){
            if($adminData->image !=''){
                unlink(public_path('storage/'.$adminData->image));
            }

            if($adminData->image){
                Storage::delete('photo'.$adminData->image);
            }
            $photo=$request->file('photo')->store('photo');
            $adminData->image=$photo;
        }else{
            $photo=$adminData->image;
        }
        $adminData->update([
            'name'=>$request->name,
            'mobile'=>$request->mobile,
            'image'=>$photo,
        ]);
        return back()->with('success','Admin Data Update Successfully');
    }

}
