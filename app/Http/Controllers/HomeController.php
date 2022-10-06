<?php

namespace App\Http\Controllers;

use App\Gallery;
use App\Navigation;
use App\Option;
use App\Product;
use App\ProductOption;
use App\Slider;
use App\Suboption;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index(Request $request){
        $navigations =  Navigation::where('parent',null)->get();
        $subnavigations = Navigation::whereNotNull('parent')->get();
        $sliders = Slider::all();
        $products = Product::all();
        if ($request->input('search-product') != null) {
            $products = Product::where('title', 'like', '%'.$request->input('search-product').'%')->get();
        }

        return view('index', compact('navigations', 'subnavigations', 'sliders', 'products'));
    }

    public function getOption1(Request $request){
//        $s1optionQuery = DB::select("SELECT * FROM suboption WHERE id IN (SELECT suboption1 FROM product_option WHERE product_id = ?)");
//        $s1optionQuery->execute($request);
//        $s1optionNum = $s1optionQuery->rowCount();
//        $s1options = $s1optionQuery->fetchAll(PDO::FETCH_ASSOC);
//
//        $array = array();
//
//        if ($s1optionNum > 0) {
//            foreach ($s1options as $key => $s1option) {
//                array_push($array, $s1option);
//            }
//        } else {
//            $array = null;
//        }
//
//        echo json_encode($array);

        $productoption_suboption1 = ProductOption::where('product_id', $request->input('pid'))->get('suboption1');
        $s1options = Suboption::whereIn('id', $productoption_suboption1)->get();
        $array = array();
        foreach ($s1options as $key => $s1option){
            array_push($array, $s1option);
        }

        echo json_encode($array);

    }

    public function getOption2(Request $request) {

//        $s2optionQuery = $dbConnect->prepare("SELECT * FROM suboption WHERE id IN (SELECT suboption2 FROM product_option WHERE suboption1 = (SELECT id FROM suboption WHERE title = ?))");
//        $s2optionQuery->execute([$_POST["dropdownValue"]]);
//        $s2optionNum = $s2optionQuery->rowCount();
//        $s2options = $s2optionQuery->fetchAll(PDO::FETCH_ASSOC);
//
//        $array = array();
//
//        if ($s2optionNum > 0) {
//            foreach ($s2options as $key => $s2option) {
//                array_push($array, $s2option);
//            }
//        } else {
//            $array = null;
//        }

        if ($request->input('slug') != null && $request->input('pid') == null){
            $product = Product::where('slug', $request->input('slug'))->get('id');
        } else {
            $product = Product::where('id', $request->input('pid'))->get('id');
        }

        $s2options_id = Suboption::where('title', $request->input('dropdownValue'))->get('id');
        $s2options = ProductOption::where('suboption1', $s2options_id[0]['id'])->where('product_id', $product[0]['id'])->get('suboption2');
        $s2option = Suboption::whereIn('id', $s2options)->get();


        $array = array();
        foreach ($s2option as $key => $s2opt){
            array_push($array, $s2opt);
        }
        echo json_encode($array);
    }


    public function getOption2first(Request $request) {
//        $s2optionQuery = $dbConnect->prepare("SELECT * FROM suboption WHERE id IN (SELECT suboption2 FROM product_option WHERE product_id = ? and suboption1 = (SELECT suboption1 FROM product_option LIMIT 1))");
//
//        $s2optionQuery->execute([$_POST["pid"]]);
//        $s2optionNum = $s2optionQuery->rowCount();
//        $s2options = $s2optionQuery->fetchAll(PDO::FETCH_ASSOC);
//
//
//
//        $array = array();
//
//        if ($s2optionNum > 0) {
//            foreach ($s2options as $key => $s2option) {
//                array_push($array, $s2option);
//            }
//        } else {
//            $array = null;
//        }
//
//
//
//        echo json_encode($array);

        $s2options_suboption1 = ProductOption::where('product_id', $request->input('pid'))->get('suboption1');
        $s2options_ = ProductOption::where('product_id', $request->input('pid'))->where('suboption1', $s2options_suboption1[0]['suboption1'])->get('suboption2');
        $s2options = Suboption::whereIn('id', $s2options_)->get();

        $array = array();
        foreach ($s2options as $key => $s2option){
            array_push($array, $s2option);
        }
        echo json_encode($array);

    }



    public function getProduct(Request $request) {

//        $pid = $request;
//
//        $getproductQuery = $dbConnect->prepare("SELECT * FROM products WHERE id = ?");
//        $getproductQuery->execute([$pid]);
//        $getproductNum = $getproductQuery->rowCount();
//        $getproduct = $getproductQuery->fetch(PDO::FETCH_ASSOC);



//        if (isset($user)) {
//            $isFavQuery = $dbConnect->prepare("SELECT * FROM favorites WHERE user_id = ? and product_id = ?");
//            $isFavQuery->execute([$user["id"],$pid]);
//            $isFavQueryNum = $isFavQuery->rowCount();
//            $isFavProduct = $isFavQuery->fetch(PDO::FETCH_ASSOC);
//        } else {
//            $isFavQueryNum = 0;
//        }
//
//        if ($isFavQueryNum == 1) {
//            $isFav = true;
//        } else {
//            $isFav = false;
//        }


        $prod = Product::where('id', $request->input('pid'))->first();

        $modelproduct[0] = $prod->title;
        $modelproduct[1] = $prod->price;
        $modelproduct[2] = $prod->shortDesc;
        $modelproduct[3] = $prod->image;
        $modelproduct[4] = $prod->id;
        $modelproduct[5] = 1;


        $productoptions = ProductOption::where('product_id', $prod['id'])->get('suboption1');
        if (sizeof($productoptions) > 0) {
            $suboption1_mainoption = Suboption::where('id', $productoptions[0]['suboption1'])->get('option_id');
            $options =  Option::where('id', $suboption1_mainoption[0]['option_id'])->get();
            $modelproduct[6] = $options[0]['title'];
        } else {
            $options = null;
        }

        $productoptions = ProductOption::where('product_id', $prod['id'])->get('suboption2');
        if (isset($productoptions[0]['suboption2'])) {
        $suboption1_mainoption = Suboption::where('id', $productoptions[0]['suboption2'])->get('option_id');
        $options =  Option::where('id', $suboption1_mainoption[0]['option_id'])->get();
        $modelproduct[7] = $options[0]['title'];
        }

        echo json_encode($modelproduct);

}

        public static function getProductGallery(Request $request){

//        $pid = $_GET["pid"];
//
//        $getGalleryQuery = $dbConnect->prepare("SELECT * FROM gallery WHERE product_id = ?");
//        $getGalleryQuery->execute([$pid]);
//        $getGalleryNum = $getGalleryQuery->rowCount();
//        $getGalleries = $getGalleryQuery->fetchAll(PDO::FETCH_ASSOC);

        $product = Product::where('id', $request->input('pid'))->get('image');

        $getGalleryQuery = Gallery::where('product_id', $request->input('pid'))->get();

        $gallery = array();
        $gallery[0] = $product[0]['image'];

        foreach ($getGalleryQuery as $key => $getGallery) {
            $gallery[$key+1] = $getGallery["image"];
        };

        echo json_encode($gallery);

    }

}
