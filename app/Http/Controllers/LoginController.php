<?php

namespace App\Http\Controllers;

use App\Category;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Navigation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
            'password' => $request->input('userpassword'),
        ]);

        return "ok";
    }
}
