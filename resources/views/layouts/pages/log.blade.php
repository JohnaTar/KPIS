@extends('layouts.app')

@section('content')

         <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">history log</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            
         <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                         
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>name</th>
                                        <th>log</th>
                                    
                                    </tr>
                                </thead>
                                <tbody>  

   @foreach ($data as $datas)
   
   
                               
                                                       
                                    <tr>
                                        <td>{{ $loop->iteration}}</td>
                                         <td>{{ $datas->name}}</td> 
                                          <td>{{ $datas->action}}  {{ $datas->created_at}}</td>

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
