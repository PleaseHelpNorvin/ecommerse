<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ClientUser;

use Illuminate\Http\Request;

class UserController extends Controller
{
    //
    public function index(){
        $userlist = ClientUser::latest()->SimplePaginate(8);
        return view('admin.pages.user.user', compact('userlist'));
    }
    
    public function userSearch(Request $request){
        $searchQuery = $request->input('search-user');
        $userlist = ClientUser::where('username', 'LIKE', '%' . $searchQuery . '%')
                        ->orWhere('password', 'LIKE', '%' . $searchQuery . '%')
                        ->orWhere('email', 'LIKE', '%' . $searchQuery . '%')
                        ->orWhere('fullname', 'LIKE', '%' . $searchQuery . '%')
                        ->orWhere('phonenumber', 'LIKE', '%' . $searchQuery . '%')
                        ->paginate(0);
        return view('admin.pages.user.user', compact('userlist'));
    }
}
