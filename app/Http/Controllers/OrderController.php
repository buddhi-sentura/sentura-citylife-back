<?php

namespace App\Http\Controllers;

use App\Order;
use App\OrderDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    protected $order, $orderDetail;

    public function __construct()
    {
        $this->order= new Order();
        $this->orderDetail= new OrderDetail();
    }

    public function create(Request $request)
    {
        DB::beginTransaction();
        try{
            $order=$this->order->create([
                'total_price'=>$request->total_price,
                'order_discount'=>$request->order_discount,
                'order_date'=>$request->order_date,
                'order_customer_confermation_flag'=>$request->order_customer_confermation_flag,
                'order_complete_flag'=>$request->order_complete_flag,
            ]);

            $orderDetail = $this->orderDetail->create([
                'qty'=>$request->qty,
                'item_code'=>$request->item_code,
                'order_id'=>$order->id,
            ]);
            if ($order && $orderDetail){
                DB::commit();
            } else{
                DB::rollBack();
            }
            return redirect()->back();

        }catch (Exception $ex){
            DB::rollBack();
            return redirect()->back();
        }

//        echo("Order");
//        $order = new Order();
//
//        $order->total_price = $request->input('total_price');
//        $order->order_discount = $request->input('order_discount');
//        $order->order_date = $request->input('order_date');
//        $order->order_customer = $request->input('order_customer');
//        $order->confermation_flag = $request->input('confermation_flag');
//        $order->order_complete_flag = $request->input('order_complete_flag');
//        $order->save();
//
////        foreach ()
//
//        $orderDetail = new OrderDetail();
//
//        $orderDetail->order_id = $request->input('order_id');
//        $orderDetail->item_code = $request->input('item_code');
//        $orderDetail->order_id = $request->input('qty');
//
//        $orderDetail->save();

//        return response()->json($orderDetail);


        return response()->json($order);
    }
//
//    public function update(Request $request, $id)
//    {
//        $order= Order::find($id);
//
//        $order->total_price = $request->input('total_price');
//        $order->order_discount = $request->input('order_discount');
//        $order->order_date = $request->input('order_date');
//        $order->order_customer = $request->input('order_customer');
//        $order->confermation_flag = $request->input('confermation_flag');
//        $order->order_complete_flag = $request->input('order_complete_flag');
//
//        $order->save();
//        return response()->json($order);
//    }
//
//    public function delete($id)
//    {
//        $order=Order::find($id);
//        $order->delete();
//
//        return response()->json($order);
//    }
//
//    public function getAll()
//    {
//        $order = Order::all();
//        return response()->json($order);
//    }

//    public function addOrder(Request $request){
//        $order= Order::create([
//                'total_price' => $request->total_price,
//                'order_discount' => $request->order_discount,
//                'order_date' => $request->order_date,
//                'order_customer' => $request->order_customer,
//                'confermation_flag' => $request->confermation_flag,
//                'order_complete_flag' => $request->order_complete_flag,
//        ]
//        );


//    }

}
