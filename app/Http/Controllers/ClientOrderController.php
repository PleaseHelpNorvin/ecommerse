<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\ClientUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ClientOrderController extends Controller
{
    //
    public function clientOrder(Request $request, $username) {
            $clientUser = ClientUser::where('username', $request->username)->firstOrFail();
            $userid = $clientUser->id;
            $clientOrders = Order::select('client_user.*', 'order.*', 'order.order_number')
                ->leftJoin('client_user', 'order.customer_id', '=', 'client_user.id')
                ->where('order.customer_id', $userid)
                ->groupBy('order.order_number')
                ->get();
        return view('client.pages.orders.client-order', compact('username','clientUser', 'clientOrders'));
    }

    public function clientOrderList(Request $request,$username, $order) {
            $clientUser = ClientUser::where('username', $request->username)->firstOrFail();
            $userid = $clientUser->id;

            $ordernum = Order::where('order_number', $order)->groupBy('order_number')->get();

            $orderItems = Order::select('order.*', 'products.*', 'client_user.*')
                ->leftJoin('products', 'order.order_product_id', '=', 'products.id')
                ->leftJoin('client_user', 'order.customer_id', '=', 'client_user.id')
                ->where('order.customer_id', '=', $userid)
                ->where('order.order_number', '=', $order)
                ->get();

            // dd($orderItems);
        return view('client.pages.orders.client-orderlist', compact('username', 'orderItems','ordernum'));
    }

    public function cancelOrder(Request $request, $orderNumber){
        $orders = Order::where('order_number', $orderNumber)->get();

        foreach ($orders as $order) {
            $order->status = 'Cancelled';
            $order->save();
        }
    
        return redirect()->back()->with('success', 'Order status updated to Cancelled.');
    }
    
}
