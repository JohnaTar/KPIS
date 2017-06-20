@extends('layouts.app')

@section('content')
<style type="text/css">.notice {
    padding: 15px;
    background-color: #fafafa;
    border-left: 6px solid #7f7f84;
    margin-bottom: 10px;
    -webkit-box-shadow: 0 5px 8px -6px rgba(0,0,0,.2);
       -moz-box-shadow: 0 5px 8px -6px rgba(0,0,0,.2);
            box-shadow: 0 5px 8px -6px rgba(0,0,0,.2);
}
.notice-sm {
    padding: 10px;
    font-size: 80%;
}
.notice-lg {
    padding: 35px;
    font-size: large;
}
.notice-success {
    border-color: #80D651;
}
.notice-success>strong {
    color: #80D651;
}
.notice-info {
    border-color: #45ABCD;
}
.notice-info>strong {
    color: #45ABCD;
}
.notice-warning {
    border-color: #FEAF20;
}
.notice-warning>strong {
    color: #FEAF20;
}
.notice-danger {
    border-color: #d73814;
}
.notice-danger>strong {
    color: #d73814;
}</style>
         <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">ตารางแสดงข้อมูลพนักงาน</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            
            <a href="{{url('register')}}" class="btn btn-info btn-sm"><i class="fa fa-user-plus fa-2x" aria-hidden="true"></i> </a>
   @if ($flash =session('message'))
                 
                       
<div class="row">
    <div class="col-md-6"></div>
    <div class="col-md-6">
    <div class="notice notice-success">
        <strong>Notice</strong> : {{$flash}}
        </div>
    </div>
</div>
@endif
            <br>
            <br>


            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            ข้อมูลสมาชิก
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th>ลำดับ</th>
                                        <th>ชื่อ-นามสกุล</th>
                                        <th>ฝ่าย</th>
                                        <th>อีเมลล์</th>
                                        <th>แก้ไข</th>
                                        <th>ลบ</th>
                                    </tr>
                                </thead>
                                <tbody>  

    @foreach ($users as $user)
                               

                                    <tr>
                            @if ($user->status_id=='1')                       
                                    <td>{{ $loop->iteration}}</td>
                                    <td> {{$user->name}}</td>     
                                    <td> {{$user->dep_name}}</td>
                                    <td >{{$user->email}}</td>
                            @else
                                    <td style="color: red;"><strike>{{ $loop->iteration}}</strike></td>
                                    <td style="color: red;"><strike> {{$user->name}}</strike></td>     
                                    <td style="color: red;"><strike>{{$user->dep_name}}</strike></td>
                                    <td style="color: red;" ><strike  >{{$user->email}}</strike></td>
                             @endif      
                                        <td> <a href="{{url('edit_user/'.Crypt::encrypt($user->id))}}"><i class="fa fa-pencil-square-o fa-2x" aria-hidden="true"></i></a>
                                        </td>
                                          <td> 
                                          <a href="{{url('delete_user/'.$user->id)}}" onclick="return confirm('adasd')"><i class="fa fa-times fa-2x" aria-hidden="true"></i></a>                                      
                                          </td>
                                    </tr>
    @endforeach 
    
                                </tbody>
                            </table>
                            <!-- /.table-responsive -->
                    


                       
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
@endsection
