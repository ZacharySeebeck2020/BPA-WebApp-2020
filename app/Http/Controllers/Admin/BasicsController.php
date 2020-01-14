<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BasicsController extends Controller
{

    /**
     * Return the administration index/dashboard page.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        return view('admin.index');
    }
}
