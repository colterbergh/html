<? //require_once('../../ajax/action.php'); // newheader.php ?>
<!DOCTYPE html>
<html lang="en">

  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- <link rel="shortcut icon" href="../../docs-assets/ico/favicon.png" -->
	
	<script src="../../js/ajax.js"></script>
	<script src="../../js/bootstrap.min.js"></script>
    <title>clockme | Track employee hours. Web based clock in clock out management system.</title>

    <!-- Bootstrap core CSS -->
    <link href="../../css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="../../offcanvas.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy this line! -->
    <!--[if lt IE 9]><script src="../../docs-assets/js/ie8-responsive-file-warning.js"></script><![endif]-->

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>

    <div class="navbar navbar-default navbar-fixed-top" role="navigation" style="background-color:white;color:black;border-bottom:0px;
    ">
      <div class="container" style="background-color:white; color:black;">
        <div class="navbar-header" style="background-color:white;">
          <button type="button" style="background-color:black;" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse" onclick="das">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
           <a href="../index.php" class="navbar-brand" style="color:black;" href="#"><b>clock</b>me
        </div>
        <div class="collapse navbar-collapse" style="background-color:white;color:black;">
          <ul class="nav navbar-nav" style="background-color:white; ">
            <li><a href="#"></a></li>
             <li><a style="color:black;"><input type="submit" class="form-control btn btn-default" style="min-width:150px;height:40px;" value="Home" onclick="window.location='index.php'"></a></li>
            <li><a style="color:black;"><input type="submit" class="form-control btn btn-default" style="min-width:150px;height:40px;" value="Employee Center" onclick="window.location='employee.php'"></a></li>
            <li><a style="color:black;">
            <input type="submit" class="form-control btn btn-default" style="min-width:150px;height:40px;" value="Reports" onclick="window.location='reports.php'">
            </a></li>
            <li><a style="color:black;">
            <input type="submit" class="form-control btn btn-default" style="min-width:150px;height:40px;" value="My Account" onclick="window.location='myaccount.php'">
            </a></li>
            <li><a style="color:black;">
            <input type="submit" class="form-control btn btn-default" style="min-width:150px;height:40px;" value="Logout" onclick="window.location='../../logout.php'">
            </a></li>
          </ul>
        </div><!--/.nav-collapse -->       

          </ul><!--/.nav-collapse -->
        </div>
      </div>
    </div>

    
     