<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    //

    public function search(Request $request){
        $email = $request->input('search');
        $user = User::where('email',$email)->first(); 
        if($user){
            return view('admin.admins.search',[
            'user'=>$user
        ]); 
        }
        else{
            return redirect()->route('admin.customers');
        }
       

    }
    public function index(){
        $admins = User::where('is_admin',true)->get();
    
        return view('admin.admins.alladmins',[
            'admins'=>$admins
        ]);

    }
    public function update(Request $request,$id){
        $admin = User::findOrFail($id);
        dd($id);   
        if($admin->is_admin) {
           $admin->is_admin = false;
        }
        else{
            $admin->is_admin = true;
        }
         
        $admin->update();
    
        return redirect()->route('admin.Alladmins');

    }
    public function customers(){
        $users = User::latest()->where('is_admin',false)->get();
    
        return view('admin.admins.customers',[
            'users'=>$users
        ]);

    }
    

}
