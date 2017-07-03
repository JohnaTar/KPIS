@extends('layouts.app')

@section('content')
@include('sweet::alert')
         <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">ประวัติการส่งเมลล์ : {{ Auth::user()->name }}</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <div class="row">
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-green">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-paper-plane fa-5x"></i>
                                </div>

                                <div class="col-xs-9 text-right">
                                    <div class="huge">{{$data}}</div>
                                    <div>Sent Items</div>
                                </div>
                            </div>
                        </div>
                        <a  href="{{url('email')}}" >
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                
            </div>
               
            <a href="{{url('email/create')}}"><i class="fa fa-exclamation-circle fa-2x" aria-hidden="true"></i> : Add email</a>
<br>
<br>
 <p>
    <form class="form-horizontal">
     <div class="form-group">
                <label class="col-md-4 control-label" for="selectbasic">เดือน</label>
                    <div class="col-md-3">
                    <select  id="table-filter" class="form-control input-md" >
                 <option  value="">All</option>

<option value="มกราคม">มกราคม</option>
<option value="กุมภาพันธ์">กุมภาพันธ์</option>
<option value="มีนาคม">มีนาคม</option>
<option value="เมษายน">เมษายน</option>
<option value="พฤษภาคม">พฤษภาคม</option>
<option value="มิถุนายน">มิถุนายน</option>
<option value="กรกฎาคม">กรกฎาคม</option>
<option value="สิงหาคม">สิงหาคม</option>
<option value="กันยายน">กันยายน</option>
<option value="ตุลาคม">ตุลาคม</option>
<option value="พฤศจิกายน">พฤศจิกายน</option>
<option value="ธันวาคม">ธันวาคม</option>
         
                </select>
                                 
                </div>
            </div>
</form>

 <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-success">
                      <div class="panel-heading">
                            ประวัติการส่งอีเมลล์
                        </div>

                        <!-- /.panel-heading -->
                        <div class="panel-body">
                        <div class="table-responsive">
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th style="width: 100px">เดือน</th>
                                        <th>ชือ/บริษัท</th>
                                        <th>อีเมลล์</th>
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
            'iDisplayLength':50,
            'bSort':false,
            dom: 'lrtip',
            ajax: 'http://192.168.1.16/KPIs/public/get_email_table',
       
            columns: [  

            {data:'date'},  
            {data: 'co_name'},
            {data: 'email'},
            {data:'action',orderable:false} , 
        ],

     });  
         $('#table-filter').on('change', function(){
       table.search(this.value).draw();   
    });

});
      

function delete_email(id){
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
 window.location = 'email/' + tar;

});
  return false;
}





</script>


    
@endsection
