<?php

namespace App\Http\Controllers\Manage;

use App\Category;
use App\Http\Controllers\Controller;
use App\Product;
use App\ProductCategory;
use Illuminate\Http\Request;

class ManageProductController extends Controller
{
    public function index(){

        $products = Product::all();


        return view('layouts.manage.manageproducts', compact('products'));
    }

    public function newproduct(){



        return view('layouts.manage.manageproductsnew');
    }
}
