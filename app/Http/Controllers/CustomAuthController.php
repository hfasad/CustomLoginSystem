<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use Hash;
use Session;

class CustomAuthController extends Controller
{
    // Your controller code here

    public function login(){
      return view("Auth.Login");
}

    public function registeration(){
        return view("Auth.Registeration");
    }
    public function registeruser(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'email'=>'required|email|unique:users',
            'password'=>'required|min:5|max:12',
        ]);
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $res = $user->save();
        if($res){
            return back()->with('success' , 'You have registered successfully');
        }
        else{
            return back()->with('fail', 'Something wrong');
        }
    }
    public function loginuser(Request $request)
    {
        $request->validate([
            'email'=>'required|email',
            'password'=>'required|min:5|max:12',
        ]);
        $user = User::where('email','=',$request->email)->first(); 
        if ($user) {
            if(Hash::check($request->password,$user->password))
            {
                $request->session()->put('login',$user->id);
                return redirect('dashboard');
            }else{
                return back()->with('fail','Password not matches');
                }
            
        }   
        else {
            return back()->with('fail','This email is not registered');
        }
    }
    public function dashboard(){
        $data = array();
        if(Session::has('login')){
            $data = User::where('id' ,'=', Session::get('login'))->first();
        }
        return view('dashboard', compact('data'));
    }
    public function logout(){
        if(Session::has('login')){
            Session::pull('login');
            return redirect('login');
        }
    }
}

