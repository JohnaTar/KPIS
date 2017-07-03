<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <title>KPIs</title>
  
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">

  <link rel='stylesheet prefetch' href='https://fonts.googleapis.com/css?family=Roboto:400,100,300,500,700,900|RobotoDraft:400,100,300,500,700,900'>
<link rel='stylesheet prefetch' href='https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css'>

      <link rel="stylesheet" href="css/index.css">

  
</head>

<body>
  
<!-- Form Mixin-->
<!-- Input Mixin-->
<!-- Button Mixin-->
<!-- Pen Title-->
<div class="pen-title">
  <h1>Key Performance Indicators</h1>
  <h2>BPIT Holdings Co,.Ltd</h2>
  <br>
  <span>Pen <i class='fa fa-paint-brush'></i> + <i class='fa fa-code'></i> by Johnatar</span>
</div>
<!-- Form Module-->
<div class="module form-module">
  <div class="toggle"><i class="fa fa-times fa-pencil"></i>
    <div class="tooltip">Click Me</div>
  </div>
  <div class="form">
    <h2>Login to your account</h2>
    <form action="login" method="post">
       {{ csrf_field() }}
      <input type="text" placeholder="Username" name="username" />
       @if ($errors->has('username'))
       <center>
                                    <span class="help-block">
                                        <strong style="color: red;">{{ $errors->first('username') }}</strong>
                                    </span>
                                    <br>
                                    <br>
        </center>
                        @endif
      <input type="password" placeholder="Password" name="password" />
       @if ($errors->has('password'))
       <center>
                                    <span class="help-block">
                                        <strong style="color: red;">{{ $errors->first('password') }}</strong>
                                    </span>
                                    <br>
                                    <br>
        </center>
                        @endif
      <button>Login</button>
    </form>
  </div>
  

</div>
  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<script src='https://codepen.io/andytran/pen/vLmRVp.js'></script>

    <script src="js/index.js"></script>

</body>
</html>
