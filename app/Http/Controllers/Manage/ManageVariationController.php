<?php

namespace App\Http\Controllers\Manage;

use App\Http\Controllers\Controller;
use App\Option;
use App\Suboption;

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
}
