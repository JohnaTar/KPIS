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
                    <h1 class="page-header">Datatable of employee</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <a href="{{url('register')}}"><i class="fa fa-user-plus fa-2x" aria-hidden="true"></i> : Add employee</a>
           
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
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
@endsection
