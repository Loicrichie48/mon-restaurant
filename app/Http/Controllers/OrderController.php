<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OrderController extends Controller
{
    //
    public function  order_vue(){
        return view('vitrine.order');
    }
}
