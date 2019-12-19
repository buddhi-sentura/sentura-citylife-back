<?php

namespace App\Http\Controllers;

use App\SubCategory;
use Illuminate\Http\Request;

class SubCategoryController extends Controller
{
    public function create(Request $request)
    {
        $subCat = new SubCategory();

        $subCat->sub_category_code = $request->input('sub_category_code');
        $subCat->sub_category_name = $request->input('sub_category_name');

        $subCat->save();
        return response()->json($subCat);
    }

    public function update(Request $request, $id)
    {
        $subCat= SubCategory::find($id);
        $subCat->sub_category_code = $request->input('sub_category_code');
        $subCat->sub_category_name = $request->input('sub_category_name');

        $subCat->save();
        return response()->json($subCat);
    }

    public function delete($id)
    {
        $subCat=SubCategory::find($id);
        $subCat->delete();

        return response()->json($subCat);
    }

    public function getAll()
    {
        $subCat = SubCategory::all();
        return response()->json($subCat);
    }
}
