<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PlateController extends Controller
{
    //
    public function plate_vue (){

        $plat = Plat::where('');
        return view('vitrine.plate');
    }
}
