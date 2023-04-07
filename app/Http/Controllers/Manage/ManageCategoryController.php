<?php

namespace App\Http\Controllers\Manage;

use App\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ManageCategoryController extends Controller
{
    public function index(){

        $categories = Category::all()->where('statu', 1);

        $maincategories = Category::all()->where('main_category_id', null);


        return view('layouts.manage.managecategories', compact('categories', 'maincategories'));
    }

    public function newcategory(){

        $categories = Category::all()->where('statu', 1);

        $maincategories = Category::all()->where('main_category_id', null);

        return view('layouts.manage.managecategoriesnew', compact('categories', 'maincategories'));
    }

    public function editcategory($id){

        $category = Category::all()->where('id',$id)->first();

        $categories = Category::all()->where('statu', 1);
        $maincategories = Category::all()->where('main_category_id', null)->where('statu', 1);

        return view('layouts.manage.managecategoriesedit', compact('category', 'categories', 'maincategories'));

    }

    public function updatecategory($id, Request $request){

        $category = Category::where('id', $id)->first();

        if ($category == null){
            return response()->json('no');
        }

        DB::table('categories')->where('id', $id)->update([
            'name' => $request->input('category_title'),
            'statu' => $request->input('category_statu'),
//            'descripion' => $request->input('editor'),
            'main_category_id' => $request->input('main_category'),
            'slug' => $request->input('category_slug')
        ]);

        return response()->json('ok');

    }

    public function createcategory(Request $request){

        $newId = DB::table('categories')->insertGetId([
            'name' => $request->input('category_title'),
            'statu' => $request->input('category_statu'),
//            'descripion' => $request->input('editor'),
            'main_category_id' => $request->input('main_category'),
            'slug' => $request->input('category_slug')
        ]);

        return response()->json($newId);
    }

    public function deletecategory($id, Request $request){

        $category = Category::all()->where('id', $request->input('category_id'));
        if ($category != null) {
            DB::table('categories')->where('id', $request->input('category_id'))->delete();
            return response()->json('Kategori silindi.');
        } else {
            return response()->json('Kategori bulunamadı.');
        }
    }
}
