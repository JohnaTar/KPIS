<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use Illuminate\Support\Facades\Auth;
use App\Accstatuses;
use App\Accmistake;
use App\Historylog;

class AccController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function get_data_acc()
    {

       $data =DB::table('accmistakes')
       ->join('users',function($join){
            $join->on('accmistakes.add_id','=','users.id');
        })
        ->join('accstatuses',function($join){
            $join->on('accmistakes.mis_id','=','accstatuses.id');
        })
    
        ->get();
        return Datatables::of($data)
           ->addColumn('action', function ($user) {
              return '<a href="acc/'.$user->acc_id.'/edit" ><i class="fa fa-pencil-square-o fa-2x" aria-hidden="true"></i></a> : 
             <a href="" onclick="return delete_hr('.$user->acc_id.');" ><i class="fa fa-minus-square-o fa-2x" aria-hidden="true"></i></a>';

            })
       
        ->make(true);
        
    }


    public function index()
    {
        $in =Accmistake::where('mis_id',1)->count();
        $out =Accmistake::where('mis_id',2)->count();
        $wrong =Accmistake::where('mis_id',3)->count();
        $data =array('in'=>$in,'out'=>$out,'wrong'=>$wrong);
       
        return view('layouts.pages.acc',['data'=>$data]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data =Accstatuses::all();
            return view('layouts.pages.accmistake',['data'=>$data]);
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
              'who_add'=>'required',
                ]);
         $data = new Accmistake;
          $data->date =$request['date'];
          $data->mistake=$request['mistake'];
          $data->notice=$request['notice'];
          $data->mis_id=$request['type'];
          $data->add_id=$request['who_add'];
          $data->save();
          $flight = new Historylog;
          $flight->user_id = Auth::user()->id;
          $flight->action ="has add mistake ACC ".$request['mistake']."  in the system at";
          $flight->save();
          alert()->success('Completed!');
         
          return redirect('acc');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
         $data =Accmistake::find($id);
         $flight = new Historylog;
          $flight->user_id = Auth::user()->id;
          $flight->action ="has delete mistake ACC ".$data->mistake."  in the system at";
          $flight->save();
           $data->delete();
           alert()->success('Deleted!');
            return redirect('acc');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
          $data =Accmistake::where('acc_id',$id)
                  ->get();
                return view('layouts.pages.edit_accmistake',['data'=>$data]);
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
                ]);
        $tar =Accmistake::find($id);
        $tar->date=$request['date'];
        $tar->mistake=$request['mistake'];
        $tar->notice=$request['notice'];
        $tar->mis_id=$request['type'];
        $tar->save();
          $flight = new Historylog;
          $flight->user_id = Auth::user()->id;
          $flight->action ="has edit mistake ACC ".$request['mistake']."  in the system at";
          $flight->save();
            alert()->success('แก้ไขข้อผิดพลาดเรียบร้อย');
          return redirect('acc');

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
