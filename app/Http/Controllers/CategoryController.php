<?php

namespace App\Http\Controllers;

use App\Category;
use App\Navigation;
use App\Product;
use App\ProductCategory;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index($category_slug){

        $category = Category::where('slug', $category_slug)->first();
        $categories = Category::all();
        $parentcategories = Category::where('main_category_id', null)->get();
        $subcategories = Category::where('main_category_id', $category['id'])->orWhere('id', $category['id'])->get('id');
        $product_categories = ProductCategory::whereIn('category_id', $subcategories)->get('product_id');
        $products = Product::whereIn('id', $product_categories)->get();
        $productsnum = $products->count();
        $navigations =  Navigation::where('parent',null)->get();
        $subnavigations = Navigation::whereNotNull('parent')->get();

//        return $productsnum;
        return view("layouts.category", compact('products', 'productsnum', 'category', 'categories', 'parentcategories','navigations', 'subnavigations'));

    }

    public static function haveSubNav($parent){
        $subnavigations = Navigation::where('parent', $parent)->get();

        return $subnavigations;
    }

    public static function subCategories($parent){

        $subCategories = Category::where('main_category_id', $parent)->where('statu',1)->get();

        return $subCategories;

    }

    public static function getProductCategories($pid){

        $product_categories = ProductCategory::where('product_id', $pid)->get();

        return $product_categories;

    }
}
