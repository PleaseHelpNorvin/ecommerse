<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Color;

use App\Models\ClientUser;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    //
    public function productsIndex(Request $request,$username, $productId){
        // dd($productId);
        // dd(Product::find($productId));

        $clientUser = ClientUser::where('username', $request->username)->first();
        $username = $clientUser->username;
        $products = Product::findOrFail($productId);
        $colors = Color::all();
        // $productjoined = Product::select('products.*', 'category.categoryName', 'product_color.name')
        //                 ->leftJoin('product_color', 'products.color_id', '=', 'product_color.id')
        //                 ->leftJoin('category', 'products.category_id', '=', 'category.id')
        //                 // ->where('products.id', $productId)
        //                 ->simplePaginate(4);
        // dd($products);
        return view('client.pages.dashboard.products',compact('username','products','colors'));
    }

    
    
}
