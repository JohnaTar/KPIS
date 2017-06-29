@extends('layouts.app')

@section('content')
  @include('sweet::alert')
         <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Datatable of employee</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <a href="{{url('register')}}"><i class="fa fa-user-plus fa-2x" aria-hidden="true"></i> : Add employee</a>
           
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
                         <div class="table-responsive">
                            <table width="100%" class="table  table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th>ลำดับ</th>
                                        <th>ชื่อ-นามสกุล</th>
                                        <th>ฝ่าย</th>
                                        <th>อีเมลล์</th>
                                        <th>แก้ไข</th>
                                       
                                   
                                    </tr>
                                </thead>
                                    
                                
                            </table>
                            <!-- /.table-responsive -->
                    
<script type="text/javascript">
    $(function() {
        $('#dataTables-example').DataTable({
            processing: true,
            'iDisplayLength':25,
            serverSide: true,
            ajax: 'http://192.168.1.16/KPIs/public/get_user_table',
             
            columns: [         
            {data:'id' },
            {data: 'name'},
            {data: 'dep_name'},
            {data: 'email'},
            {data:'action',orderable:false}    
        ],
        order:[[0,'asc']]

        });
    
    });

</script>

                       </div>
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
@endsection
