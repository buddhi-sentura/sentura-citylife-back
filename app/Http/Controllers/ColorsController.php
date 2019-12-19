<?php

namespace App\Http\Controllers;

use App\Color;
use Illuminate\Http\Request;

class ColorsController extends Controller
{
    public function create(Request $request)
    {
        $color = new Color();

        $color->color_name = $request->input('color_name');

        $color->save();
        return response()->json($color);
    }

    public function update(Request $request, $id)
    {
        $color= Color::find($id);
        $color->color_name = $request->input('color_name');

        $color->save();
        return response()->json($color);
    }

    public function delete($id)
    {
        $color=Color::find($id);
        $color->delete();

        return response()->json($color);
    }

    public function getAll()
    {
        $color = Color::all();
        return response()->json($color);
    }
}
