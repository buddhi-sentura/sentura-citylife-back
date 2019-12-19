<?php

namespace App\Http\Controllers;

use App\Seller;
use Illuminate\Http\Request;

class SellerController extends Controller
{
    public function create(Request $request)
    {
        $seller = new Seller();

        $seller->first_name = $request->input('first_name');
        $seller->last_name = $request->input('last_name');
        $seller->address = $request->input('address');
        $seller->nic = $request->input('nic');
        $seller->mobile_number = $request->input('mobile_number');
        $seller->tell_number = $request->input('tell_number');
        $seller->password = $request->input('password');
        $seller->confirmation_flag = $request->input('confirmation_flag');
        $seller->active_flag = $request->input('active_flag');
        $seller->company_name = $request->input('company_name');
        $seller->current_date = $request->input('current_date');

        $seller->save();
        return response()->json($seller);
    }

    public function update(Request $request, $id)
    {
        $seller= Seller::find($id);

        $seller->first_name = $request->input('first_name');
        $seller->last_name = $request->input('last_name');
        $seller->address = $request->input('address');
        $seller->nic = $request->input('nic');
        $seller->mobile_number = $request->input('mobile_number');
        $seller->tell_number = $request->input('tell_number');
        $seller->password = $request->input('password');
        $seller->confirmation_flag = $request->input('confirmation_flag');
        $seller->active_flag = $request->input('active_flag');
        $seller->company_name = $request->input('company_name');
        $seller->current_date = $request->input('current_date');

        $seller->save();
        return response()->json($seller);
    }

    public function delete($id)
    {
        $seller=Seller::find($id);
        $seller->delete();

        return response()->json($seller);
    }

    public function getAll()
    {
        $seller = Seller::all();
        return response()->json($seller);
    }
}
