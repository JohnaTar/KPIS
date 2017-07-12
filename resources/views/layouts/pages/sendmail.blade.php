@extends('layouts.app')

@section('content')
 <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Send Email : HR</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-success">
                <div class="panel-heading">email</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ route('email.store') }}">
                        {{ csrf_field() }}

       
                <div class="form-group{{ $errors->has('month') ? ' has-error' : '' }}">
                <label class="col-md-4 control-label" for="selectbasic">เดือน</label>
                    <div class="col-md-4">
                    <select  name="month" class="form-control input-md" >
                    <option value ='' >--> เลือก <-- </option>
                     <option value ='1' >มกราคม</option>
                     <option value ='2' >กุมภาพันธ์</option>
                     <option value ='3' >มีนาคม</option>
                     <option value ='4' >เมษายน</option>
                     <option value ='5' >พฤษภาคม</option>
                     <option value ='6' >มิถุนายน</option>
                     <option value ='7' >กรกฎาคม</option>
                     <option value ='8' >สิงหาคม</option>
                     <option value ='9' >กันยายน</option>
                      <option value ='10' >ตุลาคม</option>
                       <option value ='11' >พฤศจิกายน</option>
                        <option value ='12' >ธันวาคม</option>
  
        </select>
             @if ($errors->has('month'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('month') }}</strong>
                                    </span>
                        @endif
                </div>
            </div>
                   <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">ชื่อ / บริษัท</label>

                            <div class="col-md-6">
                                <input  type="text" class="form-control" name="name" value="{{ old('name') }}">

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">อีเมลล์</label>

                            <div class="col-md-6">
                                <input  type="text" class="form-control" name="email" value="{{ old('email') }}">

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
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
