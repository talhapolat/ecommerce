<?php

namespace App\Http\Controllers\Manage;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ManageHomeController extends Controller
{
    public function index(){



        return view('layouts.manage.index');
    }
}
