<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use App\Hrstatuses;
use App\Hrmistakes;
use App\Historylog;
use App\User;
use Alert;
use Illuminate\Support\Facades\Auth;
class HrController extends Controller
{
        public function __construct()
    {
        $this->middleware('auth');
    } 
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
      public function get_data_hr()
    {

       $data =DB::table('hrmistakes')
       ->join('users',function($join){
            $join->on('hrmistakes.user_id','=','users.id');
        })
       ->join('hrstatuses',function($join){
            $join->on('hrmistakes.mis_id','=','hrstatuses.id');
        })
        ->get();
        return Datatables::of($data)

            ->addColumn('action', function ($user) {
              return '<a href="hr/'.$user->hr_id.'/edit" ><i class="fa fa-pencil-square-o fa-2x" aria-hidden="true"></i></a> : 
             <a href="" onclick="return delete_hr('.$user->hr_id.');" ><i class="fa fa-minus-square-o fa-2x" aria-hidden="true"></i></a>';
            })
          
      
        ->make(true);

    }


    public function index()
    {

       
  
       
    
        return view('layouts.pages.hr');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        $data = Hrstatuses::all();
        $mama = User::where('dep_id',3)
                      ->where('status_id',1)
         ->get();
        

       return view('layouts.pages.hrmistake',['data'=>$data],['mama'=>$mama]);
     
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         $this->validate(request(),
                [
              'date' => 'required',
              'mistake' => 'required',
              'type' => 'required',
              'who'=>'required',
                ]);

          $data = new Hrmistakes;
          $data->date =$request['date'];
          $data->mistake=$request['mistake'];
          $data->notice=$request['notice'];
          $data->mis_id=$request['type'];
          $data->user_id=$request['who'];
          $data->save();
          $flight = new Historylog;
          $flight->user_id = Auth::user()->id;
          $flight->action ="has add mistake HR ".$request['mistake']."  in the system at";
          $flight->save();
           alert()->success('Completed!');
         
          return redirect('hr');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
         $data =Hrmistakes::find($id);
         $flight = new Historylog;
          $flight->user_id = Auth::user()->id;
          $flight->action ="has delete mistake HR ".$data->mistake."  in the system at";
          $flight->save();
           $data->delete();
           alert()->success('Deleted!');
            return redirect('hr');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data =Hrmistakes::where('hr_id',$id)
                  ->get();
        $mama = User::where('dep_id',3)
                       ->where('status_id',1)
         ->get();

         
            return view('layouts.pages.edit_hrmistake',['data'=>$data],['mama'=>$mama]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
         $this->validate(request(),
                [
              'date' => 'required',
              'mistake' => 'required',
              'type' => 'required',
              'who' => 'required',
                ]);
         $tar =Hrmistakes::find($id);
        $tar->date=$request['date'];
        $tar->mistake=$request['mistake'];
        $tar->notice=$request['notice'];
        $tar->mis_id=$request['type'];
        $tar->user_id=$request['who'];
        $tar->save();
          $flight = new Historylog;
          $flight->user_id = Auth::user()->id;
          $flight->action ="has edit mistake HR ".$request['mistake']."  in the system at";
          $flight->save();
          alert()->success('แก้ไขข้อผิดพลาดเรียบร้อย');
          return redirect('hr');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
