<?php

namespace App\Http\Controllers\Manage;

use App\Http\Controllers\Controller;
use App\Models\User;

class ManageUserController extends Controller
{
    public function index(){

        $users = User::all();


        return view('layouts.manage.manageusers', compact('users'));
    }
}
