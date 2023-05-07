<?php

namespace App\Http\Controllers\Manage;

use App\Http\Controllers\Controller;
use App\Models\OrderDetails;
use App\Models\Orders;
use App\Product;
use Illuminate\Support\Facades\DB;

class ManageOrderController extends Controller
{
    public function orders(){

        $orders = Orders::all();
        $products = Product::all();

        $ordersdetailscount = DB::table('order_details')
            ->select('order_number', DB::raw('sum(product_quantity) as total'))
            ->groupBy('order_number')
            ->get();

        foreach ($ordersdetailscount as $detail) {
            $ordersdscount[$detail->order_number] = $detail->total;
        }

        return view('layouts.manage.manageorders', compact('products', 'orders', 'ordersdetailscount', 'ordersdscount'));
    }

    public function editorder($oid){

        $order = Orders::all()->where('order_number', $oid)->first();
        $order_detail = DB::table('order_details')->where('order_number', $oid)->get();

        return view('layouts.manage.manageordersedit', compact('order', 'order_detail'));
    }
}
