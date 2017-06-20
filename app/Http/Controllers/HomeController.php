<?php
use Illuminate\Support\Facades\Auth;
namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\User;
use App\Department;
use App\Historylog;
use Illuminate\Support\Facades\Crypt;

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
        ->orderBy('status_id','asc')
        ->join('departments',function($join){
            $join->on('users.dep_id','=','departments.dep_id');
        })
        ->get();
             return view('layouts.pages.table',['users'=>$users]);
    }
    public function delete($id){

      /*User::find($id)->delete();*/
      session()->flash('message','ลบข้อมูลพนักงานเรียบร้อย');
      return redirect('table');
    }
    public function edit($id){
        $tar =Crypt::decrypt($id);
        
          $users =DB::table('users')
        ->where('id',$tar)
        ->get();
 
         return view('layouts.pages.editdata',['data'=>$users]);
    }
    public function save_edit(Request $request){

            $this->validate(request(),
                [
              'name' => 'required|string|max:255',
              'email' => 'required|string|email|max:255',
              'department' =>'required',
             'status' =>'required',
                ]);
            $flight =User::find($request['userid']);
            $flight->name=$request['name'];
            $flight->email=$request['email'];
            $flight->dep_id=$request['department'];
            $flight->status_id=$request['status'];
            $flight->save();

            $flights = new Historylog;
            $flights->user_id = $request['who_edit'];
            $flights->action ="has edit user ".$request['name']."  in the system at'";
            $flights->save();

            session()->flash('message','แก้ไขข้อมูลพนักงานเรียบร้อย');
            return redirect('table');

           
        


    }
}
