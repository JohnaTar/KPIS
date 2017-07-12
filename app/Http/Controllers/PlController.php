<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PlController extends Controller
{
    public function index(){
    	return view ('layouts.pages.p&l');
    }
}
