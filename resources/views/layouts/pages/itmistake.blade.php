@extends('layouts.app')

@section('content')
 <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Add Mistake : IT</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-danger">
                <div class="panel-heading">ข้อผิดพลาด</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ route('it.store') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('date') ? ' has-error' : '' }}">
                            <label for="date" class="col-md-4 control-label">วัน/เดือน/ปี</label>

                            <div class="col-md-6">
                                <input id="datepicker" type="text" class="form-control" name="date" value="{{ old('date') }}" required="" >

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
                                <textarea rows="7" class="form-control" name="mistake"  >{{ old('mistake') }}</textarea>

                                @if ($errors->has('mistake'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('mistake') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('notice') ? ' has-error' : '' }}">
                            <label for="notice" class="col-md-4 control-label">หมายเหตุ</label>

                            <div class="col-md-6">
                                <input  type="text" class="form-control" name="notice" >

                                @if ($errors->has('notice'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('notice') }}</strong>
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
