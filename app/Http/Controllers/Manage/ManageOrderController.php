<?php

namespace App\Http\Controllers\Manage;

use App\Http\Controllers\Controller;
use App\Models\Deliveries;
use App\Models\OrderDetails;
use App\Models\Orders;
use App\Models\payment_methods;
use App\Product;
use Illuminate\Support\Facades\DB;

class ManageOrderController extends Controller
{
    public function orders(){

        $orders = Orders::all();
        $products = Product::all();
        $payment_methods = payment_methods::all();

        $ordersdetailscount = DB::table('order_details')
            ->select('order_number', DB::raw('sum(product_quantity) as total'))
            ->groupBy('order_number')
            ->get();

        foreach ($ordersdetailscount as $detail) {
            $ordersdscount[$detail->order_number] = $detail->total;
        }

        return view('layouts.manage.manageorders', compact('products', 'orders', 'ordersdetailscount', 'ordersdscount', 'payment_methods'));
    }

    public function editorder($oid){

        $order = Orders::all()->where('order_number', $oid)->first();
        $order_detail = DB::table('order_details')->where('order_number', $oid)->get();
        $payment_method = payment_methods::all()->where('id', $order->order_payment_type)->first();
        $payment_method_title = $payment_method->title;
        $delivery_type = Deliveries::all()->where('id', $order->order_ship_type)->first();
        $delivery_type_title = $delivery_type->delivery_title;

        return view('layouts.manage.manageordersedit', compact('order', 'order_detail', 'payment_method_title', 'delivery_type_title'));
    }
}
