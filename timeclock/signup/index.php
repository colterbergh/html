<!DOCTYPE html>
<? // main index page
ob_start();
//require_once("ajax/db.php"); 
$time = time(); 

?>

<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="../../assets/ico/favicon.ico">
	<link href='http://fonts.googleapis.com/css?family=Cambo' rel='stylesheet' type='text/css'>
	
    <script src="../js/ajax.js"></script>
	<script src="../js/bootstrap.min.js"></script>
    <title>clockme.co | Web based clock in clock out employee hour tracking</title>

    <!-- Bootstrap core CSS -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="../starter-template.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy this line! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>
  
    <div class="navbar navbar-default navbar-fixed-top" role="navigation" style="background-color:white;color:black;border-bottom:0px;
    ">
      <div class="container" style="background-color:white; color:black;">
        <div class="navbar-header" style="background-color:white;">
          <button type="button" style="background-color:black;" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
           <a href="../index.php" class="navbar-brand" style="color:black;" href="#"><b>clock</b>me
        </div>

        <div class="collapse navbar-collapse" style="background-color:white;color:black;">
       <div class="hideHeader">   
          <ul class="nav navbar-nav" style="background-color:white; ">
            <li><a href="#"></a></li>
            <li><a href="../admin/" style="color:black;">
            	<input type="submit" class="form-control btn btn-success" style="min-width:200px;height:50px;" value="Admin">
            </a></li>
            <li><a href="../go/" style="color:black;">
            	<input type="submit" class="form-control btn btn-info" style="min-width:200px;height:50px;" value="Employee">
            </a></li>
            
            <li><a href="" style="color:black;"></a><br><br><br><br><br></li>
          	<li><a href="" style="color:black;"></a></li>
          	<li><a href="" style="color:black;"></a></li>
          	
   
          </ul>
 </div> <!--/.hideHeader -->
        </div><!--/.nav-collapse -->       

          </ul><!--/.nav-collapse -->
        </div>
      </div>
    </div>
    
    
          	<a id="signup"></a>
		<center>
		<div class="input-group input-group-lg" stlye="padding:2px;">
		<div class="input-group input-group-lg">
		
		<div id="signUpForm" class="input-group input-group-lg" style="padding:2px;margin-top:75px;">
	<form onsubmit="newCoVia();return false">
		<input id="email" type="text" style="padding:20px;text-align:center;" class="form-control" placeholder="ENTER EMAIL">
		
		<div class="input-group input-group-lg" style="padding:2px;">
		<input style="margin:5px 0; width:230px;" id="submit" type="submit" class="form-control btn btn-danger" value="Sign Up">
	</form>
		</div>
				
		</div>
		
		<img src="../assets/images/rocket.jpg">
		</form>
		</center>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="../include/jquery.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../offcanvas.js"></script>
  
  </body>
</html>