<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BasicsController extends Controller
{
    public function landing() {
        return view('landing');
    }

    public function judges() {
        return view ('judges');
    }
}
