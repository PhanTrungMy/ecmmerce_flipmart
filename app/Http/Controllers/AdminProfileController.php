<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminProfileController extends Controller
{
  
    public function Profile(){
        $adminData = User::find(1);
        return view('admin.admin_profile_view',compact('adminData'));
    }
    public function EditProfile()  {
        $editData = User::find(1);
        return view('admin.admin_profile_edit',compact('editData'));
    }
    public function StoreProfile(Request $request){
        $data = User::find(1);
        $data->name = $request->name;
        $data->email = $request->email;
        if($request->file('profile_photo_path')){
            $file = $request->file('profile_photo_path');
            $filename = date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('upload/admin_images'),$filename);
            $data['profile_photo_path'] = $filename;
        }
        $data->save();
        
        $notification = array(
            'message' =>'Admin Profile Updated Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('admin.profile')->with($notification);
    }
    public function PasswordProfile(){
        return view('admin.admin_change_password');
    }
    public function UpdatePasswordProfile(Request $request){
        $validatedData = $request->validate([
            'oldpassword' => 'required',
            'password' => 'required|confirmed',
        ]);
        $hashedPassword = User::find(1)->password;
        if(Hash::check($request->oldpassword,$hashedPassword)){
            $admin = User::find(1);
            $admin->password = Hash::make($request->password);
            $admin->save();
            Auth::logout();  
            return redirect()->route('admin.logout');
        }else{
            return redirect()->back();
        }
    }
        
    
}
