<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('layouts.pages.home');
    }
    public function table()
    {

        $users =DB::table('users')
        ->join('departments',function($join){
            $join->on('users.dep_id','=','departments.dep_id');
        })
        ->get();
             return view('layouts.pages.table',['users'=>$users]);
    }
}
