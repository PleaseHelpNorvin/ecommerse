<?php

namespace App\Http\Controllers;

use App\Models\ClientUser;
use Illuminate\Http\Request;

class ClientOrderController extends Controller
{
    //
    public function ClientOrder(Request $request){
        $clientUser = ClientUser::where('username', $request->username)->firstOrFail();
        $username = $clientUser->username;

        
        return view ('client.pages.orders.client-order',compact('username'));
    }
}
