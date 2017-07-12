@extends('layouts.app')

@section('content')
@include('sweet::alert')
         <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">ข้อผิดพลาดฝ่าย IT</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
               <div class="row">
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-red">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-thumb-tack fa-5x"></i>
                                </div>

                                <div class="col-xs-9 text-right">
                                    <div class="huge"><c></c></div>
                                    <div>ข้อผิดพลาดในงาน</div>
                                </div>
                            </div>
                        </div>
                        <a href="">
                            <div class="panel-footer">
                              <!--   <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span> -->
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>

         
            <a href="{{url('it/create')}}"><i class="fa fa-exclamation-circle fa-2x" aria-hidden="true"></i> : Add mistake</a>
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
                    <div class="panel panel-danger">
                      <div class="panel-heading">
                            ข้อมูลความผิดพลาด 
                        </div>

                        <!-- /.panel-heading -->
                        <div class="panel-body">
                        <div class="table-responsive">
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                          
                                         <th style="width: 100px">วัน/เดือน/ปี</th>
                                        <th>ข้อผิดพลาด</th>
                                        <th>หมายเหตุ</th>
                                        <th>เพิ่มข้อมูลโดย</th>
                                        <th style="width: 100px">เมนู</th>
                             
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
            'iDisplayLength':25,
            dom: 'lrtip',

            ajax: 'http://192.168.1.16/KPIs/public/get_it_table',
            columns: [         
            {data: 'date',
    "render": function (data) {
        var date = new Date(data);
        var month = date.getMonth() + 1;
        return  date.getDate() + "/" +(month.length > 1 ? month : "0" + month) + "/" + date.getFullYear();
    }
},
            {data: 'mistake'},
            {data: 'notice'},
            {data: 'name'},
            {data:'action',orderable:false} , 
        ],

     });  
         $('#table-filter').on('change', function(){
       table.search(this.value).draw();  
          $.ajax({
        url:"check.php",
        data:'IT='+$('#table-filter').val(),
        type:'POST',
/*        dataType:'json',*/
        success:function(data){
        $('c').text(data);
      
               
           
        }
       });   
    });

});
      

function delete_it(id){
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
 window.location = 'it/' + tar;

});
  return false;
}





</script>


    
@endsection
