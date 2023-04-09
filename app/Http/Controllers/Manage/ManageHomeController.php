<?php

namespace App\Http\Controllers\Manage;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use TCG\Voyager\Models\Setting;

class ManageHomeController extends Controller
{
    public function index(){



        return view('layouts.manage.index');
    }

    public function settings(){

        $settings = Setting::all();


        return view('layouts.manage.managesettings', compact('settings'));
    }

    public function updatesettings(Request $request) {

        DB::table('settings')->where('key','site.title')->update([
            'value' => $request->input('store_title')
        ]);
//        DB::table('settings')->where('key','site.description')->update([
//            'value' => $request->input('')
//        ]);
        DB::table('settings')->where('key','site.statu')->update([
            'value' => $request->input('store_statu')
        ]);
        DB::table('settings')->where('key','site.language')->update([
            'value' => $request->input('language')
        ]);
        DB::table('settings')->where('key','site.currency')->update([
            'value' => $request->input('currency')
        ]);
        DB::table('settings')->where('key','site.phone')->update([
            'value' => $request->input('phone')
        ]);
        DB::table('settings')->where('key','site.description')->update([
            'value' => $request->input('description')
        ]);
        DB::table('settings')->where('key','site.name')->update([
            'value' => $request->input('address_name')
        ]);
        DB::table('settings')->where('key','site.surname')->update([
            'value' => $request->input('address_surname')
        ]);
        DB::table('settings')->where('key','site.companyname')->update([
            'value' => $request->input('company_title')
        ]);
        DB::table('settings')->where('key','site.taxnumber')->update([
            'value' => $request->input('tax_number')
        ]);
        DB::table('settings')->where('key','site.taxoffice')->update([
            'value' => $request->input('tax_office')
        ]);
        DB::table('settings')->where('key','site.country')->update([
            'value' => $request->input('address_country')
        ]);
        DB::table('settings')->where('key','site.city')->update([
            'value' => $request->input('address_city')
        ]);
        DB::table('settings')->where('key','site.district')->update([
            'value' => $request->input('address_district')
        ]);
        DB::table('settings')->where('key','site.address')->update([
            'value' => $request->input('full_address')
        ]);
        DB::table('settings')->where('key','site.postcode')->update([
            'value' => $request->input('postcode')
        ]);

        return response()->json('ok');



    }
}
