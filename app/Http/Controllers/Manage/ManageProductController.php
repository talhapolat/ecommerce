<?php

namespace App\Http\Controllers\Manage;

use App\Category;
use App\Gallery;
use App\Http\Controllers\Controller;
use App\Models\Brands;
use App\Models\images;
use App\Models\Medias;
use App\Models\product_tags;
use App\Models\Tags;
use App\Option;
use App\Product;
use App\ProductCategory;
use App\ProductMedia;
use App\ProductOption;
use App\Suboption;
use Brian2694\Toastr\Facades\Toastr;
use Doctrine\DBAL\Schema\Table;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use JavaScript;
use Nette\Utils\Image;

class ManageProductController extends Controller
{
    public function index(){

        $products = Product::all();


        return view('layouts.manage.manageproducts', compact('products'));
    }

    public function newproduct(){

        $images = Gallery::where('product_id', 9)->get();
        $categories = Category::where('statu', 1,'main_category_id', null)->get();
        $subcategories = Category::where('statu', 1)->whereNotNull('main_category_id')->get();
        $categoriesalone = Category::where('statu', 1)->where('main_category_id', null);
        $tags = Tags::where('statu', 1)->get();

        $options = Option::where('statu', 1)->get();
        $suboptions = Suboption::where('statu', 1)->get();


        return view('layouts.manage.manageproductsnew', compact('images', 'categories', 'subcategories', 'tags', 'options', 'suboptions'));
    }

    public function createproduct(Request $request)
    {

//        $data = $request->validate([
//            'name' => 'required',
//            'email' => 'required|email|unique:users',
//            'password' => 'required'
//        ]);


        $newid = DB::table('products')->insertGetId([
            'title' => $request->input('product_title'),
            'price' => $request->input('product_price'),
            'sale_price' => $request->input('product_sale_price'),
            'longDesc' => $request->input('editor'),
            'slug' => $request->input('product_slug'),
            'brand_id' => $request->input('product_brand'),
//            'product_keyword' => $request->input('product_keyword'),
            'product_type' => $request->input('product_type'),
            'statu' => 1,
            'created_at' => now()
        ]);

        $product_categories = $request->input('product_category');

        if ($product_categories != null){
            foreach ($product_categories as $product_category){
                DB::table('product_categories')->insert([
                    'product_id' => $newid,
                    'category_id' => $product_category
                ]);
            }
        }

        $product_tags = $request->input('product_tag');

        if ($product_tags != null){
            foreach ($product_tags as $product_tag){
                DB::table('product_tags')->insert([
                    'product' => $newid,
                    'tag' => $product_tag,
                    'created_at' => now()
                ]);
            }
        }

        $var = $request->variations;

        if ($var != null) {
            $suboptions = Suboption::whereIn('id', $var)->get('option_id')->pluck('option_id')->toArray();
            $options = Option::whereIn('id', $suboptions)->get('id')->pluck('id')->toArray();
            $tempStr = implode(',', $options);
            $optionscnt = count($options);
            $cnt = 0;

            while ($cnt < $optionscnt) {
                $suboptionarray[$cnt] = Suboption::whereIn('id', $var)->where('option_id', $options[$cnt])->get();
                $cnt++;
            }

            $cnt = 0;
            if ($optionscnt == 0)
                info('No option');
            elseif ($optionscnt == 1)
                while($cnt < count($suboptionarray[0])){
                    DB::table('product_options')->insert([
                        'product_id' => $newid,
                        'suboption1' => $suboptionarray[0][$cnt]['id'],
                        'no' => $cnt
                    ]);
                    $cnt++;
                }
            elseif ($optionscnt == 2) {
                while($cnt < count($suboptionarray[0])){
                    $cntt = 0;
                    while ($cntt < count($suboptionarray[1])){
                        DB::table('product_options')->insert([
                            'product_id' => $newid,
                            'suboption1' => $suboptionarray[0][$cnt]['id'],
                            'suboption2' => $suboptionarray[1][$cntt]['id'],
                            'no' => $cntt
                        ]);
                        $cntt++;
                    }
                    $cnt++;
                }
            }
            elseif ($optionscnt == 3)
                info('3 option');
        }



        return response()->json($newid);

    }

