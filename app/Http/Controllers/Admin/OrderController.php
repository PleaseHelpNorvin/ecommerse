<?php

namespace App\Http\Controllers\Admin;

use App\Models\Order;
use App\Models\ClientUser;
use Illuminate\Http\Request;
use App\Models\CheckOutHistory;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class OrderController extends Controller
{
    //
    public function index(Request $request) {

        // Retrieve order details with left joins
        $orders = Order::select('order.*', 'check_out_history.color', 'check_out_history.quantity', 'check_out_history.item_total_price', 'products.productName')
            ->leftJoin('check_out_history', 'order.id', '=', 'check_out_history.id')
            ->leftJoin('products', 'check_out_history.id', '=', 'products.id')
            ->leftJoin('client_user', 'client_user.id', '=', 'order.customer_id')
            ->get();

        return view('admin.pages.order.order', compact('orders'));
    }
    public function orderListIndex($clientId){
        // $orderItems = CheckOutHistory::select('check_out_history.*', 'products.*')
        //     ->leftJoin('products', 'check_out_history.product_id', '=', 'products.id')
        //     ->where('check_out_history.clientuser_id',  $clientId)
        //     ->get();
        // $orderItems = CheckOutHistory::select('check_out_history.*', 'products.*')
        //         ->leftJoin('products', 'check_out_history.product_id', '=', 'products.id')
        //         ->leftJoin('check_out_history', 'check_out_history.id' '=', 'order')
        //         ->where('check_out_history.clientuser_id', $clientId)
        //         ->where('check_out_history.checkout_id', $checkoutId)
        //         ->get();

        // $orderItems = DB::table('check_out_history')
        //     ->select('check_out_history.*', 'products.*')
        //     ->leftJoin('products', 'check_out_history.product_id', '=', 'products.id')
        //     ->leftJoin('order', 'check_out_history.order_id', '=', 'order.id')
        //     ->leftJoin('client_user', 'check_out_history.clientuser_id', '=', 'client_user.id')
        //     ->where('check_out_history.clientuser_id', $clientId)
        //     ->get();
        $orderItems = DB::table('check_out_history')
            ->select('check_out_history.*', 'products.*')
            ->leftJoin('products', 'check_out_history.product_id', '=', 'products.id')
            ->leftJoin('order', 'check_out_history.id', '=', 'order.id')
            ->leftJoin('client_user', 'check_out_history.clientuser_id', '=', 'client_user.id')
            ->where('check_out_history.clientuser_id', $clientId)
            ->get();

        // $orderItems = Order::select('check_out_history.*','order.*','products.*')
        //     ->leftJoin('products','order.costomer_id', '=', 'client_user.id')
        //     ->leftJoin('client_user','')
    

        // dd($orderItems);
        return view('admin.pages.order.orderlist', compact('orderItems'));
    }
}
