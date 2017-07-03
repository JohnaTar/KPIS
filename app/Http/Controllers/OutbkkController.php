<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use App\Outbkkstatus;
use App\User;
use App\Outbkkmistake;
use App\Historylog;
use Illuminate\Support\Facades\Auth;
class OutbkkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function get_data_outbkk(){
        $data =DB::table('outbkkmistakes')
         ->join('users',function($join){
            $join->on('outbkkmistakes.user_id','=','users.id');
        })
            ->join('outbkkstatuses',function($join){
            $join->on('outbkkmistakes.mis_id','=','outbkkstatuses.id');
        })
          ->get();
        return Datatables::of($data)
          ->addColumn('action', function ($user) {
              return '<a href="outBKK/'.$user->bkk_id.'/edit" ><i class="fa fa-pencil-square-o fa-2x" aria-hidden="true"></i></a> : 
             <a href="" onclick="return delete_hr('.$user->bkk_id.');" ><i class="fa fa-minus-square-o fa-2x" aria-hidden="true"></i></a>';

            })
         ->make(true);

    }
    public function index()
    {   
        $data =Outbkkmistake::Where('mis_id',1)->count();
        $datas =Outbkkmistake::Where('mis_id',2)->count();
        $tar =array('data'=>$data,'datas'=>$datas);
        return view('layouts.pages.outbkk',['tar'=>$tar]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        $data = Outbkkstatus::all();
          $mama = User::where('dep_id',6)
                      ->where('status_id',1)
         ->get();
        return view('layouts.pages.outbkkmistake',['data'=>$data],['mama'=>$mama]);
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
         $data = new Outbkkmistake;
          $data->date =$request['date'];
          $data->mistake=$request['mistake'];
          $data->notice=$request['notice'];
          $data->mis_id=$request['type'];
          $data->user_id=$request['who'];
          $data->save();
          $flight = new Historylog;
          $flight->user_id = Auth::user()->id;
          $flight->action ="has add mistake outBKK ".$request['mistake']."  in the system at";
          $flight->save();
             alert()->success('Completed!');
         
          return redirect('outBKK');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
         $data =Outbkkmistake::find($id);
         $flight = new Historylog;
          $flight->user_id = Auth::user()->id;
          $flight->action ="has delete mistake outBKK ".$data->mistake."  in the system at";
          $flight->save();
           $data->delete();
           alert()->success('Deleted!');
            return redirect('outBKK');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
          $data =Outbkkmistake::where('bkk_id',$id)
                  ->get();
         $mama = User::where('dep_id',6)
                        ->where('status_id',1)
         ->get();

        return view('layouts.pages.edit_bkkmistake',['data'=>$data],['mama'=>$mama]);
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
              'who'=>'required',
                ]);
        $tar =Outbkkmistake::find($id);
        $tar->date=$request['date'];
        $tar->mistake=$request['mistake'];
        $tar->notice=$request['notice'];
        $tar->mis_id=$request['type'];
        $tar->user_id=$request['who'];
        $tar->save();
         $flight = new Historylog;
          $flight->user_id = Auth::user()->id;
          $flight->action ="has edit mistake outBKK ".$request['mistake']."  in the system at";
          $flight->save();
             alert()->success('Completed!');
         
          return redirect('outBKK');

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
