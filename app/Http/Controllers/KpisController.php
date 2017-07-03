<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class KpisController extends Controller
{
    public function BPIT(){
    	return view('layouts.pages.kpis_bpit');
    }
    public function ACC(){
    	return view('layouts.pages.kpis_acc');
    }
     public function HR(){
    	return view('layouts.pages.kpis_hr');
    }
    public function IT(){
    	return view('layouts.pages.kpis_it');
    }
}
