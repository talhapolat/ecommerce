<?php

namespace App\Http\Controllers;

use App\Category;
use App\Gallery;
use App\Navigation;
use App\Option;
use App\Product;
use App\ProductCategory;
use App\ProductOption;
use App\Suboption;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index($slug){
        $navigations =  Navigation::where('parent',null)->get();
        $subnavigations = Navigation::whereNotNull('parent')->get();
        $categories = Category::where('statu',1)->get();
        $product = Product::where('slug', $slug)->first();
        $productcategories = ProductCategory::where('product_id', $product->id)->first();
        if ($productcategories != null){
            $productcategory = Category::where('id', $productcategories->category_id)->first();
        } else {
            $productcategory = null;
        }

        $galleries = Gallery::where('product_id', $product->id)->get();

        $product_option_suboption1 = ProductOption::where('product_id', $product->id)->get('suboption1');
        if (sizeof($product_option_suboption1) > 0) {
            $suboption1_mainoption = Suboption::whereIn('id', $product_option_suboption1)->get('option_id');
            $suboption1_mainoptions = Option::whereIn('id', $suboption1_mainoption)->get();
            $suboptions1 = Suboption::whereIn('id', $product_option_suboption1)->get();

            $product_option_suboption2 = ProductOption::where('product_id', $product->id)->where('suboption1', $suboptions1[0]['id'])->get('suboption2');
            $suboption2_mainoption = Suboption::whereIn('id', $product_option_suboption2)->get('option_id');
            $suboption2_mainoptions = Option::whereIn('id', $suboption2_mainoption)->first();
            $suboptions2 = Suboption::whereIn('id', $product_option_suboption2)->get();
        }else{
            $suboption1_mainoptions = null;
            $suboption2_mainoptions = null;
            $suboptions1 = null;
            $suboptions2 = null;
        }

        return view('layouts.productdetail', compact('categories','product', 'productcategories', 'productcategory', 'galleries', 'suboption1_mainoptions', 'suboption2_mainoptions', 'suboptions1', 'suboptions2', 'navigations', 'subnavigations'));
    }
}
