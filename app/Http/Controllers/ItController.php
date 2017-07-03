<?php
use Illuminate\Support\Facades\Crypt;
namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Itmistakes;
use App\Historylog;
use Yajra\Datatables\Datatables;
use Illuminate\Support\Facades\DB;
use Alert;

class ItController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

public function __construct()
    {
        $this->middleware('auth');
    }

    public function get_data_it()
    {

       $data =DB::table('itmistakes')
        ->join('users',function($join){
            $join->on('itmistakes.add_id','=','users.id');
        })
        ->get();
        return Datatables::of($data)
           ->addColumn('action', function ($user) {
              return '<a href="it/'.$user->it_id.'/edit" ><i class="fa fa-pencil-square-o fa-2x" aria-hidden="true"></i></a> : 
             <a href="" onclick="return delete_it('.$user->it_id.');" ><i class="fa fa-minus-square-o fa-2x" aria-hidden="true"></i></a>';

            })
           

        ->make(true);
        
    }


    public function index()
    {
      $wrong =Itmistakes::all()->count();
      return view('layouts.pages.it',['wrong'=>$wrong]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('layouts.pages.itmistake');
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
                ]);
          $data = new Itmistakes;
          $data->date =$request['date'];
          $data->mistake=$request['mistake'];
          $data->notice=$request['notice'];
          $data->add_id=Auth::user()->id;
          $data->save();

          $flight = new Historylog;
          $flight->user_id = Auth::user()->id;
          $flight->action ="has add mistake IT ".$request['mistake']."  in the system at";
          $flight->save();
           alert()->success('Completed!');
          return redirect('it');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data =Itmistakes::find($id);
          
          $flight = new Historylog;
          $flight->user_id = Auth::user()->id;
          $flight->action ="has delete mistake IT ".$data->mistake."  in the system at";
          $flight->save();
        $data->delete();
    alert()->success('Deleted!');
            return redirect('it');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data =Itmistakes::where('it_id',$id)
             
                  ->get();
        
  
 
         return view('layouts.pages.edit_itmistake',['data'=>$data]);
        
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
                ]);
        $tar =Itmistakes::find($id);
        $tar->date=$request['date'];
        $tar->mistake=$request['mistake'];
        $tar->notice=$request['notice'];
        $tar->save();
          $flight = new Historylog;
          $flight->user_id = Auth::user()->id;
          $flight->action ="has edit mistake IT ".$request['mistake']."  in the system at";
          $flight->save();
          alert()->success('แก้ไขข้อผิดพลาดเรียบร้อย');
          return redirect('it');
    
      }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return 'destroy';
    }
}
