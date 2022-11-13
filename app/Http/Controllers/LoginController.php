<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Navigation;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function index(Request $request){
        $navigations =  Navigation::where('parent',null)->get();
        $subnavigations = Navigation::whereNotNull('parent')->get();

        return view('layouts.login', compact('navigations', 'subnavigations'));
    }


    public function register(Request $request){
        $navigations =  Navigation::where('parent',null)->get();
        $subnavigations = Navigation::whereNotNull('parent')->get();

        return view('layouts.register', compact('navigations', 'subnavigations'));
    }
}
