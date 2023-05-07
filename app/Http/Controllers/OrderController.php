<?php

namespace App\Http\Controllers;

use App\Category;
use App\Http\Controllers\Controller;
use App\Models\Deliveries;
use App\Models\User;
use App\Navigation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    public function checkoutcontrol($step, Request $request){

        if ($step == 1) {
            session()->put('addressname', $request->input('addressname'));
            session()->put('addresssurname', $request->input('addresssurname'));
            session()->put('addressemail', $request->input('addressemail'));
            session()->put('addressphone', $request->input('addressphone'));
            session()->put('addresscity', $request->input('addresscity'));
            session()->put('addressdistrict', $request->input('addressdistrict'));
            session()->put('address', $request->input('address'));
        } elseif ($step == 2) {
            session()->put('shiptype', $request->input('shiptype'));
        } elseif ($step == 3) {
            return redirect()->route('createorder', [$request]);
        }

        return redirect()->route('checkout', ['step' => $step+1]);
    }

    public function checkout(Request $request){

        $navigations =  Navigation::where('parent',null)->get();
        $subnavigations = Navigation::whereNotNull('parent')->get();
        $categories = Category::where('statu',1)->get();
        $step = $request->input('step');
        $deliveries = Deliveries::where('delivery_statu', 1)->where('delivery_min_price', '<=', session('carttotal'))->get();
        $delivery = Deliveries::where('delivery_statu', 1)->where('id', session()->get('shiptype'))->where('delivery_min_price', '<=', session('carttotal'))->first();
        if ($delivery == null) {
            $delivery = Deliveries::where('delivery_statu', 1)->where('delivery_min_price', '<=', session('carttotal'))->first();
            if ($delivery == null)
                return "Uygun teslimat yöntemi bulunamadı";
            session()->put('shiptype', $delivery->id);
        }

        return view('layouts.checkout', compact('navigations', 'subnavigations', 'categories', 'step', 'deliveries', 'delivery'));
    }

    public function createorder(Request $request) {

        $user = User::all()->where('email', session('loginId'))->where('statu', 1)->first();
        if ($user != null)
        $userid = $user->id;
        else
            $userid = '99999';

        $carttotal = 0;

        foreach (session('qty') as $key => $qty) {
            $carttotal += $qty['qty']*session('cart')[$key]['price'];
        }

        $total = $carttotal;

        $neworderid = DB::table('orders')->insertGetId([
            'order_number' => self::generateon(),
            'user_id' => $userid,
            'order_amount' => $total,
            'order_tax' => 0,
            'order_ship_name' => session('addressname'),
            'order_ship_surname' => session('addresssurname'),
            'order_ship_email' => session('addressemail'),
            'order_ship_phone' => session('addressphone'),
            'order_ship_city' => session('addresscity'),
            'order_ship_district' => session('addressdistrict'),
            'order_ship_address' => session('address'),
            'order_ship_type' => $request->input('1'),
            'order_ship_tracking_number' => $request->input('order_ship_tracking_number'),
            'order_ship_price' => $request->input('order_ship_price'),
            'order_statu' => 0
        ]);

        $neworder = DB::table('orders')->where('id', $neworderid)->first();

        foreach (session('qty') as $key => $qty) {

            print_r(session('cart')[$key]);
            print_r("-");
            print_r($qty['qty']);

            DB::table('order_details')->insert([
                'order_id' => $neworder->id,
                'order_number' => $neworder->order_number,
                'product_id' => session('cart')[$key]['id'],
                'product_title' => session('cart')[$key]['title'],
                'product_image' => session('cart')[$key]['image'],
                'product_quantity' => $qty['qty'],
                'product_price' => session('cart')[$key]['price'],
                'product_option1' => session('cart')[$key]['option1'],
                'product_option2' => session('cart')[$key]['option2'],
                'statu' => 0
            ]);
        }

    }

    static function generateon(){
        $randomNumber = random_int(1000000, 9999999);

        return $randomNumber;
    }
}
