<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class VitrineController extends Controller
{
    //
    public function vitrine_vue(){
        return view('vitrine.accueil');
    }
}
