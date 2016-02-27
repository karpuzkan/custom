<?php

namespace App\Http\Controllers\Custom;

use App\Http\Controllers;
use App\Http\Controllers\Controller;

class CustomController extends Controller{

    public function index()
    {
        return view('custom_index');
    }
}