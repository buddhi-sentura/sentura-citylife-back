<?php

namespace App\Http\Controllers;

use App\Item;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    public function create(Request $request)
    {
        $item = new Item();

        $item->item_code = $request->input('item_code');
        $item->item_name = $request->input('item_name');
        $item->item_price = $request->input('item_price');
        $item->item_qty = $request->input('item_qty');
        $item->item_description = $request->input('item_description');
        $item->discount = $request->input('discount');
        $item->active_flag = $request->input('active_flag');
        $item->current_date = $request->input('current_date');

        $item->save();
        return response()->json($item);
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