    public static function insertnewproductimage(Request $request){

        //$lastproduct = Product::all()->last()->get();
        //$lastmedia = images::all()->last();
        //$options = ProductOption::where('product_id', $lastproduct->id)->get();

            DB::table('product_media')->insert([
                'product_id' => '55',
                'option_id' => '45',
                'media_id' => '999',
                'no' => '5',
                'created_at' => now()
            ]);

    }

    public function editproduct($id){

        $product = Product::where('id', $id)->first();

        if ($product == null)
            return redirect()->route('manageproducts');

        $images = ProductMedia::where('product_id', $id)->orderBy('no')->join('images', 'product_media.media_id', '=', 'images.id')->get();

        $product_options = ProductOption::where('product_id', $id)->get('suboption1')->pluck('suboption1')->toArray();
        $product_options2 = ProductOption::where('product_id', $id)->get('suboption2')->pluck('suboption2')->toArray();

        $options = Option::all();
        $suboptions = Suboption::where('statu', 1)->get();
        $psuboptions = Suboption::whereIn('id', $product_options)->orwhereIn('id', $product_options2)->get('id')->pluck('id')->toArray();

        $categories = Category::where('statu', 1,'main_category_id', null)->get();
        $pcategoriesid = ProductCategory::where('product_id', $id)->get()->pluck('category_id')->toArray();
        $temp = implode('","', $pcategoriesid);
        $pcategoriesidd = '["'.$temp .'"]';

        $subcategories = Category::where('statu', 1)->whereNotNull('main_category_id')->get();
        $tags = Tags::where('statu', 1)->get();

        $ptagsid = product_tags::where('product', $id)->get()->pluck('tag')->toArray();

        $brands = Brands::all();

        //return $ptagsid;



        return view('layouts.manage.manageproductsedit', compact('brands', 'product', 'images', 'options', 'suboptions', 'psuboptions', 'categories', 'pcategoriesid', 'pcategoriesidd', 'subcategories', 'tags', 'ptagsid'));

    }

