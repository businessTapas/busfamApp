<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\LoginLog;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;


class LoginController extends Controller
{
    public function login()
    {
        return view('login');
    }

    public function logged(Request $request)
{
    $validate = Validator::make($request->all(), [
        'email' => 'required',
        'password' => 'required',
    ]);
    if ($validate->fails()) {
        return redirect()->back()->withErrors($validate)->withInput();
    }else{

    $user = User::where('email', $request->email)->first();
//return $user;
    if (empty($user)) {
        return redirect()->back()->with('email_message', 'User invalid');
    }

    $credentials = [
        'email' => $request->email,
        'password' => $request->password,
    ];

    if (Auth::attempt($credentials)) {
            return redirect()->route('admin.dash')->with('success','You are Successfully Loggedin');
        
    } else {
        return redirect()->back()->with('password_message', 'Please Provide Correct Password');
    }
}

    
}

public function adminlogout()
{
    Session::flush();

    Auth::logout();

    return redirect()->route('login')->with('message','You are Successfully Logout');
}

    /* public function post_register(Request $request)
    {
         $validate = Validator::make($request->all(), [
            'name'=>'required',
            'email' => 'required|unique:users,email',
            'password'=>'required',
            'confirm_password'=>'required',
        ]);
        if ($validate->fails()) {
            return redirect()->back()->withErrors($validate)->withInput();
        }else{
        $data = $request->all();
        if($data['password'] == $data['confirm_password']) {
        User::create([
            'name'=>$data['name'],
            'email'=>$data['email'],
            'password'=>Hash::make($data['password']),
        ]);
        return redirect()->route('login')->with('success','You are Successfully Loggedin');
        } else {
            return redirect()->back()->with('password_message', 'Password And Confirm Password Should BE Same');

        }
    }
    }
    public function register()
    {
        return view('register');
    } */

   

}
