<?php

namespace App\Http\Controllers;

use App\Color;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ColorsController extends Controller
{
    public function searchColorCode($id)
    {
//        $s=$request->input('s');
        echo ($id);
//        $s=$request
//        $colors=Color::class()->$this->searchColorCode($s);
//        return var_dump($colors);

        $colors=DB::table('colors')->select('color_code ')->where('id',$id)->get();
        echo ($colors);

    }

    public function create(Request $request)
    {
        $color = new Color();

        $color->color_name = $request->input('color_name');
        $color->color_code = $request->input('color_code');

        $color->save();
        return response()->json($color);
    }

    public function update(Request $request, $id)
    {
        $color = Color::find($id);
        $color->color_name = $request->input('color_name');
        $color->color_code = $request->input('color_code');

        $color->save();
        return response()->json($color);
    }

    public function delete($id)
    {
        $color = Color::find($id);
        $color->delete();

        return response()->json($color);
    }

    public function getAll()
    {
        $color = Color::all();
        return response()->json($color);
    }
}
