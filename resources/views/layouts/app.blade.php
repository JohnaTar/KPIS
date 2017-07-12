<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>KPIs BPIT HOLDINGS</title>

    <!-- Bootstrap Core CSS -->
    <link href="{{ asset ('css/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="{{ asset ('css/vendor/metisMenu/metisMenu.min.css')}}" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="{{ asset('css/dist/css/sb-admin-2.css')}}" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="{{ asset('css/vendor/morrisjs/morris.css')}}" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="{{ asset('css/vendor/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css">

     <script src="{{ asset('css/vendor/jquery/jquery.min.js')}}"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="{{ asset('css/vendor/bootstrap/js/bootstrap.min.js')}}"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="{{ asset('css/vendor/metisMenu/metisMenu.min.js')}}"></script>

    <!-- Morris Charts JavaScript -->
    <script src="{{ asset('css/vendor/raphael/raphael.min.js')}}"></script>
    <script src="{{ asset('css/vendor/morrisjs/morris.min.js')}}"></script>
 <script src="{{ asset('css/alert/dist/sweetalert.min.js')}}"></script>
<link rel="stylesheet" type="text/css" href="{{ asset('css/alert/dist/sweetalert.css')}}">

    <!-- Custom Theme JavaScript -->
<script src="{{ asset('css/dist/js/sb-admin-2.js')}}"></script>

<script src="https://datatables.yajrabox.com/js/jquery.dataTables.min.js"></script>
<script src="https://datatables.yajrabox.com/js/datatables.bootstrap.js"></script>

 <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
   <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
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
</head>
<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="{{url('home')}}">KPIs BPIT</a>
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right">
            
                
                <!-- /.dropdown -->
                
                <li class="dropdown">
                @if (Auth::guest())
                         
                        @else
                       
                    <a >
                        <i class="fa fa-user fa-fw"></i> : {{ Auth::user()->name }}  <i class="fa fa-caret-down"></i>   
                         @endif
                    </a>

                  
                    <!-- /.dropdown-user -->
                </li>
                <li><a href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                           <i class="fa fa-sign-out fa-fw"></i> Logout</a>
                                             <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                </li>
                <!-- /.dropdown -->
            </ul>
             <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <li class="sidebar-search">
                            <div class="input-group custom-search-form">
                                <input type="text" class="form-control" placeholder="Search...">
                                <span class="input-group-btn">
                                <button class="btn btn-default" type="button">
                                    <i class="fa fa-search"></i>
                                </button>
                            </span>
                            </div>
                            <!-- /input-group -->
                        </li>
                        <li>
                            <a href="{{url('home')}}"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                        </li>
                         <li>
                            <a href="{{url('BPIT')}}"><i class="fa fa-building fa-fw"></i> KPIs BPIT</a>
                        </li>
                        
                    @if(Auth::user()->dep_id==1 ||Auth::user()->dep_id==2)

                     <li>
                            <a href="{{url('ACC')}}"><i class="fa fa-calculator fa-fw"></i> KPIs ACC</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-header fa-fw"></i> KPIs HR<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="{{url('HR')}}">HR</a>
                                </li>
                                 <li>
                                    <a href="{{url('NAT')}}">NAT</a>
                                </li>           
                                   <li>
                                    <a href="{{url('JEAB')}}">JEAB</a>
                                </li>                               
                                   <li>
                                    <a href="{{url('MEAW')}}">MEAW</a>
                                </li>
                                   <li>
                                    <a href="{{url('INK')}}">INK</a>
                                </li>
                                 <li>
                                    <a href="{{url('JOOM')}}">JOOM</a>
                                </li>
                                <li>
                                    <a href="{{url('NONG')}}">NONG</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                           <li>
                            <a href="{{url('IT')}}"><i class="fa fa-laptop fa-fw"></i> KPIs IT</a>
                        </li>
                        <li>
                           <a href="#"><i class="fa fa-search-plus fa-fw"></i> KPIs outBKK<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="{{url('BKK')}}">outBKK</a>
                                </li>
                                 <li>
                                    <a href="{{url('PLENG')}}">PLENG</a>
                                </li>           
                                   <li>
                                    <a href="{{url('MAY')}}">MAY</a>
                                </li>                               
                                  
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
            
                        <li>
                            <a href="{{url('outCHON')}}"><i class="fa fa-search-plus fa-fw"></i> KPIs outCHON</a>
                        </li>
                        <li>
                            <a href="{{url('outPTY')}}"><i class="fa fa-search-plus fa-fw"></i> KPIs outPTY</a>
                        </li>

<!--  #################ACC ###################### # -->                  
                        @elseif(Auth::user()->dep_id==4)
                          <li>
                            <a href="{{url('ACC')}}"><i class="fa fa-calculator fa-fw"></i> KPIs ACC</a>
                        </li>
<!--  #################PTY ###################### # -->
                        @elseif(Auth::user()->dep_id==7)
                        <li>
                            <a href="{{url('outPTY')}}"><i class="fa fa-search-plus fa-fw"></i> KPIs outPTY</a>
                        </li>
<!--  #################PTY ###################### # -->
                        @elseif(Auth::user()->dep_id==8)
                           <li>
                            <a href="{{url('outCHON')}}"><i class="fa fa-search-plus fa-fw"></i> KPIs outCHON</a>
                        </li>
                        @elseif(Auth::user()->dep_id==3 && Auth::user()->head=='A')
                             
                        <li>
                        <a href="#"><i class="fa fa-header fa-fw"></i> KPIs HR<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="{{url('HR')}}">HR</a>
                                </li>
                                 <li>
                                    <a href="{{url('NAT')}}">NAT</a>
                                </li>           
                                   <li>
                                    <a href="{{url('JEAB')}}">JEAB</a>
                                </li>                               
                                   <li>
                                    <a href="{{url('MEAW')}}">MEAW</a>
                                </li>
                                   <li>
                                    <a href="{{url('INK')}}">INK</a>
                                </li>
                                 <li>
                                    <a href="{{url('JOOM')}}">JOOM</a>
                                </li>
                                <li>
                                    <a href="{{url('NONG')}}">NONG</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                       @elseif(Auth::user()->dep_id==3&& Auth::user()->id==11)
                    <li>
                        <a href="#"><i class="fa fa-header fa-fw"></i> KPIs HR<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="{{url('HR')}}">HR</a>
                                </li>
                                 <li>
                                    <a href="{{url('JEAB')}}">JEAB</a>
                                </li>    
                                
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                              @elseif(Auth::user()->dep_id==3&& Auth::user()->id==12)
                        <li>
                        <a href="#"><i class="fa fa-header fa-fw"></i> KPIs HR<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="{{url('HR')}}">HR</a>
                                </li>
                                <li>
                                    <a href="{{url('MEAW')}}">MEAW</a>
                                </li>
                                
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                            @elseif(Auth::user()->dep_id==3&& Auth::user()->id==13)
                             <li>
                        <a href="#"><i class="fa fa-header fa-fw"></i> KPIs HR<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="{{url('HR')}}">HR</a>
                                </li>
                                <li>
                                    <a href="{{url('INK')}}">INK</a>
                                </li>
                                
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        @elseif(Auth::user()->dep_id==6 && Auth::user()->head =='A')
                        <li>
                           <a href="#"><i class="fa fa-search-plus fa-fw"></i> KPIs outBKK<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="{{url('BKK')}}">outBKK</a>
                                </li>
                                 <li>
                                    <a href="{{url('PLENG')}}">PLENG</a>
                                </li>           
                                   <li>
                                    <a href="{{url('MAY')}}">MAY</a>
                                </li>                               
                                  
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                         @elseif(Auth::user()->dep_id==6 && Auth::user()->id ==14)
                           <li>
                           <a href="#"><i class="fa fa-search-plus fa-fw"></i> KPIs outBKK<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="{{url('BKK')}}">outBKK</a>
                                </li>
                                 <li>
                                    <a href="{{url('MAY')}}">MAY</a>
                                </li>                                                     
                                  
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
             @elseif(Auth::user()->dep_id==6 && Auth::user()->id ==15)
             <li>
                           <a href="#"><i class="fa fa-search-plus fa-fw"></i> KPIs outBKK<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="{{url('BKK')}}">outBKK</a>
                                </li>
                                 <li>
                                    <a href="{{url('PLENG')}}">PLENG</a>
                                </li>                               
                                  
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                    @endif
                    @if (Auth::user()->dep_id==1 ||Auth::user()->dep_id==2 ||
                    Auth::user()->dep_id==4)
                      <li>
                            <a href="{{url('P&L')}}"><i class="fa fa-paper-plane fa-fw"></i> รายงานการส่ง P&L</a>
                        </li>
                        @endif
                          
           @if (Auth::user()->dep_id==3 || Auth::user()->dep_id==2 || Auth::user()->dep_id==1)
                        <li>
                            <a href="{{url('email')}}"><i class="fa fa-table fa-fw"></i> ประวัติการส่งอีเมลล์</a>
                        </li>
            @endif
                    @if (Auth::user()->dep_id==5 ||Auth::user()->dep_id==7||Auth::user()->dep_id==8)
                    @else
                        <li>
                            <a href="#"><i class="fa fa-wrench fa-fw"></i> รายงานข้อผิดพลาด<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                            @if (Auth::user()->dep_id==3)
                                 <li>
                                    <a href="{{url('hr')}}">ฝ่าย HR</a>
                                </li>
                            @elseif (Auth::user()->dep_id==4)
                                <li>
                                    <a href="{{url('acc')}}">ฝ่าย ACC</a>
                                </li>
                            @elseif (Auth::user()->dep_id==6)
                                 <li>
                                    <a href="{{url('outBKK')}}">ฝ่าย OUTBKK</a>
                                </li>
                            @else 
                                 <li>
                                    <a href="{{url('it')}}">ฝ่าย IT</a>
                                </li>
                                <li>
                                    <a href="{{url('hr')}}">ฝ่าย HR</a>
                                </li>
                                <li>
                                    <a href="{{url('acc')}}">ฝ่าย ACC</a>
                                </li>
                                 <li>
                                    <a href="{{url('outBKK')}}">ฝ่าย OUTBKK</a>
                                </li>
                            @endif
                              
                              
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
    @endif
    @if (Auth::user()->dep_id==2)

                            <li>
                            <a href="{{url('table')}}"><i class="fa fa-sitemap fa-fw"></i> จัดการข้อมูลสมาชิก</a>
                        </li>
                          <li>
                            <a href="{{url('log')}}"><i class="fa fa-edit fa-fw"></i> History log</a>
                        </li>
  @endif
                       
                       
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>
               <div id="page-wrapper">
                @yield('content')
           

            </div>
    </body>
</html>