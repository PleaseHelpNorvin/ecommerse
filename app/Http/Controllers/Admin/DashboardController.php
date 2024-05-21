<?php

namespace App\Http\Controllers\Admin;

use App\Models\Order;
use App\Models\Product;
use App\Models\Category;
use App\Models\ClientUser;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    //
    public function index(){
        $countProducts = Product::count();
        $countClientUser = ClientUser::count();
        $countOrders = Order::count();
        $countCategory = Category::count();
        // dd($countClientUser);
        return view('admin.pages.dashboard.dashboard', compact('countProducts','countClientUser','countOrders','countCategory'));
    }
}
