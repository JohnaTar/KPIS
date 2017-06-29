<?php
use Illuminate\Support\Facades\Auth;
namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\User;
use App\Department;
use App\Historylog;
use Illuminate\Support\Facades\Crypt;
use Yajra\Datatables\Datatables;
use Alert;
use Session;

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
      $data =User::where('status_id',1)->count();
        return view('layouts.pages.home',['data'=>$data]);
    }
    public function get_user_table()
    {

      $users =DB::table('users')
        ->join('departments',function($join){
            $join->on('users.dep_id','=','departments.dep_id');
        })
        ->get();
            return Datatables::of($users)
            ->addColumn('action',function($user){
              return '<a href="edit_user/'.Crypt::encrypt($user->id).'" ><i class="fa fa-pencil-square-o fa-2x" aria-hidden="true"></i></a>';
            })
         ->setRowClass(function ($users) {
                return $users->status_id == 1 ? '' : 'alert-danger';
            })

            ->make(true);

             /*return view('layouts.pages.table',['users'=>$users]);*/
    }

    public function table(){
        return view('layouts.pages.table');
    
    }

    public function delete($id){

      /*User::find($id)->delete();*/
      session()->flash('message','Completed!');
      return redirect('table');
    }
    public function edit($id){
        $tar =Crypt::decrypt($id);
        
          $users =DB::table('users')
        ->where('id',$tar)
        ->get();
         $data = Department::all();
 
         return view('layouts.pages.editdata',['data'=>$users],['dep'=>$data]);
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

          alert()->success('Completed!');
    /*alert()->success('แก้ไขข้อมูลพนักงานเรียบร้อย');*/
            return redirect('table');

           
     


    }
}
