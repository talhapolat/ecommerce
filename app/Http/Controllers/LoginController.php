<?php

namespace App\Http\Controllers;
use App\Product;
use App\Slider;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use App\Category;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Navigation;
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

    public function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}
