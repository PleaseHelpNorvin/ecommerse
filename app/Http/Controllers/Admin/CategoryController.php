<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    //
    public function index(){
        $categories = Category::latest()->simplePaginate(5);
        return view('admin.pages.category.category', compact('categories'));
    }

    public function addCategoryIndex(){
        return view('admin.pages.category.add-category');
    }
    public function CategoryStore(Request $request){
        $validatedData = $request->validate([
            'categoryName' => 'required|string|max:255',
            'imageUpload' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $image = $request->file('imageUpload');
        $imageName = uniqid().'.'.$image->getClientOriginalExtension();
        $directory = 'category_images';
        $image->move(public_path($directory), $imageName);
        $imagePath = $directory.'/'.$imageName;

        $category = Category::create([
            'categoryName' => $validatedData['categoryName'],
            'imagePath' => $imagePath,
        ]);
    
        return redirect()->route('adminCategory.view')->with('success', 'Category created successfully.');
    }

    public function editCategoryIndex(Request $request, string $id){
        $categories = Category::find($id);
        return view('admin.pages.category.edit-category',compact('categories'));
    }

    public function editCategoryPost(Request $request, $id){
        $validatedData = $request->validate([
            'categoryName' => 'required|string|max:255',
            'imageUpload' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $category = Category::findOrFail($id);
        $category->update([
            'categoryName' => $validatedData['categoryName'],
        ]);
            if ($request->hasFile('imageUpload')) {
                $image = $request->file('imageUpload');
                $imageName = uniqid().'.'.$image->getClientOriginalExtension();
                $directory = 'category_images';
                $image->move(public_path($directory), $imageName);
                $category->update(['imagePath' => $directory.'/'.$imageName]);
            }
        return redirect()->route('adminCategory.view')->with('success', 'Category updated successfully.');
    }

    public function categorySearch(Request $request){
        $searchQuery = $request->input('search-category');

        $categories = Category::where('categoryName', 'LIKE', '%' . $searchQuery . '%')
                            ->paginate(0);
        return view('admin.pages.category.category', compact('categories'));
    }
    
    public function categoryDelete(Request $request, $id){
        $category = Category::find($id);
        $category->delete();
        return redirect()->route('adminCategory.view')->with('success', 'Category deleted successfully.');
    }
}
