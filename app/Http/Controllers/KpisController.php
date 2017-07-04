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
     public function outCHON(){
    	return view('layouts.pages.kpis_chon');
    }
    public function outPTY(){
    	return view('layouts.pages.kpis_pty');
    }
     public function JOOM(){
    	return view('layouts.pages.kpis_joom');
    }
    public function JEAB(){
    	return view('layouts.pages.kpis_jeab');
    }
    public function NAT(){
    	return view('layouts.pages.kpis_nat');
    }
    public function MEAW(){
    	return view('layouts.pages.kpis_meaw');
    }
     public function INK(){
    	return view('layouts.pages.kpis_ink');
    }
    public function NONG(){
    	return view('layouts.pages.kpis_nong');
    }
    public function BKK(){
    	return view('layouts.pages.kpis_bkk');
    }
    public function PLENG(){
    	return view('layouts.pages.kpis_pleng');
    }
     public function MAY(){
    	return view('layouts.pages.kpis_may');
    }
}
