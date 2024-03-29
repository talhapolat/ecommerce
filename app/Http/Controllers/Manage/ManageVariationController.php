<?php

namespace App\Http\Controllers\Manage;

use App\Http\Controllers\Controller;
use App\Option;
use App\Suboption;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ManageVariationController extends Controller
{
    public function index(){

        $options = Option::all();

        $suboptions= Suboption::all();


        return view('layouts.manage.managevariations', compact('options', 'suboptions'));
    }

    public function options($id){

        $options= Suboption::all()->where('option_id', $id);
        $mainoption = Option::all()->where('id', $id)->first();


        return view('layouts.manage.manageoptions', compact('options', 'mainoption'));
    }

    public function editvariation($id){

        $variation = Option::all()->where('id', $id)->first();
        $options = Suboption::all()->where('option_id', $id);

        return view('layouts.manage.managevariationsedit', compact('variation', 'options'));
    }

    public function createvariation(Request $request) {

        if ($request != null) {
            DB::table('options')->updateOrInsert([
                'title' => $request->input('variant_title')
            ], [
                'statu' => 1
            ]);
            $lastId = DB::table('options')->where('title', $request->input('variant_title'))->first();
        }

        return response()->json($lastId->id);
    }

    public function deletevariation(Request $request){

        if ($request != null) {
            DB::table('options')->where('id', $request->input('variant_id'))->delete();
            DB::table('suboptions')->where('option_id', $request->input('variant_id'))->delete();
        }

        return response()->json('ok');

    }

    public function newoption($id) {

        $variation = Option::all()->where('id', $id)->first();

        return view('layouts.manage.manageoptionsnew', compact('variation'));

    }

    public function createoption(Request $request) {

        $variation = Option::all()->where('id', $request->input('variation_id'))->first();

        if ($variation != null) {
            DB::table('suboptions')->updateOrInsert([
                'option_id' => $variation->id,
                'title' => $request->input('option_title')
            ], [
                'statu' => 1
            ]);
        }

        return response()->json($variation->title);
    }

    public function deleteoption(Request $request) {

        $suboption = Suboption::all()->where('id', $request->input('option_id'))->first();

        if ($suboption != null) {
            DB::table('suboptions')->where('id', $suboption->id)->delete();
        }

        return response()->json($suboption->title);
    }

    public function updatevariation(Request $request) {

        $variation = Option::all()->where('id', $request->input('variant_id'))->first();

        if ($variation != null) {
            DB::table('options')->where('id', $request->input('variant_id'))->update([
                'title' => $request->input('variation_title'),
                'updated_at' => now()
            ]);
        }

        return response()->json($request->input('variation_title'));
    }
}
