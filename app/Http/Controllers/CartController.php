<?php

namespace App\Http\Controllers;

use App\Category;
use App\Navigation;
use Illuminate\Http\Request;

class CartController extends Controller
{

    public function index(){
        $navigations =  Navigation::where('parent',null)->get();
        $subnavigations = Navigation::whereNotNull('parent')->get();
        $categories = Category::where('statu',1)->get();

        return view('layouts.cartdetail', compact('navigations', 'subnavigations', 'categories'));
    }


    public static function addcart(Request $request){

        //return session('qty');

        session(['key' => 'value']);

        //return $request->session()->has('key');

        if ($request->session()->has('cart')){

        } else {
            session(['cart' => array()]);
            session(['carttotal' => 0]);
        }



        if ($request->session()->has('qty')){

        } else {
            session(['qty' => array()]);
        }



        $pcart = array("id"=>$request->input('id'), "title"=>$request->input('title'), "image"=>$request->input('image'), "price"=>$request->input('price'), "option1"=>"", "option2"=>"");

        if ($request->input('qty') < 1) {
            $qty = array("qty"=>1);
        } elseif ($request->input('qty') > 99) {
            $qty = array("qty"=>99);
        } else {
            $qty = array("qty"=>$request->input('qty'));
        }


        if ($request->input('option1') != null) {
            $pcart["option1"] = $request->input('option1');
        }
        if ($request->input('option2') != null) {
            $pcart["option2"] = $request->input('option2');
        }

        if ($request->session()->has('cart')) {
            $cartcontrol = array_search($pcart, session('cart'));
        }else{
            $cartcontrol = false;
        }

        if ($cartcontrol == "") {
            $request->session()->push('cart', $pcart);
            $request->session()->push('qty', $qty);
            $sameproduct = 999;
            $sessionarrayqty = session('qty');
        } else {
            $sessionarrayqty = session('qty');
            $sessionarrayqty[$cartcontrol]['qty'] += $request->input('qty');
            if ($sessionarrayqty[$cartcontrol]['qty'] > 99){
                $sessionarrayqty[$cartcontrol]['qty'] = 99;
            } elseif ($sessionarrayqty[$cartcontrol]['qty'] < 1){
                $sessionarrayqty[$cartcontrol]['qty'] = 1;
            }
            $request->session()->put('qty', $sessionarrayqty);

            $sameproduct = $cartcontrol;
        }
        $sessionarraycart = session('cart');
        $carttotal = 0;

        foreach ($sessionarrayqty as $key => $qty) {
            $carttotal += $qty['qty']*$sessionarraycart[$key]['price'];
        }

        $request->session()->put('carttotal', $carttotal);

        $resulta[0] = $carttotal;
        $resulta[1] = $sameproduct;

        echo json_encode($resulta);
    }


    public static function deletecart(Request $request){

        $application = session('qty');
        array_splice($application, $request->input('key'), 1);
        $request->session()->put('qty', $application);
        $application1 = session('cart');
        array_splice($application1, $request->input('key'), 1);
        $request->session()->put('cart', $application1);

        $request->session()->put('qty', $application);
        $carttotal = 0;

        foreach ($application as $key => $qty) {
            $carttotal += $qty['qty']*$application1[$key]['price'];
        }

        $request->session()->put('carttotal', $carttotal);

        return back();
    }


    public static function updatecart(Request $request){

        $application = session('qty');
        $application1 = session('cart');
        $carttotal = 0;

        foreach ($application as $key => $qty) {
            $application[$key]['qty'] = $request->input('num-product')[$key];
            if ($request->input('num-product')[$key] < 1) {
                $application[$key]['qty'] = 1;
            } elseif ($request->input('num-product')[$key] > 99) {
                $application[$key]['qty'] = 99;
            }
        }

        $request->session()->put('qty', $application);

        foreach ($application as $key => $qty) {
            $carttotal += $qty['qty']*$application1[$key]['price'];
        }

        $request->session()->put('carttotal', $carttotal);

        return back();
    }
}
