<?php

namespace App\Http\Controllers;

use App\Category;
use App\Http\Controllers\Controller;
use App\Navigation;
use Illuminate\Http\Request;

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
}
