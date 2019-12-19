<?php

namespace App\Http\Controllers;

use App\Size;
use Illuminate\Http\Request;

class SizeController extends Controller
{
    public function create(Request $request)
    {
        $size = new Size();

        $size->size_name = $request->input('size_name');

        $size->save();
        return response()->json($size);
    }

    public function update(Request $request, $id)
    {
        $size= Size::find($id);
        $size->size_name = $request->input('size_name');

        $size->save();
        return response()->json($size);
    }

    public function delete($id)
    {
        $size=Size::find($id);
        $size->delete();

        return response()->json($size);
    }

    public function getAll()
    {
        $size = Size::all();
        return response()->json($size);
    }
}
