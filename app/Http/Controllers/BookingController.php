<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BookingController extends Controller
{
    //

    public function book_vue(){

        return view('vitrine.booking');
    }
}
