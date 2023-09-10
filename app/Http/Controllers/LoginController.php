<?php

namespace App\Http\Controllers;
use App\Models\Orders;
use App\Models\UserAddress;
use App\Models\Wishlist;
use App\Product;
use App\Slider;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use App\Category;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Navigation;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function index(Request $request){
        $navigations =  Navigation::where('parent',null)->get();
        $subnavigations = Navigation::whereNotNull('parent')->get();
        $categories = Category::where('statu',1)->where('main_category_id')->get();
        return view('layouts.login', compact('navigations', 'subnavigations', 'categories'));
    }


    public function register(Request $request){
        $navigations =  Navigation::where('parent',null)->get();
        $subnavigations = Navigation::whereNotNull('parent')->get();
        $categories = Category::where('statu',1)->where('main_category_id')->get();
        return view('layouts.register', compact('navigations', 'subnavigations', 'categories'));
    }

    public function signup(Request $request){

        $emailcheck = User::all()->where('email', $request->input('useremail'))->count();

        if ($emailcheck > 0)
            return "alemail";

        DB::table('users')->insert([
            //'role_id' => 9,
            'name' => $request->input('username'),
            'surname' => $request->input('usersurname'),
            'email' => $request->input('useremail'),
            'password' => Hash::make($request->input('userpassword')),
        ]);

        return "ok";
    }

    public function signin(Request $request) {

        $validated = $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6'
        ]);


        if (Auth::attempt($validated)) {
            $request->session()->put('loginId', $request->input('email'));

            $user = User::all()->where('email', $request->input('email'))->first();

            $wishlist = Wishlist::where('user', $user->id)->get();
            $request->session()->put('wishcount', count($wishlist));

            return redirect()->route('useraccount');
        } else
            return back()->with('fail', 'E-posta adresi veya şifre hatalı.');

    }

    public function useraccount() {

        $navigations =  Navigation::where('parent',null)->get();
        $subnavigations = Navigation::whereNotNull('parent')->get();
        $categories = Category::where('main_category_id', null)->where('statu',1)->get();
        $products = Product::all();

        $user = User::all()->where('email', session('loginId'))->where('statu', 1)->first();


        return view('layouts.account', compact('navigations', 'subnavigations', 'categories', 'user'));

    }

    public function userorders() {

        $navigations =  Navigation::where('parent',null)->get();
        $subnavigations = Navigation::whereNotNull('parent')->get();
        $categories = Category::where('main_category_id', null)->where('statu',1)->get();
        $products = Product::all();
        $user = User::all()->where('email', session('loginId'))->where('statu', 1)->first();

        $orders = Orders::all()->where('user_id', $user->id);

        return view('layouts.orders', compact('navigations', 'subnavigations', 'categories', 'user', 'orders'));
    }

    public function userwishlist() {

        $user = User::all()->where('email', session('loginId'))->where('statu', 1)->first();
        $navigations =  Navigation::where('parent',null)->get();
        $subnavigations = Navigation::whereNotNull('parent')->get();
        $categories = Category::where('main_category_id', null)->where('statu',1)->get();

        $wishidlist = Wishlist::all()->where('user', $user->id)->pluck('product')->toArray();
        $products = Product::all()->whereIn('id', $wishidlist);

        return view('layouts.wishlist', compact('navigations', 'subnavigations', 'categories', 'user', 'products'));
    }

    public function userwishlistadd(Request $request) {

        $user = User::all()->where('email', session('loginId'))->where('statu', 1)->first();

        $wish = new Wishlist();

        $wish->user = $user->id;
        $wish->product = $request->input('id');
        $wish->save();

        $request->session()->put('wishcount', $request->session()->get('wishcount') + 1);

        echo json_encode(true);
    }

    public function userwishlistdelete(Request $request) {

        $user = User::all()->where('email', session('loginId'))->where('statu', 1)->first();

        $wish = Wishlist::all()->where('user', $user->id)->where('product', $request->input('id'))->first();

        $wish->delete();

        $request->session()->put('wishcount', $request->session()->get('wishcount') - 1);

        echo json_encode(true);
    }

    public function usercoupons() {

        $navigations =  Navigation::where('parent',null)->get();
        $subnavigations = Navigation::whereNotNull('parent')->get();
        $categories = Category::where('main_category_id', null)->where('statu',1)->get();
        $products = Product::all();
        $user = User::all()->where('email', session('loginId'))->where('statu', 1)->first();

        $orders = Orders::all()->where('user_id', $user->id);

        return view('layouts.coupons', compact('navigations', 'subnavigations', 'categories', 'user', 'orders'));
    }

    public function useraddresses() {

        $navigations =  Navigation::where('parent',null)->get();
        $subnavigations = Navigation::whereNotNull('parent')->get();
        $categories = Category::where('main_category_id', null)->where('statu',1)->get();
        $products = Product::all();
        $user = User::all()->where('email', session('loginId'))->where('statu', 1)->first();

        $orders = Orders::all()->where('user_id', $user->id);

        return view('layouts.myaddresses', compact('navigations', 'subnavigations', 'categories', 'user', 'orders'));
    }

    public function useraddressesnew(Request $request) {

        if (Auth::user()) {
            $useraddress = new UserAddress();

            $user = User::where('email', session('loginId'))->first();
            $useraddress->user =  $user->id;
            $useraddress->title =  $request->input('name');
            $useraddress->name =  $request->input('addressname');
            $useraddress->surname =  $request->input('addresssurname');
            $useraddress->phone =  $request->input('addressphone');
            $useraddress->email =  $request->input('addressemail');
            $useraddress->country =  "Türkiye";
            $useraddress->city =  $request->input('addresscity');
            $useraddress->state =  $request->input('addressdistrict');
            $useraddress->address =  $request->input('address');

            $useraddress->save();

            echo json_encode(true);
        } else {
            echo json_encode(false);
        }

    }



    public function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}
