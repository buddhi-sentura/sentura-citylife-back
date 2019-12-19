<?php

namespace App\Http\Controllers;

use App\Delivery;
use Illuminate\Http\Request;

class DeliveryController extends Controller
{
    public function create(Request $request)
    {
        $delivery = new Delivery();

        $delivery->customer_first_name = $request->input('customer_first_name');
        $delivery->customer_last_name = $request->input('customer_last_name');
        $delivery->dilivary_address = $request->input('dilivary_address');
        $delivery->contact_number = $request->input('contact_number');
        $delivery->home_town = $request->input('home_town');
        $delivery->post_code = $request->input('post_code');

        $delivery->save();
        return response()->json($delivery);
    }

    public function update(Request $request, $id)
    {
        $delivery= Delivery::find($id);
        $delivery->customer_first_name = $request->input('customer_first_name');
        $delivery->customer_last_name = $request->input('customer_last_name');
        $delivery->dilivary_address = $request->input('dilivary_address');
        $delivery->contact_number = $request->input('contact_number');
        $delivery->home_town = $request->input('home_town');
        $delivery->post_code = $request->input('post_code');

        $delivery->save();
        return response()->json($delivery);
    }

    public function delete($id)
    {
        $delivery=Delivery::find($id);
        $delivery->delete();

        return response()->json($delivery);
    }

    public function getAll()
    {
        $delivery = Delivery::all();
        return response()->json($delivery);
    }
}
