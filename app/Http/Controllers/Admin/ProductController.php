<?php

namespace App\Http\Controllers\Admin;

use App\Models\Product;
use App\Models\Category;
use App\Models\CheckOut;
use App\Models\ProductColor;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductController extends Controller
{
    //
    public function index(){
        $products = Product::select('products.*', 'category.categoryName')
                        // ->leftJoin('product_color', 'products.color_id', '=', 'product_color.id')
                        ->leftJoin('category', 'products.category_id', '=', 'category.id')
                        ->simplePaginate(3);
        return view('admin.pages.product.product', compact('products'));
    }

    public function addProductIndex(Request $request){
        $products = Product::all();
        $categories = Category::all();
        $colors = ProductColor::all();
        return view('admin.pages.product.add-product', compact('categories','colors'));
    }
    public function ProductStore(Request $request) {
    
        $validatedData = $request->validate([
            'productName' => 'required|string|max:255',
            'description' => 'nullable|string',
            'category_id' => 'required|exists:category,id',
            // 'color_id' => 'required|exists:product_color,id',
            // 'stockQuantity' => 'required|integer|min:0',
            'price' => 'required|numeric|min:0',
            'imageUpload' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
    
        $image = $request->file('imageUpload');
        $imageName = uniqid().'.'.$image->getClientOriginalExtension();
        $directory = 'product_images';
        $image->move(public_path($directory), $imageName);
        $imagePath = $directory.'/'.$imageName;
    
        $product = Product::create([
            'productName' => $validatedData['productName'],
            'description' => $validatedData['description'],
            'category_id' => $validatedData['category_id'],
            // 'color_id' => $validatedData['color_id'],
            // 'stockQuantity' => $validatedData['stockQuantity'],
            'price' => $validatedData['price'],
            'imagePath' => $imagePath,
        ]);
        return redirect()->route('adminProduct.view')->with('success', 'Product created successfully.');
    }
    public function editProduct($id){
        $product = Product::findOrFail($id);
        $categories = Category::all();
        $colors = ProductColor::all();
        return view('admin.pages.product.edit-product', compact('product', 'categories', 'colors'));
    }

    public function editProductPost(Request $request, $id) {
        $validatedData = $request->validate([
            'productName' => 'required|string|max:255',
            'description' => 'nullable|string',
            'category_id' => 'required',
            'price' => 'required|numeric|min:0',
            'imageUpload' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $product = Product::findOrFail($id);

        if ($request->hasFile('imageUpload')) {
            $image = $request->file('imageUpload');
            $imageName = uniqid().'.'.$image->getClientOriginalExtension();
            $directory = 'product_images';
            $image->move(public_path($directory), $imageName);
            $imagePath = $directory.'/'.$imageName;
            $product->imagePath = $imagePath;
        }

        $product->productName = $validatedData['productName'];
        $product->description = $validatedData['description'];
        $product->category_id = $validatedData['category_id'];
        $product->price = $validatedData['price'];

        $product->save();

        return redirect()->route('adminProduct.view')->with('success', 'Product updated successfully.');
    }

    public function productSearch(Request $request){
        $searchQuery = $request->input('search-product');
        $products = Product::select('products.*', 'category.categoryName')
            ->leftJoin('category', 'products.category_id', '=', 'category.id')
            ->where(function($query) use ($searchQuery) {
            $query->where('products.productName', 'LIKE', '%' . $searchQuery . '%')
                    ->orWhere('products.description', 'LIKE', '%' . $searchQuery . '%')
                    ->orWhere('category.categoryName', 'LIKE', '%' . $searchQuery . '%')
                    ->orWhere('products.price', 'LIKE', '%' . $searchQuery . '%');
        })->Paginate(0);
        return view('admin.pages.product.product', compact('products'));
    }

    public function productDelete(Request $request, $id){
            CheckOut::where('product_id', $id)->delete();
            $product = Product::find($id);
            $product->delete();
        return redirect()->route('adminProduct.view')->with('success', 'Product deleted successfully.');
    }
}
