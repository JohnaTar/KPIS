@extends('layouts.app')

@section('content')

         <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">ตารางแสดงข้อมูลพนักงาน</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            
            <a href="{{url('register')}}" class="btn btn-info btn-sm"><i class="fa fa-user-plus fa-2x" aria-hidden="true"></i> </a>

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
                                  
                                        <td>{{ $loop->iteration}}</td>
                                        <td> {{$user->name}}</td>
                                        <td> {{$user->dep_name}}</td>
                                        <td >{{$user->email}}</td>
                                        
                                        <td> <a href=""><i class="fa fa-pencil-square-o fa-2x" aria-hidden="true"></i></a>
                                        </td>
                                          <td> <a href="" onclick="return delete_user({{$user->id}});"><i class="fa fa-times fa-2x" aria-hidden="true"></i></a>
                                          </td>
                                    </tr>
    @endforeach 
    <script type="text/javascript">
        function delete_user(id){
            if (confirm('คุณต้องการลบข้อมูลหรือไม่')) {
                    $.ajax({
                        type:'POST',
                        url:'check.php',
                        data:{user_id:id},
                        success:function(data){
                            alert(data);
                            location.reload();
                        }
                    });
        }
        return false;
    }
        
    </script>
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
