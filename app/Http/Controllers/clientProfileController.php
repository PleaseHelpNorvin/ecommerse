<?php

namespace App\Http\Controllers;

use Log;
use App\Models\ClientUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class clientProfileController extends Controller
{
    //
    public function index(Request $request, $username){
        $clientUser = ClientUser::where('username', $request->username)->firstOrFail();
        $userid = $clientUser->id;

        return view('client.pages.profile.editprofile',compact('username','clientUser'));
    }


    public function profileUpdate(Request $request, $username)
    {
        $request->validate([
            'email' => 'required|email|unique:client_user,email,' . $username . ',username',
            'fullname' => 'required|string|max:255',
            'phonenumber' => 'required|string|max:20',
            'password' => 'nullable|string|min:6',
            // 'imagePath' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // 2MB max
        ]);

        $user = ClientUser::where('username', $username)->firstOrFail();

        $user->email = $request->input('email');
        $user->fullname = $request->input('fullname');
        $user->phonenumber = $request->input('phonenumber');
        
        if ($request->filled('password')) {
            $user->password = Hash::make($request->input('password'));
        }

        $user->save();
        // Log::info('Stored image path: ' . $user->imagePath);

        return redirect()->route('clientprofile.view', ['username' => $username])
            ->with('success', 'Profile updated successfully.');
    }
}
