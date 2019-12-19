<?php

namespace App\Http\Controllers;

use App\OrderDetail;
use Illuminate\Http\Request;

class OrderDetailController extends Controller
{
    public function create(Request $request)
    {
        $orderDetail = new OrderDetail();

        $orderDetail->order_id = $request->input('order_id');
        $orderDetail->item_code = $request->input('item_code');
        $orderDetail->order_id = $request->input('qty');

        $orderDetail->save();
        return response()->json($orderDetail);
    }

    public function update(Request $request, $id)
    {
        $orderDetail= OrderDetail::find($id);
        $orderDetail->order_id = $request->input('order_id');
        $orderDetail->item_code = $request->input('item_code');
        $orderDetail->order_id = $request->input('qty');

        $orderDetail->save();
        return response()->json($orderDetail);
    }

    public function delete($id)
    {
        $orderDetail=OrderDetail::find($id);
        $orderDetail->delete();

        return response()->json($orderDetail);
    }

    public function getAll()
    {
        $orderDetail = OrderDetail::all();
        return response()->json($orderDetail);
    }
}
