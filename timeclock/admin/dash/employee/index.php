<? 	// admin/dash/employee/ 
	session_start(); 
	require_once('../../../ajax/action.php');
?>

<!-- 
<input type="submit" onclick="showE();" value="Show Employees"> 
<br><br>
<div id="dashboard"></div>
-->
<!DOCTYPE html>
<html lang="en">

  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="../../../docs-assets/ico/favicon.png">
	
	<script src="../../../js/ajax.js"></script>
	
    <title>timeclock</title>

    <!-- Bootstrap core CSS -->
    <link href="../../../css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="../../../offcanvas.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy this line! -->
    <!--[if lt IE 9]><script src="../../docs-assets/js/ie8-responsive-file-warning.js"></script><![endif]-->

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
  </head>
  <body onload="showE();">
    <div class="navbar navbar-fixed-top navbar-inverse" role="navigation">
      
      <div class="container">
        <div class="navbar-header">
        
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="../" style="color:white; font-size:34px; font-decoration:bold;"><b>clocked</b>in</a> 
          <a style="color:white;"><? echo $_SESSION['name'] ?></a> 
        </div>
        <div class="collapse navbar-collapse">
         <div class="col-sm-4 col-md-offset-2">
          <ul class="nav navbar-nav">          
            <a style="color:white;" href="admin/"><b><a href="../../logout.php">Logout</a></b></a>
            
          </ul>
         </div>
        </div><!-- /.nav-collapse -->
      </div><!-- /.container -->
    </div><!-- /.navbar -->
	
	<!-- Dashboard Buttons -->
	<center>
  <div style="margin-top:50px;">
	<div class="col-sm-2" style="margin:0 -25px 0 0;">
    	<input type="submit" class="form-control btn btn-success" value="Employee Center" onclick="">
    </div>
	<div class="col-sm-2" style="margin:0 -25px 0 0;">
    	<input type="submit" class="form-control btn btn-info" value="Reports" onclick="">
    </div>
    <div class="col-sm-2" style="margin:0 -25px 0 0;">
    	<input type="submit" class="form-control btn btn-warning" value="My Account" onclick="">
    </div>
 </div>   
    </center>
    <br>
    <br>
	<!-- Add new employee -->
       
    <div class="input-group input-group-sm">
	 <div class="" style="margin:20px 0 0 0;">
	 
	 <div class="col-sm-2" style="margin:0 -25px 0 0;">	
			New Employee:  
		</div>
	        
         <div class="col-sm-2" style="margin:0 -25px 0 0;">
        	<input id="firstname" type="text" class="form-control" placeholder="FIRSTNAME">
		</div>
		
		<div class="col-sm-2" style="margin:0 -25px 0 0;">	
			<input id="lastname" type="text" class="form-control" placeholder="LASTNAME">  
		</div>
		
		<div class="col-sm-2" style="margin:0 -25px 0 0;">	
			<input id="username" type="text" class="form-control" placeholder="USERNAME">
		</div>		 
		<div class="col-sm-2" style="margin:0 -25px 0 0;"> <!-- confirmPassword : cP -->
			<input id="password" type="password" class="form-control" placeholder="PASSWORD">
        </div>
		
		<div class="col-sm-2" style="margin:0 -25px 0 0;"> <!-- confirmPassword : cP -->
			<input id="confirm" type="password" class="form-control" placeholder="PASS AGAIN">
        </div>    
        <div class="col-sm-2" style="margin:0 -25px 0 0;">
           	<input type="submit" class="form-control btn btn-success" value="ADD" onclick="addEmployee();">
        </div>
        <!-- Where Form Messages Show -->
        <div id="message" class="col-sm-2" style="margin:0 -25px 0 0;">
        </div>
       </div>
      </div>
    </div>
         
    <div class="container">
		<br>
		<div id="message"></div>
    	       
        <div style="clear:both;">
          
           <br>
           <div id="showEmployees" style="font-size:24px; padding:0 15px;">Loading Employees…</div> 
        </div><!--/span-->

        <br>
        <div id="status" style="color:green; font-size:24px;"></div>
        <div id="statusOut" style="color:orange; font-size:24px;"></div>
        </div><!--/span-->
     
     
	
	    </div><!--/.container-->
	<br>
	<div style="margin-botton:10px;" >
	<hr>
	<center>
	Copyright 2014 ClockedIn.co
	</center>
	</div>
	

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
    <script src="../../dist/js/bootstrap.min.js"></script>
    <script src="offcanvas.js"></script>
  </body>
</html>