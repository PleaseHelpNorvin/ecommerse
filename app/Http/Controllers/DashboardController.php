<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use App\Models\ClientUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class DashboardController extends Controller
{
    //
    public function index(Request $request,$categoryId)
    {
        $clientUser = ClientUser::where('username', $request->username)->first();
        $username = $clientUser->username;
        $categories = Category::all();
        $products = Product::all();
        // dd($categories);
        return view('client.pages.dashboard.dashboard',compact('username','categories','products'));
    }

    public function showProductsByCategory(Request $request, $username, $categoryId)
    {
        $categories = Category::all();
        $clientUser = ClientUser::where('username', $request->username)->first();
        $username = $clientUser->username;
        $products = Product::where('category_id', $categoryId)->get();
        $selectedCategory = Category::findOrFail($categoryId);

        return view('client.pages.dashboard.dashboard', compact('products', 'selectedCategory','username','categories'));
    }

    public function dashboardSearch(Request $request, $username) {
        $clientUser = ClientUser::where('username', $username)->firstOrFail();
        $categories = Category::all();
        $searchQuery = $request->input('dashboard-search');
        
        $products = Product::select('products.*', 'category.categoryName')
        // ->leftJoin('product_color', 'products.color_id', '=', 'product_color.id')
        ->leftJoin('category', 'products.category_id', '=', 'category.id')
        ->where(function ($query) use ($searchQuery) {
            $query->where('products.productName', 'like', "%$searchQuery%")
                ->orWhere('products.description', 'like', "%$searchQuery%")
                ->orWhere('category.categoryName', 'like', "%$searchQuery%");
                // ->orWhere('product_color.name', 'like', "%$searchQuery%");
        })
        ->simplePaginate(0);
    
        // Return the view with the products, category, and username
        return view('client.pages.dashboard.dashboard', compact('products', 'categories', 'username'));
    }
}
