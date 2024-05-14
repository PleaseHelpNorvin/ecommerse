<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use App\Models\CheckOut;
use App\Models\ClientUser;
// use App\Models\OrderHistory;
use Illuminate\Support\Str;

use Illuminate\Http\Request;
use App\Models\CheckOutHistory;

class CartController extends Controller
{
    //
    public function index(Request $request){
        // $clientUser = ClientUser::where('username', $request->username)->first();
        // $username = $clientUser->username;
    
        // Fetch checkouts using left join
        // $checkouts = CheckOut::select('check_out.*', 'products.*')
        // ->from('check_out')
        // ->leftJoin('products', 'check_out.product_id', '=', 'products.id')
        // ->where('check_out.clientuser_id', $clientUser->id)
        // ->get();
        // $checkouts = CheckOut::where('clientuser_id', $clientUser->id)->get();

        // $checkouts = CheckOut::get();
        // $products = Product::where('product_id ');

        $clientUser = ClientUser::where('username', $request->username)->firstOrFail();
        $username = $clientUser->username;

        $checkouts = CheckOut::with('product')
                        ->byClientUser($clientUser->id)
                        ->get();
        
        $totalPrice = CheckOut::where('clientuser_id', $clientUser->id)->sum('item_total_price');
        $countItem = Checkout::where('clientuser_id',$clientUser->id)->count('id');
        // dd($checkouts);
        return view('client.pages.addtocart.cart', compact('username', 'checkouts','totalPrice','countItem'));
    }

    public function checkOutPost(Request $request, $username) {
        $quantity = $request->input('quantity');
        $color = $request->input('product-color');
        $product_id = $request->input('product_id');
    
        $clientUser = ClientUser::where('username', $username)->first();
    
        if ($clientUser) {
            $product = Product::find($product_id);
    
            if ($product) {
                $item_total_price = $quantity * $product->price;
    
                // Create and save a new Checkout record
                $checkout = new CheckOut();
                $checkout->clientuser_id = $clientUser->id;
                $checkout->product_id = $product_id;
                $checkout->color = $color;
                $checkout->quantity = $quantity;
                $checkout->item_total_price = $item_total_price;
                $checkout->save();
    
                // Create and save a new CheckoutHistory record
                $checkoutHistory = new CheckOutHistory();
                $checkoutHistory->clientuser_id = $clientUser->id;
                $checkoutHistory->product_id = $product_id;
                $checkoutHistory->color = $color;
                $checkoutHistory->quantity = $quantity;
                $checkoutHistory->item_total_price = $item_total_price;
                $checkoutHistory->save();
    
                return redirect()->route('dashboard.view', ['username' => $username])->with('success', 'Checkout successful!');
            } else {
                return redirect()->route('error.page')->with('error', 'Product not found.');
            }
        } else {
            return redirect()->route('error.page')->with('error', 'User not found.');
        }
    }

    public function deleteCheckout(Request $request, $username, $check_out_id){
        $checkouts = CheckOut::findOrFail($check_out_id);
        $checkouts->delete();
        return redirect()->back()->with('success', 'Checkout item deleted successfully');
    }
    
    public function checkOutFormIndex(Request $request, $username){
        $clientUser = ClientUser::where('username', $request->username)->firstOrFail();
        $username = $clientUser->username;
        // $user = User::where('username', $username)->first();
        

        $totalPrice = CheckOut::where('clientuser_id', $clientUser->id)->sum('item_total_price');
        // $checkoutid = checkout::where('cli')

        $checkouts = CheckOut::with('product')
        ->byClientUser($clientUser->id)
        ->leftJoin('products', 'check_out.product_id', '=', 'products.id')
        ->select('check_out.*', 'products.id as order_product_id')
        ->get();

        // dd($checkouts);
        $orderNumber = Str::random(6);
        $countItem = Checkout::where('clientuser_id',$clientUser->id)->count('id');


        
        // $product_checkouts = Order::with('product')
        // ->byClientUser($clientUser->id)
        // ->get();

        return view('client.pages.addtocart.checkoutform', compact('username','checkouts','clientUser','totalPrice','orderNumber','countItem'));
    }

    // public function checkOutFormPost(Request $request)
    // {
        // Retrieve the client user based on the provided username
        // $clientUser = ClientUser::where('username', $request->input('username'))->firstOrFail();

        // // Validate the request data
        // $request->validate([
        //     'fullname' => 'required|string',
        //     'mode_of_payment' => 'required|string',
        //     // Add any other validation rules as needed
        // ]);

        // // Create a new order instance
        // $order = new Order();
        // $order->fullname = $request->input('fullname');
        // $order->mode_of_payment = $request->input('mode_of_payment');
        // $order->total = $request->input('total_price'); // Assuming you're passing total_price in the form
        // $order->customer_id = $clientUser->id; // Assign the client user's ID to customer_id
        // $order->save();

