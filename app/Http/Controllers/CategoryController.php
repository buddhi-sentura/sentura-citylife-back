<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function create(Request $request)
    {
        $category = new Category();

        $category->category_code = $request->input('category_code');
        $category->category_name = $request->input('category_name');

        $category->save();
        return response()->json($category);
    }

    public function update(Request $request, $id)
    {
        $category= Category::find($id);
        $category->category_code = $request->input('category_code');
        $category->category_name = $request->input('category_name');

        $category->save();
        return response()->json($category);
    }

    public function delete($id)
    {
        $category=Category::find($id);
        $category->delete();

        return response()->json($category);
    }

    public function getAll()
    {
        $category = Category::all();
        return response()->json($category);
    }
}
