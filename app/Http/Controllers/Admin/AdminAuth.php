<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AdminAuth extends Controller
{
    //
    public function loginIndex(){
        return view('admin.auth.login');
    }

    public function adminLoginAuth(Request $request){
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            return redirect()->route('adminDashboard.view');
        }
        return redirect()->back()->with('error', 'Invalid credentials');
    }

    public function logout(Request $request){
        $request->session()->flush();
        $request->session()->regenerate();
        return redirect()->route('adminlogin.view');
    }

}
