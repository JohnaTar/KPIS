@extends('layouts.app')

@section('content')

         <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">ข้อผิดพลาดฝ่าย IT</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <a href="{{url('itmistake')}}"><i class="fa fa-exclamation-circle fa-2x" aria-hidden="true"></i> : Add mistake</a>
<br>
<br>
 
 <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-danger">
                      <div class="panel-heading">
                            ข้อมูลสมาชิก
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th>ลำดับ</th>
                                        <th>วัน/เดือน/ปี</th>
                                        <th>ข้อผิดพลาด</th>
                                        <th>เพิ่มข้อมูลโดย</th>
                                        <th>แก้ไข</th>
                                        <th>ลบ</th>
                                    </tr>
                                </thead>
                                <tbody>  
                                	   <tr>
                                	   	<td>1</td>
                                	   	<td>12/03/60</td>
                                	   	<td>นอน</td>
                                	   	<td>ต้า</td>
                                	   	<td>แก้ไข</td>
                                	   	<td>ลบ</td>
                                	   </tr>
                                	   <tr>
                                	   	<td>1</td>
                                	   	<td>12/03/60</td>
                                	   	<td>นอน</td>
                                	   	<td>ต้า</td>
                                	   	<td>แก้ไข</td>
                                	   	<td>ลบ</td>
                                	   </tr>

  
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
