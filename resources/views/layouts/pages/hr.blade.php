@extends('layouts.app')

@section('content')
@include('sweet::alert')
         <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">ข้อผิดพลาดฝ่าย HR</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <a href="{{url('hr/create')}}"><i class="fa fa-exclamation-circle fa-2x" aria-hidden="true"></i> : Add mistake</a>
<br>
<br>
 <p>
    <form class="form-horizontal">
     <div class="form-group">
                <label class="col-md-4 control-label" for="selectbasic">เดือน</label>
                    <div class="col-md-3">
                    <select  id="table-filter" class="form-control input-md" >
                 <option  value="">All</option>
<option value="2017-01">มกราคม</option>
<option value="2017-02">กุมภาพันธ์</option>
<option value="2017-03">มีนาคม</option>
<option value="2017-04">เมษายน</option>
<option value="2017-05">พฤษภาคม</option>
<option value="2017-06">มิถุนายน</option>
<option value="2017-07">กรกฎาคม</option>
<option value="2017-08">สิงหาคม</option>
<option value="2017-09">กันยายน</option>
<option value="2017-10">ตุลาคม</option>
<option value="2017-11">พฤศจิกายน</option>
<option value="2017-12">ธันวาคม</option>
         
                </select>
                                 
                </div>
            </div>
</form>

 <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-success">
                      <div class="panel-heading">
                            ข้อมูลความผิดพลาด 
                        </div>

                        <!-- /.panel-heading -->
                        <div class="panel-body">
                        <div class="table-responsive">
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                       
                                        <th>วัน/เดือน/ปี</th>
                                        <th>ข้อผิดพลาด</th>
                                        <th>หมายเหตุ</th>
                                        <th>ประเภท</th>
                                        <th>เพิ่มข้อมูลโดย</th>
                                        <th>เมนู</th>
                             
                                    </tr>
                                </thead>
                           
                   
                  
                            </table>
                            <!-- /.table-responsive -->

      

                       </div>
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>

     <script type="text/javascript">
    $(function() {
        var table = $('#dataTables-example').DataTable({
            processing: true,
            serverSide: true,
            dom: 'lrtip',
            ajax: 'http://192.168.1.16/KPIs/public/get_hr_table',
            columns: [         
            {data: 'date',name:'date'},
            {data: 'mistake'},
            {data: 'notice'},
            {data: 'sta_name'},
            {data: 'name'},
            {data: 'action'},
            
        ],

     });  
         $('#table-filter').on('change', function(){
       table.search(this.value).draw();   
    });
});
    function delete_hr(id){
  swal({
  title: "Are you sure?",
  text: "You will not be able to recover this imaginary file!",
  type: "warning",
  showCancelButton: true,
  confirmButtonColor: "#DD6B55",
  confirmButtonText: "Yes, delete it!",
  closeOnConfirm: false
},
function(){
    var tar =id;
 window.location = 'hr/' + tar;

});
  return false;
}



      
</script>


    
@endsection