    public function updateproduct($id, Request $request){

        $product = Product::where('id', $id)->first();

        if ($product == null){
            return response()->json("Ürün bulunamadı");
        }

        $product_media = ProductMedia::where('product_id', $id)->get('media_id');

        $images = images::whereIn('id', $product_media)->get();

        $firstpm = ProductMedia::where('product_id', $id)->orderBy('no')->first();


        if ($firstpm != null){
            $firstimgg = images::where('id', $firstpm->media_id)->first();
            $firstimg = $firstimgg->img_name;
        } else
            $firstimg = null;

        $product_options = ProductOption::where('product_id', $id)->get('suboption1')->pluck('suboption1')->toArray();
        $product_options2 = ProductOption::where('product_id', $id)->get('suboption2')->pluck('suboption2')->toArray();

        $options = Option::all();
        $suboptions = Suboption::where('statu', 1)->get();
        $psuboptions = Suboption::whereIn('id', $product_options)->orwhereIn('id', $product_options2)->get('id')->pluck('id')->toArray();

        $categories = Category::where('statu', 1,'main_category_id', null)->get();
        $pcategoriesid = ProductCategory::where('product_id', $id)->get()->pluck('category_id')->toArray();
        $temp = implode('","', $pcategoriesid);
        $pcategoriesidd = '["'.$temp .'"]';


        $subcategories = Category::where('statu', 1)->whereNotNull('main_category_id')->get();
        $tags = Tags::where('statu', 1)->get();

        $ptagsid = product_tags::where('product', $id)->get()->pluck('tag')->toArray();

        $brands = Brands::all();


        $newid = DB::table('products')->where('id', $product->id)->update([
            'title' => $request->input('product_title'),
            'image' => $firstimg,
            'price' => $request->input('product_price'),
            'sale_price' => $request->input('product_sale_price'),
            'longDesc' => $request->input('editor'),
            'slug' => $request->input('product_slug'),
            'brand_id' => $request->input('product_brand'),
            'product_type' => $request->input('product_type'),
//            'product_keyword' => $request->input('product_keyword'),
            'statu' => 1
        ]);

        $product_categories = $request->input('product_category');

        if ($product_categories != null){
            foreach ($product_categories as $product_category){
                DB::table('product_categories')->updateOrInsert([
                    'product_id' => $product->id,
                    'category_id' => $product_category,
                ]);
            }
        }


        $product_tags = $request->input('product_tag');

        if ($product_tags != null){
            foreach ($product_tags as $product_tag){
                DB::table('product_tags')->updateOrInsert([
                    'product' => $product->id,
                    'tag' => $product_tag,
                ]);
            }
        }


        $var = $request->variations;
        if ($var != null) {
            $suboptions = Suboption::whereIn('id', $var)->get('option_id')->pluck('option_id')->toArray();
            $options = Option::whereIn('id', $suboptions)->get('id')->pluck('id')->toArray();
            $tempStr = implode(',', $options);
            $optionscnt = count($options);
            $cnt = 0;

            DB::table('product_options')->where('product_id', $product->id)->delete();

            while ($cnt < $optionscnt) {
                $suboptionarray[$cnt] = Suboption::whereIn('id', $var)->where('option_id', $options[$cnt])->get();
                $cnt++;
            }

            $cnt = 0;
            if ($optionscnt == 0)
                info('No option');
            elseif ($optionscnt == 1)
                while ($cnt < count($suboptionarray[0])) {
                    $optid = DB::table('product_options')->updateOrInsert([
                        'product_id' => $product->id,
                        'suboption1' => $suboptionarray[0][$cnt]['id']
                    ], [
                        'no' => $cnt
                    ]);
                    $cnt++;
                }
            elseif ($optionscnt == 2) {
                while ($cnt < count($suboptionarray[0])) {
                    $cntt = 0;
                    while ($cntt < count($suboptionarray[1])) {
                        $optid = DB::table('product_options')->updateOrInsert([
                            'product_id' => $product->id,
                            'suboption1' => $suboptionarray[0][$cnt]['id'],
                            'suboption2' => $suboptionarray[1][$cntt]['id']
                        ], [
                            'no' => $cntt
                        ]);
                        $cntt++;
                    }
                    $cnt++;
                }
            } elseif ($optionscnt == 3)
                info('3 option');
        } else {
            DB::table('product_options')->where('product_id', $product->id)->delete();
        }

        $productmainoptions = ProductOption::where('product_id', $product->id)->get('suboption1')->toArray();
        $productmedias = ProductMedia::where('product_id', $product->id)->get('media_id')->toArray();
        $productimages = Images::whereIn('id', $productmedias)->get('id')->toArray();

        DB::table('product_media')->where('product_id', $product->id)->delete();

        if ($productmainoptions != null) {
            foreach ($productmainoptions as $productmainoption) {
                foreach ($productimages as $productimage) {
                    DB::table('product_media')->updateOrInsert([
                        'product_id' => $product->id,
                        'option_id' => $productmainoption["suboption1"],
                        'media_id' => $productimage["id"],
                        'no' => 1
                    ]);
                }
            }
        } else {
            foreach ($productimages as $productimage) {
                DB::table('product_media')->updateOrInsert([
                    'product_id' => $product->id,
                    'media_id' => $productimage["id"]
                ]);
            }
        }

        $imageOrders = $request->input('image_order');
        if ($imageOrders != null) {
            $r = 1;
            foreach ($imageOrders as $imageOrder) {
                DB::table('product_media')->where('product_id', $product->id)->where('media_id', $imageOrder)->update([
                    'no' => $r
                ]);
                $r = $r+1;
            }
        }

        //return $ptagsid;

        //return view('layouts.manage.manageproductsedit', compact('brands', 'product', 'images', 'options', 'suboptions', 'psuboptions', 'categories', 'pcategoriesid', 'pcategoriesidd', 'subcategories', 'tags', 'ptagsid'));

        return response()->json('ok');

    }

    public function getimage(Request $request) {

        $getimage = images::all()->where('img_name', $request->input('image_name'))->first();

        return $getimage->id;
    }

    public function deleteImage(Request $request){

        $image = images::where('img_name','LIKE', $request->input('image_id').'%')->first();

        DB::table('product_media')->where('media_id', $image->id)->delete();
        DB::table('images')->where('id', $request->input('image_id'))->delete();

        return response()->json($image->id);
    }

    public function deleteproduct($id, Request $request){

        $product = Product::all()->where('id', $id)->first();
        $product_title = $product->title;

        if ($product == null) {
            return response()->json('no');
        } else {
            DB::table('products')->where('id', $id)->delete();
            DB::table('product_media')->where('product_id', $id)->delete();
            DB::table('product_options')->where('product_id', $id)->delete();
            DB::table('product_categories')->where('product_id', $id)->delete();
            DB::table('product_tags')->where('product', $id)->delete();
            return response()->json($product_title);
        }
    }

}
