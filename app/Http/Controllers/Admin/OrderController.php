<?php

namespace App\Http\Controllers\Admin;

use App\Models\Order;
use App\Models\ClientUser;
use Illuminate\Http\Request;
use App\Models\CheckOutHistory;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;

class OrderController extends Controller
{
    //
    public function index(Request $request) {
        // $orders = Order::groupBy('order_number')->get();
        $status = $request->query('status'); // Get the status query parameter

        if ($status) {
            $orders = Order::where('status', $status)->groupBy('order_number')->get();
        } else {
            $orders = Order::groupBy('order_number')->get();
        }
        return view('admin.pages.order.order', compact('orders'));
    }

    public function orderListIndex($clientId,$orderRanNum){
        $orderfullname = Order::where('customer_id', $clientId)
        ->where('order_number', $orderRanNum)
        ->first();
        $orderItems = Order::select('order.*','products.*')
        ->leftJoin('products', 'order.order_product_id', '=', 'products.id')
        ->leftJoin('client_user','order.customer_id', '=', 'client_user.id')
            ->where('order.customer_id', '=', $clientId)
            ->where('order.order_number', '=', $orderRanNum)
            ->get();
        return view('admin.pages.order.orderlist', compact('orderItems','orderfullname'));
    }

    public function updateStatus(Request $request, $orderNumber){
        $orders = Order::where('order_number', $orderNumber)->get();
        foreach ($orders as $order) {
            $order->status = 'Paid' ;
            $order->save();
        }
    
        return redirect()->back()->with('success', 'Order status updated to Paid.');
    }
    
    public function cancelOrder(Request $request, $orderNumber){
        $orders = Order::where('order_number', $orderNumber)->get();
    
        foreach ($orders as $order) {
            $order->status = 'Cancelled';
            $order->save();
        }
    
        return redirect()->back()->with('success', 'Order status updated to Cancelled.');
    }

    public function orderSearch(Request $request){
        $searchQuery = $request->input('search-order');

        $orders = Order::where('fullname', 'LIKE', '%' . $searchQuery . '%')
                        ->orWhere('order_number', 'LIKE', '%' . $searchQuery . '%')
                        ->orWhere('order_quantity_by_product', 'LIKE', '%' . $searchQuery . '%')
                        ->orWhere('created_at', 'LIKE', '%' . $searchQuery . '%')
                        ->orWhere('order_product_quantity', 'LIKE', '%' . $searchQuery . '%')
                        ->orWhere('status', 'LIKE', '%' . $searchQuery . '%')
                        ->orWhere('total', 'LIKE', '%' . $searchQuery . '%')
                        ->orWhere('address', 'LIKE', '%' . $searchQuery . '%')
                        ->orWhere('mop', 'LIKE', '%' . $searchQuery . '%')
                        ->groupBy('order_number')
                            ->paginate(0);

        return view('admin.pages.order.order', compact('orders'));
    }
}
