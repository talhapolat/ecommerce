<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CartController extends Controller
{
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
        } else {
//            $_SESSION['qty'][$cartcontrol]['qty'] += $request->input('qty');
//            if ($_SESSION['qty'][$cartcontrol]['qty'] < 1) {
//                $_SESSION['qty'][$cartcontrol]['qty'] = 1;
//            } elseif ($_SESSION['qty'][$cartcontrol]['qty'] > 99) {
//                $_SESSION['qty'][$cartcontrol]['qty'] = 99;
//            } else {
//
//            }
//            $sameproduct = $cartcontrol;
        }

        $carttotal = 0;

//        foreach (session('qty') as $key => $qty) {
//            $carttotal += $qty['qty']*$_SESSION['cart'][$key]['price'];
//        }

        $resulta[0] = $carttotal;
        //$resulta[1] = $sameproduct;

        echo "Gelen Ürün <br>";
        echo json_encode($pcart);
        echo "<br>Kontrol <br>";
        echo $cartcontrol;
        echo "<br>Cart <br>";
        echo json_encode(session('cart'));
        echo "<br>qty <br>";
        echo json_encode(session('qty'));
    }
}
