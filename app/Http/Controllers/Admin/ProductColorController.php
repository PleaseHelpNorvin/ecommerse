<?php

namespace App\Http\Controllers\Admin;

use App\Models\Color;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProductColorController extends Controller
{
    //
    public function index(){
        $colors = Color::latest()->simplePaginate(10);
        return view('admin.pages.color.color', compact('colors'));
    }

    public function addColorIndex(){
        return view('admin.pages.color.add-color');
    }

    public function ColorStore(Request $request){
        $request->validate([
            'colorName' => 'required|string|max:255',
            'colorCode' => 'required|string|max:255',
        ]);
        Color::create([
            'name' => $request->colorName,
            'code' => $request->colorCode,
        ]);
        return redirect()->route('adminProductColor.view')->with('success', 'Color added successfully.');
    }

    public function editColor($id){
        $colors = Color::findOrFail($id);
        return view('admin.pages.color.edit-color', compact('colors'));
    }

    public function editColorPost(Request $request, $id){
        $request->validate([
            'colorName' => 'required|string|max:255',
            'colorCode' => 'required|string|max:255',
        ]);
        $color = Color::findOrFail($id);
        $color->name = $request->colorName;
        $color->code = $request->colorCode;
        $color->save();
        return redirect()->route('adminProductColor.view')->with('success', 'Color updated successfully.');
    }

    public function colorSearch(Request $request){
        $searchQuery = $request->input('search-color');

        $colors = Color::where('name', 'LIKE', '%' . $searchQuery . '%')
                        ->orWhere('code', 'LIKE', '%' . $searchQuery . '%')
                        ->paginate(0);
        return view('admin.pages.color.color', compact('colors'));
    }

    public function colorDelete($id){
        $colors = Color::findOrFail($id);
        $colors->delete();
        return redirect()->route('adminProductColor.view')->with('success', 'Color deleted successfully.');
    }
}