        // // Redirect back or wherever you want
        // return redirect()->back()->with('success', 'Order placed successfully!');
    // }
    // public function clientOrder(Request $request, $username){
    //     // $check_out_id = $request->input('product_id');
    //     // Validate the request data
    //     // $validatedData = $request->validate([
    //     //     // 'check_out_id' => 'required',
    //     //     'address' => 'required|string',
    //     //     'mode_of_payment' => 'required|string|in:Gcash,COD',
    //     //     'total_price' => 'required|numeric',
    //     //     'costumer_id' => 'required',
    //     //     'fullname'=>'required|string',
    //     // ]);
    
    //     // // Create a new order
    //     // $order = new Order();
    //     // // $order->check_out_id = $check_out_id;
    //     // $order->customer_id = $validatedData['costumer_id'];
    //     // $order->fullname = $validatedData['fullname'];
    //     // $order->status = 'pending';
    //     // $order->total = $validatedData['total_price'];
    //     // $order->address = $validatedData['address'];
    //     // $order->mop = $validatedData['mode_of_payment'];
    //     // // Save the order
    //     // $order->save();

    //     // Validate the incoming request data
    //     $validatedData = $request->validate([
    //         'customer_id' => 'required|exists:client_user,id',
    //         'check_out_ids' => 'required|array',
    //         'fullname' => 'required|string',
    //         'address' => 'required|string',
    //         'mode_of_payment' => 'required|string',
    //         'total_price' => 'required|numeric',
    //     ]);

    //     // Create a new order instance
    //     $order = new Order();
    //     $order->customer_id = $validatedData['customer_id'];
    //     $order->check_out_ids = json_encode($validatedData['check_out_ids']);
    //     $order->fullname = $validatedData['fullname'];
    //     $order->address = $validatedData['address'];
    //     $order->mop = $validatedData['mode_of_payment'];
    //     $order->total = $validatedData['total_price'];

    //     // Save the order
    //     $order->save();

    //     // Redirect or return a response as needed
    //     return redirect()->route('clientorder.view',['username' => $username]); // Redirect to a confirmation page
    // }
    // public function clientOrder(Request $request, $username)
    // {
    //     // Validate the incoming request data
    //     $validatedData = $request->validate([
    //         'customer_id' => 'required|exists:client_user,id',
    //         'check_out_ids' => 'required|array',
    //         'check_out_product_id' => 'required|array',
    //         'fullname' => 'required|string',
    //         'address' => 'required|string',
    //         'mode_of_payment' => 'required|string',
    //         'total_price' => 'required|numeric',
    //     ]);
    //     // dd($validatedData);
    //     // Create a new order instance
    //     $order = new Order();
    
    //     // Assign values to the order instance
    //     $order->customer_id = $validatedData['customer_id'];
    //     $order->check_out_ids = json_encode($validatedData['check_out_ids']); // Convert array to JSON
    //     $order->check_out_product_id = json_encode($validatedData['check_out_product_id']);
    //     $order->fullname = $validatedData['fullname'];
    //     $order->address = $validatedData['address'];
    //     $order->mop = $validatedData['mode_of_payment'];
    //     $order->total = $validatedData['total_price'];
    
    //     // Save the order
    //     $order->save();
    
    //     // Redirect to a confirmation page
    //     return redirect()->route('clientorder.view', ['username' => $username]);
    // }
    public function clientOrder(Request $request, $username)
    {
        // Validate the incoming request data
        $validatedData = $request->validate([
            'customer_id' => 'required|exists:client_user,id',
            'order_product_id' => 'required', // Changed to order_product_id
            'order_number' => 'required',
            'order_quantity_by_product' => 'required',
            'fullname' => 'required|string',
            'address' => 'required|string',
            'mode_of_payment' => 'required|string',
            'total_price' => 'required|numeric',
        ]);
        // dd($validatedData);

        // Iterate over each order_product_id to create multiple orders
        foreach ($validatedData['order_product_id'] as $orderProductId) {
            // Create a new order instance for each product
            Order::create([
                'customer_id' => $validatedData['customer_id'],
                'order_product_id' => $orderProductId,
                'order_number' =>$validatedData['order_number'],
                'order_quantity_by_product' => $validatedData['order_quantity_by_product'],
                'fullname' => $validatedData['fullname'],
                'address' => $validatedData['address'],
                'mop' => $validatedData['mode_of_payment'],
                'total' => $validatedData['total_price'],
            ]);
        }

        // Redirect to a confirmation page
        return redirect()->route('clientorder.view', ['username' => $username]);
    }

    
        
    
}