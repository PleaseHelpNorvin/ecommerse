<?php

namespace App\Http\Controllers;


use App\Models\ClientUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;


class ClientAuth extends Controller
{
    public function loginIndex(){
        return view('client.auth.login');
    }

    public function loginAuth(Request $request){
        $request->validate([
            'username' => 'required|string|max:255',
            'password' => 'required|string|min:8',
        ]);
        
        $clientUser = ClientUser::where('username', $request->username)->first();
        
        if($clientUser && Hash::check($request->password, $clientUser->password)){
            return redirect()->route('dashboard.view', ['username' => $clientUser->username]);
        }
        return back()->with('message','Invalid Username or Password');
    }

    public function registerIndex(){
        return view('client.auth.register');
    }
    public function registerPost(Request $request)    {
        $request->validate([
            'username' => 'required|string|max:255',
            'password' => 'required|string|min:8',
            'email' => 'required|string|email|max:255|unique:client_user',
            'fullname' => 'required|string|max:255',
            'phonenumber' => 'required|numeric|digits:11',
        ]);

        ClientUser::create([
            'username' => $request->username,
            'password' => Hash::make($request->password),
            'email' => $request->email,
            'fullname' => $request->fullname,
            'phonenumber' => $request->phonenumber,
            
        ]);
        return redirect()->route('login.view')->with('success', 'Registration successful. You can now log in.');
    }

    public function logout(Request $request){
        $request->session()->flush();
        $request->session()->regenerate();
        return redirect()->route('login.view');
    }
    
}
