<?php
namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\User; // Assuming User model is used for authentication

class AdminAuth extends Controller
{
    public function loginIndex(){
        return view('admin.auth.login');
    }

    public function adminLoginAuth(Request $request){
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');

        $user = User::where('email', $request->email)->first();

        if ($user && Auth::attempt($credentials)) {
            return redirect()->route('adminDashboard.view');
        }

        if ($user) {
            // The email exists but the password is wrong
            return redirect()->back()->withErrors(['password' => 'The password you entered is incorrect.']);
        }

        // The email does not exist or both email and password are wrong
        return redirect()->back()->withErrors(['email' => 'Invalid credentials. Please try again.']);
    }

    public function logout(Request $request){
        $request->session()->flush();
        $request->session()->regenerate();
        return redirect()->route('adminlogin.view');
    }
}
