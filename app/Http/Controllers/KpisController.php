<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Alert;

class KpisController extends Controller
{
   public function __construct()
    {
        $this->middleware('auth');
    }
    public function BPIT(){
    	return view('layouts.pages.kpis_bpit');
    }
    public function ACC(){
    	if (Auth::user()->dep_id==1 || Auth::user()->dep_id==2 ||Auth::user()->dep_id==4) {
                       return view('layouts.pages.kpis_acc');
               }else{
               	   alert()->error('No Permission!');
               	return redirect('home');
               }
     	}
    
     public function HR(){
     	if (Auth::user()->dep_id==1 || Auth::user()->dep_id==2 ||Auth::user()->dep_id==3) {
                       return view('layouts.pages.kpis_hr');
               }else{
               	   alert()->error('No Permission!');
               	return redirect('home');
               }
     	}
    	
    
    public function IT(){
    	if (Auth::user()->dep_id==1 || Auth::user()->dep_id==2) {
                       return view('layouts.pages.kpis_it');
               }else{
               	   alert()->error('No Permission!');
               	return redirect('home');
               }
     	}

    
     public function outCHON(){
     	if (Auth::user()->dep_id==1 || Auth::user()->dep_id==2 ||Auth::user()->dep_id==8) {
                       return view('layouts.pages.kpis_chon');
               }else{
               	   alert()->error('No Permission!');
               	return redirect('home');
               }
     	}
    	
    
    public function outPTY(){
    	if (Auth::user()->dep_id==1 || Auth::user()->dep_id==2 ||Auth::user()->dep_id==7) {
                       return view('layouts.pages.kpis_pty');
               }else{
               	   alert()->error('No Permission!');
               	return redirect('home');
               }
     	}
    
     public function JOOM(){
     	if (Auth::user()->dep_id==1 || Auth::user()->dep_id==2) {
                       return view('layouts.pages.kpis_joom');
               }else if(Auth::user()->dep_id==3 &&Auth::user()->head=='A' ) {
                         return view('layouts.pages.kpis_joom');
               }else{
                   alert()->error('No Permission!');
                return redirect('home');
               }
      }
    	
    
    public function JEAB(){
    	if (Auth::user()->dep_id==1 || Auth::user()->dep_id==2 ) {
                       return view('layouts.pages.kpis_jeab');
               }else if(Auth::user()->dep_id==3 &&Auth::user()->head=='A' ) {
                         return view('layouts.pages.kpis_jeab');
               }else if (Auth::user()->dep_id==3 &&Auth::user()->id==11 ){
                       return view('layouts.pages.kpis_jeab');
               }else{
                alert()->error('No Permission!');
                return redirect('home');
               }
     	}
    	
    public function NAT(){
    	if (Auth::user()->dep_id==1 || Auth::user()->dep_id==2 ) {
                       return view('layouts.pages.kpis_nat');
               }else if(Auth::user()->dep_id==3 &&Auth::user()->head=='A' ) {
                         return view('layouts.pages.kpis_nat');
               }else{
               	   alert()->error('No Permission!');
               	return redirect('home');
               }
     	}
    public function MEAW(){
      if (Auth::user()->dep_id==1 || Auth::user()->dep_id==2 ) {
                       return view('layouts.pages.kpis_meaw');
               }else if(Auth::user()->dep_id==3 &&Auth::user()->head=='A' ) {
                         return view('layouts.pages.kpis_meaw');
               }else if (Auth::user()->dep_id==3 &&Auth::user()->id==12 ){
                       return view('layouts.pages.kpis_meaw');
               }else{
                alert()->error('No Permission!');
                return redirect('home');
               }            
            }
    
     public function INK(){
      if (Auth::user()->dep_id==1 || Auth::user()->dep_id==2 ) {
                       return view('layouts.pages.kpis_ink');
               }else if(Auth::user()->dep_id==3 &&Auth::user()->head=='A' ) {
                         return view('layouts.pages.kpis_ink');
               }else if (Auth::user()->dep_id==3 &&Auth::user()->id==13 ){
                       return view('layouts.pages.kpis_ink');
               }else{
                alert()->error('No Permission!');
                return redirect('home');
               }
     	}
    
    
    public function NONG(){
    	if (Auth::user()->dep_id==1 || Auth::user()->dep_id==2) {
                       return view('layouts.pages.kpis_nong');
               }else if(Auth::user()->dep_id==3 &&Auth::user()->head=='A' ) {
                         return view('layouts.pages.kpis_nong');
               }else{
               	   alert()->error('No Permission!');
               	return redirect('home');
               }
     	}
    
    
    public function BKK(){
    	
    	if (Auth::user()->dep_id==1 || Auth::user()->dep_id==2 ||Auth::user()->dep_id==6) {
                       return view('layouts.pages.kpis_bkk');
               }else{
               	   alert()->error('No Permission!');
               	return redirect('home');
               }
     	}
    
    public function PLENG(){
    	if (Auth::user()->dep_id==1 || Auth::user()->dep_id==2 ||Auth::user()->dep_id==6) {
                       return view('layouts.pages.kpis_pleng');
               }else{
               	   alert()->error('No Permission!');
               	return redirect('home');
               }
     	}
    
     public function MAY(){
    	if (Auth::user()->dep_id==1 || Auth::user()->dep_id==2 ||Auth::user()->dep_id==6) {
                       return view('layouts.pages.kpis_may');
               }else{
               	   alert()->error('No Permission!');
               	return redirect('home');
               }
     	}
      
}