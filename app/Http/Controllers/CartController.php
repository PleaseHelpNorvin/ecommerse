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
        $clientUser = ClientUser::where('username', $request->username)->firstOrFail();
        $username = $clientUser->username;
        $checkouts = CheckOut::with('product')
                        ->byClientUser($clientUser->id)
                        ->get();
        $totalPrice = CheckOut::where('clientuser_id', $clientUser->id)->sum('item_total_price');
        $countItem = Checkout::where('clientuser_id',$clientUser->id)->count('id');
        return view('client.pages.addtocart.cart', compact('username', 'checkouts','totalPrice','countItem'));
    }

    public function checkOutPost(Request $request, $username) {
        $quantity = $request->input('quantity');
        $product_id = $request->input('product_id');
    
        $clientUser = ClientUser::where('username', $username)->first();
    
        if ($clientUser) {
            $product = Product::find($product_id);
    
            if ($product) {
                $item_total_price = $quantity * $product->price;

                $checkout = new CheckOut();
                $checkout->clientuser_id = $clientUser->id;
                $checkout->product_id = $product_id;
                $checkout->quantity = $quantity;
                $checkout->item_total_price = $item_total_price;
                $checkout->save();
    
                $checkoutHistory = new CheckOutHistory();
                $checkoutHistory->clientuser_id = $clientUser->id;
                $checkoutHistory->product_id = $product_id;
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
        $totalPrice = CheckOut::where('clientuser_id', $clientUser->id)->sum('item_total_price');
        $checkouts = CheckOut::with('product')
        ->byClientUser($clientUser->id)
        ->leftJoin('products', 'check_out.product_id', '=', 'products.id')
        ->select('check_out.*', 'products.id as order_product_id')
        ->get();
        $orderNumber = Str::random(6);
        $countItem = Checkout::where('clientuser_id',$clientUser->id)->count('id');

        return view('client.pages.addtocart.checkoutform', compact('username','checkouts','clientUser','totalPrice','orderNumber','countItem'));
    }
    
    public function clientOrder(Request $request, $username){

        $validatedData = $request->validate([
            'customer_id' => 'required|exists:client_user,id',
            'order_product_id' => 'required|array',
            'order_product_id.*' => 'exists:products,id',
            'order_number' => 'required',
            'order_quantity_by_product' => 'required|integer',
            'order_product_quantity' => 'required|array',
            'order_product_quantity.*' => 'integer|min:1',
            'fullname' => 'required|string',
            'address' => 'required|string',
            'mode_of_payment' => 'required|string',
            'total_price' => 'required|numeric',
        ]);

        $clientUser = ClientUser::where('username', $username)->firstOrFail();
        CheckOut::where('clientuser_id', $clientUser->id)->delete();

        foreach ($validatedData['order_product_id'] as $index => $orderProductId) {
            Order::create([
                'customer_id' => $validatedData['customer_id'],
                'order_product_id' => $orderProductId,
                'order_product_quantity' => $validatedData['order_product_quantity'][$index],
                'order_number' => $validatedData['order_number'],
                'order_quantity_by_product' => $validatedData['order_quantity_by_product'],
                'fullname' => $validatedData['fullname'],
                'address' => $validatedData['address'],
                'mop' => $validatedData['mode_of_payment'],
                'total' => $validatedData['total_price'],
            ]);
        }
        return redirect()->route('clientorder.view', ['username' => $username]);
    }

    
        
    
}