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

        $orders = Order::groupBy('order_number')
        ->get();

        return view('admin.pages.order.order', compact('orders'));
    }
    public function orderListIndex($clientId,$orderRanNum){

        $orderItems = Order::select('order.id as order_id', 'order.order_number', 'order.created_at', 'order.status',
                    'products.productName as productName', 'products.imagePath as imagePath','check_out_history.quantity',
                    'products.price', 'order.order_quantity_by_product','order.total',
                    'check_out_history.color as checkout_color')
            ->leftJoin('products', 'order.order_product_id', '=', 'products.id')
            ->leftJoin('check_out_history', function($join) {
            $join->on('order.order_product_id', '=', 'check_out_history.product_id')
                    ->on('order.customer_id', '=', 'check_out_history.clientuser_id');
                })
                ->leftJoin('client_user', 'order.customer_id', '=', 'client_user.id')
                ->where('order.customer_id', '=', $clientId)
                ->where('order.order_number', '=', $orderRanNum)
                ->get();
            
        return view('admin.pages.order.orderlist', compact('orderItems'));
    }
}
