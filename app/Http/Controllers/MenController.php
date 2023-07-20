<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MenController extends Controller
{
    //
    public function men_vue(){

        return view('vitrine.men');
    }
}
