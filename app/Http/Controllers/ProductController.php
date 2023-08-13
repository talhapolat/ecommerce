<?php

namespace App\Http\Controllers;

use App\Category;
use App\Gallery;
use App\Navigation;
use App\Option;
use App\Product;
use App\ProductCategory;
use App\ProductMedia;
use App\ProductOption;
use App\Suboption;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function index($slug){
        $navigations =  Navigation::where('parent',null)->get();
        $subnavigations = Navigation::whereNotNull('parent')->get();
        $categories = Category::where('main_category_id', null)->where('statu',1)->get();
        $product = Product::where('slug', $slug)->first();
        $productcategories = ProductCategory::where('product_id', $product->id)->first();
        if ($productcategories != null){
            $productcategory = Category::where('id', $productcategories->category_id)->first();
        } else {
            $productcategory = null;
        }

        $galleries = Gallery::where('product_id', $product->id)->get();

        $product_option_suboption1 = ProductOption::where('product_id', $product->id)->orderBy('no', 'ASC')->get('suboption1');
        if (sizeof($product_option_suboption1) > 0) {
            $suboption1_mainoption = Suboption::whereIn('id', $product_option_suboption1)->get('option_id');
            $suboption1_mainoptions = Option::whereIn('id', $suboption1_mainoption)->get();
            $temp = ProductOption::where('product_id', $product->id)->orderBy('no', 'ASC')->get('suboption1')->pluck('suboption1')->toArray();
            $tempStr = implode(',', $temp);
            $suboptions1 = Suboption::whereIn('id', $temp)->orderByRaw(DB::raw("FIELD(id, $tempStr)"))->get();


            $product_option_suboption2 = ProductOption::where('product_id', $product->id)->where('suboption1', $suboptions1[0]['id'])->get('suboption2');

            $suboption2_mainoption = Suboption::whereIn('id', $product_option_suboption2)->get('option_id');
            $suboption2_mainoptions = Option::whereIn('id', $suboption2_mainoption)->first();
            $suboptions2 = Suboption::whereIn('id', $product_option_suboption2)->get();

            if (count($suboptions2) > 0) {
                $s2options = ProductOption::where('suboption1', $suboptions1[0]['id'])->where('product_id', $product->id)->orderBy('no')->get('suboption2');
                $temp2 = ProductOption::where('suboption1', $suboptions1[0]['id'])->where('product_id', $product->id)->orderBy('no')->get()->pluck('suboption2')->toArray();
                $tempStr2 = implode(',', $temp2);
                $suboptions2 = Suboption::whereIn('id', $s2options)->orderByRaw(DB::raw("FIELD(id, $tempStr2)"))->get();
            }
            //return $suboptions2;
            //return $product_option_suboption1;

            $product_media = ProductMedia::select(
                "product_media.product_id",
                "product_media.no",
                "images.img_name",
                "suboptions.title"
            )
                ->join("images", "product_media.media_id", "=", "images.id")
                ->join("suboptions", "product_media.option_id", "=", "suboptions.id")
                ->where("product_media.product_id", $product->id)
                ->orderBy("product_media.no")
                ->get();
            //return $sql;

        }else{
            $suboption1_mainoptions = null;
            $suboption2_mainoptions = null;
            $suboptions1 = null;
            $suboptions2 = null;

            $product_media = ProductMedia::select(
                "product_media.product_id",
                "product_media.no",
                "images.img_name"
            )
                ->join("images", "product_media.media_id", "=", "images.id")
                ->where("product_media.product_id", $product->id)
                ->orderBy("product_media.no")
                ->get();
        }


        return view('layouts.productdetail', compact('categories','product', 'productcategories', 'productcategory', 'galleries', 'suboption1_mainoptions', 'suboption2_mainoptions', 'suboptions1', 'suboptions2', 'navigations', 'subnavigations', 'product_media'));
    }
}
