<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use Illuminate\Support\Facades\Auth;
use App\Sendemail;
use App\Historylog;
use Alert;
use Carbon\Carbon;
class EmailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $now =Carbon::now();
        $data =$now->month;
        if ($data==1) {
            $month = 'มกราคม';
        }else if ($data==2) {
            $month = 'กุมภาพันธ์';
        }else if ($data==3) {
            $month = 'มีนาคม';
        }elseif ($data==4) {
            $month = 'เมษายน';
        }elseif ($data==5) {
            $month = 'พฤษภาคม';
        }elseif ($data==6) {
            $month = 'มิถุนายน';
        }elseif ($data==7) {
            $month = 'กรกฎาคม';
        }elseif ($data==8) {
            $month = 'สิงหาคม';
        }elseif ($data==9) {
            $month = 'กันยายน';
        }elseif ($data==10) {
            $month = 'ตุลาคม';
        }elseif ($data==11) {
            $month = 'พฤศจิกายน';
        }elseif ($data==12) {
            $month = 'ธันวาคม';
        }

      $data =Sendemail::where('date',$month)->count();
        return view('layouts.pages.email',['data'=>$data]);
    }

     public function get_data_email(){
      /*  DB::statement(DB::raw('set @rownum=0'));
        $users =Sendemail::select([DB::raw('@rownum:=@rownum+1 AS rownum'),
            'date',
            'co_name',
            'email',
            'who']);*/
        $data =DB::table('sendemails')
        ->orderBy('email_id','desc')
        ->where('who',Auth::user()->id)
        ->get();

        return Datatables::of($data)
         
           ->addColumn('action', function ($user) {
              return '
             <a href="" onclick="return delete_email('.$user->email_id.');" ><i class="fa fa-minus-square-o fa-2x" aria-hidden="true"></i></a>';

            })
     
         ->make(true);

    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('layouts.pages.sendmail');
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
              'month' => 'required',
              'name' => 'required',
              'email'=>'required',
                ]);
          $data = new Sendemail;
          $data->date =$request['month'];
          $data->co_name=$request['name'];
          $data->email=$request['email'];
          $data->who=Auth::user()->id;
          $data->save();
          $flight = new Historylog;
          $flight->user_id = Auth::user()->id;
          $flight->action ="has add email ".$request['name']."  in the system at";
          $flight->save();
             alert()->success('Completed!');
         
          return redirect('email');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data =Sendemail::find($id);
         $flight = new Historylog;
          $flight->user_id = Auth::user()->id;
          $flight->action ="has delete email ".$data->co_name."  in the system at";
          $flight->save();
           $data->delete();
           alert()->success('Deleted!');
            return redirect('email');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
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
