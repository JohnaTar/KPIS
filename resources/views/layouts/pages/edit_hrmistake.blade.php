@extends('layouts.app')

@section('content')
 <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Edit Mistake : HR</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-info">
                <div class="panel-heading">แก้ไขข้อผิดพลาด</div>
                <div class="panel-body">
@foreach ($data as $datas)
                    <form class="form-horizontal" role="form" method="POST" action="{{ action('HrController@update',['id'=>$datas->hr_id])}}" >
                        {{ csrf_field() }}

                        <input type="hidden" name="_method" value ="PUT">
                        <div class="form-group{{ $errors->has('date') ? ' has-error' : '' }}">
                            <label for="date" class="col-md-4 control-label">วัน/เดือน/ปี</label>

                            <div class="col-md-6">
                                <input id="datepicker" type="text" class="form-control" name="date" value="{{$datas->date}}" required >

                                @if ($errors->has('date'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('date') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
    

                        <div class="form-group{{ $errors->has('mistake') ? ' has-error' : '' }}">
                            <label for="mistake" class="col-md-4 control-label">ข้อผิดพลาด</label>

                            <div class="col-md-6">
                                <textarea rows="7" class="form-control" name="mistake" >{{$datas->mistake}} </textarea>

                                @if ($errors->has('mistake'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('mistake') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                          <div class="form-group{{ $errors->has('type') ? ' has-error' : '' }}">
                <label class="col-md-4 control-label" for="selectbasic">ประเภท</label>
                    <div class="col-md-4">
                    <select  name="type" class="form-control input-md" >
                    <option value ='' >--> เลือก <-- </option>
                    <option value ='1' @if ($datas->mis_id=='1')selected="selected"@endif> ข้อผิดพลาดในงาน </option>
                     <option value ='2'  @if ($datas->mis_id=='2')selected="selected"@endif> payroll ผิด  </option>
                     <option value ='3'  @if ($datas->mis_id=='3')selected="selected"@endif> จัดซื้อ จัดจ้าง จัดซ่อม </option>
                     
             </select>
        
 
                                                                          
                                 
 
                @if ($errors->has('type'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('type') }}</strong>
                                    </span>
                        @endif
                </div>
            </div>

                        <div class="form-group{{ $errors->has('notice') ? ' has-error' : '' }}">
                            <label for="notice" class="col-md-4 control-label">หมายเหตุ</label>

                            <div class="col-md-6">
                                <input  type="text" class="form-control" name="notice" value="{{$datas->notice}} ">

                                @if ($errors->has('notice'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('notice') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        
@endforeach
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
<script type="text/javascript">

  $( function() {
    $( "#datepicker" ).datepicker({
      changeMonth: true,
      changeYear: true,
      dateFormat:"yy-mm-dd"
    });
  } );
  </script>
@endsection
