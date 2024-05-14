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

        $orderId = Order::all();
        $orderNumbers = Order::pluck('order_number');
        // $orderRanNum = 


    $orders = Order::groupBy('order_number')
        ->get();

        return view('admin.pages.order.order', compact('orders'));
    }
    public function orderListIndex($clientId,$orderRanNum){
        // $orderItems = Order::select('order.*','products.*')
        // ->leftJoin('products', 'order.order_product_id', '=', 'products.id')
        // ->leftJoin('client_user', 'order.customer_id', '=', 'client_user.id')
        //     ->where('order.customer_id', '=', $clientId)
        //     ->get();
        // $orderItems = Order::select('order.*', 'products.*')
        //     ->leftJoin('products', 'order.order_product_id', '=', 'products.id')
        //     ->leftJoin('client_user', 'order.customer_id', '=', 'client_user.id')
        //     ->where('order.customer_id', '=', $clientId)
        //     ->where('order.order_number', '=', $orderRanNum)
        //     ->get();
        // $color = DB::table('check_out')
        //     ->join('order', function($join) {
        //         $join->on('check_out.product_id', '=', 'order.order_product_id')
        //             ->on('check_out.clientuser_id', '=', 'order.customer_id');
        //     })
        //     ->where('order.customer_id', '=', $clientId)
        //     ->where('order.order_number', '=', $orderRanNum)
        //     ->value('check_out.color');

        $orderItems = Order::select('order.id as order_id', 'order.order_number', 'order.created_at', 'order.status',
                    'products.productName as productName', 'products.imagePath as imagePath','check_out.quantity', 
                    'products.price', 'order.order_quantity_by_product', 
                    'check_out.color as checkout_color')
            ->leftJoin('products', 'order.order_product_id', '=', 'products.id')
            ->leftJoin('check_out', function($join) {
            $join->on('order.order_product_id', '=', 'check_out.product_id')
                ->on('order.customer_id', '=', 'check_out.clientuser_id');
            })
            ->leftJoin('client_user', 'order.customer_id', '=', 'client_user.id')
            ->where('order.customer_id', '=', $clientId)
            ->where('order.order_number', '=', $orderRanNum)
            ->get();

        // $orderItems = Order::select('order.id as order_id', 'order.order_number', 'order.created_at', 'order.status',
        //             'products.productName as productName', 'products.imagePath as imagePath', 
        //             'products.price', 'order.order_quantity_by_product', 
        //             'check_out.color as checkout_color')
        //     ->leftJoin('products', 'order.order_product_id', '=', 'products.id')
        //     ->leftJoin('check_out', function($join) {
        //             $join->on('order.order_product_id', '=', 'check_out.product_id')
        //                 ->on('order.customer_id', '=', 'check_out.clientuser_id');
        //     })
        //     ->leftJoin('client_user', 'order.customer_id', '=', 'client_user.id')
        //     ->where('order.customer_id', '=', $clientId)
        //     ->where('order.order_number', '=', $orderRanNum)
        //     ->get();

        // $orderItems = Order::select('order.id as order_id', 'order.order_number', 'order.created_at', 'order.status',
        //                 'products.productName as productName', 'products.imagePath as imagePath', 'products.color_id',
        //                 'product_color.name as colorName','products.price', 'order.order_quantity_by_product')
        //     ->leftJoin('products', 'order.order_product_id', '=', 'products.id')
        //     ->leftJoin('check_out', 'products.id', '=', 'check_out.product_id')
        //     ->leftJoin('client_user', 'order.customer_id', '=', 'client_user.id')
        //     ->where('order.customer_id', '=', $clientId)
        //     ->where('order.order_number', '=', $orderRanNum)
        //     ->get();
        
        // dd($orderItems);
        // dd(Order::select('order.*'));
        
        return view('admin.pages.order.orderlist', compact('orderItems'));
    }
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

        // $orderItems = DB::table('check_out_history')
        //     ->select('check_out_history.*', 'products.*')
        //     ->leftJoin('products', 'check_out_history.product_id', '=', 'products.id')
        //     ->leftJoin('order', 'check_out_history.id', '=', 'order.id')
        //     ->leftJoin('client_user', 'check_out_history.clientuser_id', '=', 'client_user.id')
        //     ->where('check_out_history.clientuser_id', $clientId)
        //     ->get();

        // $orderItems = DB::table('order')
        //     ->leftJoin('check_out_history', 'order.check_out_ids', '=', 'check_out_history.id')
        //     ->where('order.customer_id', '=', $clientId)
        //     ->select('order.check_out_product_id')
        //     ->get();
    
        // $orderItems = DB::table('check_out_history')
        // ->leftJoin('order', 'check_out_history.id', '=', 'order.id')
        // ->leftJoin('products', 'check_out_history.product_id', '=', 'products.id')
        // ->select(
        //     'products.imagePath',
        //     'products.productName',
        //     'check_out_history.color',
        //     'products.price',
        //     'check_out_history.quantity'
        // )
        // ->get();
        // $orderItems = DB::table('check_out_history')
        //     ->leftJoin('order', 'check_out_history.id', '=', 'order.id')
        //     ->leftJoin('products', 'check_out_history.product_id', '=', 'products.id')
        //     ->where('order.customer_id', '=', $clientId)
        //     ->select(
        //         'products.imagePath',
        //         'products.productName',
        //         'check_out_history.color',
        //         'products.price',
        //         'check_out_history.quantity'
        //     )
        //     ->get();


        // dd($orderItems);

}
