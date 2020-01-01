<?php

namespace App\Http\Controllers;

use App\Color;
use App\Item;
use App\item_color;
use App\item_size;
use App\Size;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ItemController extends Controller
{

    protected $color, $size,$item;

    public function __construct()
    {
        $this->item = new Item();
        $this->color = new item_color();
        $this->size = new item_size();
    }

    public function create(Request $request)
    {
//        $item = new Item();

//        $item->item_code = $request->input('item_code');
//        $item->item_name = $request->input('item_name');
//        $item->item_price = $request->input('item_price');
//        $item->item_qty = $request->input('item_qty');
//        $item->item_description = $request->input('item_description');
//        $item->discount = $request->input('discount');
//        $item->active_flag = $request->input('active_flag');
//        $item->current_date = $request->input('current_date');
//        $item->category_id = $request->input('category_id');
//        $item->sub_category_id = $request->input('sub_category_id');
//        $item->size_id = $request->input('size_id');
//        $item->color_id = $request->input('color_id');

//        $item->save();
//        return response()->json($item);

//        echo ($request);

        DB::beginTransaction();
        try {
            $item = $this->item->create([
                'item_code'=> $request->item_code,
                'item_name'=> $request->item_name,
                'item_price'=> $request->item_price,
                'item_qty'=> $request->item_qty,
                'item_description'=> $request->item_description,
                'discount'=> $request->discount,
                'active_flag'=> $request->active_flag,
                'current_date'=> $request->current_date,
                'category_id'=> $request->category_id,
                'sub_category_id'=> $request->sub_category_id,
//                'size_id'=> $request->size_id,
//                'color_id'=> $request->color_id,
            ]);

            $size = $this->size->create([
                'size_id' => $request->size_id,
                'item_id' => $item->id,
            ]);
            $color = $this->color->create([
                'color_id' => $request->color_id,
                'item_id' => $item->id,
            ]);
            if ($item && $color) {
                if ($color && $size){
                    DB::commit();
                }
            } else {
                DB::rollBack();
            }
            return redirect()->back();

        } catch (Exception $ex) {
            DB::rollBack();
            return redirect()->back();
        }

    }

    public function update(Request $request, $id)
    {
        $item= Item::find($id);
        $item->item_code = $request->input('item_code');
        $item->item_name = $request->input('item_name');
        $item->item_price = $request->input('item_price');
        $item->item_qty = $request->input('item_qty');
        $item->item_description = $request->input('item_description');
        $item->discount = $request->input('discount');
        $item->active_flag = $request->input('active_flag');
        $item->current_date = $request->input('current_date');
        $item->category_id = $request->input('category_id');
        $item->sub_category_id = $request->input('sub_category_id');
        $item->size_id = $request->input('size_id');
        $item->color_id = $request->input('color_id');

        $item->save();
        return response()->json($item);
    }

    public function delete($id)
    {
        $item=Item::find($id);
        $item->delete();

        return response()->json($item);
    }

    public function getAll()
    {
        $item = Item::all();
        return response()->json($item);
    }
}
