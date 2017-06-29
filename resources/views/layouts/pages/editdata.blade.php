@extends('layouts.app')

@section('content')
 <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Edit employeee</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading"></div>
                <div class="panel-body">
@foreach ($data as $datas)

                    <form class="form-horizontal" method="POST" 
                    action="{{url('edit_user/'.Crypt::encrypt($datas->id))}}">
                        {{ csrf_field() }}
                        <input type="hidden" value="{{$datas->id}}" name="userid">
                        <input type="hidden" name="who_edit" value="{{ Auth::user()->id }}">
                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Name</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{ $datas->name}}"  autofocus>

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                          <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ $datas->email}}" >

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        

 
            <div class="form-group{{ $errors->has('department') ? ' has-error' : '' }}">
                <label class="col-md-4 control-label" for="selectbasic">Department</label>
                    <div class="col-md-5">
                    <select  name="department" class="form-control input-md" >
                    <option value ='' >--> เลือก <-- </option>
                  @foreach ($dep as $dept)
               
               <option value ='{{$dept->dep_id}}' @if($datas->dep_id==$dept->dep_id)selected @endif> {{$dept->dep_name}} </option>
   @endforeach
                  </select>
        
 
                                                                          
                                 
 
                @if ($errors->has('department'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('department') }}</strong>
                                    </span>
                        @endif
                </div>
            </div>
            <div class="form-group{{ $errors->has('status') ? ' has-error' : '' }}">
                <label class="col-md-4 control-label" for="selectbasic">Status</label>
                    <div class="col-md-4">
                    <select  name="status" class="form-control input-md" >
                    <option value ='' >--> เลือก <-- </option>
                    <option value ='1' @if ($datas->status_id=='1')selected="selected"@endif> Alive </option>
                     <option value ='2'  @if ($datas->status_id=='2')selected="selected"@endif> Resigh  </option>
                     
             </select>
        
 
          @endforeach                                                                     
                                 
 
                @if ($errors->has('status'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('status') }}</strong>
                                    </span>
                        @endif
                </div>
            </div>


                      

                     

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Save
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
